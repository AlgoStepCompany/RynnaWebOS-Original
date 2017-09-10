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
<html>
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
<link href="session.css" rel="stylesheet">
<script src="jquery-3.1.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="jquery.ui.datepicker-fr.js"></script>
<script src="wb.lazyload.min.js"></script>
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
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 1});
   var jQueryDialog3Options =
   {
      width: 601,
      height: 578,
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
      width: 425,
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
      height: 566,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
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
      height: 240,
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
   var jQueryToolTip1Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir/Fermer le Menu Applicatifs</span>",
      items: '#wb_FontAwesomeIcon15',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip1' }
   };
   $("#wb_FontAwesomeIcon15").tooltip(jQueryToolTip1Options);
   var jQueryToolTip2Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Gérer votre compte personnel</span>",
      items: '#wb_MaterialIcon1',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip2' }
   };
   $("#wb_MaterialIcon1").tooltip(jQueryToolTip2Options);
   var jQueryToolTip3Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le Cloud</span>",
      items: '#wb_FontAwesomeIcon16',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip3' }
   };
   $("#wb_FontAwesomeIcon16").tooltip(jQueryToolTip3Options);
   var jQueryDialog11Options =
   {
      width: 906,
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
   var jQueryToolTip5Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le Chat de Rynna WebOS</span>",
      items: '#wb_MaterialIcon22',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip5' }
   };
   $("#wb_MaterialIcon22").tooltip(jQueryToolTip5Options);
   var jQueryToolTip6Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir l'éditeur 3D Tridiv CSS 3</span>",
      items: '#wb_MaterialIcon23',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip6' }
   };
   $("#wb_MaterialIcon23").tooltip(jQueryToolTip6Options);
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
      width: 660,
      height: 530,
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
   var jQueryDialog39Options =
   {
      width: 493,
      height: 185,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog39'} 
   };
   $("#jQueryDialog39").dialog(jQueryDialog39Options);
   var jQueryDialog40Options =
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
   var jQueryDialog42Options =
   {
      width: 469,
      height: 549,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog42'} 
   };
   $("#jQueryDialog42").dialog(jQueryDialog42Options);
   var jQueryDialog43Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog43'} 
   };
   $("#jQueryDialog43").dialog(jQueryDialog43Options);
   var jQueryDialog44Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog44'} 
   };
   $("#jQueryDialog44").dialog(jQueryDialog44Options);
   var jQueryDialog45Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog45'} 
   };
   $("#jQueryDialog45").dialog(jQueryDialog45Options);
   var jQueryDialog46Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog46'} 
   };
   $("#jQueryDialog46").dialog(jQueryDialog46Options);
   var jQueryDialog47Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog47'} 
   };
   $("#jQueryDialog47").dialog(jQueryDialog47Options);
   var jQueryDialog48Options =
   {
      width: 892,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog48'} 
   };
   $("#jQueryDialog48").dialog(jQueryDialog48Options);
   var jQueryToolTip7Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Imprimer votre écran actuel</span>",
      items: '#wb_MaterialIcon25',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip7' }
   };
   $("#wb_MaterialIcon25").tooltip(jQueryToolTip7Options);
   var jQueryDialog49Options =
   {
      width: 565,
      height: 394,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog49'} 
   };
   $("#jQueryDialog49").dialog(jQueryDialog49Options);
   var jQueryToolTip8Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le gestionnaire de tâches avancés</span>",
      items: '#wb_MaterialIcon27',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip8' }
   };
   $("#wb_MaterialIcon27").tooltip(jQueryToolTip8Options);
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
   var jQueryToolTip4Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Choisir un Widget à afficher</span>",
      items: '#wb_MaterialIcon30',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip4' }
   };
   $("#wb_MaterialIcon30").tooltip(jQueryToolTip4Options);
   var jQueryDialog53Options =
   {
      width: 279,
      height: 240,
      position: { my: 'left top', at: 'right top+95', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog53'} 
   };
   $("#jQueryDialog53").dialog(jQueryDialog53Options);
   var jQueryDialog15Options =
   {
      width: 279,
      height: 224,
      position: { my: 'left top', at: 'right top+46', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog15'} 
   };
   $("#jQueryDialog15").dialog(jQueryDialog15Options);
   var jQueryDatePicker1Options =
   {
      dateFormat: 'dd/mm/yy',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      showAnim: 'fadeIn'
   };
   $("#jQueryDatePicker1").datepicker(jQueryDatePicker1Options);
   $("#jQueryDatePicker1").datepicker("option", $.datepicker.regional['fr']);
   var jQueryToolTip9Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Basculer sur les Applications Virtualisées</span>",
      items: '#wb_MaterialIcon2',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip9' }
   };
   $("#wb_MaterialIcon2").tooltip(jQueryToolTip9Options);
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
      width: 617,
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
      width: 900,
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
   var jQueryToolTip15Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Fermer ou redémarrer la session</span>",
      items: '#wb_MaterialIcon28',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip15' }
   };
   $("#wb_MaterialIcon28").tooltip(jQueryToolTip15Options);
   var jQueryDialog6Options =
   {
      modal: true,
      width: 467,
      height: 180,
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
      autoOpen: false,
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
   var jQueryTabs1Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs1").tabs(jQueryTabs1Options);
   var jQueryTabs5Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs5").tabs(jQueryTabs5Options);
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
   var jQueryDialog2Options =
   {
      width: 458,
      height: 495,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
   var jQueryDialog26Options =
   {
      width: 458,
      height: 290,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog26'} 
   };
   $("#jQueryDialog26").dialog(jQueryDialog26Options);
   var jQueryDialog64Options =
   {
      width: 359,
      height: 295,
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
      height: 359,
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
   var jQueryToolTip10Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Mettre la session en attente</span>",
      items: '#wb_MaterialIcon19',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip10' }
   };
   $("#wb_MaterialIcon19").tooltip(jQueryToolTip10Options);
   var jQueryDialog69Options =
   {
      width: 290,
      height: 279,
      position: { my: 'left top', at: 'right top+125', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog69'} 
   };
   $("#jQueryDialog69").dialog(jQueryDialog69Options);
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
   $("#Layer6").stickylayer({orientation: 9, position: [0, 0], delay: 1});
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
      width: 686,
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
   var jQueryDialog74Options =
   {
      width: 572,
      height: 272,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog74'} 
   };
   $("#jQueryDialog74").dialog(jQueryDialog74Options);
   var jQueryDialog32Options =
   {
      width: 653,
      height: 587,
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
   $("#Layer12").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer13").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer14").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer15").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer16").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer17").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer18").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer19").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   $("#Layer20").stickylayer({orientation: 6, position: [15, 0], delay: 0});
   var jQueryDialog52Options =
   {
      width: 257,
      height: 317,
      position: { my: 'left top', at: 'left+258 top+37', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: {effect: 'slide', direction: 'up'},
      hide: {effect: 'slide', direction: 'up'},
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog52'} 
   };
   $("#jQueryDialog52").dialog(jQueryDialog52Options);
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
   $("#Layer2").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer25").stickylayer({orientation: 7, position: [0, 0], delay: 0});
   $("#Layer26").stickylayer({orientation: 4, position: [0, 0], delay: 500});
   $("#Layer28").stickylayer({orientation: 9, position: [0, 0], delay: 0});
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
      width: 760,
      height: 567,
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
   var jQueryToolTip11Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Visualiser l'aide graphique</span>",
      items: '#wb_MaterialIcon24',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip11' }
   };
   $("#wb_MaterialIcon24").tooltip(jQueryToolTip11Options);
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
   $('img[data-src]').lazyload();
});
</script>
<!-- Insert Google Analytics code here -->
</head>
<body>
<div id="Layer21" style="position:fixed;text-align:left;left:0;right:0;bottom:0;height:15px;z-index:435;" onmouseenter="ShowObject('Layer22', 1);AnimateCss('Layer22', 'animate-fade-in', 5, 500);return false;">
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:2202px;top:1387px;width:755px;height:436px;z-index:436;">
<div id="Layer1_Container" style="width:755px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="jQueryTabs1" style="position:absolute;left:0px;top:0px;width:745px;height:426px;z-index:12;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>Informations</span></a></li>
<li><a href="#jquerytabs1-page-1"><span>Manuels d'utilisation</span></a></li>
</ul>
<div style="height:404px;" id="jquerytabs1-page-0">
<div id="wb_Text7" style="position:absolute;left:23px;top:65px;width:639px;height:19px;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:17px;">Bienvenue sur Rynna WebOS !</span></div>
<div id="wb_Text10" style="position:absolute;left:23px;top:97px;width:678px;height:36px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Rynna WebOS est un système d'exploitation fonctionnant uniquement dans un navigateur internet sur n'importe quel système d'exploitation.</span></div>
<div id="wb_Text86" style="position:absolute;left:23px;top:151px;width:689px;height:16px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ci-dessous retrouvez les dernières mises à jour de votre WebOS. Seul les 6 dernières mises à jours sont indiqués :</span></div>
<div id="Blog1" style="overflow-y:scroll;position:absolute;left:23px;top:195px;width:689px;height:171px;z-index:3;">
<div class="blogitem">
   <span class="blogsubject">Version 9.6</span>
   <div class="no-thumb"></div>
   <div class="blogdate">10/09/17<br></div>
   <span style="color:#000000;">- Rectification de liaison web et entre-pages<br>
- Ajustement de certaines fenêtres<br>
Objectif prochain, réduire le temps de chargement par la suppression du prêt-chargement des iframes (WebApps)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 9.5</span>
   <div class="no-thumb"></div>
   <div class="blogdate">09/09/17<br></div>
   <span style="color:#000000;">- Passage du serveur MySQL en PHP 5.6 compatible WebOS compilation PHP 7 (serveur migré, nouvelle base de données)<br>
- Passage MySQL en MySQLi<br>
- Nouvelle Application internet ; Sticky Notes Generator (by WebesTools)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 9.4</span>
   <div class="no-thumb"></div>
   <div class="blogdate">05/09/17<br></div>
   <span style="color:#000000;">- Intégration de la verification de la taille de l'écran (résolution complète) sur deux variables simples ; larg et haut, pour les appels des fenêtres JQuery<br>
- Framework Jquery modifié pour préparer la venu des options réductions et agrandissements automatique des fenêtres<br>
- Modification des curseurs d'alertes et de mobilités des fenêtres pour se rapprocher de Windows ou Linux (visuellement)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 9.3</span>
   <div class="no-thumb"></div>
   <div class="blogdate">03/09/17<br></div>
   <span style="color:#000000;">- Ajout d'une nouvelle version du pogramme d'interation sur la session (double clique sur le bureau)<br>
- Service de réparation des programmes et de la session inclus et fonctionnel<br>
- Ajustement de certains programmes (taille par défaut)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 9.2</span>
   <div class="no-thumb"></div>
   <div class="blogdate">03/09/17<br></div>
   <span style="color:#000000;">- Ajout d'un mode de changement de fond d'écran (paramètres et Aides)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 9.1b</span>
   <div class="no-thumb"></div>
   <div class="blogdate">01/09/17<br></div>
   <span style="color:#000000;">- Refonte de l'écran de chargement (animation HD)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
