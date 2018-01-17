<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   header('Location: ./index.php');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      header('Location: ./index.php');
      exit;
   }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./logoutuser.php');
   exit;
}
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html lang="fr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="rynnalogofavicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="Sans titre.png" rel="apple-touch-icon" sizes="229x231">
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="sessionmse.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.lazyload.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="./searchindex.js"></script>
<script>
var features = '';
var searchDatabase = new SearchDatabase();
var searchResults_length = 0;
var searchResults = new Object();
function searchPage(features)
{
   var element = document.getElementById('SiteSearch1');
   if (element.value.length != 0 || element.value != " ")
   {
      var value = unescape(element.value);
      var keywords = value.split(" ");
      searchResults_length = 0;
      for (var i=0; i<database_length; i++)
      {
         var matches = 0;
         var words = searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords;
         for (var j = 0; j < keywords.length; j++)
         {
            var pattern = new RegExp(keywords[j], "i");
            var result = words.search(pattern);
            if (result >= 0)
            {
               matches++;
            }
            else
            {
               matches = 0;
            }
         }
         if (matches == keywords.length)
         {
            searchResults[searchResults_length++] = searchDatabase[i];
         }
      }
      $('#SiteSearch1_dialog').dialog('open');
      $('#SiteSearch1_dialog').empty();
      var html = '';
      var results = '';
      html = html + '<span style="font-family:Arial;font-size:13px;color:#000000">';
      for (var n=0; n<searchResults_length; n++)
      {
         var page_keywords = searchResults[n].keywords;
         results = results + '<strong><a style="color:#0000FF" href="'+searchResults[n].url+'">'+searchResults[n].title +'<\/a><\/strong><br>Listes : ' + page_keywords +'<br><br>';
      }
      if (searchResults_length == 0)
      {
         results = 'Aucun resultat';
      }
      else
      {
         html = html + searchResults_length;
         html = html + 'Resultats : ';
         html = html + value;
         html = html + '<br><br>';
      }
      html = html + results;
      html = html + '<\/span>';
      $('#SiteSearch1_dialog').html(html);
      $('#SiteSearch1_dialog').dialog('option', 'position', 'center');
   }
   return false;
}
function searchParseURL()
{
   var url = decodeURIComponent(window.location.href);
   if (url.indexOf('?') > 0)
   {
      var terms = '';
      var params = url.split('?');
      var values = params[1].split('&');
      for (var i=0;i<values.length;i++)
      {
         var param = values[i].split('=');
         if (param[0] == 'q')
         {
            terms = unescape(param[1]);
            break;
         }
      }
      if (terms != '')
      {
         var element = document.getElementById('SiteSearch1');
         element.value = terms;
         searchPage('');
      }
   }
}
</script>
<script>
function ValidatejQueryDialog32(theForm)
{
   var regexp;
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox1.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"Editbox1\" field.");
      theForm.Editbox1.focus();
      return false;
   }
   return true;
}
</script>
<script src="wb.fileuploader.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var jQueryDialog3Options =
   {
      width: 514,
      height: 386,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog3'} 
   };
   $("#jQueryDialog3").dialog(jQueryDialog3Options);
   var jQueryDialog4Options =
   {
      width: 400,
      height: 509,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog4'} 
   };
   $("#jQueryDialog4").dialog(jQueryDialog4Options);
   var jQueryDialog5Options =
   {
      width: 994,
      height: 591,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog5'} 
   };
   $("#jQueryDialog5").dialog(jQueryDialog5Options);
   var jQueryDialog8Options =
   {
      width: 1078,
      height: 636,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog8'} 
   };
   $("#jQueryDialog8").dialog(jQueryDialog8Options);
   var jQueryDialog14Options =
   {
      width: 931,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog14'} 
   };
   $("#jQueryDialog14").dialog(jQueryDialog14Options);
   var jQueryDialog19Options =
   {
      width: 507,
      height: 196,
      position: { my: 'center', at: 'center', of: window },
      buttons:
      {
         "Annuler": function()
         {
            $(this).dialog("close");
         }
      },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog19'} 
   };
   $("#jQueryDialog19").dialog(jQueryDialog19Options);
   var jQueryDialog23Options =
   {
      width: 883,
      height: 590,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog23'} 
   };
   $("#jQueryDialog23").dialog(jQueryDialog23Options);
   searchParseURL();
   $("#SiteSearch1_dialog").dialog(
   {
      width: 400,
      height: 300,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'puff',
      hide: 'puff',
      autoOpen: false,
      buttons: 
      {
         Fermer: function() 
         {
            $(this).dialog('close');
         }
      }
   });
   var jQueryDialog28Options =
   {
      width: 770,
      height: 765,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog28'} 
   };
   $("#jQueryDialog28").dialog(jQueryDialog28Options);
   var jQueryDialog7Options =
   {
      width: 808,
      height: 532,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog7'} 
   };
   $("#jQueryDialog7").dialog(jQueryDialog7Options);
   var jQueryDialog11Options =
   {
      width: 737,
      height: 524,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog11'} 
   };
   $("#jQueryDialog11").dialog(jQueryDialog11Options);
   var jQueryDialog33Options =
   {
      width: 893,
      height: 601,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog33'} 
   };
   $("#jQueryDialog33").dialog(jQueryDialog33Options);
   var jQueryDialog41Options =
   {
      width: 893,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog41'} 
   };
   $("#jQueryDialog41").dialog(jQueryDialog41Options);
   var jQueryDialog20Options =
   {
      width: 915,
      height: 536,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog20'} 
   };
   $("#jQueryDialog20").dialog(jQueryDialog20Options);
   var jQueryDialog16Options =
   {
      width: 947,
      height: 586,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog16'} 
   };
   $("#jQueryDialog16").dialog(jQueryDialog16Options);
   var jQueryDialog12Options =
   {
      width: 828,
      height: 566,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog12'} 
   };
   $("#jQueryDialog12").dialog(jQueryDialog12Options);
   var jQueryAccordion1Options =
   {
      event: 'click',
      animate: 'linear',
      icons: {header:'ui-icon-radio-off', activeHeader:'ui-icon-bullet'},
      header: 'h3',
      heightStyle: 'fill'
   };
   $("#jQueryAccordion1").accordion(jQueryAccordion1Options);
   var jQueryDialog27Options =
   {
      width: 738,
      height: 529,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog27'} 
   };
   $("#jQueryDialog27").dialog(jQueryDialog27Options);
   var jQueryDialog10Options =
   {
      width: 649,
      height: 496,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog10'} 
   };
   $("#jQueryDialog10").dialog(jQueryDialog10Options);
   var jQueryDialog29Options =
   {
      width: 417,
      height: 402,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog29'} 
   };
   $("#jQueryDialog29").dialog(jQueryDialog29Options);
   var jQueryDialog36Options =
   {
      width: 583,
      height: 383,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog36'} 
   };
   $("#jQueryDialog36").dialog(jQueryDialog36Options);
   var jQueryDialog37Options =
   {
      width: 722,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog37'} 
   };
   $("#jQueryDialog37").dialog(jQueryDialog37Options);
   var jQueryDialog38Options =
   {
      width: 747,
      height: 603,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog38'} 
   };
   $("#jQueryDialog38").dialog(jQueryDialog38Options);
   var jQueryDialog25Options =
   {
      width: 844,
      height: 560,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog25'} 
   };
   $("#jQueryDialog25").dialog(jQueryDialog25Options);
   var jQueryDialog24Options =
   {
      width: 860,
      height: 629,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog24'} 
   };
   $("#jQueryDialog24").dialog(jQueryDialog24Options);
   var jQueryDialog34Options =
   {
      width: 747,
      height: 232,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog34'} 
   };
   $("#jQueryDialog34").dialog(jQueryDialog34Options);
   var jQueryDialog40Options =
   {
      width: 981,
      height: 535,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog40'} 
   };
   $("#jQueryDialog40").dialog(jQueryDialog40Options);
   var jQueryDialog35Options =
   {
      width: 425,
      height: 252,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog35'} 
   };
   $("#jQueryDialog35").dialog(jQueryDialog35Options);
   var jQueryDialog49Options =
   {
      width: 968,
      height: 557,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog49'} 
   };
   $("#jQueryDialog49").dialog(jQueryDialog49Options);
   var jQueryDialog50Options =
   {
      modal: true,
      width: 640,
      height: 539,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog50'} 
   };
   $("#jQueryDialog50").dialog(jQueryDialog50Options);
   var jQueryTabs4Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs4").tabs(jQueryTabs4Options);
   var jQueryDialog30Options =
   {
      width: 496,
      height: 185,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog30'} 
   };
   $("#jQueryDialog30").dialog(jQueryDialog30Options);
   var jQueryDialog22Options =
   {
      width: 687,
      height: 479,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog22'} 
   };
   $("#jQueryDialog22").dialog(jQueryDialog22Options);
   var jQueryDialog54Options =
   {
      width: 917,
      height: 560,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog54'} 
   };
   $("#jQueryDialog54").dialog(jQueryDialog54Options);
   var jQueryDialog51Options =
   {
      width: 899,
      height: 540,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog51'} 
   };
   $("#jQueryDialog51").dialog(jQueryDialog51Options);
   var jQueryDialog56Options =
   {
      width: 904,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog56'} 
   };
   $("#jQueryDialog56").dialog(jQueryDialog56Options);
   var jQueryDialog57Options =
   {
      width: 972,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog57'} 
   };
   $("#jQueryDialog57").dialog(jQueryDialog57Options);
   var jQueryDialog58Options =
   {
      width: 904,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog58'} 
   };
   $("#jQueryDialog58").dialog(jQueryDialog58Options);
   var jQueryDialog59Options =
   {
      width: 904,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog59'} 
   };
   $("#jQueryDialog59").dialog(jQueryDialog59Options);
   var jQueryDialog60Options =
   {
      width: 972,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog60'} 
   };
   $("#jQueryDialog60").dialog(jQueryDialog60Options);
   var jQueryDialog61Options =
   {
      width: 904,
      height: 575,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog61'} 
   };
   $("#jQueryDialog61").dialog(jQueryDialog61Options);
   var jQueryDialog6Options =
   {
      modal: true,
      width: 467,
      height: 148,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog6'} 
   };
   $("#jQueryDialog6").dialog(jQueryDialog6Options);
   var jQueryDialog1Options =
   {
      width: 495,
      height: 454,
      position: { my: 'left top', at: 'left top+37', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: {effect: 'slide', direction: 'up'},
      hide: {effect: 'slide', direction: 'up'},
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
   var jQueryDialog21Options =
   {
      modal: true,
      width: 484,
      height: 197,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog21'} 
   };
   $("#jQueryDialog21").dialog(jQueryDialog21Options);
   var jQueryDialog18Options =
   {
      modal: true,
      width: 395,
      height: 156,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: 'highlight',
      hide: 'highlight',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog18'} 
   };
   $("#jQueryDialog18").dialog(jQueryDialog18Options);
   var jQueryDialog64Options =
   {
      width: 359,
      height: 167,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog64'} 
   };
   $("#jQueryDialog64").dialog(jQueryDialog64Options);
   var jQueryDialog65Options =
   {
      width: 624,
      height: 718,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog65'} 
   };
   $("#jQueryDialog65").dialog(jQueryDialog65Options);
   var jQueryDialog66Options =
   {
      width: 624,
      height: 718,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog66'} 
   };
   $("#jQueryDialog66").dialog(jQueryDialog66Options);
   var jQueryDialog67Options =
   {
      width: 901,
      height: 341,
      position: { my: 'left top', at: 'right bottom', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog67'} 
   };
   $("#jQueryDialog67").dialog(jQueryDialog67Options);
$('#wb_Extension1').FileUploader({ headings: ['Nom', 'Taille', 'Vider la liste'], script: 'fileuploader.php' });
   var jQueryDialog13Options =
   {
      width: 1092,
      height: 617,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog13'} 
   };
   $("#jQueryDialog13").dialog(jQueryDialog13Options);
   var jQueryDialog70Options =
   {
      width: 566,
      height: 399,
      position: { my: 'center top', at: 'center top', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog70'} 
   };
   $("#jQueryDialog70").dialog(jQueryDialog70Options);
   var jQueryDialog71Options =
   {
      width: 751,
      height: 521,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog71'} 
   };
   $("#jQueryDialog71").dialog(jQueryDialog71Options);
   var jQueryDialog72Options =
   {
      width: 920,
      height: 519,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog72'} 
   };
   $("#jQueryDialog72").dialog(jQueryDialog72Options);
   var jQueryDialog73Options =
   {
      width: 375,
      height: 242,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog73'} 
   };
   $("#jQueryDialog73").dialog(jQueryDialog73Options);
   $("#Layer8").stickylayer({orientation: 9, position: [0, 0], delay: 1});
   var jQueryDialog32Options =
   {
      width: 770,
      height: 634,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog32'} 
   };
   $("#jQueryDialog32").dialog(jQueryDialog32Options);
   $("#Layer12").stickylayer({orientation: 6, position: [20, 0], delay: 0});
   $("#Layer13").stickylayer({orientation: 6, position: [20, 0], delay: 0});
   $("#Layer19").stickylayer({orientation: 6, position: [20, 0], delay: 0});
   $("#Layer20").stickylayer({orientation: 6, position: [20, 0], delay: 0});
   $("#Layer22").stickylayer({orientation: 7, position: [0, 0], delay: 0});
   var jQueryDialog9Options =
   {
      width: 1010,
      height: 539,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog9'} 
   };
   $("#jQueryDialog9").dialog(jQueryDialog9Options);
   var jQueryDialog31Options =
   {
      width: 1005,
      height: 560,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog31'} 
   };
   $("#jQueryDialog31").dialog(jQueryDialog31Options);
   var jQueryDialog55Options =
   {
      width: 920,
      height: 570,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog55'} 
   };
   $("#jQueryDialog55").dialog(jQueryDialog55Options);
   var jQueryDialog68Options =
   {
      width: 1010,
      height: 548,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog68'} 
   };
   $("#jQueryDialog68").dialog(jQueryDialog68Options);
   var jQueryDialog75Options =
   {
      width: 936,
      height: 569,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog75'} 
   };
   $("#jQueryDialog75").dialog(jQueryDialog75Options);
   var jQueryDialog76Options =
   {
      width: 921,
      height: 559,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog76'} 
   };
   $("#jQueryDialog76").dialog(jQueryDialog76Options);
   var jQueryDialog62Options =
   {
      width: 1022,
      height: 560,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog62'} 
   };
   $("#jQueryDialog62").dialog(jQueryDialog62Options);
   $("#Layer25").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer29").stickylayer({orientation: 7, position: [0, 0], delay: 0});
   var jQueryDialog17Options =
   {
      modal: true,
      width: 488,
      height: 354,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog17'} 
   };
   $("#jQueryDialog17").dialog(jQueryDialog17Options);
   var jQueryDialog63Options =
   {
      modal: true,
      width: 504,
      height: 187,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: 'shake',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog63'} 
   };
   $("#jQueryDialog63").dialog(jQueryDialog63Options);
   var jQueryDialog77Options =
   {
      width: 616,
      height: 581,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog77'} 
   };
   $("#jQueryDialog77").dialog(jQueryDialog77Options);
   var jQueryDialog78Options =
   {
      width: 992,
      height: 566,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog78'} 
   };
   $("#jQueryDialog78").dialog(jQueryDialog78Options);
   var jQueryTabs2Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs2").tabs(jQueryTabs2Options);
   var jQueryDialog74Options =
   {
      modal: true,
      width: 572,
      height: 388,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog74'} 
   };
   $("#jQueryDialog74").dialog(jQueryDialog74Options);
   var jQueryDialog79Options =
   {
      width: 370,
      height: 341,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog79'} 
   };
   $("#jQueryDialog79").dialog(jQueryDialog79Options);
   var jQueryDialog80Options =
   {
      width: 370,
      height: 341,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog80'} 
   };
   $("#jQueryDialog80").dialog(jQueryDialog80Options);
   var jQueryDialog81Options =
   {
      width: 713,
      height: 529,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog81'} 
   };
   $("#jQueryDialog81").dialog(jQueryDialog81Options);
   var jQueryDialog82Options =
   {
      width: 515,
      height: 415,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog82'} 
   };
   $("#jQueryDialog82").dialog(jQueryDialog82Options);
   $("#Layer28").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   var jQueryDialog83Options =
   {
      width: 521,
      height: 278,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog83'} 
   };
   $("#jQueryDialog83").dialog(jQueryDialog83Options);
   var jQueryDialog84Options =
   {
      width: 684,
      height: 404,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog84'} 
   };
   $("#jQueryDialog84").dialog(jQueryDialog84Options);
   var jQueryDialog87Options =
   {
      width: 926,
      height: 523,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog87'} 
   };
   $("#jQueryDialog87").dialog(jQueryDialog87Options);
   var jQueryDialog2Options =
   {
      width: 630,
      height: 207,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
   $("#jQueryButton1").button();
   $("#jQueryButton2").button();
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $('img[data-src]').lazyload();
});
</script>
<!-- Insert Google Analytics code here -->
</head>
<body>
<div id="container">

<div id="jQueryDialog3" style="z-index:281;" title="Mes applications install&#233;es (Applis G&#233;n&#233;rales)">
<div id="wb_Text87" style="position:absolute;left:13px;top:88px;width:60px;height:14px;text-align:center;z-index:13;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Calculatrice</span></div>
<div id="wb_Image12" style="position:absolute;left:2px;top:9px;width:87px;height:87px;z-index:14;">
<a href="#" onclick="$('#jQueryDialog4').dialog('open');return false;"><img src="images/Calculatrice.png" id="Image12" alt=""></a></div>
<div id="wb_Image39" style="position:absolute;left:96px;top:12px;width:80px;height:80px;z-index:15;">
<a href="#" onclick="$('#jQueryDialog64').dialog('open');return false;"><img src="images/12472264_561929810626918_2272385936819492695_n(1).png" id="Image39" alt=""></a></div>
<div id="wb_Text93" style="position:absolute;left:98px;top:88px;width:70px;height:28px;text-align:center;z-index:16;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Simulateur Smartphone</span></div>
<div id="wb_MaterialIcon59" style="position:absolute;left:200px;top:21px;width:52px;height:54px;text-align:center;z-index:17;">
<a href="#" onclick="$('#jQueryDialog67').dialog('open');return false;"><div id="MaterialIcon59"><i class="material-icons">&#xe25a;</i></div></a></div>
<div id="wb_Text99" style="position:absolute;left:200px;top:86px;width:55px;height:32px;text-align:center;z-index:18;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Envoi rapides</span></div>
<div id="wb_MaterialIcon2" style="position:absolute;left:287px;top:21px;width:52px;height:54px;text-align:center;z-index:19;">
<a href="#" onclick="$('#jQueryDialog2').dialog('open');return false;"><div id="MaterialIcon2"><i class="material-icons">&#xe629;</i></div></a></div>
<div id="wb_Text3" style="position:absolute;left:279px;top:88px;width:70px;height:16px;text-align:center;z-index:20;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Afficheurs</span></div>
</div>

<div id="jQueryDialog4" style="z-index:282;" title="Calculatrice (system/program/calculatrice)">
<object data="addeosapps/calc.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog5" style="z-index:283;" title="Explorateur de fichiers - Votre espace personnel (50 Go maximum)">
<div id="jQueryTabs2" style="position:absolute;left:7px;top:9px;width:956px;height:519px;z-index:25;">
<ul>
<li><a href="#jquerytabs2-page-0"><span>Onglet 1</span></a></li>
<li><a href="#jquerytabs2-page-1"><span>Onglet 2</span></a></li>
<li><a href="#jquerytabs2-page-2"><span>Onglet 3</span></a></li>
</ul>
<div style="height:497px;" id="jquerytabs2-page-0">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="myexplorer.php">
</iframe><br />
</div>
<div style="height:497px;" id="jquerytabs2-page-1">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="myexplorer.php">
</iframe><br />
</div>
<div style="height:497px;" id="jquerytabs2-page-2">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="myexplorer.php">
</iframe><br />
</div>
</div>
</div>

<div id="jQueryDialog8" style="z-index:284;" title="Navigateur web Qwant (all&#233;g&#233;, sans onglet) [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/navigateur.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog14" style="z-index:285;" title="Editeur de texte (FullPro CK Series 2016)">
<object data="system/program/texteditor/editor.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog19" style="z-index:286;" title="Rynna Search (Rechercher une page du WebOS)">
<form name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:130px;top:49px;width:350px;height:20px;line-height:20px;z-index:28;" name="SiteSearch1" value="" spellcheck="false" placeholder="Rechercher un programme, une fen&#234;tre, un script"></form>
<div id="SiteSearch1_dialog" title="Resultats"></div>
<input type="button" id="Button15" onclick="searchPage();return false;" name="Search" value="Rechercher" style="position:absolute;left:383px;top:80px;width:96px;height:25px;z-index:29;">
<div id="wb_FontAwesomeIcon20" style="position:absolute;left:11px;top:16px;width:102px;height:89px;text-align:center;z-index:30;">
<a href="#" onclick="AnimateCss('wb_FontAwesomeIcon19', 'transform-3d-flip-in-y', 0, 1200);return false;"><div id="FontAwesomeIcon20"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
</div>

<div id="jQueryDialog23" style="z-index:287;" title="Jeu de Hasard (system/program/dee)">
<object data="addeosapps/deeint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog28" style="z-index:288;" title="WordPad - Editeur de texte avanc&#233;">
<object data="addeosapps/wordpad.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog7" style="z-index:289;" title="Informations sur votre location - M&#233;t&#233;o temps r&#233;el [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/meteo.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog11" style="z-index:290;" title="Param&#232;tres et aides suppl&#233;mentaires">
<div id="wb_MaterialIcon5" style="position:absolute;left:26px;top:24px;width:116px;height:118px;text-align:center;z-index:34;">
<a href="#" onclick="$('#jQueryDialog32').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon5"><i class="material-icons">&#xe88f;</i></div></a></div>
<div id="wb_Text1" style="position:absolute;left:22px;top:150px;width:124px;height:36px;text-align:center;z-index:35;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Informations sur le WebOS</strong></span></div>
<div id="wb_MaterialIcon6" style="position:absolute;left:205px;top:24px;width:116px;height:118px;text-align:center;z-index:36;">
<a href="#" onclick="$('#jQueryDialog33').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon6"><i class="material-icons">&#xe894;</i></div></a></div>
<div id="wb_Text4" style="position:absolute;left:201px;top:150px;width:124px;height:54px;text-align:center;z-index:37;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester la connexion internet</strong></span></div>
<div id="wb_MaterialIcon7" style="position:absolute;left:383px;top:24px;width:116px;height:118px;text-align:center;z-index:38;">
<a href="#" onclick="$('#jQueryDialog34').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon7"><i class="material-icons">&#xe0c8;</i></div></a></div>
<div id="wb_Text11" style="position:absolute;left:379px;top:150px;width:124px;height:36px;text-align:center;z-index:39;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Connaître mon adresse IP</strong></span></div>
<div id="wb_MaterialIcon8" style="position:absolute;left:566px;top:24px;width:116px;height:118px;text-align:center;z-index:40;">
<a href="#" onclick="$('#jQueryDialog35').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon8"><i class="material-icons">&#xe0da;</i></div></a></div>
<div id="wb_Text14" style="position:absolute;left:566px;top:150px;width:124px;height:36px;text-align:center;z-index:41;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Supprimer votre compte</strong></span></div>
<div id="wb_MaterialIcon9" style="position:absolute;left:23px;top:236px;width:116px;height:118px;text-align:center;z-index:42;">
<a href="#" onclick="$('#jQueryDialog36').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon9"><i class="material-icons">&#xe312;</i></div></a></div>
<div id="wb_Text16" style="position:absolute;left:19px;top:354px;width:124px;height:36px;text-align:center;z-index:43;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester mon clavier</strong></span></div>
<div id="wb_MaterialIcon10" style="position:absolute;left:205px;top:236px;width:116px;height:118px;text-align:center;z-index:44;">
<a href="#" onclick="$('#jQueryDialog37').dialog('open');Toggle('jQueryDialog11', 'fade', 500);return false;"><div id="MaterialIcon10"><i class="material-icons">&#xe3c4;</i></div></a></div>
<div id="wb_Text29" style="position:absolute;left:201px;top:354px;width:124px;height:54px;text-align:center;z-index:45;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Configuration de l'interface personnelle</strong></span></div>
<div id="wb_MaterialIcon11" style="position:absolute;left:383px;top:236px;width:116px;height:118px;text-align:center;z-index:46;">
<div id="MaterialIcon11"><i class="material-icons">&#xe8e8;</i></div></div>
<div id="wb_Text30" style="position:absolute;left:379px;top:354px;width:124px;height:36px;text-align:center;z-index:47;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Verifier la protection</strong></span></div>
<div id="wb_MaterialIcon12" style="position:absolute;left:570px;top:236px;width:116px;height:118px;text-align:center;z-index:48;">
<a href="#" onclick="$('#jQueryDialog38').dialog('open');return false;"><div id="MaterialIcon12"><i class="material-icons">&#xe8df;</i></div></a></div>
<div id="wb_Text31" style="position:absolute;left:566px;top:354px;width:124px;height:36px;text-align:center;z-index:49;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Calendrier détaillé</strong></span></div>
</div>

<div id="jQueryDialog33" style="z-index:291;" title="Test de votre connexion internet">
<div id="wb_MaterialIcon14" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:50;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog33').dialog('close');return false;"><div id="MaterialIcon14"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text33" style="position:absolute;left:23px;top:56px;width:639px;height:16px;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Testez votre connexion internet (débit montant/descendant)&nbsp;:</span></div>
<div id="Html19" style="position:absolute;left:22px;top:97px;width:846px;height:443px;z-index:52">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.ariase.com/fr/vitesse/">
</iframe><br /></div>
</div>

<div id="jQueryDialog41" style="z-index:292;" title="Gestionnaire de Jeux">
<object data="gamemanager.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog20" style="z-index:293;" title="D&#233;part RER SNCF par ville (system/program/sncfappli) [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/sncf.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog16" style="z-index:294;" title="StreetView">
<iframe
  width="100%"
  height="100%"
  frameborder="0" style="border:0"
  overflow="hidden"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCl0N46TIpQLmiE8fo-EqQef-zkC0lQuQQ
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>
</div>

<div id="jQueryDialog12" style="z-index:295;" title="Applications virtualis&#233;es">
<div id="wb_jQueryAccordion1" style="position:absolute;left:9px;top:11px;width:777px;height:430px;z-index:65;">
<div id="jQueryAccordion1">
<h3>Origine Windows</h3>
<div>
<div id="wb_Image8" style="position:absolute;left:3px;top:1px;width:82px;height:82px;z-index:56;">
<a href="javascript:popupwnd('https://office.live.com/start/Word.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/word-live.png" id="Image8" alt="" title="Office 2016 (gratuit) - Word"></a></div>
<div id="wb_Image11" style="position:absolute;left:137px;top:1px;width:82px;height:82px;z-index:57;">
<a href="javascript:popupwnd('https://office.live.com/start/PowerPoint.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/powerpoint-live.png" id="Image11" alt="" title="Office 2016 (gratuit) - PowerPoint"></a></div>
<div id="wb_Image14" style="position:absolute;left:207px;top:1px;width:80px;height:80px;z-index:58;">
<a href="javascript:popupwnd('https://keep.google.com/u/0/#home','no','no','no','yes','yes','no','20','20','950','650')" target="_self"><img src="images/keep-512.png" id="Image14" alt="" title="Google Keep - Bloc-Notes"></a></div>
<div id="wb_Image9" style="position:absolute;left:71px;top:1px;width:82px;height:82px;z-index:59;">
<a href="javascript:popupwnd('https://office.live.com/start/Excel.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/excel-live.png" id="Image9" alt="" title="Office 2016 (gratuit) - Excel"></a></div>
</div>
<h3>Origine Linux</h3>
<div>
<div id="wb_Image1" style="position:absolute;left:3px;top:2px;width:85px;height:85px;z-index:60;">
<a href="#" onclick="$('#jQueryDialog82').dialog('open');return false;"><img src="images/diJXUfgE_400x400.png" id="Image1" alt=""></a></div>
</div>
<h3>Origine MAC OSx</h3>
<div>
<div id="wb_Image7" style="position:absolute;left:5px;top:4px;width:89px;height:89px;z-index:61;">
<a href="#" onclick="$('#jQueryDialog79').dialog('open');return false;"><img src="images/256x256bb.png" id="Image7" alt=""></a></div>
<div id="wb_Image16" style="position:absolute;left:82px;top:4px;width:89px;height:89px;z-index:62;">
<a href="#" onclick="$('#jQueryDialog80').dialog('open');return false;"><img src="images/aplus-flv-to-apple-tv-converter.png" id="Image16" alt=""></a></div>
<div id="wb_Image17" style="position:absolute;left:155px;top:5px;width:89px;height:89px;z-index:63;">
<a href="#" onclick="$('#jQueryDialog81').dialog('open');return false;"><img src="images/Calculatrice_apple.png" id="Image17" alt=""></a></div>
</div>
<h3>Origine Android</h3>
<div>
<div id="wb_Text27" style="position:absolute;left:16px;top:12px;width:717px;height:80px;z-index:64;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Pour le moment aucune application Android n'est virtualisées. Si vous avez en votre possession des applications Android virtualisées fonctionnant via internet vous pouvez les proposer à l'aide du programme&nbsp;&quot;Déposer vos Applis&quot;&nbsp;disponible dans le Menu Applicatifs du WebOS.<br><br>Merci pour votre contribution&nbsp;!</em></span></div>
</div>
</div>
</div>
</div>

<div id="jQueryDialog27" style="z-index:296;" title="Docteur Flashy - Analyse de votre ordinateur">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/doctorflashy.php">
</iframe>
</div>

<div id="jQueryDialog10" style="z-index:297;" title="Chat WebOS (Publique)">
<!-- Debut shoutbox - https://www.i-tchat.com -->
<iframe src="https://www.i-tchat.com/shoutbox/shoutbox.php?idShoutbox=130310" width="100%" height="100%" frameborder="0" allowtransparency="true" >Votre navigateur semble incompatible, essayez d'ouvrir le <a href="https://www.i-tchat.com" title="tchat" onClick="window.open(this.href+'?130310');">tchat</a>, ou rencontrez le webmaster pour plus d'informations.</iframe>
<br />Agrandir le <a href="https://www.i-tchat.com/?130310" onClick="window.open(this.href);return false;">chat</a> .
<!-- Fin shoutbox -->
</div>

<div id="jQueryDialog29" style="z-index:298;" title="AVERTISSEMENT">
<div id="wb_Text6" style="position:absolute;left:13px;top:16px;width:379px;height:272px;z-index:77;">
<span style="color:#000000;font-family:Arial;font-size:15px;">AVERTISSEMENT concernant l'utilisation du Chat publique.<br><br>Ce Chat vous permet de discuter entre tout les utilisateurs en ligne du WebOS.<br><br>Veuillez être polis et respectueux.<br>Toutes personnes utilisant le Chat en étant grossier, malveillants ou en publiant des choses illégales verra son compte fermé et son IP banni.<br><br>Nous autorisons la publicité sur ce Chat pour faire partager vos projets, vos actions ou votre entreprise, mais veuillez ne pas en abuser.<br><br>Merci pour votre compréhension.</span></div>
<input type="submit" id="Button6" onclick="$('#jQueryDialog10').dialog('open');$('#jQueryDialog29').dialog('close');return false;" name="" value="J'accepte les conditions" style="position:absolute;left:15px;top:309px;width:374px;height:25px;z-index:78;">
</div>

<div id="jQueryDialog36" style="z-index:299;" title="Configuration clavier">
<div id="wb_MaterialIcon17" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:79;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog36').dialog('close');return false;"><div id="MaterialIcon17"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text35" style="position:absolute;left:73px;top:19px;width:249px;height:16px;z-index:80;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Paramètrage du clavier&nbsp;:</span></div>
<div id="wb_Text36" style="position:absolute;left:14px;top:76px;width:141px;height:16px;z-index:81;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Langue du clavier&nbsp;: </span></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:165px;top:70px;width:176px;height:28px;z-index:82;">
<option selected value="fr-FR">Français (French)</option>
<option value="en-US">Anglais (English)</option>
</select>
<input type="text" id="Editbox1" style="position:absolute;left:10px;top:126px;width:529px;height:16px;line-height:16px;z-index:83;" name="Editbox1" value="Tester votre clavier : " spellcheck="false">
<div id="Html60" style="position:absolute;left:11px;top:167px;width:536px;height:153px;z-index:84">
<html>
<body>

<script>

if (document.body)
{
var larg = screen.width;
var haut = screen.height;
}

document.write("Cette fenêtre de navigateur fait " + larg + " de large et "+haut+" de haut");

</script>

<script>
document.write("<div style='font-family:Arial;font-size:12px;color:#000000;text-decoration:none;font-weight:normal;font-style:normal;text-align:left;text-decoration:none'>" + navigator.appName + " " + navigator.appVersion + "<\/div>");
</script>

</body>
</html> </div>
</div>

<div id="jQueryDialog37" style="z-index:300;" title="Configuration de votre interface personnelle">
<div id="wb_Text9" style="position:absolute;left:29px;top:30px;width:598px;height:19px;z-index:85;">
<span style="color:#FF0000;font-family:Arial;font-size:16px;"><strong>NON AUTORISE EN MODE SANS ECHEC&nbsp;!</strong></span></div>
</div>

<div id="jQueryDialog38" style="z-index:301;" title="Calendrier d&#233;taill&#233;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.2017calendrier.fr/">
</iframe><br />
</div>

<div id="jQueryDialog25" style="z-index:302;" title="Calculateur Euro (system/program/eurocalc)">
<object data="addeosapps/calceuro.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog24" style="z-index:303;" title="Horloge interactive (system/program/horloge)">
<object data="addeosapps/horlogeint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog34" style="z-index:304;" title="Affichage de votre adresse IP [Service non fonctionnel en HTTPS]">
<div id="wb_MaterialIcon15" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:89;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog34').dialog('close');return false;"><div id="MaterialIcon15"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="Html21" style="position:absolute;left:51px;top:10px;width:666px;height:153px;z-index:90">
ADRESSE IP : 
<?

echo $_SERVER["REMOTE_ADDR"];

?></div>
</div>

<div id="jQueryDialog40" style="z-index:305;" title="Editeur 3D Tridiv CSS 3 [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/tridiv3d.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog35" style="z-index:306;" title="Supprimer votre compte">
<div id="wb_Text34" style="position:absolute;left:12px;top:61px;width:377px;height:112px;z-index:92;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour supprimer votre compte pour l'instant vous devez écrire un mail à support@rynnawebos.fr<br><br>Votre compte sera alors supprimé (ainsi que vos fichiers hébergés) dans les 72 heures.<br><br>Merci pour votre patience.</span></div>
<div id="wb_MaterialIcon16" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:93;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog35').dialog('close');return false;"><div id="MaterialIcon16"><i class="material-icons">&#xe5cb;</i></div></a></div>
</div>

<script>
var wb_Timer6;
function TimerStartTimer6()
{
   wb_Timer6 = setTimeout(function()
   {
      var event = null;
      ShowObject('MaterialIcon24', 0);
      ShowObject('Text13', 0);
   }, 500);
}
function TimerStopTimer6()
{
   clearTimeout(wb_Timer6);
}
</script>

<script>
var wb_Timer7;
function TimerStartTimer7()
{
   wb_Timer7 = setTimeout(function()
   {
      var event = null;
      window.confirm('Impression effectuée');;
   }, 1000);
}
function TimerStopTimer7()
{
   clearTimeout(wb_Timer7);
}
</script>

<div id="jQueryDialog49" style="z-index:309;" title="Fitness (Studio) avec g&#233;olocalisation">
<object data="addeosapps/fitness.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog50" title="Gestionnaire de t&#226;ches avanc&#233;s">
<div id="wb_Text47" style="position:absolute;left:11px;top:15px;width:592px;height:48px;z-index:113;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour votre sécurité les pointeurs et la barre de tâches ont été actualisés.<br>Vous pouvez découvrir ici les applications principales du WebOS et gérer leurs fonctionnements ci-dessous&nbsp;:</span></div>
<div id="jQueryTabs4" style="position:absolute;left:10px;top:73px;width:584px;height:398px;z-index:114;">
<ul>
<li><a href="#jquerytabs4-page-0"><span>Forcage fermeture</span></a></li>
<li><a href="#jquerytabs4-page-1"><span>Information navigateur</span></a></li>
</ul>
<div style="height:376px;" id="jquerytabs4-page-0">
<input type="button" id="Button10" onclick="$('#jQueryDialog1').dialog('close');return false;" name="" value="Menu Applicatifs" style="position:absolute;left:16px;top:58px;width:251px;height:25px;z-index:95;">
<input type="button" id="Button11" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Applis installées" style="position:absolute;left:309px;top:58px;width:251px;height:25px;z-index:96;">
<input type="button" id="Button13" onclick="$('#jQueryDialog9').dialog('close');return false;" name="" value="Application Windows" style="position:absolute;left:16px;top:93px;width:251px;height:25px;z-index:97;">
<input type="button" id="Button14" onclick="$('#jQueryDialog13').dialog('close');return false;" name="" value="Messagerie NetCourriel" style="position:absolute;left:309px;top:93px;width:251px;height:25px;z-index:98;">
<input type="button" id="Button16" onclick="$('#jQueryDialog31').dialog('close');return false;" name="" value="Dépôt Applications" style="position:absolute;left:16px;top:130px;width:251px;height:25px;z-index:99;">
<input type="button" id="Button17" onclick="$('#jQueryDialog16').dialog('close');return false;" name="" value="Street View" style="position:absolute;left:309px;top:130px;width:251px;height:25px;z-index:100;">
<input type="button" id="Button18" onclick="$('#jQueryDialog12').dialog('close');return false;" name="" value="Applications virtualisées" style="position:absolute;left:16px;top:167px;width:251px;height:25px;z-index:101;">
<input type="button" id="Button19" onclick="$('#jQueryDialog10').dialog('close');return false;" name="" value="Chat WebOS" style="position:absolute;left:309px;top:167px;width:251px;height:25px;z-index:102;">
<input type="button" id="Button20" onclick="$('#jQueryDialog40').dialog('close');return false;" name="" value="Editeur 3D Tridiv" style="position:absolute;left:16px;top:204px;width:251px;height:25px;z-index:103;">
<input type="button" id="Button21" onclick="ShowObject('jQueryDialog42', 0);return false;" name="" value="Applications d'Entreprise" style="position:absolute;left:309px;top:204px;width:251px;height:25px;z-index:104;">
<input type="button" id="Button22" onclick="$('#jQueryDialog11').dialog('close');return false;" name="" value="Paramètres et Aides" style="position:absolute;left:16px;top:240px;width:251px;height:25px;z-index:105;">
<input type="button" id="Button23" onclick="$('#jQueryDialog41').dialog('close');return false;" name="" value="Gestionnaire de jeux" style="position:absolute;left:309px;top:240px;width:251px;height:25px;z-index:106;">
<input type="button" id="Button24" onclick="$('#jQueryDialog19').dialog('close');return false;" name="" value="Terminal renseignements" style="position:absolute;left:16px;top:278px;width:251px;height:25px;z-index:107;">
<input type="button" id="Button25" onclick="$('#jQueryDialog8').dialog('close');return false;" name="" value="Navigateur Web Qwant" style="position:absolute;left:309px;top:278px;width:251px;height:25px;z-index:108;">
<input type="button" id="Button26" onclick="$('#jQueryDialog5').dialog('close');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:16px;top:315px;width:251px;height:25px;z-index:109;">
<input type="button" id="Button27" onclick="$('#jQueryDialog21').dialog('close');return false;" name="" value="Fenêtre de Bienvenue" style="position:absolute;left:309px;top:315px;width:251px;height:25px;z-index:110;">
<div id="wb_Text49" style="position:absolute;left:16px;top:372px;width:513px;height:16px;z-index:111;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information&nbsp;: les programmes doivent être ouverts à l'écran pour être fermés.</span></div>
</div>
<div style="height:376px;" id="jquerytabs4-page-1">
<div id="wb_JavaScript2" style="position:absolute;left:21px;top:59px;width:555px;height:301px;z-index:112;">
<script>
document.write("<div style='font-family:Arial;font-size:14px;color:#000000;text-decoration:none;font-weight:normal;font-style:normal;text-align:left;text-decoration:none'>" + navigator.appName + " " + navigator.appVersion + "<\/div>");
</script>


</div>
</div>
</div>
</div>

<script>
var wb_Timer8;
function TimerStartTimer8()
{
   wb_Timer8 = setTimeout(function()
   {
      var event = null;
      ShowObject('wb_PageHeader', 1);
      $('#jQueryDialog50').dialog('open');
   }, 1000);
}
function TimerStopTimer8()
{
   clearTimeout(wb_Timer8);
}
</script>

<div id="jQueryDialog30" style="z-index:312;" title="Concepteur d&#39;application Web (alpha 0.3)">
<input type="submit" id="Button3" onclick="$('#jQueryDialog22').dialog('open');$('#jQueryDialog30').dialog('close');return false;" name="" value="Ouvrir le concepteur d'application Web (version PHP/HTML)" style="position:absolute;left:45px;top:86px;width:404px;height:25px;z-index:133;">
<div id="wb_Text8" style="position:absolute;left:15px;top:17px;width:451px;height:48px;text-align:justify;z-index:134;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Notre équipe remercie grandement Maxime G., développeur Web et ami, pour son aide à la conception du Concepteur d'Applications Web côté PHP et pour la sécurité du système.</span></div>
</div>

<div id="jQueryDialog22" style="z-index:313;" title="Concepteur d&#39;applications Web (version PHP)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="generatiug/generatiugtest.php">
</iframe><br />
</div>

<div id="jQueryDialog54" style="z-index:314;" title="Applis Web Communautaires">
Faite un clique droit sur ce texte puis choisissez RETOUR pour quitter une applis Web et revenir à sa racine.
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="exploreriug.php">
</iframe><br />
</div>

<script>
var wb_Timer1;
function TimerStartTimer1()
{
   wb_Timer1 = setTimeout(function()
   {
      var event = null;
      $('#jQueryDialog55').dialog('close');
   }, 30000);
}
function TimerStopTimer1()
{
   clearTimeout(wb_Timer1);
}
</script>

<div id="jQueryDialog51" style="z-index:316;" title="Forum Veler Software (d&#233;veloppement Rynna WebOS et divers projets)">
<object data="http://forumvelersoftware.bbactif.com/t2085-rynna-webos-natif-projet-mini-webos-by-algostep-company" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog56" style="z-index:317;" title="Ipiccy - Retouches photos en ligne">
<object data="addeosapps/ipiccy.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog57" style="z-index:318;" title="Le Bon Coin - Ventes et achats en ligne en France">
<object data="addeosapps/leboncoin.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog58" style="z-index:319;" title="Orange TV - toutes vos chaines en ligne (stream)">
<object data="addeosapps/orangetv.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog59" style="z-index:320;" title="PrintFriendly - Votre page web au format PDF imprimable">
<object data="addeosapps/webpdf.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog60" style="z-index:321;" title="01net - Blog, actualit&#233;s et logiciels informatiques et nouvelle technologie [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/01net.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog61" style="z-index:322;" title="CDiscount [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/cdiscount.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog6" title="Que souhaitez-vous faire ?">
<input type="button" id="Button28" onclick="$('#jQueryDialog6').dialog('close');return false;" name="" value="Annuler et revenir au bureau" style="position:absolute;left:18px;top:58px;width:420px;height:25px;z-index:144;">
<div id="wb_Logout1" style="position:absolute;left:18px;top:18px;width:418px;height:23px;z-index:145;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Fermer la session maintenant" id="Logout1">
</form>
</div>
</div>

<div id="jQueryDialog1" style="z-index:324;" title="Menu Applicatifs (MODE SANS ECHEC)">
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:12px;top:12px;width:72px;height:64px;text-align:center;z-index:146;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon2"><i class="fa fa-laptop">&nbsp;</i></div></a></div>
<div id="wb_Text2" style="position:absolute;left:7px;top:84px;width:77px;height:28px;text-align:center;z-index:147;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis générales</span></div>
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:202px;top:14px;width:73px;height:61px;text-align:center;z-index:148;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon4"><i class="fa fa-folder-open-o">&nbsp;</i></div></a></div>
<div id="wb_Text12" style="position:absolute;left:199px;top:82px;width:76px;height:28px;text-align:center;z-index:149;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Explorateur Fichiers</span></div>
<div id="wb_FontAwesomeIcon18" style="position:absolute;left:396px;top:15px;width:70px;height:54px;text-align:center;z-index:150;">
<a href="#" onclick="$('#jQueryDialog32').dialog('close');$('#jQueryDialog33').dialog('close');$('#jQueryDialog34').dialog('close');$('#jQueryDialog35').dialog('close');$('#jQueryDialog36').dialog('close');$('#jQueryDialog37').dialog('close');$('#jQueryDialog38').dialog('close');ShowObject('jQueryDialog39', 0);$('#jQueryDialog11').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon18"><i class="fa fa-gears">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon19" style="position:absolute;left:109px;top:15px;width:64px;height:56px;text-align:center;z-index:151;">
<a href="#" onclick="$('#jQueryDialog19').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon19"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
<div id="wb_Text25" style="position:absolute;left:393px;top:84px;width:77px;height:28px;text-align:center;z-index:152;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Paramètres &amp; Aides</span></div>
<div id="wb_Text52" style="position:absolute;left:103px;top:85px;width:73px;height:14px;text-align:center;z-index:153;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Rynna Search</span></div>
<div id="wb_JavaScript3" style="position:absolute;left:320px;top:378px;width:147px;height:23px;z-index:154;">
<div style="color:#FFFFFF;font-size:14px;font-family:Arial;font-weight:normal;font-style:normal;text-align:right;text-decoration:none" id="basicclock"></div>
<script>
function clock() 
{
   var digital = new Date();
   var hours = digital.getHours();
   var minutes = digital.getMinutes();
   var seconds = digital.getSeconds();
   if (minutes <= 9) minutes = "0" + minutes;
   if (seconds <= 9) seconds = "0" + seconds;
   dispTime = hours + ":" + minutes + ":" + seconds;

   var basicclock = document.getElementById('basicclock');
   basicclock.innerHTML = dispTime;
   setTimeout("clock()", 1000);
}
clock();
</script>

</div>
<hr id="Line1" style="position:absolute;left:15px;top:366px;width:452px;z-index:155;">
<div id="wb_LoginName1" style="position:absolute;left:17px;top:378px;width:278px;height:23px;z-index:156;">
<span id="LoginName1">Bienvenue <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'dans la session de demonstration';
}
?> !</span></div>
<div id="wb_MaterialIcon26" style="position:absolute;left:303px;top:13px;width:70px;height:59px;text-align:center;z-index:157;">
<a href="#" onclick="$('#jQueryDialog83').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="MaterialIcon26"><i class="material-icons">&#xe1b2;</i></div></a></div>
<div id="wb_Text28" style="position:absolute;left:306px;top:82px;width:64px;height:28px;text-align:center;z-index:158;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Gestionnaire Serveur</span></div>
<html>
   <body>
<script>

if (document.body)
{
var larg = screen.width;
var haut = screen.height;
var ipconfig = "127.0.0.1";
var vectx = ".1,em,0";
var vecty = ".-0.1,em,0";
var fx1a = "0";
var fx1b = "0";
var krnlprg = "rynnawebos-jquery";
var loginusrsx = "./login";
var classcore = "rynnawebosv3.themeroller";
var editeur = "AlgoStep Company";
var csd = "1x999";
var csg = "1x000";
var cid = "0x999";
var cig = "0x000";
<!-- Affichera la variable de la session sous la forme   '[username]'; -->
var usrxbg='<?php echo $_SESSION['username'];?>';
}
</script>
</body>
</html> 
</div>

<div id="jQueryDialog21" title="Oups !">
<div id="wb_Text103" style="position:absolute;left:15px;top:19px;width:438px;height:112px;z-index:160;">
<span style="color:#DC143C;font-family:Arial;font-size:13px;"><strong>Une erreur est survenue&nbsp;!<br>Nous ne pouvons rien faire pour vous...<br><br>Nous vous conseillons d'attendre une mise à jour du WebOS pour poursuivre l'action demandée.<br><br>Merci pour votre patience.</strong></span></div>
</div>

<div id="jQueryDialog18" title="Modifier votre session ?">
<div id="wb_Text89" style="position:absolute;left:9px;top:12px;width:364px;height:48px;text-align:justify;z-index:164;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Souhaitez-vous vraiment modifier votre session&nbsp;?</strong><br>Cela entrainera une fermeture de votre session mais ne vous deconnectera pas (vos Cookies doivent être autorisées).</span></div>
<input type="button" id="Button29" onclick="$('#jQueryDialog18').dialog('close');return false;" name="" value="NON" style="position:absolute;left:11px;top:81px;width:96px;height:25px;z-index:165;">
<input type="submit" id="Button30" onclick="window.location.href='./modifuser.php';return false;" name="" value="OUI" style="position:absolute;left:262px;top:81px;width:96px;height:25px;z-index:166;">
</div>

<div id="jQueryDialog64" style="z-index:327;" title="Simulateur Smartphone (0.4)">
<input type="button" id="Button31" onclick="$('#jQueryDialog65').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur iPhone X" style="position:absolute;left:20px;top:28px;width:317px;height:25px;z-index:167;">
<input type="button" id="Button32" onclick="$('#jQueryDialog66').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur Samsung Galaxy s8" style="position:absolute;left:20px;top:68px;width:317px;height:25px;z-index:168;">
</div>

<div id="jQueryDialog65" style="z-index:328;" title="Simulateur iPhone X (test de sites Web et WebApps)">
<div id="Layer30" style="position:absolute;text-align:left;left:59px;top:42px;width:253px;height:40px;z-index:169;">
</div>
<div id="wb_Image40" style="position:absolute;left:31px;top:25px;width:307px;height:616px;z-index:170;">
<img src="images/nue_iphone8_design_final_2018.png" id="Image40" alt=""></div>
<div id="Html18" style="position:absolute;left:51px;top:42px;width:268px;height:585px;overflow:hidden;z-index:171">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<div id="wb_Image41" style="position:absolute;left:101px;top:42px;width:178px;height:29px;z-index:172;">
<img src="images/iphone8_simulation_haut.png" id="Image41" alt=""></div>
<div id="wb_MaterialIcon57" style="position:absolute;left:544px;top:25px;width:40px;height:41px;text-align:center;z-index:173;">
<div id="MaterialIcon57"><i class="material-icons">&#xe5d5;</i></div></div>
<input type="button" id="Button33" name="" value="Action bouton central (sous écran)" style="position:absolute;left:354px;top:109px;width:222px;height:25px;z-index:174;" disabled>
<input type="button" id="Button34" name="" value="Page précédente" style="position:absolute;left:354px;top:150px;width:222px;height:25px;z-index:175;" disabled>
<input type="button" id="Button35" name="" value="Page suivante" style="position:absolute;left:354px;top:193px;width:222px;height:25px;z-index:176;" disabled>
<input type="button" id="Button36" onclick="window.confirm('iOS 11');return false;" name="" value="Version iOS" style="position:absolute;left:354px;top:237px;width:222px;height:25px;z-index:177;">
<input type="button" id="Button37" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog65').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:354px;top:616px;width:222px;height:25px;z-index:178;">
<div id="wb_Text97" style="position:absolute;left:-1px;top:6px;width:474px;height:15px;z-index:179;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog66" style="z-index:329;" title="Simulateur Samsung Galaxy s8 (test de sites Web et WebApps)">
<div id="wb_Image42" style="position:absolute;left:55px;top:16px;width:301px;height:642px;z-index:180;">
<img src="images/Samsung-Galaxy-S8-0.png" id="Image42" alt=""></div>
<div id="Html20" style="position:absolute;left:70px;top:57px;width:270px;height:563px;overflow:hidden;z-index:181">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<div id="wb_MaterialIcon58" style="position:absolute;left:560px;top:25px;width:40px;height:41px;text-align:center;z-index:182;">
<div id="MaterialIcon58"><i class="material-icons">&#xe5d5;</i></div></div>
<input type="button" id="Button38" name="" value="Action bouton central (sous écran)" style="position:absolute;left:370px;top:109px;width:222px;height:25px;z-index:183;" disabled>
<input type="button" id="Button39" name="" value="Page précédente" style="position:absolute;left:370px;top:150px;width:222px;height:25px;z-index:184;" disabled>
<input type="button" id="Button40" name="" value="Page suivante" style="position:absolute;left:370px;top:193px;width:222px;height:25px;z-index:185;" disabled>
<input type="button" id="Button41" onclick="window.confirm('Android 7.0');return false;" name="" value="Version Android" style="position:absolute;left:370px;top:237px;width:222px;height:25px;z-index:186;">
<input type="button" id="Button42" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog66').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:370px;top:627px;width:222px;height:25px;z-index:187;">
<div id="wb_Text98" style="position:absolute;left:8px;top:6px;width:474px;height:15px;z-index:188;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog67" style="z-index:330;" title="Envoi rapide">
<div id="wb_Extension1" style="position:absolute;left:21px;top:66px;width:845px;height:212px;z-index:189;">
<div id="Extension1">
<div class="upload-drop-target"><h2>Glisser et déposer vos fichiers dans ce cadre (jpg, jpeg, gif ou png)</h2></div>
<input type="file" multiple="">
<div class="upload-selected"></div>
<a class="button upload-choose" href="#">Choisir des fichiers</a>
<a class="button upload-submit" href="#">Envoyer</a>
</div>
</div>
<div id="wb_Text100" style="position:absolute;left:27px;top:13px;width:832px;height:48px;z-index:190;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Déposer sur le serveur une image de votre choix (taille limite&nbsp;: 4mo par image)<br>Pour partager votre image notez le chemin&nbsp;: </span><span style="color:#0000CD;font-family:Arial;font-size:13px;"><strong>http://rynnawebos.fr/login/uploads/[le nom de votre fichier].[son extension]</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;">&nbsp; et partagez le à vos amies&nbsp;!</span></div>
</div>

<div id="jQueryDialog13" style="z-index:331;" title="Messagerie personelle Europ&#233;enne (Net Courriel)">
<object data="addeosapps/messagerienetc.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<script>
var wb_Timer10;
function TimerStartTimer10()
{
   wb_Timer10 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer4', 0);
   }, 25);
}
function TimerStopTimer10()
{
   clearTimeout(wb_Timer10);
}
TimerStartTimer10();
</script>

