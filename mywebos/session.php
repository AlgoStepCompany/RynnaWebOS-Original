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
<link href="session.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
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
      width: 694,
      height: 598,
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
      width: 1044,
      height: 599,
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
      height: 211,
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
      width: 898,
      height: 566,
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
      width: 814,
      height: 575,
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
      width: 786,
      height: 485,
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
      width: 891,
      height: 548,
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
      width: 934,
      height: 496,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
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
      height: 470,
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
      height: 223,
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
      height: 611,
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
      height: 562,
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
      width: 495,
      height: 213,
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
      width: 725,
      height: 210,
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
      width: 936,
      height: 534,
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
   var jQueryDialog43Options =
   {
      width: 529,
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
      width: 1039,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog44'} 
   };
   $("#jQueryDialog44").dialog(jQueryDialog44Options);
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
      width: 981,
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
      width: 804,
      height: 592,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
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
   var jQueryToolTip15Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Fermer ou redémarrer la session</span>",
      items: '#wb_MaterialIcon18',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip15' }
   };
   $("#wb_MaterialIcon18").tooltip(jQueryToolTip15Options);
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
   var jQueryDialog18Options =
   {
      modal: true,
      width: 405,
      height: 168,
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
      height: 246,
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
   $("#Layer12").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer13").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer14").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer15").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer16").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer17").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer18").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer19").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer20").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   var jQueryDialog52Options =
   {
      width: 257,
      height: 317,
      position: { my: 'left top', at: 'left+323 top+37', of: window },
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
      show: 'highlight',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog63'} 
   };
   $("#jQueryDialog63").dialog(jQueryDialog63Options);
   var jQueryDialog77Options =
   {
      width: 1135,
      height: 619,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog77'} 
   };
   $("#jQueryDialog77").dialog(jQueryDialog77Options);
   var jQueryToolTip11Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Afficher l'aide</span>",
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
   var jQueryTabs2Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs2").tabs(jQueryTabs2Options);
   var jQueryTabs3Options =
   {
      show: false,
      event: 'click',
      collapsible: false
   };
   $("#jQueryTabs3").tabs(jQueryTabs3Options);
   var jQueryDialog74Options =
   {
      modal: true,
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
   var jQueryToolTip12Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Gestionnaire serveur</span>",
      items: '#wb_MaterialIcon28',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip12' }
   };
   $("#wb_MaterialIcon28").tooltip(jQueryToolTip12Options);
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
      width: 810,
      height: 424,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog84'} 
   };
   $("#jQueryDialog84").dialog(jQueryDialog84Options);
   var jQueryDialog85Options =
   {
      width: 1009,
      height: 692,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog85'} 
   };
   $("#jQueryDialog85").dialog(jQueryDialog85Options);
   var jQueryDialog86Options =
   {
      width: 296,
      height: 428,
      position: { my: 'left top', at: 'right bottom', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog86'} 
   };
   $("#jQueryDialog86").dialog(jQueryDialog86Options);
   var jQueryDialog87Options =
   {
      width: 926,
      height: 532,
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
   $("#Layer6").stickylayer({orientation: 9, position: [0, 0], delay: 0});
   $("#Layer35").stickylayer({orientation: 7, position: [0, 0], delay: 0});
   var jQueryDialog45Options =
   {
      width: 892,
      height: 418,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fold',
      hide: 'fold',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog45'} 
   };
   $("#jQueryDialog45").dialog(jQueryDialog45Options);
   var jQueryDialog42Options =
   {
      width: 278,
      height: 247,
      position: { my: 'left top', at: 'right top+203', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog42'} 
   };
   $("#jQueryDialog42").dialog(jQueryDialog42Options);
   var jQueryToolTip13Options =
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Afficher/Cacher les fenêtres ouvertes</span>",
      items: '#wb_MaterialIcon62',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip13' }
   };
   $("#wb_MaterialIcon62").tooltip(jQueryToolTip13Options);
   var jQueryDialog88Options =
   {
      width: 409,
      height: 224,
      position: { my: 'left top', at: 'right top+46', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      hide: 'fade',
      autoOpen: true,
      classes: { 'ui-dialog': 'jQueryDialog88'} 
   };
   $("#jQueryDialog88").dialog(jQueryDialog88Options);
   var jQueryDialog89Options =
   {
      width: 372,
      height: 134,
      position: { my: 'center top', at: 'center top', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog89'} 
   };
   $("#jQueryDialog89").dialog(jQueryDialog89Options);
   var jQueryDialog90Options =
   {
      width: 1020,
      height: 554,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: 'clip',
      hide: 'clip',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog90'} 
   };
   $("#jQueryDialog90").dialog(jQueryDialog90Options);
   var jQueryDialog91Options =
   {
      width: 326,
      height: 219,
      position: { my: 'left top', at: 'right top+254', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: 'fade',
      hide: 'fade',
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog91'} 
   };
   $("#jQueryDialog91").dialog(jQueryDialog91Options);
   $('img[data-src]').lazyload();
});
</script>
<!-- Insert Google Analytics code here -->
</head>
<body>
<div id="container">

<div id="jQueryDialog3" style="z-index:560;" title="Mes applications install&#233;es (Applis G&#233;n&#233;rales)">
<div id="wb_Image4" style="position:absolute;left:80px;top:9px;width:87px;height:86px;z-index:33;">
<a href="#" onclick="$('#jQueryDialog27').dialog('open');return false;"><img src="images/img0007.png" id="Image4" alt=""></a></div>
<div id="wb_FontAwesomeIcon17" style="position:absolute;left:177px;top:21px;width:51px;height:56px;text-align:center;z-index:34;">
<a href="#" onclick="$('#jQueryDialog7').dialog('open');return false;"><div id="FontAwesomeIcon17"><i class="fa fa-thermometer-three-quarters">&nbsp;</i></div></a></div>
<div id="wb_Image10" style="position:absolute;left:248px;top:9px;width:86px;height:86px;z-index:35;">
<a href="#" onclick="$('#jQueryDialog24').dialog('open');return false;"><img src="images/img0004.png" id="Image10" alt=""></a></div>
<div id="wb_Image23" style="position:absolute;left:327px;top:9px;width:86px;height:86px;z-index:36;">
<a href="#" onclick="$('#jQueryDialog23').dialog('open');return false;"><img src="images/img0025.png" id="Image23" alt=""></a></div>
<div id="wb_Image18" style="position:absolute;left:166px;top:137px;width:88px;height:72px;z-index:37;">
<a href="#" onclick="$('#jQueryDialog20').dialog('open');return false;"><img src="images/img0017.png" id="Image18" alt=""></a></div>
<div id="wb_Image24" style="position:absolute;left:77px;top:131px;width:96px;height:85px;z-index:38;">
<a href="#" onclick="$('#jQueryDialog41').dialog('open');return false;"><img src="images/pausecafe.png" id="Image24" alt=""></a></div>
<div id="wb_Image22" style="position:absolute;left:2px;top:130px;width:86px;height:86px;z-index:39;">
<a href="#" onclick="$('#jQueryDialog25').dialog('open');return false;"><img src="images/img0024.png" id="Image22" alt=""></a></div>
<div id="wb_Text54" style="position:absolute;left:93px;top:86px;width:55px;height:32px;text-align:center;z-index:40;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Docteur Flashy</span></div>
<div id="wb_Text55" style="position:absolute;left:167px;top:90px;width:71px;height:14px;text-align:center;z-index:41;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Température</span></div>
<div id="wb_Text56" style="position:absolute;left:257px;top:86px;width:59px;height:48px;text-align:center;z-index:42;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Horloge interactive</span></div>
<div id="wb_Text57" style="position:absolute;left:340px;top:86px;width:55px;height:32px;text-align:center;z-index:43;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Dés interactif</span></div>
<div id="wb_Text59" style="position:absolute;left:15px;top:209px;width:55px;height:32px;text-align:center;z-index:44;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Monnaie interactif</span></div>
<div id="wb_Text60" style="position:absolute;left:95px;top:209px;width:55px;height:32px;text-align:center;z-index:45;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Jeux Flash</span></div>
<div id="wb_Text61" style="position:absolute;left:181px;top:209px;width:55px;height:16px;text-align:center;z-index:46;">
<span style="color:#000000;font-family:Arial;font-size:13px;">SNCF</span></div>
<div id="wb_MaterialIcon2" style="position:absolute;left:15px;top:511px;width:32px;height:32px;text-align:center;z-index:47;">
<a href="#" onclick="$('#jQueryDialog12').dialog('open');return false;"><div id="MaterialIcon2"><i class="material-icons">&#xe1b8;</i></div></a></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:262px;top:142px;width:53px;height:56px;text-align:center;z-index:48;">
<a href="#" onclick="$('#jQueryDialog30').dialog('open');return false;"><div id="FontAwesomeIcon1"><i class="fa fa-code">&nbsp;</i></div></a></div>
<div id="wb_Text23" style="position:absolute;left:256px;top:211px;width:60px;height:28px;text-align:center;z-index:49;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Créer vos Applis Web</span></div>
<div id="wb_Text63" style="position:absolute;left:514px;top:89px;width:55px;height:16px;text-align:center;z-index:50;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ipiccy</span></div>
<div id="wb_Image3" style="position:absolute;left:500px;top:7px;width:93px;height:88px;z-index:51;">
<a href="#" onclick="$('#jQueryDialog56').dialog('open');return false;"><img src="images/ipiccy.png" id="Image3" alt=""></a></div>
<div id="wb_Image5" style="position:absolute;left:327px;top:130px;width:86px;height:86px;z-index:52;">
<a href="#" onclick="$('#jQueryDialog57').dialog('open');return false;"><img src="images/Korben.png" id="Image5" alt=""></a></div>
<div id="wb_Image6" style="position:absolute;left:416px;top:130px;width:86px;height:86px;z-index:53;">
<a href="#" onclick="$('#jQueryDialog58').dialog('open');return false;"><img src="images/orange.png" id="Image6" alt=""></a></div>
<div id="wb_Text64" style="position:absolute;left:339px;top:209px;width:55px;height:32px;text-align:center;z-index:54;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Le Bon Coin</span></div>
<div id="wb_Text65" style="position:absolute;left:429px;top:209px;width:55px;height:32px;text-align:center;z-index:55;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Orange TV</span></div>
<div id="wb_Text67" style="position:absolute;left:604px;top:86px;width:55px;height:32px;text-align:center;z-index:56;">
<span style="color:#000000;font-family:Arial;font-size:13px;">01net Blog</span></div>
<div id="wb_Text68" style="position:absolute;left:15px;top:343px;width:55px;height:14px;text-align:center;z-index:57;">
<span style="color:#000000;font-family:Arial;font-size:11px;">CDiscount</span></div>
<div id="wb_Text87" style="position:absolute;left:13px;top:88px;width:58px;height:28px;text-align:center;z-index:58;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Calculatrice</span></div>
<div id="wb_Text88" style="position:absolute;left:429px;top:89px;width:58px;height:16px;text-align:center;z-index:59;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Wordpad</span></div>
<div id="wb_Image32" style="position:absolute;left:415px;top:9px;width:87px;height:87px;z-index:60;">
<a href="#" onclick="$('#jQueryDialog28').dialog('open');return false;"><img src="images/notepad.png" id="Image32" alt=""></a></div>
<div id="wb_Image12" style="position:absolute;left:2px;top:9px;width:87px;height:87px;z-index:61;">
<a href="#" onclick="$('#jQueryDialog4').dialog('open');return false;"><img src="images/Calculatrice.png" id="Image12" alt=""></a></div>
<div id="wb_Image20" style="position:absolute;left:2px;top:263px;width:86px;height:86px;z-index:62;">
<a href="#" onclick="$('#jQueryDialog61').dialog('open');return false;"><img src="images/steam.png" id="Image20" alt=""></a></div>
<div id="wb_Image21" style="position:absolute;left:591px;top:10px;width:85px;height:86px;z-index:63;">
<a href="#" onclick="$('#jQueryDialog60').dialog('open');return false;"><img src="images/twitch.png" id="Image21" alt=""></a></div>
<div id="wb_MaterialIcon23" style="position:absolute;left:95px;top:275px;width:54px;height:56px;text-align:center;z-index:64;">
<a href="#" onclick="$('#jQueryDialog40').dialog('open');return false;"><div id="MaterialIcon23"><i class="material-icons">&#xe84d;</i></div></a></div>
<div id="wb_Text58" style="position:absolute;left:95px;top:343px;width:55px;height:32px;text-align:center;z-index:65;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tridiv 3D (CSS)</span></div>
<div id="wb_FontAwesomeIcon16" style="position:absolute;left:177px;top:275px;width:61px;height:56px;text-align:center;z-index:66;">
<a href="javascript:popupwnd('https://onedrive.live.com/?id=root&cid=','no','no','no','yes','yes','no','60','110','750','550')" target="_self"><div id="FontAwesomeIcon16"><i class="fa fa-cloud-download">&nbsp;</i></div></a></div>
<div id="wb_Text62" style="position:absolute;left:177px;top:343px;width:61px;height:30px;text-align:center;z-index:67;">
<span style="color:#000000;font-family:Arial;font-size:12px;">OneDrive<br>[POP-UP]</span></div>
<div id="wb_Image39" style="position:absolute;left:246px;top:263px;width:80px;height:80px;z-index:68;">
<a href="#" onclick="$('#jQueryDialog64').dialog('open');return false;"><img src="images/12472264_561929810626918_2272385936819492695_n(1).png" id="Image39" alt=""></a></div>
<div id="wb_Text93" style="position:absolute;left:253px;top:343px;width:70px;height:28px;text-align:center;z-index:69;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Simulateur Smartphone</span></div>
<div id="wb_MaterialIcon59" style="position:absolute;left:340px;top:275px;width:52px;height:54px;text-align:center;z-index:70;">
<a href="#" onclick="$('#jQueryDialog67').dialog('open');return false;"><div id="MaterialIcon59"><i class="material-icons">&#xe25a;</i></div></a></div>
<div id="wb_Text99" style="position:absolute;left:340px;top:339px;width:55px;height:32px;text-align:center;z-index:71;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Envoi rapides</span></div>
<div id="wb_Image45" style="position:absolute;left:427px;top:275px;width:59px;height:56px;z-index:72;">
<a href="#" onclick="$('#jQueryDialog44').dialog('open');return false;"><img src="images/hitek_logo_HD2.png" id="Image45" alt=""></a></div>
<div id="wb_Text105" style="position:absolute;left:428px;top:343px;width:59px;height:14px;text-align:center;z-index:73;">
<span style="color:#000000;font-family:Arial;font-size:11px;">HITEK</span></div>
<div id="wb_Image53" style="position:absolute;left:601px;top:142px;width:59px;height:56px;z-index:74;">
<a href="#" onclick="$('#jQueryDialog78').dialog('open');return false;"><img src="images/SNGappsm.png" id="Image53" alt=""></a></div>
<div id="wb_Text73" style="position:absolute;left:600px;top:209px;width:63px;height:30px;text-align:center;z-index:75;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Notes Generator</span></div>
<div id="wb_Image54" style="position:absolute;left:502px;top:144px;width:83px;height:59px;z-index:76;">
<a href="#" onclick="$('#jQueryDialog87').dialog('open');return false;"><img src="images/liligoicone.png" id="Image54" alt=""></a></div>
<div id="wb_Text75" style="position:absolute;left:514px;top:209px;width:53px;height:16px;text-align:center;z-index:77;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Liligo</span></div>
<div id="wb_Image55" style="position:absolute;left:514px;top:273px;width:63px;height:58px;z-index:78;">
<a href="#" onclick="$('#jQueryDialog49').dialog('open');return false;"><img src="images/studiofitness.png" id="Image55" alt=""></a></div>
<div id="wb_Text45" style="position:absolute;left:516px;top:343px;width:59px;height:28px;text-align:center;z-index:79;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Studio Fitness</span></div>
</div>

<div id="jQueryDialog4" style="z-index:561;" title="Calculatrice (system/program/calculatrice)">
<object data="addeosapps/calc.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog5" style="z-index:562;" title="Explorateur de fichiers - Votre espace personnel (50 Go maximum)">
<div id="jQueryTabs2" style="position:absolute;left:7px;top:9px;width:956px;height:519px;z-index:84;">
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

<div id="jQueryDialog8" style="z-index:563;" title="Navigateur web StartPage (all&#233;g&#233;, sans onglet) [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/navigateur.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog14" style="z-index:564;" title="Editeur de texte (FullPro CK Series 2016)">
<object data="system/program/texteditor/editor.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog19" style="z-index:565;" title="Rynna Search (Rechercher une page du WebOS)">
<form name="SiteSearch1_form" id="SiteSearch1_form" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch1" style="position:absolute;left:130px;top:49px;width:350px;height:20px;line-height:20px;z-index:87;" name="SiteSearch1" value="" spellcheck="false" placeholder="Rechercher un programme, une fen&#234;tre, un script"></form>
<div id="SiteSearch1_dialog" title="Resultats"></div>
<input type="button" id="Button15" onclick="searchPage();return false;" name="Search" value="Rechercher" style="position:absolute;left:383px;top:80px;width:96px;height:25px;z-index:88;">
<div id="wb_FontAwesomeIcon20" style="position:absolute;left:11px;top:16px;width:103px;height:97px;text-align:center;z-index:89;">
<a href="#" onclick="AnimateCss('wb_FontAwesomeIcon19', 'transform-3d-flip-in-y', 0, 1200);return false;"><div id="FontAwesomeIcon20"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
</div>

<div id="jQueryDialog23" style="z-index:566;" title="Jeu de Hasard (system/program/dee)">
<object data="addeosapps/deeint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog28" style="z-index:567;" title="WordPad - Editeur de texte avanc&#233;">
<object data="addeosapps/wordpad.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog7" style="z-index:568;" title="Informations sur votre location - M&#233;t&#233;o temps r&#233;el [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/meteo.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>




<div id="jQueryDialog11" style="z-index:572;" title="Param&#232;tres et aides suppl&#233;mentaires">
<div id="wb_MaterialIcon5" style="position:absolute;left:26px;top:24px;width:96px;height:79px;text-align:center;z-index:93;">
<a href="#" onclick="$('#jQueryDialog32').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon5"><i class="material-icons">&#xe88f;</i></div></a></div>
<div id="wb_Text1" style="position:absolute;left:8px;top:123px;width:124px;height:36px;text-align:center;z-index:94;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Informations sur le WebOS</strong></span></div>
<div id="wb_MaterialIcon6" style="position:absolute;left:181px;top:24px;width:98px;height:79px;text-align:center;z-index:95;">
<a href="#" onclick="$('#jQueryDialog33').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon6"><i class="material-icons">&#xe894;</i></div></a></div>
<div id="wb_Text4" style="position:absolute;left:168px;top:123px;width:124px;height:54px;text-align:center;z-index:96;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester la connexion internet</strong></span></div>
<div id="wb_MaterialIcon7" style="position:absolute;left:336px;top:24px;width:91px;height:79px;text-align:center;z-index:97;">
<a href="#" onclick="$('#jQueryDialog34').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon7"><i class="material-icons">&#xe0c8;</i></div></a></div>
<div id="wb_Text11" style="position:absolute;left:319px;top:123px;width:124px;height:36px;text-align:center;z-index:98;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Connaître mon adresse IP</strong></span></div>
<div id="wb_MaterialIcon8" style="position:absolute;left:499px;top:24px;width:89px;height:79px;text-align:center;z-index:99;">
<a href="#" onclick="$('#jQueryDialog35').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon8"><i class="material-icons">&#xe0da;</i></div></a></div>
<div id="wb_Text14" style="position:absolute;left:484px;top:123px;width:124px;height:36px;text-align:center;z-index:100;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Supprimer votre compte</strong></span></div>
<div id="wb_MaterialIcon9" style="position:absolute;left:25px;top:201px;width:99px;height:76px;text-align:center;z-index:101;">
<a href="#" onclick="$('#jQueryDialog36').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon9"><i class="material-icons">&#xe312;</i></div></a></div>
<div id="wb_Text16" style="position:absolute;left:8px;top:285px;width:124px;height:36px;text-align:center;z-index:102;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester mon clavier</strong></span></div>
<div id="wb_MaterialIcon10" style="position:absolute;left:186px;top:206px;width:89px;height:71px;text-align:center;z-index:103;">
<a href="#" onclick="$('#jQueryDialog89').dialog('open');$('#jQueryDialog37').dialog('open');Toggle('jQueryDialog11', 'fade', 500);return false;"><div id="MaterialIcon10"><i class="material-icons">&#xe3c4;</i></div></a></div>
<div id="wb_Text29" style="position:absolute;left:168px;top:285px;width:124px;height:54px;text-align:center;z-index:104;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Configuration de l'interface personnelle</strong></span></div>
<div id="wb_MaterialIcon11" style="position:absolute;left:341px;top:201px;width:81px;height:76px;text-align:center;z-index:105;">
<a href="#" onclick="$('#jQueryDialog39').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon11"><i class="material-icons">&#xe8e8;</i></div></a></div>
<div id="wb_Text30" style="position:absolute;left:319px;top:285px;width:124px;height:36px;text-align:center;z-index:106;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Verifier la protection</strong></span></div>
<div id="wb_MaterialIcon12" style="position:absolute;left:510px;top:199px;width:78px;height:86px;text-align:center;z-index:107;">
<a href="#" onclick="$('#jQueryDialog38').dialog('open');return false;"><div id="MaterialIcon12"><i class="material-icons">&#xe8df;</i></div></a></div>
<div id="wb_Text31" style="position:absolute;left:487px;top:285px;width:124px;height:36px;text-align:center;z-index:108;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Calendrier détaillé</strong></span></div>
<div id="wb_MaterialIcon29" style="position:absolute;left:655px;top:24px;width:99px;height:79px;text-align:center;z-index:109;">
<a href="#" onclick="$('#jQueryDialog2').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon29"><i class="material-icons">&#xe8c2;</i></div></a></div>
<div id="wb_MaterialIcon32" style="position:absolute;left:670px;top:199px;width:68px;height:80px;text-align:center;z-index:110;">
<a href="#" onclick="$('#jQueryDialog26').dialog('open');$('#jQueryDialog11').dialog('close');return false;"><div id="MaterialIcon32"><i class="material-icons">&#xe06d;</i></div></a></div>
<div id="wb_Text9" style="position:absolute;left:642px;top:123px;width:124px;height:36px;text-align:center;z-index:111;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Gestion des erreurs</strong></span></div>
<div id="wb_Text90" style="position:absolute;left:642px;top:285px;width:124px;height:36px;text-align:center;z-index:112;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Test écran et netteté</strong></span></div>
<div id="wb_MaterialIcon36" style="position:absolute;left:29px;top:361px;width:90px;height:72px;text-align:center;z-index:113;">
<a href="#" onclick="$('#jQueryDialog45').dialog('open');return false;"><div id="MaterialIcon36"><i class="material-icons">&#xe328;</i></div></a></div>
<div id="wb_Text41" style="position:absolute;left:12px;top:453px;width:124px;height:36px;text-align:center;z-index:114;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Vérification mise à jour WebOS</strong></span></div>
</div>

<div id="jQueryDialog33" style="z-index:573;" title="Test de votre connexion internet">
<div id="wb_MaterialIcon14" style="position:absolute;left:10px;top:11px;width:37px;height:37px;text-align:center;z-index:115;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog33').dialog('close');return false;"><div id="MaterialIcon14"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text33" style="position:absolute;left:94px;top:21px;width:639px;height:16px;z-index:116;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Testez votre connexion internet (débit montant/descendant)&nbsp;:</span></div>
<div id="Html19" style="position:absolute;left:18px;top:59px;width:727px;height:354px;z-index:117">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.ariase.com/fr/vitesse/">
</iframe><br /></div>
</div>



<div id="jQueryDialog41" style="z-index:576;" title="Gestionnaire de Jeux">
<object data="gamemanager.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog20" style="z-index:577;" title="D&#233;part RER SNCF par ville (system/program/sncfappli) [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/sncf.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog16" style="z-index:578;" title="StreetView">
<iframe
  width="100%"
  height="100%"
  frameborder="0" style="border:0"
  overflow="hidden"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCl0N46TIpQLmiE8fo-EqQef-zkC0lQuQQ
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>
</div>

<div id="jQueryDialog12" style="z-index:579;" title="Applications virtualis&#233;es">
<div id="wb_jQueryAccordion1" style="position:absolute;left:9px;top:11px;width:788px;height:430px;z-index:130;">
<div id="jQueryAccordion1">
<h3>Origine Windows</h3>
<div>
<div id="wb_Image8" style="position:absolute;left:3px;top:1px;width:82px;height:82px;z-index:121;">
<a href="javascript:popupwnd('https://office.live.com/start/Word.aspx?','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/word-live.png" id="Image8" alt="" title="Office 2016 (gratuit) - Word"></a></div>
<div id="wb_Image11" style="position:absolute;left:137px;top:1px;width:82px;height:82px;z-index:122;">
<a href="javascript:popupwnd('https://office.live.com/start/PowerPoint.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/powerpoint-live.png" id="Image11" alt="" title="Office 2016 (gratuit) - PowerPoint"></a></div>
<div id="wb_Image14" style="position:absolute;left:207px;top:1px;width:80px;height:80px;z-index:123;">
<a href="javascript:popupwnd('https://keep.google.com/u/0/#home','no','no','no','yes','yes','no','20','20','950','650')" target="_self"><img src="images/keep-512.png" id="Image14" alt="" title="Google Keep - Bloc-Notes"></a></div>
<div id="wb_Image9" style="position:absolute;left:71px;top:1px;width:82px;height:82px;z-index:124;">
<a href="javascript:popupwnd('https://office.live.com/start/Excel.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/excel-live.png" id="Image9" alt="" title="Office 2016 (gratuit) - Excel"></a></div>
</div>
<h3>Origine Linux</h3>
<div>
<div id="wb_Image1" style="position:absolute;left:3px;top:2px;width:85px;height:85px;z-index:125;">
<a href="#" onclick="$('#jQueryDialog82').dialog('open');return false;"><img src="images/diJXUfgE_400x400.png" id="Image1" alt=""></a></div>
</div>
<h3>Origine MAC OSx</h3>
<div>
<div id="wb_Image7" style="position:absolute;left:5px;top:4px;width:89px;height:89px;z-index:126;">
<a href="#" onclick="$('#jQueryDialog79').dialog('open');return false;"><img src="images/256x256bb.png" id="Image7" alt=""></a></div>
<div id="wb_Image16" style="position:absolute;left:82px;top:4px;width:89px;height:89px;z-index:127;">
<a href="#" onclick="$('#jQueryDialog80').dialog('open');return false;"><img src="images/aplus-flv-to-apple-tv-converter.png" id="Image16" alt=""></a></div>
<div id="wb_Image17" style="position:absolute;left:155px;top:5px;width:89px;height:89px;z-index:128;">
<a href="#" onclick="$('#jQueryDialog81').dialog('open');return false;"><img src="images/Calculatrice_apple.png" id="Image17" alt=""></a></div>
</div>
<h3>Origine Android</h3>
<div>
<div id="wb_Text27" style="position:absolute;left:16px;top:12px;width:717px;height:48px;z-index:129;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Pour le moment aucune application Android n'est virtualisées.<br><br>Merci pour votre contribution&nbsp;!</em></span></div>
</div>
</div>
</div>
</div>

<div id="jQueryDialog27" style="z-index:580;" title="Docteur Flashy - Analyse de votre ordinateur">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/doctorflashy.php">
</iframe>
</div>

<div id="jQueryDialog10" style="z-index:581;" title="TChat WebOS (Publique)">
<div id="Html10" style="position:absolute;left:219px;top:16px;width:688px;height:416px;z-index:141">
<!-- Debut shoutbox - https://www.i-tchat.com -->
<iframe src="https://www.i-tchat.com/shoutbox/shoutbox.php?idShoutbox=130310" width="100%" height="100%" frameborder="0" allowtransparency="true" >Votre navigateur semble incompatible, essayez d'ouvrir le <a href="https://www.i-tchat.com" title="tchat" onClick="window.open(this.href+'?130310');">tchat</a>, ou rencontrez le webmaster pour plus d'informations.</iframe>
<br />Agrandir le <a href="https://www.i-tchat.com/?130310" onClick="window.open(this.href);return false;">chat</a> .
<!-- Fin shoutbox --></div>
<div id="wb_Image25" style="position:absolute;left:12px;top:16px;width:200px;height:150px;z-index:142;">
<img src="images/deco_pausecafe_tchat.gif" id="Image25" alt=""></div>
<div id="wb_Text39" style="position:absolute;left:14px;top:416px;width:197px;height:16px;text-align:right;z-index:143;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tchat Version 1.1</span></div>
</div>

<div id="jQueryDialog29" style="z-index:582;" title="AVERTISSEMENT">
<div id="wb_Text6" style="position:absolute;left:13px;top:16px;width:379px;height:273px;text-align:center;z-index:144;">
<span style="color:#FF0000;font-family:Arial;font-size:15px;"><strong>AVERTISSEMENT</strong></span><span style="color:#000000;font-family:Arial;font-size:15px;"> concernant l'utilisation du Chat publique.<br><br>Ce Chat vous permet de discuter entre tout les utilisateurs en ligne du WebOS.<br><br>Veuillez être polis et respectueux.<br>Toutes personnes utilisant le Chat en étant grossier, malveillants ou en publiant des textes illégaux verra son compte fermé et son IP banni.<br><br>Nous autorisons la publicité sur ce Chat pour faire partager vos projets, vos actions ou votre entreprise, mais veuillez ne pas en abuser.<br><br>Merci pour votre compréhension.</span></div>
<input type="submit" id="Button6" onclick="$('#jQueryDialog10').dialog('open');$('#jQueryDialog29').dialog('close');return false;" name="" value="J'accepte les conditions" style="position:absolute;left:15px;top:309px;width:374px;height:25px;z-index:145;">
<div id="wb_Text81" style="position:absolute;left:11px;top:343px;width:383px;height:70px;text-align:justify;z-index:146;">
<span style="color:#000000;font-family:Arial;font-size:11px;"><em>Le Chat est basé sur la Shoutbox N°130310 de i-tchat&nbsp;; elle est conçu pour le serveur rynnawebos.fr uniquement. Si vous êtes Administrateur de votre propre version du WebOS vous pouvez éditer le code du Tchat pour l'ajuster à votre propre Tchat. Vous pouvez aussi masquer ce texte en supprimant l'objet PHP ID&nbsp;&quot;Text81&quot;.</em></span></div>
</div>

<div id="jQueryDialog36" style="z-index:583;" title="Configuration clavier">
<div id="wb_MaterialIcon17" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:147;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog36').dialog('close');return false;"><div id="MaterialIcon17"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text35" style="position:absolute;left:73px;top:19px;width:249px;height:16px;z-index:148;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Paramètrage du clavier&nbsp;:</span></div>
<div id="wb_Text36" style="position:absolute;left:14px;top:76px;width:141px;height:16px;z-index:149;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Langue du clavier&nbsp;: </span></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:165px;top:70px;width:176px;height:28px;z-index:150;">
<option selected value="fr-FR">Français (French)</option>
<option value="en-US">Anglais (English)</option>
</select>
<input type="text" id="Editbox1" style="position:absolute;left:10px;top:126px;width:529px;height:16px;line-height:16px;z-index:151;" name="Editbox1" value="Tester votre clavier dans cette zone : " spellcheck="false">
</div>

<div id="jQueryDialog37" style="z-index:584;" title="Configuration de votre interface personnelle">
<div id="jQueryTabs3" style="position:absolute;left:13px;top:13px;width:676px;height:532px;z-index:210;">
<ul>
<li><a href="#jquerytabs3-page-0"><span>Defauts</span></a></li>
<li><a href="#jquerytabs3-page-1"><span>Jeux vidéo</span></a></li>
<li><a href="#jquerytabs3-page-2"><span>Films et Séries TV</span></a></li>
<li><a href="#jquerytabs3-page-3"><span>Filip Hodas</span></a></li>
</ul>
<div style="height:510px;" id="jquerytabs3-page-0">
<div id="Html49" style="position:absolute;left:23px;top:64px;width:151px;height:101px;overflow:hidden;z-index:152">


<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction1()"><img src="backgroundimage/miniatures/B00img901.jpg" id="Image901"></a>

<script>
function myFunction1() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B00img901.jpg')";
}
</script>


</body>
</html></div>
<div id="Html52" style="position:absolute;left:184px;top:64px;width:148px;height:101px;overflow:hidden;z-index:153">


<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction4()"><img src="backgroundimage/miniatures/B03img904.jpg" id="Image904"></a>

<script>
function myFunction4() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B03img904.jpg')";
}

</script>

</body>
</html></div>
<div id="Html55" style="position:absolute;left:342px;top:64px;width:153px;height:101px;overflow:hidden;z-index:154">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction7()"><img src="backgroundimage/miniatures/B06img907.jpg" id="Image907"></a>

<script>
function myFunction7() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B06img907.jpg')";
}
</script>

