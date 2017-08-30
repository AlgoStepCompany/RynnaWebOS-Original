<script type="text/javascript">
/**-------------------------------------------------
 | AJAX-Browser  -  by Alban LOPEZ
 | Copyright (c) 2007 Alban LOPEZ
 | Email bugs/suggestions to alban.lopez@gmail.com
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +--------------------------------------------------*/
 	var model = "<?php echo str_replace(array('"',"\n"), array('\"','\n'), $modelGal); ?>";
	MiniLst = new Array();
ID('All').oncontextmenu=function (event) { event.stopPropagation();return false; }; // block le click droit sous firefox
function RequestLoad(dir64)
{// ici dir64 ne sert a rien, mais il est imposé par par le code en mode arborescence !
	RQT.get
	(ServActPage, // on joint la page en cour
		{
			parameters:'mode=request&sublstof='+racine64+'&light=on',
			onEnd:'OpenDir(request.responseText.split("\\n"));MiniLstDef=MiniLst;intervalID=window.setInterval(loadMini,<?php echo $_SESSION['AJAX-B']['mini_intervale']; ?>);',
		}
	);
}
function OpenDir (array)
{
 	var i, Include='';
	for (i=1;i<array.length;i++)
		Include += AddItem (base64.decode(racine64), array[i]);
	PtrGal = ID ("Gal");
	PtrGal.innerHTML = Include;
}
function loadMini()
{
	if (MiniLst.length>0)
	{
		first = MiniLst.shift();
		ID(first).childNodes[1].firstChild.firstChild.firstChild.firstChild.src = InstallDir+'icones/Loading.gif';
		RQT.get
		(ServActPage, // on joint la page en cour
			{
				parameters:'mode=request&miniof='+first,
				onEnd:'ID("'+first+'").childNodes[1].firstChild.firstChild.firstChild.firstChild.src = request.responseText',
			}
		);
	}
	else if (MiniLst.length==0)
	{
		window.clearInterval(intervalID);
		MiniLst=MiniLstDef;
		window.setTimeout("intervalID=window.setInterval(loadMini,<?php echo $_SESSION['AJAX-B']['mini_intervale']; ?>);", 3000);
	}
}
function AddItem(dir, element)
{
	var item = element.split('\t');
	item[0] = base64.decode(item[0]);
	var ext = item[0].split(".");
	Item = model.replace(/%item%/g, escape(item[0]));
	Item = Item.replace(/%item64%/g, base64.encode(dir+item[0]));
	Item = Item.replace(/%icone%/g,InstallDir+'icones/type-'+FileIco(item[0])+'.png');
	typeMime = item[2].replace(/^(\w+)[/](\w+)$/, "$2").toLowerCase();
	if (typeMime=="png" || typeMime=="jpeg" || typeMime=="jpg" || typeMime=="gif" || typeMime=="bmp")
	{
		MiniLst.push(base64.encode(dir+item[0]));
		Item = Item.replace(/%name%/g, '');
	}
	else
		Item = Item.replace(/%name%/g, '<p class="name">'+item[0]+'</p>');
	Item = Item.replace(/%real_size%/g, item[1]);
	Item = Item.replace(/%size%/g, SizeConvert (item[1]));
	Item = Item.replace(/%type%/g, item[2]);
	Item = Item.replace(/%link%/g, is_dir(item[0])?location.search.replace(racine64, base64.encode(dir+item[0])):'?mode=request&view='+base64.encode(dir+item[0]));
	return Item;
}
function findItem64 (ptr)
{
	while (!ptr.id || ptr.nodeName!='DIV' || ptr.className!="Gal")
	{
		ptr = ptr.parentNode;
		if (ptr.nodeName=='BODY') return false;
	}
	return ptr;
}
function ChangeBG (PtrItem, statut)
{
	if (!PtrItem) return null;
	else if (statut)
	{
		PtrItem.childNodes[1].firstChild.firstChild.style.backgroundColor="rgb(220,230,255)";
		PtrItem.style.borderColor="#333";
	}
	else
	{
		PtrItem.childNodes[1].firstChild.firstChild.style.backgroundColor="";
		PtrItem.style.borderColor="#DDD";
	}
	return PtrItem.childNodes[1].firstChild.firstChild;
}
function innerICOs ()
{
str = '<div class="Gal small">'+ID(SelectLst[0]).childNodes[1].innerHTML+'</div>';
if (SelectLst[1])
	str += '<div class="Gal small c1">'+ID(SelectLst[1]).childNodes[1].innerHTML+'</div>';
if (SelectLst[2])
	str += '<div class="Gal small c2">'+ID(SelectLst[2]).childNodes[1].innerHTML+'</div>';
if (SelectLst[3])
	str += '<div class="Gal small c3">'+ID(SelectLst[3]).childNodes[1].innerHTML+'</div>';
	return str;
}
</script>
<style type="text/css">
p.name {overflow: hidden;}
#Gal div:hover
{
	background:rgb(230,250,210);
	border:solid 1px #777;
}
.Gal
{
	position:relative;
	border:1px solid #DDD;
	float:left;
	height:<?php echo $_SESSION['AJAX-B']['mini_size']+2?>px;
	width:<?php echo $_SESSION['AJAX-B']['mini_size']+2?>px;
	margin:0px 1px 1px 0px;
	padding:0px;
	z-index:3;
}
.Gal table
{
	font-size:10px;
	padding:0px;
	margin:-1px;
	border:0px;
}
.Gal td {
	height:<?php echo $_SESSION['AJAX-B']['mini_size']?>px;
	width:<?php echo $_SESSION['AJAX-B']['mini_size']?>px;
	vertical-align:middle;
	text-align:center;
	white-space:normal;
	padding:0px;
	margin:0px;
	border:0px;
}
.Gal img
{
	max-width:<?php echo $_SESSION['AJAX-B']['mini_size']?>px;
	max-height:<?php echo $_SESSION['AJAX-B']['mini_size']?>px;
	padding:0px;
	margin:0px;
}
.c1 {margin-top:25px;margin-left:25px;-moz-opacity:0.7;}
.c2 {margin-top:50px;margin-left:50px;-moz-opacity:0.5;}
.c3 {margin-top:75px;margin-left:75px;-moz-opacity:0.3;}
.small
{
	position:absolute;
	height:52px;
	width:52px;
}
.small td
{
	vertical-align:middle;
	text-align:center;
	height:50px;
	width:50px;
}
.small img
{
	height:50px;
	width:50px;
}
</style>