<div id="jQueryDialog70" style="z-index:333;" title="Webcam">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/webcam.php">
</iframe><br />
</div>

<div id="jQueryDialog71" style="z-index:334;" title="Calendrier g&#233;n&#233;ral">
<object data="addeosapps/agenda.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<script>
var wb_Timer11;
function TimerStartTimer11()
{
   wb_Timer11 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer5', 0);
   }, 50);
}
function TimerStopTimer11()
{
   clearTimeout(wb_Timer11);
}
TimerStartTimer11();
</script>

<div id="jQueryDialog72" style="z-index:336;" title="Devises">
<object data="addeosapps/devise.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog73" style="z-index:337;" title="Sauvegarde local de votre session">
<div id="Html58" style="position:absolute;left:13px;top:11px;width:336px;height:175px;z-index:200">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="zipaction.php">
</iframe><br /></div>
</div>

<script>
var wb_Timer12;
function TimerStartTimer12()
{
   wb_Timer12 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer7', 0);
   }, 75);
}
function TimerStopTimer12()
{
   clearTimeout(wb_Timer12);
}
TimerStartTimer12();
</script>

<div id="jQueryDialog32" style="z-index:339;" title="Informations sur le WebOS">
<div id="wb_Text32" style="position:absolute;left:27px;top:68px;width:714px;height:448px;text-align:center;z-index:208;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Rynna WebOS est un WebOS libre d'utilisation pour tous.</strong><br>Son code source est disponible publiquement sur le dépôt GitHub.<br><br></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>NOM DE CODE DE VERSION&nbsp;: Vegasis (30.0 et supérieur)</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br><strong>Liste des développeurs&nbsp;: <br></strong><br><em>Société AlgoStep Company&nbsp;:<br></em><br>Loïc A.<br>Jeremy N. (n'est plus dans l'entreprise depuis le 07/2017)<br>Maxime D.<br><br><em>Développeurs qui ont aidés à son développement ou pour leurs avis (remerciements)&nbsp;: <br></em><br>Polien (veler Software)<br>Softwarezatorman (veler Software)<br>Lereparateurdepc (veler Software)<br>Etienne Baudoux (IRL)<br>Jeremy60800 (veler Software)<br>Fandeonepiece2 (veler Software)<br>Coincero (veler Software)<br>Maxime G. (IRL)<br>Random Coder 99 (OpenClassRoom)<br>Jona (CCSources Co.)<br><br>Merci à tout nos amies à Rouen pour leurs conseils et leurs professionnalismes durant le développement long et fastidieux de ce projet&nbsp;!</span></div>
<div id="wb_MaterialIcon13" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:209;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog32').dialog('close');return false;"><div id="MaterialIcon13"><i class="material-icons">&#xe5cb;</i></div></a></div>
<input type="button" id="Button9" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/master.zip';return false;" name="" value="Télécharger le code source en développement (github dépôt officiel) [master.zip]" style="position:absolute;left:27px;top:546px;width:714px;height:25px;z-index:210;">
</div>