</div>
<input type="button" id="Button12" onclick="ShowObject('Layer1', 0);return false;" name="" value="Cliquez ici pour fermer la fenêtre et commencer à utiliser votre session" style="position:absolute;left:23px;top:379px;width:689px;height:25px;z-index:4;">
</div>
<div style="height:404px;" id="jquerytabs1-page-1">
<div id="jQueryTabs5" style="position:absolute;left:12px;top:55px;width:695px;height:334px;z-index:11;">
<ul>
<li><a href="#jquerytabs5-page-0"><span>Modifier compte</span></a></li>
<li><a href="#jquerytabs5-page-1"><span>Les Applis internes</span></a></li>
<li><a href="#jquerytabs5-page-2"><span>Créer ApplisWeb</span></a></li>
<li><a href="#jquerytabs5-page-3"><span>Gest. de taches</span></a></li>
<li><a href="#jquerytabs5-page-4"><span>Vos fichiers</span></a></li>
<li><a href="#jquerytabs5-page-5"><span>Icones</span></a></li>
</ul>
<div style="height:312px;" id="jquerytabs5-page-0">
<div id="wb_YouTube1" style="position:absolute;left:111px;top:52px;width:483px;height:271px;z-index:5;">
<iframe id="YouTube1" src="https://www.youtube.com/embed/bFi-ZUF0Atg?rel=1&amp;autohide=0"></iframe></div>
</div>
<div style="height:312px;" id="jquerytabs5-page-1">
<div id="wb_YouTube2" style="position:absolute;left:111px;top:50px;width:483px;height:271px;z-index:6;">
<iframe id="YouTube2" src="https://www.youtube.com/embed/DVk0C7TXgTs?rel=1&amp;autohide=0"></iframe></div>
</div>
<div style="height:312px;" id="jquerytabs5-page-2">
<div id="wb_YouTube3" style="position:absolute;left:111px;top:52px;width:483px;height:271px;z-index:7;">
<iframe id="YouTube3" src="https://www.youtube.com/embed/LnxLG07O81w?rel=1&amp;autohide=0"></iframe></div>
</div>
<div style="height:312px;" id="jquerytabs5-page-3">
<div id="wb_YouTube4" style="position:absolute;left:111px;top:53px;width:483px;height:271px;z-index:8;">
<iframe id="YouTube4" src="https://www.youtube.com/embed/ghPUvfG-Q-4?rel=1&amp;autohide=0"></iframe></div>
</div>
<div style="height:312px;" id="jquerytabs5-page-4">
<div id="wb_YouTube5" style="position:absolute;left:111px;top:53px;width:483px;height:271px;z-index:9;">
<iframe id="YouTube5" src="https://www.youtube.com/embed/DEjUAmw3JkI?rel=1&amp;autohide=0"></iframe></div>
</div>
<div style="height:312px;" id="jquerytabs5-page-5">
<div id="wb_YouTube6" style="position:absolute;left:111px;top:52px;width:483px;height:271px;z-index:10;">
<iframe id="YouTube6" src="https://www.youtube.com/embed/b_rvkIBPt5E?rel=1&amp;autohide=0"></iframe></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="wb_PageHeader">
<div id="PageHeader">
<div class="row">
<div class="col-1">
<div id="wb_FontAwesomeIcon15" style="display:inline-block;width:35px;height:27px;text-align:center;z-index:13;">
<a href="#" onclick="$('#jQueryDialog1').dialog('open');$('#jQueryDialog52').dialog('close');$('#jQueryDialog6').dialog('close');return false;" ondblclick="$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon15"><i class="fa fa-yelp">&nbsp;</i></div></a>
</div>
<div id="wb_MaterialIcon3" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:14;">
<div id="MaterialIcon3"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon1" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:15;">
<a href="#" onclick="$('#jQueryDialog18').dialog('open');return false;"><div id="MaterialIcon1"><i class="material-icons">&#xe853;</i></div></a>
</div>
<div id="wb_MaterialIcon22" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:16;">
<a href="#" onclick="$('#jQueryDialog29').dialog('open');$('#jQueryDialog10').dialog('close');return false;" ondblclick="$('#jQueryDialog29').dialog('close');return false;"><div id="MaterialIcon22"><i class="material-icons">&#xe0b7;</i></div></a>
</div>
<div id="wb_MaterialIcon25" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:17;">
<a href="#" onclick="window.print();TimerStartTimer7();return false;"><div id="MaterialIcon25"><i class="material-icons">&#xe8ad;</i></div></a>
</div>
<div id="wb_MaterialIcon27" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:18;">
<a href="#" onclick="ShowObject('wb_PageHeader', 0);ShowObject('Layer1', 0);TimerStartTimer8();return false;"><div id="MaterialIcon27"><i class="material-icons">&#xe8b2;</i></div></a>
</div>
<div id="wb_MaterialIcon24" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:19;">
<a href="#" onclick="ShowObject('Layer23', 1);return false;"><div id="MaterialIcon24"><i class="material-icons">&#xe8fd;</i></div></a>
</div>
<div id="wb_MaterialIcon4" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:20;">
<div id="MaterialIcon4"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon30" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:21;">
<a href="#" onclick="$('#jQueryDialog1').dialog('close');$('#jQueryDialog52').dialog('open');return false;" ondblclick="$('#jQueryDialog52').dialog('close');return false;"><div id="MaterialIcon30"><i class="material-icons">&#xe41d;</i></div></a>
</div>
<div id="wb_MaterialIcon33" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:22;">
<div id="MaterialIcon33"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon19" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:23;">
<a href="#" onclick="ShowObjectWithEffect('Layer3', 1, 'highlight', 500);return false;"><div id="MaterialIcon19"><i class="material-icons">&#xe899;</i></div></a>
</div>
<div id="wb_MaterialIcon28" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:24;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');return false;"><div id="MaterialIcon28"><i class="material-icons">&#xe879;</i></div></a>
</div>
</div>
<div class="col-2">
<div id="wb_MaterialIcon62" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:25;">
<a href="#" onclick="ShowObject('Layer4', 1);return false;" onmouseenter="ShowObject('Layer4', 1);return false;"><div id="MaterialIcon62"><i class="material-icons">&#xe1b1;</i></div></a>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid1" ondblclick="ShowObject('Layer26', 1);return false;" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid1">
<div class="row">
<div class="col-1">
<div id="wb_Image2" style="display:inline-block;width:90px;height:105px;z-index:26;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');AnimateCss('wb_Image2', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer15();ShowObject('Layer12', 0);return false;" onmouseenter="TimerStartTimer15();return false;" onmouseleave="ShowObject('Layer12', 0);TimerStopTimer15();return false;"><img src="images/placeholder.gif" data-src="images/21748-bubka-Explorer2.png" data-src-retina="images/21748-bubka-Explorer2.png" id="Image2" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image36" style="display:inline-block;width:90px;height:105px;z-index:27;">
<a href="#" onclick="$('#jQueryDialog41').dialog('open');AnimateCss('wb_Image36', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer17', 0);TimerStopTimer30();return false;" onmouseenter="TimerStartTimer30();return false;" onmouseleave="ShowObject('Layer17', 0);TimerStopTimer30();return false;"><img src="images/placeholder.gif" data-src="images/30885-Sparky783-MicrosoftSecurityEssentials.png" data-src-retina="images/30885-Sparky783-MicrosoftSecurityEssentials.png" id="Image36" alt=""></a>
</div>
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
<div id="wb_LayoutGrid6" ondblclick="ShowObject('Layer26', 1);return false;" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_Image13" style="display:inline-block;width:82px;height:96px;z-index:28;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');AnimateCss('wb_Image13', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer18();ShowObject('Layer13', 0);return false;" onmouseenter="TimerStartTimer18();return false;" onmouseleave="TimerStopTimer18();ShowObject('Layer13', 0);return false;"><img src="images/placeholder.gif" data-src="images/20834-bubka-windowsexplorer.png" data-src-retina="images/20834-bubka-windowsexplorer.png" id="Image13" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image19" style="display:inline-block;width:87px;height:101px;z-index:29;">
<a href="#" onclick="$('#jQueryDialog54').dialog('open');AnimateCss('wb_Image19', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer33();ShowObject('Layer18', 0);return false;" onmouseenter="TimerStartTimer33();return false;" onmouseleave="TimerStopTimer33();ShowObject('Layer18', 0);return false;"><img src="images/placeholder.gif" data-src="images/30753-Cesco97-download256.png" data-src-retina="images/30753-Cesco97-download256.png" id="Image19" alt=""></a>
</div>
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
<div id="wb_LayoutGrid5" ondblclick="ShowObject('Layer26', 1);return false;" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid5">
<div class="row">
<div class="col-1">
<div id="wb_Image38" style="display:inline-block;width:84px;height:98px;z-index:30;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');AnimateCss('wb_Image38', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer14', 0);TimerStopTimer21();return false;" onmouseenter="TimerStartTimer21();return false;" onmouseleave="ShowObject('Layer14', 0);TimerStopTimer21();return false;"><img src="images/placeholder.gif" data-src="images/C27Xgm6XEAAdHnK.png%20medium.png" data-src-retina="images/C27Xgm6XEAAdHnK.png medium.png" id="Image38" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image35" style="display:inline-block;width:86px;height:100px;z-index:31;">
<a href="#" onclick="$('#jQueryDialog14').dialog('open');AnimateCss('wb_Image35', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer36();ShowObject('Layer19', 0);return false;" onmouseenter="TimerStartTimer36();return false;" onmouseleave="ShowObject('Layer19', 0);TimerStopTimer36();return false;"><img src="images/placeholder.gif" data-src="images/23176-bubka-TextEdit.png" data-src-retina="images/23176-bubka-TextEdit.png" id="Image35" alt=""></a>
</div>
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
<div id="wb_LayoutGrid4" ondblclick="ShowObject('Layer26', 1);return false;" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid4">
<div class="row">
<div class="col-1">
<div id="wb_Image33" style="display:inline-block;width:87px;height:101px;z-index:32;">
<a href="#" onclick="$('#jQueryDialog16').dialog('open');AnimateCss('wb_Image33', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer24();ShowObject('Layer15', 0);return false;" onmouseenter="TimerStartTimer24();return false;" onmouseleave="TimerStopTimer24();ShowObject('Layer15', 0);return false;"><img src="images/placeholder.gif" data-src="images/20698-bubka-Maps.png" data-src-retina="images/20698-bubka-Maps.png" id="Image33" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image37" style="display:inline-block;width:90px;height:105px;z-index:33;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');AnimateCss('wb_Image37', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer20', 0);TimerStopTimer39();return false;" onmouseenter="TimerStartTimer39();return false;" onmouseleave="ShowObject('Layer20', 0);TimerStopTimer39();return false;"><img src="images/placeholder.gif" data-src="images/30143-xsara54-Parametres.png" data-src-retina="images/30143-xsara54-Parametres.png" id="Image37" alt=""></a>
</div>
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
<div id="wb_LayoutGrid3" ondblclick="ShowObject('Layer26', 1);return false;" ondragover="MoveObject('wb_Image2',0,0);return false;">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
<div id="wb_Image34" style="display:inline-block;width:84px;height:98px;z-index:34;">
<a href="#" onclick="$('#jQueryDialog13').dialog('open');AnimateCss('wb_Image34', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer27();ShowObject('Layer16', 0);return false;" onmouseenter="TimerStartTimer27();return false;" onmouseleave="TimerStopTimer27();ShowObject('Layer16', 0);return false;"><img src="images/placeholder.gif" data-src="images/22381-bubka-Mail.png" data-src-retina="images/22381-bubka-Mail.png" id="Image34" alt=""></a>
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

