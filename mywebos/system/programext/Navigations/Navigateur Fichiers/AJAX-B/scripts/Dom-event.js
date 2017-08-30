var SelectLst = new Array();
var PtrItem, dragFiles, Dest;

function ManageAllEvent(event)
{
	PtrItem = findItem64(event.target);
	ID('Menu').style.display = 'none';
	document.onmousemove = null;
	if (PtrItem)
	{
		if(event.type=='mouseup')
		{
			(ptrSel = ID('CpMvSlide')).style.display = 'none';
			ptrSel.innerHTML = '';
			(ptrm = ID('SlideLet')).style.display = 'none';
			if (dragFiles && dragFiles!=PtrItem.id)
			{
				dragFiles = false;
				ptrm.style.top = event.pageY-2;
				ptrm.style.left = event.pageX-2;
				ptrm.style.display = 'block';
			}
			else
			{
				return new ManageMouseEvent (event);
			}
		}
		else if (event.type=='mousedown')// && (SelectLst.length==0 || dragFiles==PtrItem))
		{
			if (SelectLst.indexOf(PtrItem.id)!=-1)
			{
				dragFiles = PtrItem.id;
				ptrSel = ID('CpMvSlide');
				ptrSel.innerHTML = innerICOs();
				Drag.init(ptrSel, ptrSel);
				ptrSel.style.top = event.pageY+2;
				ptrSel.style.left = event.pageX+2;
				ptrSel.style.display = 'block';
				document.onmousemove = function (event)
				{
					ptrSel.style.top = event.pageY+2;
					ptrSel.style.left = event.pageX+2;
				};
			}
		}
	}
	else 
	{
		return false;
	}
}
function StopEvent(evt)
{
	if (evt.stopPropagation)
	{
		evt.stopPropagation();
	}
	if (evt.preventDefault)
	{
		evt.preventDefault();
	}
	evt.returnValue = false;
	evt.cancelBubble = true;
	return false;
}
function ManageMouseEvent (event)
{
	StopEvent(event)
	dragFiles = false;
	if ((event.button===0 || event.button==1) && event.shiftKey && SelectLst.length>0)
	{// SHIFT select
		tmp = new Array(base64.decode(SelectLst[SelectLst.length-1]), base64.decode(PtrItem.id));
		if (is_dir(tmp[0]) != is_dir(tmp[1]))
		{
			if (is_dir(tmp[0]))
			{
				limitSel = tmp;
			}
			else
			{
				limitSel = new Array(tmp[1], tmp[0]);
			}
		}
		else
		{
			limitSel = tmp.sort();
		}
		limitSel = Array(ID(base64.encode(limitSel[0])), ID(base64.encode(limitSel[1])));
		nextPtr = limitSel[0];
		while (nextPtr.id != limitSel[1].id)
		{
			if (SelectLst.indexOf(nextPtr.id)==-1)
			{
				ChangeBG (nextPtr, true);
				SelectLst.push(nextPtr.id);
			}
			if (nextPtr.nextSibling===null || nextPtr.nextSibling.nextSibling===null) { break;}
			nextPtr = nextPtr.nextSibling.nextSibling;
		}
		if (SelectLst.indexOf(nextPtr.id)==-1)
		{
			ChangeBG (nextPtr, true);
			SelectLst.push(nextPtr.id);
		}
	}
	else if ((event.button===0 || event.button==1) && event.ctrlKey)
	{// Add by CTRL select
		if (SelectLst.indexOf(PtrItem.id)!=-1)
		{
			ChangeBG (PtrItem, false);
			SelectLst.splice(SelectLst.indexOf(PtrItem.id),1);
		}
		else
		{
			ChangeBG (PtrItem, true);
			SelectLst.push(PtrItem.id);
		}
	}
	else if (event.button===0 || event.button==1)
	{// InitSel
		_esc ();
		ChangeBG (PtrItem, true);
		SelectLst.push(PtrItem.id);
	}
	else if (event.button==2) // Menu click droit
		{ return _rightClick (event);}
	return false;
}
function ManageKeyboardEvent (event)
{
	if (ID('renOne').style.display=='block')
	{
		if (event.keyCode==13 ) // ENTER
			{_sendRen ();}
		else if (event.keyCode==27) // ESC
			{_esc ();}
		return false;
	}
	else if (ID('FindFilter').style.visibility=='visible')// ID('FindFilter').style.display=='block')
	{
		if (event.keyCode==13 ) // ENTER
			{_esc ();}
		else if (event.keyCode==27) // ESC
			{_esc ();}
		return false;
	}
// 	else {StopEvent(event);}
	
	if (event.keyCode==13) // ENTER
		{_enter (event);}
	else if (event.keyCode==27) // ESC
	{
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&noitems=',
				onEnd:false
			}
		);
		_esc ();
	}
	else if (event.keyCode==113 && event.shiftKey) // MULTI_RENOMER
		{_multiRename ();}
	else if (event.keyCode==113) // RENOMER
		{_rename ();}
	else if ((event.charCode==120 || event.charCode==24) && event.ctrlKey) // COUPER
		{_cut ();}
	else if ((event.charCode==99 || event.charCode==3) && event.ctrlKey) // COPIER
		{_copy();}
	else if ((event.charCode==118 || event.charCode==22) && event.ctrlKey) // COLLER
		{_paste();}
	else if ((event.keyCode==46 || event.keyCode==127) && event.charCode===0) // SUPPRIMER
		{_remove ();}
