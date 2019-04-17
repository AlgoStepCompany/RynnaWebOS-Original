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
<link href="rynnawebosV3/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="session.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script src="transition.min.js"></script>
<script src="collapse.min.js"></script>
<script src="jquery.ui.datepicker-fr.js"></script>
<script src="wb.lazyload.min.js"></script>
<script src="wb.rotate.min.js"></script>
<script>
function ValidatejQueryDialog32()
{
   var regexp;
   var Editbox1 = document.getElementById('Editbox1');
   if (!(Editbox1.disabled || Editbox1.style.display === 'none' || Editbox1.style.visibility === 'hidden'))
   {
      regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
      if (Editbox1.value.length != 0 && !regexp.test(Editbox1.value))
      {
         alert("Please enter only letter, digit and whitespace characters in the \"Editbox1\" field.");
         Editbox1.focus();
         return false;
      }
   }
   return true;
}
</script>
<script src="wb.fileuploader.min.js"></script>
<script src="searchindex.js"></script>
<script src="wb.sitesearch.min.js"></script>
<script>
var features = '';
function searchPage(features)
{
   $('#SiteSearch2-dialog').dialog('open');
   $('#SiteSearch2-dialog').empty();
   searchResults('SiteSearch2', 'SiteSearch2-dialog', 250, 0, false, true, false, false, '_parent', 'Aucun resultat', 'Resultats : ', 'seconds');
   $('#SiteSearch2-dialog').dialog('option', 'position', 'center');
   return false;
}
</script>
<script src="wwb14.min.js"></script>
<script>
$(document).ready(function()
{
   $("#wb_Image61").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir Youtube au format Pop-Up</span>",
      items: '#wb_Image61',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip11' }
   });
   $("#wb_Image59").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F301;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir le Cloud</span>",
      items: '#wb_Image59',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip25' }
   });
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 1});
   $("#jQueryDialog3").dialog(
   {
      title: 'Applications installées (Internes)',
      width: 692,
      height: 522,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog3'} 
   });
   $("#jQueryDialog4").dialog(
   {
      title: 'Calculatrice (system/program/calculatrice)',
      width: 387,
      height: 489,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog4'} 
   });
   $("#jQueryDialog5").dialog(
   {
      title: 'Explorateur de fichiers - Votre espace personnel (50 Go maximum)',
      width: 992,
      height: 599,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog5'} 
   });
   $("#jQueryDialog8").dialog(
   {
      title: 'Navigateur Internet [NON COMPATIBLE EN HTTPS]',
      width: 1071,
      height: 633,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog8'} 
   });
   $("#jQueryDialog23").dialog(
   {
      title: 'Jeu de Hasard (system/program/dee)',
      width: 881,
      height: 598,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog23'} 
   });
   $("#wb_FontAwesomeIcon15").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Clic : Ouvrir Menu Principal<br>Double-Clic : Fermer Menu Principal</span>",
      items: '#wb_FontAwesomeIcon15',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip1' }
   });
   $("#wb_FontAwesomeIcon16").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le Cloud</span>",
      items: '#wb_FontAwesomeIcon16',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip3' }
   });
   $("#wb_MaterialIcon22").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le Chat de Rynna WebOS</span>",
      items: '#wb_MaterialIcon22',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip5' }
   });
   $("#wb_MaterialIcon24").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Réduire la visibilité des objets du bureau</span>",
      items: '#wb_MaterialIcon24',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip6' }
   });
   $("#jQueryDialog20").dialog(
   {
      title: 'Départ RER SNCF par ville (system/program/sncfappli) [NON COMPATIBLE EN HTTPS]',
      width: 913,
      height: 544,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog20'} 
   });
   $("#jQueryDialog12").dialog(
   {
      title: 'Applications virtualisées',
      width: 826,
      height: 409,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog12'} 
   });
   $("#jQueryAccordion1 .panel").on('show.bs.collapse', function()
   {
      $(this).addClass('active');
   });
   $("#jQueryAccordion1 .panel").on('hide.bs.collapse', function()
   {
      $(this).removeClass('active');
   });
   $("#jQueryDialog27").dialog(
   {
      title: 'Docteur Flashy - Analyse de votre ordinateur',
      width: 736,
      height: 537,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog27'} 
   });
   $("#jQueryDialog10").dialog(
   {
      title: 'TChat WebOS (Publique)',
      width: 932,
      height: 579,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog10'} 
   });
   $("#jQueryDialog36").dialog(
   {
      title: 'Configuration clavier',
      width: 581,
      height: 231,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog36'} 
   });
   $("#jQueryDialog37").dialog(
   {
      title: 'Configuration de votre interface personnelle',
      width: 720,
      height: 619,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog37'} 
   });
   $("#jQueryDialog38").dialog(
   {
      title: 'Calendrier détaillé',
      width: 745,
      height: 570,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog38'} 
   });
   $("#jQueryDialog25").dialog(
   {
      title: 'Calculateur Euro (system/program/eurocalc)',
      width: 842,
      height: 568,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog25'} 
   });
   $("#jQueryDialog24").dialog(
   {
      title: 'Horloge interactive (system/program/horloge)',
      width: 858,
      height: 637,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog24'} 
   });
   $("#jQueryDialog34").dialog(
   {
      title: 'Affichage de votre adresse IP [Service non fonctionnel en HTTPS]',
      width: 493,
      height: 221,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog34'} 
   });
   $("#jQueryDialog39").dialog(
   {
      title: 'Verification de la protection',
      width: 723,
      height: 218,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog39'} 
   });
   $("#jQueryDialog40").dialog(
   {
      title: 'Editeur 3D Tridiv CSS 3 [NON COMPATIBLE EN HTTPS]',
      width: 934,
      height: 542,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog40'} 
   });
   $("#jQueryDialog35").dialog(
   {
      title: 'Supprimer votre compte',
      width: 423,
      height: 260,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog35'} 
   });
   $("#jQueryDialog44").dialog(
   {
      title: 'HITEK - Les meilleurs actualités des nouvelles technologies',
      width: 1037,
      height: 600,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog44'} 
   });
   $("#jQueryDialog46").dialog(
   {
      title: 'Explorateur e-book PDF disponibles (commun)',
      width: 890,
      height: 600,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog46'} 
   });
   $("#jQueryDialog47").dialog(
   {
      title: 'Bibliothèque gratuite en ligne (e-book)',
      width: 979,
      height: 600,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog47'} 
   });
   $("#jQueryDialog48").dialog(
   {
      title: 'Hebergeur Images en ligne (serveur)',
      width: 802,
      height: 600,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog48'} 
   });
   $("#wb_MaterialIcon25").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Imprimer votre écran actuel</span>",
      items: '#wb_MaterialIcon25',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip7' }
   });
   $("#jQueryDialog49").dialog(
   {
      title: 'Fitness (Studio) avec géolocalisation',
      width: 966,
      height: 565,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog49'} 
   });
   $("#wb_MaterialIcon27").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Ouvrir le gestionnaire de tâches avancés</span>",
      items: '#wb_MaterialIcon27',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip8' }
   });
   $("#jQueryDialog50").dialog(
   {
      title: 'Gestionnaire de tâches avancés',
      modal: true,
      width: 638,
      height: 547,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'highlight', duration: 400 },
      hide: { effect: 'highlight', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog50'} 
   });
   $("#jQueryTabs4").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#wb_MaterialIcon30").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Clic : Ouvrir les Widgets<br>Double-Clic : Fermer les Widgets</span>",
      items: '#wb_MaterialIcon30',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip4' }
   });
   $("#jQueryDialog53").dialog(
   {
      title: '[WIDGET] Notes',
      width: 277,
      height: 248,
      position: { my: 'left top', at: 'right top+95', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog53'} 
   });
   $("#jQueryDialog15").dialog(
   {
      title: '[WIDGET] Calendrier',
      width: 277,
      height: 232,
      position: { my: 'left top', at: 'right top+46', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog15'} 
   });
   $("#jQueryDatePicker1").datepicker(
   {
      dateFormat: 'dd/mm/yy',
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      showAnim: 'fadeIn'
   });
   $("#jQueryDatePicker1").datepicker("option", $.datepicker.regional['fr']);
   $("#wb_MaterialIcon2").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Basculer sur les Applications Virtualisées</span>",
      items: '#wb_MaterialIcon2',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip9' }
   });
   $("#jQueryDialog30").dialog(
   {
      title: 'Concepteur d application Web (alpha 0.3)',
      width: 494,
      height: 193,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog30'} 
   });
   $("#jQueryDialog22").dialog(
   {
      title: 'Concepteur d applications Web (version PHP)',
      width: 685,
      height: 487,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog22'} 
   });
   $("#jQueryDialog54").dialog(
   {
      title: 'Applis Web Communautaires',
      width: 915,
      height: 568,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog54'} 
   });
   $("#jQueryDialog51").dialog(
   {
      title: 'Forum Veler Software (développement Rynna WebOS et divers projets)',
      width: 897,
      height: 548,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog51'} 
   });
   $("#jQueryDialog56").dialog(
   {
      title: 'Ipiccy - Retouches photos en ligne',
      width: 902,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog56'} 
   });
   $("#jQueryDialog57").dialog(
   {
      title: 'Le Bon Coin - Ventes et achats en ligne en France',
      width: 970,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog57'} 
   });
   $("#jQueryDialog58").dialog(
   {
      title: 'Orange TV - toutes vos chaines en ligne (stream)',
      width: 902,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog58'} 
   });
   $("#jQueryDialog59").dialog(
   {
      title: 'PrintFriendly - Votre page web au format PDF imprimable',
      width: 902,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog59'} 
   });
   $("#jQueryDialog60").dialog(
   {
      title: '01net - Blog, actualités et logiciels informatiques et nouvelle technologie [NON COMPATIBLE EN HTTPS]',
      width: 970,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog60'} 
   });
   $("#jQueryDialog61").dialog(
   {
      title: 'CDiscount [NON COMPATIBLE EN HTTPS]',
      width: 902,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog61'} 
   });
   $("#jQueryTabs1").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#jQueryDialog18").dialog(
   {
      title: 'Modifier votre session ?',
      modal: true,
      width: 403,
      height: 176,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: { effect: 'highlight', duration: 400 },
      hide: { effect: 'highlight', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog18'} 
   });
   $("#jQueryDialog2").dialog(
   {
      title: 'Gestion des erreurs (Kernel PHP)',
      width: 456,
      height: 503,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog2'} 
   });
   $("#jQueryDialog26").dialog(
   {
      title: 'Maintenance',
      width: 456,
      height: 254,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog26'} 
   });
   $("#jQueryDialog64").dialog(
   {
      title: 'Simulateur Smartphone (0.5)',
      width: 357,
      height: 175,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog64'} 
   });
   $("#jQueryDialog65").dialog(
   {
      title: 'Simulateur iPhone XS Max (test de sites Web et WebApps)',
      width: 622,
      height: 726,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog65'} 
   });
   $("#jQueryDialog66").dialog(
   {
      title: 'Simulateur Samsung Galaxy s10+ (test de sites Web et WebApps)',
      width: 622,
      height: 726,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog66'} 
   });
   $("#jQueryDialog67").dialog(
   {
      title: 'Envoi rapide',
      width: 899,
      height: 349,
      position: { my: 'left top', at: 'right bottom', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog67'} 
   });
$('#wb_Extension1').FileUploader({ headings: ['Nom', 'Taille', 'Vider la liste'], script: 'fileuploader.php' });
   $("#jQueryDialog13").dialog(
   {
      title: 'Messagerie personelle Européenne (Net Courriel)',
      width: 1090,
      height: 625,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog13'} 
   });
   $("#wb_MaterialIcon19").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Mettre la session en attente</span>",
      items: '#wb_MaterialIcon19',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip10' }
   });
   $("#jQueryDialog69").dialog(
   {
      title: '[WIDGET] Horloge',
      width: 288,
      height: 287,
      position: { my: 'left top', at: 'right top+125', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog69'} 
   });
   $("#jQueryDialog70").dialog(
   {
      title: 'Webcam',
      width: 564,
      height: 407,
      position: { my: 'center top', at: 'center top', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog70'} 
   });
   $("#jQueryDialog71").dialog(
   {
      title: 'Calendrier général',
      width: 790,
      height: 538,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog71'} 
   });
   $("#jQueryDialog72").dialog(
   {
      title: 'Devises',
      width: 918,
      height: 527,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog72'} 
   });
   $("#jQueryDialog73").dialog(
   {
      title: 'Sauvegarde local de votre session',
      width: 287,
      height: 273,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog73'} 
   });
   $("#Layer8").stickylayer({orientation: 9, position: [0, 0], delay: 1});
   $("#jQueryDialog32").dialog(
   {
      title: 'Informations sur le WebOS',
      width: 768,
      height: 624,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog32'} 
   });
   $("#jQueryDialog9").dialog(
   {
      title: 'Wikipédia',
      width: 1008,
      height: 547,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog9'} 
   });
   $("#jQueryDialog31").dialog(
   {
      title: 'Le Monde - Actualités de France',
      width: 1003,
      height: 568,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog31'} 
   });
   $("#jQueryDialog55").dialog(
   {
      title: 'Forum Etienne BAUDOUX - Forum lié au projet Rynna WebOS',
      width: 918,
      height: 578,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog55'} 
   });
   $("#jQueryDialog68").dialog(
   {
      title: 'OpenClassRoom - Tutoriels et cours en ligne',
      width: 1008,
      height: 556,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog68'} 
   });
   $("#jQueryDialog75").dialog(
   {
      title: 'SUMO PAINT - Dessin (demonstration gratuite)',
      width: 934,
      height: 577,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog75'} 
   });
   $("#jQueryDialog76").dialog(
   {
      title: 'Now-Coworking - Espace Coworking pour votre Entreprise',
      width: 919,
      height: 567,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog76'} 
   });
   $("#jQueryDialog62").dialog(
   {
      title: 'Notes dropbox - FARGO (gratuit)',
      width: 1020,
      height: 568,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog62'} 
   });
   $("#jQueryDialog17").dialog(
   {
      title: 'Réparation de la session',
      modal: true,
      width: 486,
      height: 362,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog17'} 
   });
   $("#jQueryDialog63").dialog(
   {
      title: 'Procédure de réparation',
      modal: true,
      width: 502,
      height: 195,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: { effect: 'highlight', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog63'} 
   });
   $("#jQueryDialog77").dialog(
   {
      title: 'Testeur et Afficheur (screen test quality)',
      width: 1133,
      height: 627,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog77'} 
   });
   $("#jQueryDialog78").dialog(
   {
      title: 'Sticky-Notes Generator (WebesTools)',
      width: 990,
      height: 574,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog78'} 
   });
   $("#jQueryTabs2").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#jQueryTabs3").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#jQueryDialog79").dialog(
   {
      title: '[MACOSX-VIRTUALISATION]',
      width: 368,
      height: 349,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog79'} 
   });
   $("#jQueryDialog80").dialog(
   {
      title: '[MACOSX-VIRTUALISATION]',
      width: 368,
      height: 349,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog80'} 
   });
   $("#jQueryDialog81").dialog(
   {
      title: '[MACOSX-VIRTUALISATION]',
      width: 711,
      height: 537,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog81'} 
   });
   $("#jQueryDialog82").dialog(
   {
      title: '[LINUX-VIRTUALISATION]',
      width: 513,
      height: 423,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog82'} 
   });
   $("#jQueryDialog83").dialog(
   {
      title: 'Gestionnaire de Serveur',
      width: 519,
      height: 286,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog83'} 
   });
   $("#jQueryDialog84").dialog(
   {
      title: 'Links-Dialog',
      width: 808,
      height: 432,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog84'} 
   });
   $("#jQueryDialog85").dialog(
   {
      title: '[SOUND-HELP-MALENTENDANT]-ConfigurationScriptsDialog',
      width: 672,
      height: 337,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog85'} 
   });
   $("#jQueryDialog86").dialog(
   {
      title: 'Audio-Help',
      width: 294,
      height: 436,
      position: { my: 'left top', at: 'right bottom', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog86'} 
   });
   $("#jQueryDialog87").dialog(
   {
      title: 'Liligo - Voyages Hotel, Voitures, Séjours [NON COMPATIBLE EN HTTPS]',
      width: 924,
      height: 540,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog87'} 
   });
   $("#jQueryDialog45").dialog(
   {
      title: 'Vérification des mises à jour WebOS',
      width: 890,
      height: 426,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog45'} 
   });
   $("#jQueryDialog42").dialog(
   {
      title: '[WIDGET] Bibliothèque',
      width: 276,
      height: 255,
      position: { my: 'left top', at: 'right top+197', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog42'} 
   });
   $("#wb_MaterialIcon62").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Afficher/Cacher les fenêtres ouvertes</span>",
      items: '#wb_MaterialIcon62',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip13' }
   });
   $("#jQueryDialog88").dialog(
   {
      title: 'Annonce générale (Administrateur)',
      width: 407,
      height: 254,
      position: { my: 'left top', at: 'right top+46', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: false,
      hide: { effect: 'fade', duration: 400 },
      autoOpen: true,
      classes: {'ui-dialog': 'jQueryDialog88'} 
   });
   $("#jQueryDialog90").dialog(
   {
      title: 'Cloud gratuit (15Go) - 4Sync',
      width: 1018,
      height: 562,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog90'} 
   });
   $("#jQueryDialog91").dialog(
   {
      title: '[WIDGET] Multi-session',
      width: 324,
      height: 227,
      position: { my: 'left top', at: 'right top+254', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog91'} 
   });
   $("#jQueryDialog92").dialog(
   {
      title: 'Registre des extensions WebOS (Consultation)',
      width: 777,
      height: 565,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog92'} 
   });
   $("#wb_Image2").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F5BF;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir les applications internes et externes<br>installés par défaut</span>",
      items: '#wb_Image2',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip14' }
   });
   $("#wb_Image13").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F4BB;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir l'explorateur de fichiers</span>",
      items: '#wb_Image13',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip16' }
   });
   $("#wb_Image38").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F4BC;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir le navigateur internet</span>",
      items: '#wb_Image38',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip17' }
   });
   $("#wb_Image33").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F4CD;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir Google Maps</span>",
      items: '#wb_Image33',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip18' }
   });
   $("#wb_Image34").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F4E7;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir la messagerie internet</span>",
      items: '#wb_Image34',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip19' }
   });
   $("#wb_Image36").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F3D0;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir les jeux Flash installés</span>",
      items: '#wb_Image36',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip20' }
   });
   $("#wb_Image19").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F3ED;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir les applications conçus<br>par la communautées avec le <br>programme dédié</span>",
      items: '#wb_Image19',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip21' }
   });
   $("#wb_Image35").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F4D5;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir l'éditeur de texte</span>",
      items: '#wb_Image35',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip22' }
   });
   $("#wb_Image58").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F3A8;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir l'hébergeur d'images publiques</span>",
      items: '#wb_Image58',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip23' }
   });
   $("#wb_Image37").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">&#x1F527;</span><span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\"> Ouvrir les paramètres internes</span>",
      items: '#wb_Image37',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip24' }
   });
   $("#jQueryDialog93").dialog(
   {
      title: 'Stellarium - Ciel réaliste en 3D',
      width: 968,
      height: 561,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog93'} 
   });
   $("#jQueryDialog94").dialog(
   {
      title: 'Confirmer la fermeture',
      modal: true,
      width: 384,
      height: 129,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: { effect: 'highlight', duration: 400 },
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog94'} 
   });
   $("#jQueryDialog95").dialog(
   {
      title: 'Confirmer le redémarrage',
      modal: true,
      width: 384,
      height: 169,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: { effect: 'highlight', duration: 400 },
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog95'} 
   });
   $("#jQueryDialog96").dialog(
   {
      title: 'Manuel d utilisateur du WebOS',
      width: 1038,
      height: 596,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog96'} 
   });
   $("#jQueryDialog97").dialog(
   {
      title: 'Manuel en vidéo ?',
      width: 429,
      height: 183,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: false,
      show: { effect: 'highlight', duration: 400 },
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog97'} 
   });
   $("#jQueryDialog98").dialog(
   {
      title: 'Manuel d utilisation du WebOS en vidéo (fixe)',
      modal: true,
      width: 372,
      height: 196,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: true,
      show: false,
      hide: false,
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog98'} 
   });
   $("#wb_MaterialIcon1").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:'MS Shell Dlg';font-size:11px;\">Augmenter la visibilité des objets du bureau</span>",
      items: '#wb_MaterialIcon1',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip2' }
   });
   $("#jQueryDialog29").dialog(
   {
      title: 'AVERTISSEMENT',
      width: 415,
      height: 478,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog29'} 
   });
   $("#wb_Image62").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">Ouvrir Facebook au format Pop-Up</span>",
      items: '#wb_Image62',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip12' }
   });
   $("#wb_Image63").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">Ouvrir Twitter au format Pop-Up</span>",
      items: '#wb_Image63',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip15' }
   });
   $("#jQueryDialog99").dialog(
   {
      title: 'Basculer sur l interface Challenger',
      width: 429,
      height: 148,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'highlight', duration: 400 },
      hide: { effect: 'highlight', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog99'} 
   });
   $("#jQueryTabs5").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#jQueryDialog100").dialog(
   {
      title: 'Paramètres et aides supplémentaires',
      width: 812,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog100'} 
   });
   $("#jQueryDialog101").dialog(
   {
      title: 'Test de votre connexion internet',
      width: 883,
      height: 543,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fold', duration: 400 },
      hide: { effect: 'fold', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog101'} 
   });
   $("#jQueryDialog102").dialog(
   {
      title: 'Editeur de texte (FullPro CK Series 2016)',
      width: 929,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog102'} 
   });
   $("#jQueryDialog103").dialog(
   {
      title: 'WordPad - Editeur de texte avancé',
      width: 896,
      height: 574,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog103'} 
   });
   $("#jQueryDialog104").dialog(
   {
      title: 'Informations sur votre location - Météo temps réel [NON COMPATIBLE EN HTTPS]',
      width: 806,
      height: 540,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog104'} 
   });
   $("#jQueryDialog105").dialog(
   {
      title: 'Rynna Search (Rechercher une page du WebOS)',
      width: 505,
      height: 219,
      position: { my: 'center', at: 'center', of: window },
      buttons:
      [
         {
            text: "Annuler",
            click: function()
            {
               $(this).dialog("close");
            }
         }
      ],
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog105'} 
   });
   searchParseURL('SiteSearch2');
   $("#SiteSearch2-dialog").dialog(
   {
      width: 400,
      height: 300,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'puff', duration: 400 },
      hide: { effect: 'puff', duration: 400 },
      autoOpen: false,
      buttons: 
      {
         Fermer: function() 
         {
            $(this).dialog('close');
         }
      }
   });
   $("#jQueryDialog1").dialog(
   {
      title: 'Gestionnaire de Jeux',
      width: 891,
      height: 583,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog1'} 
   });
   $("#jQueryDialog6").dialog(
   {
      title: 'StreetView',
      width: 889,
      height: 556,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog6'} 
   });
   $("#wb_Image81").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">Ouvrir votre bibliothèque privée<br>d'applications téléchargés</span>",
      items: '#wb_Image81',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip26' }
   });
   $("#wb_Image79").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">Mettre en ligne votre propre<br>Application public (Cloud)</span>",
      items: '#wb_Image79',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip27' }
   });
   $("#wb_Image80").tooltip(
   {
      hide: true,
      show: true,
      content: "<span style=\"color:#000000;font-family:;font-size:11px;\">Ouvrir le Cloud contenant<br>les Applications publics<br>à installer en privé</span>",
      items: '#wb_Image80',
      position: { my: "right bottom", at: "left top", collision: "flipfit" },
      classes: { 'ui-tooltip' : 'jQueryToolTip28' }
   });
   $("#jQueryDialog7").dialog(
   {
      title: 'Assistant hébergement Application Web Public Cloud (Serveur)',
      width: 863,
      height: 539,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'fade', duration: 400 },
      hide: { effect: 'fade', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog7'} 
   });
   $("#jQueryDialog11").dialog(
   {
      title: 'Bibliothèque Publique Applications Web (Cloud)',
      width: 676,
      height: 481,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'jQueryDialog11'} 
   });
   $("#Dialog1").dialog(
   {
      title: 'TEST 42.0 JQUERY LOOD-P(X,Y,Z)',
      width: 330,
      height: 317,
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
      draggable: false,
      closeOnEscape: false,
      show: { effect: 'clip', duration: 400 },
      hide: { effect: 'clip', duration: 400 },
      autoOpen: false,
      classes: {'ui-dialog': 'Dialog1'} 
   });
   $('img[data-src]').lazyload();
});
</script>
<!-- Insert Google Analytics code here -->
</head>
<body>