<script>
var wb_Timer40;
function TimerStartTimer40()
{
   wb_Timer40 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer22', 0);
   }, 32);
}
function TimerStopTimer40()
{
   clearTimeout(wb_Timer40);
}
TimerStartTimer40();
</script>

<script>
var wb_Timer41;
function TimerStartTimer41()
{
   wb_Timer41 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer22', 0);
   }, 125);
}
function TimerStopTimer41()
{
   clearTimeout(wb_Timer41);
}
TimerStartTimer41();
</script>

<div id="jQueryDialog9" style="z-index:342;" title="Wikip&#233;dia">
<object data="addeosapps/wikipedia.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog31" style="z-index:343;" title="Le Monde - Actualit&#233;s de France">
<object data="addeosapps/lemonde.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog55" style="z-index:344;" title="Forum Etienne BAUDOUX - Forum li&#233; au projet Rynna WebOS">
<object data="addeosapps/sz.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog68" style="z-index:345;" title="OpenClassRoom - Tutoriels et cours en ligne">
<object data="addeosapps/ocr.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog75" style="z-index:346;" title="SUMO PAINT - Dessin (demonstration gratuite)">
<object data="addeosapps/paint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog76" style="z-index:347;" title="Now-Coworking - Espace Coworking pour votre Entreprise">
<object data="addeosapps/nowcoworking.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog62" style="z-index:348;" title="Notes dropbox - FARGO (gratuit)">
<object data="addeosapps/fargo.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<script>
var wb_Timer4;
function TimerStartTimer4()
{
   wb_Timer4 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer24', 0);
   }, 5500);
}
function TimerStopTimer4()
{
   clearTimeout(wb_Timer4);
}
TimerStartTimer4();
</script>

