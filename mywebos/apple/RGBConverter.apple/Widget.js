/*=====================================================================*\
|| ###################################################################
|| # RGB Converter
|| # Copyright (c)2002-2010 Blue Static
|| #
|| # This program is free software; you can redistribute it and/or modify
|| # it under the terms of the GNU General Public License as published by
|| # the Free Software Foundation; version 2 of the License.
|| #
|| # This program is distributed in the hope that it will be useful, but
|| # WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
|| # or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
|| # more details.
|| #
|| # You should have received a copy of the GNU General Public License along
|| # with this program; if not, write to the Free Software Foundation, Inc.,
|| # 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA
|| ###################################################################
\*=====================================================================*/

var colors_ = {
  red   : 60,
  green : 60,
  blue  : 60,
  hex   : '3C3C3C'
};

var backShowing_ = false;

// ###################################################################
// widget init
function Setup()
{
  Draw();
  createGenericButton(document.getElementById("backbutton"), "Done", hide_back, 0);
}

// ###################################################################
// watches the three RGB fields to make sure they don't go over the limites
function OnRGBChange(color)
{
  var field = document.getElementById(color + "input");
  
  // Handle RGB triads that are pased into a single box.
  if (triad = field.value.match(/(rgb)?\(?([0-9]{1,3}),\s?([0-9]{1,3}),\s?([0-9]{1,3})\)?/)) {
    document.getElementById("redinput").value = triad[2];
    document.getElementById("greeninput").value = triad[3];
    document.getElementById("blueinput").value = triad[4];
    
    rgbwatcher("red");
    rgbwatcher("green");
    rgbwatcher("blue");
    return;
  }
  
  // sanitize the number
  var newval = field.value.replace(/[^0-9\-\.]*/g, "");
  newval = Math.floor(newval);
  
  // make sure we don't go over 255
  if (newval > 255) {
    newval = 255;
  } else if (newval < 0) {
    newval = 0;
  }
  
  // update the text field
  field.value = newval;
  
  // set fields[]
  colors_[color] = newval;
  
  // set hex
  UpdateHex();
  
  // redraw the swatch
  Draw();
}

// ###################################################################
function Draw()
{
  var canvas  = document.getElementById('wheel');
  var context = canvas.getContext('2d');
  var radius  = canvas.width / 2 - 3;
  var center  = [canvas.width / 2, canvas.height / 2];
  context.strokeStyle = 'black';

  context.clearRect(0, 0, canvas.width, canvas.height);

  if (backShowing_) {
    // Draw dark baground gradient.
    context.beginPath();
    context.arc(center[0], center[1], radius, 0, Math.PI * 2, true);
    var gradient = context.createLinearGradient(0, 0, 0, canvas.height);
    gradient.addColorStop(0, 'rgb(200, 200, 200)');
    gradient.addColorStop(1, 'rgb(30, 30, 30)');
    context.fillStyle = gradient;
    context.fill();
    context.closePath();
    return;
  }

  // Draw the individual components. Start with red.
  context.beginPath();
  context.moveTo(center[0], center[1]);
  context.arc(canvas.width / 2,
              canvas.height / 2,
              radius,
              Math.PI * 4/3,
              Math.PI * 6/3,
              false);
  context.lineTo(center[0], center[1]);
  context.fillStyle = _GetComponentColorString('red');
  context.fill();
  context.stroke();

  // Green component.
  context.beginPath();
  context.moveTo(center[0], center[1]);
  context.arc(canvas.width / 2,
              canvas.height / 2,
              radius,
              Math.PI * 0,
              Math.PI * 2/3,
              false);
  context.lineTo(center[0], center[1]);
  context.fillStyle = _GetComponentColorString('green');
  context.fill();
  context.stroke();

  // Blue component.
  context.beginPath();
  context.moveTo(center[0], center[1]);
  context.arc(canvas.width / 2,
              canvas.height / 2,
              radius,
              Math.PI * 2/3,
              Math.PI * 4/3,
              false);
  context.lineTo(center[0], center[1]);
  context.fillStyle = _GetComponentColorString('blue');
  context.fill();
  context.stroke();

  // Draw the sheen gradient.
  context.beginPath();
  context.arc(center[0], center[1], radius, 0, Math.PI * 2, true);
  var gradient = context.createLinearGradient(0, 0, 0, canvas.height);
  gradient.addColorStop(0, 'rgba(255,255,255,.5)');
  gradient.addColorStop(1, 'rgba(0,0,0,0)');
  context.fillStyle = gradient;
  context.fill();
  context.closePath();

  // Draw the inner wheel. WebKit in 10.6.5 (and maybe earlier) has a bug in
  // which you can't fill a path after stroking it, or vice versa.
  var _arc = function(c) {
    c.arc(center[0], center[1], canvas.width / 4.75, 0, Math.PI * 2, true);
  }
  context.save();
  context.beginPath();
  _arc(context)
  context.strokeStyle = 'rgb(30,30,30)';
  context.stroke();

  context.beginPath();
  _arc(context);
  context.fillStyle = _GetRGBColorString();
  context.fill();
  context.closePath();
  delete _arc;
}

// ###################################################################
// Returns the rgb(,,,) color string.

function _GetRGBColorString()
{
  return 'rgb(' + colors_.red + ',' + colors_.green + ',' + colors_.blue + ')';
}

// ###################################################################
// Returns an individual color component's color string.