<div id="Layer21" style="position:fixed;text-align:left;left:0;right:0;bottom:0;height:15px;z-index:652;" onmouseenter="ShowObject('Layer22', 1);AnimateCss('Layer22', 'animate-fade-in', 5, 500);return false;">
</div>
<div id="Layer1" style="position:absolute;text-align:center;left:2202px;top:1387px;width:755px;height:436px;z-index:653;">
<div id="Layer1_Container" style="width:755px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<div id="jQueryTabs1" style="position:absolute;left:0px;top:0px;width:745px;height:426px;z-index:7;">
<ul>
<li><a href="#jquerytabs1-page-0"><span>Informations</span></a></li>
<li><a href="#jquerytabs1-page-1"><span>Utilisation</span></a></li>
</ul>
<div style="height:404px;" id="jquerytabs1-page-0">
<div id="wb_Text7" style="position:absolute;left:18px;top:22px;width:639px;height:19px;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:17px;">Bienvenue sur Rynna WebOS (Razior) !</span></div>
<div id="wb_Text10" style="position:absolute;left:18px;top:54px;width:678px;height:54px;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Rynna WebOS est un système d'exploitation fonctionnant uniquement dans un navigateur internet sur n'importe quel système d'exploitation.<br></span><span style="color:#4169E1;font-family:Arial;font-size:15px;"><strong>Pour ouvrir les options bureautiques ; effectuez un <u>double clique gauche</u> sur le bureau.</strong></span></div>
<div id="wb_Text86" style="position:absolute;left:18px;top:125px;width:689px;height:16px;z-index:2;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ci-dessous retrouvez les dernières mises à jour de votre WebOS. Seul les 6 dernières mises à jours sont indiqués :</span></div>
<div id="Blog1" style="overflow-y:scroll;position:absolute;left:18px;top:151px;width:689px;height:171px;z-index:3;">
<div class="blogitem">
   <span class="blogsubject">Version 50.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">16/04/19<br></div>
   <span style="color:#000000;">- Mise à jour globale version 50.0 RAZIOR<br>
- Nouvelle interface de connexion<br>
- Amélioration du Jquery, suppression des apostrophes dans les titres des Form<br>
- Nouvelle couleur d'ambiance et fond d'écran<br>
- Suppression des applis et fonctions inutiles ou non réussit dans le temps<br>
- Conception ; modification des Form et nouvelles animations<br>
- Nouvelle interface de gestion utilisateur<br>
- Suppression interface Challenger<br>
- Suppression de l'option session démo<br>
- Plusieurs autres améliorations internes...</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 42.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">21/09/18<br></div>
   <span style="color:#000000;">- Rectification des interactions entre les diverses applications intégrées<br>
- Ajustement lors de la création de nouveau compte</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 41.1b (non GIT-HUB)</span>
   <div class="no-thumb"></div>
   <div class="blogdate">06/04/18<br></div>
   <span style="color:#000000;">Cette version de test est disponible publiquement compilé sur ce serveur mais n'est pas stable ni terminée, vous ne la trouverez sur aucun autre serveur (ni en code source GitHub) tant que la version 42.0 n'est pas sortie.<br>
Merci pour votre patience !</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 41.1</span>
   <div class="no-thumb"></div>
   <div class="blogdate">03/04/18<br></div>
   <span style="color:#000000;">- Débogage complet et vidage des anciens outils qui pouvait provoquer des erreurs d'affichages et de gestion de la mémoire PHP<br>
- Suppression des JQueryDialogX anciennes<br>
- Nettoyage animations<br>
- Débogage et rectification des bugs provoqués par les erreurs Jquery et les bugs de lancement de divers applications</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 41.0</span>
   <div class="no-thumb"></div>
   <div class="blogdate">02/04/18<br></div>
   <span style="color:#000000;">- Nouvelles interfaces des Applications Internes<br>
- Nouveau navigateur internet avec Barre d'interaction fonctionnelle pour ouvrir d'autres sites internet HTTP ou HTTPS</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 40.2</span>
   <div class="no-thumb"></div>
   <div class="blogdate">01/04/18<br></div>
   <span style="color:#000000;">- Mise à jour Kernel Jquery 3.3.1<br>
- Ajustement taille du Gestionnaire d'Applications VIrtualisées</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
<div class="blogitem">
   <span class="blogsubject">Version 40.1</span>
   <div class="no-thumb"></div>
   <div class="blogdate">31/03/18<br></div>
   <span style="color:#000000;">- Correction de certains possibles bugs sur la durée suite au passage en version Crimeria<br>
- Ajustement du code (PHP 7 - Série 12.5)</span><br>
   <div class="blogcomments"></div>
</div>
<div class="clearfix visible-col1"></div>
</div>
<input type="button" id="Button12" onclick="ShowObject('Layer1', 0);return false;" name="" value="Cliquez ici pour fermer la fenêtre et commencer à utiliser votre session" style="position:absolute;left:18px;top:336px;width:689px;height:25px;z-index:4;">
</div>
<div style="height:404px;" id="jquerytabs1-page-1">
<div id="wb_Text125" style="position:absolute;left:17px;top:25px;width:694px;height:16px;z-index:5;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Apprenez à utiliser le WebOS (utilisateur normal) :</span></div>
<div id="wb_Shape1" style="position:absolute;left:288px;top:107px;width:169px;height:193px;z-index:6;">
<a href="#" onclick="$('#jQueryDialog96').dialog('open');Animate('Layer1', '5', '5', '', '', '80', 500, '');return false;"><img src="images/img0001.png" id="Shape1" alt="" style="width:169px;height:193px;"></a></div>
</div>
</div>
</div>
</div>
<div id="wb_PageHeader">
<div id="PageHeader">
<div class="col-1">
<div id="wb_FontAwesomeIcon15" style="display:inline-block;width:56px;height:31px;text-align:center;z-index:8;">
<a href="#" onclick="ShowObject('Layer5', 1);TimerStartTimer19();return false;" ondblclick="TimerStartTimer11();return false;"><div id="FontAwesomeIcon15"><i class="fa fa-yelp"></i></div></a>
</div>
<div id="wb_MaterialIcon3" style="display:inline-block;width:34px;height:36px;text-align:center;z-index:9;">
<div id="MaterialIcon3"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon22" style="display:inline-block;width:55px;height:36px;text-align:center;z-index:10;">
<a href="#" onclick="$('#jQueryDialog29').dialog('open');$('#jQueryDialog10').dialog('close');return false;" ondblclick="$('#jQueryDialog29').dialog('close');return false;"><div id="MaterialIcon22"><i class="material-icons">&#xe0b7;</i></div></a>
</div>
<div id="wb_MaterialIcon25" style="display:inline-block;width:45px;height:36px;text-align:center;z-index:11;">
<a href="#" onclick="window.print();TimerStartTimer7();return false;"><div id="MaterialIcon25"><i class="material-icons">&#xe8ad;</i></div></a>
</div>
<div id="wb_MaterialIcon27" style="display:inline-block;width:52px;height:36px;text-align:center;z-index:12;">
<a href="#" onclick="ShowObject('wb_PageHeader', 0);ShowObject('Layer1', 0);TimerStartTimer8();return false;"><div id="MaterialIcon27"><i class="material-icons">&#xe8b2;</i></div></a>
</div>
<div id="wb_MaterialIcon24" style="display:inline-block;width:49px;height:36px;text-align:center;z-index:13;">
<a href="#" onclick="Animate('Layer5', '', '', '', '', '50', 1200, '');Animate('Layer13', '', '', '', '', '50', 1200, '');Animate('wb_PageHeader', '', '', '', '', '70', 1200, '');Animate('Layer12', '', '', '', '', '50', 1200, '');Animate('wb_LayoutGrid1', '', '', '', '', '50', 1200, '');Animate('wb_LayoutGrid3', '', '', '', '', '50', 1200, '');Animate('wb_LayoutGrid4', '', '', '', '', '50', 1200, '');Animate('wb_LayoutGrid5', '', '', '', '', '50', 1200, '');Animate('wb_LayoutGrid6', '', '', '', '', '50', 1200, '');return false;"><div id="MaterialIcon24"><i class="material-icons">&#xe42e;</i></div></a>
</div>
<div id="wb_MaterialIcon1" style="display:inline-block;width:49px;height:36px;text-align:center;z-index:14;">
<a href="#" onclick="Animate('Layer5', '', '', '', '', '90', 1200, '');Animate('Layer13', '', '', '', '', '90', 1200, '');Animate('wb_PageHeader', '', '', '', '', '100', 1200, '');Animate('Layer12', '', '', '', '', '90', 1200, '');Animate('wb_LayoutGrid1', '', '', '', '', '100', 1200, '');Animate('wb_LayoutGrid3', '', '', '', '', '100', 1200, '');Animate('wb_LayoutGrid4', '', '', '', '', '100', 1200, '');Animate('wb_LayoutGrid5', '', '', '', '', '100', 1200, '');Animate('wb_LayoutGrid6', '', '', '', '', '100', 1200, '');return false;"><div id="MaterialIcon1"><i class="material-icons">&#xe436;</i></div></a>
</div>
<div id="wb_MaterialIcon4" style="display:inline-block;width:36px;height:36px;text-align:center;z-index:15;">
<div id="MaterialIcon4"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon30" style="display:inline-block;width:40px;height:36px;text-align:center;z-index:16;">
<a href="#" onclick="ShowObject('Layer13', 1);TimerStartTimer11();return false;" ondblclick="TimerStartTimer19();return false;"><div id="MaterialIcon30"><i class="material-icons">&#xe41d;</i></div></a>
</div>
<div id="wb_MaterialIcon33" style="display:inline-block;width:35px;height:36px;text-align:center;z-index:17;">
<div id="MaterialIcon33"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon19" style="display:inline-block;width:43px;height:36px;text-align:center;z-index:18;">
<a href="#" onclick="ShowObject('Layer5', 0);ShowObject('Layer13', 0);ShowObject('Layer12', 0);ShowObject('Layer3', 1);return false;"><div id="MaterialIcon19"><i class="material-icons">&#xe899;</i></div></a>
</div>
<div id="wb_MaterialIcon38" style="display:inline-block;width:35px;height:36px;text-align:center;z-index:19;">
<div id="MaterialIcon38"><i class="material-icons">&#xe5d4;</i></div>
</div>
<div id="wb_MaterialIcon62" style="display:inline-block;width:50px;height:36px;text-align:center;z-index:20;">
<a href="#" onclick="Toggle('jQueryDialog2', 'fade', 500);Toggle('jQueryDialog3', 'fade', 500);Toggle('jQueryDialog4', 'fade', 500);Toggle('jQueryDialog5', 'fade', 500);Toggle('jQueryDialog6', 'fade', 500);Toggle('jQueryDialog7', 'fade', 500);Toggle('jQueryDialog8', 'fade', 500);Toggle('jQueryDialog9', 'fade', 500);Toggle('jQueryDialog10', 'fade', 500);Toggle('jQueryDialog11', 'fade', 500);Toggle('jQueryDialog12', 'fade', 500);Toggle('jQueryDialog13', 'fade', 500);Toggle('jQueryDialog14', 'fade', 500);Toggle('jQueryDialog15', 'fade', 500);Toggle('jQueryDialog16', 'fade', 500);Toggle('jQueryDialog17', 'fade', 500);Toggle('jQueryDialog18', 'fade', 500);Toggle('jQueryDialog19', 'fade', 500);Toggle('jQueryDialog20', 'fade', 500);Toggle('jQueryDialog21', 'fade', 500);Toggle('jQueryDialog22', 'fade', 500);Toggle('jQueryDialog23', 'fade', 500);Toggle('jQueryDialog24', 'fade', 500);Toggle('jQueryDialog25', 'fade', 500);Toggle('jQueryDialog26', 'fade', 500);Toggle('jQueryDialog27', 'fade', 500);Toggle('jQueryDialog28', 'fade', 500);Toggle('jQueryDialog29', 'fade', 500);Toggle('jQueryDialog30', 'fade', 500);Toggle('jQueryDialog31', 'fade', 500);Toggle('jQueryDialog32', 'fade', 500);Toggle('jQueryDialog33', 'fade', 500);Toggle('jQueryDialog34', 'fade', 500);Toggle('jQueryDialog35', 'fade', 500);Toggle('jQueryDialog36', 'fade', 500);Toggle('jQueryDialog37', 'fade', 500);Toggle('jQueryDialog38', 'fade', 500);Toggle('jQueryDialog39', 'fade', 500);Toggle('jQueryDialog40', 'fade', 500);Toggle('jQueryDialog41', 'fade', 500);Toggle('jQueryDialog42', 'fade', 500);Toggle('jQueryDialog43', 'fade', 500);Toggle('jQueryDialog44', 'fade', 500);Toggle('jQueryDialog45', 'fade', 500);Toggle('jQueryDialog46', 'fade', 500);Toggle('jQueryDialog47', 'fade', 500);Toggle('jQueryDialog48', 'fade', 500);Toggle('jQueryDialog49', 'fade', 500);Toggle('jQueryDialog50', 'fade', 500);Toggle('jQueryDialog51', 'fade', 500);Toggle('jQueryDialog52', 'fade', 500);Toggle('jQueryDialog53', 'fade', 500);Toggle('jQueryDialog54', 'fade', 500);Toggle('jQueryDialog55', 'fade', 500);Toggle('jQueryDialog56', 'fade', 500);Toggle('jQueryDialog57', 'fade', 500);Toggle('jQueryDialog58', 'fade', 500);Toggle('jQueryDialog59', 'fade', 500);Toggle('jQueryDialog60', 'fade', 500);Toggle('jQueryDialog61', 'fade', 500);Toggle('jQueryDialog62', 'fade', 500);Toggle('jQueryDialog63', 'fade', 500);Toggle('jQueryDialog64', 'fade', 500);Toggle('jQueryDialog65', 'fade', 500);Toggle('jQueryDialog66', 'fade', 500);Toggle('jQueryDialog67', 'fade', 500);Toggle('jQueryDialog68', 'fade', 500);Toggle('jQueryDialog69', 'fade', 500);Toggle('jQueryDialog70', 'fade', 500);Toggle('jQueryDialog71', 'fade', 500);Toggle('jQueryDialog72', 'fade', 500);Toggle('jQueryDialog73', 'fade', 500);Toggle('jQueryDialog74', 'fade', 500);Toggle('jQueryDialog75', 'fade', 500);Toggle('jQueryDialog76', 'fade', 500);Toggle('jQueryDialog77', 'fade', 500);Toggle('jQueryDialog78', 'fade', 500);Toggle('jQueryDialog79', 'fade', 500);Toggle('jQueryDialog80', 'fade', 500);Toggle('jQueryDialog81', 'fade', 500);Toggle('jQueryDialog82', 'fade', 500);Toggle('jQueryDialog83', 'fade', 500);Toggle('jQueryDialog84', 'fade', 500);Toggle('jQueryDialog85', 'fade', 500);Toggle('jQueryDialog86', 'fade', 500);Toggle('jQueryDialog87', 'fade', 500);Toggle('jQueryDialog88', 'fade', 500);Toggle('jQueryDialog89', 'fade', 500);Toggle('jQueryDialog90', 'fade', 500);Toggle('jQueryDialog91', 'fade', 500);Toggle('jQueryDialog92', 'fade', 500);Toggle('jQueryDialog93', 'fade', 500);Toggle('jQueryDialog96', 'fade', 500);Toggle('jQueryDialog97', 'fade', 500);Toggle('jQueryDialog98', 'fade', 500);Toggle('jQueryDialog99', 'fade', 500);Toggle('jQueryDialog100', 'fade', 500);Toggle('jQueryDialog101', 'fade', 500);Toggle('jQueryDialog102', 'fade', 500);Toggle('jQueryDialog103', 'fade', 500);Toggle('jQueryDialog104', 'fade', 500);Toggle('jQueryDialog105', 'fade', 500);return false;"><div id="MaterialIcon62"><i class="material-icons">&#xe882;</i></div></a>
</div>
</div>
<div class="col-2">
<div id="wb_MaterialIcon34" style="display:inline-block;width:48px;height:36px;text-align:center;z-index:21;">
<a href="#" onclick="ShowObject('Layer4', 1);return false;" onmouseenter="ShowObject('Layer4', 1);return false;"><div id="MaterialIcon34"><i class="material-icons">&#xe1b1;</i></div></a>
</div>
</div>
</div>
</div>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<div id="wb_LayoutGrid1" ondrop="drop(event)" ondragover="allowDrop(event)" onclick="ShowObject('Layer5', 0);return false;" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid1">
<div class="col-1">
<div id="wb_Image2" style="display:inline-block;width:90px;height:105px;z-index:22;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');AnimateCss('wb_Image2', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/21748-bubka-Explorer2.png" data-src-retina="images/21748-bubka-Explorer2.png" id="Image2" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image36" style="display:inline-block;width:90px;height:105px;z-index:23;">
<a href="#" onclick="$('#jQueryDialog1').dialog('open');AnimateCss('wb_Image36', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/30885-Sparky783-MicrosoftSecurityEssentials.png" data-src-retina="images/30885-Sparky783-MicrosoftSecurityEssentials.png" id="Image36" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image59" style="display:inline-block;width:90px;height:105px;z-index:24;">
<a href="#" onclick="$('#jQueryDialog90').dialog('open');self.frames['syncc1'].location.href = './addeosapps/4sync.php';AnimateCss('wb_Image59', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/icone_bureautique_4sync.png" data-src-retina="images/icone_bureautique_4sync.png" id="Image59" alt=""></a>
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
<div id="wb_LayoutGrid6" onclick="ShowObject('Layer5', 0);return false;" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid6">
<div class="col-1">
<div id="wb_Image13" style="display:inline-block;width:82px;height:96px;z-index:25;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');AnimateCss('wb_Image13', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/20834-bubka-windowsexplorer.png" data-src-retina="images/20834-bubka-windowsexplorer.png" id="Image13" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image19" style="display:inline-block;width:87px;height:101px;z-index:26;">
<a href="#" onclick="$('#jQueryDialog54').dialog('open');AnimateCss('wb_Image19', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/30753-Cesco97-download256.png" data-src-retina="images/30753-Cesco97-download256.png" id="Image19" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image61" style="display:inline-block;width:90px;height:105px;z-index:27;">
<a href="#" onclick="popupwnd('https://youtube.com/','no','no','no','yes','yes','no','40','40','1100','588');AnimateCss('wb_Image61', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/logoyoutubepopup.png" data-src-retina="images/logoyoutubepopup.png" id="Image61" alt=""></a>
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
<div id="wb_LayoutGrid5" onclick="ShowObject('Layer5', 0);return false;" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid5">
<div class="col-1">
<div id="wb_Image38" style="display:inline-block;width:85px;height:99px;z-index:28;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');AnimateCss('wb_Image38', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/startpage.png" data-src-retina="images/startpage.png" id="Image38" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image35" style="display:inline-block;width:86px;height:100px;z-index:29;">
<a href="#" onclick="AnimateCss('wb_Image35', 'transform-3d-flip-in-x', 0, 1200);$('#jQueryDialog102').dialog('open');return false;"><img src="images/placeholder.gif" data-src="images/23176-bubka-TextEdit.png" data-src-retina="images/23176-bubka-TextEdit.png" id="Image35" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image62" style="display:inline-block;width:90px;height:105px;z-index:30;">
<a href="#" onclick="popupwnd('https://facebook.com/','no','no','no','yes','yes','no','40','40','1100','588');AnimateCss('wb_Image62', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/logofacebookpopup.png" data-src-retina="images/logofacebookpopup.png" id="Image62" alt=""></a>
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
<div id="wb_LayoutGrid4" onclick="ShowObject('Layer5', 0);return false;" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid4">
<div class="col-1">
<div id="wb_Image33" style="display:inline-block;width:87px;height:101px;z-index:31;">
<a href="#" onclick="$('#jQueryDialog6').dialog('open');AnimateCss('wb_Image33', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/20698-bubka-Maps.png" data-src-retina="images/20698-bubka-Maps.png" id="Image33" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image58" style="display:inline-block;width:90px;height:105px;z-index:32;">
<a href="#" onclick="$('#jQueryDialog48').dialog('open');AnimateCss('wb_Image58', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/hebergeur-icone-img.png" data-src-retina="images/hebergeur-icone-img.png" id="Image58" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image63" style="display:inline-block;width:90px;height:105px;z-index:33;">
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<a href="#" onclick="popupwnd('https://twitter.com/','no','no','no','yes','yes','no','40','40','1100','588');AnimateCss('wb_Image63', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/logotwitterpopup.png" data-src-retina="images/logotwitterpopup.png" id="Image63" alt="" draggable="true" ondragstart="drag(event)"></a>
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
<div id="wb_Image80" style="display:inline-block;width:72px;height:101px;z-index:34;">
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<a href="#" onclick="AnimateCss('wb_Image80', 'transform-3d-flip-in-x', 0, 1200);$('#jQueryDialog11').dialog('open');self.frames['cappsk2'].location.href = './cloudapps.php';return false;"><img src="images/placeholder.gif" data-src="images/CloudApps.png" data-src-retina="images/CloudApps.png" id="Image80" alt="" draggable="true" ondragstart="drag(event)"></a>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid3" onclick="ShowObject('Layer5', 0);return false;" ondblclick="ShowObject('Layer26', 1);return false;">
<div id="LayoutGrid3">
<div class="col-1">
<div id="wb_Image34" style="display:inline-block;width:85px;height:99px;z-index:35;">
<a href="#" onclick="$('#jQueryDialog13').dialog('open');self.frames['netc1'].location.href = './addeosapps/messagerienetc.php';AnimateCss('wb_Image34', 'transform-3d-flip-in-x', 0, 1200);return false;"><img src="images/placeholder.gif" data-src="images/22381-bubka-Mail.png" data-src-retina="images/22381-bubka-Mail.png" id="Image34" alt=""></a>
</div>
</div>
<div class="col-2">
<div id="wb_Image37" style="display:inline-block;width:90px;height:105px;z-index:36;">
<a href="#" onclick="AnimateCss('wb_Image37', 'transform-3d-flip-in-x', 0, 1200);$('#jQueryDialog100').dialog('open');return false;"><img src="images/placeholder.gif" data-src="images/30143-xsara54-Parametres.png" data-src-retina="images/30143-xsara54-Parametres.png" id="Image37" alt=""></a>
</div>
</div>
<div class="col-3">
<div id="wb_Image81" style="display:inline-block;width:74px;height:104px;z-index:37;">
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<a href="#" onclick="AnimateCss('wb_Image81', 'transform-3d-flip-in-x', 0, 1200);alert('En cours de developpement. Vous ne pouvez pas encore utiliser ce programme...');return false;"><img src="images/placeholder.gif" data-src="images/MyApps.png" data-src-retina="images/MyApps.png" id="Image81" alt="" draggable="true" ondragstart="drag(event)"></a>
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
<div id="wb_Image79" style="display:inline-block;width:72px;height:101px;z-index:38;">
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("image", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("image");
    ev.target.appendChild(document.getElementById(data));
}
</script>
<a href="#" onclick="AnimateCss('wb_Image79', 'transform-3d-flip-in-x', 0, 1200);$('#jQueryDialog7').dialog('open');return false;"><img src="images/placeholder.gif" data-src="images/UploadsApps.png" data-src-retina="images/UploadsApps.png" id="Image79" alt="" draggable="true" ondragstart="drag(event)"></a>
</div>
</div>
</div>
</div>

