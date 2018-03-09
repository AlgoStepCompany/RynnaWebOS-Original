<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>RynnaWebOS</title>
<meta name="generator" content="AlgoStep Company - 2006-2017">
<link href="RynnaWebOS.css" rel="stylesheet">
<link href="passwdok.css" rel="stylesheet">
<script src="jquery-3.3.1.min.js"></script>
<script src="wb.stickylayer.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Layer1").stickylayer({orientation: 9, position: [0, 0], delay: 0});
});
</script>
</head>
<body>
<div id="Layer1" style="position:absolute;text-align:center;left:28px;top:21px;width:752px;height:525px;z-index:5;">
<div id="Layer1_Container" style="width:750px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
<input type="button" id="Button2" name="" value="Mot de passe re-généré avec succès !" style="position:absolute;left:11px;top:10px;width:730px;height:25px;z-index:0;" disabled>
<div id="wb_Text1" style="position:absolute;left:290px;top:53px;width:436px;height:218px;text-align:justify;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>Un nouveau mot de passe vous à été généré ; celui-ci a été envoyé par e-mail.<br></strong><br>Vérifiez votre adresse mail pour le retrouver.<br>Si vous ne le voyez pas, vérifiez vos courriels indésirables (spam).<br>Si vous ne l'avez pas reçu sous 24 heures, contactez nous sur support@rynnawebos.fr<br><br>Une fois que vous vous êtes connecté avec ce nouveau mot de passe, nous vous invitons à le modifier en utilisant cet icône dans votre session :</span></div>
<input type="submit" id="Button1" onclick="window.location.href='./index.php';return false;" name="" value="Se reconnecter" style="position:absolute;left:569px;top:477px;width:157px;height:25px;z-index:2;">
<div id="wb_Text2" style="position:absolute;left:290px;top:430px;width:436px;height:34px;z-index:3;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Ensuite vous pourrez modifier votre compte avec un nouveau mot de passe de votre choix.</span></div>
<div id="wb_Image1" style="position:absolute;left:19px;top:53px;width:261px;height:445px;z-index:4;">
<img src="images/modifier_session_mdp.png" id="Image1" alt=""></div>
</div>
</div>
</body>
</html>