<div id="jQueryDialog3" style="z-index:444;" title="Mes applications install&#233;es (Applis G&#233;n&#233;rales)">
<div id="wb_Image4" style="position:absolute;left:80px;top:9px;width:87px;height:86px;z-index:35;">
<a href="#" onclick="$('#jQueryDialog27').dialog('open');return false;"><img src="images/img0007.png" id="Image4" alt=""></a></div>
<div id="wb_FontAwesomeIcon17" style="position:absolute;left:177px;top:21px;width:51px;height:56px;text-align:center;z-index:36;">
<a href="#" onclick="$('#jQueryDialog7').dialog('open');return false;"><div id="FontAwesomeIcon17"><i class="fa fa-thermometer-three-quarters">&nbsp;</i></div></a></div>
<div id="wb_Image10" style="position:absolute;left:248px;top:9px;width:86px;height:86px;z-index:37;">
<a href="#" onclick="$('#jQueryDialog24').dialog('open');return false;"><img src="images/img0004.png" id="Image10" alt=""></a></div>
<div id="wb_Image23" style="position:absolute;left:327px;top:9px;width:86px;height:86px;z-index:38;">
<a href="#" onclick="$('#jQueryDialog23').dialog('open');return false;"><img src="images/img0025.png" id="Image23" alt=""></a></div>
<div id="wb_Image18" style="position:absolute;left:166px;top:137px;width:88px;height:72px;z-index:39;">
<a href="#" onclick="$('#jQueryDialog20').dialog('open');return false;"><img src="images/img0017.png" id="Image18" alt=""></a></div>
<div id="wb_Image24" style="position:absolute;left:77px;top:131px;width:96px;height:85px;z-index:40;">
<a href="#" onclick="$('#jQueryDialog41').dialog('open');return false;"><img src="images/pausecafe.png" id="Image24" alt=""></a></div>
<div id="wb_Image22" style="position:absolute;left:2px;top:130px;width:86px;height:86px;z-index:41;">
<a href="#" onclick="$('#jQueryDialog25').dialog('open');return false;"><img src="images/img0024.png" id="Image22" alt=""></a></div>
<div id="wb_Text54" style="position:absolute;left:93px;top:86px;width:55px;height:32px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Docteur Flashy</span></div>
<div id="wb_Text55" style="position:absolute;left:167px;top:90px;width:71px;height:14px;text-align:center;z-index:43;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Température</span></div>
<div id="wb_Text56" style="position:absolute;left:257px;top:86px;width:59px;height:48px;text-align:center;z-index:44;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Horloge interactive</span></div>
<div id="wb_Text57" style="position:absolute;left:340px;top:86px;width:55px;height:32px;text-align:center;z-index:45;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Dés interactif</span></div>
<div id="wb_Text59" style="position:absolute;left:15px;top:209px;width:55px;height:32px;text-align:center;z-index:46;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Monnaie interactif</span></div>
<div id="wb_Text60" style="position:absolute;left:95px;top:209px;width:55px;height:32px;text-align:center;z-index:47;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Jeux Flash</span></div>
<div id="wb_Text61" style="position:absolute;left:181px;top:209px;width:55px;height:16px;text-align:center;z-index:48;">
<span style="color:#000000;font-family:Arial;font-size:13px;">SNCF</span></div>
<div id="wb_MaterialIcon2" style="position:absolute;left:16px;top:495px;width:32px;height:32px;text-align:center;z-index:49;">
<a href="#" onclick="$('#jQueryDialog12').dialog('open');return false;"><div id="MaterialIcon2"><i class="material-icons">&#xe051;</i></div></a></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:262px;top:142px;width:53px;height:56px;text-align:center;z-index:50;">
<a href="#" onclick="$('#jQueryDialog30').dialog('open');return false;"><div id="FontAwesomeIcon1"><i class="fa fa-code">&nbsp;</i></div></a></div>
<div id="wb_Text23" style="position:absolute;left:256px;top:211px;width:60px;height:28px;text-align:center;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Créer vos Applis Web</span></div>
<div id="wb_Text63" style="position:absolute;left:512px;top:86px;width:55px;height:16px;text-align:center;z-index:52;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ipiccy</span></div>
<div id="wb_Image3" style="position:absolute;left:499px;top:9px;width:86px;height:86px;z-index:53;">
<a href="#" onclick="$('#jQueryDialog56').dialog('open');return false;"><img src="images/ipiccy.png" id="Image3" alt=""></a></div>
<div id="wb_Image5" style="position:absolute;left:327px;top:130px;width:86px;height:86px;z-index:54;">
<a href="#" onclick="$('#jQueryDialog57').dialog('open');return false;"><img src="images/Korben.png" id="Image5" alt=""></a></div>
<div id="wb_Image6" style="position:absolute;left:416px;top:130px;width:86px;height:86px;z-index:55;">
<a href="#" onclick="$('#jQueryDialog58').dialog('open');return false;"><img src="images/orange.png" id="Image6" alt=""></a></div>
<div id="wb_Text64" style="position:absolute;left:339px;top:209px;width:55px;height:32px;text-align:center;z-index:56;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Le Bon Coin</span></div>
<div id="wb_Text65" style="position:absolute;left:429px;top:209px;width:55px;height:32px;text-align:center;z-index:57;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Orange TV</span></div>
<div id="wb_Text67" style="position:absolute;left:512px;top:209px;width:55px;height:32px;text-align:center;z-index:58;">
<span style="color:#000000;font-family:Arial;font-size:13px;">01net Blog</span></div>
<div id="wb_Text68" style="position:absolute;left:15px;top:343px;width:55px;height:14px;text-align:center;z-index:59;">
<span style="color:#000000;font-family:Arial;font-size:11px;">CDiscount</span></div>
<div id="wb_Text87" style="position:absolute;left:13px;top:88px;width:58px;height:28px;text-align:center;z-index:60;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Calculatrice</span></div>
<div id="wb_Text88" style="position:absolute;left:429px;top:89px;width:58px;height:16px;text-align:center;z-index:61;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Wordpad</span></div>
<div id="wb_Image32" style="position:absolute;left:415px;top:9px;width:87px;height:87px;z-index:62;">
<a href="#" onclick="$('#jQueryDialog28').dialog('open');return false;"><img src="images/notepad.png" id="Image32" alt=""></a></div>
<div id="wb_Image12" style="position:absolute;left:2px;top:9px;width:87px;height:87px;z-index:63;">
<a href="#" onclick="$('#jQueryDialog4').dialog('open');return false;"><img src="images/Calculatrice.png" id="Image12" alt=""></a></div>
<div id="wb_Image20" style="position:absolute;left:2px;top:263px;width:86px;height:86px;z-index:64;">
<a href="#" onclick="$('#jQueryDialog61').dialog('open');return false;"><img src="images/steam.png" id="Image20" alt=""></a></div>
<div id="wb_Image21" style="position:absolute;left:500px;top:130px;width:85px;height:86px;z-index:65;">
<a href="#" onclick="$('#jQueryDialog60').dialog('open');return false;"><img src="images/twitch.png" id="Image21" alt=""></a></div>
<div id="wb_MaterialIcon23" style="position:absolute;left:95px;top:275px;width:54px;height:56px;text-align:center;z-index:66;">
<a href="#" onclick="$('#jQueryDialog40').dialog('open');return false;"><div id="MaterialIcon23"><i class="material-icons">&#xe84d;</i></div></a></div>
<div id="wb_Text58" style="position:absolute;left:95px;top:343px;width:55px;height:32px;text-align:center;z-index:67;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tridiv 3D (CSS)</span></div>
<div id="wb_FontAwesomeIcon16" style="position:absolute;left:177px;top:275px;width:61px;height:56px;text-align:center;z-index:68;">
<a href="javascript:popupwnd('https://onedrive.live.com/?id=root&cid=','no','no','no','yes','yes','no','60','110','750','550')" target="_self"><div id="FontAwesomeIcon16"><i class="fa fa-cloud-download">&nbsp;</i></div></a></div>
<div id="wb_Text62" style="position:absolute;left:177px;top:343px;width:61px;height:30px;text-align:center;z-index:69;">
<span style="color:#000000;font-family:Arial;font-size:12px;">OneDrive<br>[POP-UP]</span></div>
<div id="wb_Image39" style="position:absolute;left:246px;top:263px;width:80px;height:80px;z-index:70;">
<a href="#" onclick="$('#jQueryDialog64').dialog('open');return false;"><img src="images/12472264_561929810626918_2272385936819492695_n(1).png" id="Image39" alt=""></a></div>
<div id="wb_Text93" style="position:absolute;left:253px;top:343px;width:70px;height:28px;text-align:center;z-index:71;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Simulateur Smartphone</span></div>
<div id="wb_MaterialIcon59" style="position:absolute;left:340px;top:275px;width:52px;height:54px;text-align:center;z-index:72;">
<a href="#" onclick="$('#jQueryDialog67').dialog('open');return false;"><div id="MaterialIcon59"><i class="material-icons">&#xe25a;</i></div></a></div>
<div id="wb_Text99" style="position:absolute;left:340px;top:339px;width:55px;height:32px;text-align:center;z-index:73;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Envoi rapides</span></div>
<div id="wb_Image45" style="position:absolute;left:427px;top:275px;width:59px;height:56px;z-index:74;">
<a href="#" onclick="ShowObject('Layer5', 1);return false;"><img src="images/hitek_logo_HD2.png" id="Image45" alt=""></a></div>
<div id="wb_Text105" style="position:absolute;left:428px;top:343px;width:59px;height:28px;text-align:center;z-index:75;">
<span style="color:#000000;font-family:Arial;font-size:11px;">HITEK<br>Plein écran</span></div>
<div id="wb_Image53" style="position:absolute;left:512px;top:275px;width:59px;height:56px;z-index:76;">
<a href="#" onclick="$('#jQueryDialog78').dialog('open');return false;"><img src="images/SNGappsm.png" id="Image53" alt=""></a></div>
<div id="wb_Text73" style="position:absolute;left:512px;top:340px;width:63px;height:30px;text-align:center;z-index:77;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Notes Generator</span></div>
</div>

<div id="jQueryDialog4" style="z-index:445;" title="Calculatrice (system/program/calculatrice)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/calc.php">
</iframe>
</div>

<div id="jQueryDialog5" style="z-index:446;" title="Explorateur de fichiers - Votre espace personnel (1Go maximum)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="myexplorer.php">
</iframe><br />
</div>

<div id="jQueryDialog8" style="z-index:447;" title="Navigateur web Qwant (all&#233;g&#233;, sans onglet)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/navigateur.php">
</iframe>
</div>

<div id="jQueryDialog14" style="z-index:448;" title="Editeur de texte (FullPro CK Series 2016)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="system/program/texteditor/editor.html">
</iframe><br />
</div>

<div id="jQueryDialog19" style="z-index:449;" title="Rynna Search (Rechercher une page du WebOS)">
<form name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:130px;top:49px;width:350px;height:20px;line-height:20px;z-index:82;" name="SiteSearch1" value="" spellcheck="false" placeholder="Rechercher un programme, une fen&#234;tre, un script"></form>
<div id="SiteSearch1_dialog" title="Resultats"></div>
<input type="button" id="Button15" onclick="searchPage();return false;" name="Search" value="Rechercher" style="position:absolute;left:383px;top:80px;width:96px;height:25px;z-index:83;">
<div id="wb_FontAwesomeIcon20" style="position:absolute;left:11px;top:16px;width:102px;height:89px;text-align:center;z-index:84;">
<a href="#" onclick="AnimateCss('wb_FontAwesomeIcon19', 'transform-3d-flip-in-y', 0, 1200);return false;"><div id="FontAwesomeIcon20"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
</div>

<div id="jQueryDialog23" style="z-index:450;" title="Jeu de Hasard (system/program/dee)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/deeint.php">
</iframe>
</div>

<div id="jQueryDialog28" style="z-index:451;" title="WordPad - Editeur de texte avanc&#233;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/wordpad.php">
</iframe>
</div>

<div id="jQueryDialog7" style="z-index:452;" title="Informations sur votre location - M&#233;t&#233;o temps r&#233;el [HTTPS non compatible]">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
   src="addeosapps/meteo.php">
</iframe>
</div>




<div id="jQueryDialog11" style="z-index:456;" title="Param&#232;tres et aides suppl&#233;mentaires">
<div id="wb_MaterialIcon5" style="position:absolute;left:26px;top:24px;width:116px;height:118px;text-align:center;z-index:88;">
<a href="#" onclick="$('#jQueryDialog32').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon5"><i class="material-icons">&#xe88f;</i></div></a></div>
<div id="wb_Text1" style="position:absolute;left:22px;top:150px;width:124px;height:36px;text-align:center;z-index:89;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Informations sur le WebOS</strong></span></div>
<div id="wb_MaterialIcon6" style="position:absolute;left:205px;top:24px;width:116px;height:118px;text-align:center;z-index:90;">
<a href="#" onclick="$('#jQueryDialog33').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon6"><i class="material-icons">&#xe894;</i></div></a></div>
<div id="wb_Text4" style="position:absolute;left:201px;top:150px;width:124px;height:54px;text-align:center;z-index:91;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester la connexion internet</strong></span></div>
<div id="wb_MaterialIcon7" style="position:absolute;left:383px;top:24px;width:116px;height:118px;text-align:center;z-index:92;">
<a href="#" onclick="$('#jQueryDialog34').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon7"><i class="material-icons">&#xe0c8;</i></div></a></div>
<div id="wb_Text11" style="position:absolute;left:379px;top:150px;width:124px;height:36px;text-align:center;z-index:93;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Connaître mon adresse IP</strong></span></div>
<div id="wb_MaterialIcon8" style="position:absolute;left:566px;top:24px;width:116px;height:118px;text-align:center;z-index:94;">
<a href="#" onclick="$('#jQueryDialog35').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon8"><i class="material-icons">&#xe0da;</i></div></a></div>
<div id="wb_Text14" style="position:absolute;left:566px;top:150px;width:124px;height:36px;text-align:center;z-index:95;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Supprimer votre compte</strong></span></div>
<div id="wb_MaterialIcon9" style="position:absolute;left:23px;top:236px;width:116px;height:118px;text-align:center;z-index:96;">
<a href="#" onclick="$('#jQueryDialog36').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon9"><i class="material-icons">&#xe312;</i></div></a></div>
<div id="wb_Text16" style="position:absolute;left:19px;top:354px;width:124px;height:36px;text-align:center;z-index:97;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester mon clavier</strong></span></div>
<div id="wb_MaterialIcon10" style="position:absolute;left:205px;top:236px;width:116px;height:118px;text-align:center;z-index:98;">
<a href="#" onclick="$('#jQueryDialog37').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon10"><i class="material-icons">&#xe3c4;</i></div></a></div>
<div id="wb_Text29" style="position:absolute;left:201px;top:354px;width:124px;height:54px;text-align:center;z-index:99;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Configuration de l'interface personnelle</strong></span></div>
<div id="wb_MaterialIcon11" style="position:absolute;left:383px;top:236px;width:116px;height:118px;text-align:center;z-index:100;">
<a href="#" onclick="$('#jQueryDialog39').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon11"><i class="material-icons">&#xe8e8;</i></div></a></div>
<div id="wb_Text30" style="position:absolute;left:379px;top:354px;width:124px;height:36px;text-align:center;z-index:101;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Verifier la protection</strong></span></div>
<div id="wb_MaterialIcon12" style="position:absolute;left:570px;top:236px;width:116px;height:118px;text-align:center;z-index:102;">
<a href="#" onclick="$('#jQueryDialog38').dialog('open');return false;"><div id="MaterialIcon12"><i class="material-icons">&#xe8df;</i></div></a></div>
<div id="wb_Text31" style="position:absolute;left:566px;top:354px;width:124px;height:36px;text-align:center;z-index:103;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Calendrier détaillé</strong></span></div>
<div id="wb_MaterialIcon29" style="position:absolute;left:750px;top:24px;width:116px;height:118px;text-align:center;z-index:104;">
<a href="#" onclick="$('#jQueryDialog2').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon29"><i class="material-icons">&#xe8c2;</i></div></a></div>
<div id="wb_MaterialIcon32" style="position:absolute;left:750px;top:236px;width:116px;height:118px;text-align:center;z-index:105;">
<a href="#" onclick="$('#jQueryDialog26').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon32"><i class="material-icons">&#xe80b;</i></div></a></div>
<div id="wb_Text9" style="position:absolute;left:746px;top:150px;width:124px;height:36px;text-align:center;z-index:106;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Gestion des erreurs</strong></span></div>
<div id="wb_Text90" style="position:absolute;left:746px;top:354px;width:124px;height:36px;text-align:center;z-index:107;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Changer de langues</strong></span></div>
</div>

<div id="jQueryDialog33" style="z-index:457;" title="Test de votre connexion internet">
<div id="wb_MaterialIcon14" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:108;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog33').dialog('close');return false;"><div id="MaterialIcon14"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text33" style="position:absolute;left:23px;top:56px;width:639px;height:16px;z-index:109;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Testez votre connexion internet (débit montant/descendant) :</span></div>
<div id="Html19" style="position:absolute;left:22px;top:97px;width:846px;height:443px;z-index:110">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.ariase.com/fr/vitesse/">
</iframe><br /></div>
</div>



<div id="jQueryDialog41" style="z-index:460;" title="Gestionnaire de Jeux">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="gamemanager.php">
</iframe><br />
</div>

<div id="jQueryDialog20" style="z-index:461;" title="D&#233;part RER SNCF par ville (system/program/sncfappli) [HTTPS non compatible]">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/sncf.php">
</iframe>
</div>