<div id="jQueryDialog3" style="z-index:661;">
<div id="jQueryTabs5" style="position:absolute;left:7px;top:8px;width:654px;height:438px;z-index:89;">
<ul>
<li><a href="#jquerytabs5-page-0"><span>Accessoires</span></a></li>
<li><a href="#jquerytabs5-page-1"><span>Utilitaires</span></a></li>
<li><a href="#jquerytabs5-page-2"><span>Navigations</span></a></li>
<li><a href="#jquerytabs5-page-3"><span>Suite Office</span></a></li>
</ul>
<div style="height:416px;" id="jquerytabs5-page-0">
<div id="wb_MaterialIcon2" style="position:absolute;left:612px;top:356px;width:32px;height:32px;text-align:center;z-index:39;">
<a href="#" onclick="$('#jQueryDialog12').dialog('open');return false;"><div id="MaterialIcon2"><i class="material-icons">&#xe1b8;</i></div></a></div>
<div id="wb_Image12" style="position:absolute;left:-1px;top:1px;width:87px;height:87px;z-index:40;">
<a href="#" onclick="$('#jQueryDialog4').dialog('open');self.frames['calcm1'].location.href = './addeosapps/calc.php';return false;"><img src="images/Calculatrice.png" id="Image12" alt=""></a></div>
<div id="wb_Image32" style="position:absolute;left:83px;top:1px;width:87px;height:87px;z-index:41;">
<a href="#" onclick="$('#jQueryDialog103').dialog('open');self.frames['edtxta1'].location.href = './addeosapps/wordpad.php';return false;"><img src="images/notepad.png" id="Image32" alt=""></a></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:180px;top:15px;width:53px;height:56px;text-align:center;z-index:42;">
<a href="#" onclick="$('#jQueryDialog30').dialog('open');return false;"><div id="FontAwesomeIcon1"><i class="fa fa-file-code-o"></i></div></a></div>
<div id="wb_MaterialIcon59" style="position:absolute;left:253px;top:13px;width:52px;height:54px;text-align:center;z-index:43;">
<a href="#" onclick="$('#jQueryDialog67').dialog('open');return false;"><div id="MaterialIcon59"><i class="material-icons">&#xe25a;</i></div></a></div>
<div id="wb_FontAwesomeIcon16" style="position:absolute;left:337px;top:13px;width:61px;height:56px;text-align:center;z-index:44;">
<a href="javascript:popupwnd('https://onedrive.live.com/?id=root&cid=','no','no','no','yes','yes','no','60','110','750','550')" target="_self"><div id="FontAwesomeIcon16"><i class="fa fa-cloud-download"></i></div></a></div>
<div id="wb_Image24" style="position:absolute;left:412px;top:4px;width:96px;height:85px;z-index:45;">
<a href="#" onclick="$('#jQueryDialog1').dialog('open');return false;"><img src="images/pausecafe.png" id="Image24" alt=""></a></div>
<div id="wb_Text23" style="position:absolute;left:11px;top:81px;width:57px;height:28px;text-align:center;z-index:46;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Calculatrice</span></div>
<div id="wb_Text45" style="position:absolute;left:95px;top:81px;width:57px;height:14px;text-align:center;z-index:47;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Wordpad</span></div>
<div id="wb_Text54" style="position:absolute;left:178px;top:81px;width:57px;height:42px;text-align:center;z-index:48;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Conception<br>Applis</span></div>
<div id="wb_Text55" style="position:absolute;left:253px;top:81px;width:57px;height:28px;text-align:center;z-index:49;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Héberger<br>image</span></div>
<div id="wb_Text56" style="position:absolute;left:337px;top:81px;width:57px;height:28px;text-align:center;z-index:50;">
<span style="color:#000000;font-family:Arial;font-size:11px;">OneDrive<br>[Pop-Up]</span></div>
<div id="wb_Text57" style="position:absolute;left:427px;top:81px;width:57px;height:14px;text-align:center;z-index:51;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Jeux Flash</span></div>
</div>
<div style="height:416px;" id="jquerytabs5-page-1">
<div id="wb_FontAwesomeIcon17" style="position:absolute;left:15px;top:14px;width:51px;height:56px;text-align:center;z-index:52;">
<a href="#" onclick="$('#jQueryDialog104').dialog('open');self.frames['meteok1'].location.href = './addeosapps/meteo.php';return false;"><div id="FontAwesomeIcon17"><i class="fa fa-thermometer-three-quarters"></i></div></a></div>
<div id="wb_Image53" style="position:absolute;left:81px;top:13px;width:59px;height:56px;z-index:53;">
<a href="#" onclick="$('#jQueryDialog78').dialog('open');self.frames['stiknot1'].location.href = './addeosapps/sng.php';return false;"><img src="images/SNGappsm.png" id="Image53" alt=""></a></div>
<div id="wb_Image45" style="position:absolute;left:163px;top:13px;width:59px;height:56px;z-index:54;">
<a href="#" onclick="$('#jQueryDialog44').dialog('open');self.frames['hitekm1'].location.href = './addeosapps/hitek.php';return false;"><img src="images/hitek_logo_HD2.png" id="Image45" alt=""></a></div>
<div id="wb_MaterialIcon23" style="position:absolute;left:250px;top:13px;width:54px;height:56px;text-align:center;z-index:55;">
<a href="#" onclick="$('#jQueryDialog40').dialog('open');self.frames['tridik1'].location.href = './addeosapps/tridiv3d.php';return false;"><div id="MaterialIcon23"><i class="material-icons">&#xe84d;</i></div></a></div>
<div id="wb_Image39" style="position:absolute;left:322px;top:1px;width:80px;height:80px;z-index:56;">
<a href="#" onclick="$('#jQueryDialog64').dialog('open');return false;"><img src="images/12472264_561929810626918_2272385936819492695_n(1).png" id="Image39" alt=""></a></div>
<div id="wb_Image4" style="position:absolute;left:409px;top:1px;width:87px;height:86px;z-index:57;">
<a href="#" onclick="$('#jQueryDialog27').dialog('open');return false;"><img src="images/img0007.png" id="Image4" alt=""></a></div>
<div id="wb_Text58" style="position:absolute;left:12px;top:74px;width:57px;height:28px;text-align:center;z-index:58;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Météo France</span></div>
<div id="wb_Text59" style="position:absolute;left:86px;top:74px;width:57px;height:28px;text-align:center;z-index:59;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Notes<br>Generator</span></div>
<div id="wb_Text60" style="position:absolute;left:164px;top:74px;width:57px;height:28px;text-align:center;z-index:60;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Hitek<br>Techno</span></div>
<div id="wb_Text61" style="position:absolute;left:249px;top:74px;width:57px;height:28px;text-align:center;z-index:61;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Tridiv<br>3D</span></div>
<div id="wb_Text62" style="position:absolute;left:329px;top:74px;width:61px;height:42px;text-align:center;z-index:62;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Simulateur<br>Smartphone</span></div>
<div id="wb_Text63" style="position:absolute;left:419px;top:74px;width:57px;height:28px;text-align:center;z-index:63;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Docteur<br>Flashy</span></div>
</div>
<div style="height:416px;" id="jquerytabs5-page-2">
<div id="wb_Image20" style="position:absolute;left:0px;top:6px;width:86px;height:86px;z-index:64;">
<a href="#" onclick="$('#jQueryDialog61').dialog('open');self.frames['discouk1'].location.href = './addeosapps/cdiscount.php';return false;"><img src="images/steam.png" id="Image20" alt=""></a></div>
<div id="wb_Image23" style="position:absolute;left:80px;top:6px;width:86px;height:86px;z-index:65;">
<a href="#" onclick="$('#jQueryDialog23').dialog('open');self.frames['deein1'].location.href = './addeosapps/deeint.php';return false;"><img src="images/img0025.png" id="Image23" alt=""></a></div>
<div id="wb_Image21" style="position:absolute;left:161px;top:6px;width:85px;height:86px;z-index:66;">
<a href="#" onclick="$('#jQueryDialog60').dialog('open');self.frames['zunet1'].location.href = './addeosapps/01net.php';return false;"><img src="images/twitch.png" id="Image21" alt=""></a></div>
<div id="wb_Image10" style="position:absolute;left:250px;top:6px;width:86px;height:86px;z-index:67;">
<a href="#" onclick="$('#jQueryDialog24').dialog('open');self.frames['horint1'].location.href = './addeosapps/horlogeint.php';return false;"><img src="images/img0004.png" id="Image10" alt=""></a></div>
<div id="wb_Image3" style="position:absolute;left:334px;top:5px;width:93px;height:88px;z-index:68;">
<a href="#" onclick="$('#jQueryDialog56').dialog('open');self.frames['ipcy1'].location.href = './addeosapps/ipiccy.php';return false;"><img src="images/ipiccy.png" id="Image3" alt=""></a></div>
<div id="wb_Image6" style="position:absolute;left:428px;top:6px;width:86px;height:86px;z-index:69;">
<a href="#" onclick="$('#jQueryDialog58').dialog('open');self.frames['oratv1'].location.href = './addeosapps/orangetv.php';return false;"><img src="images/orange.png" id="Image6" alt=""></a></div>
<div id="wb_Image5" style="position:absolute;left:516px;top:6px;width:86px;height:86px;z-index:70;">
<a href="#" onclick="$('#jQueryDialog57').dialog('open');self.frames['lebco1'].location.href = './addeosapps/leboncoin.php';return false;"><img src="images/Korben.png" id="Image5" alt=""></a></div>
<div id="wb_Image54" style="position:absolute;left:2px;top:106px;width:83px;height:62px;z-index:71;">
<a href="#" onclick="$('#jQueryDialog87').dialog('open');self.frames['lilig1'].location.href = './addeosapps/liligo.php';return false;"><img src="images/liligoicone.png" id="Image54" alt=""></a></div>
<div id="wb_Image60" style="position:absolute;left:94px;top:103px;width:58px;height:58px;z-index:72;">
<a href="#" onclick="$('#jQueryDialog93').dialog('open');self.frames['stermk1'].location.href = './addeosapps/stellarium.php';return false;"><img src="images/Stellarium-logo-300x300.png" id="Image60" alt=""></a></div>
<div id="wb_Image55" style="position:absolute;left:173px;top:103px;width:60px;height:58px;z-index:73;">
<a href="#" onclick="$('#jQueryDialog49').dialog('open');self.frames['fitnesk1'].location.href = './addeosapps/fitness.php';return false;"><img src="images/studiofitness.png" id="Image55" alt=""></a></div>
<div id="wb_Image18" style="position:absolute;left:249px;top:100px;width:88px;height:72px;z-index:74;">
<a href="#" onclick="$('#jQueryDialog20').dialog('open');self.frames['sncfk1'].location.href = './addeosapps/sncf.php';return false;"><img src="images/img0017.png" id="Image18" alt=""></a></div>
<div id="wb_Image22" style="position:absolute;left:334px;top:92px;width:91px;height:87px;z-index:75;">
<a href="#" onclick="$('#jQueryDialog25').dialog('open');self.frames['calce1'].location.href = './addeosapps/calceuro.php';return false;"><img src="images/img0024.png" id="Image22" alt=""></a></div>
<div id="wb_Text64" style="position:absolute;left:12px;top:81px;width:57px;height:14px;text-align:center;z-index:76;">
<span style="color:#000000;font-family:Arial;font-size:11px;">CDiscount</span></div>
<div id="wb_Text65" style="position:absolute;left:92px;top:81px;width:57px;height:14px;text-align:center;z-index:77;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Dées</span></div>
<div id="wb_Text67" style="position:absolute;left:172px;top:81px;width:57px;height:14px;text-align:center;z-index:78;">
<span style="color:#000000;font-family:Arial;font-size:11px;">01.net</span></div>
<div id="wb_Text68" style="position:absolute;left:262px;top:81px;width:57px;height:14px;text-align:center;z-index:79;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Horloge</span></div>
<div id="wb_Text73" style="position:absolute;left:349px;top:81px;width:57px;height:14px;text-align:center;z-index:80;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Ipiccy</span></div>
<div id="wb_Text75" style="position:absolute;left:440px;top:81px;width:57px;height:14px;text-align:center;z-index:81;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Orange TV</span></div>
<div id="wb_Text84" style="position:absolute;left:524px;top:81px;width:64px;height:14px;text-align:center;z-index:82;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Le Bon Coin</span></div>
<div id="wb_Text87" style="position:absolute;left:348px;top:174px;width:57px;height:28px;text-align:center;z-index:83;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Calcul<br>Monnaie</span></div>
<div id="wb_Text88" style="position:absolute;left:262px;top:174px;width:57px;height:14px;text-align:center;z-index:84;">
<span style="color:#000000;font-family:Arial;font-size:11px;">SNCF</span></div>
<div id="wb_Text93" style="position:absolute;left:173px;top:174px;width:57px;height:28px;text-align:center;z-index:85;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Studio<br>Fitness</span></div>
<div id="wb_Text99" style="position:absolute;left:96px;top:174px;width:57px;height:14px;text-align:center;z-index:86;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Stellarium</span></div>
<div id="wb_Text105" style="position:absolute;left:12px;top:174px;width:57px;height:14px;text-align:center;z-index:87;">
<span style="color:#000000;font-family:Arial;font-size:11px;">Liligo</span></div>
</div>
<div style="height:416px;" id="jquerytabs5-page-3">
<div id="wb_Text127" style="position:absolute;left:21px;top:25px;width:250px;height:16px;z-index:88;">
<span style="color:#000000;font-family:Arial;font-size:13px;">En cours de développement...</span></div>
</div>
</div>
</div>