</body>
</html></div>
<div id="Html50" style="position:absolute;left:504px;top:64px;width:145px;height:101px;overflow:hidden;z-index:155">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction2()"><img src="backgroundimage/miniatures/B01img902.jpg" id="Image902"></a>

<script>
function myFunction2() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B01img902.jpg')";
}
</script>

</body>
</html></div>
<div id="Html53" style="position:absolute;left:23px;top:176px;width:151px;height:98px;overflow:hidden;z-index:156">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction5()"><img src="backgroundimage/miniatures/B04img905.jpg" id="Image905"></a>

<script>
function myFunction5() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B04img905.jpg')";
}
</script>

</body>
</html></div>
<div id="Html56" style="position:absolute;left:184px;top:176px;width:148px;height:98px;overflow:hidden;z-index:157">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction8()"><img src="backgroundimage/miniatures/B07img908.jpg" id="Image908"></a>

<script>
function myFunction8() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B07img908.jpg')";
}
</script>

</body>
</html></div>
<div id="Html51" style="position:absolute;left:342px;top:176px;width:153px;height:98px;overflow:hidden;z-index:158">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction3()"><img src="backgroundimage/miniatures/B02img903.jpg" id="Image903"></a>

<script>
function myFunction3() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B02img903.jpg')";
}
</script>

