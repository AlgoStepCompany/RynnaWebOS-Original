/**-------------------------------------------------
 | AJAX-Browser  -  by Alban LOPEZ
 | Copyright (c) 2007 Alban LOPEZ
 | Email bugs/suggestions to alban.lopez@gmail.com
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +--------------------------------------------------*/
var ServActPage = ((location.href.split("?"))[0]);
lstGet = location.search.slice(1,window.location.search.length).split("&");
	for(i=0;lstGet[i];i++)
		 eval((lstGet[i].split("="))[0]+"='"+(lstGet[i].split("="))[1]+"';");
RQT=
{
	xmlDoc : Object,
	get : function(url, options)
	{
		var parameters = options.parameters || false;
		var method = options.method || 'post';
		var async = options.async || true;
		var onStart = options.onStart || false;
		var onEnd = options.onEnd || false;
		var onError = options.onError || 'alert("'+ABS900+'");';
		var request;

		if(window.XMLHttpRequest)   // tous les naviguateurs W3C
			{ request = new XMLHttpRequest();}
		else if (window.ActiveXObject)   // Internet Explorer
			{ request = new ActiveXObject("Microsoft.XMLHTTP");}
   		else
		{
			alert('AJAX is not avaible.');
			request = false;
			return false;
		}

		if(onStart) eval(onStart);
		request.open(method, url + (method=='get'&&parameters ? '?'+parameters : ''), async);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		request.onreadystatechange = function()
		{
			if (request.readyState == 4)
			{
				if (request.status == 200)
				{
					xmlDoc = request.responseText;
					if(onEnd) eval(onEnd);
					return true;
				}
				else
				{
					if(onError) eval(onError);
					return false;
				}
			}
		};
		request.send(method=='post' ? parameters : null);
	}
};
function CP_Send(id)
{
	RQT.get
	(ServActPage, // on joint la page en cour
		{
			parameters:'mode=request&cpsave='+id.slice(2,id.length)+'&cpdata='+base64.encode(ID(id).getCode()),
			onEnd:'ID("drag_"'+id.slice(2,id.length)+').setAttribute("title",request.responseText)',
			onError:'alert("Error !");'
		}
	);
}
function PopBox(param, end)
{
	ID('BoxContent').innerHTML=ABS29;
	ID('Box').style.display = 'block';
	Drag.init(ID('DragZone'), ID('Box'));
	RQT.get
	(ServActPage, // on joint la page en cour
		{
			parameters:param,
			onEnd:end,
			onError:'ID("Box").style.display = "none";alert("'+ABS900+'");'
		}
	);
}
function OpenBox (str)
{
	if (str!=='')
	{
		ptrBC = ID('BoxContent');
		ptrBC.innerHTML = str;
		ptrBC.scrollTop=0;
		reCenter(ID('Box'));
	}
	else ID('Box').style.display = 'none';
}
function reCenter(ptr)
{
	ptr.style.display = 'block';
	ptr.style.top=(document.body.clientHeight-ptr.offsetHeight)/2 + document.body.scrollTop;
	ptr.style.left=(document.body.clientWidth-ptr.offsetWidth)/2 + document.body.scrollLeft;
}
function ObjInnerView (obj)
{ // recadre le conteneur OBJ si il sortde la partie visible du navigateur
	obj.style.display = "block";
	if (obj.offsetLeft+obj.offsetWidth > document.body.clientWidth + document.body.scrollLeft)
		obj.style.left = (document.body.clientWidth + document.body.scrollLeft - obj.offsetWidth) + "px";
	if (obj.offsetTop+obj.offsetHeight > document.body.clientHeight + document.body.scrollTop)
		obj.style.top = (document.body.clientHeight + document.body.scrollTop - obj.offsetHeight) + "px";
}
function ID (id) { return document.getElementById (id); }
function basename (str)			// renvoi le nom du fichier
{
	var tmp = str.split('/').pop();
	if (tmp=='') return str.slice(0,-1).split('/').pop();
	return tmp;
}
function dirname (str)			// renvoi le nom du dossier
{
	var tmp = str.split('/');
	if(tmp.pop()=='')tmp.pop();
	return tmp.join('/')+'/';
}
function getDest()
{
	if (SelectLst.length==1)
		return dirDest(SelectLst[0]);
	else
		return racine64;
}
function dirDest(id64)
{
	if (is_dir(base64.decode(id64)))
		return id64;
	else
		return base64.encode(dirname(base64.decode(id64)));
}
function is_dir(str)
{
	return str.slice(str.length-1)=='/';
}
function SizeConvert (Size)		// converti un nombre d'octés en taille en Ko, Mo, Go, To
{
	var UnitArray = new Array('Oct','Ko','Mo','Go','To');
	var POW = new Array(1, 1024, 1048576, 1073741824, 1099511627776);
	var Unit=0;
	if (Size==-1) return ' - - ';
	while (Size/POW[Unit]>1024) Unit=Unit+1;
	return Math.round(Size/POW[Unit]*Math.pow(10,Unit))/Math.pow(10,Unit)+' '+UnitArray[Unit];
}
function getCheckedRadio(radioObj)
{
	if (!radioObj) return "";
	var radioLength = radioObj.length;
	if (radioLength == undefined)
	{
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	}
	for (var i = 0; i < radioLength; i++)
		if(radioObj[i].checked)
			return radioObj[i].value;
	return "";
}
function highlight ()
{
	SelectLst.forEach (
		function(element, index, array)
		{
			if ((ptr = ID(element)))
				ChangeBG(ptr, false).style.backgroundColor="rgb(230,150,150)";
		}
	);
	window.setTimeout("SelectLst.forEach (function(element, index, array){if ((ptr = ID(element))) ChangeBG(ptr, true);})", 150);
}
// ============    pour les besoin JS V1.6 sur les naviguateur JS V1.5     =============

if (!Array.prototype.forEach)
{
	Array.prototype.forEach = function(fun /*, thisp*/)
	{
		var len = this.length;
		if (typeof fun != "function")
		throw new TypeError();
		var thisp = arguments[1];
		for (var i = 0; i < len; i++)
		{
			if (i in this)
				fun.call(thisp, this[i], i, this);
		}
	};
}
if (!Array.prototype.indexOf)
{
	Array.prototype.indexOf = function(elt /*, from*/)
	{
		var len = this.length;
		var from = Number(arguments[1]) || 0;
		from = (from < 0)? Math.ceil(from):Math.floor(from);
		if (from < 0)
			from += len;
		for (; from < len; from++)
		{
			if (from in this &&
				this[from] === elt)
				return from;
		}
		return -1;
	};
}