<div id="jQueryDialog4" style="z-index:662;">
<a href="addeosapps/calc.php" target="calcm1"> Charger/Actualiser </a>
<object name="calcm1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog5" style="z-index:663;">
<div id="jQueryTabs2" style="position:absolute;left:7px;top:9px;width:956px;height:519px;z-index:94;">
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

<div id="jQueryDialog8" style="z-index:664;">
<!--Adresse internet: <input type="text" id="navigahttp" value="http://">  <button onclick="myFunctionHttpWww()">OK</button>-->
<!--<script>-->
<!--function myFunctionHttpWww() {-->
<!--href=("navigahttp") target="navigak1"-->
<!--}-->
<!--</script>-->
<!--<a href="addeosapps/navigateur.php" target="navigak1"> Charger/Actualiser </a>-->
<!--<object name="navigak1" data="addeosapps/navigateur.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>-->
<html>
<script>
function loadUrlWww1() {
    document.getElementById("urlDisplayWww1").src = document.getElementById("urlSourceWww1").value;
}
</script>
<input type="text" id="urlSourceWww1" value="https://www.startpage.com/"> <input type="button" value="Go" onclick="loadUrlWww1()">
<iframe id="urlDisplayWww1" width="100%" height="100%" style="overflow:auto" >
</iframe>
</html>
</div>

<div id="jQueryDialog23" style="z-index:665;">
<a href="addeosapps/deeint.php" target="deein1"> Charger/Actualiser </a>
<object name="deein1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>





<div id="jQueryDialog20" style="z-index:670;">
<a href="addeosapps/sncf.php" target="sncfk1"> Charger/Actualiser </a>
<object name="sncfk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog12" style="z-index:671;">
<div id="wb_jQueryAccordion1" style="position:absolute;left:11px;top:11px;width:788px;height:314px;z-index:107;">
<div id="jQueryAccordion1" class="panel-group" role="tablist">
<div class="panel panel-default active">
   <div class="panel-heading" role="tab">
      <h4 class="panel-title">
         <a role="button" data-toggle="collapse" data-parent="#jQueryAccordion1" href="#jQueryAccordion1-collapse1" aria-controls="jQueryAccordion1-collapse1" aria-expanded="true"><span class="panel-icon"></span>Origine Windows</a>
      </h4>
   </div>
   <div id="jQueryAccordion1-collapse1" class="panel-collapse collapsein in" role="tabpanel">
      <div class="panel-body">
<div id="wb_Image8" style="position:absolute;left:3px;top:1px;width:82px;height:82px;z-index:98;">
<a href="javascript:popupwnd('https://office.live.com/start/Word.aspx?','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/word-live.png" id="Image8" alt="" title="Office 2016 (gratuit) - Word"></a></div>
<div id="wb_Image11" style="position:absolute;left:137px;top:1px;width:82px;height:82px;z-index:99;">
<a href="javascript:popupwnd('https://office.live.com/start/PowerPoint.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/powerpoint-live.png" id="Image11" alt="" title="Office 2016 (gratuit) - PowerPoint"></a></div>
<div id="wb_Image14" style="position:absolute;left:207px;top:1px;width:80px;height:80px;z-index:100;">
<a href="javascript:popupwnd('https://keep.google.com/u/0/#home','no','no','no','yes','yes','no','20','20','950','650')" target="_self"><img src="images/keep-512.png" id="Image14" alt="" title="Google Keep - Bloc-Notes"></a></div>
<div id="wb_Image9" style="position:absolute;left:71px;top:1px;width:82px;height:82px;z-index:101;">
<a href="javascript:popupwnd('https://office.live.com/start/Excel.aspx?ui=fr-FR','no','no','no','yes','yes','no','20','20','920','750')" target="_self"><img src="images/excel-live.png" id="Image9" alt="" title="Office 2016 (gratuit) - Excel"></a></div>
      </div>
   </div>
</div>
<div class="panel panel-default">
   <div class="panel-heading" role="tab">
      <h4 class="panel-title">
         <a role="button" data-toggle="collapse" data-parent="#jQueryAccordion1" href="#jQueryAccordion1-collapse2" aria-controls="jQueryAccordion1-collapse2" aria-expanded="false"><span class="panel-icon"></span>Origine Linux</a>
      </h4>
   </div>
   <div id="jQueryAccordion1-collapse2" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
<div id="wb_Image1" style="position:absolute;left:3px;top:2px;width:85px;height:85px;z-index:102;">
<a href="#" onclick="$('#jQueryDialog82').dialog('open');return false;"><img src="images/diJXUfgE_400x400.png" id="Image1" alt=""></a></div>
      </div>
   </div>
</div>
<div class="panel panel-default">
   <div class="panel-heading" role="tab">
      <h4 class="panel-title">
         <a role="button" data-toggle="collapse" data-parent="#jQueryAccordion1" href="#jQueryAccordion1-collapse3" aria-controls="jQueryAccordion1-collapse3" aria-expanded="false"><span class="panel-icon"></span>Origine MAC OSx</a>
      </h4>
   </div>
   <div id="jQueryAccordion1-collapse3" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
<div id="wb_Image7" style="position:absolute;left:5px;top:4px;width:89px;height:89px;z-index:103;">
<a href="#" onclick="$('#jQueryDialog79').dialog('open');return false;"><img src="images/256x256bb.png" id="Image7" alt=""></a></div>
<div id="wb_Image16" style="position:absolute;left:82px;top:4px;width:89px;height:89px;z-index:104;">
<a href="#" onclick="$('#jQueryDialog80').dialog('open');return false;"><img src="images/aplus-flv-to-apple-tv-converter.png" id="Image16" alt=""></a></div>
<div id="wb_Image17" style="position:absolute;left:155px;top:5px;width:89px;height:89px;z-index:105;">
<a href="#" onclick="$('#jQueryDialog81').dialog('open');return false;"><img src="images/Calculatrice_apple.png" id="Image17" alt=""></a></div>
      </div>
   </div>
</div>
<div class="panel panel-default">
   <div class="panel-heading" role="tab">
      <h4 class="panel-title">
         <a role="button" data-toggle="collapse" data-parent="#jQueryAccordion1" href="#jQueryAccordion1-collapse4" aria-controls="jQueryAccordion1-collapse4" aria-expanded="false"><span class="panel-icon"></span>Origine Android</a>
      </h4>
   </div>
   <div id="jQueryAccordion1-collapse4" class="panel-collapse collapse" role="tabpanel">
      <div class="panel-body">
<div id="wb_Text27" style="position:absolute;left:16px;top:12px;width:717px;height:48px;z-index:106;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><em>Pour le moment aucune application Android n'est virtualisées.<br><br>Merci pour votre contribution !</em></span></div>
      </div>
   </div>
</div>
</div>
</div>
</div>

<div id="jQueryDialog27" style="z-index:672;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/doctorflashy.php">
</iframe>
</div>

<div id="jQueryDialog10" style="z-index:673;">
<div id="Html10" style="position:absolute;left:219px;top:16px;width:688px;height:488px;z-index:118">
<script src="https://chatbox.fr/chat/aa0526530c0b27a1bd5d17447921961a"></script></div>
<div id="wb_Image25" style="position:absolute;left:12px;top:16px;width:200px;height:150px;z-index:119;">
<img src="images/deco_pausecafe_tchat.gif" id="Image25" alt=""></div>
<div id="wb_Text39" style="position:absolute;left:14px;top:488px;width:197px;height:16px;text-align:right;z-index:120;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Tchat Version 2.0</span></div>
</div>

<div id="jQueryDialog36" style="z-index:674;">
<div id="wb_MaterialIcon17" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:121;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog36').dialog('close');return false;"><div id="MaterialIcon17"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text35" style="position:absolute;left:73px;top:19px;width:249px;height:16px;z-index:122;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Paramètrage du clavier :</span></div>
<div id="wb_Text36" style="position:absolute;left:14px;top:76px;width:141px;height:16px;z-index:123;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Langue du clavier : </span></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:165px;top:70px;width:176px;height:28px;z-index:124;">
<option selected value="fr-FR">Français (French)</option>
</select>
<input type="text" id="Editbox1" style="position:absolute;left:10px;top:126px;width:529px;height:16px;z-index:125;" name="Editbox1" value="Tester votre clavier dans cette zone : " spellcheck="false">
</div>

<div id="jQueryDialog37" style="z-index:675;">
<div id="jQueryTabs3" style="position:absolute;left:17px;top:19px;width:676px;height:532px;z-index:201;">
<ul>
<li><a href="#jquerytabs3-page-0"><span>Defauts</span></a></li>
<li><a href="#jquerytabs3-page-1"><span>Jeux vidéo</span></a></li>
<li><a href="#jquerytabs3-page-2"><span>Films et Séries TV</span></a></li>
<li><a href="#jquerytabs3-page-3"><span>Filip Hodas</span></a></li>
<li><a href="#jquerytabs3-page-4"><span>Linux</span></a></li>
<li><a href="#jquerytabs3-page-5"><span>Windows</span></a></li>
<li><a href="#jquerytabs3-page-6"><span>OSx</span></a></li>
<li><a href="#jquerytabs3-page-7"><span>Animés</span></a></li>
</ul>
<div style="height:510px;" id="jquerytabs3-page-0">
<div id="Html49" style="position:absolute;left:18px;top:21px;width:151px;height:101px;overflow:hidden;z-index:126">


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
<div id="Html52" style="position:absolute;left:179px;top:21px;width:148px;height:101px;overflow:hidden;z-index:127">


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
<div id="Html55" style="position:absolute;left:337px;top:21px;width:153px;height:101px;overflow:hidden;z-index:128">
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
<div id="Html50" style="position:absolute;left:499px;top:21px;width:145px;height:101px;overflow:hidden;z-index:129">
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
<div id="Html53" style="position:absolute;left:18px;top:133px;width:151px;height:98px;overflow:hidden;z-index:130">
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
<div id="Html56" style="position:absolute;left:179px;top:133px;width:148px;height:98px;overflow:hidden;z-index:131">
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
<div id="Html51" style="position:absolute;left:337px;top:133px;width:153px;height:98px;overflow:hidden;z-index:132">
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
<div id="Html54" style="position:absolute;left:499px;top:133px;width:145px;height:98px;overflow:hidden;z-index:133">
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
<div id="Html57" style="position:absolute;left:18px;top:242px;width:151px;height:102px;overflow:hidden;z-index:134">
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
<div id="wb_Text38" style="position:absolute;left:17px;top:462px;width:642px;height:16px;z-index:135;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-1">
<div id="Html64" style="position:absolute;left:12px;top:14px;width:101px;height:86px;overflow:hidden;z-index:136">
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
<div id="Html66" style="position:absolute;left:121px;top:14px;width:101px;height:86px;overflow:hidden;z-index:137">
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
<div id="Html67" style="position:absolute;left:228px;top:14px;width:101px;height:86px;overflow:hidden;z-index:138">
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
<div id="Html68" style="position:absolute;left:339px;top:14px;width:101px;height:86px;overflow:hidden;z-index:139">
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
<div id="Html69" style="position:absolute;left:449px;top:14px;width:101px;height:86px;overflow:hidden;z-index:140">
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
<div id="Html70" style="position:absolute;left:561px;top:14px;width:101px;height:86px;overflow:hidden;z-index:141">
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
<div id="Html71" style="position:absolute;left:13px;top:113px;width:101px;height:86px;overflow:hidden;z-index:142">
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
<div id="Html72" style="position:absolute;left:121px;top:113px;width:101px;height:86px;overflow:hidden;z-index:143">
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
<div id="Html73" style="position:absolute;left:228px;top:113px;width:101px;height:86px;overflow:hidden;z-index:144">
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
<div id="Html74" style="position:absolute;left:339px;top:113px;width:101px;height:86px;overflow:hidden;z-index:145">
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
<div id="Html75" style="position:absolute;left:449px;top:113px;width:101px;height:86px;overflow:hidden;z-index:146">
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
<div id="Html76" style="position:absolute;left:561px;top:113px;width:101px;height:86px;overflow:hidden;z-index:147">
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
<div id="Html77" style="position:absolute;left:13px;top:214px;width:101px;height:86px;overflow:hidden;z-index:148">
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
<div id="Html78" style="position:absolute;left:121px;top:214px;width:101px;height:86px;overflow:hidden;z-index:149">
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
<div id="wb_Text69" style="position:absolute;left:19px;top:462px;width:642px;height:16px;z-index:150;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-2">
<div id="Html65" style="position:absolute;left:13px;top:14px;width:101px;height:86px;overflow:hidden;z-index:151">
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
<div id="Html79" style="position:absolute;left:124px;top:14px;width:101px;height:86px;overflow:hidden;z-index:152">
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
<div id="Html80" style="position:absolute;left:232px;top:14px;width:101px;height:86px;overflow:hidden;z-index:153">
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
<div id="Html81" style="position:absolute;left:343px;top:14px;width:101px;height:86px;overflow:hidden;z-index:154">
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
<div id="Html82" style="position:absolute;left:457px;top:14px;width:101px;height:86px;overflow:hidden;z-index:155">
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
<div id="Html83" style="position:absolute;left:566px;top:14px;width:101px;height:86px;overflow:hidden;z-index:156">
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
<div id="Html84" style="position:absolute;left:13px;top:111px;width:101px;height:86px;overflow:hidden;z-index:157">
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
<div id="Html85" style="position:absolute;left:124px;top:111px;width:101px;height:86px;overflow:hidden;z-index:158">
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
<div id="Html86" style="position:absolute;left:232px;top:111px;width:101px;height:86px;overflow:hidden;z-index:159">
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
<div id="Html87" style="position:absolute;left:343px;top:111px;width:101px;height:86px;overflow:hidden;z-index:160">
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
<div id="Html88" style="position:absolute;left:457px;top:111px;width:101px;height:86px;overflow:hidden;z-index:161">
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
<div id="Html89" style="position:absolute;left:566px;top:111px;width:101px;height:86px;overflow:hidden;z-index:162">
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
<div id="Html90" style="position:absolute;left:13px;top:206px;width:101px;height:86px;overflow:hidden;z-index:163">
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
<div id="Html91" style="position:absolute;left:124px;top:206px;width:101px;height:86px;overflow:hidden;z-index:164">
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
<div id="wb_Text78" style="position:absolute;left:19px;top:462px;width:642px;height:16px;z-index:165;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-3">
<div id="Html28" style="position:absolute;left:14px;top:14px;width:146px;height:86px;overflow:hidden;z-index:166">
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
<div id="Html29" style="position:absolute;left:172px;top:14px;width:146px;height:86px;overflow:hidden;z-index:167">
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
<div id="Html60" style="position:absolute;left:334px;top:14px;width:146px;height:86px;overflow:hidden;z-index:168">
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
<div id="Html99" style="position:absolute;left:494px;top:14px;width:146px;height:86px;overflow:hidden;z-index:169">
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
<div id="Html100" style="position:absolute;left:14px;top:110px;width:146px;height:86px;overflow:hidden;z-index:170">
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
<div id="Html101" style="position:absolute;left:174px;top:110px;width:146px;height:86px;overflow:hidden;z-index:171">
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
<div id="Html102" style="position:absolute;left:334px;top:110px;width:146px;height:86px;overflow:hidden;z-index:172">
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
<div id="Html103" style="position:absolute;left:494px;top:110px;width:146px;height:86px;overflow:hidden;z-index:173">
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
<div id="Html104" style="position:absolute;left:14px;top:210px;width:146px;height:86px;overflow:hidden;z-index:174">
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
<div id="Html105" style="position:absolute;left:174px;top:210px;width:146px;height:86px;overflow:hidden;z-index:175">
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
<div id="Html106" style="position:absolute;left:334px;top:210px;width:146px;height:86px;overflow:hidden;z-index:176">
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
<div id="Html107" style="position:absolute;left:494px;top:210px;width:146px;height:86px;overflow:hidden;z-index:177">
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
<div id="Html108" style="position:absolute;left:14px;top:308px;width:146px;height:86px;overflow:hidden;z-index:178">
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
<div id="Html109" style="position:absolute;left:174px;top:308px;width:146px;height:86px;overflow:hidden;z-index:179">
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
<div id="Html110" style="position:absolute;left:334px;top:308px;width:146px;height:86px;overflow:hidden;z-index:180">
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
<div id="Html111" style="position:absolute;left:494px;top:308px;width:146px;height:86px;overflow:hidden;z-index:181">
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
<div id="Html112" style="position:absolute;left:14px;top:405px;width:146px;height:76px;overflow:hidden;z-index:182">
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
<div id="wb_Text79" style="position:absolute;left:242px;top:449px;width:399px;height:32px;z-index:183;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-4">
<div id="wb_Text110" style="position:absolute;left:7px;top:462px;width:642px;height:16px;z-index:184;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
<div id="Html118" style="position:absolute;left:11px;top:20px;width:146px;height:86px;overflow:hidden;z-index:185">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionlinux331001()"><img src="backgroundimage/miniatures/linux/linux1.jpg" id="Image331001"></a>

<script>
function myFunctionlinux331001() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/linux/linux1.jpg')";
    <!--$userxc='<?php echo $_SESSION['username'];?>'; -->
    
                
}
</script>

</body>
</html></div>
<div id="Html122" style="position:absolute;left:428px;top:337px;width:220px;height:110px;z-index:186">
<!-- <iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" -->
 <!--  src="backgroundphp/test2.php"> -->
<!-- </iframe><br /> --></div>
<div id="Html121" style="position:absolute;left:154px;top:254px;width:100px;height:93px;z-index:187">
<!-- $.ajax({   -->
      <!--  url : '/backgroundphp/linux1.php',  -->
     <!--   type : 'GET',  -->
    <!--    dataType : 'json',  -->
    <!--    success : function(code_html, statut){  -->
     <!--       $(code_html).appendTo("#commentaires"); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !  -->
   <!--     },  -->

   <!--     error : function(resultat, statut, erreur){  -->
         
   <!--     },  -->

   <!--     complete : function(resultat, statut){  -->

   <!--     }  -->

 <!--    });  --></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-5">
<div id="wb_Text111" style="position:absolute;left:7px;top:462px;width:642px;height:16px;z-index:188;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
<div id="Html119" style="position:absolute;left:14px;top:20px;width:146px;height:86px;overflow:hidden;z-index:189">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
<a href="#" onclick="myFunctionwindows341001()"><img src="backgroundimage/miniatures/windows/windows1.jpg" id="Image341001"></a>

<script>
function myFunctionwindows341001() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/windows/windows1.jpg')";

}
</script>

</body>
</html></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-6">
<div id="wb_Text112" style="position:absolute;left:7px;top:462px;width:642px;height:16px;z-index:190;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.</em></span></div>
<div id="Html120" style="position:absolute;left:14px;top:20px;width:146px;height:86px;overflow:hidden;z-index:191">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionosx351001()"><img src="backgroundimage/miniatures/osx/osx1.jpg" id="Image351001"></a>

<script>
function myFunctionosx351001() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/osx/osx1.jpg')";

}
</script>

</body>
</html></div>
</div>
<div style="height:510px;" id="jquerytabs3-page-7">
<div id="Html123" style="position:absolute;left:11px;top:20px;width:146px;height:86px;overflow:hidden;z-index:192">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated011()"><img src="backgroundimage/miniatures/animated/anime.gif" id="Imageanim01"></a>

<script>
function myFunctionanimated011() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/anime.gif')";

}
</script>

</body>
</html></div>
<div id="Html124" style="position:absolute;left:172px;top:20px;width:146px;height:86px;overflow:hidden;z-index:193">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated012()"><img src="backgroundimage/miniatures/animated/sky.gif" id="Imageanim02"></a>

<script>
function myFunctionanimated012() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/sky.gif')";

}
</script>

