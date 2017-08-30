//-------------------------------------------------------------
//  Nom Document : video objet
//  Auteur       : kamel Atmani
//  Objet        : objet javascript video http://codes-sources.commentcamarche.net/
//  Création     : 14.12.2014
//-------------------------------------------------------------
//  Mise à Jour  : 
//  Objet        : 
//-------------------------------------------------------------
//-(*)------------------


//licence: Creative commons

// Paternité : Vous devez citer le nom de l'auteur original et inclure la mention de bas de page faisant référence à la présente licence et comportant un lien hypertexte vers http://codes-sources.commentcamarche.net/.

// Pas d'utilisation commerciale : Vous n'avez pas le droit d'utiliser cette création à des fins commerciales à moins d'obtenir une autorisation préalable.

// Partage des Conditions Initiales à l'Identique : Si vous modifiez, transformez ou adaptez cette création, vous n'avez le droit de distribuer la création qui en résulte que sous un contrat identique à celui-ci.


// A chaque réutilisation ou distribution, vous devez faire apparaître clairement aux autres les conditions contractuelles de mise à disposition de cette création.
// Chacune de ces conditions peut être levée si vous obtenez l'autorisation du titulaire des droits.



function videoclass(largeur_video,ctn_control,ctn_video,image_attente,lui,ctx_createur){

	this.interplay='vide';
	this.total=0;
	this.ctn_video=ctn_video;
	this.ctn_controle=ctn_control;
	this.image_attente=image_attente;
	this.etat_pause=1;
	this.elem=null;
	this.progres=null;
	this.vivi='';
	this.defile=null;
	this.precharge=null;
	this.contenant=null;
	this.full_etat=false;
	this.ma=function(){that.marchearret.call(that)};
	this.mt=function(e){that.mute.call(that,e)};
	this.stp=function(e){that.stop.call(that,e)};

	this.ajevt=function(e){that.ajoutevent.call(that,e)};
	this.retire=function(e){that.retireevent.call(that,e)};
	this.rentcu=function(e){that.curent.call(that,e)};

	this.metson=function(e){that.event_son.call(that,e)};
	this.retson=function(e){that.no_event_son.call(that,e)};
	this.sn=function(e){that.sonson.call(that,e)};

	this.tpm=function(e){that.toto.call(that,e)};
	this.att=function(e){that.attente.call(that,e)};
	this.progre=function(e){that.progression.call(that,e)};
	this.roule=function(e){that.saroule.call(that,e)};
	this.lefou=function(e){that.full.call(that,e)};
	this.lui=lui;
	this.ctx_createur=ctx_createur;
	
	/////////////////////////////////
	//creation dynamique du player///
	/////////////////////////////////

	var that=this
	
	var el_video=document.createElement('video');
	el_video.setAttribute('class','v1');
	
	if(largeur_video){
		el_video.style.width=largeur_video+'px';
	}
	el_video.addEventListener("progress", that.progre, false);
	el_video.addEventListener('ended', this.stp, false);
	el_video.addEventListener('canplay', that.roule, false);
	el_video.addEventListener('waiting', that.att, false);
	el_video.addEventListener('dblclick', that.lefou, false);
	el_video.onerror=function(){alert('une erreur de lecture et survenue')}

	var cesour=document.createElement('source');
	cesour.setAttribute('type','video/webm');
	el_video.appendChild(cesour);	

	var cesour=document.createElement('source');
	cesour.setAttribute('type','video/ogg');
	el_video.appendChild(cesour);

	var cesour=document.createElement('source');
	cesour.setAttribute('type','video/mp4');
	el_video.appendChild(cesour);

	this.vivi=this.ctn_video.appendChild(el_video);

	var contenant=document.createElement('div');
	contenant.setAttribute('class','conso');

	var defi=document.createElement('div');
	defi.setAttribute('class','defile');
	defi.addEventListener('mousedown',this.ajevt, false);

	var soudefi=document.createElement('div');
	soudefi.setAttribute('class','precharge');
	this.precharge=defi.appendChild(soudefi);
	var soudefi=document.createElement('div');
	soudefi.setAttribute('class','suisbar');
	defi.appendChild(soudefi);

	this.defile=contenant.appendChild(defi);

	var touche=document.createElement('div');
	touche.addEventListener("click",this.ma, false);
	touche.setAttribute('class','k_marche');
	this.marche=contenant.appendChild(touche);

	var sous=document.createElement('div');
	sous.setAttribute('class','cont_son');

	var touche1=document.createElement('div');
	touche1.setAttribute('class','k_mute_off');
	touche1.addEventListener('click',this.mt, false);
	sous.appendChild(touche1);

	var so=document.createElement('div');
	so.setAttribute('class','son');
	so.addEventListener('mousedown',this.metson, false);
	var souso=document.createElement('div');
	so.appendChild(souso);
	this.son=sous.appendChild(so);

	contenant.appendChild(sous);

	var temp=document.createElement('span');
	temp.setAttribute('class','temp');
	temp.addEventListener('click',that.tpm, false);
	var txt=document.createTextNode('00:00');
	temp.appendChild(txt);
	this.temp=contenant.appendChild(temp);

	var pro=document.createElement('img');
	pro.setAttribute('src','res/29.gif');
	pro.setAttribute('id','prog');
	this.progres=this.image_attente.appendChild(pro);

	this.ctn_controle.appendChild(contenant);

	this.contenant=contenant;

}