</body>
</html></div>
<div id="Html54" style="position:absolute;left:504px;top:176px;width:145px;height:98px;overflow:hidden;z-index:159">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction6()"><img src="backgroundimage/miniatures/B05img906.jpg" id="Image906"></a>

<script>
function myFunction6() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B05img906.jpg')";
}
</script>

</body>
</html></div>
<div id="Html57" style="position:absolute;left:23px;top:285px;width:151px;height:102px;overflow:hidden;z-index:160">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunction9()"><img src="backgroundimage/miniatures/B08img909.jpg" id="Image909"></a>

<script>
function myFunction9() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/B08img909.jpg')";
}
</script>

</body>
</html></div>
<div id="wb_Text38" style="position:absolute;left:22px;top:505px;width:642px;height:16px;z-index:161;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-1">
<div id="Html64" style="position:absolute;left:17px;top:57px;width:101px;height:86px;overflow:hidden;z-index:162">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1001()"><img src="backgroundimage/miniatures/bg-games/lifeisstrange1.jpg" id="Image1001"></a>

<script>
function myFunctiongames1001() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/lifeisstrange1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html66" style="position:absolute;left:126px;top:57px;width:101px;height:86px;overflow:hidden;z-index:163">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1002()"><img src="backgroundimage/miniatures/bg-games/lifeisstrange2.jpg" id="Image1002"></a>

<script>
function myFunctiongames1002() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/lifeisstrange2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html67" style="position:absolute;left:233px;top:57px;width:101px;height:86px;overflow:hidden;z-index:164">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1003()"><img src="backgroundimage/miniatures/bg-games/rust1.jpg" id="Image1003"></a>

<script>
function myFunctiongames1003() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/rust1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html68" style="position:absolute;left:344px;top:57px;width:101px;height:86px;overflow:hidden;z-index:165">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1004()"><img src="backgroundimage/miniatures/bg-games/rust2.jpg" id="Image1004"></a>

<script>
function myFunctiongames1004() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/rust2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html69" style="position:absolute;left:454px;top:57px;width:101px;height:86px;overflow:hidden;z-index:166">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1005()"><img src="backgroundimage/miniatures/bg-games/gta51.jpg" id="Image1005"></a>

<script>
function myFunctiongames1005() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/gta51.jpg')";
}
</script>

</body>
</html></div>
<div id="Html70" style="position:absolute;left:566px;top:57px;width:101px;height:86px;overflow:hidden;z-index:167">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1006()"><img src="backgroundimage/miniatures/bg-games/gta52.jpg" id="Image1006"></a>

<script>
function myFunctiongames1006() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/gta52.jpg')";
}
</script>

</body>
</html></div>
<div id="Html71" style="position:absolute;left:18px;top:156px;width:101px;height:86px;overflow:hidden;z-index:168">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1007()"><img src="backgroundimage/miniatures/bg-games/destiny1.jpg" id="Image1007"></a>

<script>
function myFunctiongames1007() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/destiny1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html72" style="position:absolute;left:126px;top:156px;width:101px;height:86px;overflow:hidden;z-index:169">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1008()"><img src="backgroundimage/miniatures/bg-games/destiny2.jpg" id="Image1008"></a>

<script>
function myFunctiongames1008() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/destiny2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html73" style="position:absolute;left:233px;top:156px;width:101px;height:86px;overflow:hidden;z-index:170">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1009()"><img src="backgroundimage/miniatures/bg-games/mario1.jpg" id="Image1009"></a>

<script>
function myFunctiongames1009() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/mario1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html74" style="position:absolute;left:344px;top:156px;width:101px;height:86px;overflow:hidden;z-index:171">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1010()"><img src="backgroundimage/miniatures/bg-games/mario2.jpg" id="Image1010"></a>

<script>
function myFunctiongames1010() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/mario2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html75" style="position:absolute;left:454px;top:156px;width:101px;height:86px;overflow:hidden;z-index:172">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1011()"><img src="backgroundimage/miniatures/bg-games/zelda1.jpg" id="Image1011"></a>

<script>
function myFunctiongames1011() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/zelda1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html76" style="position:absolute;left:566px;top:156px;width:101px;height:86px;overflow:hidden;z-index:173">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1012()"><img src="backgroundimage/miniatures/bg-games/zelda2.jpg" id="Image1012"></a>

<script>
function myFunctiongames1012() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/zelda2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html77" style="position:absolute;left:18px;top:257px;width:101px;height:86px;overflow:hidden;z-index:174">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1013()"><img src="backgroundimage/miniatures/bg-games/sims1.jpg" id="Image1013"></a>

<script>
function myFunctiongames1013() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/sims1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html78" style="position:absolute;left:126px;top:257px;width:101px;height:86px;overflow:hidden;z-index:175">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctiongames1014()"><img src="backgroundimage/miniatures/bg-games/sims2.jpg" id="Image1014"></a>

<script>
function myFunctiongames1014() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-games/sims2.jpg')";
}
</script>

</body>
</html></div>
<div id="wb_Text69" style="position:absolute;left:24px;top:505px;width:642px;height:16px;z-index:176;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-2">
<div id="Html65" style="position:absolute;left:18px;top:57px;width:101px;height:86px;overflow:hidden;z-index:177">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1101()"><img src="backgroundimage/miniatures/bg-movies/starwars1.jpg" id="Image1101"></a>

<script>
function myFunctionmovies1101() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/starwars1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html79" style="position:absolute;left:129px;top:57px;width:101px;height:86px;overflow:hidden;z-index:178">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1102()"><img src="backgroundimage/miniatures/bg-movies/starwars2.jpg" id="Image1102"></a>

<script>
function myFunctionmovies1102() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/starwars2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html80" style="position:absolute;left:237px;top:57px;width:101px;height:86px;overflow:hidden;z-index:179">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1103()"><img src="backgroundimage/miniatures/bg-movies/batman1.jpg" id="Image1103"></a>

<script>
function myFunctionmovies1103() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/batman1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html81" style="position:absolute;left:348px;top:57px;width:101px;height:86px;overflow:hidden;z-index:180">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1104()"><img src="backgroundimage/miniatures/bg-movies/batman2.jpg" id="Image1104"></a>

<script>
function myFunctionmovies1104() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/batman2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html82" style="position:absolute;left:462px;top:57px;width:101px;height:86px;overflow:hidden;z-index:181">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1105()"><img src="backgroundimage/miniatures/bg-movies/seigneur1.jpg" id="Image1105"></a>

<script>
function myFunctionmovies1105() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/seigneur1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html83" style="position:absolute;left:571px;top:57px;width:101px;height:86px;overflow:hidden;z-index:182">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1106()"><img src="backgroundimage/miniatures/bg-movies/seigneur2.jpg" id="Image1106"></a>

<script>
function myFunctionmovies1106() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/seigneur2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html84" style="position:absolute;left:18px;top:154px;width:101px;height:86px;overflow:hidden;z-index:183">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1107()"><img src="backgroundimage/miniatures/bg-movies/roilion1.jpg" id="Image1107"></a>

<script>
function myFunctionmovies1107() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/roilion1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html85" style="position:absolute;left:129px;top:154px;width:101px;height:86px;overflow:hidden;z-index:184">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1108()"><img src="backgroundimage/miniatures/bg-movies/roilion2.jpg" id="Image1108"></a>

<script>
function myFunctionmovies1108() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/roilion2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html86" style="position:absolute;left:237px;top:154px;width:101px;height:86px;overflow:hidden;z-index:185">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1109()"><img src="backgroundimage/miniatures/bg-movies/interstellar1.jpg" id="Image1109"></a>

<script>
function myFunctionmovies1109() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/interstellar1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html87" style="position:absolute;left:348px;top:154px;width:101px;height:86px;overflow:hidden;z-index:186">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1110()"><img src="backgroundimage/miniatures/bg-movies/interstellar2.jpg" id="Image1110"></a>

<script>
function myFunctionmovies1110() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/interstellar2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html88" style="position:absolute;left:462px;top:154px;width:101px;height:86px;overflow:hidden;z-index:187">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1111()"><img src="backgroundimage/miniatures/bg-movies/walkingdead1.jpg" id="Image1111"></a>

<script>
function myFunctionmovies1111() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/walkingdead1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html89" style="position:absolute;left:571px;top:154px;width:101px;height:86px;overflow:hidden;z-index:188">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1112()"><img src="backgroundimage/miniatures/bg-movies/walkingdead2.jpg" id="Image1112"></a>

<script>
function myFunctionmovies1112() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/walkingdead2.jpg')";
}
</script>

</body>
</html></div>
<div id="Html90" style="position:absolute;left:18px;top:249px;width:101px;height:86px;overflow:hidden;z-index:189">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1113()"><img src="backgroundimage/miniatures/bg-movies/bbaddc1.jpg" id="Image1113"></a>

<script>
function myFunctionmovies1113() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/bbaddc1.jpg')";
}
</script>

</body>
</html></div>
<div id="Html91" style="position:absolute;left:129px;top:249px;width:101px;height:86px;overflow:hidden;z-index:190">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies1114()"><img src="backgroundimage/miniatures/bg-movies/bbaddc2.jpg" id="Image1114"></a>

<script>
function myFunctionmovies1114() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/bg-movies/bbaddc2.jpg')";
}
</script>

</body>
</html></div>
<div id="wb_Text78" style="position:absolute;left:24px;top:505px;width:642px;height:16px;z-index:191;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-3">
<div id="Html28" style="position:absolute;left:19px;top:57px;width:146px;height:86px;overflow:hidden;z-index:192">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91911()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-01.jpg" id="Image91911"></a>

<script>
function myFunctionmovies91911() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-01.jpg')";
}
</script>

</body>
</html></div>
<div id="Html29" style="position:absolute;left:177px;top:57px;width:146px;height:86px;overflow:hidden;z-index:193">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91912()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-02.jpg" id="Image91912"></a>

<script>
function myFunctionmovies91912() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-02.jpg')";
}
</script>

</body>
</html></div>
<div id="Html60" style="position:absolute;left:339px;top:57px;width:146px;height:86px;overflow:hidden;z-index:194">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91913()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-03.jpg" id="Image91913"></a>

<script>
function myFunctionmovies91913() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-03.jpg')";
}
</script>

</body>
</html></div>
<div id="Html99" style="position:absolute;left:499px;top:57px;width:146px;height:86px;overflow:hidden;z-index:195">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91914()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-04.jpg" id="Image91914"></a>

<script>
function myFunctionmovies91914() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-04.jpg')";
}
</script>

</body>
</html></div>
<div id="Html100" style="position:absolute;left:19px;top:153px;width:146px;height:86px;overflow:hidden;z-index:196">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91915()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-05.jpg" id="Image91915"></a>

<script>
function myFunctionmovies91915() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-05.jpg')";
}
</script>

</body>
</html></div>
<div id="Html101" style="position:absolute;left:179px;top:153px;width:146px;height:86px;overflow:hidden;z-index:197">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91916()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-06.jpg" id="Image91916"></a>

<script>
function myFunctionmovies91916() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-06.jpg')";
}
</script>

</body>
</html></div>
<div id="Html102" style="position:absolute;left:339px;top:153px;width:146px;height:86px;overflow:hidden;z-index:198">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91917()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-07.jpg" id="Image91917"></a>

<script>
function myFunctionmovies91917() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-07.jpg')";
}
</script>

</body>
</html></div>
<div id="Html103" style="position:absolute;left:499px;top:153px;width:146px;height:86px;overflow:hidden;z-index:199">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91918()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-08.jpg" id="Image91918"></a>

<script>
function myFunctionmovies91918() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-08.jpg')";
}
</script>

</body>
</html></div>
<div id="Html104" style="position:absolute;left:19px;top:253px;width:146px;height:86px;overflow:hidden;z-index:200">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91920()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-09.jpg" id="Image91920"></a>

<script>
function myFunctionmovies91920() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-09.jpg')";
}
</script>

</body>
</html></div>
<div id="Html105" style="position:absolute;left:179px;top:253px;width:146px;height:86px;overflow:hidden;z-index:201">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91921()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-10.jpg" id="Image91921"></a>

<script>
function myFunctionmovies91921() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-10.jpg')";
}
</script>