<div id="jQueryDialog17" title="R&#233;paration de la session">
<div id="wb_Text71" style="position:absolute;left:7px;top:13px;width:454px;height:240px;z-index:253;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Ce programme vous permet de recharger correctement votre session et son interface.<br></strong><br><u>Utile dans les cas suivants&nbsp;:<br></u>- Barre de tâches disparut<br>- Icônes non affichés<br>- Grille d'alignement qui affiche plusieurs icônes identiques<br>- Impossibilité de charger la BootomBar ou la Barre d'Action (droite)<br>- Actions qui ne répondent plus<br>- Accès aux programmes qui ne répondent plus<br><strong>Cette procédure vous évite de recharger la page&nbsp;&quot;session&quot;&nbsp;et vous permet de ne pas perdre votre travail.</strong><br><br>La réparation dure quelques instants et résout la plupart des problèmes d'affichages.</span></div>
<input type="button" id="Button2" onclick="ShowObject('Layer27', 1);$('#jQueryDialog17').dialog('close');TimerStartTimer45();return false;" name="" value="Réparer maintenant" style="position:absolute;left:14px;top:276px;width:166px;height:25px;z-index:254;">
<input type="button" id="Button4" onclick="$('#jQueryDialog17').dialog('close');return false;" name="" value="Annuler" style="position:absolute;left:299px;top:276px;width:166px;height:25px;z-index:255;">
</div>