<div id="jQueryDialog16" style="z-index:462;" title="StreetView">
<iframe
  width="100%"
  height="100%"
  frameborder="0" style="border:0"
  overflow="hidden"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCl0N46TIpQLmiE8fo-EqQef-zkC0lQuQQ
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>
</div>

<div id="jQueryDialog12" style="z-index:463;" title="Applications virtualis&#233;es">
<div id="wb_jQueryAccordion1" style="position:absolute;left:9px;top:11px;width:777px;height:430px;z-index:123;">
<div id="jQueryAccordion1">
<h3>Origine Windows</h3>
<div>
<div id="wb_Image8" style="position:absolute;left:3px;top:1px;width:82px;height:82px;z-index:114;">
<a href="javascript:popupwnd('https://office.live.com/start/Word.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/word-live.png" id="Image8" alt="" title="Office 2016 (gratuit) - Word"></a></div>
<div id="wb_Image11" style="position:absolute;left:137px;top:1px;width:82px;height:82px;z-index:115;">
<a href="javascript:popupwnd('https://office.live.com/start/PowerPoint.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/powerpoint-live.png" id="Image11" alt="" title="Office 2016 (gratuit) - PowerPoint"></a></div>
<div id="wb_Image14" style="position:absolute;left:207px;top:1px;width:80px;height:80px;z-index:116;">
<a href="javascript:popupwnd('https://keep.google.com/u/0/#home','no','no','no','yes','yes','no','20','20','950','650')" target="_self"><img src="images/keep-512.png" id="Image14" alt="" title="Google Keep - Bloc-Notes"></a></div>
<div id="wb_Image9" style="position:absolute;left:71px;top:1px;width:82px;height:82px;z-index:117;">
<a href="javascript:popupwnd('https://office.live.com/start/Excel.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/excel-live.png" id="Image9" alt="" title="Office 2016 (gratuit) - Excel"></a></div>
</div>
<h3>Origine Linux</h3>
<div>
<div id="wb_Image1" style="position:absolute;left:3px;top:2px;width:85px;height:85px;z-index:118;">
<a href="javascript:popupwnd('http://rynnawebos.fr/login/linux/helloworld/index.php','no','no','no','yes','yes','no','20','20','500','300')" target="_self"><img src="images/diJXUfgE_400x400.png" id="Image1" alt=""></a></div>
</div>
<h3>Origine MAC OSx</h3>
<div>
<div id="wb_Image7" style="position:absolute;left:5px;top:4px;width:89px;height:89px;z-index:119;">
<a href="javascript:popupwnd('http://rynnawebos.fr/login/apple/RGBConverter.apple/Widget.html','no','no','no','yes','yes','no','20','20','320','320')" target="_self"><img src="images/256x256bb.png" id="Image7" alt=""></a></div>
<div id="wb_Image16" style="position:absolute;left:82px;top:4px;width:89px;height:89px;z-index:120;">
<a href="javascript:popupwnd('http://rynnawebos.fr/login/apple/FLVPlayer.apple/FLVPlayer.html','no','no','no','yes','yes','no','20','20','400','350')" target="_self"><img src="images/aplus-flv-to-apple-tv-converter.png" id="Image16" alt=""></a></div>
<div id="wb_Image17" style="position:absolute;left:155px;top:5px;width:89px;height:89px;z-index:121;">
<a href="javascript:popupwnd('http://rynnawebos.fr/login/apple/eCalc_Scientific.apple/main.html','no','no','no','yes','yes','no','20','20','760','590')" target="_self"><img src="images/Calculatrice_apple.png" id="Image17" alt=""></a></div>
</div>
<h3>Origine Android</h3>
<div>
<div id="wb_Text27" style="position:absolute;left:16px;top:12px;width:717px;height:80px;z-index:122;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Pour le moment aucune application Android n'est virtualisées. Si vous avez en votre possession des applications Android virtualisées fonctionnant via internet vous pouvez les proposer à l'aide du programme &quot;Déposer vos Applis&quot; disponible dans le Menu Applicatifs du WebOS.<br><br>Merci pour votre contribution !</em></span></div>
</div>
</div>
</div>
</div>

<div id="jQueryDialog27" style="z-index:464;" title="Docteur Flashy - Analyse de votre ordinateur">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/doctorflashy.php">
</iframe>
</div>

<div id="jQueryDialog10" style="z-index:465;" title="Chat WebOS (Publique)">
<!-- Debut shoutbox - https://www.i-tchat.com -->
<iframe src="https://www.i-tchat.com/shoutbox/shoutbox.php?idShoutbox=130310" width="100%" height="100%" frameborder="0" allowtransparency="true" >Votre navigateur semble incompatible, essayez d'ouvrir le <a href="https://www.i-tchat.com" title="tchat" onClick="window.open(this.href+'?130310');">tchat</a>, ou rencontrez le webmaster pour plus d'informations.</iframe>
<br />Agrandir le <a href="https://www.i-tchat.com/?130310" onClick="window.open(this.href);return false;">chat</a> .
<!-- Fin shoutbox -->
</div>

<div id="jQueryDialog29" style="z-index:466;" title="AVERTISSEMENT">
<div id="wb_Text6" style="position:absolute;left:13px;top:16px;width:379px;height:272px;z-index:135;">
<span style="color:#000000;font-family:Arial;font-size:15px;">AVERTISSEMENT concernant l'utilisation du Chat publique.<br><br>Ce Chat vous permet de discuter entre tout les utilisateurs en ligne du WebOS.<br><br>Veuillez être polis et respectueux.<br>Toutes personnes utilisant le Chat en étant grossier, malveillants ou en publiant des choses illégales verra son compte fermé et son IP banni.<br><br>Nous autorisons la publicité sur ce Chat pour faire partager vos projets, vos actions ou votre entreprise, mais veuillez ne pas en abuser.<br><br>Merci pour votre compréhension.</span></div>
<input type="submit" id="Button6" onclick="$('#jQueryDialog10').dialog('open');$('#jQueryDialog29').dialog('close');return false;" name="" value="J'accepte les conditions" style="position:absolute;left:15px;top:309px;width:374px;height:25px;z-index:136;">
</div>

<div id="jQueryDialog36" style="z-index:467;" title="Configuration clavier">
<div id="wb_MaterialIcon17" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:137;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog36').dialog('close');return false;"><div id="MaterialIcon17"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text35" style="position:absolute;left:73px;top:19px;width:249px;height:16px;z-index:138;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Paramètrage du clavier :</span></div>
<div id="wb_Text36" style="position:absolute;left:14px;top:76px;width:141px;height:16px;z-index:139;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Langue du clavier : </span></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:165px;top:70px;width:176px;height:28px;z-index:140;">
<option selected value="fr-FR">Français (French)</option>
</select>
<input type="text" id="Editbox1" style="position:absolute;left:10px;top:126px;width:529px;height:16px;line-height:16px;z-index:141;" name="Editbox1" value="" spellcheck="false" title="Tester votre clavier ici m&#234;me">
<div id="Html60" style="position:absolute;left:11px;top:167px;width:536px;height:153px;z-index:142">
<html>
<body>

<script>

if (document.body)
{
var larg = screen.width;
var haut = screen.height;
}

document.write("Cette fenêtre fait " + larg + " de large et "+haut+" de haut");

</script>

<script>
document.write("<div style='font-family:Arial;font-size:12px;color:#000000;text-decoration:none;font-weight:normal;font-style:normal;text-align:left;text-decoration:none'>" + navigator.appName + " " + navigator.appVersion + "<\/div>");
</script>

</body>
</html> </div>
</div>

<div id="jQueryDialog37" style="z-index:468;" title="Configuration de votre interface personnelle">
<div id="wb_MaterialIcon18" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:143;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog37').dialog('close');return false;"><div id="MaterialIcon18"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text50" style="position:absolute;left:15px;top:55px;width:243px;height:16px;z-index:144;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Choisissez un fond d'écran personnel :</span></div>
<div id="Html49" style="position:absolute;left:22px;top:82px;width:193px;height:120px;overflow:hidden;z-index:145">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction1()"><img src="backgroundimage/B00img901.jpg" id="Image901"></a>

<script>
function myFunction1() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B00img901.jpg')";
}
</script>

</body>
</html></div>
<div id="Html50" style="position:absolute;left:22px;top:213px;width:193px;height:120px;overflow:hidden;z-index:146">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction2()"><img src="backgroundimage/B01img902.jpg" id="Image902"></a>

<script>
function myFunction2() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B01img902.jpg')";
}
</script>

</body>
</html></div>
<div id="Html51" style="position:absolute;left:22px;top:343px;width:193px;height:120px;overflow:hidden;z-index:147">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction3()"><img src="backgroundimage/B02img903.jpg" id="Image903"></a>

<script>
function myFunction3() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B02img903.jpg')";
}
</script>

</body>
</html></div>
<div id="Html52" style="position:absolute;left:226px;top:82px;width:193px;height:120px;overflow:hidden;z-index:148">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction4()"><img src="backgroundimage/B03img904.jpg" id="Image904"></a>

<script>
function myFunction4() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B03img904.jpg')";
}
</script>

</body>
</html></div>
<div id="Html53" style="position:absolute;left:226px;top:213px;width:193px;height:120px;overflow:hidden;z-index:149">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction5()"><img src="backgroundimage/B04img905.jpg" id="Image905"></a>

<script>
function myFunction5() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B04img905.jpg')";
}
</script>

</body>
</html></div>
<div id="Html54" style="position:absolute;left:226px;top:343px;width:193px;height:120px;overflow:hidden;z-index:150">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction6()"><img src="backgroundimage/B05img906.jpg" id="Image906"></a>

<script>
function myFunction6() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B05img906.jpg')";
}
</script>

</body>
</html></div>
<div id="Html55" style="position:absolute;left:432px;top:82px;width:193px;height:120px;overflow:hidden;z-index:151">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction7()"><img src="backgroundimage/B06img907.jpg" id="Image907"></a>

<script>
function myFunction7() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B06img907.jpg')";
}
</script>

</body>
</html></div>
<div id="Html56" style="position:absolute;left:432px;top:213px;width:193px;height:120px;overflow:hidden;z-index:152">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction8()"><img src="backgroundimage/B07img908.jpg" id="Image908"></a>

<script>
function myFunction8() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B07img908.jpg')";
}
</script>

</body>
</html></div>
<div id="Html57" style="position:absolute;left:432px;top:343px;width:193px;height:120px;overflow:hidden;z-index:153">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction9()"><img src="backgroundimage/B08img909.jpg" id="Image909"></a>

<script>
function myFunction9() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B08img909.jpg')";
}
</script>

</body>
</html></div>
</div>

<div id="jQueryDialog38" style="z-index:469;" title="Calendrier d&#233;taill&#233;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.2017calendrier.fr/">
</iframe><br />
</div>

<div id="jQueryDialog25" style="z-index:470;" title="Calculateur Euro (system/program/eurocalc)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/calceuro.php">
</iframe>
</div>

<div id="jQueryDialog24" style="z-index:471;" title="Horloge interactive (system/program/horloge)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/horlogeint.php">
</iframe>
</div>

<div id="jQueryDialog34" style="z-index:472;" title="Affichage de votre adresse IP [Ne fonctionne pas en HHTPS]">
<div id="wb_MaterialIcon15" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:157;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog34').dialog('close');return false;"><div id="MaterialIcon15"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="Html21" style="position:absolute;left:51px;top:10px;width:666px;height:153px;z-index:158">
ADRESSE IP : 
<?

echo $_SERVER["REMOTE_ADDR"];

?></div>
</div>

<div id="jQueryDialog39" style="z-index:473;" title="Verification de la protection">
<div id="wb_MaterialIcon20" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:159;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog39').dialog('close');return false;"><div id="MaterialIcon20"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_MaterialIcon21" style="position:absolute;left:48px;top:10px;width:106px;height:100px;text-align:center;z-index:160;">
<div id="MaterialIcon21"><i class="material-icons">&#xe32a;</i></div></div>
<div id="wb_Text37" style="position:absolute;left:168px;top:30px;width:290px;height:80px;text-align:justify;z-index:161;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ce serveur utilise par défaut une protection générale contre les programmes malveillants.<br>Le serveur par défaut rynnawebos.fr chez 1and1 permet également de protéger le serveur des attaques DDoS et PingOfDeath.</span></div>
</div>

<div id="jQueryDialog40" style="z-index:474;" title="Editeur 3D Tridiv CSS 3">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/tridiv3d.php">
</iframe>
</div>

<div id="jQueryDialog35" style="z-index:475;" title="Supprimer votre compte">
<div id="wb_Text34" style="position:absolute;left:12px;top:61px;width:377px;height:112px;z-index:163;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour supprimer votre compte pour l'instant vous devez écrire un mail à support@rynnawebos.fr<br><br>Votre compte sera alors supprimé (ainsi que vos fichiers hébergés) dans les 72 heures.<br><br>Merci pour votre patience.</span></div>
<div id="wb_MaterialIcon16" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:164;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog35').dialog('close');return false;"><div id="MaterialIcon16"><i class="material-icons">&#xe5cb;</i></div></a></div>
</div>