</body>
</html></div>
<div id="Html106" style="position:absolute;left:339px;top:253px;width:146px;height:86px;overflow:hidden;z-index:202">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91922()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-11.jpg" id="Image91922"></a>

<script>
function myFunctionmovies91922() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-11.jpg')";
}
</script>

</body>
</html></div>
<div id="Html107" style="position:absolute;left:499px;top:253px;width:146px;height:86px;overflow:hidden;z-index:203">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91923()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-12.jpg" id="Image91923"></a>

<script>
function myFunctionmovies91923() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-12.jpg')";
}
</script>

</body>
</html></div>
<div id="Html108" style="position:absolute;left:19px;top:351px;width:146px;height:86px;overflow:hidden;z-index:204">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91924()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-13.jpg" id="Image91924"></a>

<script>
function myFunctionmovies91924() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-13.jpg')";
}
</script>

</body>
</html></div>
<div id="Html109" style="position:absolute;left:179px;top:351px;width:146px;height:86px;overflow:hidden;z-index:205">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91925()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-14.jpg" id="Image91925"></a>

<script>
function myFunctionmovies91925() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-14.jpg')";
}
</script>

</body>
</html></div>
<div id="Html110" style="position:absolute;left:339px;top:351px;width:146px;height:86px;overflow:hidden;z-index:206">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91926()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-15.jpg" id="Image91926"></a>

<script>
function myFunctionmovies91926() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-15.jpg')";
}
</script>

</body>
</html></div>
<div id="Html111" style="position:absolute;left:499px;top:351px;width:146px;height:86px;overflow:hidden;z-index:207">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91927()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-21.jpg" id="Image91927"></a>

<script>
function myFunctionmovies91927() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-21.jpg')";
}
</script>

</body>
</html></div>
<div id="Html112" style="position:absolute;left:19px;top:448px;width:146px;height:76px;overflow:hidden;z-index:208">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionmovies91928()"><img src="backgroundimage/miniatures/filiphondas/art-filip-hodas-22.jpg" id="Image91928"></a>

<script>
function myFunctionmovies91928() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/filiphondas/art-filip-hodas-22.jpg')";
}
</script>

</body>
</html></div>
<div id="wb_Text79" style="position:absolute;left:247px;top:492px;width:399px;height:32px;z-index:209;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
</div>
</div>

<div id="jQueryDialog38" style="z-index:585;" title="Calendrier d&#233;taill&#233;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.2017calendrier.fr/">
</iframe><br />
</div>

<div id="jQueryDialog25" style="z-index:586;" title="Calculateur Euro (system/program/eurocalc)">
<object data="addeosapps/calceuro.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog24" style="z-index:587;" title="Horloge interactive (system/program/horloge)">
<object data="addeosapps/horlogeint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog34" style="z-index:588;" title="Affichage de votre adresse IP [Service non fonctionnel en HTTPS]">
<div id="wb_MaterialIcon15" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:214;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog34').dialog('close');return false;"><div id="MaterialIcon15"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="Html21" style="position:absolute;left:51px;top:10px;width:411px;height:62px;z-index:215">
ADRESSE IP : 
<?

echo $_SERVER["REMOTE_ADDR"];

?></div>
<div id="wb_Text26" style="position:absolute;left:15px;top:84px;width:453px;height:64px;z-index:216;">
<span style="color:#000000;font-family:Arial;font-size:13px;">L'adresse IP inscrite ici dépend de votre carte réseau originelle et non pas du site internet du WebOS. Celle ci s'affiche en fonction de votre configuration&nbsp;; soit en Ipv4, ou bien en Ipv6. Elle ne peut pas être modifié via cette afficheur informatif.</span></div>
</div>

<div id="jQueryDialog39" style="z-index:589;" title="Verification de la protection">
<div id="wb_MaterialIcon20" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:217;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog39').dialog('close');return false;"><div id="MaterialIcon20"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_MaterialIcon21" style="position:absolute;left:48px;top:10px;width:106px;height:100px;text-align:center;z-index:218;">
<div id="MaterialIcon21"><i class="material-icons">&#xe32a;</i></div></div>
<div id="wb_Text37" style="position:absolute;left:165px;top:10px;width:538px;height:128px;text-align:justify;z-index:219;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ce serveur utilise par défaut une protection générale contre les programmes malveillants.<br>Le serveur par défaut rynnawebos.fr chez 1and1 permet également de protéger le serveur des attaques DDoS et PingOfDeath.<br>Cette règle de sécurité ne s'applique que sur le serveur <strong><u>rynnawebos.fr</u></strong><br><br><strong>Si vous utilisez ce WebOS via <u>une autre adresse internet</u> et que son administrateur n'a pas modifié le texte ici présent, nous vous conseillons de le contacter pour vérifier avec lui les sécurités de son propre serveur.</strong></span></div>
</div>

<div id="jQueryDialog40" style="z-index:590;" title="Editeur 3D Tridiv CSS 3 [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/tridiv3d.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog35" style="z-index:591;" title="Supprimer votre compte">
<div id="wb_Text34" style="position:absolute;left:12px;top:61px;width:377px;height:112px;z-index:221;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour supprimer votre compte pour l'instant vous devez écrire un mail à support@rynnawebos.fr<br><br>Votre compte sera alors supprimé (ainsi que vos fichiers hébergés) dans les 72 heures.<br><br>Merci pour votre patience.</span></div>
<div id="wb_MaterialIcon16" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:222;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog35').dialog('close');return false;"><div id="MaterialIcon16"><i class="material-icons">&#xe5cb;</i></div></a></div>
</div>

<div id="jQueryDialog43" style="z-index:592;" title="Cr&#233;ateur d&#39;application WebOS (sans programmer)">
<div id="wb_Text18" style="position:absolute;left:16px;top:19px;width:250px;height:16px;z-index:223;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Préparation en cours...</span></div>
</div>

<div id="jQueryDialog44" style="z-index:593;" title="HITEK - Les meilleurs actualit&#233;s des nouvelles technologies">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://hitek.fr/actualite">
</iframe>
</div>

<div id="jQueryDialog46" style="z-index:594;" title="Explorateur e-book PDF disponibles (commun)">
<object data="bookmanager.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog47" style="z-index:595;" title="Biblioth&#232;que gratuite en ligne (e-book)">
<object data="addeosapps/ebook.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog48" style="z-index:596;" title="Hebergeur d&#39;Images en ligne (serveur)">
<div id="Html113" style="position:absolute;left:17px;top:19px;width:765px;height:476px;z-index:227">
<object data="uploads/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
<input type="button" id="Button33" onclick="$('#jQueryDialog67').dialog('open');return false;" name="" value="Ajouter une nouvelle image au dossier (publique)" style="position:absolute;left:20px;top:507px;width:762px;height:25px;z-index:228;">
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

<div id="jQueryDialog49" style="z-index:600;" title="Fitness (Studio) avec g&#233;olocalisation">
<object data="addeosapps/fitness.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>


<div id="jQueryDialog50" title="Gestionnaire de t&#226;ches avanc&#233;s">
<div id="wb_Text47" style="position:absolute;left:11px;top:15px;width:592px;height:48px;z-index:248;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour votre sécurité les pointeurs et la barre de tâches ont été actualisés.<br>Vous pouvez découvrir ici les applications principales du WebOS et gérer leurs fonctionnements ci-dessous&nbsp;:</span></div>
<div id="jQueryTabs4" style="position:absolute;left:10px;top:73px;width:584px;height:398px;z-index:249;">
<ul>
<li><a href="#jquerytabs4-page-0"><span>Forcage fermeture</span></a></li>
<li><a href="#jquerytabs4-page-1"><span>Information navigateur</span></a></li>
</ul>
<div style="height:376px;" id="jquerytabs4-page-0">
<input type="button" id="Button10" onclick="$('#jQueryDialog1').dialog('close');return false;" name="" value="Menu Applicatifs" style="position:absolute;left:16px;top:58px;width:251px;height:25px;z-index:230;">
<input type="button" id="Button11" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Applis installées" style="position:absolute;left:309px;top:58px;width:251px;height:25px;z-index:231;">
<input type="button" id="Button13" onclick="$('#jQueryDialog9').dialog('close');return false;" name="" value="Application Windows" style="position:absolute;left:16px;top:93px;width:251px;height:25px;z-index:232;">
<input type="button" id="Button14" onclick="$('#jQueryDialog13').dialog('close');return false;" name="" value="Messagerie NetCourriel" style="position:absolute;left:309px;top:93px;width:251px;height:25px;z-index:233;">
<input type="button" id="Button16" onclick="$('#jQueryDialog31').dialog('close');return false;" name="" value="Dépôt Applications" style="position:absolute;left:16px;top:130px;width:251px;height:25px;z-index:234;">
<input type="button" id="Button17" onclick="$('#jQueryDialog16').dialog('close');return false;" name="" value="Street View" style="position:absolute;left:309px;top:130px;width:251px;height:25px;z-index:235;">
<input type="button" id="Button18" onclick="$('#jQueryDialog12').dialog('close');return false;" name="" value="Applications virtualisées" style="position:absolute;left:16px;top:167px;width:251px;height:25px;z-index:236;">
<input type="button" id="Button19" onclick="$('#jQueryDialog10').dialog('close');return false;" name="" value="Chat WebOS" style="position:absolute;left:309px;top:167px;width:251px;height:25px;z-index:237;">
<input type="button" id="Button20" onclick="$('#jQueryDialog40').dialog('close');return false;" name="" value="Editeur 3D Tridiv" style="position:absolute;left:16px;top:204px;width:251px;height:25px;z-index:238;">
<input type="button" id="Button21" onclick="$('#jQueryDialog42').dialog('close');return false;" name="" value="Applications d'Entreprise" style="position:absolute;left:309px;top:204px;width:251px;height:25px;z-index:239;">
<input type="button" id="Button22" onclick="$('#jQueryDialog11').dialog('close');return false;" name="" value="Paramètres et Aides" style="position:absolute;left:16px;top:240px;width:251px;height:25px;z-index:240;">
<input type="button" id="Button23" onclick="$('#jQueryDialog41').dialog('close');return false;" name="" value="Gestionnaire de jeux" style="position:absolute;left:309px;top:240px;width:251px;height:25px;z-index:241;">
<input type="button" id="Button24" onclick="$('#jQueryDialog19').dialog('close');return false;" name="" value="Terminal renseignements" style="position:absolute;left:16px;top:278px;width:251px;height:25px;z-index:242;">
<input type="button" id="Button25" onclick="$('#jQueryDialog8').dialog('close');return false;" name="" value="Navigateur Web Qwant" style="position:absolute;left:309px;top:278px;width:251px;height:25px;z-index:243;">
<input type="button" id="Button26" onclick="$('#jQueryDialog5').dialog('close');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:16px;top:315px;width:251px;height:25px;z-index:244;">
<input type="button" id="Button27" onclick="$('#jQueryDialog21').dialog('close');return false;" name="" value="Fenêtre de Bienvenue" style="position:absolute;left:309px;top:315px;width:251px;height:25px;z-index:245;">
<div id="wb_Text49" style="position:absolute;left:16px;top:372px;width:513px;height:16px;z-index:246;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information&nbsp;: les programmes doivent être ouverts à l'écran pour être fermés.</span></div>
</div>
<div style="height:376px;" id="jquerytabs4-page-1">
<div id="wb_JavaScript2" style="position:absolute;left:21px;top:59px;width:555px;height:301px;z-index:247;">
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


<div id="jQueryDialog53" style="z-index:605;" title="[WIDGET] Notes">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:14px;top:11px;width:238px;height:166px;z-index:268;" rows="9" cols="37" spellcheck="false"></textarea>
</div>

<div id="jQueryDialog15" style="z-index:606;" title="[WIDGET] Calendrier">
<input type="text" id="jQueryDatePicker1" style="position:absolute;left:18px;top:6px;width:236px;height:164px;line-height:164px;z-index:269;" name="jQueryDatePicker1" value="" spellcheck="false">
</div>


<div id="jQueryDialog30" style="z-index:608;" title="Concepteur d&#39;application Web (alpha 0.3)">
<input type="submit" id="Button3" onclick="$('#jQueryDialog22').dialog('open');$('#jQueryDialog30').dialog('close');return false;" name="" value="Ouvrir le concepteur d'application Web (version PHP/HTML)" style="position:absolute;left:45px;top:86px;width:404px;height:25px;z-index:270;">
<div id="wb_Text8" style="position:absolute;left:15px;top:17px;width:451px;height:48px;text-align:justify;z-index:271;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Notre équipe remercie grandement Maxime G., développeur Web et ami, pour son aide à la conception du Concepteur d'Applications Web côté PHP et pour la sécurité du système.</span></div>
</div>

<div id="jQueryDialog22" style="z-index:609;" title="Concepteur d&#39;applications Web (version PHP)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="generatiug/generatiugtest.php">
</iframe><br />
</div>

<div id="jQueryDialog54" style="z-index:610;" title="Applis Web Communautaires">
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

<div id="jQueryDialog51" style="z-index:612;" title="Forum Veler Software (d&#233;veloppement Rynna WebOS et divers projets)">
<object data="http://forumvelersoftware.bbactif.com/t2085-rynna-webos-natif-projet-mini-webos-by-algostep-company" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog56" style="z-index:613;" title="Ipiccy - Retouches photos en ligne">
<object data="addeosapps/ipiccy.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog57" style="z-index:614;" title="Le Bon Coin - Ventes et achats en ligne en France">
<object data="addeosapps/leboncoin.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog58" style="z-index:615;" title="Orange TV - toutes vos chaines en ligne (stream)">
<object data="addeosapps/orangetv.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog59" style="z-index:616;" title="PrintFriendly - Votre page web au format PDF imprimable">
<object data="addeosapps/webpdf.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog60" style="z-index:617;" title="01net - Blog, actualit&#233;s et logiciels informatiques et nouvelle technologie [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/01net.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog61" style="z-index:618;" title="CDiscount [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/cdiscount.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>


<div id="jQueryDialog6" title="Que souhaitez-vous faire ?">
<input type="button" id="Button28" onclick="$('#jQueryDialog6').dialog('close');return false;" name="" value="Annuler et revenir au bureau" style="position:absolute;left:18px;top:58px;width:420px;height:25px;z-index:281;">
<div id="wb_Logout1" style="position:absolute;left:18px;top:18px;width:418px;height:23px;z-index:282;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Fermer la session maintenant" id="Logout1">
</form>
</div>
</div>