<div id="jQueryDialog63" title="Proc&#233;dure de r&#233;paration">
<div id="wb_Text72" style="position:absolute;left:111px;top:11px;width:379px;height:80px;z-index:256;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Procédure de réparation terminée&nbsp;!</strong><br><br>Si vous avez toujours un problème dans votre session nous vous conseillons de vider le cache et les fichiers temporaires de votre navigateur internet (Images et Cookies).</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog63').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:186px;top:112px;width:129px;height:25px;z-index:257;">
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:8px;top:11px;width:95px;height:80px;text-align:center;z-index:258;">
<div id="FontAwesomeIcon5"><i class="fa fa-shield">&nbsp;</i></div></div>
</div>

<div id="jQueryDialog77" style="z-index:352;" title="Fenetre vierge r&#233;utilisable pour une autre WebApps">
</div>

<div id="jQueryDialog78" style="z-index:353;" title="Sticky-Notes Generator (WebesTools)">
<object data="addeosapps/sng.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog74" title="SESSION MODE SANS-ECHEC">
<div id="wb_Text108" style="position:absolute;left:15px;top:151px;width:540px;height:171px;z-index:263;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>SESSION MODE SANS ECHEC (débogage)<br><br>Cette session est limitée.<br>Elle est utile en cas de problème d'affichage permanent ou de fonctionnement sur votre session&nbsp;; vous pouvez également lancer quelques programmes non modales.<br><br>Certaines fonctions principales et secondaires ne peuvent pas être utilisées.</strong></span></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:234px;top:19px;width:97px;height:100px;text-align:center;z-index:264;">
<div id="FontAwesomeIcon1"><i class="fa fa-wrench">&nbsp;</i></div></div>
</div>