<div id="jQueryDialog42" style="z-index:476;" title="Applications d&#39;Entreprise">
<div id="wb_Image25" style="position:absolute;left:130px;top:17px;width:173px;height:119px;z-index:165;">
<img src="images/logoentreprisesource.png" id="Image25" alt=""></div>
<div id="wb_Image26" style="position:absolute;left:46px;top:157px;width:60px;height:60px;z-index:166;">
<a href="#" onclick="$('#jQueryDialog43').dialog('open');return false;"><img src="images/appli1.png" id="Image26" alt=""></a></div>
<div id="wb_Text38" style="position:absolute;left:29px;top:229px;width:96px;height:34px;text-align:center;z-index:167;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 1</span></div>
<div id="wb_Image27" style="position:absolute;left:186px;top:157px;width:60px;height:60px;z-index:168;">
<a href="#" onclick="$('#jQueryDialog44').dialog('open');return false;"><img src="images/appli2.png" id="Image27" alt=""></a></div>
<div id="wb_Image28" style="position:absolute;left:330px;top:157px;width:60px;height:60px;z-index:169;">
<a href="#" onclick="$('#jQueryDialog45').dialog('open');return false;"><img src="images/appli3.png" id="Image28" alt=""></a></div>
<div id="wb_Image29" style="position:absolute;left:47px;top:319px;width:60px;height:60px;z-index:170;">
<a href="#" onclick="$('#jQueryDialog46').dialog('open');return false;"><img src="images/appli4.png" id="Image29" alt=""></a></div>
<div id="wb_Image30" style="position:absolute;left:186px;top:319px;width:60px;height:60px;z-index:171;">
<a href="#" onclick="$('#jQueryDialog47').dialog('open');return false;"><img src="images/appli5.png" id="Image30" alt=""></a></div>
<div id="wb_Image31" style="position:absolute;left:330px;top:319px;width:60px;height:60px;z-index:172;">
<a href="#" onclick="$('#jQueryDialog48').dialog('open');return false;"><img src="images/appli6.png" id="Image31" alt=""></a></div>
<div id="wb_Text39" style="position:absolute;left:168px;top:229px;width:96px;height:34px;text-align:center;z-index:173;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 2</span></div>
<div id="wb_Text40" style="position:absolute;left:312px;top:229px;width:96px;height:34px;text-align:center;z-index:174;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 3</span></div>
<div id="wb_Text41" style="position:absolute;left:312px;top:394px;width:96px;height:34px;text-align:center;z-index:175;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 6</span></div>
<div id="wb_Text42" style="position:absolute;left:168px;top:394px;width:96px;height:34px;text-align:center;z-index:176;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 5</span></div>
<div id="wb_Text43" style="position:absolute;left:29px;top:394px;width:96px;height:34px;text-align:center;z-index:177;">
<span style="color:#000000;font-family:Arial;font-size:15px;">DESCRIPTIF APPLI 4</span></div>
<div id="wb_Text44" style="position:absolute;left:7px;top:475px;width:332px;height:16px;z-index:178;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Développeur : cet espace est réservé à votre Entreprise</span></div>
<input type="submit" id="Button8" onclick="$('#jQueryDialog49').dialog('open');return false;" name="" value="INFOS ?" style="position:absolute;left:347px;top:466px;width:96px;height:25px;z-index:179;">
</div>