</body>
</html></div>
<div id="Html125" style="position:absolute;left:330px;top:20px;width:146px;height:86px;overflow:hidden;z-index:194">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated013()"><img src="backgroundimage/miniatures/animated/engrenage.gif" id="Imageanim03"></a>

<script>
function myFunctionanimated013() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/engrenage.gif')";

}
</script>

</body>
</html></div>
<div id="Html126" style="position:absolute;left:490px;top:20px;width:146px;height:86px;overflow:hidden;z-index:195">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated014()"><img src="backgroundimage/miniatures/animated/pixel.jpg" id="Imageanim04"></a>

<script>
function myFunctionanimated014() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/pixel.gif')";

}
</script>

</body>
</html></div>
<div id="Html127" style="position:absolute;left:11px;top:124px;width:146px;height:86px;overflow:hidden;z-index:196">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated015()"><img src="backgroundimage/miniatures/animated/forest.gif" id="Imageanim05"></a>

<script>
function myFunctionanimated015() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/forest.gif')";

}
</script>

</body>
</html></div>
<div id="Html128" style="position:absolute;left:172px;top:124px;width:146px;height:86px;overflow:hidden;z-index:197">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated016()"><img src="backgroundimage/miniatures/animated/glassglow.gif" id="Imageanim06"></a>

<script>
function myFunctionanimated016() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/glassglow.gif')";

}
</script>

</body>
</html></div>
<div id="Html129" style="position:absolute;left:330px;top:124px;width:146px;height:86px;overflow:hidden;z-index:198">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated017()"><img src="backgroundimage/miniatures/animated/mario.gif" id="Imageanim07"></a>

<script>
function myFunctionanimated017() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/mario.gif')";

}
</script>

</body>
</html></div>
<div id="Html130" style="position:absolute;left:490px;top:124px;width:146px;height:86px;overflow:hidden;z-index:199">
<!DOCTYPE html>
<html>
<body>

<!-- <button type="button" onclick="myFunction()">Image par défaut</button> -->
  <!-- Requete Ajax ) suivre sur OCR -->
<a href="#" onclick="myFunctionanimated018()"><img src="backgroundimage/miniatures/animated/plaine.gif" id="Imageanim08"></a>

<script>
function myFunctionanimated018() {
    document.body.style.backgroundColor = "#f3f3f3";
    document.body.style.backgroundImage = "url('backgroundimage/animated/plaine.gif')";

}
</script>

</body>
</html></div>
<div id="wb_Text126" style="position:absolute;left:19px;top:440px;width:642px;height:32px;z-index:200;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Le changement d'un fond d'écran peut prendre quelques secondes en fonction de votre débit internet.<br>Le chargement de fond d'écran animés est très lourds et peut provoquer des ralentissements !</em></span></div>
</div>
</div>
</div>

<div id="jQueryDialog38" style="z-index:676;">
<embed width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="calendar/calendrier-2018.pdf">
</div>

<div id="jQueryDialog25" style="z-index:677;">
<a href="addeosapps/calceuro.php" target="calce1"> Charger/Actualiser </a>
<object name="calce1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog24" style="z-index:678;">
<a href="addeosapps/horlogeint.php" target="horint1"> Charger/Actualiser </a>
<object name="horint1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog34" style="z-index:679;">
<div id="wb_MaterialIcon15" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:205;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog34').dialog('close');return false;"><div id="MaterialIcon15"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="Html21" style="position:absolute;left:51px;top:10px;width:411px;height:62px;z-index:206">
ADRESSE IP : 
<?

echo $_SERVER["REMOTE_ADDR"];

?></div>
<div id="wb_Text26" style="position:absolute;left:15px;top:84px;width:453px;height:64px;z-index:207;">
<span style="color:#000000;font-family:Arial;font-size:13px;">L'adresse IP inscrite ici dépend de votre identité sur le web et non pas du site internet du WebOS. Celle ci s'affiche en fonction de votre configuration ; soit en Ipv4, ou bien en Ipv6. Elle ne peut pas être modifié via cette afficheur informatif.</span></div>
</div>

<div id="jQueryDialog39" style="z-index:680;">
<div id="wb_MaterialIcon20" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:208;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog39').dialog('close');return false;"><div id="MaterialIcon20"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_MaterialIcon21" style="position:absolute;left:48px;top:10px;width:106px;height:100px;text-align:center;z-index:209;">
<div id="MaterialIcon21"><i class="material-icons">&#xe32a;</i></div></div>
<div id="wb_Text37" style="position:absolute;left:165px;top:10px;width:538px;height:128px;text-align:justify;z-index:210;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Ce serveur utilise par défaut une protection générale contre les programmes malveillants.<br>Le serveur par défaut rynnawebos.fr chez 1and1 permet également de protéger le serveur des attaques DDoS et PingOfDeath.<br>Cette règle de sécurité ne s'applique que sur le serveur <strong><u>rynnawebos.fr</u></strong><br><br><strong>Si vous utilisez ce WebOS via <u>une autre adresse internet</u> et que son administrateur n'a pas modifié le texte ici présent, nous vous conseillons de le contacter pour vérifier avec lui les sécurités de son propre serveur.</strong></span></div>
</div>

<div id="jQueryDialog40" style="z-index:681;">
<a href="addeosapps/tridiv3d.php" target="tridik1"> Charger/Actualiser </a>
<object name="tridik1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog35" style="z-index:682;">
<div id="wb_Text34" style="position:absolute;left:12px;top:61px;width:377px;height:112px;z-index:212;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour supprimer votre compte pour l'instant vous devez écrire un mail à support@rynnawebos.fr<br><br>Votre compte sera alors supprimé (ainsi que vos fichiers hébergés) dans les 72 heures.<br><br>Merci pour votre patience.</span></div>
<div id="wb_MaterialIcon16" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:213;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog35').dialog('close');return false;"><div id="MaterialIcon16"><i class="material-icons">&#xe5cb;</i></div></a></div>
</div>

<div id="jQueryDialog44" style="z-index:683;">
<a href="addeosapps/hitek.php" target="hitekm1"> Charger/Actualiser </a>
<object name="hitekm1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog46" style="z-index:684;">
<object data="bookmanager.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog47" style="z-index:685;">
<a href="addeosapps/ebook.php" target="eboom1"> Charger/Actualiser </a>
<object name="eboom1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog48" style="z-index:686;">
<div id="Html113" style="position:absolute;left:17px;top:19px;width:765px;height:476px;z-index:217">
<a href="uploads/index.php" target="uplfr1"> Retour racine </a>
<object name="uplfr1" data="uploads/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
<input type="button" id="Button33" onclick="$('#jQueryDialog67').dialog('open');return false;" name="" value="Ajouter une nouvelle image au dossier (publique)" style="position:absolute;left:20px;top:507px;width:762px;height:25px;z-index:218;">
</div>

<script>
var wb_Timer6;
function TimerStartTimer6()
{
   wb_Timer6 = setTimeout(function()
   {
      var event = null;
      ShowObjectWithEffect('wb_MaterialIcon24', 0, '', 0);
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

<div id="jQueryDialog49" style="z-index:690;">
<a href="addeosapps/fitness.php" target="fitnesk1"> Charger/Actualiser </a>
<object name="fitnesk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>


<div id="jQueryDialog50">
<div id="wb_Text47" style="position:absolute;left:11px;top:15px;width:592px;height:48px;z-index:238;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pour votre sécurité les pointeurs et la barre de tâches ont été actualisés.<br>Vous pouvez découvrir ici les applications principales du WebOS et gérer leurs fonctionnements ci-dessous :</span></div>
<div id="jQueryTabs4" style="position:absolute;left:10px;top:73px;width:584px;height:398px;z-index:239;">
<ul>
<li><a href="#jquerytabs4-page-0"><span>Forcage fermeture</span></a></li>
<li><a href="#jquerytabs4-page-1"><span>Information navigateur</span></a></li>
</ul>
<div style="height:376px;" id="jquerytabs4-page-0">
<input type="button" id="Button10" onclick="ShowObject('Layer5', 0);return false;" name="" value="Menu Applicatifs" style="position:absolute;left:11px;top:15px;width:251px;height:25px;z-index:220;">
<input type="button" id="Button11" onclick="$('#jQueryDialog3').dialog('close');return false;" name="" value="Applis installées" style="position:absolute;left:304px;top:15px;width:251px;height:25px;z-index:221;">
<input type="button" id="Button13" onclick="$('#jQueryDialog9').dialog('close');return false;" name="" value="Application Windows" style="position:absolute;left:11px;top:50px;width:251px;height:25px;z-index:222;">
<input type="button" id="Button14" onclick="$('#jQueryDialog13').dialog('close');return false;" name="" value="Messagerie NetCourriel" style="position:absolute;left:304px;top:50px;width:251px;height:25px;z-index:223;">
<input type="button" id="Button16" onclick="$('#jQueryDialog31').dialog('close');return false;" name="" value="Dépôt Applications" style="position:absolute;left:11px;top:87px;width:251px;height:25px;z-index:224;">
<input type="button" id="Button17" onclick="ShowObject('jQueryDialog16', 0);return false;" name="" value="Street View" style="position:absolute;left:304px;top:87px;width:251px;height:25px;z-index:225;">
<input type="button" id="Button18" onclick="$('#jQueryDialog12').dialog('close');return false;" name="" value="Applications virtualisées" style="position:absolute;left:11px;top:124px;width:251px;height:25px;z-index:226;">
<input type="button" id="Button19" onclick="$('#jQueryDialog10').dialog('close');return false;" name="" value="Chat WebOS" style="position:absolute;left:304px;top:124px;width:251px;height:25px;z-index:227;">
<input type="button" id="Button20" onclick="$('#jQueryDialog40').dialog('close');return false;" name="" value="Editeur 3D Tridiv" style="position:absolute;left:11px;top:161px;width:251px;height:25px;z-index:228;">
<input type="button" id="Button21" onclick="$('#jQueryDialog42').dialog('close');return false;" name="" value="Applications d'Entreprise" style="position:absolute;left:304px;top:161px;width:251px;height:25px;z-index:229;">
<input type="button" id="Button22" onclick="$('#jQueryDialog11').dialog('close');return false;" name="" value="Paramètres et Aides" style="position:absolute;left:11px;top:197px;width:251px;height:25px;z-index:230;">
<input type="button" id="Button23" onclick="ShowObject('jQueryDialog41', 0);return false;" name="" value="Gestionnaire de jeux" style="position:absolute;left:304px;top:197px;width:251px;height:25px;z-index:231;">
<input type="button" id="Button24" onclick="ShowObject('jQueryDialog19', 0);return false;" name="" value="Terminal renseignements" style="position:absolute;left:11px;top:235px;width:251px;height:25px;z-index:232;">
<input type="button" id="Button25" onclick="$('#jQueryDialog8').dialog('close');return false;" name="" value="Navigateur Web Qwant" style="position:absolute;left:304px;top:235px;width:251px;height:25px;z-index:233;">
<input type="button" id="Button26" onclick="$('#jQueryDialog5').dialog('close');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:11px;top:272px;width:251px;height:25px;z-index:234;">
<input type="button" id="Button27" onclick="ShowObject('jQueryDialog21', 0);return false;" name="" value="Fenêtre de Bienvenue" style="position:absolute;left:304px;top:272px;width:251px;height:25px;z-index:235;">
<div id="wb_Text49" style="position:absolute;left:11px;top:329px;width:513px;height:16px;z-index:236;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Information : les programmes doivent être ouverts à l'écran pour être fermés.</span></div>
</div>
<div style="height:376px;" id="jquerytabs4-page-1">
<div id="wb_JavaScript2" style="position:absolute;left:16px;top:16px;width:555px;height:301px;z-index:237;">
<script>
document.write("<div style='font-family:Arial;font-size:16px;color:#000000;text-decoration:none;font-weight:normal;font-style:italic;text-align:left;text-decoration:none'>" + navigator.appName + " " + navigator.appVersion + "<\/div>");
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


<div id="jQueryDialog53" style="z-index:695;">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:14px;top:11px;width:238px;height:166px;z-index:258;" rows="9" cols="37" spellcheck="false"></textarea>
</div>

<div id="jQueryDialog15" style="z-index:696;">
<input type="text" id="jQueryDatePicker1" style="position:absolute;left:18px;top:6px;width:236px;height:164px;z-index:259;" name="jQueryDatePicker1" value="" spellcheck="false">
</div>


<div id="jQueryDialog30" style="z-index:698;">
<input type="submit" id="Button3" onclick="$('#jQueryDialog22').dialog('open');$('#jQueryDialog30').dialog('close');return false;" name="" value="Ouvrir le concepteur d'application Web (version PHP/HTML)" style="position:absolute;left:45px;top:86px;width:404px;height:25px;z-index:260;">
<div id="wb_Text8" style="position:absolute;left:15px;top:17px;width:451px;height:48px;text-align:justify;z-index:261;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Notre équipe remercie grandement Maxime G., développeur Web et ami, pour son aide à la conception du Concepteur d'Applications Web côté PHP et pour la sécurité du système.</span></div>
</div>

<div id="jQueryDialog22" style="z-index:699;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="generatiug/generatiugtest.php">
</iframe><br />
</div>

<div id="jQueryDialog54" style="z-index:700;">
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

<div id="jQueryDialog51" style="z-index:702;">
<a href="addeosapps/szforum.php" target="szfor1"> Charger/Actualiser </a>
<object name="szfor1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog56" style="z-index:703;">
<a href="addeosapps/ipiccy.php" target="ipcy1"> Charger/Actualiser </a>
<object name="ipcy1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog57" style="z-index:704;">
<a href="addeosapps/leboncoin.php" target="lebco1"> Charger/Actualiser </a>
<object name="lebco1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog58" style="z-index:705;">
<a href="addeosapps/orangetv.php" target="oratv1"> Charger/Actualiser </a>
<object name="oratv1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog59" style="z-index:706;">
<a href="addeosapps/webpdf1.php" target="wepdfk1"> Charger/Actualiser </a>
<object name="wepdfk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog60" style="z-index:707;">
<a href="addeosapps/01net.php" target="zunet1"> Charger/Actualiser </a>
<object name="zunet1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog61" style="z-index:708;">
<a href="addeosapps/cdiscount.php" target="discouk1"> Charger/Actualiser </a>
<object name="discouk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="Layer3" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:709;" onclick="ShowObject('Layer3', 0);return false;">
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

<div id="Layer6" style="position:fixed;text-align:left;left:50%;margin-left:-263px;top:50%;margin-top:-185px;width:527px;height:371px;z-index:281;">
</div>
<div id="Layer35" style="position:fixed;text-align:left;left:50%;margin-left:-380px;top:auto;bottom:0px;width:761px;height:136px;z-index:282;">
<div id="wb_Text40" style="position:absolute;left:48px;top:30px;width:664px;height:67px;text-align:center;z-index:278;">
<span style="color:#000000;font-family:Arial;font-size:19px;">Votre session est à présent en attente de reprise...<br></span><span style="color:#000000;font-family:Arial;font-size:12px;"><em><u>Cliquez n'importe où pour reprendre votre session<br></u><br>Attention : vous serez déconnecté dans 24 heures.</em></span></div>
</div>
</div>
<div id="jQueryDialog18">
<div id="wb_Text89" style="position:absolute;left:9px;top:12px;width:364px;height:48px;text-align:justify;z-index:283;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Souhaitez-vous vraiment modifier votre session ?</strong><br>Cela entrainera </span><span style="color:#FF4500;font-family:Arial;font-size:13px;"><u>une fermeture de votre session</u></span><span style="color:#000000;font-family:Arial;font-size:13px;"> mais ne vous deconnectera pas (vos Cookies doivent être autorisées).</span></div>
<input type="button" id="Button29" onclick="$('#jQueryDialog18').dialog('close');return false;" name="" value="NON" style="position:absolute;left:35px;top:81px;width:96px;height:25px;z-index:284;">
<input type="submit" id="Button30" onclick="window.location.href='./modifuser.php';return false;" name="" value="OUI" style="position:absolute;left:272px;top:81px;width:96px;height:25px;z-index:285;">
</div>

<div id="jQueryDialog2" style="z-index:711;">
<div id="wb_MaterialIcon55" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:286;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog2').dialog('close');return false;"><div id="MaterialIcon55"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text91" style="position:absolute;left:73px;top:19px;width:347px;height:16px;z-index:287;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Listes des erreurs gérées par le WebOS :</span></div>
<table style="position:absolute;left:23px;top:57px;width:401px;height:350px;z-index:288;" id="Table1">
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
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:15px;"> module</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> jquery</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> javascript</span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:15px;"> security</span></td>
</tr>
<tr>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> refused</span></td>
<td class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell1"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:15px;"> </span></td>
</tr>
</table>
<input type="button" id="Button1" onclick="ShowObject('wb_PageHeader', 0);TimerStartTimer8();return false;" name="" value="Cliquez ici pour ouvrir le Gestionnaire de Tâches" style="position:absolute;left:23px;top:415px;width:401px;height:25px;z-index:289;">
</div>

<div id="jQueryDialog26" style="z-index:712;">
<div id="wb_MaterialIcon56" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:290;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog26').dialog('close');return false;"><div id="MaterialIcon56"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text92" style="position:absolute;left:73px;top:19px;width:347px;height:112px;z-index:291;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Vous pouvez tester la qualité de votre écran par Pixel/Afficheur animé en cliquant sur le bouton ci-dessous.<br><br>Si vous détectez des problèmes de netteté et d'affichages de pixels vous pouvez contatcter votre Administrateur Système ou changer d'écran (si possible) par un écran plus grand et de meilleure qualité (full HD préférable).</span></div>
<input type="button" id="Button46" onclick="$('#jQueryDialog77').dialog('open');return false;" name="" value="Afficher le testeur" style="position:absolute;left:33px;top:159px;width:387px;height:25px;z-index:292;">
</div>

<div id="jQueryDialog64" style="z-index:713;">
<input type="button" id="Button31" onclick="$('#jQueryDialog65').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur iPhone X" style="position:absolute;left:20px;top:28px;width:317px;height:25px;z-index:293;">
<input type="button" id="Button32" onclick="$('#jQueryDialog66').dialog('open');$('#jQueryDialog64').dialog('close');return false;" name="" value="Simulateur Samsung Galaxy s8/s9" style="position:absolute;left:20px;top:68px;width:317px;height:25px;z-index:294;">
</div>

<div id="jQueryDialog65" style="z-index:714;">
<div id="Layer30" style="position:absolute;text-align:left;left:59px;top:42px;width:253px;height:40px;z-index:295;">
</div>
<div id="wb_Image40" style="position:absolute;left:31px;top:25px;width:307px;height:616px;z-index:296;">
<img src="images/nue_iphone8_design_final_2018.png" id="Image40" alt=""></div>
<div id="Html18" style="position:absolute;left:51px;top:42px;width:268px;height:582px;overflow:hidden;z-index:297">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<div id="wb_Image41" style="position:absolute;left:101px;top:42px;width:178px;height:29px;z-index:298;">
<img src="images/iphone8_simulation_haut.png" id="Image41" alt=""></div>
<input type="button" id="Button36" onclick="window.confirm('iOS 12');return false;" name="" value="Version iOS" style="position:absolute;left:352px;top:42px;width:222px;height:25px;z-index:299;">
<input type="button" id="Button37" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog65').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:354px;top:616px;width:222px;height:25px;z-index:300;">
<div id="wb_Text97" style="position:absolute;left:-1px;top:6px;width:474px;height:15px;z-index:301;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
</div>

<div id="jQueryDialog66" style="z-index:715;">
<div id="wb_Image42" style="position:absolute;left:55px;top:42px;width:295px;height:621px;z-index:302;">
<img src="images/S10PLUSGALAXYSAMSUNG_THEME.png" id="Image42" alt=""></div>
<div id="Html20" style="position:absolute;left:67px;top:57px;width:272px;height:587px;overflow:hidden;z-index:303">
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
   src="addeosapps/mobiledemo.php">
</iframe></div>
<input type="button" id="Button38" name="" value="Action empreinte (sous écran)" style="position:absolute;left:366px;top:42px;width:222px;height:25px;z-index:304;">
<input type="button" id="Button41" onclick="window.confirm('Android 9.x');return false;" name="" value="Version Android" style="position:absolute;left:366px;top:90px;width:222px;height:25px;z-index:305;">
<input type="button" id="Button42" onclick="$('#jQueryDialog64').dialog('open');$('#jQueryDialog66').dialog('close');return false;" name="" value="Retour Simuateur" style="position:absolute;left:370px;top:627px;width:222px;height:25px;z-index:306;">
<div id="wb_Text98" style="position:absolute;left:8px;top:6px;width:474px;height:15px;z-index:307;">
<span style="color:#000000;font-family:Arial;font-size:12px;">Simulateur Smartphone conçu par AlgoStep Company - service gratuit</span></div>
<input type="button" id="Button15" name="" value="O O" style="position:absolute;left:273px;top:68px;width:54px;height:22px;z-index:308;" disabled>
</div>

<div id="jQueryDialog67" style="z-index:716;">
<div id="wb_Extension1" style="position:absolute;left:21px;top:66px;width:845px;height:212px;z-index:309;">
<div id="Extension1">
<div class="upload-drop-target"><h2>Glisser et déposer vos fichiers dans ce cadre (jpg, jpeg, gif, tga, dds ou png)</h2></div>
<input type="file" multiple="">
<div class="upload-selected"></div>
<a class="button upload-choose" href="#">Choisir des fichiers</a>
<a class="button upload-submit" href="#">Envoyer</a>
</div>
</div>
<div id="wb_Text100" style="position:absolute;left:27px;top:13px;width:832px;height:32px;z-index:310;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Déposer sur le serveur une image de votre choix (taille limite de résolution des images : 8000 x 8000) :<br>Pour partager votre image notez le chemin : </span><span style="color:#0000CD;font-family:Arial;font-size:13px;"><strong>[le serveur]/uploads/[le nom de votre fichier].[son extension]</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;">&nbsp; et partagez le à vos amies !</span></div>
</div>

<div id="jQueryDialog13" style="z-index:717;">
<!--<object data="addeosapps/messagerienetc.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>-->
<a href="addeosapps/messagerienetc.php" target="netc1"> Charger/Actualiser </a>
<object name="netc1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>


<div id="jQueryDialog69" style="z-index:719;">
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

<div id="jQueryDialog70" style="z-index:721;">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="addeosapps/webcam.php">
</iframe><br />
</div>

<div id="jQueryDialog71" style="z-index:722;">
<a href="addeosapps/agenda.php" target="agenk1"> Charger/Actualiser </a>
<object name="agenk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog72" style="z-index:723;">
<a href="addeosapps/devise.php" target="devimk1"> Charger/Actualiser </a>
<object name="devimk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog73" style="z-index:724;">
<div id="Html58" style="position:absolute;left:13px;top:11px;width:250px;height:68px;z-index:316">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="zipaction.php">
</iframe><br /></div>
<div id="wb_Text104" style="position:absolute;left:13px;top:91px;width:248px;height:112px;text-align:justify;z-index:317;">
<span style="color:#000000;font-family:Arial;font-size:13px;">La fonction d'archivage ZIP vous permet d'extraire toutes vos données du serveur vers une archive ZIP que vous pouvez télécharger par la suite via l'explorateur de fichier (utile dans le cas où vous souhaiteriez quitter définitivement le WebOS par exemple).</span></div>
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

<div id="Layer7" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:726;">
<div id="Layer8" style="position:absolute;text-align:left;left:150px;top:82px;width:855px;height:460px;z-index:321;">
<div id="Layer9" style="position:absolute;text-align:left;left:16px;top:11px;width:218px;height:436px;z-index:318;" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer10" style="position:absolute;text-align:left;left:236px;top:11px;width:211px;height:436px;z-index:319;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer7', 0);return false;">
</div>
<div id="Layer11" style="position:absolute;text-align:left;left:453px;top:11px;width:373px;height:436px;z-index:320;" onclick="$('#jQueryDialog100').dialog('open');ShowObject('Layer7', 0);return false;">
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
<div id="jQueryDialog32" style="z-index:727;">
<div id="wb_Text32" style="position:absolute;left:27px;top:68px;width:714px;height:467px;text-align:center;z-index:326;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Rynna WebOS est un WebOS libre d'utilisation pour tous.</strong><br>Son code source est disponible publiquement sur le dépôt GitHub.<br><br></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>NOM DE CODE DE VERSION :</strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong> </strong></span><span style="color:#FF0000;font-family:Arial;font-size:16px;"><strong>Razior</strong></span><span style="color:#FF0000;font-family:Arial;font-size:13px;"><strong> </strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><strong>(50.0 et supérieur)</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br><br><strong>Liste des développeurs : <br></strong><br><em>Société AlgoStep Company :<br></em><br>Loïc A.<br>Maxime D.<br><br><em>Développeurs qui ont aidés à son développement ou pour leurs avis (remerciements) : <br></em><br>Polien (veler Software)<br>Softwarezatorman (veler Software)<br>Lereparateurdepc (veler Software)<br>Etienne Baudoux (IRL)<br>Jeremy60800 (veler Software)<br>Fandeonepiece2 (veler Software)<br>Coincero (veler Software)<br>Maxime G. (IRL)<br>Random Coder 99 (OpenClassRoom)<br>Jona (CCSources Co.)<br>Jeremy N. (IRL)<br>Nico3859 (veler Software)<br><br>Merci à tout nos amies à Rouen pour leurs conseils et leurs professionnalismes durant le développement long et fastidieux de ce projet !</span></div>
<div id="wb_MaterialIcon13" style="position:absolute;left:4px;top:10px;width:37px;height:37px;text-align:center;z-index:327;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog32').dialog('close');return false;"><div id="MaterialIcon13"><i class="material-icons">&#xe5cb;</i></div></a></div>
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

<div id="Layer22" style="position:fixed;text-align:left;left:50%;margin-left:-549px;top:auto;bottom:0px;width:1099px;height:152px;z-index:729;" onmouseleave="ShowObject('Layer22', 0);return false;">
<div id="wb_Image43" style="position:absolute;left:89px;top:39px;width:913px;height:98px;z-index:328;">
<img src="images/coque_sfx_3D.png" id="Image43" alt=""></div>
<div id="wb_Image51" style="position:absolute;left:732px;top:30px;width:80px;height:80px;z-index:329;">
<a href="#" onclick="$('#jQueryDialog76').dialog('open');self.frames['nowcoo1'].location.href = './addeosapps/nowcoworking.php';return false;" onmouseenter="AnimateCss('wb_Image51', 'transform-wiggle', 0, 500);return false;"><img src="images/nowcoworking.png" id="Image51" alt=""></a></div>
<div id="wb_Image46" style="position:absolute;left:508px;top:17px;width:110px;height:110px;z-index:330;">
<a href="#" onclick="$('#jQueryDialog68').dialog('open');self.frames['opcro1'].location.href = './addeosapps/ocr.php';return false;" onmouseenter="AnimateCss('wb_Image46', 'transform-wiggle', 0, 500);return false;"><img src="images/OCR.png" id="Image46" alt=""></a></div>
<div id="wb_Image47" style="position:absolute;left:386px;top:17px;width:110px;height:110px;z-index:331;">
<a href="#" onclick="$('#jQueryDialog55').dialog('open');self.frames['szfory1'].location.href = './addeosapps/szforum.php';return false;" onmouseenter="AnimateCss('wb_Image47', 'transform-wiggle', 0, 500);return false;"><img src="images/sz.png" id="Image47" alt=""></a></div>
<div id="wb_Image48" style="position:absolute;left:272px;top:17px;width:110px;height:110px;z-index:332;">
<a href="#" onclick="$('#jQueryDialog31').dialog('open');self.frames['lemodk1'].location.href = './addeosapps/lemonde.php';return false;" onmouseenter="AnimateCss('wb_Image48', 'transform-wiggle', 0, 500);return false;"><img src="images/lemonde.png" id="Image48" alt=""></a></div>
<div id="wb_Image49" style="position:absolute;left:153px;top:17px;width:110px;height:110px;z-index:333;">
<a href="#" onclick="$('#jQueryDialog9').dialog('open');self.frames['wikipk1'].location.href = './addeosapps/wikipedia.php';return false;" onmouseenter="AnimateCss('wb_Image49', 'transform-wiggle', 0, 500);return false;"><img src="images/wikipedia.png" id="Image49" alt=""></a></div>
<div id="wb_Image50" style="position:absolute;left:626px;top:30px;width:80px;height:80px;z-index:334;">
<a href="#" onclick="$('#jQueryDialog75').dialog('open');self.frames['paisuk1'].location.href = './addeosapps/paint.php';return false;" onmouseenter="AnimateCss('wb_Image50', 'transform-wiggle', 0, 500);return false;"><img src="images/dessinscreen.png" id="Image50" alt=""></a></div>
<div id="wb_Image52" style="position:absolute;left:838px;top:30px;width:80px;height:80px;z-index:335;">
<a href="#" onclick="$('#jQueryDialog62').dialog('open');self.frames['fargk1'].location.href = './addeosapps/fargo.php';return false;" onmouseenter="AnimateCss('wb_Image52', 'transform-wiggle', 0, 500);return false;"><img src="images/fargo.png" id="Image52" alt=""></a></div>
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

<div id="jQueryDialog9" style="z-index:731;">
<a href="addeosapps/wikipedia.php" target="wikipk1"> Charger/Actualiser </a>
<object name="wikipk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog31" style="z-index:732;">
<a href="addeosapps/lemonde.php" target="lemodk1"> Charger/Actualiser </a>
<object name="lemodk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog55" style="z-index:733;">
<a href="addeosapps/szforum.php" target="szfory1"> Charger/Actualiser </a>
<object name="szfory1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog68" style="z-index:734;">
<a href="addeosapps/ocr.php" target="opcro1"> Charger/Actualiser </a>
<object name="opcro1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog75" style="z-index:735;">
<a href="addeosapps/paint.php" target="paisuk1"> Charger/Actualiser </a>
<object name="paisuk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog76" style="z-index:736;">
<a href="addeosapps/nowcoworking.php" target="nowcoo1"> Charger/Actualiser </a>
<object name="nowcoo1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog62" style="z-index:737;">
<a href="addeosapps/fargo.php" target="fargk1"> Charger/Actualiser </a>
<object name="fargk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="Layer24" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:738;">
<script>
var wb_Timer24;
function TimerStartTimer24()
{
   wb_Timer24 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_2.png');
      TimerStartTimer25();
   }, 2500);
}
function TimerStopTimer24()
{
   clearTimeout(wb_Timer24);
}
TimerStartTimer24();
</script>

<script>
var wb_Timer25;
function TimerStartTimer25()
{
   wb_Timer25 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_3.png');
      TimerStartTimer26();
   }, 1200);
}
function TimerStopTimer25()
{
   clearTimeout(wb_Timer25);
}
</script>