<div id="jQueryDialog79" style="z-index:355;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/RGBConverter.apple/Widget.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog80" style="z-index:356;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/FLVPlayer.apple/FLVPlayer.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog81" style="z-index:357;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/eCalc_Scientific.apple/main.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog82" style="z-index:358;" title="[LINUX-VIRTUALISATION]">
<object data="linux/helloworld/index.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog83" style="z-index:359;" title="Gestionnaire de Serveur">
<input type="button" id="Button5" onclick="$('#jQueryDialog83').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:327px;top:176px;width:161px;height:25px;z-index:269;">
<div id="wb_Text44" style="position:absolute;left:13px;top:17px;width:473px;height:16px;z-index:270;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Links-Dialog (sitemap public)</span></div>
<div id="wb_Text50" style="position:absolute;left:13px;top:93px;width:473px;height:16px;z-index:271;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Aides Audio (descriptif audio des fonctions du WebOS)</span></div>
<div id="wb_FontAwesomeIcon6" style="position:absolute;left:14px;top:33px;width:470px;height:42px;text-align:center;z-index:272;">
<a href="#" onclick="$('#jQueryDialog84').dialog('open');return false;"><div id="FontAwesomeIcon6"><i class="fa fa-anchor">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon8" style="position:absolute;left:14px;top:109px;width:470px;height:42px;text-align:center;z-index:273;">
<div id="FontAwesomeIcon8"><i class="fa fa-audio-description">&nbsp;</i></div></div>
</div>