<div id="jQueryDialog1" style="z-index:621;" title="Menu Applicatifs">
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:12px;top:12px;width:72px;height:64px;text-align:center;z-index:283;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon2"><i class="fa fa-laptop">&nbsp;</i></div></a></div>
<div id="wb_Text2" style="position:absolute;left:7px;top:84px;width:77px;height:28px;text-align:center;z-index:284;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis générales</span></div>
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:202px;top:14px;width:73px;height:61px;text-align:center;z-index:285;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon4"><i class="fa fa-folder-open-o">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon7" style="position:absolute;left:304px;top:15px;width:67px;height:56px;text-align:center;z-index:286;">
<a href="#" onclick="$('#jQueryDialog54').dialog('open');TimerStartTimer1();$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon7"><i class="fa fa-list-alt">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon11" style="position:absolute;left:111px;top:132px;width:61px;height:50px;text-align:center;z-index:287;">
<a href="#" onclick="$('#jQueryDialog12').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon11"><i class="fa fa-object-group">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon12" style="position:absolute;left:197px;top:132px;width:78px;height:49px;text-align:center;z-index:288;">
<a href="#" onclick="$('#jQueryDialog16').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon12"><i class="fa fa-map">&nbsp;</i></div></a></div>
<div id="wb_Text12" style="position:absolute;left:199px;top:82px;width:76px;height:28px;text-align:center;z-index:289;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Explorateur Fichiers</span></div>
<div id="wb_Text13" style="position:absolute;left:295px;top:84px;width:86px;height:28px;text-align:center;z-index:290;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis de la communautée</span></div>
<div id="wb_Text19" style="position:absolute;left:106px;top:198px;width:70px;height:28px;text-align:center;z-index:291;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis Virtualisées</span></div>
<div id="wb_Text20" style="position:absolute;left:199px;top:198px;width:76px;height:14px;text-align:center;z-index:292;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Street-View</span></div>
<div id="wb_FontAwesomeIcon13" style="position:absolute;left:303px;top:132px;width:69px;height:50px;text-align:center;z-index:293;">
<a href="#" onclick="$('#jQueryDialog13').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon13"><i class="fa fa-envelope-open">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon14" style="position:absolute;left:396px;top:132px;width:71px;height:49px;text-align:center;z-index:294;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon14"><i class="fa fa-at">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon18" style="position:absolute;left:396px;top:15px;width:70px;height:54px;text-align:center;z-index:295;">
<a href="#" onclick="$('#jQueryDialog32').dialog('close');$('#jQueryDialog33').dialog('close');$('#jQueryDialog34').dialog('close');$('#jQueryDialog35').dialog('close');$('#jQueryDialog36').dialog('close');$('#jQueryDialog37').dialog('close');$('#jQueryDialog38').dialog('close');$('#jQueryDialog39').dialog('close');$('#jQueryDialog11').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon18"><i class="fa fa-gears">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon19" style="position:absolute;left:109px;top:15px;width:64px;height:56px;text-align:center;z-index:296;">
<a href="#" onclick="$('#jQueryDialog19').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon19"><i class="fa fa-tencent-weibo">&nbsp;</i></div></a></div>
<div id="wb_Text21" style="position:absolute;left:302px;top:198px;width:70px;height:28px;text-align:center;z-index:297;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Messagerie Net-C</span></div>
<div id="wb_Text24" style="position:absolute;left:402px;top:198px;width:65px;height:28px;text-align:center;z-index:298;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Navigateur internet</span></div>
<div id="wb_Text25" style="position:absolute;left:393px;top:84px;width:77px;height:28px;text-align:center;z-index:299;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Paramètres &amp; Aides</span></div>
<div id="wb_Text52" style="position:absolute;left:103px;top:85px;width:73px;height:14px;text-align:center;z-index:300;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Rynna Search</span></div>
<div id="wb_JavaScript3" style="position:absolute;left:320px;top:378px;width:147px;height:23px;z-index:301;">
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
<hr id="Line1" style="position:absolute;left:15px;top:366px;width:452px;z-index:302;">
<div id="wb_LoginName1" style="position:absolute;left:17px;top:378px;width:278px;height:23px;z-index:303;">
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
<div id="wb_FontAwesomeIcon3" style="position:absolute;left:16px;top:245px;width:69px;height:59px;text-align:center;z-index:304;">
<a href="#" onclick="$('#jQueryDialog89').dialog('open');$('#jQueryDialog37').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon3"><i class="fa fa-desktop">&nbsp;</i></div></a></div>
<div id="wb_Text15" style="position:absolute;left:14px;top:315px;width:75px;height:28px;text-align:center;z-index:305;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Modifier fonds d'écran</span></div>
<div id="wb_MaterialIcon26" style="position:absolute;left:15px;top:132px;width:70px;height:59px;text-align:center;z-index:306;">
<a href="#" onclick="$('#jQueryDialog83').dialog('open');$('#jQueryDialog1').dialog('close');return false;"><div id="MaterialIcon26"><i class="material-icons">&#xe1b2;</i></div></a></div>
<div id="wb_Text28" style="position:absolute;left:16px;top:198px;width:64px;height:28px;text-align:center;z-index:307;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Gestionnaire Serveur</span></div>
</div>

<div id="jQueryDialog21" title="Oups !">
<div id="wb_Text103" style="position:absolute;left:15px;top:19px;width:438px;height:112px;z-index:308;">
<span style="color:#DC143C;font-family:Arial;font-size:13px;"><strong>Une erreur est survenue&nbsp;!<br>Nous ne pouvons rien faire pour vous...<br><br>Nous vous conseillons d'attendre une mise à jour du WebOS pour poursuivre l'action demandée.<br><br>Merci pour votre patience.</strong></span></div>
</div>

<div id="jQueryDialog18" title="Modifier votre session ?">
<div id="wb_Text89" style="position:absolute;left:9px;top:12px;width:364px;height:48px;text-align:justify;z-index:319;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Souhaitez-vous vraiment modifier votre session&nbsp;?</strong><br>Cela entrainera une fermeture de votre session mais ne vous deconnectera pas (vos Cookies doivent être autorisées).</span></div>
<input type="button" id="Button29" onclick="$('#jQueryDialog18').dialog('close');return false;" name="" value="NON" style="position:absolute;left:35px;top:81px;width:96px;height:25px;z-index:320;">
<input type="submit" id="Button30" onclick="window.location.href='./modifuser.php';return false;" name="" value="OUI" style="position:absolute;left:272px;top:81px;width:96px;height:25px;z-index:321;">
</div>

<div id="jQueryDialog2" style="z-index:624;" title="Gestion des erreurs (Kernel PHP)">
<div id="wb_MaterialIcon55" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:322;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog2').dialog('close');return false;"><div id="MaterialIcon55"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text91" style="position:absolute;left:73px;top:19px;width:347px;height:16px;z-index:323;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Listes des erreurs gérées par le WebOS&nbsp;:</span></div>
<table style="position:absolute;left:23px;top:57px;width:401px;height:350px;z-index:324;" id="Table1">
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
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> refused</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
</table>
<input type="button" id="Button1" onclick="ShowObject('wb_PageHeader', 0);TimerStartTimer8();return false;" name="" value="Cliquez ici pour ouvrir le Gestionnaire de Tâches" style="position:absolute;left:23px;top:415px;width:401px;height:25px;z-index:325;">
</div>

<div id="jQueryDialog26" style="z-index:625;" title="Maintenance">
<div id="wb_MaterialIcon56" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:326;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog26').dialog('close');return false;"><div id="MaterialIcon56"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text92" style="position:absolute;left:73px;top:19px;width:347px;height:112px;z-index:327;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Vous pouvez tester la qualité de votre écran par Pixel/Afficheur animé en cliquant sur le bouton ci-dessous.<br><br>Si vous détectez des problèmes de netteté et d'affichages de pixels vous pouvez contatcter votre Administrateur Système ou changer d'écran (si possible) par un écran plus grand et de meilleure qualité (full HD préférable).</span></div>
<input type="button" id="Button46" onclick="$('#jQueryDialog77').dialog('open');return false;" name="" value="Afficher le testeur" style="position:absolute;left:33px;top:159px;width:387px;height:25px;z-index:328;">
</div>

<div id="jQueryDialog64" style="z-index:626;" title="Simulateur Smartphone (0.5)">
<input type="button" id="Button31" onclick="$('#jQueryDialog65').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur iPhone X" style="position:absolute;left:20px;top:28px;width:317px;height:25px;z-index:329;">
<input type="button" id="Button32" onclick="$('#jQueryDialog66').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur Samsung Galaxy s8" style="position:absolute;left:20px;top:68px;width:317px;height:25px;z-index:330;">
</div>

<div id="jQueryDialog65" style="z-index:627;" title="Simulateur iPhone X (test de sites Web et WebApps)">
<div id="Layer30" style="position:absolute;text-align:left;left:59px;top:42px;width:253px;height:40px;z-index:331;">
</div>
<div id="wb_Image40" style="position:absolute;left:31px;top:25px;width:307px;height:616px;z-index:332;">
<img src="images/nue_iphone8_design_final_2018.png" id="Image40" alt=""></div>
<div id="Html18" style="position:absolute;left:51px;top:42px;width:268px;height:582px;overflow:hidden;z-index:333">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<div id="wb_Image41" style="position:absolute;left:101px;top:42px;width:178px;height:29px;z-index:334;">
<img src="images/iphone8_simulation_haut.png" id="Image41" alt=""></div>
<input type="button" id="Button36" onclick="window.confirm('iOS 11');return false;" name="" value="Version iOS" style="position:absolute;left:352px;top:42px;width:222px;height:25px;z-index:335;">
<input type="button" id="Button37" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog65').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:354px;top:616px;width:222px;height:25px;z-index:336;">
<div id="wb_Text97" style="position:absolute;left:-1px;top:6px;width:474px;height:15px;z-index:337;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog66" style="z-index:628;" title="Simulateur Samsung Galaxy s8 (test de sites Web et WebApps)">
<div id="wb_Image42" style="position:absolute;left:55px;top:16px;width:301px;height:642px;z-index:338;">
<img src="images/Samsung-Galaxy-S8-0.png" id="Image42" alt=""></div>
<div id="Html20" style="position:absolute;left:70px;top:57px;width:270px;height:563px;overflow:hidden;z-index:339">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<input type="button" id="Button38" name="" value="Action bouton central (sous écran)" style="position:absolute;left:366px;top:42px;width:222px;height:25px;z-index:340;">
<input type="button" id="Button41" onclick="window.confirm('Android 7.0');return false;" name="" value="Version Android" style="position:absolute;left:366px;top:90px;width:222px;height:25px;z-index:341;">
<input type="button" id="Button42" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog66').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:370px;top:627px;width:222px;height:25px;z-index:342;">
<div id="wb_Text98" style="position:absolute;left:8px;top:6px;width:474px;height:15px;z-index:343;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog67" style="z-index:629;" title="Envoi rapide">
<div id="wb_Extension1" style="position:absolute;left:21px;top:66px;width:845px;height:212px;z-index:344;">
<div id="Extension1">
<div class="upload-drop-target"><h2>Glisser et déposer vos fichiers dans ce cadre (jpg, jpeg, gif ou png)</h2></div>
<input type="file" multiple="">
<div class="upload-selected"></div>
<a class="button upload-choose" href="#">Choisir des fichiers</a>
<a class="button upload-submit" href="#">Envoyer</a>
</div>
</div>
<div id="wb_Text100" style="position:absolute;left:27px;top:13px;width:832px;height:32px;z-index:345;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Déposer sur le serveur une image de votre choix (taille limite&nbsp;: 4mo par image)<br>Pour partager votre image notez le chemin&nbsp;: </span><span style="color:#0000CD;font-family:Arial;font-size:13px;"><strong>[votre serveur]/uploads/[le nom de votre fichier].[son extension]</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;">&nbsp; et partagez le à vos amies&nbsp;!</span></div>
</div>

<div id="jQueryDialog13" style="z-index:630;" title="Messagerie personelle Europ&#233;enne (Net Courriel)">
<object data="addeosapps/messagerienetc.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>


<div id="jQueryDialog69" style="z-index:632;" title="[WIDGET] Horloge">
<object data="addeosapps/horloge.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
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

<div id="jQueryDialog70" style="z-index:634;" title="Webcam">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/webcam.php">
</iframe><br />
</div>

<div id="jQueryDialog71" style="z-index:635;" title="Calendrier g&#233;n&#233;ral">
<object data="addeosapps/agenda.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog72" style="z-index:636;" title="Devises">
<object data="addeosapps/devise.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog73" style="z-index:637;" title="Sauvegarde local de votre session">
<div id="Html58" style="position:absolute;left:13px;top:11px;width:336px;height:175px;z-index:356">
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
   }, 65);
}
function TimerStopTimer12()
{
   clearTimeout(wb_Timer12);
}
TimerStartTimer12();
</script>

<div id="jQueryDialog32" style="z-index:639;" title="Informations sur le WebOS">
<div id="wb_Text32" style="position:absolute;left:27px;top:68px;width:714px;height:451px;text-align:center;z-index:365;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Rynna WebOS est un WebOS libre d'utilisation pour tous.</strong><br>Son code source est disponible publiquement sur le dépôt GitHub.<br><br></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>NOM DE CODE DE VERSION&nbsp;:</strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong> </strong></span><span style="color:#4169E1;font-family:Arial;font-size:16px;"><strong>Vegasis</strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong> (30.0 et supérieur)</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br><strong>Liste des développeurs&nbsp;: <br></strong><br><em>Société AlgoStep Company&nbsp;:<br></em><br>Loïc A.<br>Maxime D.<br><br><em>Développeurs qui ont aidés à son développement ou pour leurs avis (remerciements)&nbsp;: <br></em><br>Polien (veler Software)<br>Softwarezatorman (veler Software)<br>Lereparateurdepc (veler Software)<br>Etienne Baudoux (IRL)<br>Jeremy60800 (veler Software)<br>Fandeonepiece2 (veler Software)<br>Coincero (veler Software)<br>Maxime G. (IRL)<br>Random Coder 99 (OpenClassRoom)<br>Jona (CCSources Co.)<br>Jeremy N. (IRL)<br><br>Merci à tout nos amies à Rouen pour leurs conseils et leurs professionnalismes durant le développement long et fastidieux de ce projet&nbsp;!</span></div>
<div id="wb_MaterialIcon13" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:366;">
<a href="#" onclick="$('#jQueryDialog11').dialog('open');$('#jQueryDialog32').dialog('close');return false;"><div id="MaterialIcon13"><i class="material-icons">&#xe5cb;</i></div></a></div>
<input type="button" id="Button9" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/master.zip';return false;" name="" value="Télécharger le code source en développement (github dépôt officiel) [master.zip]" style="position:absolute;left:27px;top:546px;width:714px;height:25px;z-index:367;">
</div>

<div id="jQueryDialog52" style="z-index:640;" title="Choisir un Widget ?">
<div id="wb_MaterialIcon31" style="position:absolute;left:10px;top:13px;width:67px;height:63px;text-align:center;z-index:395;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog53').dialog('open');return false;"><div id="MaterialIcon31"><i class="material-icons">&#xe0d8;</i></div></a></div>
<div id="wb_Text53" style="position:absolute;left:14px;top:82px;width:59px;height:15px;text-align:center;z-index:396;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Notes</span></div>
<div id="wb_Image15" style="position:absolute;left:95px;top:14px;width:62px;height:62px;z-index:397;">
<a href="#" onclick="$('#jQueryDialog15').dialog('open');$('#jQueryDialog52').dialog('close');return false;"><img src="images/52925.png" id="Image15" alt="" title="Calendrier"></a></div>
<div id="wb_Text3" style="position:absolute;left:97px;top:82px;width:59px;height:30px;text-align:center;z-index:398;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Calendrier</span></div>
<div id="wb_MaterialIcon61" style="position:absolute;left:176px;top:14px;width:62px;height:59px;text-align:center;z-index:399;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog69').dialog('open');return false;"><div id="MaterialIcon61"><i class="material-icons">&#xe889;</i></div></a></div>
<div id="wb_Text102" style="position:absolute;left:177px;top:82px;width:61px;height:15px;text-align:center;z-index:400;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Horloge</span></div>
<html>
   <body>

<!-- Version 20.0 et + ; On n'execute plus la fonction, on essayera de trouver une autre solution plus tard pour les BackgroungImageFunction AutoLoad -->
<!--  <a href="#" onload="backgroundscreenusrx();">  -->

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
var dexsamsung = "open::loaddex()";
var dexaccess = "session.php";
var dexaccessdemo = "demosession.php";
var dexmode = "1";
var dexlog = "0";
var dexy = "720";
var dexx = "1280";
var csd = "1x999";
var csg = "1x000";
var cid = "0x999";
var cig = "0x000";
<!-- Variables de sécurités 2018 LOD -->
var chromecore = "/security";
var mozillacore = "/security";
var iecore = "/security";
var edgecore = "/security";
var neoncore = "/security";
var passlod = "1";
var autorizedactlod = "1";
var othercore = "nop.php";
<!-- Affichera la variable de la session sous la forme   '[username]'; -->
var usrxbg='<?php echo $_SESSION['username'];?>';
}