/*	else if ((event.keyCode==xx || event.keyCode==xx) && event.charCode===0) // PROPRIETEE
		{_properties ();}*/
	return false;
}
function _esc ()
{
	UnSelectAll ();
	ID('Menu').style.display = 'none';
	ID('Box').style.display = 'none';
	ID('SlideLet').style.display = 'none';
	ID('CpMvSlide').style.display = 'none';
	ID('renOne').style.display = 'none';
	ID('FindFilter').style.visibility='hidden';
	dragFiles = false;
	document.onmousemove = null;
}
function _view (item64, event)
{
	if (is_dir(base64.decode(item64)))
	{
		if(event.ctrlKey)
		{
			PtrWindow = window.open(ServActPage+"?mode="+mode+"&racine64="+item64, "racine64"+item64,"menubar,toolbar,location,resizable,scrollbars,status");
			if (PtrWindow === null) {alert (ABS907);}
			else {PtrWindow.focus();}
		}
		else
			{location.href=ServActPage+"?mode="+mode+"&racine64="+item64;}
	}
	else
	{
		PtrWindow = window.open(ServActPage+"?mode=request&view="+item64, "view_"+item64,"menubar,toolbar,location,resizable,scrollbars,status");
		if (PtrWindow === null) {alert (ABS907);}
		else {PtrWindow.focus();}
	}
}
function _enter (event)
{
	SelectLst.forEach(function(element, index, array)
	{
		if (!is_dir(base64.decode(element)) || event.ctrlKey)
			{_view (element, event);}
		else if (mode=='gallerie')
		{
			PtrWindow = window.open(ServActPage+"?mode="+mode+"&racine64="+element, "racine64"+element,"menubar,toolbar,location,resizable,scrollbars,status");
			if (PtrWindow === null) {alert (ABS907);}
			else {PtrWindow.focus();}
		}
		else if (mode=='arborescence')
			{RequestLoad(element);}
	});
	UnSelectAll ();
}
function _upload()
{
	PtrWindow = window.open(ServActPage+"?mode=request&dest="+getDest()+'&upload=', getDest(),"menubar=no,toolbar=no,tabbar=no,locationbar=no,resizable,scrollbars,status,top=0,left=0,width=450,height=50");
	if (PtrWindow === null) {alert (ABS907);}

}
function _uncompress()
{
	highlight ();
	RQT.get
	(ServActPage,
		{
			parameters:'mode=request&uncompress='+SelectLst.join(','),
			onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){RequestLoad(element,true);});'
		}
	);
}
function _new ()
{
	dest = base64.decode(getDest());
	newitem = prompt(dest+"\n"+ABS908+"\n("+ABS909+"):\n", "New/");
	if(newitem)
	{
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&newitem='+base64.encode( dest + newitem),
				onEnd:'if (ID(base64.encode(dest))) RequestLoad("'+base64.encode(dest)+'",true);'
			}
		);
	}
}
function _multiRename ()
{
	mask = prompt (ABS910+"\n"+ABS911+" :\n*	=> "+ABS912+"\n~	=> "+ABS913+"\n#	=> "+ABS914+"\n!	=> "+ABS915+"\n"+ABS916+" : ~ - * (#)!\n./MyDir/MyFile.EXT >> ./MyDir/MyDir - MyFile (1)","~ - *.tmp");
	if(mask)
	{
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&mask='+base64.encode(mask)+'&renitems='+SelectLst.join(','),
				onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){RequestLoad(element,true);});'
			}
		);
	}
}
function _rename ()
{
	if (SelectLst.length==1)
	{
		ptrRen = ID("renOne");
		baliseName = ID(SelectLst[0]).childNodes[1].childNodes[1].childNodes[3].childNodes[3];
		ptrRen.style.top = (baliseName.offsetTop)+"px";
		ptrRen.style.left = baliseName.offsetLeft+"px";
		ptrRen.style.display = "block";
		ptrRen.defaultValue = SelectLst[0];
		ptrRen.value = basename(base64.decode(SelectLst[0]));
		ptrRen.focus();
	}
	else if (SelectLst.length>1) {_multiRename ();}
	dragFiles = false;
}
function _sendRen()
{
	ptrRen = ID("renOne");
	RQT.get
	(ServActPage,
		{
			parameters:'mode=request&renitem='+ptrRen.defaultValue+'&mask='+base64.encode(ptrRen.value),
			onEnd:'ID("renOne").style.display = "none";UnSelectAll();RequestLoad(request.responseText,true);'
		}
	);
}
function _copy ()
{
	if (SelectLst.length>0)
	{
		highlight ();
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&copyitems='+SelectLst.join(','),
				onEnd:false
			}
		);
	}
}
function _cut ()
{
	if (SelectLst.length>0)
	{
		highlight ();
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&moveitems='+SelectLst.join(','),
				onEnd:false
			}
		);
	}
}
function _copy_paste ()
{
	if (SelectLst.length>0)
	{
		highlight ();
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&dest='+dirDest(PtrItem.id)+'&copyitems='+SelectLst.join(','),
				onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){RequestLoad(element,true);});'
			}
		);
	}
}
function _cut_paste ()
{
	if (SelectLst.length>0)
	{
		highlight ();
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&dest='+dirDest(PtrItem.id)+'&moveitems='+SelectLst.join(','),
				onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){RequestLoad(element,true);});'
			}
		);
	}
}
function _paste()
{
	RQT.get
	(ServActPage,
		{
			parameters:'mode=request&pastedest='+getDest(),
			onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){RequestLoad(element,true);});'
		}
	);
}
function _remove ()
{
	highlight ();
	strLst = Array();
	SelectLst.forEach(function(element, index, array) {this.push(basename(base64.decode(element)));}, strLst);
	if (SelectLst.length>0 && confirm (ABS917+"\n\n"+strLst.join('\n')))
	{
// 		alert(SelectLst[0]+'\n'+base64.decode(SelectLst[0])+'\n'+base64.encode(base64.decode(SelectLst[0])));
		RQT.get
		(ServActPage,
			{
				parameters:'mode=request&supitems='+SelectLst.join(','),
				onEnd:'UnSelectAll();request.responseText.split(",").forEach(function(element, index, array){ID(element).style.display="none"});'
			}
		);
	}
	dragFiles = false;
}
function _rightClick (event)
{
	ID('Box').style.display = 'none';
	dragFiles = false;
	ThisItem = PtrItem.id;
	ptr = ID('Menu');
	Drag.init(ID('MDragZone'), ptr);
	ptr.childNodes['1'].firstChild.innerHTML = basename(base64.decode(ThisItem));
	ptr.style.top = event.pageY;
	ptr.style.left = event.pageX;
	if (SelectLst.indexOf(ThisItem)==-1)
	{
		UnSelectAll ();
		SelectLst.push(ThisItem);
		ChangeBG (PtrItem, true);
	}
	ObjInnerView (ptr);
	return false;
}
function UnSelectAll ()
{
	dragFiles = false;
	SelectLst.forEach(function(element, index, array){if (ID(element))ChangeBG(ID(element), false)})
	SelectLst = new Array();
}
function _properties()
{
	if (SelectLst.length>0)
	{
		highlight ();
		ID('DragZone').childNodes[1].innerHTML='Propriete(s)';
		PopBox('mode=request&infos='+SelectLst.join(','),'OpenBox(request.responseText);');
	}
}
function _download(cmpMode)
{
	if (SelectLst.length>0)
	{
		highlight ();
		NewWin = window.open(ServActPage+'?mode=request&type='+cmpMode+'&download='+SelectLst.join(','), 'download','top=0,left=0,width=300,height=300');
		NewWin.setTimeout("close()",60000);
	}
}