//-------------------------------------------------------------
//  Nom Document : k_mur
//  Auteur       : kamel Atmani
//  Objet        : video incurvé http://codes-sources.commentcamarche.net/
//  Création     : 07.08.2015
//-------------------------------------------------------------
//  Mise à Jour  : 17 01 2017
//  Objet        : amélioration des calcules
//-------------------------------------------------------------
//-(*)------------------



var k_mur_video={

    nombre:9,
    nb_hauteur:5,
    angle_max:Math.PI/4,
    marge:1,
	bord:10,
    chemin:'',

    crc:[],
    ctn:null,
    sous_ctn:false,
    inter:"",

    init_video:function(that){

        var conteneur=this.ctn;

        this.ctx_vivi=new videoclass(false,conteneur,conteneur,conteneur,false,this);
        this.ctx_vivi.changer(this.chemin+this.video_nom);

        document.getElementById("btr").onchange=this.local.bind(this);

        this.vivi=this.ctx_vivi.vivi;

        this.ctx_vivi.contenant.style.zIndex=10;

    },


    quit_video:function(){
    },

    video_valid:function(){

        if(this.sous_ctn){

            clearTimeout(this.inter);
            this.sous_ctn.parentNode.removeChild(this.sous_ctn);
            this.sous_ctn=null;
            this.crc.splice(0,this.crc.length);
        }

		this.largeur_vivi=Math.round(this.vivi.videoWidth/this.nombre);
        this.hauteur_vivi=Math.round(this.vivi.videoHeight/this.nb_hauteur);

        this.prepare()

    },


    local:function() {

        var fichier = document.getElementById('btr').files;

        if (fichier[0].type.match('video.*')) {

            var nom=fichier[0].name;

            var extension=nom.substr(nom.lastIndexOf('.')+1).toLowerCase();

            if (extension=="mp4" || extension=="webm" || extension=="ogg") {

                if (window.URL || window.webkitURL) {

                    window.URL = window.URL || window.webkitURL;

                    this.objet_url=URL.createObjectURL(fichier[0])	;

                    this.ctx_vivi.changer_local(this.objet_url,fichier[0].name);
                }

                else{
                    alert('URL.createObjectURL not supported');
                }
            }

            else{
                alert("fichier non pris en charge les fichiers reconnu sont mp4 webm et ogg ");
            }
        }

        else{
            alert("fichier non pris en charge");
        }	
    },


   decoupe:function(){

		var dec=0;

		for(var i= 0; i< this.nb_hauteur; i++){

			for(var j= 0; j< this.nombre; j++){

				var ctx =  this.crc[dec].getContext("2d");

				ctx.drawImage(this.vivi,this.largeur_vivi*j,this.hauteur_vivi*i, this.largeur_vivi, this.hauteur_vivi,0,0, this.crc[dec].width,this.crc[dec].height);

				dec++;
			}
		}

        this.inter=setTimeout(this.decoupe.bind(this),35);

    },


    prepare:function(sens){

        var vivi = document.getElementById('vivi');

       		var largeur_ctn=(this.ctn.clientWidth/2)-this.bord;


        //this.largeur_rectangle=(this.ctn.offsetWidth/this.nombre)-this.marge
		
		//var rayon=(this.largeur_rectangle*(this.nombre/2))/this.angle_max
		
		var rayon=largeur_ctn/Math.sin(this.angle_max);

		this.largeur_rectangle=((rayon*this.angle_max*2)/(this.nombre))-(this.marge);

		var z=rayon*Math.cos(this.angle_max);
		
		var hauteur_rectangle=((this.vivi.videoHeight/this.vivi.videoWidth)*(this.largeur_rectangle*this.nombre))/this.nb_hauteur;

        var hauteur_total=((hauteur_rectangle+this.marge)*this.nb_hauteur)-this.marge+this.bord*2;

        this.ctn.style.height=hauteur_total+'px';

        var sous_ctn=document.createElement('div');

        this.sous_ctn=this.ctn.appendChild(sous_ctn);

        this.sous_ctn.style.marginLeft=this.ctn.offsetWidth/2-this.largeur_rectangle/2+'px';
		
        this.sous_ctn.className="sctn"
		
		var qt_pi=((this.angle_max) / (this.nombre/2));

        var translation_x=this.bord;
        var profondeur_r=0;
        var hauteur=this.bord;
		
        
		for (var h =0;h<this.nb_hauteur; h++){

           var angle=qt_pi*((this.nombre+1)/2);

            for (var i =0; i< (this.nombre); i++){

                var el=document.createElement('canvas');

                el.style.height=hauteur_rectangle+'px';
                el.style.width=this.largeur_rectangle+'px';

                el.style.position='absolute';
                el.style.margin='0px';
                el.style.padding='0px';
                el.style.border='none';
                el.setAttribute("data-repere",this.crc.length);
                el.onclick=que_faire;

                this.crc.push(el);

                angle-=qt_pi;

                profondeur_r=Math.round(Math.cos(angle)*rayon)-z;

                translation_x=Math.sin(angle)*(rayon+this.marge*(this.nombre-1));

                var angle_degre=180 * angle / Math.PI;

                el.style.transform='perspective(1000px)translateX('+-translation_x+'px)translateZ('+(-profondeur_r)+'px)rotateY('+angle_degre+'deg)translateY('+(hauteur)+'px)';

                this.sous_ctn.appendChild(el);

            }

            angle=0;
            hauteur+=hauteur_rectangle+this.marge;
        }
        this.ctx_vivi.marchearret();
        this.decoupe(this);
    }

}

function que_faire(e){

    alert(e.currentTarget.getAttribute("data-repere"));

}