<script>
var wb_Timer26;
function TimerStartTimer26()
{
   wb_Timer26 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_4.png');
      TimerStartTimer27();
   }, 1200);
}
function TimerStopTimer26()
{
   clearTimeout(wb_Timer26);
}
</script>

<script>
var wb_Timer27;
function TimerStartTimer27()
{
   wb_Timer27 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_5.png');
      TimerStartTimer28();
   }, 900);
}
function TimerStopTimer27()
{
   clearTimeout(wb_Timer27);
}
</script>

<script>
var wb_Timer28;
function TimerStartTimer28()
{
   wb_Timer28 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_6.png');
      TimerStartTimer29();
   }, 1100);
}
function TimerStopTimer28()
{
   clearTimeout(wb_Timer28);
}
</script>

<script>
var wb_Timer29;
function TimerStartTimer29()
{
   wb_Timer29 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_7.png');
      TimerStartTimer30();
   }, 950);
}
function TimerStopTimer29()
{
   clearTimeout(wb_Timer29);
}
</script>

<script>
var wb_Timer30;
function TimerStartTimer30()
{
   wb_Timer30 = setTimeout(function()
   {
      var event = null;
      SetImage('Image78','images/logo_8.png');
      TimerStartTimer31();
   }, 1100);
}
function TimerStopTimer30()
{
   clearTimeout(wb_Timer30);
}
</script>

<script>
var wb_Timer31;
function TimerStartTimer31()
{
   wb_Timer31 = setTimeout(function()
   {
      var event = null;
      ShowObject('Image78', 0);
      ShowObject('Layer24', 0);
   }, 1000);
}
function TimerStopTimer31()
{
   clearTimeout(wb_Timer31);
}
</script>

<div id="Layer16" style="position:fixed;text-align:left;left:50%;margin-left:-388px;top:auto;bottom:0px;width:776px;height:69px;z-index:352;">
<div id="wb_Text5" style="position:absolute;left:61px;top:26px;width:653px;height:19px;text-align:center;z-index:343;">
<span style="color:#FFFFFF;font-family:Arial;font-size:16px;"><strong>Préparation de votre session en cours...</strong></span></div>
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
   }, 28000);
}
function TimerStopTimer4()
{
   clearTimeout(wb_Timer4);
}
TimerStartTimer4();
</script>

<div id="Layer26" style="position:fixed;text-align:left;left:0px;top:auto;bottom:0px;width:182px;height:214px;z-index:740;">
<div id="wb_Text17" style="position:absolute;left:8px;top:8px;width:163px;height:15px;z-index:353;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;"><strong><em>Fonctions bureautique&nbsp;&nbsp; &nbsp;&nbsp; </em></strong></span><span style="color:#FF0000;font-family:Arial;font-size:12px;"><strong><a href="#" onclick="ShowObject('Layer26', 0);return false;">X</a></strong></span></div>
<hr id="Line2" style="position:absolute;left:7px;top:35px;width:164px;z-index:354;">
<div id="wb_Text22" style="position:absolute;left:8px;top:59px;width:163px;height:16px;z-index:355;cursor: pointer;" onclick="$('#jQueryDialog37').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Changer fond écran</span></div>
<div id="wb_Text48" style="position:absolute;left:7px;top:88px;width:163px;height:16px;z-index:356;cursor: pointer;" onclick="ShowObject('Layer22', 1);ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Afficher la BottomBar</span></div>
<div id="wb_Text51" style="position:absolute;left:7px;top:116px;width:163px;height:16px;z-index:357;cursor: pointer;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Ouvrir l'explorateur</span></div>
<hr id="Line3" style="position:absolute;left:9px;top:143px;width:164px;z-index:358;">
<div id="wb_Text66" style="position:absolute;left:8px;top:167px;width:163px;height:16px;z-index:359;cursor: pointer;" onclick="$('#jQueryDialog17').dialog('open');ShowObject('Layer26', 0);return false;">
<span style="color:#FFA500;font-family:Arial;font-size:13px;">Réparer la session</span></div>
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

<div id="Layer27" style="position:fixed;text-align:left;left:0;top:0;right:0;bottom:0;z-index:742;">
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
      ShowObject('Layer4', 0);
      ShowObject('Layer23', 0);
      ShowObject('jQueryDialog19', 0);
      ShowObject('Layer13', 0);
      ShowObject('Layer12', 0);
      ShowObject('Layer5', 0);
      TimerStartTimer46();
   }, 5500);
}
function TimerStopTimer45()
{
   clearTimeout(wb_Timer45);
}
</script>

<div id="Layer29" style="position:fixed;text-align:left;left:50%;margin-left:-353px;top:auto;bottom:0px;width:706px;height:104px;z-index:363;">
<div id="wb_Text70" style="position:absolute;left:24px;top:28px;width:659px;height:46px;text-align:center;z-index:360;">
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
      ShowObject('Layer5', 1);
      ShowObject('wb_LayoutGrid1', 1);
      ShowObject('wb_LayoutGrid3', 1);
      ShowObject('wb_LayoutGrid4', 1);
      ShowObject('wb_LayoutGrid5', 1);
      ShowObject('wb_LayoutGrid6', 1);
      Animate('Layer5', '', '', '', '', '90', 500, '');
      Animate('Layer13', '', '', '', '', '90', 500, '');
      Animate('wb_PageHeader', '', '', '', '', '100', 500, '');
      Animate('Layer12', '', '', '', '', '90', 500, '');
      Animate('wb_LayoutGrid1', '', '', '', '', '100', 500, '');
      Animate('wb_LayoutGrid3', '', '', '', '', '100', 500, '');
      Animate('wb_LayoutGrid4', '', '', '', '', '100', 500, '');
      Animate('wb_LayoutGrid5', '', '', '', '', '100', 500, '');
      Animate('wb_LayoutGrid6', '', '', '', '', '100', 500, '');
      ShowObject('Layer27', 0);
      $('#jQueryDialog63').dialog('open');
   }, 6000);
}
function TimerStopTimer46()
{
   clearTimeout(wb_Timer46);
}
</script>

<div id="Layer28" style="position:fixed;text-align:left;left:50%;margin-left:-264px;top:50%;margin-top:-187px;width:529px;height:374px;z-index:365;">
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
<div id="jQueryDialog17">
<div id="wb_Text71" style="position:absolute;left:7px;top:13px;width:454px;height:240px;z-index:368;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Ce programme vous permet de recharger correctement votre session et son interface.<br></strong><br><u>Utile dans les cas suivants :<br></u>- Barre de tâches disparue<br>- Icônes non affichés<br>- Grille d'alignement qui affiche plusieurs icônes identiques<br>- Impossibilité de charger la BottomBar ou la Barre d'Action (droite)<br>- Actions qui ne répondent plus<br>- Accès aux programmes qui ne répondent plus<br><strong>Cette procédure vous évite de recharger la page &quot;session&quot; et vous permet de ne pas perdre votre travail.</strong><br><br>La réparation dure quelques instants et résout la plupart des problèmes d'affichages.</span></div>
<input type="button" id="Button2" onclick="ShowObject('Layer27', 1);$('#jQueryDialog17').dialog('close');TimerStartTimer45();return false;" name="" value="Réparer maintenant" style="position:absolute;left:14px;top:276px;width:166px;height:25px;z-index:369;">
<input type="button" id="Button4" onclick="$('#jQueryDialog17').dialog('close');return false;" name="" value="Annuler" style="position:absolute;left:299px;top:276px;width:166px;height:25px;z-index:370;">
</div>

<div id="jQueryDialog63">
<div id="wb_Text72" style="position:absolute;left:111px;top:11px;width:379px;height:80px;z-index:371;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>Procédure de réparation terminée !</strong><br><br>Si vous avez toujours un problème dans votre session nous vous conseillons de vider le cache et les fichiers temporaires de votre navigateur internet (Images et Cookies).</span></div>
<input type="button" id="Button7" onclick="$('#jQueryDialog63').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:186px;top:112px;width:129px;height:25px;z-index:372;">
<div id="wb_FontAwesomeIcon5" style="position:absolute;left:8px;top:11px;width:95px;height:80px;text-align:center;z-index:373;">
<div id="FontAwesomeIcon5"><i class="fa fa-check-circle"></i></div></div>
</div>

<div id="jQueryDialog77" style="z-index:745;">
<div id="wb_Image26" style="position:absolute;left:18px;top:15px;width:540px;height:540px;z-index:374;">
<img src="images/test_pixel_ecran.gif" id="Image26" alt=""></div>
<div id="wb_Image27" style="position:absolute;left:556px;top:15px;width:274px;height:274px;z-index:375;">
<img src="images/test_pixel_ecran.gif" id="Image27" alt=""></div>
<div id="wb_Image29" style="position:absolute;left:556px;top:289px;width:142px;height:142px;z-index:376;">
<img src="images/test_pixel_ecran.gif" id="Image29" alt=""></div>
<div id="wb_Image30" style="position:absolute;left:698px;top:289px;width:142px;height:142px;z-index:377;">
<img src="images/test_pixel_ecran.gif" id="Image30" alt=""></div>
<div id="wb_Image31" style="position:absolute;left:838px;top:289px;width:142px;height:142px;z-index:378;">
<img src="images/test_pixel_ecran.gif" id="Image31" alt=""></div>
<div id="wb_Image44" style="position:absolute;left:975px;top:289px;width:131px;height:142px;z-index:379;">
<img src="images/test_pixel_ecran.gif" id="Image44" alt=""></div>
<div id="wb_Image56" style="position:absolute;left:556px;top:431px;width:550px;height:124px;z-index:380;">
<img src="images/test_pixel_ecran.gif" id="Image56" alt=""></div>
<div id="wb_Image28" style="position:absolute;left:832px;top:15px;width:274px;height:274px;z-index:381;">
<img src="images/test_pixel_ecran.gif" id="Image28" alt=""></div>
</div>

