var k_barre={

    jeu_a:{0:'0001101',1:'0011001',2:'0010011',3:'0111101',4:'0100011',5:'0110001',6:'0101111',7:'0111011',8:'0110111',9:'0001011' },

    jeu_b:{ 0:'0100111',1:'0110011',2:'0011011',3:'0100001',4:'0011101',5:'0111001',6:'0000101',7:'0010001',8:'0001001',9:'0010111' },

    jeu_c:{ 0:'1110010',1:'1100110',2:'1101100',3:'1000010',4:'1011100',5:'1001110',6:'1010000',7:'1000100',8:'1001000',9:'1110100' },

    tb_jeu:{

        0: ['null','a','a','a','a','a','a','c','c','c','c','c','c'],
        1: ['null','a','a','b','a','b','b','c','c','c','c','c','c'],
        2: ['null','a','a','b','b','a','b','c','c','c','c','c','c'],
        3: ['null','a','a','b','b','b','a','c','c','c','c','c','c'],
        4: ['null','a','b','a','a','b','b','c','c','c','c','c','c'],
        5: ['null','a','b','b','a','a','b','c','c','c','c','c','c'],
        6: ['null','a','b','b','b','a','a','c','c','c','c','c','c'],
        7: ['null','a','b','a','b','a','b','c','c','c','c','c','c'],
        8: ['null','a','b','a','b','b','a','c','c','c','c','c','c'],
        9: ['null','a','b','b','a','b','a','c','c','c','c','c','c']

    },
    tb_controle: [1,3,1,3,1,3,1,3,1,3,1,3],

    dimension:function (lui){

        this.config.echelle=parseInt(lui.value);

        var canvas = document.getElementById("canvas");

        canvas.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche;
        canvas.parentNode.style.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche+"px";
        this.crea_barre_b();

    },

    dimension_h:function (lui){

        this.config.echelle_h=parseInt(lui.value);

        var canvas = document.getElementById("canvas");

        canvas.height=this.config.echelle_h+this.config.bord+this.config.bord_bas;
        this.crea_barre_b();

    },

    police:function (lui){

        this.config.poli=parseInt(lui.value);
        this.crea_barre_b();

    },

    bordure:function (lui){

        this.config.bord=parseInt(lui.value)*2;

        var canvas = document.getElementById("canvas");

        canvas.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche;
        canvas.parentNode.style.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche+"px";
        canvas.height=this.config.echelle_h+this.config.bord+this.config.bord_bas;

        this.crea_barre_b();

    },


    bordure_bas:function (lui){

        this.config.bord_bas=parseInt(lui.value);

        var canvas = document.getElementById("canvas");

        canvas.height=this.config.echelle_h+this.config.bord+this.config.bord_bas;

        this.crea_barre_b();

    },

    bordure_gauche:function (lui){

        this.config.bord_gauche=parseInt(lui.value);

        var canvas = document.getElementById("canvas");

        canvas.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche;
        canvas.parentNode.style.width=(this.config.echelle*95)+this.config.bord+ this.config.bord_gauche+"px";

        this.crea_barre_b();

    },


    posilice:function (lui){

        this.config.posi_police=parseInt(lui.value);

        this.crea_barre_b();

    },

    coul_fond:function (lui){

        this.config.couleur_fond=lui.value;

        this.crea_barre_b();

    },
	
	gest_erreur : function(){
		
					switch(this.nom) {
    case 0:
        alert("dit coco t'a oublier de mettre un nom");
        break;
    case 1:
        alert("c'est la deuxieme fois");
        break;
     case 2:
        alert("jamais deux sans trois");
        break;
		 case 3:
        alert("tu fait quoi");
        break;
		 case 4:
        alert("j''abandonne");
        break;
		case 7:
        alert("t'en a pas mare");
        break;
	
} 
		this.nom++;
		
	},

    telecharger:function(e){
		
		if( this.input_fichier.value==""){
			
			this.gest_erreur();
			return false;	
		}
		this.nom=0

        var canvas = document.getElementById("canvas");
        var elem = document.createElement('a');
        elem.href = canvas.toDataURL("image/png");
        elem.download = this.input_fichier.value+".png";
        var evt = new MouseEvent("click", { bubbles: true,cancelable: true,view: window,});
        elem.dispatchEvent(evt);
		this.input_fichier=null;
		this.quit();
    },


    crea_barre_b:function () {

        var deco=document.getElementById('code').value;

        if (isNaN(deco)){
            alert('le code comporte des caracteres');
            return false;
        }

        if (deco.length<12){
            alert('code trop court');
            return false;
        }

        if (deco.length>13){
            alert('code trop long');
            return false;
        }

        var controle=0;

        for (var i = 0; i < 12; i++) {

            var chiffre_c=parseInt(deco.substring(i, i+1));
            controle+= (chiffre_c * this.tb_controle[i]);
        }

        controle=controle % 10;

        controle= controle==0 ? 0 : 10-controle;

        var carac_1=parseInt(deco.substring(0,1));
        var rendu='101';

        for (var i = 1; i < 12; i++) {

            var chiffre=deco.substring(i, i+1);

            if( this.tb_jeu[carac_1][i]=='a'){
                rendu+= this.jeu_a[chiffre];
            }

            if( this.tb_jeu[carac_1][i]=='b'){
                rendu+= this.jeu_b[chiffre];
            }

            if( this.tb_jeu[carac_1][i]=='c'){
                rendu+= this.jeu_c[chiffre];
            }

            if (i==6){
                rendu+='01010';
            }
        }
        rendu+= this.jeu_c[controle];
        rendu+='101';

        var posi=0;

        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");

        ctx.fillStyle = this.config.couleur_fond;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        for (var i = 0; i < rendu.length; i++) {

            var couleur = rendu[i]=='0'  ?  this.config.couleur_fond :  "black";

            hauteur=(i==0 || i==2 || i==46 || i==48 || i==92 || i==94) ? this.config.echelle_h+(this.config.poli/1.5) : this.config.echelle_h;

            ctx.fillStyle = couleur;
            ctx.fillRect(posi+this.config.bord/2+ this.config.bord_gauche,this.config.bord/2,this.config.echelle, hauteur);

            posi+= this.config.echelle;
        }

        var y = this.config.posi_police;

        ctx.font = this.config.poli+'pt Calibri';
        ctx.textAlign = 'center';

        var txt=deco.substring(0, 1);
        ctx.fillText(txt, this.config.bord_gauche/1.5, y);

        txt=deco.substring(1, 7);
        ctx.fillText(txt, (this.config.bord/2)+(this.config.echelle*25)+ this.config.bord_gauche, y);

        txt=deco.substring(7, 12)+controle;
        ctx.fillText(txt,(this.config.bord/2)+(this.config.echelle*70)+ this.config.bord_gauche, y);

    },


    conserver:function(){

        var donne=JSON.stringify(this.config);

        try {
            localStorage.setItem("donne_code_barre", donne);
        }
        catch (e) {
        }

    },


    sauver:function(){
		
		if( this.input_fichier.value==""){
			this.gest_erreur();
			return false;	
		}

        var donne=JSON.stringify(this.config);

        if(navigator.msSaveOrOpenBlob){

            var blobObject = new Blob([donne]);
            window.navigator.msSaveOrOpenBlob(blobObject, this.input_fichier.value+".json");
        }

        else{
            var blob = new Blob([donne], {type: "octet/stream"});
            var  url = window.URL.createObjectURL(blob);

            var elem = document.createElement('a');
            elem.href = url;
            elem.download = this.input_fichier.value+".json";

            var evt = new MouseEvent("click", { bubbles: true,cancelable: true,view: window,});
            elem.dispatchEvent(evt);

            setTimeout(function(){
                window.URL.revokeObjectURL(url);  
            }, 100);
        }

        this.input_fichier=null;
        this.quit();

    },


    fichier_clic: function(){

        document.getElementById('fileinput').click();
    },


    charger_fichier: function(){

        var fichier = document.getElementById('fileinput').files;

        var charge=new FileReader();

        charge.readAsText(fichier[0]);

        charge.onloadend = function(e){

            k_barre.config=JSON.parse(e.target.result);


            var canvas = document.getElementById("canvas");

            canvas.width=( k_barre.config.echelle*95)+ k_barre.config.bord+  k_barre.config.bord_gauche;
            canvas.parentNode.style.width=( k_barre.config.echelle*95)+ k_barre.config.bord+  k_barre.config.bord_gauche+"px";
            canvas.height= k_barre.config.echelle_h+ k_barre.config.bord+ k_barre.config.bord_bas;

            document.getElementById("largeur").value=k_barre.config.echelle;
            document.getElementById("hauteur").value= k_barre.config.echelle_h;
            document.getElementById("bordure").value= k_barre.config.bord;
            document.getElementById("bordure_b").value= k_barre.config.bord_bas;
            document.getElementById("police").value= k_barre.config.poli;
            document.getElementById("bordure_g").value= k_barre.config.bord_gauche;
            document.getElementById("posi_texte").value=k_barre.config.posi_police;
            document.getElementById("coul_fond").value=k_barre.config.couleur_fond;

        }

    },

    charger: function(){  

        try {

            if(localStorage.getItem("donne_code_barre")){
                var d=localStorage.getItem("donne_code_barre");
                k_barre.config=JSON.parse(d);

                var canvas = document.getElementById("canvas");

                canvas.width=( k_barre.config.echelle*95)+ k_barre.config.bord+  k_barre.config.bord_gauche;
                canvas.parentNode.style.width=( k_barre.config.echelle*95)+ k_barre.config.bord+  k_barre.config.bord_gauche+"px";
                canvas.height= k_barre.config.echelle_h+ k_barre.config.bord+ k_barre.config.bord_bas;
            }

            document.getElementById("largeur").value=k_barre.config.echelle;
            document.getElementById("hauteur").value= k_barre.config.echelle_h;
            document.getElementById("bordure").value= k_barre.config.bord;
            document.getElementById("bordure_b").value= k_barre.config.bord_bas;
            document.getElementById("police").value= k_barre.config.poli;
            document.getElementById("bordure_g").value= k_barre.config.bord_gauche;
            document.getElementById("posi_texte").value=k_barre.config.posi_police;
            document.getElementById("coul_fond").value=k_barre.config.couleur_fond;

        }

        catch (e) {
        }
    },


    cdr:'',
    message:'',
    input_fichier:"",
	nom:0,

    quit:function(){

        this.cdr.parentNode.removeChild(this.cdr);
		this.nom=0;
        window.removeEventListener('resize',this.centrer,false);
    },

    boite:function(tpe){

        var el=document.createElement('div');
        el.className='cadre';

        var txt=document.createTextNode('nom du fichier');
        el.appendChild(txt);

        var el2=document.createElement('input');
        el2.type='text';
        el2.className='input_fic';
        this.input_fichier=el.appendChild(el2)

        var el3=document.createElement('input');
        el3.type='text';
        el3.value='annuler'
        el3.className='bouton_fic';
        var that=this;
        el3.onclick=function(){that.quit()}
        el.appendChild(el3)

        var el4=document.createElement('input');
        el4.type='text';
        el4.value='valider'
        el4.className='bouton_fic';
        var that=this;
		
		if(tpe=='image'){
		el4.onclick=function(){that.telecharger()};
		}
		
		if(tpe=="fichier"){
			el4.onclick=function(){that.sauver()};
		}
       
        el.appendChild(el4)

        this.cdr=document.body.appendChild(el);
        this.centrer();
		this.input_fichier.focus();
    },

    centrer:function(){

        k_barre.cdr.style.top=(document.documentElement.clientHeight- k_barre.cdr.offsetHeight)/2+"px";
        k_barre.cdr.style.left=((document.documentElement.clientWidth- k_barre.cdr.offsetWidth)/2)+'px';
    },


    init:function(){

        k_barre.config={

            "echelle":5,
            "poli":40,
            "echelle_h":80,
            "bord":20,
            "bord_bas":20,
            "bord_gauche":25,
            "posi_police":140,
            "couleur_fond":"white"
        }

        document.getElementById("largeur").value=k_barre.config.echelle;
        document.getElementById("hauteur").value= k_barre.config.echelle_h;
        document.getElementById("bordure").value= k_barre.config.bord;
        document.getElementById("bordure_b").value= k_barre.config.bord_bas;
        document.getElementById("police").value= k_barre.config.poli;
        document.getElementById("bordure_g").value= k_barre.config.bord_gauche;
        document.getElementById("posi_texte").value=k_barre.config.posi_police;
        document.getElementById("coul_fond").value=k_barre.config.couleur_fond;
    }

}
window.addEventListener("load",  k_barre.init, false);