<div id="jQueryDialog84" style="z-index:360;" title="Links-Dialog">
<object data="sitemap.xml" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog87" style="z-index:361;" title="Liligo - Voyages Hotel, Voitures, S&#233;jours [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/liligo.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog2" style="z-index:362;" title="MAINTENANCE MODE SANS ECHEC (Op&#233;rateur)">
<button type="button" id="jQueryButton1" onclick="$('#jQueryDialog1').dialog('close');ShowObject('wb_FontAwesomeIcon15', 0);ShowObject('wb_MaterialIcon1', 0);ShowObject('wb_MaterialIcon27', 0);ShowObject('wb_MaterialIcon28', 0);ShowObject('wb_MaterialIcon19', 0);ShowObject('wb_MaterialIcon18', 0);ShowObject('wb_Image2', 0);ShowObject('wb_Image13', 0);ShowObject('wb_Image35', 0);ShowObject('wb_Image37', 0);ShowObject('Layer4', 0);ShowObject('Layer22', 0);return false;" name="" value="Effacer tout les afficheurs et gestion de page (maintenance et tests globaux)" style="position:absolute;left:21px;top:40px;width:576px;height:46px;z-index:276;">Effacer tout les afficheurs et gestion de page (maintenance et tests globaux)</button>
<button type="button" id="jQueryButton2" onclick="$('#jQueryDialog1').dialog('open');ShowObject('wb_FontAwesomeIcon15', 1);ShowObject('wb_MaterialIcon1', 1);ShowObject('wb_MaterialIcon27', 1);ShowObject('wb_MaterialIcon28', 1);ShowObject('wb_MaterialIcon19', 1);ShowObject('wb_MaterialIcon18', 1);ShowObject('wb_Image2', 1);ShowObject('wb_Image13', 1);ShowObject('wb_Image35', 1);ShowObject('wb_Image37', 1);ShowObjectWithEffect('Layer4', 1, 'highlight', 2000);ShowObjectWithEffect('Layer22', 1, 'highlight', 5000);return false;" name="" value="Relancer tout les afficheurs et gestion de page (maintenance et tests globaux)" style="position:absolute;left:21px;top:94px;width:576px;height:46px;z-index:277;">Relancer tout les afficheurs et gestion de page (maintenance et tests globaux)</button>
<div id="wb_Text7" style="position:absolute;left:22px;top:11px;width:575px;height:16px;z-index:278;">
<span style="color:#FF0000;font-family:Arial;font-size:13px;"><strong>ATTENTION&nbsp;: ne pas fermer cette fenêtre avec les afficheurs effacés&nbsp;!</strong></span></div>
</div>

</div>
<div id="Layer21" style="position:fixed;text-align:left;left:0;right:0;bottom:0;height:15px;z-index:363;" onmouseenter="ShowObject('Layer22', 1);AnimateCss('Layer22', 'animate-fade-in', 5, 500);return false;">
</div>
<div id="wb_PageHeader">
<div id="PageHeader">
<div class="row">
<div class="col-1">
<div id="wb_FontAwesomeIcon15" style="display:inline-block;width:35px;height:27px;text-align:center;z-index:0;">
<a href="#" onclick="$('#jQueryDialog1').dialog('open');ShowObject('jQueryDialog52', 0);$('#jQueryDialog6').dialog('close');return false;" ondblclick="$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon15"><i class="fa fa-yelp">&nbsp;</i></div></a>
</div>
<div id="wb_MaterialIcon3" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:1;">
<div id="MaterialIcon3"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon1" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:2;">
<a href="#" onclick="$('#jQueryDialog18').dialog('open');return false;"><div id="MaterialIcon1"><i class="material-icons">&#xe853;</i></div></a>
</div>
<div id="wb_MaterialIcon27" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:3;">
<a href="#" onclick="ShowObject('wb_PageHeader', 0);ShowObject('Layer1', 0);TimerStartTimer8();return false;"><div id="MaterialIcon27"><i class="material-icons">&#xe8b2;</i></div></a>
</div>
<div id="wb_MaterialIcon33" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:4;">
<div id="MaterialIcon33"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon28" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:5;">
<a href="#" onclick="$('#jQueryDialog83').dialog('open');return false;"><div id="MaterialIcon28"><i class="material-icons">&#xe16a;</i></div></a>
</div>
<div id="wb_MaterialIcon19" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:6;">
<a href="#" onclick="ShowObjectWithEffect('Layer3', 1, 'highlight', 500);return false;"><div id="MaterialIcon19"><i class="material-icons">&#xe899;</i></div></a>
</div>
<div id="wb_MaterialIcon18" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:7;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');return false;"><div id="MaterialIcon18"><i class="material-icons">&#xe879;</i></div></a>
</div>
</div>
<div class="col-2">
<div id="wb_MaterialIcon62" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:8;">
<a href="#" onclick="ShowObject('Layer4', 1);return false;" onmouseenter="ShowObject('Layer4', 1);return false;"><div id="MaterialIcon62"><i class="material-icons">&#xe1b1;</i></div></a>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid1" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid1">
<div class="row">
<div class="col-1">
<div id="wb_Image2" style="display:inline-block;width:90px;height:105px;z-index:9;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');AnimateCss('wb_Image2', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer15();ShowObject('Layer12', 0);return false;" onmouseenter="TimerStartTimer15();return false;" onmouseleave="ShowObject('Layer12', 0);TimerStopTimer15();return false;"><img src="images/placeholder.gif" data-src="images/21748-bubka-Explorer2.png" data-src-retina="images/21748-bubka-Explorer2.png" id="Image2" alt=""></a>
</div>
</div>
<div class="col-2">
</div>
<div class="col-3">
</div>
<div class="col-4">
</div>
<div class="col-5">
</div>
<div class="col-6">
</div>
<div class="col-7">
</div>
<div class="col-8">
</div>
<div class="col-9">
</div>
<div class="col-10">
</div>
<div class="col-11">
</div>
<div class="col-12">
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid6" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_Image13" style="display:inline-block;width:82px;height:96px;z-index:10;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');AnimateCss('wb_Image13', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer18();ShowObject('Layer13', 0);return false;" onmouseenter="TimerStartTimer18();return false;" onmouseleave="TimerStopTimer18();ShowObject('Layer13', 0);return false;"><img src="images/placeholder.gif" data-src="images/20834-bubka-windowsexplorer.png" data-src-retina="images/20834-bubka-windowsexplorer.png" id="Image13" alt=""></a>
</div>
</div>
<div class="col-2">
</div>
<div class="col-3">
</div>
<div class="col-4">
</div>
<div class="col-5">
</div>
<div class="col-6">
</div>
<div class="col-7">
</div>
<div class="col-8">
</div>
<div class="col-9">
</div>
<div class="col-10">
</div>
<div class="col-11">
</div>
<div class="col-12">
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid5" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid5">
<div class="row">
<div class="col-1">
<div id="wb_Image35" style="display:inline-block;width:86px;height:100px;z-index:11;">
<a href="#" onclick="$('#jQueryDialog14').dialog('open');AnimateCss('wb_Image35', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer36();ShowObject('Layer19', 0);return false;" onmouseenter="TimerStartTimer36();return false;" onmouseleave="ShowObject('Layer19', 0);TimerStopTimer36();return false;"><img src="images/placeholder.gif" data-src="images/23176-bubka-TextEdit.png" data-src-retina="images/23176-bubka-TextEdit.png" id="Image35" alt=""></a>
</div>
</div>
<div class="col-2">
</div>
<div class="col-3">
</div>
<div class="col-4">
</div>
<div class="col-5">
</div>
<div class="col-6">
</div>
<div class="col-7">
</div>
<div class="col-8">
</div>
<div class="col-9">
</div>
<div class="col-10">
</div>
<div class="col-11">
</div>
<div class="col-12">
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid4" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid4">
<div class="row">
<div class="col-1">
<div id="wb_Image37" style="display:inline-block;width:90px;height:105px;z-index:12;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');AnimateCss('wb_Image37', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer20', 0);TimerStopTimer39();return false;" onmouseenter="TimerStartTimer39();return false;" onmouseleave="ShowObject('Layer20', 0);TimerStopTimer39();return false;"><img src="images/placeholder.gif" data-src="images/30143-xsara54-Parametres.png" data-src-retina="images/30143-xsara54-Parametres.png" id="Image37" alt=""></a>
</div>
</div>
<div class="col-2">
</div>
<div class="col-3">
</div>
<div class="col-4">
</div>
<div class="col-5">
</div>
<div class="col-6">
</div>
<div class="col-7">
</div>
<div class="col-8">
</div>
<div class="col-9">
</div>
<div class="col-10">
</div>
<div class="col-11">
</div>
<div class="col-12">
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid3" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
</div>
<div class="col-2">
</div>
<div class="col-3">
</div>
<div class="col-4">
</div>
<div class="col-5">
</div>
<div class="col-6">
</div>
<div class="col-7">
</div>
<div class="col-8">
</div>
<div class="col-9">
</div>
<div class="col-10">
</div>
<div class="col-11">
</div>
<div class="col-12">
</div>
</div>
</div>
</div>
<div id="Layer3" style="position:fixed;text-align:center;left:0;top:0;right:0;bottom:0;z-index:364;" onclick="Toggle('Layer3', 'slidedown', 1200);ShowObject('wb_PageHeader', 0);ShowObject('wb_LayoutGrid1', 0);ShowObject('wb_LayoutGrid3', 0);ShowObject('wb_LayoutGrid4', 0);ShowObject('wb_LayoutGrid5', 0);ShowObject('wb_LayoutGrid6', 0);TimerStartTimer9();return false;">
<div id="Layer3_Container" style="width:3000px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<script>
var wb_Timer5;
function TimerStartTimer5()
{
   wb_Timer5 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer3', 0);
   }, 150);
}
function TimerStopTimer5()
{
   clearTimeout(wb_Timer5);
}
TimerStartTimer5();
</script>

<script>
var wb_Timer9;
function TimerStartTimer9()
{
   wb_Timer9 = setTimeout(function()
   {
      var event = null;
      ShowObject('wb_LayoutGrid1', 1);
      ShowObject('wb_LayoutGrid3', 1);
      ShowObject('wb_LayoutGrid4', 1);
      ShowObject('wb_LayoutGrid5', 1);
      ShowObject('wb_LayoutGrid6', 1);
      ShowObject('wb_PageHeader', 1);
   }, 1600);
}
function TimerStopTimer9()
{
   clearTimeout(wb_Timer9);
}
</script>

<script>
var wb_Timer3;
function TimerStartTimer3()
{
   wb_Timer3 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer3', 0);
   }, 1500);
}
function TimerStopTimer3()
{
   clearTimeout(wb_Timer3);
}
TimerStartTimer3();
</script>

</div>
</div>
<div id="Layer4" style="position:fixed;text-align:right;right:0;top:0;bottom:0;width:118px;z-index:365;" onmouseleave="ShowObject('Layer4', 0);return false;">
<div id="Layer4_Container" style="width:3000px;position:relative;margin-left:auto;margin-right:0;text-align:left;">
<div id="wb_FontAwesomeIcon21" style="position:absolute;left:25px;top:16px;width:78px;height:63px;text-align:center;z-index:192;">
<a href="#" onclick="$('#jQueryDialog70').dialog('open');return false;"><div id="FontAwesomeIcon21"><i class="fa fa-camera">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon22" style="position:absolute;left:25px;top:118px;width:78px;height:68px;text-align:center;z-index:193;">
<a href="#" onclick="$('#jQueryDialog72').dialog('open');return false;"><div id="FontAwesomeIcon22"><i class="fa fa-euro">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon24" style="position:absolute;left:25px;top:325px;width:78px;height:70px;text-align:center;z-index:194;">
<a href="#" onclick="$('#jQueryDialog3').dialog('close');$('#jQueryDialog5').dialog('close');$('#jQueryDialog11').dialog('close');ShowObject('Layer7', 1);return false;"><div id="FontAwesomeIcon24"><i class="fa fa-codepen">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon25" style="position:absolute;left:25px;top:435px;width:78px;height:64px;text-align:center;z-index:195;">
<a href="#" onclick="$('#jQueryDialog73').dialog('open');return false;"><div id="FontAwesomeIcon25"><i class="fa fa-save">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon23" style="position:absolute;left:25px;top:227px;width:78px;height:61px;text-align:center;z-index:196;">
<a href="#" onclick="$('#jQueryDialog71').dialog('open');return false;"><div id="FontAwesomeIcon23"><i class="fa fa-calendar">&nbsp;</i></div></a></div>
</div>
</div>
<div id="Layer7" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:366;">
<div id="Layer8" style="position:absolute;text-align:left;left:150px;top:82px;width:855px;height:460px;z-index:204;">
<div id="Layer9" style="position:absolute;text-align:left;left:16px;top:11px;width:218px;height:436px;z-index:201;" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:236px;top:11px;width:211px;height:436px;z-index:202;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:453px;top:11px;width:373px;height:436px;z-index:203;" onclick="$('#jQueryDialog11').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
</div>
</div>
<div id="Layer12" style="position:absolute;text-align:left;left:1339px;top:13549px;width:473px;height:591px;z-index:367;">
<script>
var wb_Timer13;
function TimerStartTimer13()
{
   wb_Timer13 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer12', 0);
   }, 150);
}
function TimerStopTimer13()
{
   clearTimeout(wb_Timer13);
}
TimerStartTimer13();
</script>