<div id="jQueryDialog78" style="z-index:746;">
<a href="addeosapps/sng.php" target="stiknot1"> Charger/Actualiser </a>
<object name="stiknot1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog79" style="z-index:747;">
<object data="apple/RGBConverter.apple/Widget.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog80" style="z-index:748;">
<object data="apple/FLVPlayer.apple/FLVPlayer.html" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog81" style="z-index:749;">
<object data="apple/eCalc_Scientific.apple/main.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog82" style="z-index:750;">
<object data="linux/helloworld/index.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog83" style="z-index:751;">
<input type="button" id="Button5" onclick="$('#jQueryDialog83').dialog('close');return false;" name="" value="Fermer" style="position:absolute;left:327px;top:176px;width:161px;height:25px;z-index:465;">
<div id="wb_Text44" style="position:absolute;left:13px;top:17px;width:473px;height:16px;z-index:466;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Links-Dialog (sitemap public)</span></div>
<div id="wb_Text50" style="position:absolute;left:13px;top:93px;width:473px;height:16px;z-index:467;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Aides Audio (descriptif audio des fonctions du WebOS)</span></div>
<div id="wb_FontAwesomeIcon6" style="position:absolute;left:14px;top:33px;width:470px;height:42px;text-align:center;z-index:468;">
<a href="#" onclick="$('#jQueryDialog84').dialog('open');return false;"><div id="FontAwesomeIcon6"><i class="fa fa-anchor"></i></div></a></div>
<div id="wb_FontAwesomeIcon8" style="position:absolute;left:14px;top:109px;width:470px;height:42px;text-align:center;z-index:469;">
<a href="#" onclick="PlayAudio('MediaPlayer1');$('#jQueryDialog86').dialog('open');return false;"><div id="FontAwesomeIcon8"><i class="fa fa-audio-description"></i></div></a></div>
</div>

<div id="jQueryDialog84" style="z-index:752;">
<object data="sitemap.xml" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog85" style="z-index:753;">
<div id="wb_MediaPlayer1" style="position:absolute;left:22px;top:76px;width:67px;height:55px;z-index:471;">
<audio src="001.wav" id="MediaPlayer1">
</audio>
</div>
<div id="wb_Text74" style="position:absolute;left:24px;top:13px;width:619px;height:48px;z-index:472;">
<span style="color:#000000;font-family:Arial;font-size:13px;">CETTE FENETRE EST CACHEE. ELLE NE DOIT JAMAIS POUVOIR ETRE APPELEE ! ADMINISTRATEUR ET CONCEPTEUR ; FAITE ATTENTION A VOS CODES ET FONCTIONS JS/PHP D'APPELS ! CETTE FENETRE SERT EXCLUSIVEMENT A LANCER DES AUDIOS.</span></div>
<div id="wb_MediaPlayer2" style="position:absolute;left:96px;top:76px;width:67px;height:55px;z-index:473;">
<audio src="explorateurfichiers.wav" id="MediaPlayer2">
</audio>
</div>
<div id="wb_MediaPlayer3" style="position:absolute;left:174px;top:76px;width:67px;height:55px;z-index:474;">
<audio src="applisinternes.wav" id="MediaPlayer3">
</audio>
</div>
<div id="wb_MediaPlayer4" style="position:absolute;left:254px;top:76px;width:67px;height:55px;z-index:475;">
<audio src="bienvenue.wav" id="MediaPlayer4">
</audio>
</div>
<div id="wb_MediaPlayer5" style="position:absolute;left:332px;top:76px;width:67px;height:55px;z-index:476;">
<audio src="parametres.wav" id="MediaPlayer5">
</audio>
</div>
</div>

<div id="jQueryDialog86" style="z-index:754;">
<div id="wb_FontAwesomeIcon9" style="position:absolute;left:27px;top:17px;width:238px;height:131px;text-align:center;z-index:477;">
<div id="FontAwesomeIcon9"><i class="fa fa-audio-description"></i></div></div>
<input type="button" id="Button8" onclick="PlayAudio('MediaPlayer2');$('#jQueryDialog5').dialog('open');StopAudio('MediaPlayer3');StopAudio('MediaPlayer4');StopAudio('MediaPlayer5');return false;" name="" value="Explorateur de fichiers" style="position:absolute;left:26px;top:166px;width:241px;height:25px;z-index:478;">
<input type="button" id="Button43" onclick="PlayAudio('MediaPlayer3');$('#jQueryDialog3').dialog('open');StopAudio('MediaPlayer2');StopAudio('MediaPlayer4');StopAudio('MediaPlayer5');return false;" name="" value="Applications Internes" style="position:absolute;left:26px;top:201px;width:241px;height:25px;z-index:479;">
<input type="button" id="Button44" onclick="PlayAudio('MediaPlayer4');ShowObject('Layer1', 1);StopAudio('MediaPlayer2');StopAudio('MediaPlayer3');StopAudio('MediaPlayer5');return false;" name="" value="Fenêtre Bienvenue" style="position:absolute;left:26px;top:237px;width:241px;height:25px;z-index:480;">
<input type="button" id="Button45" onclick="PlayAudio('MediaPlayer5');$('#jQueryDialog100').dialog('open');StopAudio('MediaPlayer2');StopAudio('MediaPlayer3');StopAudio('MediaPlayer4');return false;" name="" value="Paramètres session" style="position:absolute;left:26px;top:272px;width:241px;height:25px;z-index:481;">
</div>

<div id="jQueryDialog87" style="z-index:755;">
<a href="addeosapps/liligo.php" target="lilig1"> Charger/Actualiser </a>
<object name="lilig1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
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

<div id="jQueryDialog45" style="z-index:758;">
<div id="Html14" style="position:absolute;left:14px;top:167px;width:850px;height:77px;z-index:484">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://rynnawebos.fr/login/maj.php">
</iframe></div>
<div id="wb_Text43" style="position:absolute;left:14px;top:68px;width:848px;height:24px;text-align:center;z-index:485;">
<span style="color:#FF6347;font-family:Arial;font-size:21px;"><strong>50.0</strong></span></div>
<div id="wb_Text42" style="position:absolute;left:14px;top:120px;width:460px;height:16px;z-index:486;">
<span style="color:#000000;font-family:Arial;font-size:13px;">La dernière version disponible (code source) est la suivante :</span></div>
<div id="wb_Text46" style="position:absolute;left:14px;top:18px;width:460px;height:16px;z-index:487;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Votre version est actuellement :</span></div>
<div id="wb_Text76" style="position:absolute;left:17px;top:257px;width:847px;height:31px;z-index:488;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Souhaitez-vous télécharger la dernière version ?<br></span><span style="color:#000000;font-family:Arial;font-size:12px;"><em>Vous devez disposer d'un serveur local ou en ligne avec vos droits Administrateur pour pouvoir installer la dernière version sur votre serveur FTP !</em></span></div>
<input type="submit" id="Button47" onclick="window.location.href='https://github.com/AlgoStepCompany/RynnaWebOS-Original/archive/master.zip';return false;" name="" value="Télécharger la dernière version disponible du WebOS (code source MASTER officiel et complet)" style="position:absolute;left:12px;top:321px;width:852px;height:25px;z-index:489;">
</div>

<div id="jQueryDialog42" style="z-index:759;">
<input type="button" id="Button48" onclick="$('#jQueryDialog46').dialog('open');return false;" name="" value="Ouvrir la Bibliothèque locale" style="position:absolute;left:28px;top:22px;width:215px;height:25px;z-index:490;">
<input type="button" id="Button49" onclick="$('#jQueryDialog47').dialog('open');self.frames['eboom1'].location.href = './addeosapps/ebook.php';return false;" name="" value="Télécharger de nouveau e-book" style="position:absolute;left:28px;top:60px;width:215px;height:25px;z-index:491;">
<div id="wb_Image57" style="position:absolute;left:76px;top:97px;width:125px;height:93px;z-index:492;">
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

<div id="jQueryDialog88" style="z-index:762;">
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

<div id="jQueryDialog90" style="z-index:765;">
<a href="addeosapps/4sync.php" target="syncc1"> Charger/Actualiser </a>
<object name="syncc1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog91" style="z-index:766;">
<div id="Html115" style="position:absolute;left:7px;top:18px;width:306px;height:143px;z-index:495">
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=768,width=1024'); return false;" >Dupliquer la session (1024X768)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=900,width=1180'); return false;" >Dupliquer la session (1180X900</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=800,width=1120'); return false;" >Dupliquer la session (1120X800)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=900,width=1600'); return false;" >Dupliquer la session (1600X900)</a><br />
<a href="session.php"  onclick="open('session.php', 'Popup', 'scrollbars=1,resizable=1,height=1080,width=1920'); return false;" >Dupliquer la session (1920X1080)</a><br />
<br>
Vous ne pouvez lancer qu'un processus à la fois !</div>
</div>

<div id="jQueryDialog92" style="z-index:767;">
<textarea name="TextArea2" id="TextArea2" style="position:absolute;left:12px;top:194px;width:728px;height:247px;z-index:496;" rows="12" cols="71" readonly spellcheck="false">EXTENSIONS[
editable_ext(txt,php,php3,phtml,inc,sql,pl,htm,html,shtml,dhtml,xml,js,css,cgi,cpp,cc,cxx,hpp,h,pas,p,java,py,sh,tcl,tk);
windows_ext(dir,exe,dll,file,bat,com,cur,ini,inf,log);
text_ext(txt,doc,docx,wrpm,nod,nol,ndd,dne,log,rtf);
images_ext(gif,dds,jpg,jpeg,bmp,png,tga);
compressed_ext(zip,7z,tar,gzip,bzip2,rar,rar1);
music_ext(mp3,ogg,wav,midi,real,flac);
movie_ext(mpg,mov,mp4,avi,mkv,dvo,voda,flash,pnv,virol,vlcm);
adobe_ext(pdf);
other_ext(ico,cur,pnl,mod,nod,control,crl,cltr,dac,flac);
]</textarea>
<textarea name="TextArea3" id="TextArea3" style="position:absolute;left:12px;top:17px;width:728px;height:154px;z-index:497;" rows="7" cols="71" readonly spellcheck="false">MODULES[
editable_ext=NOK
windows_ext=WIN
text_ext=WEB
images_ext=WEB
compressed_ext=WEB
music_ext=WEB
movie_ext=WEB
adobe_ext=WEB
other_ext=WEB
]

// Informations
// NOK = Non définit
// WIN = prise en charge Windows
// WEB = prise en charge dans la navigateur web par défaut
// [ID_OBJECT] = référenceo u nom de l'objet à lancer pour le module ciblé
// UNX = prise en charge Unix
// OSX = prise en charge OSx
// NTK = prise en charge par le noyau NT WRK de Microsoft
// CPC = prise en charge CPCDOS
// ERR = affiche une erreur de gestion d'ouverture, pratique pour tester un flux et une action précise d'une fenêtre ou des extensions cibles</textarea>
<input type="submit" id="Button34" onclick="$('#jQueryDialog92').dialog('close');return false;" name="" value="Terminer" style="position:absolute;left:574px;top:471px;width:174px;height:25px;z-index:498;">
</div>











<div id="jQueryDialog93" style="z-index:778;">
<a href="addeosapps/stellarium.php" target="stermk1"> Charger/Actualiser </a>
<object name="stermk1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<script>
var wb_Timer11;
function TimerStartTimer11()
{
   wb_Timer11 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer5', 0);
      TimerStopTimer11();
   }, 100);
}
function TimerStopTimer11()
{
   clearTimeout(wb_Timer11);
}
</script>

<script>
var wb_Timer13;
function TimerStartTimer13()
{
   wb_Timer13 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer5', 0);
   }, 55);
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
      ShowObject('Layer5', 0);
   }, 70);
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
      ShowObject('Layer12', 0);
   }, 45);
}
function TimerStopTimer15()
{
   clearTimeout(wb_Timer15);
}
TimerStartTimer15();
</script>

<script>
var wb_Timer16;
function TimerStartTimer16()
{
   wb_Timer16 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer12', 0);
   }, 30);
}
function TimerStopTimer16()
{
   clearTimeout(wb_Timer16);
}
TimerStartTimer16();
</script>

<div id="jQueryDialog94">
<div id="wb_Logout2" style="position:absolute;left:29px;top:25px;width:320px;height:22px;z-index:500;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Confirmer l'arrêt" id="Logout2">
</form>
</div>
</div>

<div id="jQueryDialog95">
<div id="wb_Text95" style="position:absolute;left:26px;top:15px;width:325px;height:32px;z-index:501;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Vérifiez que vos données et programmes ouverts sont bien fermés pour éviter la perte de données.</span></div>
<input type="submit" id="Button35" onclick="window.location.href='./reboot.php';return false;" name="" value="Confirmer le redémarrage" style="position:absolute;left:29px;top:64px;width:322px;height:25px;z-index:502;">
</div>

<div id="Layer5" style="position:absolute;text-align:left;left:0px;top:37px;width:326px;height:521px;z-index:786;">
<div id="wb_LoginName2" style="position:absolute;left:81px;top:20px;width:228px;height:35px;z-index:503;">
<span id="LoginName2">Bienvenue <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'dans la session de demonstration';
}
?> !</span></div>
<div id="wb_FontAwesomeIcon10" style="position:absolute;left:14px;top:10px;width:67px;height:68px;text-align:center;z-index:504;">
<div id="FontAwesomeIcon10"><i class="fa fa-id-badge"></i></div></div>
<div id="wb_FontAwesomeIcon2" style="position:absolute;left:36px;top:90px;width:45px;height:35px;text-align:center;z-index:505;">
<a href="#" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon2"><i class="fa fa-dropbox"></i></div></a></div>
<div id="wb_Text2" style="position:absolute;left:92px;top:100px;width:190px;height:14px;z-index:506;cursor: pointer;" onclick="$('#jQueryDialog3').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applications générales</span></div>
<div id="wb_FontAwesomeIcon19" style="position:absolute;left:36px;top:138px;width:45px;height:36px;text-align:center;z-index:507;">
<a href="#" onclick="$('#jQueryDialog105').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon19"><i class="fa fa-tencent-weibo"></i></div></a></div>
<div id="wb_Text52" style="position:absolute;left:92px;top:146px;width:202px;height:14px;z-index:508;cursor: pointer;" onclick="$('#jQueryDialog105').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Rechercher une page précise</span></div>
<div id="wb_FontAwesomeIcon4" style="position:absolute;left:36px;top:185px;width:45px;height:32px;text-align:center;z-index:509;">
<a href="#" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon4"><i class="fa fa-folder-open-o"></i></div></a></div>
<div id="wb_Text12" style="position:absolute;left:92px;top:194px;width:202px;height:14px;z-index:510;cursor: pointer;" onclick="$('#jQueryDialog5').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Explorateur Fichiers</span></div>
<div id="wb_FontAwesomeIcon7" style="position:absolute;left:36px;top:226px;width:45px;height:42px;text-align:center;z-index:511;">
<a href="#" onclick="$('#jQueryDialog54').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon7"><i class="fa fa-list-alt"></i></div></a></div>
<div id="wb_Text13" style="position:absolute;left:92px;top:238px;width:212px;height:14px;z-index:512;cursor: pointer;" onclick="$('#jQueryDialog54').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Applis de la communautée</span></div>
<div id="wb_FontAwesomeIcon18" style="position:absolute;left:36px;top:276px;width:45px;height:37px;text-align:center;z-index:513;">
<a href="#" onclick="$('#jQueryDialog32').dialog('close');ShowObject('jQueryDialog33', 0);$('#jQueryDialog34').dialog('close');$('#jQueryDialog35').dialog('close');$('#jQueryDialog36').dialog('close');$('#jQueryDialog37').dialog('close');$('#jQueryDialog38').dialog('close');$('#jQueryDialog39').dialog('close');$('#jQueryDialog100').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon18"><i class="fa fa-gears"></i></div></a></div>
<div id="wb_Text25" style="position:absolute;left:92px;top:288px;width:212px;height:14px;z-index:514;cursor: pointer;" onclick="$('#jQueryDialog32').dialog('close');ShowObject('jQueryDialog33', 0);$('#jQueryDialog34').dialog('close');$('#jQueryDialog35').dialog('close');$('#jQueryDialog36').dialog('close');$('#jQueryDialog37').dialog('close');$('#jQueryDialog38').dialog('close');$('#jQueryDialog39').dialog('close');$('#jQueryDialog100').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Paramètres et Aides</span></div>
<div id="wb_FontAwesomeIcon14" style="position:absolute;left:36px;top:322px;width:45px;height:39px;text-align:center;z-index:515;">
<a href="#" onclick="$('#jQueryDialog8').dialog('open');ShowObject('Layer5', 0);return false;"><div id="FontAwesomeIcon14"><i class="fa fa-at"></i></div></a></div>
<div id="wb_Text24" style="position:absolute;left:92px;top:336px;width:212px;height:14px;z-index:516;cursor: pointer;" onclick="$('#jQueryDialog8').dialog('open');ShowObject('Layer5', 0);return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Navigateur internet</span></div>
<div id="wb_MaterialIcon26" style="position:absolute;left:26px;top:442px;width:41px;height:34px;text-align:center;z-index:517;">
<a href="#" onclick="ShowObject('Layer5', 0);$('#jQueryDialog18').dialog('open');return false;"><div id="MaterialIcon26"><i class="material-icons">&#xe1b2;</i></div></a></div>
<div id="wb_Text28" style="position:absolute;left:14px;top:476px;width:64px;height:24px;text-align:center;z-index:518;">
<span style="color:#FFFFFF;font-family:Arial;font-size:9.3px;">Modifier ma session</span></div>
<hr id="Line4" style="position:absolute;left:11px;top:430px;width:303px;z-index:519;">
<div id="wb_JavaScript3" style="position:absolute;left:84px;top:55px;width:147px;height:23px;z-index:520;">
<div style="color:#FFFFFF;font-size:12px;font-family:Arial;font-weight:normal;font-style:normal;text-align:left;text-decoration:none" id="basicclock"></div>
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
<div id="wb_FontAwesomeIcon3" style="position:absolute;left:107px;top:444px;width:34px;height:30px;text-align:center;z-index:521;">
<a href="#" onclick="ShowObject('Layer5', 0);$('#jQueryDialog37').dialog('open');return false;"><div id="FontAwesomeIcon3"><i class="fa fa-file-image-o"></i></div></a></div>
<div id="wb_Text85" style="position:absolute;left:92px;top:476px;width:64px;height:24px;text-align:center;z-index:522;">
<span style="color:#FFFFFF;font-family:Arial;font-size:9.3px;">Changer fond d'écran</span></div>
<div id="wb_FontAwesomeIcon26" style="position:absolute;left:181px;top:444px;width:34px;height:30px;text-align:center;z-index:523;">
<a href="#" onclick="$('#jQueryDialog83').dialog('open');return false;"><div id="FontAwesomeIcon26"><i class="fa fa-flask"></i></div></a></div>
<div id="wb_Text15" style="position:absolute;left:166px;top:476px;width:64px;height:24px;text-align:center;z-index:524;">
<span style="color:#FFFFFF;font-family:Arial;font-size:9.3px;">Ouvrir lecture serveur</span></div>
<div id="wb_FontAwesomeIcon27" style="position:absolute;left:255px;top:444px;width:34px;height:30px;text-align:center;z-index:525;">
<a href="#" onclick="ShowObject('Layer12', 1);ShowObject('Layer5', 0);ShowObject('Layer13', 0);return false;"><div id="FontAwesomeIcon27"><i class="fa fa-external-link"></i></div></a></div>
<div id="wb_Text94" style="position:absolute;left:240px;top:476px;width:64px;height:24px;text-align:center;z-index:526;">
<span style="color:#FFFFFF;font-family:Arial;font-size:9.3px;">Options de session</span></div>
<div id="wb_FontAwesomeIcon29" style="position:absolute;left:38px;top:375px;width:45px;height:39px;text-align:center;z-index:527;">
<a href="#" onclick="$('#jQueryDialog96').dialog('open');ShowObject('Layer5', 0);$('#jQueryDialog97').dialog('open');return false;"><div id="FontAwesomeIcon29"><i class="fa fa-file-pdf-o"></i></div></a></div>
<div id="wb_Text106" style="position:absolute;left:92px;top:387px;width:210px;height:14px;z-index:528;cursor: pointer;" onclick="$('#jQueryDialog96').dialog('open');ShowObject('Layer5', 0);$('#jQueryDialog97').dialog('open');return false;">
<span style="color:#FFFFFF;font-family:Arial;font-size:11px;">Lire le manuel d'utilisation</span></div>
</div>
<div id="Layer12" style="position:fixed;text-align:left;left:50%;margin-left:-296px;top:50%;margin-top:-139px;width:593px;height:279px;z-index:787;">
<div id="wb_FontAwesomeIcon11" style="position:absolute;left:12px;top:15px;width:67px;height:68px;text-align:center;z-index:529;">
<div id="FontAwesomeIcon11"><i class="fa fa-id-badge"></i></div></div>
<div id="wb_LoginName1" style="position:absolute;left:89px;top:38px;width:440px;height:23px;z-index:530;">
<span id="LoginName1">Que souhaitez vous faire <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['username'];
}
else
{
   echo 'dans la session de demonstration';
}
?> ?</span></div>
<div id="wb_FontAwesomeIcon12" style="position:absolute;left:416px;top:97px;width:100px;height:85px;text-align:center;z-index:531;">
<a href="#" onclick="$('#jQueryDialog94').dialog('open');ShowObject('Layer12', 0);return false;"><div id="FontAwesomeIcon12"><i class="fa fa-power-off"></i></div></a></div>
<div id="wb_FontAwesomeIcon13" style="position:absolute;left:254px;top:97px;width:100px;height:85px;text-align:center;z-index:532;">
<a href="#" onclick="$('#jQueryDialog95').dialog('open');ShowObject('Layer12', 0);return false;"><div id="FontAwesomeIcon13"><i class="fa fa-refresh"></i></div></a></div>
<div id="wb_FontAwesomeIcon28" style="position:absolute;left:79px;top:97px;width:100px;height:85px;text-align:center;z-index:533;">
<a href="#" onclick="ShowObject('Layer12', 0);return false;"><div id="FontAwesomeIcon28"><i class="fa fa-undo"></i></div></a></div>
<div id="wb_Text19" style="position:absolute;left:59px;top:202px;width:140px;height:36px;text-align:center;z-index:534;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Annuler et revenir à la session</strong></span></div>
<div id="wb_Text20" style="position:absolute;left:234px;top:202px;width:140px;height:36px;text-align:center;z-index:535;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Recharger votre session</strong></span></div>
<div id="wb_Text21" style="position:absolute;left:396px;top:202px;width:140px;height:36px;text-align:center;z-index:536;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Fermer votre session</strong></span></div>
</div>
<div id="Layer4" style="position:fixed;text-align:right;right:0;top:0;bottom:0;width:90px;z-index:788;" onmouseleave="ShowObject('Layer4', 0);return false;">
<div id="Layer4_Container" style="width:3000px;position:relative;margin-left:auto;margin-right:0;text-align:left;">
<div id="wb_FontAwesomeIcon21" style="position:absolute;left:19px;top:16px;width:57px;height:43px;text-align:center;z-index:537;">
<a href="#" onclick="$('#jQueryDialog70').dialog('open');return false;"><div id="FontAwesomeIcon21"><i class="fa fa-camera"></i></div></a></div>
<div id="wb_FontAwesomeIcon22" style="position:absolute;left:19px;top:73px;width:57px;height:54px;text-align:center;z-index:538;">
<a href="#" onclick="$('#jQueryDialog72').dialog('open');self.frames['devimk1'].location.href = './addeosapps/devise.php';return false;"><div id="FontAwesomeIcon22"><i class="fa fa-euro"></i></div></a></div>
<div id="wb_FontAwesomeIcon24" style="position:absolute;left:21px;top:204px;width:55px;height:53px;text-align:center;z-index:539;">
<a href="#" onclick="$('#jQueryDialog3').dialog('close');$('#jQueryDialog5').dialog('close');$('#jQueryDialog11').dialog('close');ShowObject('Layer7', 1);return false;"><div id="FontAwesomeIcon24"><i class="fa fa-codepen"></i></div></a></div>
<div id="wb_FontAwesomeIcon25" style="position:absolute;left:19px;top:273px;width:57px;height:55px;text-align:center;z-index:540;">
<a href="#" onclick="$('#jQueryDialog73').dialog('open');return false;"><div id="FontAwesomeIcon25"><i class="fa fa-save"></i></div></a></div>
<div id="wb_FontAwesomeIcon23" style="position:absolute;left:19px;top:136px;width:57px;height:50px;text-align:center;z-index:541;">
<a href="#" onclick="$('#jQueryDialog71').dialog('open');self.frames['agenk1'].location.href = './addeosapps/agenda.php';return false;"><div id="FontAwesomeIcon23"><i class="fa fa-calendar"></i></div></a></div>
</div>
</div>
<script>
var wb_Timer17;
function TimerStartTimer17()
{
   wb_Timer17 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer13', 0);
   }, 25);
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
      ShowObject('Layer13', 0);
   }, 60);
}
function TimerStopTimer18()
{
   clearTimeout(wb_Timer18);
}
TimerStartTimer18();
</script>