<div id="jQueryDialog43" style="z-index:477;" title="[APPLICATION CORRESPONDANTE ICONE 1 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<div id="jQueryDialog44" style="z-index:478;" title="[APPLICATION CORRESPONDANTE ICONE 2 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<div id="jQueryDialog45" style="z-index:479;" title="[APPLICATION CORRESPONDANTE ICONE 3 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<div id="jQueryDialog46" style="z-index:480;" title="[APPLICATION CORRESPONDANTE ICONE 4 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<div id="jQueryDialog47" style="z-index:481;" title="[APPLICATION CORRESPONDANTE ICONE 5 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<div id="jQueryDialog48" style="z-index:482;" title="[APPLICATION CORRESPONDANTE ICONE 6 - ENTREPRISE]">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="infoentreprise.html">
</iframe>
</div>

<script>
var wb_Timer6;
function TimerStartTimer6()
{
   wb_Timer6 = setTimeout(function()
   {
      var event = null;
      ShowObject('wb_MaterialIcon24', 0);
      ShowObject('wb_Text13', 0);
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

<div id="jQueryDialog49" style="z-index:486;" title="Informations pour d&#233;veloppeurs">
<div id="wb_Text45" style="position:absolute;left:12px;top:15px;width:524px;height:304px;z-index:186;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Chers Développeurs,<br><br>Si vous êtes dirigeant d'une Entreprise ou Association ou tout simplement un amateur ou professionnel du développement saviez-vous que le code source de Rynna WebOS est gratuit ?<br><br>Pour cela il vous suffit de télécharger le code source (disponible sur l'écran de connexion -&gt; Infos Complémentaires ? -&gt; Informations sur le WebOS)<br><br>Vous trouverez à l'intérieur un document PDF qui vous permettra de modifier la fenêtre &quot;applications d'Entreprise&quot; en y insérant votre LOGO et en programmant, rapidement et facilement, jusqu'à 6 applications propres à votre entreprise !<br><br>Cette option vous permet d'adapter le WebOS Rynna pour votre Entreprise ou Association et ainsi restreindre ou gérer les applications de votre Entreprise ou Association (ou les sites internet) pour vos utilisateurs.<br><br>Plus d'informations en contactant les développeurs du WebOS (pour vous guider ou vous aider) par e-mail sur loic.ab@outlook.fr (nous ne répondont pas au SPAM).</span></div>
</div>


<div id="jQueryDialog50" title="Gestionnaire de t&#226;ches avanc&#233;s">
<div id="wb_Text47" style="position:absolute;left:11px;top:15px;width:592px;height:48px;z-index:206;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour votre sécurité les pointeurs et la barre de tâches ont été redémarrés.<br>Vous pouvez découvrir ici les applications principales du WebOS et gérer leurs fonctionnements ci-dessous :</span></div>
<div id="jQueryTabs4" style="position:absolute;left:11px;top:65px;width:584px;height:398px;z-index:207;">
<ul>
<li><a href="#jquerytabs4-page-0"><span>Forcage fermeture</span></a></li>
<li><a href="#jquerytabs4-page-1"><span>Terminal de contrôle</span></a></li>
<li><a href="#jquerytabs4-page-2"><span>Information navigateur</span></a></li>
</ul>
<div style="height:376px;" id="jquerytabs4-page-0">
<input type="button" id="Button10" onclick="$('#jQueryDialog1').dialog('close');return false;" name="" value="Menu Applicatifs" style="position:absolute;left:16px;top:58px;width:251px;height:25px;z-index:187;">
<input type="button" id="Button11" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Applis installées" style="position:absolute;left:309px;top:58px;width:251px;height:25px;z-index:188;">
<input type="button" id="Button13" onclick="$('#jQueryDialog9').dialog('close');return false;" name="" value="Application Windows" style="position:absolute;left:16px;top:93px;width:251px;height:25px;z-index:189;">
<input type="button" id="Button14" onclick="$('#jQueryDialog13').dialog('close');return false;" name="" value="Messagerie NetCourriel" style="position:absolute;left:309px;top:93px;width:251px;height:25px;z-index:190;">
<input type="button" id="Button16" onclick="$('#jQueryDialog31').dialog('close');return false;" name="" value="Dépôt Applications" style="position:absolute;left:16px;top:130px;width:251px;height:25px;z-index:191;">
<input type="button" id="Button17" onclick="$('#jQueryDialog16').dialog('close');return false;" name="" value="Street View" style="position:absolute;left:309px;top:130px;width:251px;height:25px;z-index:192;">
<input type="button" id="Button18" onclick="$('#jQueryDialog12').dialog('close');return false;" name="" value="Applications virtualisées" style="position:absolute;left:16px;top:167px;width:251px;height:25px;z-index:193;">
<input type="button" id="Button19" onclick="$('#jQueryDialog10').dialog('close');return false;" name="" value="Chat WebOS" style="position:absolute;left:309px;top:167px;width:251px;height:25px;z-index:194;">
<input type="button" id="Button20" onclick="$('#jQueryDialog40').dialog('close');return false;" name="" value="Editeur 3D Tridiv" style="position:absolute;left:16px;top:204px;width:251px;height:25px;z-index:195;">
<input type="button" id="Button21" onclick="$('#jQueryDialog42').dialog('close');return false;" name="" value="Applications d'Entreprise" style="position:absolute;left:309px;top:204px;width:251px;height:25px;z-index:196;">
<input type="button" id="Button22" onclick="$('#jQueryDialog11').dialog('close');return false;" name="" value="Paramètres et Aides" style="position:absolute;left:16px;top:240px;width:251px;height:25px;z-index:197;">
<input type="button" id="Button23" onclick="$('#jQueryDialog41').dialog('close');return false;" name="" value="Gestionnaire de jeux" style="position:absolute;left:309px;top:240px;width:251px;height:25px;z-index:198;">
<input type="button" id="Button24" onclick="$('#jQueryDialog19').dialog('close');return false;" name="" value="Terminal renseignements" style="position:absolute;left:16px;top:278px;width:251px;height:25px;z-index:199;">
<input type="button" id="Button25" onclick="$('#jQueryDialog8').dialog('close');return false;" name="" value="Navigateur Web Qwant" style="position:absolute;left:309px;top:278px;width:251px;height:25px;z-index:200;">
<input type="button" id="Button26" onclick="$('#jQueryDialog5').dialog('close');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:16px;top:315px;width:251px;height:25px;z-index:201;">
<input type="button" id="Button27" onclick="$('#jQueryDialog21').dialog('close');return false;" name="" value="Fenêtre de Bienvenue" style="position:absolute;left:309px;top:315px;width:251px;height:25px;z-index:202;">
<div id="wb_Text49" style="position:absolute;left:16px;top:372px;width:513px;height:16px;z-index:203;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information : les programmes doivent être ouverts à l'écran pour être fermés.</span></div>
</div>
<div style="height:376px;" id="jquerytabs4-page-1">
<div id="wb_Text28" style="position:absolute;left:168px;top:203px;width:249px;height:16px;text-align:center;z-index:204;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Prochainement...</span></div>
</div>
<div style="height:376px;" id="jquerytabs4-page-2">
<div id="wb_JavaScript2" style="position:absolute;left:21px;top:59px;width:555px;height:301px;z-index:205;">
<script>
document.write("<div style='font-family:Arial;font-size:12px;color:#000000;text-decoration:none;font-weight:normal;font-style:normal;text-align:left;text-decoration:none'>" + navigator.appName + " " + navigator.appVersion + "<\/div>");
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


<div id="jQueryDialog53" style="z-index:491;" title="[WIDGET] Notes">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:14px;top:11px;width:238px;height:166px;z-index:227;" rows="9" cols="37" spellcheck="false"></textarea>
</div>

<div id="jQueryDialog15" style="z-index:492;" title="[WIDGET] Calendrier">
<input type="text" id="jQueryDatePicker1" style="position:absolute;left:18px;top:6px;width:236px;height:164px;line-height:164px;z-index:228;" name="jQueryDatePicker1" value="" spellcheck="false">
</div>


<div id="jQueryDialog30" style="z-index:494;" title="Concepteur d&#39;application Web (alpha 0.2)">
<input type="submit" id="Button3" onclick="$('#jQueryDialog22').dialog('open');return false;" name="" value="Ouvrir le concepteur d'application Web (version PHP/HTML)" style="position:absolute;left:45px;top:86px;width:404px;height:25px;z-index:229;">
<div id="wb_Text8" style="position:absolute;left:15px;top:17px;width:451px;height:48px;text-align:justify;z-index:230;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Notre équipe remercie grandement Maxime G., développeur Web et ami, pour son aide à la conception du Concepteur d'Applications Web côté PHP et pour la sécurité du système.</span></div>
</div>

<div id="jQueryDialog22" style="z-index:495;" title="Concepteur d&#39;applications Web (version PHP)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="generatiug/generatiugtest.php">
</iframe>
</div>

<div id="jQueryDialog54" style="z-index:496;" title="Applis Web Communautaires">
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

<div id="jQueryDialog51" style="z-index:498;" title="Forum Veler Software (d&#233;veloppement Rynna WebOS et divers projets)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://forumvelersoftware.bbactif.com/t2085-rynna-webos-natif-projet-mini-webos-by-algostep-company">
</iframe>
</div>

<div id="jQueryDialog56" style="z-index:499;" title="Ipiccy - Retouches photos en ligne">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/ipiccy.php">
</iframe>
</div>

<div id="jQueryDialog57" style="z-index:500;" title="Le Bon Coin - Ventes et achats en ligne en France">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/leboncoin.php">
</iframe>
</div>

<div id="jQueryDialog58" style="z-index:501;" title="Orange TV - toutes vos chaines en ligne (stream)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/orangetv.php">
</iframe>
</div>

<div id="jQueryDialog59" style="z-index:502;" title="PrintFriendly - Votre page web au format PDF imprimable">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/webpdf.php">
</iframe>
</div>

<div id="jQueryDialog60" style="z-index:503;" title="01net - Blog, actualit&#233;s et logiciels informatiques et nouvelle technologie">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/01net.php">
</iframe>
</div>

<div id="jQueryDialog61" style="z-index:504;" title="CDiscount">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/cdiscount.php">
</iframe>
</div>


<div id="jQueryDialog6" title="Que souhaitez-vous faire ?">
<input type="button" id="Button5" onclick="window.location.href='./session.php';return false;" name="" value="Redémarrer la session" style="position:absolute;left:18px;top:17px;width:420px;height:25px;z-index:240;">
<input type="button" id="Button28" onclick="$('#jQueryDialog6').dialog('close');return false;" name="" value="Annuler et revenir au bureau" style="position:absolute;left:18px;top:95px;width:420px;height:25px;z-index:241;">
<div id="wb_Logout1" style="position:absolute;left:18px;top:55px;width:418px;height:23px;z-index:242;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Fermer la session maintenant" id="Logout1">
</form>
</div>
</div>

<div id="jQueryDialog1" style="z-index:507;" title="Menu Applicatifs">
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:12px;top:12px;width:72px;height:64px;text-align:center;z-index:243;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon2"><i class="fa fa-laptop">&nbsp;</i></div></a></div>
<div id="wb_Text2" style="position:absolute;left:7px;top:84px;width:77px;height:28px;text-align:center;z-index:244;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis générales</span></div>
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:202px;top:14px;width:73px;height:61px;text-align:center;z-index:245;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon4"><i class="fa fa-folder-open-o">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon7" style="position:absolute;left:304px;top:15px;width:67px;height:56px;text-align:center;z-index:246;">
<a href="#" onclick="$('#jQueryDialog54').dialog('open');TimerStartTimer1();$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon7"><i class="fa fa-list-alt">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon11" style="position:absolute;left:111px;top:132px;width:61px;height:50px;text-align:center;z-index:247;">
<a href="#" onclick="$('#jQueryDialog12').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon11"><i class="fa fa-object-group">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon12" style="position:absolute;left:197px;top:132px;width:78px;height:49px;text-align:center;z-index:248;">
<a href="#" onclick="$('#jQueryDialog16').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon12"><i class="fa fa-map">&nbsp;</i></div></a></div>
<div id="wb_Text12" style="position:absolute;left:199px;top:82px;width:76px;height:28px;text-align:center;z-index:249;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Explorateur Fichiers</span></div>
<div id="wb_Text13" style="position:absolute;left:295px;top:84px;width:86px;height:28px;text-align:center;z-index:250;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis de la communautée</span></div>
<div id="wb_Text18" style="position:absolute;left:9px;top:198px;width:75px;height:28px;text-align:center;z-index:251;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis Entreprise</span></div>
<div id="wb_Text19" style="position:absolute;left:106px;top:198px;width:70px;height:28px;text-align:center;z-index:252;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis Virtualisées</span></div>
<div id="wb_Text20" style="position:absolute;left:199px;top:198px;width:76px;height:14px;text-align:center;z-index:253;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Street-View</span></div>
<div id="wb_FontAwesomeIcon13" style="position:absolute;left:303px;top:132px;width:69px;height:50px;text-align:center;z-index:254;">
<a href="#" onclick="$('#jQueryDialog13').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon13"><i class="fa fa-envelope-open">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon14" style="position:absolute;left:396px;top:132px;width:71px;height:49px;text-align:center;z-index:255;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon14"><i class="fa fa-quora">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon18" style="position:absolute;left:396px;top:15px;width:70px;height:54px;text-align:center;z-index:256;">
<a href="#" onclick="$('#jQueryDialog32').dialog('close');$('#jQueryDialog33').dialog('close');$('#jQueryDialog34').dialog('close');$('#jQueryDialog35').dialog('close');$('#jQueryDialog36').dialog('close');$('#jQueryDialog37').dialog('close');$('#jQueryDialog38').dialog('close');$('#jQueryDialog39').dialog('close');$('#jQueryDialog11').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon18"><i class="fa fa-gears">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon19" style="position:absolute;left:109px;top:15px;width:64px;height:56px;text-align:center;z-index:257;">
<a href="#" onclick="$('#jQueryDialog19').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon19"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
<div id="wb_Text21" style="position:absolute;left:302px;top:198px;width:70px;height:28px;text-align:center;z-index:258;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Messagerie Net-C</span></div>
<div id="wb_Text24" style="position:absolute;left:402px;top:198px;width:65px;height:28px;text-align:center;z-index:259;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Navigateur Qwant</span></div>
<div id="wb_Text25" style="position:absolute;left:393px;top:84px;width:77px;height:28px;text-align:center;z-index:260;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Paramètres &amp; Aides</span></div>
<div id="wb_Text52" style="position:absolute;left:103px;top:85px;width:73px;height:14px;text-align:center;z-index:261;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Rynna Search</span></div>
<div id="wb_JavaScript3" style="position:absolute;left:320px;top:378px;width:147px;height:23px;z-index:262;">
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
<hr id="Line1" style="position:absolute;left:15px;top:366px;width:452px;height:1px;z-index:263;">
<div id="wb_FontAwesomeIcon10" style="position:absolute;left:14px;top:132px;width:69px;height:59px;text-align:center;z-index:264;">
<a href="#" onclick="$('#jQueryDialog42').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon10"><i class="fa fa-briefcase">&nbsp;</i></div></a></div>
<div id="wb_LoginName1" style="position:absolute;left:17px;top:378px;width:278px;height:23px;z-index:265;">
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
<div id="wb_FontAwesomeIcon3" style="position:absolute;left:16px;top:245px;width:69px;height:59px;text-align:center;z-index:266;">
<a href="#" onclick="$('#jQueryDialog37').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon3"><i class="fa fa-desktop">&nbsp;</i></div></a></div>
<div id="wb_Text15" style="position:absolute;left:14px;top:315px;width:75px;height:28px;text-align:center;z-index:267;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Modifier fonds d'écran</span></div>
</div>

<div id="jQueryDialog21" title="Oups !">
<div id="wb_Text103" style="position:absolute;left:15px;top:19px;width:438px;height:112px;z-index:268;">
<span style="color:#DC143C;font-family:Arial;font-size:13px;"><strong>Une erreur est survenue !<br>Nous ne pouvons rien faire pour vous...<br><br>Nous vous conseillons d'attendre une mise à jour du WebOS pour poursuivre l'action demandée.<br><br>Merci pour votre patience.</strong></span></div>
</div>

<div id="Layer3" style="position:fixed;text-align:center;left:0;top:0;right:0;bottom:0;z-index:509;" onclick="Toggle('Layer3', 'slidedown', 1200);ShowObject('wb_PageHeader', 0);ShowObject('wb_LayoutGrid1', 0);ShowObject('wb_LayoutGrid3', 0);ShowObject('wb_LayoutGrid4', 0);ShowObject('wb_LayoutGrid5', 0);ShowObject('wb_LayoutGrid6', 0);TimerStartTimer9();return false;">
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
<div id="jQueryDialog18" title="Modifier votre session ?">
<div id="wb_Text89" style="position:absolute;left:9px;top:12px;width:364px;height:48px;text-align:justify;z-index:290;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Souhaitez-vous vraiment modifier votre session ?</strong><br>Cela entrainera une fermeture de votre session mais ne vous deconnectera pas (vos Cookies doivent être autorisées).</span></div>
<input type="button" id="Button29" onclick="$('#jQueryDialog18').dialog('close');return false;" name="" value="NON" style="position:absolute;left:11px;top:81px;width:96px;height:25px;z-index:291;">
<input type="submit" id="Button30" onclick="window.location.href='./modifuser.php';return false;" name="" value="OUI" style="position:absolute;left:262px;top:81px;width:96px;height:25px;z-index:292;">
</div>

<div id="jQueryDialog2" style="z-index:511;" title="Gestion des erreurs (Kernel PHP)">
<div id="wb_MaterialIcon55" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:293;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog2').dialog('close');return false;"><div id="MaterialIcon55"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text91" style="position:absolute;left:73px;top:19px;width:347px;height:16px;z-index:294;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Listes des erreurs gérées par le WebOS :</span></div>
<table style="position:absolute;left:23px;top:60px;width:401px;height:350px;z-index:295;" id="Table1">
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 300</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 301</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 302</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 303</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 304</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 305</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 307</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 310</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 400</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 401</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 402</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 403</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 404</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 405</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 406</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 407</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 408</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 409</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 410</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 411</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 412</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 413</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 415</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:15px;"> 416</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 417</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 423</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:15px;"> 449</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 450</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 22</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 500</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 501</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 502</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 503</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 504</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 505</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 507</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> 509</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> kernel</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> module</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> jquery</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> javascript</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> security</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
</table>
<input type="button" id="Button1" onclick="ShowObject('wb_PageHeader', 0);TimerStartTimer8();return false;" name="" value="Cliquez ici pour ouvrir le Gestionnaire de Tâches" style="position:absolute;left:23px;top:415px;width:401px;height:25px;z-index:296;">
</div>

<div id="jQueryDialog26" style="z-index:512;" title="Changer de langues">
<div id="wb_MaterialIcon56" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:297;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog26').dialog('close');return false;"><div id="MaterialIcon56"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text92" style="position:absolute;left:73px;top:19px;width:347px;height:192px;z-index:298;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Dans le futur nous proposerons également le WebOS en Anglais.<br><br>En attendant nous sommes désolé de ne pas pouvoir vous proposer ce WebOS dans une autre langue.<br><br>--------------------------<br><br>In the future we will also offer WebOS in English.<br><br>In the meantime we apologize for not being able to offer you WebOS in another language.</span></div>
</div>

<div id="jQueryDialog64" style="z-index:513;" title="Simulateur Smartphone">
<div id="wb_Text94" style="position:absolute;left:13px;top:13px;width:321px;height:96px;z-index:299;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Sélectionnez un site internet ou un lien vers une application Web pour WebOS (PHP, ASPX, FLASH) à tester sur le simulateur.<br>Si vous n'indiquez pas de cible le site par défaut qui sera affiché sera celui de test :<br>https://www.laposte.fr (version mobile FR/US)</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:17px;top:120px;width:307px;height:16px;line-height:16px;z-index:300;" name="Editbox2" value="http://lien-site.fr (Non disponible pour le moment...)" disabled spellcheck="false">
<input type="button" id="Button31" onclick="$('#jQueryDialog65').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simultauer iPhone 8 (iPhone O)" style="position:absolute;left:17px;top:161px;width:317px;height:25px;z-index:301;">
<input type="button" id="Button32" onclick="$('#jQueryDialog66').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simultauer Samsung Galaxy s8" style="position:absolute;left:17px;top:204px;width:317px;height:25px;z-index:302;">
</div>

<div id="jQueryDialog65" style="z-index:514;" title="Simulateur iPhone 8 (iPhone O) (test de sites Web et WebApps)">
<div id="Html18" style="position:absolute;left:54px;top:42px;width:265px;height:585px;overflow:hidden;z-index:303">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/laposte.php">
</iframe></div>
<div id="wb_Image41" style="position:absolute;left:101px;top:42px;width:178px;height:29px;z-index:304;">
<img src="images/iphone8_simulation_haut.png" id="Image41" alt=""></div>
<div id="wb_MaterialIcon57" style="position:absolute;left:544px;top:25px;width:40px;height:41px;text-align:center;z-index:305;">
<div id="MaterialIcon57"><i class="material-icons">&#xe5d5;</i></div></div>
<input type="button" id="Button33" name="" value="Action bouton central (sous écran)" style="position:absolute;left:354px;top:109px;width:222px;height:25px;z-index:306;" disabled>
<input type="button" id="Button34" name="" value="Page précédente" style="position:absolute;left:354px;top:150px;width:222px;height:25px;z-index:307;" disabled>
<input type="button" id="Button35" name="" value="Page suivante" style="position:absolute;left:354px;top:193px;width:222px;height:25px;z-index:308;" disabled>
<input type="button" id="Button36" name="" value="Version iOS" style="position:absolute;left:354px;top:237px;width:222px;height:25px;z-index:309;" disabled>
<input type="button" id="Button37" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog65').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:354px;top:616px;width:222px;height:25px;z-index:310;">
<div id="wb_Text95" style="position:absolute;left:354px;top:282px;width:222px;height:96px;z-index:311;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information :<br>Dans ce prototype de simulation smartphone vous ne pouvez pas encore naviguer dans le site affiché.<br>Ceci sera possible lorsque nous auront améliorer le programme.</span></div>
<div id="wb_Image40" style="position:absolute;left:31px;top:25px;width:307px;height:616px;z-index:312;">
<img src="images/nue_iphone8_design_final_2018.png" id="Image40" alt=""></div>
<div id="wb_Text97" style="position:absolute;left:-1px;top:6px;width:474px;height:15px;z-index:313;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog66" style="z-index:515;" title="Simulateur Samsung Galaxy s8 (test de sites Web et WebApps)">
<div id="Html20" style="position:absolute;left:70px;top:58px;width:270px;height:562px;overflow:hidden;z-index:314">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/laposte.php">
</iframe></div>
<div id="wb_MaterialIcon58" style="position:absolute;left:560px;top:25px;width:40px;height:41px;text-align:center;z-index:315;">
<div id="MaterialIcon58"><i class="material-icons">&#xe5d5;</i></div></div>
<input type="button" id="Button38" name="" value="Action bouton central (sous écran)" style="position:absolute;left:370px;top:109px;width:222px;height:25px;z-index:316;" disabled>
<input type="button" id="Button39" name="" value="Page précédente" style="position:absolute;left:370px;top:150px;width:222px;height:25px;z-index:317;" disabled>
<input type="button" id="Button40" name="" value="Page suivante" style="position:absolute;left:370px;top:193px;width:222px;height:25px;z-index:318;" disabled>
<input type="button" id="Button41" name="" value="Version Android" style="position:absolute;left:370px;top:237px;width:222px;height:25px;z-index:319;" disabled>
<input type="button" id="Button42" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog66').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:370px;top:627px;width:222px;height:25px;z-index:320;">
<div id="wb_Text96" style="position:absolute;left:370px;top:282px;width:222px;height:96px;z-index:321;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information :<br>Dans ce prototype de simulation smartphone vous ne pouvez pas encore naviguer dans le site affiché.<br>Ceci sera possible lorsque nous auront améliorer le programme.</span></div>
<div id="wb_Image42" style="position:absolute;left:55px;top:16px;width:301px;height:642px;z-index:322;">
<img src="images/Samsung-Galaxy-S8-0.png" id="Image42" alt=""></div>
<div id="wb_Text98" style="position:absolute;left:8px;top:6px;width:474px;height:15px;z-index:323;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog67" style="z-index:516;" title="Envoi rapide">
<div id="wb_Extension1" style="position:absolute;left:21px;top:66px;width:845px;height:218px;z-index:324;">
<div id="Extension1">
<div class="upload-drop-target"><h2>Glisser et déposer vos fichiers dans ce cadre (jpg, jpeg, gif ou png)</h2></div>
<input type="file" multiple="">
<div class="upload-selected"></div>
<a class="button upload-choose" href="#">Choisir des fichiers</a>
<a class="button upload-submit" href="#">Envoyer</a>
</div>
</div>
<div id="wb_Text100" style="position:absolute;left:27px;top:13px;width:832px;height:48px;z-index:325;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Déposer sur le serveur une image de votre choix (taille limite : 4mo par image)<br>Pour partager votre image notez le chemin : </span><span style="color:#0000CD;font-family:Arial;font-size:13px;"><strong>http://rynnawebos.fr/login/uploads/[le nom de votre fichier].[son extension]</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;">&nbsp; et partagez le à vos amies !</span></div>
</div>

<div id="jQueryDialog13" style="z-index:517;" title="Messagerie personelle Europ&#233;enne (Net Courriel)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/messagerienetc.php">
</iframe>
</div>


<div id="jQueryDialog69" style="z-index:519;" title="[WIDGET] Horloge">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/horloge.php">
</iframe>
</div>

<div id="Layer4" style="position:fixed;text-align:right;right:0;top:0;bottom:0;width:118px;z-index:520;" onmouseleave="ShowObject('Layer4', 0);return false;">
<div id="Layer4_Container" style="width:3000px;position:relative;margin-left:auto;margin-right:0;text-align:left;">
<div id="wb_FontAwesomeIcon21" style="position:absolute;left:25px;top:16px;width:78px;height:63px;text-align:center;z-index:328;">
<a href="#" onclick="$('#jQueryDialog70').dialog('open');return false;"><div id="FontAwesomeIcon21"><i class="fa fa-camera">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon22" style="position:absolute;left:25px;top:118px;width:78px;height:68px;text-align:center;z-index:329;">
<a href="#" onclick="$('#jQueryDialog72').dialog('open');return false;"><div id="FontAwesomeIcon22"><i class="fa fa-fax">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon24" style="position:absolute;left:25px;top:325px;width:78px;height:70px;text-align:center;z-index:330;">
<a href="#" onclick="$('#jQueryDialog3').dialog('close');$('#jQueryDialog5').dialog('close');$('#jQueryDialog11').dialog('close');ShowObject('Layer7', 1);return false;"><div id="FontAwesomeIcon24"><i class="fa fa-codepen">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon25" style="position:absolute;left:25px;top:435px;width:78px;height:64px;text-align:center;z-index:331;">
<a href="#" onclick="$('#jQueryDialog73').dialog('open');return false;"><div id="FontAwesomeIcon25"><i class="fa fa-save">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon23" style="position:absolute;left:25px;top:227px;width:78px;height:61px;text-align:center;z-index:332;">
<a href="#" onclick="$('#jQueryDialog71').dialog('open');return false;"><div id="FontAwesomeIcon23"><i class="fa fa-address-card-o">&nbsp;</i></div></a></div>
</div>
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

<div id="jQueryDialog70" style="z-index:522;" title="Webcam">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/webcam.php">
</iframe>
</div>

<div id="jQueryDialog71" style="z-index:523;" title="Calendrier g&#233;n&#233;ral">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/agenda.php">
</iframe>
</div>

<div id="Layer5" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:524;" onclick="ShowObject('Layer5', 0);return false;">
<div id="wb_TextArt1" style="position:absolute;left:119px;top:44px;width:815px;height:23px;z-index:336;">
<img src="images/img0011.png" id="TextArt1" alt="HITEK - Les meilleurs actualit&#233;es des nouvelles technologies" title="HITEK - Les meilleurs actualit&#233;es des nouvelles technologies" style="width:815px;height:23px;"></div>
<div id="Layer6" style="position:absolute;text-align:left;left:119px;top:147px;width:1046px;height:592px;z-index:337;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://hitek.fr/actualite">
</iframe>
</div>
<div id="wb_Image44" style="position:absolute;left:31px;top:30px;width:64px;height:50px;z-index:338;">
<img src="images/placeholder.gif" data-src="images/logo.png" id="Image44" alt=""></div>
<div id="wb_Text104" style="position:absolute;left:4px;top:0px;width:247px;height:14px;z-index:339;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;"><em>Cliquer n'importe où dans ce cadre pour quitter</em></span></div>
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

<div id="jQueryDialog72" style="z-index:526;" title="Devises">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/devise.php">
</iframe>
</div>

<div id="jQueryDialog73" style="z-index:527;" title="Sauvegarde local de votre session">
<div id="wb_Text106" style="position:absolute;left:11px;top:12px;width:650px;height:160px;z-index:342;">
<span style="color:#000000;font-family:Arial;font-size:13px;">PAS ENCORE DISPONIBLE...<br><br>Dans l'objectif d'un système libre et fiable nous vous proposerons à l'avenir de pouvoir sauvegarder vos données personnels (contenus dans &quot;home/[votre compte]&quot;) sous forme compressé (*.ZIP) localement sur votre ordinateur.<br><br>Cela vous permettra de sauvegarder tout votre contenu (si vous quitter le WebOS durant plusieurs jours ou mois) et de vous assurer d'avoir accès à vos données, hébergées à l'origine en ligne sur notre serveur, directement et localement sur votre PC (voyez cette fonction comme une &quot;backup&quot; (sauvegarde) de votre contenu privé sur votre ordinateur).</span></div>
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

<div id="Layer7" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:529;">
<div id="Layer8" style="position:absolute;text-align:left;left:150px;top:82px;width:855px;height:460px;z-index:346;">
<div id="Layer9" style="position:absolute;text-align:left;left:16px;top:11px;width:218px;height:436px;z-index:343;" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:236px;top:11px;width:211px;height:436px;z-index:344;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:453px;top:11px;width:373px;height:436px;z-index:345;" onclick="$('#jQueryDialog11').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
</div>
<div id="wb_Text107" style="position:absolute;left:4px;top:7px;width:249px;height:14px;z-index:347;">
<span style="color:#000000;font-family:Arial;font-size:11px;"><em>Test interactif 3D non dynamique</em></span></div>
</div>
<div id="jQueryDialog74" style="z-index:530;" title="Bienvenue dans la session de d&#233;monstration !">
<div id="wb_Text108" style="position:absolute;left:15px;top:12px;width:540px;height:195px;z-index:351;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Bienvenue dans la session de démonstration !</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br></span><span style="color:#FF0000;font-family:Arial;font-size:13px;"><strong>Celle-ci est une copie conforme du WebOS actuellement disponible sauf que vous n'avez pas accès à certaines propriétés qui sont les suivantes : </strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br>- Chat du WebOS et de la communauté et quelques applications internes<br>- Modifier votre compte utilisateur<br>- Accéder à l'explorateur de fichiers et votre espace personnel (1Go)<br><br><strong>Créer un compte est <u>GRATUIT et ILLIMITE</u> si vous le souhaitez par la suite !<br></strong><br>Bon test sur votre session temporaire !</span></div>
</div>

<div id="jQueryDialog32" style="z-index:531;" title="Informations sur le WebOS">
<div id="wb_Text32" style="position:absolute;left:16px;top:56px;width:609px;height:416px;text-align:center;z-index:352;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Rynna WebOS est un WebOS libre d'utilisation pour tous.</strong><br>Son code source est disponible publiquement sur le dépôt GitHub.<br><br><strong>Liste des développeurs : <br></strong><br><em>Société AlgoStep Company :<br></em><br>Loïc A.<br>Jeremy N. (n'est plus dans l'entreprise depuis le 07/2017)<br>Maxime D.<br><br><em>Développeurs qui ont aidés à son développement ou pour leurs avis (remerciements) : <br></em><br>Polien (veler Software)<br>Softwarezatorman (veler Software)<br>Lereparateurdepc (veler Software)<br>Etienne Baudoux (IRL)<br>Jeremy60800 (veler Software)<br>Fandeonepiece2 (veler Software)<br>Coincero (veler Software)<br>Maxime G. (IRL)<br>Random Coder 99 (OpenClassRoom)<br>Jona (CCSources Co.)<br><br>Merci à tout nos amies à Rouen pour leurs conseils et leurs professionnalismes durant le développement long et fastidieux de ce projet !</span></div>
<div id="wb_MaterialIcon13" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:353;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog32').dialog('close');return false;"><div id="MaterialIcon13"><i class="material-icons">&#xe5cb;</i></div></a></div>
<input type="button" id="Button9" onclick="$('#jQueryDialog77').dialog('open');return false;" name="" value="Visionner le code source (github dépôt officiel)" style="position:absolute;left:33px;top:502px;width:580px;height:25px;z-index:354;">
</div>

<div id="Layer12" style="position:absolute;text-align:left;left:1339px;top:13549px;width:473px;height:591px;z-index:532;">
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
<div id="Layer13" style="position:absolute;text-align:left;left:1842px;top:13549px;width:473px;height:591px;z-index:533;">
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
<div id="Layer14" style="position:absolute;text-align:left;left:2388px;top:13549px;width:473px;height:591px;z-index:534;">
<script>
var wb_Timer19;
function TimerStartTimer19()
{
   wb_Timer19 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer14', 0);
   }, 150);
}
function TimerStopTimer19()
{
   clearTimeout(wb_Timer19);
}
TimerStartTimer19();
</script>

<script>
var wb_Timer20;
function TimerStartTimer20()
{
   wb_Timer20 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer14', 0);
   }, 750);
}
function TimerStopTimer20()
{
   clearTimeout(wb_Timer20);
}
TimerStartTimer20();
</script>

<script>
var wb_Timer21;
function TimerStartTimer21()
{
   wb_Timer21 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer14', 1);
   }, 3000);
}
function TimerStopTimer21()
{
   clearTimeout(wb_Timer21);
}
</script>

