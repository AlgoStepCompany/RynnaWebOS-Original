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
$users = array("root"); // Indiquer ici le nom du seul utilisateur capable de rentrer dans le Server-Manager de vos (votre) WebOS. Preferez un Administrateur !
if (!in_array($_SESSION['username'], $users))
{
   header('Location: ./index.php');
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./index.php');
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ServerManager</title>
<meta name="author" content="AlgoStep Company">
<meta name="generator" content="AlgoStep Company - ServerManager">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="base/jquery-ui.min.css" rel="stylesheet">
<link href="ServerManager.css" rel="stylesheet">
<link href="mgmtadmin.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="listview.min.js"></script>
<script src="transition.min.js"></script>
<script src="tab.min.js"></script>
<script src="wb.carousel.min.js"></script>
<script src="wwb12.min.js"></script>
<script>
$(document).ready(function()
{
   var ListView1Options =
   {
      inset: false
   };
   $("#ListView1").listview(ListView1Options);
   var jQueryDialog2Options =
   {
      width: 997,
      height: 650,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog2'} 
   };
   $("#jQueryDialog2").dialog(jQueryDialog2Options);
   var jQueryDialog3Options =
   {
      width: 997,
      height: 650,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog3'} 
   };
   $("#jQueryDialog3").dialog(jQueryDialog3Options);
   var jQueryDialog4Options =
   {
      width: 997,
      height: 650,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog4'} 
   };
   $("#jQueryDialog4").dialog(jQueryDialog4Options);
   $("a[href*='#skills']").click(function(event)
   {
      event.preventDefault();
      $('html, body').stop().animate({ scrollTop: $('#wb_skills').offset().top }, 600, 'linear');
   });
   var progressbar_uidesignOptions =
   {
      value: false
   };
   $("#progressbar_uidesign").progressbar(progressbar_uidesignOptions);
   var progressbar_htmlOptions =
   {
      value: false
   };
   $("#progressbar_html").progressbar(progressbar_htmlOptions);
   $("#jQueryTabs1 a").click(function()
   {
      $(this).tab('show');
   });
   var TextSliderOpts =
   {
      delay: 3000,
      duration: 500,
      easing: 'linear',
      mode: 'forward-circular',
      direction: '',
      scalemode: 1,
      pagination: false,
      start: 0
   };
   $("#TextSlider").on('activate', function(event, index)
   {
      switch(index)
      {
         case 0:
            ShowObjectWithEffect('wb_Name1', 1, 'slideleft', 800, 'easeOutQuad');
            ShowObjectWithEffect('Name2', 0, 'slideup', 500);
            ShowObjectWithEffect('Name3', 0, 'slideup', 500);
            ShowObjectWithEffect('wb_Line1', 1, 'fade', 500);
            ShowObjectWithEffect('Line2', 0, 'fade', 500);
            ShowObjectWithEffect('Line3', 0, 'fade', 500);
            break;
         case 1:
            ShowObjectWithEffect('wb_Name1', 0, 'slideup', 500);
            ShowObjectWithEffect('Name2', 1, 'slideleft', 800, 'easeOutQuad');
            ShowObjectWithEffect('Name3', 0, 'slideup', 500);
            ShowObjectWithEffect('wb_Line1', 0, 'fade', 500);
            ShowObjectWithEffect('Line2', 1, 'fade', 500);
            ShowObjectWithEffect('Line3', 0, 'fade', 500);
            break;
         case 2:
            ShowObjectWithEffect('wb_Name1', 0, 'slideup', 500);
            ShowObjectWithEffect('Name2', 0, 'slideup', 500);
            ShowObjectWithEffect('Name3', 1, 'slideleft', 800, 'easeOutQuad');
            ShowObjectWithEffect('wb_Line1', 0, 'fade', 500);
            ShowObjectWithEffect('Line2', 0, 'fade', 500);
            ShowObjectWithEffect('Line3', 1, 'fade', 500);
            break;
      }
   });
   $("#TextSlider").carousel(TextSliderOpts);
   var jQueryDialog1Options =
   {
      width: 997,
      height: 650,
      position: { my: 'center', at: 'center', of: window },
      resizable: true,
      draggable: true,
      closeOnEscape: true,
      autoOpen: false,
      classes: { 'ui-dialog': 'jQueryDialog1'} 
   };
   $("#jQueryDialog1").dialog(jQueryDialog1Options);
});
</script>

<script>
$(document).ready(function()
{
   var $progressbars = $('.ui-progressbar');
   
   $progressbars.each(function() 
   {
     var $obj = $(this);
     $obj.data('value', $obj.progressbar('option', 'value'));
     $obj.data('done', false);
     $obj.progressbar('option', 'value', 0);
    
     $obj.css('position', 'relative');
     $obj.append('<div class="progress-label">0%</div>');
   });
   $(window).bind('scroll', function() 
   {
      $progressbars.each(function() 
      {
         var $obj = $(this);
         if (!$obj.data('done') && $(window).scrollTop() + $(window).height() >= $obj.offset().top) 
         {
            $obj.data('done', true);
            $obj.animate({scroll: 1}, 
            { 
               duration: 3000, 
               step: function(now) 
               {
                  var $obj = $(this);
                  var val = Math.round($obj.data('value') * now);
                  $obj.progressbar('option', 'value', val);
                  $obj.find('.progress-label').text(val + '%').css('color', (val > 50) ? "#FFFFFF" : "#265A88");
               }
            });
         }
      });
   }).triggerHandler('scroll');
});
</script>
</head>
<body>
<!-- CHANGER LES LIENS vers vos propres WebOS pour les consoles 2 à 4 ci-dessous ! -->
<div id="jQueryDialog2" style="z-index:44;" title="WebOS 2 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/mywebos/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog3" style="z-index:45;" title="WebOS 3 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webosbis/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="jQueryDialog4" style="z-index:46;" title="WebOS 4 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/webos4/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

<div id="wb_skills">
<div id="skills">
<div class="row">
<div class="col-1">
<div id="wb_Text6">
<span style="color:#FFFFFF;font-family:Arial;font-size:32px;"><strong>Server-Manager </strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>(1.0)</em></span>
</div>
<div id="wb_Logout1" style="display:inline-block;width:100%;z-index:4;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform" style="display:inline">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Deconnexion de l'interface Management" id="Logout1">
</form>

</div>
</div>
</div>
</div>
</div>
<div id="wb_LayoutGrid6">
<div id="LayoutGrid6">
<div class="row">
<div class="col-1">
<label for="" id="Label5" style="display:block;width:100%;;height:28px;line-height:28px;z-index:5;">Utilisateur en ligne (toutes bases de données) :</label>
<div id="progressbar_html" style="display:block;width:100%;height:28px;z-index:6;">
</div>
<label for="" id="Label6" style="display:block;width:100%;;height:28px;line-height:28px;z-index:7;">Espace disque restant (serveur) :</label>
<div id="progressbar_uidesign" style="display:block;width:100%;height:28px;z-index:8;">
</div>

</div>
</div>
</div>
</div>
<div id="Layer1" style="position:relative;text-align:left;width:100%;;height:551px;float:left;display:block;z-index:49;">
<div id="jQueryTabs1" style="display:inline-block;width:100%;z-index:21;">
<ul class="nav-tabs">
<li><a href="#jquerytabs1-page-0"><span>Consoles WebOS</span></a></li>
<li class="active"><a href="#jquerytabs1-page-1"><span>Navigateur de racine</span></a></li>
</ul>
<div class="tab-pane fade" id="jquerytabs1-page-0">
<div id="Layer2" style="position:absolute;text-align:left;left:21px;top:51px;width:302px;height:436px;z-index:16;">
<div id="wb_ListView1" style="position:absolute;left:37px;top:47px;width:226px;height:369px;z-index:10;">
<ul id="ListView1" style="margin-top:0px;margin-bottom:0px;">
<li><a href="" onclick="$('#jQueryDialog1').dialog('open');return false;">WebOS 1 (/login)</a></li>
<li><a href="" onclick="$('#jQueryDialog2').dialog('open');return false;">WebOS 2 (/mywebos)</a></li>
<li><a href="" onclick="$('#jQueryDialog3').dialog('open');return false;">WebOS 3 (/webosbis)</a></li>
<li><a href="" onclick="$('#jQueryDialog4').dialog('open');return false;">WebOS 4 (/webos4)</a></li>
</ul></div>
<div id="wb_Text1" style="position:absolute;left:23px;top:14px;width:250px;height:16px;text-align:center;z-index:11;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>- Consoles graphiques virtuelles -</strong></span></div>
</div>
<div id="Layer3" style="position:absolute;text-align:left;left:343px;top:51px;width:302px;height:436px;z-index:17;">
<div id="wb_Text2" style="position:absolute;left:23px;top:14px;width:250px;height:16px;text-align:center;z-index:12;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>- Actions générales -</strong></span></div>
<input type="submit" id="Button1" name="" value="Redémarrer le serveur Web" style="position:absolute;left:20px;top:66px;width:261px;height:25px;z-index:13;" disabled>
</div>
<div id="Layer4" style="position:absolute;text-align:left;left:664px;top:51px;width:595px;height:436px;z-index:18;">
<div id="wb_Text3" style="position:absolute;left:11px;top:14px;width:569px;height:16px;text-align:center;z-index:14;">
<span style="color:#000000;font-family:Arial;font-size:13px;"><strong>- Détection serveur et informations -</strong></span></div>
<div id="Html7" style="position:absolute;left:11px;top:62px;width:569px;height:357px;z-index:15">
<!-- CHANGER LE NOM DU FICHIER CI-DESSOUS (affichage des informations PHP/MySQL de votre serveur) par un autre nom inconnu de votre publique et impossible à retrouver ! -->
<object data="php-GtVF56aZ2aaLo.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
</div>
</div>
<div class="tab-pane fade in active" id="jquerytabs1-page-1">
<div id="Html1" style="position:absolute;left:20px;top:50px;width:880px;height:444px;z-index:19">
<!-- CHANGER LE NOM DU FICHIER CI-DESSOUS (Explorateur serveur racine maître) par un autre nom inconnu de votre publique et impossible à retrouver ! -->
<object data="z3rt6GV8uT44.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object></div>
<div id="wb_Line1" style="position:absolute;left:912px;top:49px;width:2px;height:441px;z-index:20;">
<img src="images/img0001.png" id="Line1" alt=""></div>
</div>
</div>
</div>
<div id="wb_TextSlider" style="position:absolute;left:0px;top:917px;width:1300px;height:267px;z-index:50;overflow:hidden;position:relative;">
<div id="TextSlider" style="position:absolute">
<div class="frame">
<div id="wb_Review1" style="position:absolute;left:298px;top:63px;width:704px;height:32px;text-align:center;z-index:39;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><em>Server-Manager - AlgoStep Company - Version alpha | Les paramètres sont à modifier par l'administrateur dans le code source du &quot;mgmt&quot;</em></span></div>
<hr id="Line2" style="position:absolute;left:572px;top:137px;width:156px;z-index:40;">
<div id="wb_Name1" style="position:absolute;left:414px;top:160px;width:472px;height:32px;text-align:center;z-index:41;">
<span style="color:#1BBC9B;font-family:Arial;font-size:13px;"><strong>SITE OFFICIEL : rynnawebos.fr</strong></span><span style="color:#FFFFFF;font-family:Arial;font-size:13px;"><br></span></div>
</div>
</div>
</div>
<!-- CHANGER LE LIEN vers vos propres WebOS pour la console 1 ci-dessous ! -->
<div id="jQueryDialog1" style="z-index:51;" title="WebOS 1 - Console graphique virtuelle">
<object data="http://rynnawebos.fr/login/index.php" type="text/html" width="100%" height="100%" style="overflow:auto" ></object>
</div>

</body>
</html>