</script>

<!-- var usrxbg='<?php echo $_SESSION['username'];?>'; deja indiqué dans les variables de demarrage ci-dessus -->

<!-- <script language="text/javascript">document.getElementById('affichage').innerHTML = usrxbg;</script> -->
<!--<script>-->

<!--function backgroundscreenusrx() {-->
   <!-- document.body.style.backgroundColor = "#050505";-->
  <!--  document.body.style.backgroundImage = "url('home/' + usrxbg + '/mybg.jpg')";-->
<!--   }   -->
<!--</script>-->

</body>


</html> 
<div id="wb_MaterialIcon37" style="position:absolute;left:9px;top:108px;width:67px;height:63px;text-align:center;z-index:402;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog42').dialog('open');return false;"><div id="MaterialIcon37"><i class="material-icons">&#xe865;</i></div></a></div>
<div id="wb_Text77" style="position:absolute;left:12px;top:181px;width:64px;height:14px;text-align:center;z-index:403;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Bibliothèque</span></div>
<div id="wb_MaterialIcon35" style="position:absolute;left:94px;top:108px;width:67px;height:63px;text-align:center;z-index:404;">
<a href="#" onclick="$('#jQueryDialog52').dialog('close');$('#jQueryDialog91').dialog('open');return false;"><div id="MaterialIcon35"><i class="material-icons">&#xe22f;</i></div></a></div>
<div id="wb_Text82" style="position:absolute;left:94px;top:181px;width:67px;height:14px;text-align:center;z-index:405;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Duplicateur</span></div>
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

<div id="jQueryDialog9" style="z-index:643;" title="Wikip&#233;dia">
<object data="addeosapps/wikipedia.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog31" style="z-index:644;" title="Le Monde - Actualit&#233;s de France">
<object data="addeosapps/lemonde.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog55" style="z-index:645;" title="Forum Etienne BAUDOUX - Forum li&#233; au projet Rynna WebOS">
<object data="addeosapps/sz.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog68" style="z-index:646;" title="OpenClassRoom - Tutoriels et cours en ligne">
<object data="addeosapps/ocr.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog75" style="z-index:647;" title="SUMO PAINT - Dessin (demonstration gratuite)">
<object data="addeosapps/paint.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog76" style="z-index:648;" title="Now-Coworking - Espace Coworking pour votre Entreprise">
<object data="addeosapps/nowcoworking.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog62" style="z-index:649;" title="Notes dropbox - FARGO (gratuit)">
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
   }, 9500);
}
function TimerStopTimer4()
{
   clearTimeout(wb_Timer4);
}
TimerStartTimer4();
</script>

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

<div id="jQueryDialog17" title="R&#233;paration de la session">
<div id="wb_Text71" style="position:absolute;left:7px;top:13px;width:454px;height:240px;z-index:446;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Ce programme vous permet de recharger correctement votre session et son interface.<br></strong><br><u>Utile dans les cas suivants&nbsp;:<br></u>- Barre de tâches disparut<br>- Icônes non affichés<br>- Grille d'alignement qui affiche plusieurs icônes identiques<br>- Impossibilité de charger la BootomBar ou la Barre d'Action (droite)<br>- Actions qui ne répondent plus<br>- Accès aux programmes qui ne répondent plus<br><strong>Cette procédure vous évite de recharger la page&nbsp;&quot;session&quot;&nbsp;et vous permet de ne pas perdre votre travail.</strong><br><br>La réparation dure quelques instants et résout la plupart des problèmes d'affichages.</span></div>
<input type="button" id="Button2" onclick="ShowObject('Layer27', 1);$('#jQueryDialog17').dialog('close');TimerStartTimer45();return false;" name="" value="Réparer maintenant" style="position:absolute;left:14px;top:276px;width:166px;height:25px;z-index:447;">
<input type="button" id="Button4" onclick="$('#jQueryDialog17').dialog('close');return false;" name="" value="Annuler" style="position:absolute;left:299px;top:276px;width:166px;height:25px;z-index:448;">
</div>

<div id="jQueryDialog63" title="Proc&#233;dure de r&#233;paration">
<div id="wb_Text72" style="position:absolute;left:111px;top:11px;width:379px;height:80px;z-index:449;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Procédure de réparation terminée&nbsp;!</strong><br><br>Si vous avez toujours un problème dans votre session nous vous conseillons de vider le cache et les fichiers temporaires de votre navigateur internet (Images et Cookies).</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog63').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:186px;top:112px;width:129px;height:25px;z-index:450;">
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:8px;top:11px;width:95px;height:80px;text-align:center;z-index:451;">
<div id="FontAwesomeIcon5"><i class="fa fa-shield">&nbsp;</i></div></div>
</div>

<div id="jQueryDialog77" style="z-index:654;" title="Testeur et Afficheur (screen test quality)">
<div id="wb_Image26" style="position:absolute;left:18px;top:15px;width:540px;height:540px;z-index:452;">
<img src="images/test_pixel_ecran.gif" id="Image26" alt=""></div>
<div id="wb_Image27" style="position:absolute;left:556px;top:15px;width:274px;height:274px;z-index:453;">
<img src="images/test_pixel_ecran.gif" id="Image27" alt=""></div>
<div id="wb_Image29" style="position:absolute;left:556px;top:289px;width:142px;height:142px;z-index:454;">
<img src="images/test_pixel_ecran.gif" id="Image29" alt=""></div>
<div id="wb_Image30" style="position:absolute;left:698px;top:289px;width:142px;height:142px;z-index:455;">
<img src="images/test_pixel_ecran.gif" id="Image30" alt=""></div>
<div id="wb_Image31" style="position:absolute;left:838px;top:289px;width:142px;height:142px;z-index:456;">
<img src="images/test_pixel_ecran.gif" id="Image31" alt=""></div>
<div id="wb_Image44" style="position:absolute;left:975px;top:289px;width:131px;height:142px;z-index:457;">
<img src="images/test_pixel_ecran.gif" id="Image44" alt=""></div>
<div id="wb_Image56" style="position:absolute;left:556px;top:431px;width:550px;height:124px;z-index:458;">
<img src="images/test_pixel_ecran.gif" id="Image56" alt=""></div>
<div id="wb_Image28" style="position:absolute;left:832px;top:15px;width:274px;height:274px;z-index:459;">
<img src="images/test_pixel_ecran.gif" id="Image28" alt=""></div>
</div>


<div id="jQueryDialog78" style="z-index:656;" title="Sticky-Notes Generator (WebesTools)">
<object data="addeosapps/sng.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog74" title="Bienvenue dans la session de d&#233;monstration !">
<div id="wb_Text108" style="position:absolute;left:12px;top:13px;width:540px;height:195px;z-index:522;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Bienvenue dans la session de démonstration&nbsp;!</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br></span><span style="color:#FF0000;font-family:Arial;font-size:13px;"><strong>Celle-ci est une copie conforme du WebOS actuellement disponible sauf que vous n'avez pas accès à certaines propriétés qui sont les suivantes&nbsp;: </strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br>- Chat du WebOS et de la communauté et quelques applications internes<br>- Modifier votre compte utilisateur<br>- Accéder à l'explorateur de fichiers et votre espace personnel (50Go)<br><br><strong>Créer un compte est <u>GRATUIT et ILLIMITE</u> si vous le souhaitez par la suite&nbsp;!<br></strong><br>Bon test sur votre session temporaire&nbsp;!</span></div>
</div>

<div id="jQueryDialog79" style="z-index:658;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/RGBConverter.apple/Widget.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog80" style="z-index:659;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/FLVPlayer.apple/FLVPlayer.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog81" style="z-index:660;" title="[MACOSX-VIRTUALISATION]">
<object data="apple/eCalc_Scientific.apple/main.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog82" style="z-index:661;" title="[LINUX-VIRTUALISATION]">
<object data="linux/helloworld/index.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>


<div id="jQueryDialog83" style="z-index:663;" title="Gestionnaire de Serveur">
<input type="button" id="Button5" onclick="$('#jQueryDialog83').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:327px;top:176px;width:161px;height:25px;z-index:527;">
<div id="wb_Text44" style="position:absolute;left:13px;top:17px;width:473px;height:16px;z-index:528;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Links-Dialog (sitemap public)</span></div>
<div id="wb_Text50" style="position:absolute;left:13px;top:93px;width:473px;height:16px;z-index:529;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Aides Audio (descriptif audio des fonctions du WebOS)</span></div>
<div id="wb_FontAwesomeIcon6" style="position:absolute;left:14px;top:33px;width:470px;height:42px;text-align:center;z-index:530;">
<a href="#" onclick="$('#jQueryDialog84').dialog('open');return false;"><div id="FontAwesomeIcon6"><i class="fa fa-anchor">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon8" style="position:absolute;left:14px;top:109px;width:470px;height:42px;text-align:center;z-index:531;">
<a href="#" onclick="PlayAudio('MediaPlayer1');$('#jQueryDialog86').dialog('open');return false;"><div id="FontAwesomeIcon8"><i class="fa fa-audio-description">&nbsp;</i></div></a></div>
</div>

<div id="jQueryDialog84" style="z-index:664;" title="Links-Dialog">
<object data="sitemap.xml" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog85" style="z-index:665;" title="[SOUND-HELP-MALENTENDANT]-ConfigurationScriptsDialog">
<div id="wb_MediaPlayer1" style="position:absolute;left:22px;top:76px;width:67px;height:55px;z-index:533;">
<audio src="001.wav" id="MediaPlayer1">
</audio>
</div>
<div id="wb_Text74" style="position:absolute;left:10px;top:20px;width:959px;height:32px;z-index:534;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CETTE FENETRE EST CACHEE. ELLE NE DOIT JAMAIS POUVOIR ETRE APPELEE&nbsp;! ADMINISTRATEUR ET CONCEPTEUR&nbsp;; FAITE ATTENTION A VOS CODES ET FONCTIONS JS/PHP D'APPELS&nbsp;! CETTE FENETRE SERT EXCLUSIVEMENT A LANCER DES AUDIOS.</span></div>
<div id="wb_MediaPlayer2" style="position:absolute;left:96px;top:76px;width:67px;height:55px;z-index:535;">
<audio src="explorateurfichiers.wav" id="MediaPlayer2">
</audio>
</div>
<div id="wb_MediaPlayer3" style="position:absolute;left:174px;top:76px;width:67px;height:55px;z-index:536;">
<audio src="applisinternes.wav" id="MediaPlayer3">
</audio>
</div>
<div id="wb_MediaPlayer4" style="position:absolute;left:254px;top:76px;width:67px;height:55px;z-index:537;">
<audio src="bienvenue.wav" id="MediaPlayer4">
</audio>
</div>
<div id="wb_MediaPlayer5" style="position:absolute;left:332px;top:76px;width:67px;height:55px;z-index:538;">
<audio src="parametres.wav" id="MediaPlayer5">
</audio>
</div>
</div>

<div id="jQueryDialog86" style="z-index:666;" title="Audio-Help">
<div id="wb_FontAwesomeIcon9" style="position:absolute;left:27px;top:17px;width:238px;height:131px;text-align:center;z-index:539;">
<div id="FontAwesomeIcon9"><i class="fa fa-audio-description">&nbsp;</i></div></div>
<input type="button" id="Button8" onclick="PlayAudio('MediaPlayer2');$('#jQueryDialog5').dialog('open');StopAudio('MediaPlayer3');StopAudio('MediaPlayer4');StopAudio('MediaPlayer5');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:26px;top:166px;width:241px;height:25px;z-index:540;">
<input type="button" id="Button43" onclick="PlayAudio('MediaPlayer3');$('#jQueryDialog3').dialog('open');StopAudio('MediaPlayer2');StopAudio('MediaPlayer4');StopAudio('MediaPlayer5');return false;" name="" value="Applications Internes" style="position:absolute;left:26px;top:201px;width:241px;height:25px;z-index:541;">
<input type="button" id="Button44" onclick="PlayAudio('MediaPlayer4');ShowObject('Layer1', 1);StopAudio('MediaPlayer2');StopAudio('MediaPlayer3');StopAudio('MediaPlayer5');return false;" name="" value="Fenêtre Bienvenue" style="position:absolute;left:26px;top:237px;width:241px;height:25px;z-index:542;">
<input type="button" id="Button45" onclick="PlayAudio('MediaPlayer5');$('#jQueryDialog11').dialog('open');StopAudio('MediaPlayer2');StopAudio('MediaPlayer3');StopAudio('MediaPlayer4');return false;" name="" value="Paramètres session" style="position:absolute;left:26px;top:272px;width:241px;height:25px;z-index:543;">
</div>

<div id="jQueryDialog87" style="z-index:667;" title="Liligo - Voyages Hotel, Voitures, S&#233;jours [NON COMPATIBLE EN HTTPS]">
<object data="addeosapps/liligo.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<script>
var wb_Timer48;
function TimerStartTimer48()
{
   wb_Timer48 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer4', 0);
      ShowObject('Layer22', 0);
   }, 30);
}
function TimerStopTimer48()
{
   clearTimeout(wb_Timer48);
}
TimerStartTimer48();
</script>

<script>
var wb_Timer49;
function TimerStartTimer49()
{
   wb_Timer49 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer4', 0);
      ShowObject('Layer22', 0);
   }, 65);
}
function TimerStopTimer49()
{
   clearTimeout(wb_Timer49);
}
TimerStartTimer49();
</script>

<div id="jQueryDialog45" style="z-index:670;" title="V&#233;rification des mises &#224; jour WebOS">
<div id="Html14" style="position:absolute;left:14px;top:167px;width:850px;height:77px;z-index:546">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://rynnawebos.fr/login/maj.php">
</iframe></div>
<div id="wb_Text43" style="position:absolute;left:14px;top:68px;width:848px;height:24px;text-align:center;z-index:547;">
<span style="color:#FF6347;font-family:Arial;font-size:21px;"><strong>32.0</strong></span></div>
<div id="wb_Text42" style="position:absolute;left:14px;top:120px;width:460px;height:16px;z-index:548;">
<span style="color:#000000;font-family:Arial;font-size:13px;">La dernière version disponible (code source) est la suivante&nbsp;:</span></div>
<div id="wb_Text46" style="position:absolute;left:14px;top:18px;width:460px;height:16px;z-index:549;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Votre version est actuellement&nbsp;:</span></div>
<div id="wb_Text76" style="position:absolute;left:17px;top:257px;width:847px;height:32px;z-index:550;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Souhaitez-vous télécharger la dernière version&nbsp;?<br><em>Vous devez disposer d'un serveur local ou en ligne avec vos droits Administrateur pour pouvoir installer la dernière version&nbsp;!</em></span></div>
<input type="submit" id="Button47" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/master.zip';return false;" name="" value="Télécharger la dernière version disponible du WebOS (code source MASTER officiel et complet)" style="position:absolute;left:12px;top:321px;width:852px;height:25px;z-index:551;">
</div>

