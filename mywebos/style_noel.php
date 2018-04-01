<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="author" content="AlgoStep Company">
<meta name="generator" content="AlgoStep Company - Kernel WebOS PHP-JQUERY">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="WebOSKernel.css" rel="stylesheet">
<link href="style_noel.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="listview.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog1Options =
   {
      width: 355,
      height: 280,
      position: { my: 'left top', at: 'left+18 top+235', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
   var jQueryDialog2Options =
   {
      width: 355,
      height: 280,
      position: { my: 'left top', at: 'left+58 top+286', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
   var jQueryDialog3Options =
   {
      width: 355,
      height: 280,
      position: { my: 'left top', at: 'left+109 top+335', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog3'} 
   };
   $("#jQueryDialog3").dialog(jQueryDialog3Options);
   var jQueryDialog4Options =
   {
      width: 355,
      height: 280,
      position: { my: 'left top', at: 'left+162 top+384', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog4'} 
   };
   $("#jQueryDialog4").dialog(jQueryDialog4Options);
   var jQueryDialog5Options =
   {
      width: 695,
      height: 129,
      position: { my: 'left top', at: 'left+514 top+21', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog5'} 
   };
   $("#jQueryDialog5").dialog(jQueryDialog5Options);
   var jQueryDialog6Options =
   {
      width: 674,
      height: 575,
      position: { my: 'left top', at: 'left+550 top+173', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog6'} 
   };
   $("#jQueryDialog6").dialog(jQueryDialog6Options);
   var jQueryAccordion1Options =
   {
      event: 'click',
      animate: 'linear',
      header: 'h3',
      heightStyle: 'fill'
   };
   $("#jQueryAccordion1").accordion(jQueryAccordion1Options);
   var AutoComplete1Data = [];
   var AutoComplete1Options =
   {
      source: AutoComplete1Data,
      delay: 0,
      minLength: 2
   };
   $("#AutoComplete1").autocomplete(AutoComplete1Options);
   $("#jQueryButton1").button();
   var jQueryDatePicker1Options =
   {
      dateFormat: 'mm/dd/yy',
      changeMonth: false,
      changeYear: false,
      showButtonPanel: false,
      showAnim: 'show'
   };
   $("#jQueryDatePicker1").datepicker(jQueryDatePicker1Options);
   $("#jQueryDatePicker1").datepicker("setDate", "");
   $("#jQueryDatePicker1").change(function()
   {
      $('#jQueryDatePicker1_input').attr('value',$(this).val());
   });
   var ListView1Options =
   {
      inset: false
   };
   $("#ListView1").listview(ListView1Options);
   var jQueryMenu1Options =
   {
      icons: { submenu: 'ui-icon-caret-1-e' },
      position: { my: 'left top', at: 'right top' }
   };
   $("#jQueryMenu1").menu(jQueryMenu1Options);
   var jQueryProgressbar1Options =
   {
      value: 25
   };
   $("#jQueryProgressbar1").progressbar(jQueryProgressbar1Options);
   var jQuerySlider1Options =
   {
      orientation: 'horizontal',
      animate: true,
      range: false,
      min: 0,
      max: 100,
      value: 0
   };
   $("#jQuerySlider1").slider(jQuerySlider1Options);
   var jQuerySpinner1Options =
   {
      min: 0,
      max: 100,
      step: 1
   };
   $("#jQuerySpinner1").spinner(jQuerySpinner1Options);
   var jQueryTabs1Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs1").tabs(jQueryTabs1Options);
   var jQueryToolTip1Options =
   {
      hide: true,
      show: true,
      content: "",
      items: '#',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip1' }
   };
   $("#").tooltip(jQueryToolTip1Options);
});
</script>
</head>
<body>
<div id="wb_Text1" style="position:absolute;left:14px;top:13px;width:500px;height:16px;z-index:11;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">WebOS Kernel Jquery - AlgoStep Company</span></div>
<input type="submit" id="Button1" onclick="$('#jQueryDialog1').dialog('open');$('#jQueryDialog2').dialog('open');$('#jQueryDialog3').dialog('open');$('#jQueryDialog4').dialog('open');$('#jQueryDialog5').dialog('open');$('#jQueryDialog6').dialog('open');return false;" name="" value="Tester l'affichage des fenêtres" style="position:absolute;left:18px;top:61px;width:445px;height:25px;z-index:12;">
<input type="submit" id="Button2" onclick="window.location.href='./background_style.php';return false;" name="" value="Tester les animations BACKGROUND_STYLE" style="position:absolute;left:18px;top:104px;width:445px;height:25px;z-index:13;">
<input type="submit" id="Button3" onclick="window.location.href='./style_noel.php';return false;" name="" value="Tester les animations STYLE_NOEL" style="position:absolute;left:18px;top:148px;width:445px;height:25px;z-index:14;">
<input type="submit" id="Button4" onclick="window.location.href='./kernel.php';return false;" name="" value="Retour normal" style="position:absolute;left:18px;top:190px;width:445px;height:25px;z-index:15;">
<div id="jQueryDialog1" style="z-index:16;" title="Form1">
</div>

<div id="jQueryDialog2" style="z-index:17;" title="Form2">
</div>

<div id="jQueryDialog3" style="z-index:18;" title="Form3">
</div>

<div id="jQueryDialog4" style="z-index:19;" title="Form4">
</div>

<div id="jQueryDialog5" style="z-index:20;" title="Form5">
</div>

<div id="jQueryDialog6" style="z-index:21;" title="Form6-[CONTENANT]">
<div id="wb_jQueryAccordion1" style="position:absolute;left:19px;top:18px;width:100px;height:156px;z-index:0;">
<div id="jQueryAccordion1">
<h3>Item 1</h3>
<div>
</div>
<h3>Item 2</h3>
<div>
</div>
<h3>Item 3</h3>
<div>
</div>
<h3>Item 4</h3>
<div>
</div>
</div>
</div>
<input type="text" id="AutoComplete1" style="position:absolute;left:137px;top:16px;width:96px;height:96px;line-height:96px;z-index:1;" name="AutoComplete1" value="" spellcheck="false">
<button type="button" id="jQueryButton1" name="" value="Button" style="position:absolute;left:252px;top:20px;width:100px;height:96px;z-index:2;">Button</button>
<input id="jQueryDatePicker1_input" name="" style="display:none" type="text" value="">
<div id="jQueryDatePicker1" style="position:absolute;left:383px;top:18px;width:232px;height:195px;z-index:3;">
</div>
<div id="wb_ListView1" style="position:absolute;left:19px;top:195px;width:98px;height:163px;z-index:4;">
<ul id="ListView1" style="margin-top:0px;margin-bottom:0px;">
<li>Item 1</li>
<li>Item 2</li>
<li>Item 3</li>
<li>Item 4</li>
</ul></div>
<div id="wb_jQueryMenu1" style="position:absolute;left:140px;top:149px;width:212px;height:100px;z-index:1005;">
<ul id="jQueryMenu1">
<li><div><a href="" target="_self">Item&nbsp;1</a></div>
<ul>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;1</a></div></li>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;2</a></div>
<ul>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;3</a></div></li>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;4</a></div></li>
</ul>
</li>
</ul>
</li>
<li><div><a href="" target="_self">Item&nbsp;2</a></div>
<ul>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;1</a></div></li>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;2</a></div>
<ul>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;3</a></div></li>
<li><div><a href="" target="_self">Sub&nbsp;Item&nbsp;4</a></div></li>
</ul>
</li>
</ul>
</li>
</ul>
</div>
<div id="jQueryProgressbar1" style="position:absolute;left:139px;top:272px;width:460px;height:36px;z-index:6;">
</div>
<div id="jQuerySlider1" style="position:absolute;left:145px;top:371px;width:461px;height:14px;z-index:7;">
</div>
<div id="wb_jQuerySpinner1" style="position:absolute;left:22px;top:381px;width:170px;height:100px;z-index:8;">
<input type="text" id="jQuerySpinner1" style="width:141px;height:92px;line-height:92px;" name="jQuerySpinner1" value="0"></div>
<div id="jQueryTabs1" style="position:absolute;left:207px;top:378px;width:242px;height:93px;z-index:9;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>Item 1</span></a></li>
<li><a href="#jquerytabs1-page-1"><span>Item 2</span></a></li>
</ul>
<div style="height:71px;" id="jquerytabs1-page-0">
</div>
<div style="height:71px;" id="jquerytabs1-page-1">
</div>
</div>

</div>

<div style="z-index:22">
<script>

/******************************************
* Snow Effect Script- By Altan d.o.o. (http://www.altan.hr/snow/index.html)
* Visit Dynamic Drive DHTML code library (http://www.dynamicdrive.com/) for full source code
* Last updated Nov 9th, 05' by DD. This notice must stay intact for use
******************************************/
  
var snowsrc="snow.gif"
var no = 10;

var dx, xp, yp;
var am, stx, sty;
var i, doc_width = 800, doc_height = 600; 
  
if (typeof window.innerWidth != 'undefined')
{
   doc_width = window.innerWidth;
   doc_height = window.innerHeight;
}
else 
if (typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0)
{
   doc_width = document.documentElement.clientWidth;
   doc_height = document.documentElement.clientHeight;
}
else
{
   doc_width = document.getElementsByTagName('body')[0].clientWidth;
   doc_height = document.getElementsByTagName('body')[0].clientHeight;
}

dx = new Array();
xp = new Array();
yp = new Array();
am = new Array();
stx = new Array();
sty = new Array();

for (i = 0; i < no; ++ i) 
{  
   dx[i] = 0;
   xp[i] = Math.random()*(doc_width-50);
   yp[i] = Math.random()*doc_height;
   am[i] = Math.random()*20;
   stx[i] = 0.02 + Math.random()/10;
   sty[i] = 0.7 + Math.random();

   if (i == 0) 
   {
      document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><a href=\"http://dynamicdrive.com\"><img src='"+snowsrc+"' border=\"0\"><\/a><\/div>");
   } 
   else 
   {
      document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
   }
}

function DoSnow() 
{
   for (i = 0; i < no; ++ i) 
   {
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) 
      {
         xp[i] = Math.random()*(doc_width-am[i]-30);
         yp[i] = 0;
         stx[i] = 0.02 + Math.random()/10;
         sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
   }
   snowtimer=setTimeout("DoSnow()", 10);
}

setTimeout("DoSnow()", 500);

</script></div>
</body>
</html>