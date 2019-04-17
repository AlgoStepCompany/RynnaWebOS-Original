<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="prepauser.css" rel="stylesheet">
</head>
<body>
<div id="Layer1" style="position:fixed;text-align:center;left:50%;margin-left:-389px;top:50%;margin-top:-155px;width:778px;height:311px;z-index:2;">
<div id="Layer1_Container" style="width:778px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="wb_Text1" style="position:absolute;left:23px;top:23px;width:732px;height:64px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:27px;">Merci de patienter quelques instants nous préparons votre nouveau compte...</span></div>
<div id="wb_Image1" style="position:absolute;left:308px;top:97px;width:163px;height:200px;z-index:1;">
<img src="images/loadcreateuser.gif" id="Image1" alt=""></div>
</div>
</div>
<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      window.location.href='./finish.php';
   }, 9500);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
TimerStartTimer1();
</script>

<div style="z-index:4">
<script>
var colors = new Array("#FFFF00","#00FFFF","#FF00FF","#CCFFCC","#000000","#FFAA00","#FFFF66","#0000FF","#FFFFFF","#00FF00");
var hexArray = new Array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');

var nPause = 2*1000;
var nSpeed = 35;

var redStart;
var greenStart;
var blueStart;

var redEnd;
var greenEnd;
var blueEnd;

var redCurrent;
var greenCurrrent;
var blueCurrent;

var nStep=1;
var nColorStart=0;
var nColorEnd=1;
var rainbowTimer;

function getNextColor() 
{
   redStart = parseInt("0x"+colors[nColorStart].substring(1,3));
   greenStart = parseInt("0x"+colors[nColorStart].substring(3,5));
   blueStart = parseInt("0x"+colors[nColorStart].substring(5,7));

   redCurrent = redStart;
   greenCurrent = greenStart;
   blueCurrent = blueStart;
	
   redEnd = parseInt("0x"+colors[nColorEnd].substring(1,3));
   greenEnd = parseInt("0x"+colors[nColorEnd].substring(3,5));
   blueEnd = parseInt("0x"+colors[nColorEnd].substring(5,7));

   nColorStart++;
   nColorEnd++;
   if (nColorStart >= colors.length) 
   {
      nColorStart = 0;
   }
   if (nColorEnd >= colors.length) 
   {
      nColorEnd = 0;
   }
   animateColor();
}
function animateColor() 
{
   redCurrent = redCurrent-((redStart-redEnd)/nSpeed);
   greenCurrent = greenCurrent-((greenStart-greenEnd)/nSpeed);
   blueCurrent = blueCurrent-((blueStart-blueEnd)/nSpeed);

   if (redCurrent<0) { redCurrent=0 }	
   if (redCurrent>255) {redCurrent=255}
   if (greenCurrent<0) {greenCurrent=0}
   if (greenCurrent>255) {greenCurrent=255}
   if (blueCurrent<0) {blueCurrent=0}
   if (blueCurrent>255) {blueCurrent=255}
	
   if (nStep<=nSpeed) 
   {
      var red1 = hexArray[Math.floor(redCurrent/16)];
      var red2 = hexArray[Math.floor(redCurrent)%16];
      var green1 = hexArray[Math.floor(greenCurrent/16)];
      var green2 = hexArray[Math.floor(greenCurrent)%16];
      var blue1 = hexArray[Math.floor(blueCurrent/16)];
      var blue2 = hexArray[Math.floor(blueCurrent)%16];
	
      document.body.style.background = "#"+red1+red2+green1+green2+blue1+blue2;

      nStep++;
      rainbowTimer = setTimeout("animateColor()", 50);
    } 
    else 
    {
       clearTimeout(rainbowTimer);
       nStep = 1;
       rainbowTimer = setTimeout("getNextColor()", nPause);
    }
}
window.onload = getNextColor;
</script>

</div>
</body>
</html>