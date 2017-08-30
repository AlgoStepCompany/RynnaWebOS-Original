<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<style type="text/css">
<!--
.Style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size:12px;
	cursor:default;
}
bgblue {
	background-color: #D7C4FF;
}
-->
</style>

<SCRIPT language=javascript src="menujs/packed.js" type=text/javascript></SCRIPT>
<SCRIPT language=javascript type=text/javascript>
function init() {
	  if (TransMenu.isSupported()) {
			TransMenu.initialize();
menu1.onactivate = function() { document.getElementById("mise_en_forme").className = "hover"; };
menu1.ondeactivate = function() { document.getElementById("mise_en_forme").className = ""; };
menu2.onactivate = function() { document.getElementById("couleur").className = "hover"; };
menu2.ondeactivate = function() { document.getElementById("couleur").className = ""; };
menu3.onactivate = function() { document.getElementById("format").className = "hover"; };
menu3.ondeactivate = function() { document.getElementById("format").className = ""; };
menu4.onactivate = function() { document.getElementById("cours").className = "hover"; };
menu4.ondeactivate = function() { document.getElementById("cours").className = ""; };
menu5.onactivate = function() { document.getElementById("faq").className = "hover"; };
menu5.ondeactivate = function() { document.getElementById("faq").className = ""; };
	 	}
  }
</SCRIPT>
<LINK href="menujs/styles.css" type=text/css rel=stylesheet>
<LINK href="menujs/transmenu.css" type=text/css rel=stylesheet>
<script>


// Déclaration des variables

var sel = "A1";
var cellule = new Array;
var lignes = 40;
var colones = 26;