videoclass.prototype.ajoutevent=function(e){

	e.stopPropagation();
	var that=this;
	e.preventDefault();

	this.vivi.paused ? this.etat_pause=1 : null;
	this.vivi.pause();
	clearInterval(this.interplay);

	that.curent(e);

	document.documentElement.addEventListener("mousemove", that.rentcu, false);
	document.documentElement.addEventListener("mouseup", that.retire, false);
	
}

videoclass.prototype.retireevent=function(){

	var that=this;

	if(this.etat_pause==0){

	this.vivi.play();
	this.interplay=setInterval(function() {that.posivi()},100);
	}

	document.documentElement.removeEventListener("mousemove", that.rentcu, false);
	document.documentElement.removeEventListener("mouseup", that.retire, false);

}

videoclass.prototype.event_son=function(e){

	e.stopPropagation();
	var that=this;
	e.preventDefault();   //evite la selection d'element dans le document
	that.sonson(e);
	document.documentElement.addEventListener("mousemove", that.sn, false);
	document.documentElement.addEventListener("mouseup", that.retson, false);

}

videoclass.prototype.no_event_son=function(){
	var that=this;
	document.documentElement.removeEventListener("mousemove", that.sn, false);
	document.documentElement.removeEventListener("mouseup", that.retson, false);

}


videoclass.prototype.sonson=function(e){		//definition du niveau de son et de la position du curseur du son

	var coords_left=  this.son.getBoundingClientRect().left;

	var setX =e.clientX;

	var distance=this.son.offsetWidth;

	var valeur=(setX-coords_left);

	valeur=valeur/distance;

	if(valeur>1){
		
		this.vivi.volume=1;
		this.son.getElementsByTagName('div')[0].style.width=distance+'px';

	}
	else if(valeur<0){

		this.vivi.volume=0;
		this.son.getElementsByTagName('div')[0].style.width=0+'px';
	}

	else{

		this.vivi.volume=valeur;
		this.son.getElementsByTagName('div')[0].style.width=(valeur*distance)+'px';

	}
}


videoclass.prototype.curent=function(e){		//positionnement de la barre de defilement et de la video par la souris

	var coords_left=  this.defile.getBoundingClientRect().left;

	var setX =e.clientX;

	var distance=this.defile.offsetWidth; //distance reel de la barre de defilement

	var valeur=(setX-coords_left);	//position du curseur de la sourie dans la barre de defilement

	valeur=valeur/distance; //valeur comprise entre 0 et 1

	this.vivi.currentTime=this.vivi.duration*valeur; //conversion par rapport a la video

	if(valeur>1){

		this.vivi.currentTime=this.vivi.duration*0.9999999;
		this.defile.getElementsByTagName('div')[1].style.width=distance+"px";
	}

	else if(valeur<0){

		this.vivi.currentTime=0;
		this.defile.getElementsByTagName('div')[1].style.width=0+"px";
	}

	else{

		this.vivi.currentTime=this.vivi.duration*valeur; //conversion par rapport a la video
		this.defile.getElementsByTagName('div')[1].style.width=(distance*valeur)+"px";
	}

		this.tmp();

}


videoclass.prototype.posivi=function(){		//definition de la position de la barre de defilement

	var valeur=(this.vivi.currentTime/this.vivi.duration).toFixed(6);		//retourne une valeur compris entre 0 et 1

	var distance=this.defile.offsetWidth		//la distance total a parcourir de la barre

	this.defile.getElementsByTagName('div')[1].style.width=(distance*valeur)+"px";
	this.tmp();
}


videoclass.prototype.attente=function() {
	this.progres.style.visibility='visible';
}

videoclass.prototype.saroule=function() {
	this.progres.style.visibility='hidden';
}


videoclass.prototype.marchearret=function(){		// fonction marche arret pour la lecture

	var elem=this.vivi;

	elem.paused==true ? this.f_marche(): this.f_arret()

}


videoclass.prototype.f_marche=function(){		// fonction marche pour la lecture

	var elem=this.vivi;

	var lui=this.marche;

	elem.play();
	var that=this;
	this.etat_pause=0;
	this.interplay=setInterval(function() {that.posivi()},100);
	lui.className='k_pause';
	this.ctx_createur.vivi_courant=this
}