function _GetComponentColorString(color)
{
  if (color == 'red') {
    return 'rgb(' + colors_.red + ',0,0)';
  } else if (color == 'green') {
    return 'rgb(0,' + colors_.green + ',0)';
  } else if (color == 'blue') {
    return 'rgb(0,0,' + colors_.blue + ')';
  }
  alert('Invalid color ' + color);
}

// ###################################################################
// watches the hex field for updates
function OnHexChanged()
{
  var field = document.getElementById("hexinput");
  
  // sanitize the hex
  var newval = field.value.replace(/[^0-9a-f]*/gi, "");
  
  // get the length
  var length = newval.length;
  
  // Trim the value.
  if (length > 6) {
    newval = newval.substr(0, 6);
  } else if (length == 3) {
    newval = newval.substr(0, 1) + newval.substr(0, 1) +
             newval.substr(1, 1) + newval.substr(1, 1) +
             newval.substr(2, 1) + newval.substr(2, 1);
  } else if (length < 6) {
    for (var i = length; i <= 6; i++) {
      newval = "" + newval + "0";
    }
  }
  
  // update the field
  field.value = newval;
  
  // update fields[]
  colors_.hex = newval;
  
  // set RGB
  UpdateRGB();
  
  // redraw the swatch
  Draw();
}

// ###################################################################
// update the hex value
function UpdateHex()
{
  var hexstr = _Dec2Hex(colors_.red) + _Dec2Hex(colors_.green) + _Dec2Hex(colors_.blue);
  colors_.hex = hexstr;
  document.getElementById("hexinput").value = hexstr;
}

// ###################################################################
// update the RGB values
function UpdateRGB()
{
  // regex match the bits
  var bits = colors_.hex.match(/(..)(..)(..)/);
  
  colors_.red = _Hex2dDc(bits[1]);
  colors_.green = _Hex2dDc(bits[2]);
  colors_.blue = _Hex2dDc(bits[3]);
  
  // construct the hex values
  document.getElementById("redinput").value = colors_.red;
  document.getElementById("greeninput").value = colors_.green;
  document.getElementById("blueinput").value = colors_.blue;
}

// ###################################################################
// convert a decimal to a hexidecimal
function _Dec2Hex(dec)
{
  var hexstr = "0123456789ABCDEF";
  var low = dec % 16;
  var high = (dec - low) / 16;
  hex = "" + hexstr.charAt(high) + hexstr.charAt(low);
  
  return hex.toString();
}

// ###################################################################
// converts a hexidecimal to a decimal
function _Hex2dDc(hex)
{
  return parseInt(hex, 16);
}

// ###################################################################
// ###################################################################
// ###################################################################

// flip data

function show_back()
{
  backShowing_ = true;

  var front = document.getElementById("front");
  var back = document.getElementById("back");
  
  if (window.widget)
  {
    widget.prepareForTransition("ToBack");
  }
  
  front.style.display = "none";
  back.style.display = "block";
  
  if (window.widget)
  {
    setTimeout("widget.performTransition();", 0);  
  }
  
  document.getElementById("fliprollie").style.display = "none";

  Draw();
}

function hide_back()
{
  backShowing_ = false;

  var front = document.getElementById("front");
  var back = document.getElementById("back");
  
  if (window.widget)
  {
    widget.prepareForTransition("ToFront");
  }
  
  back.style.display = "none";
  front.style.display = "block";
  
  if (window.widget)
  {
    setTimeout("widget.performTransition();", 0);
  }

  Draw();
}

var flipShown = false;

var animation = {
  duration : 0,
  starttime : 0,
  to : 1.0,
  now : 0.0,
  from : 0.0,
  firstElement : null,
  timer : null
};

function mousemove(event)
{
  if (backShowing_)
    return;

  if (!flipShown)
  {
    if (animation.timer != null)
    {
      clearInterval(animation.timer);
      animation.timer  = null;
    }
    
    var starttime = (new Date).getTime() - 13;
    
    animation.duration = 500;
    animation.starttime = starttime;
    animation.firstElement = document.getElementById("flip");
    animation.timer = setInterval("animate();", 13);
    animation.from = animation.now;
    animation.to = 1.0;
    animate();
    flipShown = true;
  }
}

function mouseexit(event)
{
  if (backShowing_)
    return;

  if (flipShown)
  {
    // fade in the flip widget
    if (animation.timer != null)
    {
      clearInterval (animation.timer);
      animation.timer  = null;
    }
    
    var starttime = (new Date).getTime() - 13;
    
    animation.duration = 500;
    animation.starttime = starttime;
    animation.firstElement = document.getElementById("flip");
    animation.timer = setInterval("animate();", 13);
    animation.from = animation.now;
    animation.to = 0.0;
    animate();
    flipShown = false;
  }
}


function animate()
{
  var T;
  var ease;
  var time = (new Date).getTime();
    
  T = limit_3(time - animation.starttime, 0, animation.duration);
  
  if (T >= animation.duration)
  {
    clearInterval(animation.timer);
    animation.timer = null;
    animation.now = animation.to;
  }
  else
  {
    ease = 0.5 - (0.5 * Math.cos(Math.PI * T / animation.duration));
    animation.now = compute_next_float(animation.from, animation.to, ease);
  }
  
  animation.firstElement.style.opacity = animation.now;
}

function limit_3 (a, b, c)
{
    return a < b ? b : (a > c ? c : a);
}

function compute_next_float(from, to, ease)
{
    return from + (to - from) * ease;
}

function enterflip(event)
{
  document.getElementById("fliprollie").style.display = "block";
}

function exitflip(event)
{
  document.getElementById("fliprollie").style.display = "none";
}