<script>
var wb_Timer14;
function TimerStartTimer14()
{
   wb_Timer14 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer12', 0);
   }, 750);
}
function TimerStopTimer14()
{
   clearTimeout(wb_Timer14);
}
TimerStartTimer14();
</script>

<script>
var wb_Timer15;
function TimerStartTimer15()
{
   wb_Timer15 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer12', 1);
   }, 3000);
}
function TimerStopTimer15()
{
   clearTimeout(wb_Timer15);
}
</script>

</div>
<div id="Layer13" style="position:absolute;text-align:left;left:1842px;top:13549px;width:473px;height:591px;z-index:368;">
<script>
var wb_Timer16;
function TimerStartTimer16()
{
   wb_Timer16 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer13', 0);
   }, 150);
}
function TimerStopTimer16()
{
   clearTimeout(wb_Timer16);
}
TimerStartTimer16();
</script>

<script>
var wb_Timer17;
function TimerStartTimer17()
{
   wb_Timer17 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer13', 0);
   }, 750);
}
function TimerStopTimer17()
{
   clearTimeout(wb_Timer17);
}
TimerStartTimer17();
</script>

<script>
var wb_Timer18;
function TimerStartTimer18()
{
   wb_Timer18 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer13', 1);
   }, 3000);
}
function TimerStopTimer18()
{
   clearTimeout(wb_Timer18);
}
</script>

</div>
<div id="Layer19" style="position:absolute;text-align:left;left:1867px;top:14775px;width:473px;height:591px;z-index:369;">
<script>
var wb_Timer34;
function TimerStartTimer34()
{
   wb_Timer34 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer19', 0);
   }, 150);
}
function TimerStopTimer34()
{
   clearTimeout(wb_Timer34);
}
TimerStartTimer34();
</script>

<script>
var wb_Timer35;
function TimerStartTimer35()
{
   wb_Timer35 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer19', 0);
   }, 750);
}
function TimerStopTimer35()
{
   clearTimeout(wb_Timer35);
}
TimerStartTimer35();
</script>

<script>
var wb_Timer36;
function TimerStartTimer36()
{
   wb_Timer36 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer19', 1);
   }, 3000);
}
function TimerStopTimer36()
{
   clearTimeout(wb_Timer36);
}
</script>

</div>
<div id="Layer20" style="position:absolute;text-align:left;left:2432px;top:14775px;width:473px;height:591px;z-index:370;">
<script>
var wb_Timer37;
function TimerStartTimer37()
{
   wb_Timer37 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer20', 0);
   }, 150);
}
function TimerStopTimer37()
{
   clearTimeout(wb_Timer37);
}
TimerStartTimer37();
</script>

<script>
var wb_Timer38;
function TimerStartTimer38()
{
   wb_Timer38 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer20', 0);
   }, 750);
}
function TimerStopTimer38()
{
   clearTimeout(wb_Timer38);
}
TimerStartTimer38();
</script>

<script>
var wb_Timer39;
function TimerStartTimer39()
{
   wb_Timer39 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer20', 1);
   }, 3000);
}
function TimerStopTimer39()
{
   clearTimeout(wb_Timer39);
}
</script>

</div>
<div id="Layer22" style="position:absolute;text-align:left;left:348px;top:5969px;width:1099px;height:152px;z-index:371;" onmouseleave="ShowObject('Layer22', 0);return false;">
<div id="wb_Image43" style="position:absolute;left:89px;top:39px;width:915px;height:100px;z-index:223;">
<img src="images/coque_sfx_3D.png" id="Image43" alt=""></div>
<div id="wb_Image51" style="position:absolute;left:732px;top:30px;width:80px;height:80px;z-index:224;">
<a href="#" onclick="$('#jQueryDialog76').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image51', 'transform-wiggle', 0, 500);return false;"><img src="images/nowcoworking.png" id="Image51" alt=""></a></div>
<div id="wb_Image46" style="position:absolute;left:508px;top:17px;width:110px;height:110px;z-index:225;">
<a href="#" onclick="$('#jQueryDialog68').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image46', 'transform-wiggle', 0, 500);return false;"><img src="images/OCR.png" id="Image46" alt=""></a></div>
<div id="wb_Image47" style="position:absolute;left:386px;top:17px;width:110px;height:110px;z-index:226;">
<a href="#" onclick="$('#jQueryDialog55').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image47', 'transform-wiggle', 0, 500);return false;"><img src="images/sz.png" id="Image47" alt=""></a></div>
<div id="wb_Image48" style="position:absolute;left:272px;top:17px;width:110px;height:110px;z-index:227;">
<a href="#" onclick="$('#jQueryDialog31').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image48', 'transform-wiggle', 0, 500);return false;"><img src="images/lemonde.png" id="Image48" alt=""></a></div>
<div id="wb_Image49" style="position:absolute;left:153px;top:17px;width:110px;height:110px;z-index:228;">
<a href="#" onclick="$('#jQueryDialog9').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image49', 'transform-wiggle', 0, 500);return false;"><img src="images/wikipedia.png" id="Image49" alt=""></a></div>
<div id="wb_Image50" style="position:absolute;left:626px;top:30px;width:80px;height:80px;z-index:229;">
<a href="#" onclick="$('#jQueryDialog75').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image50', 'transform-wiggle', 0, 500);return false;"><img src="images/dessinscreen.png" id="Image50" alt=""></a></div>
<div id="wb_Image52" style="position:absolute;left:838px;top:30px;width:80px;height:80px;z-index:230;">
<a href="#" onclick="$('#jQueryDialog62').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image52', 'transform-wiggle', 0, 500);return false;"><img src="images/fargo.png" id="Image52" alt=""></a></div>
</div>
<div id="Layer24" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:372;">
<div id="Layer25" style="position:absolute;text-align:left;left:50px;top:432px;width:801px;height:74px;z-index:239;">
</div>
<div id="Layer31" style="position:fixed;text-align:left;left:0px;top:0px;width:46px;height:41px;z-index:240;">
</div>
<div id="Layer32" style="position:fixed;text-align:left;left:auto;right:0px;top:0px;width:46px;height:41px;z-index:241;">
</div>
<div id="Layer33" style="position:fixed;text-align:left;left:auto;right:0px;top:auto;bottom:0px;width:46px;height:41px;z-index:242;">
</div>
<div id="Layer34" style="position:fixed;text-align:left;left:0px;top:auto;bottom:0px;width:46px;height:41px;z-index:243;">
</div>
<div id="Layer1" style="position:absolute;text-align:left;left:65px;top:288px;width:773px;height:112px;z-index:244;">
<div id="wb_Text5" style="position:absolute;left:96px;top:32px;width:570px;height:48px;text-align:center;z-index:238;">
<span style="color:#FFFFFF;font-family:Arial;font-size:20px;"><strong>Préparation session mode sans echec<br><em>Patienter</em>...</strong></span></div>
</div>
</div>
<div id="Layer27" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:373;">
<script>
var wb_Timer44;
function TimerStartTimer44()
{
   wb_Timer44 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer27', 0);
   }, 25);
}
function TimerStopTimer44()
{
   clearTimeout(wb_Timer44);
}
TimerStartTimer44();
</script>

<script>
var wb_Timer45;
function TimerStartTimer45()
{
   wb_Timer45 = setTimeout(function()
   {
      var event = null;
      ShowObject('wb_PageHeader', 0);
      ShowObject('wb_LayoutGrid1', 0);
      ShowObject('wb_LayoutGrid3', 0);
      ShowObject('wb_LayoutGrid4', 0);
      ShowObject('wb_LayoutGrid5', 0);
      ShowObject('wb_LayoutGrid6', 0);
      $('#jQueryDialog1').dialog('close');
      ShowObject('Layer22', 0);
      ShowObject('Layer5', 0);
      ShowObject('Layer4', 0);
      ShowObject('Layer1', 0);
      ShowObject('Layer23', 0);
      $('#jQueryDialog19').dialog('close');
      TimerStartTimer46();
   }, 5500);
}
function TimerStopTimer45()
{
   clearTimeout(wb_Timer45);
}
</script>

<div id="Layer29" style="position:absolute;text-align:left;left:135px;top:423px;width:706px;height:104px;z-index:248;">
<div id="wb_Text70" style="position:absolute;left:24px;top:28px;width:659px;height:46px;text-align:center;z-index:245;">
<span style="color:#FF0000;font-family:Arial;font-size:20px;">Votre session est en cours de réparation</span><span style="color:#FFFFFF;font-family:Arial;font-size:20px;"><br>Cela ne prendra pas longtemps...</span></div>
</div>
<script>
var wb_Timer46;
function TimerStartTimer46()
{
   wb_Timer46 = setTimeout(function()
   {
      var event = null;
      ShowObject('wb_PageHeader', 1);
      ShowObject('wb_LayoutGrid1', 1);
      ShowObject('wb_LayoutGrid3', 1);
      ShowObject('wb_LayoutGrid4', 1);
      ShowObject('wb_LayoutGrid5', 1);
      ShowObject('wb_LayoutGrid6', 1);
      $('#jQueryDialog1').dialog('open');
      ShowObject('Layer27', 0);
      $('#jQueryDialog63').dialog('open');
   }, 7000);
}
function TimerStopTimer46()
{
   clearTimeout(wb_Timer46);
}
</script>

<div id="Layer28" style="position:absolute;text-align:left;left:232px;top:49px;width:529px;height:374px;z-index:250;">
</div>
<script>
var wb_Timer47;
function TimerStartTimer47()
{
   wb_Timer47 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer27', 0);
   }, 40);
}
function TimerStopTimer47()
{
   clearTimeout(wb_Timer47);
}
TimerStartTimer47();
</script>

</div>
</body>
</html>