function mouse_over(id) {
	if (cellule[id+'.style.backgroundcolor']) {
		document.getElementById(id).style.backgroundColor = cellule[id+'.style.backgroundcolor'];
		document.getElementById("txtbox_"+id).style.backgroundColor = cellule[id+'.style.backgroundcolor'];
	} else {
		document.getElementById(id).style.backgroundColor = "#E8DDFF";
		document.getElementById("txtbox_"+id).style.backgroundColor = "#E8DDFF";
	}
}
function mouse_out(id) {
	if (cellule[id+'.style.backgroundcolor']) {
		document.getElementById(id).style.backgroundColor = cellule[id+'.style.backgroundcolor'];
		document.getElementById("txtbox_"+id).style.backgroundColor = cellule[id+'.style.backgroundcolor'];
	} else {
		document.getElementById(id).style.backgroundColor = "#FFFFFF";
		document.getElementById("txtbox_"+id).style.backgroundColor = "#FFFFFF";
	}
}
function selection(id) {
document.getElementById(sel).style.borderBottom = "";
document.getElementById(sel).style.borderLeft = "";
document.getElementById(sel).style.borderRight = "";
document.getElementById(sel).style.borderTop = "";
cellule[sel+".value"] = document.getElementById("txtbox_"+sel).value;
calcul();

sel = id;
document.getElementById(sel).style.borderBottom = "solid blue 1px";
document.getElementById(sel).style.borderLeft = "solid blue 1px";
document.getElementById(sel).style.borderRight = "solid blue 1px";
document.getElementById(sel).style.borderTop = "solid blue 1px";
document.getElementById('case_selecionnee').innerHTML = sel;

if(document.getElementById('txtbox_'+sel).style.fontWeight == 'bold') {
	document.getElementById('bouton_gras').src = 'stock_text_bold_blue.png';
} else {
	document.getElementById('bouton_gras').src = 'stock_text_bold.png';
}
if(document.getElementById('txtbox_'+sel).style.fontWeight == 'bold') {
	document.getElementById('bouton_gras').src = 'stock_text_bold_blue.png';
} else {
	document.getElementById('bouton_gras').src = 'stock_text_bold.png';
}
if(document.getElementById('txtbox_'+sel).style.fontStyle == 'italic') {
	document.getElementById('bouton_italique').src = 'stock_text_italic_blue.png';
} else { 
	document.getElementById('bouton_italique').src = 'stock_text_italic.png'; 
}
if(document.getElementById('txtbox_'+sel).style.textDecoration == 'underline') {
	document.getElementById('bouton_souligne').src = 'stock_text_underlined_blue.png';
} else {
	document.getElementById('bouton_souligne').src = 'stock_text_underlined.png';
}
document.getElementById('police').value = document.getElementById('txtbox_'+sel).style.fontFamily;
document.getElementById('taille_texte').value = document.getElementById('txtbox_'+sel).style.fontSize;
if (document.getElementById("txtbox_"+sel).value != ""){ document.getElementById('formule').value = cellule[sel+".value"]; } else { document.getElementById('formule').value = ""; }
if (document.getElementById("txtbox_"+sel).value != ""){ document.getElementById("txtbox_"+sel).value = cellule[sel+".value"]; }
}
function deselection(id) {
document.getElementById(id).style.borderBottom = "";
document.getElementById(id).style.borderLeft = "";
document.getElementById(id).style.borderRight = "";
document.getElementById(id).style.borderTop = "";
}
function verif(key, id, id2){
if (cellule[sel+".format"] == "date") {
	if (document.getElementById('txtbox_'+sel).innerHTML.length == 2) { document.getElementById('txtbox_'+sel).innerHTML = document.getElementById('txtbox_'+sel).innerHTML + "/"; }
	if (key == 13 | key == 8 | key == 9 | key > 94 | key < 106) {
	} else { event.keyCode = 8 }
}
if (key == 13) { 
	var a = document.getElementById('txtbox_'+sel).value;
	var b = document.getElementById('txtbox_'+sel).value.length - 1;
	selection(id);
	document.getElementById("txtbox_"+id).focus();
	document.getElementById("txtbox_"+id).select(); 
}
if (key == 9) { 
	selection(id2); 
}
}
function align(id,alignement) {
	if(alignement=='gauche') {
		document.getElementById("txtbox_"+id).style.fontWeight = "bold";
		document.getElementById("txtbox_"+id).align = 'middle';
		replace("A","a",document.getElementById("txtbox_"+id).innerHTML);
	}
	if(alignement=='centre') {
		document.getElementById(id).align = 'center';
	}
	if(alignement=='droite') {
		document.getElementById(id).align = 'right';
	}
}
function text_transform(variable){
	if (variable == "gras") {
		if(document.getElementById('txtbox_'+sel).style.fontWeight == 'bold') {
			document.getElementById('txtbox_'+sel).style.fontWeight = ''; 
			document.getElementById('bouton_gras').src = 'stock_text_bold.png';
		} else { 
			document.getElementById('txtbox_'+sel).style.fontWeight = 'bold'; 
			document.getElementById('bouton_gras').src = 'stock_text_bold_blue.png'; 
		}
	}
	if (variable == "italique") {
		if(document.getElementById('txtbox_'+sel).style.fontStyle == 'italic') {
			document.getElementById('txtbox_'+sel).style.fontStyle = ''; 
			document.getElementById('bouton_italique').src = 'stock_text_italic.png';
		} else { 
			document.getElementById('txtbox_'+sel).style.fontStyle = 'italic'; 
			document.getElementById('bouton_italique').src = 'stock_text_italic_blue.png'; 
		}
	}
	if (variable == "souligne") {
		if(document.getElementById('txtbox_'+sel).style.textDecoration == 'underline') {
			document.getElementById('txtbox_'+sel).style.textDecoration = ''; 
			document.getElementById('bouton_souligne').src = 'stock_text_underlined.png';
		} else { 
			document.getElementById('txtbox_'+sel).style.textDecoration = 'underline'; 
			document.getElementById('bouton_souligne').src = 'stock_text_underlined_blue.png'; 
		}
	}
	if (variable == "police") {
		document.getElementById('txtbox_'+sel).style.fontFamily = document.getElementById('police').value;
	}
	if (variable == "taille") {
		document.getElementById('txtbox_'+sel).style.fontSize = document.getElementById('taille_texte').value + "px";
	}

}
function calcul() {
	var alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var i;
	for (x = 0; x < 26; x++) {
		for (y = 1; y <41; y++) {
		
			i = alphabet.charAt(x);
			if (cellule[i+y+".format"] == "calcul") {
				var contenu;
				contenu = remplacer_caracteres(cellule[i+y+".value"], 'A1', document.getElementById('txtbox_A1').value);
				<? 
				$alphabet = explode(",", "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z");
				
				for($i = 1; $i < 41; $i++) {
				for($j = 0; $j < 26; $j++) {
				echo "\r\n contenu = remplacer_caracteres(contenu, '".$alphabet[$j].$i."', document.getElementById('txtbox_".$alphabet[$j].$i."').value);";
				}
				}
				?>
				if (contenu!='') {	document.getElementById('txtbox_'+i+y).value = eval(contenu); }
			}
		}
	}

	if (cellule[sel+".format"] == "monnaie") {
		if (document.getElementById('txtbox_'+sel).value != '') {
			if (document.getElementById('liste_monnaie').value == 'euro') { sigle_monnaie = "€"; }
			if (document.getElementById('liste_monnaie').value == 'dollar') { sigle_monnaie = "$"; }
			if (document.getElementById('liste_monnaie').value == 'yen') { sigle_monnaie = "¥"; }
			if (document.getElementById('liste_monnaie').value == 'livre') { sigle_monnaie = "£"; }
			document.getElementById('txtbox_'+sel).value = document.getElementById('txtbox_'+sel).value + " " + sigle_monnaie;
		}
	}
}
function format(type) {
	if (type == "texte") {
	cellule[sel+".format"] = "texte";
	}
	if (type == "nombre") {
	cellule[sel+".format"] = "nombre";
	}
	if (type == "calcul") {
	cellule[sel+".format"] = "calcul";
	}
	if (type == "date") {
	cellule[sel+".format"] = "date";
	}
	if (type == "heure") {
	cellule[sel+".format"] = "heure";
	}
	if (type == "monnaie") {
	cellule[sel+".format"] = "monnaie";
	option_monnaie('show');
	}
	if (type == "pourcentage") {
	cellule[sel+".format"] = "pourcentage";
	}
	if (type == "fraction") {
	cellule[sel+".format"] = "fraction";
	}
}
function option_monnaie(opt) {
	if ( opt == "ok" ) {
		document.getElementById('option_monnaie').style.visibility = "hidden";
	}
	if ( opt == "show" ) {
		document.getElementById('option_monnaie').style.visibility = "visible";
	}
	if ( opt == "cancel" ) {
		document.getElementById('option_monnaie').style.visibility = "hidden";
	}
}
function remplacer_caracteres(txtbox_value,base_char,remplace_char)
{
	var char_converti = txtbox_value.split(base_char);
	char_converti = char_converti.join(remplace_char);
	return char_converti;
}
function coloriage_texte(couleur) {
	document.getElementById('txtbox_'+sel).style.color = couleur;
	cellule[sel+'.style.color'] = couleur;
}
function coloriage_fond(couleur) {
	document.getElementById('txtbox_'+sel).style.backgroundColor = couleur;
	cellule[sel+'.style.backgroundcolor'] = couleur;
}
function info(titre, message) {
	document.getElementById('div_msg_titre').innerHTML = titre;
	document.getElementById('div_msg_message').innerHTML = message;
	document.getElementById('div_msg').style.visibility = 'visible';
}
</script>
<style type="text/css">
<!--
#option_monnaie {
	position:absolute;
	width:100%;
	height:100%;
	z-index:1;
	left: 0px;
	top: 0px;
	visibility:hidden;
}
#div_msg {
	position:absolute;
	width:100%;
	height:100%;
	z-index:1;
	left: 0px;
	top: 0px;
	visibility:hidden;
}
.Style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