<script>
var wb_Timer19;
function TimerStartTimer19()
{
   wb_Timer19 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer13', 0);
   }, 100);
}
function TimerStopTimer19()
{
   clearTimeout(wb_Timer19);
}
</script>

<div id="jQueryDialog96" style="z-index:792;">
<object data="Manuel.pdf" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog97" style="z-index:793;">
<div id="wb_Text107" style="position:absolute;left:16px;top:20px;width:396px;height:17px;z-index:543;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Souhaitez-vous plutôt découvrir Rynna WebOS en vidéo ?</span></div>
<input type="button" id="Button9" name="" value="Oui" style="position:absolute;left:38px;top:78px;width:150px;height:25px;z-index:544;" disabled>
<input type="button" id="Button28" onclick="$('#jQueryDialog97').dialog('close');return false;" name="" value="Pas maintenant" style="position:absolute;left:245px;top:78px;width:150px;height:25px;z-index:545;">
</div>

<div id="jQueryDialog98">
<div id="wb_Text109" style="position:absolute;left:70px;top:61px;width:250px;height:16px;text-align:center;z-index:546;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Annuler</span></div>
</div>


<div id="jQueryDialog29" style="z-index:796;">
<div id="wb_Text6" style="position:absolute;left:13px;top:16px;width:379px;height:273px;text-align:center;z-index:547;">
<span style="color:#FF0000;font-family:Arial;font-size:15px;"><strong>AVERTISSEMENT</strong></span><span style="color:#000000;font-family:Arial;font-size:15px;"> concernant l'utilisation du Chat publique.<br><br>Ce Chat vous permet de discuter entre tout les utilisateurs en ligne du WebOS.<br><br>Veuillez être polis et respectueux.<br>Toutes personnes utilisant le Chat en étant grossier, malveillants ou en publiant des textes illégaux verra son compte fermé et son IP banni.<br><br>Nous autorisons la publicité sur ce Chat pour faire partager vos projets, vos actions ou votre entreprise, mais veuillez ne pas en abuser.<br><br>Merci pour votre compréhension.</span></div>
<input type="submit" id="Button6" onclick="$('#jQueryDialog10').dialog('open');$('#jQueryDialog29').dialog('close');return false;" name="" value="J'accepte les conditions" style="position:absolute;left:15px;top:309px;width:374px;height:25px;z-index:548;">
<div id="wb_Text81" style="position:absolute;left:11px;top:343px;width:383px;height:70px;text-align:justify;z-index:549;">
<span style="color:#000000;font-family:Arial;font-size:11px;"><em>Le Tchat est basé sur chatbox.fr ; elle est conçu pour le serveur rynnawebos.fr uniquement. Si vous êtes Administrateur de votre propre version du WebOS vous pouvez éditer le code du Tchat pour l'ajuster à votre propre Tchat. Vous pouvez aussi masquer ce texte en supprimant l'objet PHP ID &quot;Text81&quot;.</em></span></div>
</div>

<script>
var wb_Timer20;
function TimerStartTimer20()
{
   wb_Timer20 = setTimeout(function()
   {
      var event = null;
      ShowObject('Layer4', 0);
   }, 360);
}
function TimerStopTimer20()
{
   clearTimeout(wb_Timer20);
}
TimerStartTimer20();
</script>



<div id="Layer13" style="position:absolute;text-align:left;left:376px;top:37px;width:238px;height:252px;z-index:800;">
<div id="wb_MaterialIcon31" style="position:absolute;left:15px;top:15px;width:52px;height:43px;text-align:center;z-index:550;">
<a href="#" onclick="ShowObject('jQueryDialog52', 0);$('#jQueryDialog53').dialog('open');return false;"><div id="MaterialIcon31"><i class="material-icons">&#xe0d8;</i></div></a></div>
<div id="wb_Text53" style="position:absolute;left:78px;top:28px;width:130px;height:15px;z-index:551;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Notes</span></div>
<div id="wb_Image15" style="position:absolute;left:19px;top:58px;width:43px;height:43px;z-index:552;">
<a href="#" onclick="$('#jQueryDialog15').dialog('open');ShowObject('jQueryDialog52', 0);return false;"><img src="images/52925.png" id="Image15" alt="" title="Calendrier"></a></div>
<div id="wb_Text3" style="position:absolute;left:79px;top:71px;width:137px;height:15px;z-index:553;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Calendrier</span></div>
<div id="wb_MaterialIcon61" style="position:absolute;left:21px;top:104px;width:39px;height:37px;text-align:center;z-index:554;">
<a href="#" onclick="ShowObject('jQueryDialog52', 0);$('#jQueryDialog69').dialog('open');return false;"><div id="MaterialIcon61"><i class="material-icons">&#xe889;</i></div></a></div>
<div id="wb_Text102" style="position:absolute;left:79px;top:115px;width:137px;height:15px;z-index:555;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Horloge</span></div>
<div id="wb_MaterialIcon37" style="position:absolute;left:20px;top:146px;width:42px;height:36px;text-align:center;z-index:556;">
<a href="#" onclick="ShowObject('jQueryDialog52', 0);$('#jQueryDialog42').dialog('open');return false;"><div id="MaterialIcon37"><i class="material-icons">&#xe865;</i></div></a></div>
<div id="wb_Text77" style="position:absolute;left:79px;top:159px;width:130px;height:15px;z-index:557;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Bibliothèque</span></div>
<div id="wb_MaterialIcon35" style="position:absolute;left:21px;top:185px;width:38px;height:40px;text-align:center;z-index:558;">
<a href="#" onclick="ShowObject('jQueryDialog52', 0);$('#jQueryDialog91').dialog('open');return false;"><div id="MaterialIcon35"><i class="material-icons">&#xe22f;</i></div></a></div>
<div id="wb_Text82" style="position:absolute;left:79px;top:199px;width:130px;height:15px;z-index:559;">
<span style="color:#FFFFFF;font-family:Arial;font-size:12px;">Duplicateur</span></div>
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
var editeur = "AlgoStep Company - Loic ALLIAUME";
var dexsamsung = "open::loaddex()";
var dexaccess = "session.php";
var dexmode = "1";
var dexlog = "0";
var dexy = "1080";
var dexx = "1960";
var csd = "1x999";
var csg = "1x000";
var cid = "0x999";
var cig = "0x000";
<!-- Variables de sécurités 2019 LOD -->
var chromecore = "/security";
var mozillacore = "/security";
var iecore = "/security";
var edgecore = "/security";
var neoncore = "/security";
var passlod = "1";
var autorizedactlod = "1";
var othercore = "nop.php";
<!-- Variables Signal -->
var SIGNKILL = "1326";
var SIGNTERM = "4291";
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
</div>
<div id="jQueryDialog99" style="z-index:801;">
<div id="wb_Text124" style="position:absolute;left:14px;top:19px;width:395px;height:32px;z-index:561;">
<span style="color:#000000;font-family:Arial;font-size:13px;">L'interface Challenger a été retirée et n'est plus disponible.<br>Veuillez nous en excuser.</span></div>
</div>

<div id="jQueryDialog100" style="z-index:802;">
<div id="wb_MaterialIcon18" style="position:absolute;left:26px;top:24px;width:96px;height:79px;text-align:center;z-index:613;">
<a href="#" onclick="$('#jQueryDialog32').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon18"><i class="material-icons">&#xe88f;</i></div></a></div>
<div id="wb_Text128" style="position:absolute;left:8px;top:123px;width:124px;height:36px;text-align:center;z-index:614;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Informations sur le WebOS</strong></span></div>
<div id="wb_MaterialIcon28" style="position:absolute;left:181px;top:24px;width:98px;height:79px;text-align:center;z-index:615;">
<a href="#" onclick="$('#jQueryDialog101').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon28"><i class="material-icons">&#xe894;</i></div></a></div>
<div id="wb_Text129" style="position:absolute;left:168px;top:123px;width:124px;height:54px;text-align:center;z-index:616;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester la connexion internet</strong></span></div>
<div id="wb_MaterialIcon40" style="position:absolute;left:336px;top:24px;width:91px;height:79px;text-align:center;z-index:617;">
<a href="#" onclick="$('#jQueryDialog34').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon40"><i class="material-icons">&#xe0c8;</i></div></a></div>
<div id="wb_Text130" style="position:absolute;left:319px;top:123px;width:124px;height:36px;text-align:center;z-index:618;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Connaître mon adresse IP</strong></span></div>
<div id="wb_MaterialIcon41" style="position:absolute;left:499px;top:24px;width:89px;height:79px;text-align:center;z-index:619;">
<a href="#" onclick="$('#jQueryDialog35').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon41"><i class="material-icons">&#xe0da;</i></div></a></div>
<div id="wb_Text131" style="position:absolute;left:484px;top:123px;width:124px;height:36px;text-align:center;z-index:620;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Supprimer votre compte</strong></span></div>
<div id="wb_MaterialIcon42" style="position:absolute;left:25px;top:201px;width:99px;height:76px;text-align:center;z-index:621;">
<a href="#" onclick="$('#jQueryDialog36').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon42"><i class="material-icons">&#xe312;</i></div></a></div>
<div id="wb_Text132" style="position:absolute;left:8px;top:285px;width:124px;height:36px;text-align:center;z-index:622;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Tester mon clavier</strong></span></div>
<div id="wb_MaterialIcon43" style="position:absolute;left:186px;top:206px;width:89px;height:71px;text-align:center;z-index:623;">
<a href="#" onclick="$('#jQueryDialog37').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon43"><i class="material-icons">&#xe3c4;</i></div></a></div>
<div id="wb_Text133" style="position:absolute;left:168px;top:285px;width:124px;height:36px;text-align:center;z-index:624;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Changer votre fond d'écran</strong></span></div>
<div id="wb_MaterialIcon44" style="position:absolute;left:341px;top:201px;width:81px;height:76px;text-align:center;z-index:625;">
<a href="#" onclick="$('#jQueryDialog39').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon44"><i class="material-icons">&#xe8e8;</i></div></a></div>
<div id="wb_Text134" style="position:absolute;left:319px;top:285px;width:124px;height:36px;text-align:center;z-index:626;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Verifier la protection</strong></span></div>
<div id="wb_MaterialIcon45" style="position:absolute;left:510px;top:199px;width:78px;height:86px;text-align:center;z-index:627;">
<a href="#" onclick="$('#jQueryDialog38').dialog('open');return false;"><div id="MaterialIcon45"><i class="material-icons">&#xe8df;</i></div></a></div>
<div id="wb_Text135" style="position:absolute;left:487px;top:285px;width:124px;height:36px;text-align:center;z-index:628;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Calendrier détaillé</strong></span></div>
<div id="wb_MaterialIcon46" style="position:absolute;left:655px;top:24px;width:99px;height:79px;text-align:center;z-index:629;">
<a href="#" onclick="$('#jQueryDialog2').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon46"><i class="material-icons">&#xe8c2;</i></div></a></div>
<div id="wb_MaterialIcon47" style="position:absolute;left:670px;top:199px;width:68px;height:80px;text-align:center;z-index:630;">
<a href="#" onclick="$('#jQueryDialog26').dialog('open');$('#jQueryDialog100').dialog('close');return false;"><div id="MaterialIcon47"><i class="material-icons">&#xe06d;</i></div></a></div>
<div id="wb_Text136" style="position:absolute;left:642px;top:123px;width:124px;height:36px;text-align:center;z-index:631;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Gestion des erreurs</strong></span></div>
<div id="wb_Text137" style="position:absolute;left:642px;top:285px;width:124px;height:36px;text-align:center;z-index:632;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Test écran et netteté</strong></span></div>
<div id="wb_MaterialIcon48" style="position:absolute;left:29px;top:361px;width:90px;height:72px;text-align:center;z-index:633;">
<a href="#" onclick="$('#jQueryDialog45').dialog('open');return false;"><div id="MaterialIcon48"><i class="material-icons">&#xe328;</i></div></a></div>
<div id="wb_Text138" style="position:absolute;left:12px;top:453px;width:124px;height:36px;text-align:center;z-index:634;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Vérification mise à jour WebOS</strong></span></div>
<div id="wb_MaterialIcon49" style="position:absolute;left:187px;top:361px;width:90px;height:72px;text-align:center;z-index:635;">
<a href="#" onclick="$('#jQueryDialog92').dialog('open');return false;"><div id="MaterialIcon49"><i class="material-icons">&#xe8ce;</i></div></a></div>
<div id="wb_Text139" style="position:absolute;left:168px;top:453px;width:124px;height:36px;text-align:center;z-index:636;">
<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"><strong>Registre d'extensions</strong></span></div>
</div>

<div id="jQueryDialog101" style="z-index:803;">
<div id="wb_MaterialIcon50" style="position:absolute;left:10px;top:11px;width:37px;height:37px;text-align:center;z-index:637;">
<a href="#" onclick="$('#jQueryDialog100').dialog('open');$('#jQueryDialog101').dialog('close');return false;"><div id="MaterialIcon50"><i class="material-icons">&#xe5cb;</i></div></a></div>
<div id="wb_Text140" style="position:absolute;left:94px;top:21px;width:437px;height:16px;z-index:638;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Testez votre connexion internet (débit montant/descendant) :</span></div>
<div id="Html131" style="position:absolute;left:18px;top:59px;width:831px;height:413px;z-index:639">
<iframe width="100%" height="100%" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"
   src="http://www.ariase.com/fr/vitesse/">
</iframe><br /></div>
</div>

<div id="jQueryDialog102" style="z-index:804;">
<object data="system/program/texteditor/editor.html" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog103" style="z-index:805;">
<a href="addeosapps/wordpad.php" target="edtxta1"> Charger/Actualiser </a>
<object name="edtxta1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog104" style="z-index:806;">
<a href="addeosapps/meteo.php" target="meteok1"> Charger/Actualiser </a>
<object name="meteok1" data="thread.txt" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog105" style="z-index:807;">
<form name="SiteSearch2_form" id="SiteSearch2_form" role="search" accept-charset="UTF-8" onsubmit="return searchPage(features)">
<input type="text" id="SiteSearch2" style="position:absolute;left:130px;top:49px;width:350px;height:20px;z-index:643;" name="SiteSearch1" value="" spellcheck="false" placeholder="Rechercher un programme, une fen&#234;tre, un script" role="searchbox"></form>
<div id="SiteSearch2-dialog" title="Resultats"></div>
<input type="button" id="Button50" onclick="searchPage();return false;" name="Search" value="Rechercher" style="position:absolute;left:383px;top:80px;width:96px;height:25px;z-index:644;">
<div id="wb_FontAwesomeIcon31" style="position:absolute;left:11px;top:16px;width:103px;height:97px;text-align:center;z-index:645;">
<a href="#" onclick="AnimateCss('wb_FontAwesomeIcon19', 'transform-3d-flip-in-y', 0, 1200);return false;"><div id="FontAwesomeIcon31"><i class="fa fa-tencent-weibo"></i></div></a></div>
</div>

<div id="jQueryDialog1" style="z-index:808;">
<object data="gamemanager.php" type="text/html" width="100%" height="100%" style="overflow:hidden" ></object>
</div>

<div id="jQueryDialog6" style="z-index:809;">
<iframe
  width="100%"
  height="100%"
  frameborder="0" style="border:0"
  overflow="hidden"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCl0N46TIpQLmiE8fo-EqQef-zkC0lQuQQ
    &q=Space+Needle,Seattle+WA" allowfullscreen>
</iframe>
</div>




<div id="jQueryDialog7" style="z-index:813;">
<object name="assistdevk1" data="cloud1.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog11" style="z-index:814;">
<a href="cloudapps.php" target="cappsk2"> Recharger/Actualiser </a>
<object name="cappsk2" data="cloudapps.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="Dialog1" style="z-index:815;">
</div>

</body>
</html>