<div id="jQueryDialog42" style="z-index:671;" title="[WIDGET] Biblioth&#232;que">
<input type="button" id="Button48" onclick="$('#jQueryDialog46').dialog('open');return false;" name="" value="Ouvrir la Bibliothèque locale" style="position:absolute;left:28px;top:22px;width:215px;height:25px;z-index:552;">
<input type="button" id="Button49" onclick="$('#jQueryDialog47').dialog('open');return false;" name="" value="Télécharger de nouveau e-book" style="position:absolute;left:28px;top:60px;width:215px;height:25px;z-index:553;">
<div id="wb_Image57" style="position:absolute;left:76px;top:97px;width:125px;height:93px;z-index:554;">
<img src="images/bibliotheque.gif" id="Image57" alt=""></div>
</div>


<script>
var wb_Timer52;
function TimerStartTimer52()
{
   wb_Timer52 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer4', 0);
   }, 125);
}
function TimerStopTimer52()
{
   clearTimeout(wb_Timer52);
}
TimerStartTimer52();
</script>

<div id="jQueryDialog88" style="z-index:674;" title="Annonce g&#233;n&#233;rale (Administrateur)">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/annonce.php">
</iframe><br />
</div>

<script>
var wb_Timer53;
function TimerStartTimer53()
{
   wb_Timer53 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer22', 0);
   }, 145);
}
function TimerStopTimer53()
{
   clearTimeout(wb_Timer53);
}
TimerStartTimer53();
</script>

<script>
var wb_Timer54;
function TimerStartTimer54()
{
   wb_Timer54 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer26', 0);
   }, 195);
}
function TimerStopTimer54()
{
   clearTimeout(wb_Timer54);
}
TimerStartTimer54();
</script>

<script>
var wb_Timer55;
function TimerStartTimer55()
{
   wb_Timer55 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer24', 0);
   }, 30000);
}
function TimerStopTimer55()
{
   clearTimeout(wb_Timer55);
}
TimerStartTimer55();
</script>

<div id="jQueryDialog89" style="z-index:678;" title="Informations sur votre session">
<div id="wb_Text80" style="position:absolute;left:11px;top:8px;width:340px;height:64px;z-index:556;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour le moment le changement de votre fond d'écran ne sera pas sauvegardé.<br>Nous travaillons actuellement sur cette possibilitée.<br>Merci pour votre patience.</span></div>
</div>

<div id="jQueryDialog90" style="z-index:679;" title="Cloud gratuit (15Go) - 4Sync">
<object data="addeosapps/4sync.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog91" style="z-index:680;" title="[WIDGET] Multi-session">
<div id="Html115" style="position:absolute;left:7px;top:18px;width:306px;height:143px;z-index:558">
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=768,width=1024'); return false;" >Dupliquer la session (1024X768)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=900,width=1180'); return false;" >Dupliquer la session (1180X900</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=800,width=1120'); return false;" >Dupliquer la session (1120X800)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=900,width=1600'); return false;" >Dupliquer la session (1600X900)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=1080,width=1920'); return false;" >Dupliquer la session (1920X1080)</a><br />
<br>
Vous ne pouvez lancer qu'un processus à la fois !</div>
</div>

</div>
<div id="Layer21" style="position:fixed;text-align:left;left:0;right:0;bottom:0;height:15px;z-index:681;" onmouseenter="ShowObject('Layer22', 1);AnimateCss('Layer22', 'animate-fade-in', 5, 500);return false;">
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:2202px;top:1387px;width:755px;height:436px;z-index:682;">
<div id="Layer1_Container" style="width:755px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="jQueryTabs1" style="position:absolute;left:0px;top:0px;width:745px;height:426px;z-index:5;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>Informations</span></a></li>
</ul>
<div style="height:404px;" id="jquerytabs1-page-0">
<div id="wb_Text7" style="position:absolute;left:23px;top:65px;width:639px;height:19px;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:17px;">Bienvenue sur Rynna WebOS (Vegasis)&nbsp;!</span></div>
<div id="wb_Text10" style="position:absolute;left:23px;top:97px;width:678px;height:54px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Rynna WebOS est un système d'exploitation fonctionnant uniquement dans un navigateur internet sur n'importe quel système d'exploitation.<br></span><span style="color:#4169E1;font-family:Arial;font-size:15px;"><strong>Pour ouvrir les options bureautiques&nbsp;; effectuez un double clique gauche sur le bureau.</strong></span></div>
<div id="wb_Text86" style="position:absolute;left:23px;top:168px;width:689px;height:16px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ci-dessous retrouvez les dernières mises à jour de votre WebOS. Seul les 6 dernières mises à jours sont indiqués&nbsp;:</span></div>
<div id="Blog1" style="overflow-y:scroll;position:absolute;left:23px;top:195px;width:689px;height:171px;z-index:3;">
<div class="blogitem">
   <span class="blogsubject">Version 32.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">08/02/18<br></div>
   <span style="color:#000000;">- Modification de la procédure de choix du démarrage (inituser process)<br>
- Meilleure affichage et suppression des images non nécessaires</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 31.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">06/02/18<br></div>
   <span style="color:#000000;">- Mise à jour de stabilité noyau<br>
- Ajout d'u nouveau système de gestion performance</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 30.3</span>
   <div class="no-thumb"></div>
   <div class="blogdate">31/01/18<br></div>
   <span style="color:#000000;">- Ajout du multi-écran session (fonction Widgets multiplieurs d'écrans)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 30.2</span>
   <div class="no-thumb"></div>
   <div class="blogdate">26/01/18<br></div>
   <span style="color:#000000;">- Amélioration de la session Mode Sans Echec (sessionmse)<br>
- Réduction de certaines tailles de fenêtres trop grandes par défaut pour les petites résolutions (inférieur ou égal&nbsp; à 1280X1080)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 30.1</span>
   <div class="no-thumb"></div>
   <div class="blogdate">23/01/18<br></div>
   <span style="color:#000000;">- Amélioration message TChat<br>
- Ajout d'une nouvelle application bureautique de Cloud en ligne gratuit (15Go) (icone inclus)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 30.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">16/01/18<br></div>
   <span style="color:#000000;">- Version VEGASIS (30.0 et supérieur) disponible !<br>
- Refonte mi-complète du système<br>
- Ajout de 17 nouveaux fonds d'écran<br>
- Plusieurs améliorations<br>
- Nouvel icone de gestion et d'affichage de l'hébergeur d'images<br>
/!\ Pensez à vider votre Cache de navigateur si vous accéder à la 30.0 pour la première fois, puis recharger votre session entièrement</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
</div>
<input type="button" id="Button12" onclick="ShowObject('Layer1', 0);return false;" name="" value="Cliquez ici pour fermer la fenêtre et commencer à utiliser votre session" style="position:absolute;left:23px;top:379px;width:689px;height:25px;z-index:4;">
</div>
</div>
</div>
</div>
<div id="wb_PageHeader">
<div id="PageHeader">
<div class="row">
<div class="col-1">
<div id="wb_FontAwesomeIcon15" style="display:inline-block;width:35px;height:28px;text-align:center;z-index:6;">
<a href="#" onclick="$('#jQueryDialog1').dialog('open');$('#jQueryDialog52').dialog('close');$('#jQueryDialog6').dialog('close');return false;" ondblclick="$('#jQueryDialog1').dialog('close');return false;"><div id="FontAwesomeIcon15"><i class="fa fa-yelp">&nbsp;</i></div></a>
</div>
<div id="wb_MaterialIcon3" style="display:inline-block;width:34px;height:36px;text-align:center;z-index:7;">
<div id="MaterialIcon3"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon1" style="display:inline-block;width:44px;height:36px;text-align:center;z-index:8;">
<a href="#" onclick="$('#jQueryDialog18').dialog('open');return false;"><div id="MaterialIcon1"><i class="material-icons">&#xe853;</i></div></a>
</div>
<div id="wb_MaterialIcon22" style="display:inline-block;width:48px;height:36px;text-align:center;z-index:9;">
<a href="#" onclick="$('#jQueryDialog29').dialog('open');$('#jQueryDialog10').dialog('close');return false;" ondblclick="$('#jQueryDialog29').dialog('close');return false;"><div id="MaterialIcon22"><i class="material-icons">&#xe0b7;</i></div></a>
</div>
<div id="wb_MaterialIcon25" style="display:inline-block;width:40px;height:36px;text-align:center;z-index:10;">
<a href="#" onclick="window.print();TimerStartTimer7();return false;"><div id="MaterialIcon25"><i class="material-icons">&#xe8ad;</i></div></a>
</div>
<div id="wb_MaterialIcon27" style="display:inline-block;width:45px;height:36px;text-align:center;z-index:11;">
<a href="#" onclick="ShowObject('wb_PageHeader', 0);ShowObject('Layer1', 0);TimerStartTimer8();return false;"><div id="MaterialIcon27"><i class="material-icons">&#xe8b2;</i></div></a>
</div>
<div id="wb_MaterialIcon24" style="display:inline-block;width:41px;height:36px;text-align:center;z-index:12;">
<a href="#" onclick="ShowObject('Layer23', 1);return false;"><div id="MaterialIcon24"><i class="material-icons">&#xe8fd;</i></div></a>
</div>
<div id="wb_MaterialIcon4" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:13;">
<div id="MaterialIcon4"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon30" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:14;">
<a href="#" onclick="$('#jQueryDialog1').dialog('close');$('#jQueryDialog52').dialog('open');return false;" ondblclick="$('#jQueryDialog52').dialog('close');return false;"><div id="MaterialIcon30"><i class="material-icons">&#xe41d;</i></div></a>
</div>
<div id="wb_MaterialIcon33" style="display:inline-block;width:35px;height:36px;text-align:center;z-index:15;">
<div id="MaterialIcon33"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon28" style="display:inline-block;width:42px;height:36px;text-align:center;z-index:16;">
<a href="#" onclick="$('#jQueryDialog83').dialog('open');return false;"><div id="MaterialIcon28"><i class="material-icons">&#xe16a;</i></div></a>
</div>
<div id="wb_MaterialIcon19" style="display:inline-block;width:43px;height:36px;text-align:center;z-index:17;">
<a href="#" onclick="ShowObject('Layer3', 1);return false;"><div id="MaterialIcon19"><i class="material-icons">&#xe899;</i></div></a>
</div>
<div id="wb_MaterialIcon18" style="display:inline-block;width:44px;height:36px;text-align:center;z-index:18;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');return false;"><div id="MaterialIcon18"><i class="material-icons">&#xe879;</i></div></a>
</div>
<div id="wb_MaterialIcon38" style="display:inline-block;width:35px;height:36px;text-align:center;z-index:19;">
<div id="MaterialIcon38"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon62" style="display:inline-block;width:50px;height:36px;text-align:center;z-index:20;">
<a href="#" onclick="Toggle('jQueryDialog2', 'fade', 500);Toggle('jQueryDialog3', 'fade', 500);Toggle('jQueryDialog4', 'fade', 500);Toggle('jQueryDialog5', 'fade', 500);Toggle('jQueryDialog6', 'fade', 500);Toggle('jQueryDialog7', 'fade', 500);Toggle('jQueryDialog8', 'fade', 500);Toggle('jQueryDialog9', 'fade', 500);Toggle('jQueryDialog10', 'fade', 500);Toggle('jQueryDialog11', 'fade', 500);Toggle('jQueryDialog12', 'fade', 500);Toggle('jQueryDialog13', 'fade', 500);Toggle('jQueryDialog14', 'fade', 500);Toggle('jQueryDialog15', 'fade', 500);Toggle('jQueryDialog16', 'fade', 500);Toggle('jQueryDialog17', 'fade', 500);Toggle('jQueryDialog18', 'fade', 500);Toggle('jQueryDialog19', 'fade', 500);Toggle('jQueryDialog20', 'fade', 500);Toggle('jQueryDialog21', 'fade', 500);Toggle('jQueryDialog22', 'fade', 500);Toggle('jQueryDialog23', 'fade', 500);Toggle('jQueryDialog24', 'fade', 500);Toggle('jQueryDialog25', 'fade', 500);Toggle('jQueryDialog26', 'fade', 500);Toggle('jQueryDialog27', 'fade', 500);Toggle('jQueryDialog28', 'fade', 500);Toggle('jQueryDialog29', 'fade', 500);Toggle('jQueryDialog30', 'fade', 500);Toggle('jQueryDialog31', 'fade', 500);Toggle('jQueryDialog32', 'fade', 500);Toggle('jQueryDialog33', 'fade', 500);Toggle('jQueryDialog34', 'fade', 500);Toggle('jQueryDialog35', 'fade', 500);Toggle('jQueryDialog36', 'fade', 500);Toggle('jQueryDialog37', 'fade', 500);Toggle('jQueryDialog38', 'fade', 500);Toggle('jQueryDialog39', 'fade', 500);Toggle('jQueryDialog40', 'fade', 500);Toggle('jQueryDialog41', 'fade', 500);Toggle('jQueryDialog42', 'fade', 500);Toggle('jQueryDialog43', 'fade', 500);Toggle('jQueryDialog44', 'fade', 500);Toggle('jQueryDialog45', 'fade', 500);Toggle('jQueryDialog46', 'fade', 500);Toggle('jQueryDialog47', 'fade', 500);Toggle('jQueryDialog48', 'fade', 500);Toggle('jQueryDialog49', 'fade', 500);Toggle('jQueryDialog50', 'fade', 500);Toggle('jQueryDialog51', 'fade', 500);Toggle('jQueryDialog52', 'fade', 500);Toggle('jQueryDialog53', 'fade', 500);Toggle('jQueryDialog54', 'fade', 500);Toggle('jQueryDialog55', 'fade', 500);Toggle('jQueryDialog56', 'fade', 500);Toggle('jQueryDialog57', 'fade', 500);Toggle('jQueryDialog58', 'fade', 500);Toggle('jQueryDialog59', 'fade', 500);Toggle('jQueryDialog60', 'fade', 500);Toggle('jQueryDialog61', 'fade', 500);Toggle('jQueryDialog62', 'fade', 500);Toggle('jQueryDialog63', 'fade', 500);Toggle('jQueryDialog64', 'fade', 500);Toggle('jQueryDialog65', 'fade', 500);Toggle('jQueryDialog66', 'fade', 500);Toggle('jQueryDialog67', 'fade', 500);Toggle('jQueryDialog68', 'fade', 500);Toggle('jQueryDialog69', 'fade', 500);Toggle('jQueryDialog70', 'fade', 500);Toggle('jQueryDialog71', 'fade', 500);Toggle('jQueryDialog72', 'fade', 500);Toggle('jQueryDialog73', 'fade', 500);Toggle('jQueryDialog74', 'fade', 500);Toggle('jQueryDialog75', 'fade', 500);Toggle('jQueryDialog76', 'fade', 500);Toggle('jQueryDialog77', 'fade', 500);Toggle('jQueryDialog78', 'fade', 500);Toggle('jQueryDialog79', 'fade', 500);Toggle('jQueryDialog80', 'fade', 500);Toggle('jQueryDialog81', 'fade', 500);Toggle('jQueryDialog82', 'fade', 500);Toggle('jQueryDialog83', 'fade', 500);Toggle('jQueryDialog84', 'fade', 500);Toggle('jQueryDialog85', 'fade', 500);Toggle('jQueryDialog86', 'fade', 500);Toggle('jQueryDialog87', 'fade', 500);Toggle('jQueryDialog88', 'fade', 500);Toggle('jQueryDialog89', 'fade', 500);Toggle('jQueryDialog90', 'fade', 500);Toggle('jQueryDialog91', 'fade', 500);$('#jQueryDialog1').dialog('close');return false;"><div id="MaterialIcon62"><i class="material-icons">&#xe882;</i></div></a>
</div>
</div>
<div class="col-2">
<div id="wb_MaterialIcon34" style="display:inline-block;width:48px;height:36px;text-align:center;z-index:21;">
<a href="#" onclick="ShowObject('Layer4', 1);return false;" onmouseenter="ShowObject('Layer4', 1);return false;"><div id="MaterialIcon34"><i class="material-icons">&#xe1b1;</i></div></a>
</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid1" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid1">
<div class="row">
<div class="col-1">
<div id="wb_Image2" style="display:inline-block;width:90px;height:105px;z-index:22;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');AnimateCss('wb_Image2', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer15();ShowObject('Layer12', 0);return false;" onmouseenter="TimerStartTimer15();return false;" onmouseleave="ShowObject('Layer12', 0);TimerStopTimer15();return false;"><img src="images/placeholder.gif" data-src="images/21748-bubka-Explorer2.png" data-src-retina="images/21748-bubka-Explorer2.png" id="Image2" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image36" style="display:inline-block;width:90px;height:105px;z-index:23;">
<a href="#" onclick="$('#jQueryDialog41').dialog('open');AnimateCss('wb_Image36', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer17', 0);TimerStopTimer30();return false;" onmouseenter="TimerStartTimer30();return false;" onmouseleave="ShowObject('Layer17', 0);TimerStopTimer30();return false;"><img src="images/placeholder.gif" data-src="images/30885-Sparky783-MicrosoftSecurityEssentials.png" data-src-retina="images/30885-Sparky783-MicrosoftSecurityEssentials.png" id="Image36" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image59" style="display:inline-block;width:90px;height:105px;z-index:24;">
<a href="#" onclick="$('#jQueryDialog90').dialog('open');AnimateCss('wb_Image59', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/icone_bureautique_4sync.png" data-src-retina="images/icone_bureautique_4sync.png" id="Image59" alt=""></a>
</div>
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
<div id="wb_LayoutGrid6" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<div id="wb_Image13" style="display:inline-block;width:82px;height:96px;z-index:25;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');AnimateCss('wb_Image13', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer18();ShowObject('Layer13', 0);return false;" onmouseenter="TimerStartTimer18();return false;" onmouseleave="TimerStopTimer18();ShowObject('Layer13', 0);return false;"><img src="images/placeholder.gif" data-src="images/20834-bubka-windowsexplorer.png" data-src-retina="images/20834-bubka-windowsexplorer.png" id="Image13" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image19" style="display:inline-block;width:87px;height:101px;z-index:26;">
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
<div id="wb_LayoutGrid5" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid5">
<div class="row">
<div class="col-1">
<div id="wb_Image38" style="display:inline-block;width:85px;height:99px;z-index:27;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');AnimateCss('wb_Image38', 'transform-3d-flip-in-x', 0, 1200);ShowObject('Layer14', 0);TimerStopTimer21();return false;" onmouseenter="TimerStartTimer21();return false;" onmouseleave="ShowObject('Layer14', 0);TimerStopTimer21();return false;"><img src="images/placeholder.gif" data-src="images/startpage.png" data-src-retina="images/startpage.png" id="Image38" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image35" style="display:inline-block;width:86px;height:100px;z-index:28;">
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
<div id="wb_LayoutGrid4" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid4">
<div class="row">
<div class="col-1">
<div id="wb_Image33" style="display:inline-block;width:87px;height:101px;z-index:29;">
<a href="#" onclick="$('#jQueryDialog16').dialog('open');AnimateCss('wb_Image33', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer24();ShowObject('Layer15', 0);return false;" onmouseenter="TimerStartTimer24();return false;" onmouseleave="TimerStopTimer24();ShowObject('Layer15', 0);return false;"><img src="images/placeholder.gif" data-src="images/20698-bubka-Maps.png" data-src-retina="images/20698-bubka-Maps.png" id="Image33" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image58" style="display:inline-block;width:90px;height:105px;z-index:30;">
<a href="#" onclick="$('#jQueryDialog48').dialog('open');AnimateCss('wb_Image58', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/hebergeur-icone-img.png" data-src-retina="images/hebergeur-icone-img.png" id="Image58" alt=""></a>
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
<div id="wb_LayoutGrid3" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid3">
<div class="row">
<div class="col-1">
<div id="wb_Image34" style="display:inline-block;width:85px;height:99px;z-index:31;">
<a href="#" onclick="$('#jQueryDialog13').dialog('open');AnimateCss('wb_Image34', 'transform-3d-flip-in-x', 0, 1200);TimerStopTimer27();ShowObject('Layer16', 0);return false;" onmouseenter="TimerStartTimer27();return false;" onmouseleave="TimerStopTimer27();ShowObject('Layer16', 0);return false;"><img src="images/placeholder.gif" data-src="images/22381-bubka-Mail.png" data-src-retina="images/22381-bubka-Mail.png" id="Image34" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image37" style="display:inline-block;width:90px;height:105px;z-index:32;">
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
<div id="Layer3" style="position:fixed;text-align:center;left:0;top:0;right:0;bottom:0;z-index:683;" onclick="ShowObject('Layer3', 0);return false;">
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

<div id="Layer6" style="position:absolute;text-align:left;left:247px;top:88px;width:527px;height:371px;z-index:317;">
</div>
<div id="Layer35" style="position:absolute;text-align:left;left:142px;top:518px;width:761px;height:136px;z-index:318;">
<div id="wb_Text40" style="position:absolute;left:48px;top:30px;width:664px;height:67px;text-align:center;z-index:314;">
<span style="color:#000000;font-family:Arial;font-size:19px;">Votre session est à présent en attente de reprise...<br></span><span style="color:#000000;font-family:Arial;font-size:12px;"><em><u>Cliquez n'importe où pour reprendre votre session<br></u><br>Attention&nbsp;: vous serez déconnecté dans 24 heures.</em></span></div>
</div>
</div>
</div>
<div id="Layer4" style="position:fixed;text-align:right;right:0;top:0;bottom:0;width:118px;z-index:684;" onmouseleave="ShowObject('Layer4', 0);return false;">
<div id="Layer4_Container" style="width:3000px;position:relative;margin-left:auto;margin-right:0;text-align:left;">
<div id="wb_FontAwesomeIcon21" style="position:absolute;left:25px;top:16px;width:78px;height:63px;text-align:center;z-index:348;">
<a href="#" onclick="$('#jQueryDialog70').dialog('open');return false;"><div id="FontAwesomeIcon21"><i class="fa fa-camera">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon22" style="position:absolute;left:25px;top:118px;width:78px;height:68px;text-align:center;z-index:349;">
<a href="#" onclick="$('#jQueryDialog72').dialog('open');return false;"><div id="FontAwesomeIcon22"><i class="fa fa-euro">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon24" style="position:absolute;left:25px;top:325px;width:78px;height:70px;text-align:center;z-index:350;">
<a href="#" onclick="$('#jQueryDialog3').dialog('close');$('#jQueryDialog5').dialog('close');$('#jQueryDialog11').dialog('close');ShowObject('Layer7', 1);return false;"><div id="FontAwesomeIcon24"><i class="fa fa-codepen">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon25" style="position:absolute;left:25px;top:435px;width:78px;height:64px;text-align:center;z-index:351;">
<a href="#" onclick="$('#jQueryDialog73').dialog('open');return false;"><div id="FontAwesomeIcon25"><i class="fa fa-save">&nbsp;</i></div></a></div>
<div id="wb_FontAwesomeIcon23" style="position:absolute;left:25px;top:227px;width:78px;height:61px;text-align:center;z-index:352;">
<a href="#" onclick="$('#jQueryDialog71').dialog('open');return false;"><div id="FontAwesomeIcon23"><i class="fa fa-calendar">&nbsp;</i></div></a></div>
</div>
</div>
<div id="Layer7" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:685;">
<div id="Layer8" style="position:absolute;text-align:left;left:150px;top:82px;width:855px;height:460px;z-index:360;">
<div id="Layer9" style="position:absolute;text-align:left;left:16px;top:11px;width:218px;height:436px;z-index:357;" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:236px;top:11px;width:211px;height:436px;z-index:358;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:453px;top:11px;width:373px;height:436px;z-index:359;" onclick="$('#jQueryDialog11').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
</div>
<script>
var wb_Timer9;
function TimerStartTimer9()
{
   wb_Timer9 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer7', 0);
   }, 130);
}
function TimerStopTimer9()
{
   clearTimeout(wb_Timer9);
}
TimerStartTimer9();
</script>