</head>
<body onload="init();selection(sel);">
<table border="0" width="100%" cellpadding="0" cellspacing="1">
<tr>
  <td id="menu" bgcolor="#8A9ABC">
				<DIV id=mtm_menu>
				<SPAN class=active><a href="#"><img src="lc_dbtableedit.png" align="absmiddle" border="0" /> Feuille 1</a>
				<A id="mise_en_forme" href="#"><img src="stock_fontwork-16.png" align="absmiddle" border="0" /> Mise en forme</A></SPAN> 
				<A href="#"></A>
				<A id="couleur" href="#"><img src="stock_filters-pop-art.png" width="24" height="24" border="0" align="absmiddle"/> Couleurs</A>
				<A id="format" href="#"><img src="stock_chart-toggle-legend.png" width="24" height="24" border="0" align="absmiddle"/> Format</A>
				<A id="cours" href="#">Calculs</A>
				<A id="faq" href="#">Aide</A> 
				
				
				
				
                <SCRIPT language=javascript type=text/javascript>
//<![CDATA[
  if (TransMenu.isSupported()) {
	  var ms = new TransMenuSet(TransMenu.direction.down, 1, 0, TransMenu.reference.bottomLeft);
	  
var menu1 = ms.addMenu(document.getElementById("mise_en_forme"));
menu1.addItem("<img src='stock_text_left.png' align='absmiddle' /> Aligner à Gauche", "javascript:info('Laxis Spreadsheet editor', 'Cette fonction n\\'est pas encore disponible');");
menu1.addItem("<img src='stock_text_center.png' align='absmiddle' /> Centrer", "javascript:info('Laxis Spreadsheet editor', 'Cette fonction n\\'est pas encore disponible');");
menu1.addItem("<img src='stock_text_right.png' align='absmiddle' /> Aligner à Droite", "javascript:info('Laxis Spreadsheet editor', 'Cette fonction n\\'est pas encore disponible');");
menu1.addItem("<hr>", "#");
menu1.addItem("<img src='stock_text_bold.png' align='absmiddle' id=\"bouton_gras\"/> Gras", "javascript:text_transform('gras');");
menu1.addItem("<img src='stock_text_italic.png' id=\"bouton_italique\" align='absmiddle' /> Italique", "javascript:text_transform('italique');");
menu1.addItem("<img src='stock_text_underlined.png' id=\"bouton_souligne\" align='absmiddle' /> Souligné", "javascript:text_transform('souligne');");
menu1.addItem("<hr>", "#");
menu1.addItem("<img src=\"stock_draw-text-16.png\" align=\"absmiddle\" /> <select id=\"police\" onchange=\"text_transform('police');\"><option value=\"Times New Roman\">Times New Roman</option><option value=\"Arial\">Arial</option><option value=\"Tahoma\">Tahoma</option></select>", "");
menu1.addItem("<img src=\"stock_chart-scale-text.png\" align=\"absmiddle\" /> <select id=\"taille_texte\" size=\"1\" onchange=\"text_transform('taille');\"><option value=\"\">Choisissez une taille</option><option value=\"8\">8</option><option value=\"9\">9</option><option value=\"10\">10</option><option value=\"11\">11</option><option value=\"12\">12</option><option value=\"14\">14</option><option value=\"16\">16</option><option value=\"18\">18</option><option value=\"22\">22</option><option value=\"26\">26</option></select>", "#");
var menu2 = ms.addMenu(document.getElementById("couleur"));
menu2.addItem("<center>Couleur du texte</center><table width=\"100\" height=\"100\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bordercolor=\"#CCCCCC\" bgcolor=\"#FFFFFF\" widtd=\"100\"><tr><td style=\"cursor:default; background-color:#000000\" bgcolor=\"#000000\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#333333\" bgcolor=\"#333333\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#666666\" bgcolor=\"#666666\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#999999\" bgcolor=\"#999999\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#CCCCCC\" bgcolor=\"#CCCCCC\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#0000FF\" bgcolor=\"#0000FF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0033FF\" bgcolor=\"#0033FF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0066FF\" bgcolor=\"#0066FF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0099FF\" bgcolor=\"#0099FF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00CCFF\" bgcolor=\"#00CCFF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#990000\" bgcolor=\"#990000\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#CC0000\" bgcolor=\"#CC0000\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF0000\" bgcolor=\"#FF0000\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF6600\" bgcolor=\"#FF6600\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF9900\" bgcolor=\"#FF9900\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#003300\" bgcolor=\"#003300\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#006600\" bgcolor=\"#006600\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#009900\" bgcolor=\"#009900\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00CC00\" bgcolor=\"#00CC00\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00FF00\" bgcolor=\"#00FF00\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#FFFF00\" bgcolor=\"#FFFF00\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#996633\" bgcolor=\"#996633\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#663366\" bgcolor=\"#663366\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#666699\" bgcolor=\"#666699\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\" onclick=\"coloriage_texte(this.style.backgroundColor);\">&nbsp;</td></tr></table>", "#");
menu2.addItem("<center>Couleur de fond</center><table width=\"100\" height=\"100\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bordercolor=\"#CCCCCC\" bgcolor=\"#FFFFFF\" widtd=\"100\"><tr><td style=\"cursor:default; background-color:#000000\" bgcolor=\"#000000\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#333333\" bgcolor=\"#333333\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#666666\" bgcolor=\"#666666\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#999999\" bgcolor=\"#999999\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#CCCCCC\" bgcolor=\"#CCCCCC\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#0000FF\" bgcolor=\"#0000FF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0033FF\" bgcolor=\"#0033FF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0066FF\" bgcolor=\"#0066FF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#0099FF\" bgcolor=\"#0099FF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00CCFF\" bgcolor=\"#00CCFF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#990000\" bgcolor=\"#990000\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#CC0000\" bgcolor=\"#CC0000\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF0000\" bgcolor=\"#FF0000\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF6600\" bgcolor=\"#FF6600\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FF9900\" bgcolor=\"#FF9900\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#003300\" bgcolor=\"#003300\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#006600\" bgcolor=\"#006600\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#009900\" bgcolor=\"#009900\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00CC00\" bgcolor=\"#00CC00\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#00FF00\" bgcolor=\"#00FF00\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td></tr><tr><td style=\"cursor:default; background-color:#FFFF00\" bgcolor=\"#FFFF00\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#996633\" bgcolor=\"#996633\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#663366\" bgcolor=\"#663366\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#666699\" bgcolor=\"#666699\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td><td style=\"cursor:default; background-color:#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\" onclick=\"coloriage_fond(this.style.backgroundColor);\">&nbsp;</td></tr></table>", "#");
var menu3 = ms.addMenu(document.getElementById("format"));
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_tools-hyphenation.png\" align=\"absmiddle\" /> Standard / Texte</label>", "javascript:format('texte');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_sort-column-ascending.png\" align=\"absmiddle\" /> Nombre", "javascript:format('nombre');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_sum.png\" align=\"absmiddle\" />Calcul", "javascript:format('calcul');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_slide-reherse-timings.png\" align=\"absmiddle\"> Date", "javascript:format('date');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_form-time-field.png\" align=\"absmiddle\"> Heure", "javascript:format('heure');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_euro.png\" align=\"absmiddle\"> Monnaie", "javascript:format('monnaie');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> <img src=\"stock_format-percent.png\" align=\"absmiddle\"> Pourcentages", "javascript:format('pourcentage');");
menu3.addItem("<label><input type=\"radio\" name=\"radiobutton\" value=\"radiobutton\" align=\"absmiddle\"/> Fraction", "javascript:format('fraction');");
menu3.addItem("<hr>", "#");
menu3.addItem("Autre format", "bureau.php?d=marketing/bannieres");