videoclass.prototype.f_arret=function(){		// fonction arret pour la lecture

	var elem=this.vivi;

	var lui=this.marche;
	elem.pause();
	this.etat_pause=1;
	clearInterval(this.interplay);
	lui.className='k_marche';
}



videoclass.prototype.mute=function(e){		// fonction  mute pour le son

	var lui=e.currentTarget;
	var elem=this.vivi;

	if (elem.muted==true) {
		elem.muted=false;
		lui.className='k_mute_off';
	}
	else{
		elem.muted=true;
		lui.className='k_mute_on';
	}
}


videoclass.prototype.stop=function(){		// fonction pour gérer la touche stop

	this.vivi.pause();
	this.etat_pause=1;
	clearInterval(this.interplay);
	this.marche.className='k_marche';
}


videoclass.prototype.toto=function(){		//sert a deteminer si le temp sera celui ecoule ou le temp restant.
	this.total==0 ? this.total=1 : this.total=0;
}


videoclass.prototype.tmp=function(){		//le timer

	var dura=(this.total==0 ? this.vivi.currentTime : this.vivi.duration-this.vivi.currentTime);
	var min = Math.floor(dura / 60);
	if (min < 10) {
		min = '0' + min;
	}
	var sec = Math.floor(dura % 60);
	if (sec < 10) {
		sec = '0' + sec;
	}
	this.temp.firstChild.nodeValue=min+ ':'+sec;
}


videoclass.prototype.full=function(e){		//fonction pour le plein ecran

	var elem = this.vivi;

	if(!this.full_etat){

		if (elem.requestFullscreen) {
			elem.requestFullscreen();
		} else if (elem.msRequestFullscreen) {
			elem.msRequestFullscreen();
		} else if (elem.mozRequestFullScreen) {
			elem.mozRequestFullScreen();
		} else if (elem.webkitRequestFullscreen) {
			elem.webkitRequestFullscreen();
		}
		this.full_etat=true;		
		elem.controls=true;
		elem.play();
	}

	else{

		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.msExitFullscreen) {
			document.msExitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
			document.webkitExitFullscreen();
		}
		this.full_etat=false;
		elem.controls=false;
		elem.play();

	}
}


videoclass.prototype.progression=function(evt){		//progression du chargement de la video

	var elem=evt.currentTarget;

	if(evt.lengthComputable && evt.total) {

		var valeur=(evt.loaded/evt.total);	//retourne une valeur compris entre 0 et 1
	}
	else if(elem.buffered && elem.buffered.length>0){

		var charge=elem.buffered.end(0);
		var valeur=(charge/elem.duration).toFixed(2);	//retourne une valeur compris entre 0 et 1
	}
	this.precharge.style.width=(valeur*100)+'%';
}


videoclass.prototype.changer_local=function(la_video,nom){		//modification du src et reload

		var le=this.vivi;

		if(le.paused==false){
			this.marchearret();
		}

		var elemensource=le.getElementsByTagName('source');

		var extention=nom.substring(nom.lastIndexOf(".")).toLowerCase();

	if(extention=='.webm'){
		
		elemensource[0].setAttribute('src',la_video);
		elemensource[1].setAttribute('src','');
		elemensource[2].setAttribute('src','');
	}

	if(extention=='.ogg'|| extention=='.ogv'){

		elemensource[1].setAttribute('src',la_video);
		elemensource[0].setAttribute('src','');
		elemensource[2].setAttribute('src','');
	}

	if(extention=='.mp4'){

		elemensource[2].setAttribute('src',la_video);
		elemensource[0].setAttribute('src','');
		elemensource[1].setAttribute('src','');
	}

	le.load();
		
	this.charge(this);
}



videoclass.prototype.changer=function(la_video){		//modification du src et reload

		var le=this.vivi;

		if(le.paused==false){
			this.marchearret();
		}
		var elemensource=le.getElementsByTagName('source');

		la_video=la_video.substr(0,la_video.lastIndexOf("."));

		elemensource[0].setAttribute('src',la_video+'.webm');
		elemensource[1].setAttribute('src',la_video+'.ogv');
		elemensource[2].setAttribute('src',la_video+'.mp4');

		le.load();

		this.charge(this);
}



videoclass.prototype.charge=function(lui,tour){		//gestion du chargement de la video

	if(arguments.length==1){
		var tour=0;
	}

	var etat=lui.vivi.readyState;

	if(tour>=15 && etat==0){
		alert('le chargement du fichier a echoué');
		lui.ctx_createur.quit_video(lui);
		return false;
	}

	if(etat>=2){

		lui.ctx_createur.video_valid(lui);
			return false;
		}

	tour++
	setTimeout(lui.charge,200,lui,tour);
}