</div>
<div id="Layer15" style="position:absolute;text-align:left;left:1339px;top:14166px;width:473px;height:591px;z-index:535;">
<script>
var wb_Timer22;
function TimerStartTimer22()
{
   wb_Timer22 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer15', 0);
   }, 150);
}
function TimerStopTimer22()
{
   clearTimeout(wb_Timer22);
}
TimerStartTimer22();
</script>

<script>
var wb_Timer23;
function TimerStartTimer23()
{
   wb_Timer23 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer15', 0);
   }, 750);
}
function TimerStopTimer23()
{
   clearTimeout(wb_Timer23);
}
TimerStartTimer23();
</script>

<script>
var wb_Timer24;
function TimerStartTimer24()
{
   wb_Timer24 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer15', 1);
   }, 3000);
}
function TimerStopTimer24()
{
   clearTimeout(wb_Timer24);
}
</script>

</div>
<div id="Layer16" style="position:absolute;text-align:left;left:1842px;top:14166px;width:473px;height:591px;z-index:536;">
<script>
var wb_Timer25;
function TimerStartTimer25()
{
   wb_Timer25 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer16', 0);
   }, 150);
}
function TimerStopTimer25()
{
   clearTimeout(wb_Timer25);
}
TimerStartTimer25();
</script>

<script>
var wb_Timer26;
function TimerStartTimer26()
{
   wb_Timer26 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer16', 0);
   }, 750);
}
function TimerStopTimer26()
{
   clearTimeout(wb_Timer26);
}
TimerStartTimer26();
</script>

<script>
var wb_Timer27;
function TimerStartTimer27()
{
   wb_Timer27 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer16', 1);
   }, 3000);
}
function TimerStopTimer27()
{
   clearTimeout(wb_Timer27);
}
</script>

</div>
<div id="Layer17" style="position:absolute;text-align:left;left:2371px;top:14150px;width:473px;height:591px;z-index:537;">
<script>
var wb_Timer28;
function TimerStartTimer28()
{
   wb_Timer28 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer17', 0);
   }, 150);
}
function TimerStopTimer28()
{
   clearTimeout(wb_Timer28);
}
TimerStartTimer28();
</script>

<script>
var wb_Timer29;
function TimerStartTimer29()
{
   wb_Timer29 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer17', 0);
   }, 750);
}
function TimerStopTimer29()
{
   clearTimeout(wb_Timer29);
}
TimerStartTimer29();
</script>

<script>
var wb_Timer30;
function TimerStartTimer30()
{
   wb_Timer30 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer17', 1);
   }, 3000);
}
function TimerStopTimer30()
{
   clearTimeout(wb_Timer30);
}
</script>