var menu4 = ms.addMenu(document.getElementById("cours"));
menu4.addItem("jyhgfjhg", "#");
menu4.addItem("sdvsdvsd", "#");
menu4.addItem("lkj", "#");

var menu5 = ms.addMenu(document.getElementById("faq"));
menu5.addItem("A propos de...", "javascript:info('Laxis Spreadsheet editor', 'Laxis spreadsheet editor, tableur excel en ligne, pour plus d`infos : spacedoud2@yahoo.fr<br>- WhiteDwarf');");

	  TransMenu.renderAll();
  }
//]]>
            </SCRIPT>
                
	  </DIV>
</td></tr><tr>
  <td bgcolor="#8A9ABC"><span class="Style2" id="case_selecionnee"> &nbsp;A1</span>
        <input name="formule" type="text" id="formule" align="absmiddle" width="500" /></td>
</tr></table>

<div style="height: 500px; overflow: scroll;">
<table border="0" width="1" cellpadding="0" cellspacing="1" bgcolor="#707070">
<tr>
  <td width="111" id="1" bgcolor="#BDBDBD"><div align="center"><span class="Style1" style="font:">A1 </span></div></td>
  <?
  
$alphabet = explode(",", "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z");

for($i = 0; $i < 26; $i++) {
	
	echo "<td id=\"".$alphabet[$i]."\" align=\"center\" class=\"Style1\" bgcolor=\"#BDBDBD\">".$alphabet[$i]."</td>";
}
echo "</tr>";
for($i = 1; $i < 41; $i++) {
	echo "<tr>\r\n";
	echo "<td id=\"".$i."\" align=\"center\" class=\"Style1\" bgcolor=\"#BDBDBD\">".$i."</td>";
for($j = 0; $j < 26; $j++) {
	echo "
	<td 
	id=\"".$alphabet[$j].$i."\" 
	bgcolor=\"#FFFFFF\" 
	onclick=\"selection('".$alphabet[$j].$i."')\" 
	onmouseover=\"mouse_over('".$alphabet[$j].$i."')\" 
	onmouseout=\"mouse_out('".$alphabet[$j].$i."')\"
	style=\"background-image:url('boutton.png');\"
	>
	
	<input 
	ondblclick=\"document.getElementById('txtbox_'+".$alphabet[$j].$i.").select();\" 
	onkeydown=\"verif(event.keyCode, '".$alphabet[$j].($i+1)."', '".$alphabet[$j+1].$i."');\" 
	type=\"textbox\" 
	style=\"border:0\" 
	id=\"txtbox_".$alphabet[$j].$i."\" 
	width=\"70\"
	>
		
	</td>";
}
	echo "</tr>\r\n";
}
?>
</table>
</div>
<table border="0" width="100%" cellpadding="0" cellspacing="1">
<tr>
  <td id="menu" bgcolor="#8A9ABC">
				<DIV id=mtm_menu>
				<SPAN class=active><A id="ddd" href="#"><img src="lc_calloutshapes.png" width="24" height="24" border="0" align="absmiddle" /><img src="lc_calloutshapes.rectangular-callout.png" width="24" height="24" border="0" align="absmiddle" /><img src="lc_calloutshapes.round-callout.png" width="24" height="24" border="0" align="absmiddle" /></A></SPAN><A id="ddd" href="#"><img src="lc_flowchartshapes.flowchart-terminator.png" width="24" height="24" border="0" align="absmiddle" /><img src="lc_starshapes.horizontal-scroll.png" width="24" height="24" border="0" align="absmiddle" /></A>