</div>
<div id="Layer12" style="position:absolute;text-align:left;left:1339px;top:13549px;width:473px;height:591px;z-index:686;">
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
<div id="Layer13" style="position:absolute;text-align:left;left:1842px;top:13549px;width:473px;height:591px;z-index:687;">
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
<div id="Layer14" style="position:absolute;text-align:left;left:2388px;top:13549px;width:473px;height:591px;z-index:688;">
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
<div id="Layer15" style="position:absolute;text-align:left;left:1339px;top:14166px;width:473px;height:591px;z-index:689;">
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
<div id="Layer16" style="position:absolute;text-align:left;left:1842px;top:14166px;width:473px;height:591px;z-index:690;">
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
<div id="Layer17" style="position:absolute;text-align:left;left:2371px;top:14150px;width:473px;height:591px;z-index:691;">
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
<div id="Layer18" style="position:absolute;text-align:left;left:1328px;top:14775px;width:473px;height:591px;z-index:692;">
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
<div id="Layer19" style="position:absolute;text-align:left;left:1867px;top:14775px;width:473px;height:591px;z-index:693;">
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
<div id="Layer20" style="position:absolute;text-align:left;left:2432px;top:14775px;width:473px;height:591px;z-index:694;">
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
<div id="Layer22" style="position:absolute;text-align:left;left:348px;top:5969px;width:1099px;height:152px;z-index:695;" onmouseleave="ShowObject('Layer22', 0);return false;">
<div id="wb_Image43" style="position:absolute;left:89px;top:39px;width:915px;height:100px;z-index:406;">
<img src="images/coque_sfx_3D.png" id="Image43" alt=""></div>
<div id="wb_Image51" style="position:absolute;left:732px;top:30px;width:80px;height:80px;z-index:407;">
<a href="#" onclick="$('#jQueryDialog76').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image51', 'transform-wiggle', 0, 500);return false;"><img src="images/nowcoworking.png" id="Image51" alt=""></a></div>
<div id="wb_Image46" style="position:absolute;left:508px;top:17px;width:110px;height:110px;z-index:408;">
<a href="#" onclick="$('#jQueryDialog68').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image46', 'transform-wiggle', 0, 500);return false;"><img src="images/OCR.png" id="Image46" alt=""></a></div>
<div id="wb_Image47" style="position:absolute;left:386px;top:17px;width:110px;height:110px;z-index:409;">
<a href="#" onclick="$('#jQueryDialog55').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image47', 'transform-wiggle', 0, 500);return false;"><img src="images/sz.png" id="Image47" alt=""></a></div>
<div id="wb_Image48" style="position:absolute;left:272px;top:17px;width:110px;height:110px;z-index:410;">
<a href="#" onclick="$('#jQueryDialog31').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image48', 'transform-wiggle', 0, 500);return false;"><img src="images/lemonde.png" id="Image48" alt=""></a></div>
<div id="wb_Image49" style="position:absolute;left:153px;top:17px;width:110px;height:110px;z-index:411;">
<a href="#" onclick="$('#jQueryDialog9').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image49', 'transform-wiggle', 0, 500);return false;"><img src="images/wikipedia.png" id="Image49" alt=""></a></div>
<div id="wb_Image50" style="position:absolute;left:626px;top:30px;width:80px;height:80px;z-index:412;">
<a href="#" onclick="$('#jQueryDialog75').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image50', 'transform-wiggle', 0, 500);return false;"><img src="images/dessinscreen.png" id="Image50" alt=""></a></div>
<div id="wb_Image52" style="position:absolute;left:838px;top:30px;width:80px;height:80px;z-index:413;">
<a href="#" onclick="$('#jQueryDialog62').dialog('open');return false;" onmouseenter="AnimateCss('wb_Image52', 'transform-wiggle', 0, 500);return false;"><img src="images/fargo.png" id="Image52" alt=""></a></div>
</div>
<div id="Layer23" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:696;" onclick="ShowObject('Layer23', 0);return false;">
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
<div id="Layer24" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:697;">
<div id="Layer2" style="position:absolute;text-align:left;left:198px;top:25px;width:511px;height:363px;z-index:424;">
</div>
<div id="Layer25" style="position:absolute;text-align:left;left:50px;top:432px;width:801px;height:74px;z-index:425;">
<div id="wb_Text5" style="position:absolute;left:29px;top:14px;width:739px;height:39px;text-align:center;z-index:423;">
<span style="color:#FFFFFF;font-family:Arial;font-size:20px;"><strong>Nous préparons votre session... Patientez quelques instants, merci<br></strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong><em>Merci de vérifier que les bordures de votre écran soient visibles</em></strong></span></div>
</div>
<div id="Layer31" style="position:fixed;text-align:left;left:0px;top:0px;width:46px;height:41px;z-index:426;">
</div>
<div id="Layer32" style="position:fixed;text-align:left;left:auto;right:0px;top:0px;width:46px;height:41px;z-index:427;">
</div>
<div id="Layer33" style="position:fixed;text-align:left;left:auto;right:0px;top:auto;bottom:0px;width:46px;height:41px;z-index:428;">
</div>
<div id="Layer34" style="position:fixed;text-align:left;left:0px;top:auto;bottom:0px;width:46px;height:41px;z-index:429;">
</div>
</div>
<div id="Layer26" style="position:absolute;text-align:left;left:2533px;top:721px;width:182px;height:214px;z-index:698;">
<div id="wb_Text17" style="position:absolute;left:8px;top:8px;width:163px;height:15px;z-index:431;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong><em>Fonctions bureautique&nbsp;&nbsp; &nbsp;&nbsp; </em></strong></span><span style="color:#FF0000;font-family:Arial;font-size:12px;"><strong><a href="#" onclick="ShowObject('Layer26', 0);return false;">X</a></strong></span></div>
<hr id="Line2" style="position:absolute;left:7px;top:35px;width:164px;z-index:432;">
<div id="wb_Text22" style="position:absolute;left:8px;top:59px;width:163px;height:16px;z-index:433;cursor: pointer;" onclick="$('#jQueryDialog89').dialog('open');$('#jQueryDialog37').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Changer fond écran</span></div>
<div id="wb_Text48" style="position:absolute;left:7px;top:88px;width:163px;height:16px;z-index:434;cursor: pointer;" onclick="ShowObject('Layer22', 1);ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Afficher la BottomBar</span></div>
<div id="wb_Text51" style="position:absolute;left:7px;top:116px;width:163px;height:16px;z-index:435;cursor: pointer;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Ouvrir l'explorateur</span></div>
<hr id="Line3" style="position:absolute;left:9px;top:143px;width:164px;z-index:436;">
<div id="wb_Text66" style="position:absolute;left:8px;top:167px;width:163px;height:16px;z-index:437;cursor: pointer;" onclick="$('#jQueryDialog17').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFA500;font-family:Arial;font-size:13px;">Réparer la session</span></div>
</div>
<div id="Layer27" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:699;">
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

<div id="Layer29" style="position:absolute;text-align:left;left:135px;top:423px;width:706px;height:104px;z-index:441;">
<div id="wb_Text70" style="position:absolute;left:24px;top:28px;width:659px;height:46px;text-align:center;z-index:438;">
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
   }, 6000);
}
function TimerStopTimer46()
{
   clearTimeout(wb_Timer46);
}
</script>

<div id="Layer28" style="position:absolute;text-align:left;left:232px;top:49px;width:529px;height:374px;z-index:443;">
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