</div>
<div id="Layer18" style="position:absolute;text-align:left;left:1328px;top:14775px;width:473px;height:591px;z-index:538;">
<script>
var wb_Timer31;
function TimerStartTimer31()
{
   wb_Timer31 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer18', 0);
   }, 150);
}
function TimerStopTimer31()
{
   clearTimeout(wb_Timer31);
}
TimerStartTimer31();
</script>

<script>
var wb_Timer32;
function TimerStartTimer32()
{
   wb_Timer32 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer18', 0);
   }, 750);
}
function TimerStopTimer32()
{
   clearTimeout(wb_Timer32);
}
TimerStartTimer32();
</script>

<script>
var wb_Timer33;
function TimerStartTimer33()
{
   wb_Timer33 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer18', 1);
   }, 3000);
}
function TimerStopTimer33()
{
   clearTimeout(wb_Timer33);
}
</script>

</div>
<div id="Layer19" style="position:absolute;text-align:left;left:1867px;top:14775px;width:473px;height:591px;z-index:539;">
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
<div id="Layer20" style="position:absolute;text-align:left;left:2432px;top:14775px;width:473px;height:591px;z-index:540;">
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
<div id="jQueryDialog52" style="z-index:541;" title="Choisir un Widget ?">
<div id="wb_MaterialIcon31" style="position:absolute;left:10px;top:13px;width:67px;height:63px;text-align:center;z-index:382;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog53').dialog('open');return false;"><div id="MaterialIcon31"><i class="material-icons">&#xe0d8;</i></div></a></div>
<div id="wb_Text53" style="position:absolute;left:14px;top:82px;width:59px;height:15px;text-align:center;z-index:383;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Notes</span></div>
<div id="wb_Image15" style="position:absolute;left:95px;top:14px;width:62px;height:62px;z-index:384;">
<a href="#" onclick="$('#jQueryDialog15').dialog('open');$('#jQueryDialog52').dialog('close');return false;"><img src="images/52925.png" id="Image15" alt="" title="Calendrier"></a></div>
<div id="wb_Text3" style="position:absolute;left:97px;top:82px;width:59px;height:30px;text-align:center;z-index:385;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Calendrier</span></div>
<div id="wb_MaterialIcon61" style="position:absolute;left:176px;top:14px;width:62px;height:59px;text-align:center;z-index:386;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog69').dialog('open');return false;"><div id="MaterialIcon61"><i class="material-icons">&#xe889;</i></div></a></div>
<div id="wb_Text102" style="position:absolute;left:177px;top:82px;width:61px;height:15px;text-align:center;z-index:387;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Horloge</span></div>
<div id="Html59" style="position:absolute;left:39px;top:196px;width:188px;height:61px;z-index:388">
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
}

</script>

</body>
</html> </div>
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

<div id="Layer22" style="position:absolute;text-align:left;left:348px;top:5969px;width:1099px;height:152px;z-index:543;" onmouseleave="ShowObject('Layer22', 0);return false;">
<div id="wb_Image43" style="position:absolute;left:89px;top:39px;width:915px;height:100px;z-index:389;">
<img src="images/coque_sfx_3D.png" id="Image43" alt=""></div>
<div id="wb_Image51" style="position:absolute;left:732px;top:30px;width:80px;height:80px;z-index:390;">
<a href="#" onclick="$('#jQueryDialog76').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image51', 'transform-wiggle', 0, 500);return false;"><img src="images/nowcoworking.png" id="Image51" alt=""></a></div>
<div id="wb_Image46" style="position:absolute;left:508px;top:17px;width:110px;height:110px;z-index:391;">
<a href="#" onclick="$('#jQueryDialog68').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image46', 'transform-wiggle', 0, 500);return false;"><img src="images/OCR.png" id="Image46" alt=""></a></div>
<div id="wb_Image47" style="position:absolute;left:386px;top:17px;width:110px;height:110px;z-index:392;">
<a href="#" onclick="$('#jQueryDialog55').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image47', 'transform-wiggle', 0, 500);return false;"><img src="images/sz.png" id="Image47" alt=""></a></div>
<div id="wb_Image48" style="position:absolute;left:272px;top:17px;width:110px;height:110px;z-index:393;">
<a href="#" onclick="$('#jQueryDialog31').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image48', 'transform-wiggle', 0, 500);return false;"><img src="images/lemonde.png" id="Image48" alt=""></a></div>
<div id="wb_Image49" style="position:absolute;left:153px;top:17px;width:110px;height:110px;z-index:394;">
<a href="#" onclick="$('#jQueryDialog9').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image49', 'transform-wiggle', 0, 500);return false;"><img src="images/wikipedia.png" id="Image49" alt=""></a></div>
<div id="wb_Image50" style="position:absolute;left:626px;top:30px;width:80px;height:80px;z-index:395;">
<a href="#" onclick="$('#jQueryDialog75').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image50', 'transform-wiggle', 0, 500);return false;"><img src="images/dessinscreen.png" id="Image50" alt=""></a></div>
<div id="wb_Image52" style="position:absolute;left:838px;top:30px;width:80px;height:80px;z-index:396;">
<a href="#" onclick="$('#jQueryDialog62').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image52', 'transform-wiggle', 0, 500);return false;"><img src="images/fargo.png" id="Image52" alt=""></a></div>
</div>
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

<div id="jQueryDialog9" style="z-index:545;" title="Wikip&#233;dia">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/wikipedia.php">
</iframe>
</div>

<div id="jQueryDialog31" style="z-index:546;" title="Le Monde - Actualit&#233;s de France">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/lemonde.php">
</iframe>
</div>

<div id="jQueryDialog55" style="z-index:547;" title="Forum Etienne BAUDOUX - Forum li&#233; au projet Rynna WebOS">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/sz.php">
</iframe>
</div>

<div id="jQueryDialog68" style="z-index:548;" title="OpenClassRoom - Tutoriels et cours en ligne">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/ocr.php">
</iframe>
</div>

<div id="jQueryDialog75" style="z-index:549;" title="SUMO PAINT - Dessin (demonstration gratuite)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/paint.php">
</iframe>
</div>

<div id="jQueryDialog76" style="z-index:550;" title="Now-Coworking - Espace Coworking pour votre Entreprise">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/nowcoworking.php">
</iframe>
</div>

<div id="jQueryDialog62" style="z-index:551;" title="Notes dropbox - FARGO (gratuit)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/fargo.php">
</iframe>
</div>

<div id="Layer23" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:552;" onclick="ShowObject('Layer23', 0);return false;">
<script>
var wb_Timer42;
function TimerStartTimer42()
{
   wb_Timer42 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer23', 0);
   }, 15);
}
function TimerStopTimer42()
{
   clearTimeout(wb_Timer42);
}
TimerStartTimer42();
</script>

<script>
var wb_Timer43;
function TimerStartTimer43()
{
   wb_Timer43 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer23', 0);
   }, 45);
}
function TimerStopTimer43()
{
   clearTimeout(wb_Timer43);
}
TimerStartTimer43();
</script>

</div>
<div id="Layer24" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:553;">
<div id="Layer2" style="position:absolute;text-align:left;left:198px;top:25px;width:529px;height:374px;z-index:407;">
</div>
<div id="Layer25" style="position:absolute;text-align:left;left:50px;top:443px;width:801px;height:63px;z-index:408;">
<div id="wb_Text5" style="position:absolute;left:31px;top:18px;width:739px;height:24px;text-align:center;z-index:406;">
<span style="color:#FFFFFF;font-family:Arial;font-size:20px;"><strong>Nous préparons votre session... Patientez quelques instants, merci</strong></span></div>
</div>
</div>
<script>
var wb_Timer4;
function TimerStartTimer4()
{
   wb_Timer4 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer24', 0);
   }, 9500);
}
function TimerStopTimer4()
{
   clearTimeout(wb_Timer4);
}
TimerStartTimer4();
</script>

<div id="Layer26" style="position:absolute;text-align:left;left:2543px;top:696px;width:182px;height:302px;z-index:555;">
<div id="wb_Text17" style="position:absolute;left:8px;top:8px;width:163px;height:15px;z-index:410;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong><em>Fonctions bureautique&nbsp;&nbsp; &nbsp;&nbsp; </em></strong></span><span style="color:#FF0000;font-family:Arial;font-size:12px;"><strong><a href="#" onclick="ShowObject('Layer26', 0);return false;">X</a></strong></span></div>
<hr id="Line2" style="position:absolute;left:7px;top:35px;width:164px;height:4px;z-index:411;">
<div id="wb_Text22" style="position:absolute;left:8px;top:59px;width:163px;height:16px;z-index:412;cursor: pointer;" onclick="$('#jQueryDialog37').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Changer fond écran</span></div>
<div id="wb_Text26" style="position:absolute;left:8px;top:88px;width:163px;height:16px;z-index:413;cursor: pointer;" onclick="$('#jQueryDialog21').dialog('open');return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Créer un icône</span></div>
<div id="wb_Text46" style="position:absolute;left:8px;top:118px;width:163px;height:16px;z-index:414;cursor: pointer;" onclick="$('#jQueryDialog21').dialog('open');return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Supprimer un icône</span></div>
<div id="wb_Text48" style="position:absolute;left:8px;top:149px;width:163px;height:16px;z-index:415;cursor: pointer;" onclick="ShowObject('Layer22', 1);ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Afficher la BottomBar</span></div>
<div id="wb_Text51" style="position:absolute;left:8px;top:181px;width:163px;height:16px;z-index:416;cursor: pointer;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Ouvrir l'explorateur</span></div>
<hr id="Line3" style="position:absolute;left:7px;top:209px;width:164px;height:4px;z-index:417;">
<div id="wb_Text66" style="position:absolute;left:8px;top:227px;width:163px;height:16px;z-index:418;cursor: pointer;" onclick="$('#jQueryDialog17').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFA500;font-family:Arial;font-size:13px;">Réparer la session</span></div>
<div id="wb_Text69" style="position:absolute;left:8px;top:260px;width:163px;height:16px;z-index:419;cursor: pointer;" onclick="ShowObject('wb_PageHeader', 1);ShowObject('wb_LayoutGrid1', 1);ShowObject('wb_LayoutGrid3', 1);ShowObject('wb_LayoutGrid4', 1);ShowObject('wb_LayoutGrid5', 1);ShowObject('wb_LayoutGrid6', 1);ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Actualiser les objets</span></div>
</div>
<script>
var wb_Timer2;
function TimerStartTimer2()
{
   wb_Timer2 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer26', 0);
   }, 70);
}
function TimerStopTimer2()
{
   clearTimeout(wb_Timer2);
}
TimerStartTimer2();
</script>

<div id="Layer27" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:557;">
<script>
var wb_Timer44;
function TimerStartTimer44()
{
   wb_Timer44 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer27', 0);
   }, 70);
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

<div id="Layer28" style="position:absolute;text-align:left;left:329px;top:66px;width:290px;height:288px;z-index:423;">
</div>
<div id="Layer29" style="position:absolute;text-align:left;left:135px;top:409px;width:706px;height:104px;z-index:424;">
<div id="wb_Text70" style="position:absolute;left:24px;top:28px;width:659px;height:46px;text-align:center;z-index:420;">
<span style="color:#FFFFFF;font-family:Arial;font-size:20px;">Votre session est en cours de réparation<br>Cela ne prendra pas longtemps...</span></div>
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

</div>
<div id="jQueryDialog17" title="R&#233;paration de la session">
<div id="wb_Text71" style="position:absolute;left:7px;top:13px;width:454px;height:240px;z-index:427;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Ce programme vous permet de recharger correctement votre session et son interface.<br></strong><br><u>Utile dans les cas suivants :<br></u>- Barre de tâches disparut<br>- Icônes non affichés<br>- Grille d'alignement qui affiche plusieurs icônes identiques<br>- Impossibilité de charger la BootomBar ou la Barre d'Action (droite)<br>- Actions qui ne répondent plus<br>- Accès aux programmes qui ne répondent plus<br><strong>Cette procédure vous évite de recharger la page &quot;session&quot; et vous permet de ne pas perdre votre travail.</strong><br><br>La réparation dure quelques instants et résout la plupart des problèmes d'affichages.</span></div>
<input type="button" id="Button2" onclick="ShowObject('Layer27', 1);$('#jQueryDialog17').dialog('close');TimerStartTimer45();return false;" name="" value="Réparer maintenant" style="position:absolute;left:14px;top:276px;width:166px;height:25px;z-index:428;">
<input type="button" id="Button4" onclick="$('#jQueryDialog17').dialog('close');return false;" name="" value="Annuler" style="position:absolute;left:299px;top:276px;width:166px;height:25px;z-index:429;">
</div>

<div id="jQueryDialog63" title="Proc&#233;dure de r&#233;paration">
<div id="wb_Text72" style="position:absolute;left:111px;top:11px;width:379px;height:80px;z-index:430;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Procédure de réparation terminée !</strong><br><br>Si vous avez toujours un problème dans votre session nous vous conseillons de vider le cache et les fichiers temporaires de votre navigateur internet (Images et Cookies).</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog63').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:186px;top:112px;width:129px;height:25px;z-index:431;">
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:8px;top:11px;width:95px;height:80px;text-align:center;z-index:432;">
<div id="FontAwesomeIcon5"><i class="fa fa-shield">&nbsp;</i></div></div>
</div>

<div id="jQueryDialog77" style="z-index:560;" title="Code source du projet (Rynna WebOS - Github) - Gratuit">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/github.php">
</iframe>
</div>


<div id="jQueryDialog78" style="z-index:562;" title="Sticky-Notes Generator (WebesTools)">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/sng.php">
</iframe>
</div>

</body>
</html>