<A id="ddd" href="#"><img src="lc_dbtableedit.png" width="24" height="24" border="0" align="absmiddle"/></A></DIV></td></tr></table>
<div id="option_monnaie">
<div style="position:absolute; top:0px; left:0px; opacity: 0.8; background:#CCCCCC; width:100%; height:100%">
</div>
<div id="option_monnaies" style="position:absolute; top: 30%;border-width:thin 1px; border-color:#999999; border-style:solid; background:#FFFFFF; width:250px; opacity: 1; left:35%">
  <table width="100%" height="75" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="4" scope="col"><div align="center" style="background-color:#CCCCCC; opacity: 0.8; moz-opacity:0.8">
        <table width="0" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="col"><img src="stock_euro.png" width="24" height="24" /></th>
            <th scope="col"><strong>Monnaie</strong></th>
          </tr>
        </table>
      </div></th>
    </tr>
    <tr>
      <th height="27" colspan="4" align="left" valign="top" scope="col"><p align="center">
        <select name="liste_monnaie" id="liste_monnaie">
          <option value="euro" selected="selected">&euro; Euro</option>
          <option value="dollar">$ Dollar</option>
          <option value="yen">&yen; Yen</option>
          <option value="livre">&pound; Livre Sterling</option>
        </select>
      </p></th>
    </tr>
    <tr>
      <th width="2%" scope="col"><div align="left"></div></th>
      <th width="79%" scope="col"><div align="left">
        <input type="submit" name="Submit" value="Ok" onclick="option_monnaie('ok');" />
        <input type="submit" name="Submit2" value="Appliquer" />
      </div></th>
      <th width="17%" scope="col"><div align="right">
        <input type="submit" name="Submit3" value="Annuler" onclick="option_monnaie('cancel');" />
      </div></th>
      <th width="2%" scope="col">&nbsp;</th>
    </tr>
  </table>
  
  </div>
</div>

<div id="div_msg">

	<div style="position:absolute; top:0px; left:0px; opacity: 0.8; background:#CCCCCC; width:100%; height:100%">
	</div>
	
	<div style="position:absolute; top: 30%;border-width:thin 1px; border-color:#999999; border-style:solid; background:#FFFFFF; width:250px; left:35%; padding:10px">
	
		<div id="div_msg_titre" align="center" style="font-weight:bold; background-color:#8A9ABC;color:#FFFFFF"></div>
		<div id="div_msg_message"></div>
		<center><input type="button" onclick="document.getElementById('div_msg').style.visibility='hidden';" value="Ok" width="50%" /></center>
	</div>
	
</div>







<div>
  <div align="center">Developped by WhiteDwarf - Laxis Technologies - spacedoud2@yahoo.fr</div>
</div>
<p>&nbsp;</p>
</body>
</html>
