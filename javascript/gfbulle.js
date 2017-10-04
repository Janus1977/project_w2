//-------------------------------------------------------------
// Nom Document : gfbulle.js
// Auteur : G.Ferraz
// Objet : Info Bulle...
// Creation : 01.12.2003
/*-------------------------------------------------------------
    Version :
    15.09.2008
    - Ajout possibilite d'afficher un objet cache
    - BulleHide n'est plus obligatoire
    - Optimisations diverses
    15.08.2007
    - Ajout fonction Init_Bulle plus esprit DOM plus modif. mineures.
    10.11.2006
    - Correction Bug sous FF si document <DIV style="float...">
    15.09.2006
    - Ajout parametre x_ et y_ sur la fonction BulleWrite
    - Amelioration, modif. mineures.
    29.05.2006
    - Compatibilite IE6 et DOCTYPE
    10.11.2003
    - version initiale
    -------------------------------------------------------------*/
var bullewrite = BulleWrite;
var Mouse_X; // Position X en Cours de la Mouse
var Mouse_Y; // Position Y en Cours de la Mouse
var Decal_X; // Decalage X entre Pointeur Mouse et Bulle
var Decal_Y; // Decalage Y entre Pointeur Mouse et Bulle
var bBULLE = false; // Flag Affichage de la Bulle
var Fenetre = new Object(); // pour dimension fenetre
//-- 10.11.2006 ----------------------------
// correction bug sur <DIV style="float...">
// Gestion Probleme Barre de scroll sous FireFOX
//------------------------------------------
function Win_GetDimension(){
    //-- Variables locales
    var Top, Left, Width, Height;
    var ddE = document.documentElement;
    var dB = document.body;
    if( window.innerWidth){
        with( window){
            //-- position scrolling
            Left = pageXOffset;
            Top = pageYOffset;
            //-- dimension scroll compris
            Width = innerWidth;
            Height = innerHeight;
            //-- Recup Max et min Hauteur du document
            var H_Max = Math.max( ddE.clientHeight, dB.clientHeight);
            var H_Min = Math.min( ddE.clientHeight, dB.clientHeight);
            //-- si hauteur document plus grand que fenetre
            if( H_Max > Height)
                Height = H_Min;
            //-- si hauteur document plus petit que fenetre
            else
                Height = H_Max;
            //-- Recup Max et min Largeur du document
            var L_Max = Math.max( ddE.clientWidth, dB.clientWidth);
            var L_Min = Math.min( ddE.clientWidth, dB.clientWidth);
            //-- si largeur document plus grand que fenetre
            if( L_Max > Width)
                Width = L_Min;
            //-- si largeur document plus petit que fenetre
            else
                Width = L_Max;
            }
    }
    else{ // Cas Explorer a part le plus simple
        var DocRef;
        if( ddE && ddE.clientWidth)
            DocRef = ddE;
        else
            DocRef = dB;
        with( DocRef){
            Left = scrollLeft;
            Top = scrollTop;
            Width = clientWidth;
            Height = clientHeight;
            }
    }
    return({
        width : Width,
        height : Height,
        top: Top,
        right: Left +Width,
        bottom: Top + Height,
        left: Left
    });
}
//------------------------------------
function ObjShowAll( div_, x_, y_, z_){
    var O_Bulle = document.getElementById( div_);
    var MaxX, MaxY;
    var Haut, Larg;
    var SavY = y_;
    if( O_Bulle){
        //-- Recup. dimension du DIV
        Larg = O_Bulle.offsetWidth;
        Haut = O_Bulle.offsetHeight;
        //-- Reajuste dimension fenetre
        MaxX = Fenetre.right - Larg;
        MaxY = Fenetre.bottom - Haut;
        //-- Application Bornage
        if( x_ > MaxX) x_ = MaxX;
        if( x_ < Fenetre.left) x_ = Fenetre.left;
        if( y_ > MaxY) y_ = MaxY;
        if( y_ < Fenetre.top) y_ = Fenetre.top;
        //-- si en bas On reajuste
        //-- pour que la bulle ne prenne pas le focus
        if( y_== MaxY){
            var DeltaY = MaxY -SavY;
            if( Mouse_X > x_) // Ajout optimisation placement
                y_ = MaxY - DeltaY -Haut -2*Decal_Y;
        }
        //-- Place la bulle
        O_Bulle.style.left = x_ +"px";
        O_Bulle.style.top = y_ +"px";
        O_Bulle.style.zIndex = z_;
        O_Bulle.style.visibility = "visible";
    }
}
//-- 15.09.2006 ------------------------
// Ajout Fonction Add_Event
//--------------------------------------
function Add_Event( obj_, event_, func_, mode_){
    if( obj_.addEventListener)
        obj_.addEventListener( event_, func_, mode_? mode_:false);
    else
        obj_.attachEvent( 'on'+event_, func_);
}
//-- 15.09.2006 ------------------------
// Ajout parametre x_ et y_
//-- 15.09.2008 ------------------------
// Ajout passage de l'ID d'un Objet
//--------------------------------
function BulleWrite( txt_, x_, y_){
    var O_Bulle = document.getElementById( 'GF_BULLE');
    //-- Test oubli parametre ou vide
    txt_ = txt_ ? txt_ :"<span style='color:red;'><b>ERREUR<\/b> : param&egrave;tre <b>txt_<\/b> omis...<\/span>";
    if( O_Bulle){
        //-- Recup dimension d'affichage
        Fenetre = Win_GetDimension();
        // Decalage hors de la Bulle
        Decal_X =( x_ ? x_: 5); // Decal_X = 5 par defaut
        Decal_Y =( y_ ? y_: 5); // Decal_Y = 5 par defaut
        //-- Teste si ID Objet
        var tabTmp = txt_.split(':');
        if( tabTmp[0].toLowerCase() ==('id')){
            var szID = tabTmp[1];
            var O_Src = document.getElementById( szID);
            if( O_Src){
                var O_Clone = O_Src.cloneNode( true);
                O_Bulle.appendChild( O_Clone);
                O_Clone.style.display = '';
                O_Clone.style.visibility = 'visible';
                bBULLE= true;
            }
            else{
                //-- ERREUR on previent
                txt_ ="<span style=\'color:red;\'\><b>ERREUR<\/b> : Objet ID : [<b>"+ tabTmp[1] +"<\/b>] non d&eacute;finie...<\/span>";
                setTimeout( "BulleWrite(\"" + txt_ +"\"," + x_+"," + y_+")", 10);
                return( false);
            }
        }
        else{
            //-- Ecriture de la Bulle
            O_Bulle.innerHTML = "<div class='gfbulle'>" +txt_ +"<\/div>";
        }
        //-----------------------------------------//
        // IMPORTANT on n'affiche pas la Bulle //
        // l'evenement MouseOver va avec MouseMove //
        //-----------------------------------------//
        // ObjShowAll('GF_BULLE', Mouse_X +Decal_X, Mouse_Y +Decal_Y, 1000);
        bBULLE= true;
        return( true);
    }
    return(false);
}
//------------------
function BulleHide(){
    var O_Bulle = document.getElementById( 'GF_BULLE');
    with(O_Bulle){
        innerHTML = "";
        style.left = -1000 +"px";
        style.top = -1000 +"px";
        style.zIndex = 0;
        style.visibility = "hidden";
        }
    bBULLE = false;
    return(true);
}
//--------------------
function WhereMouse(e){
    var O_Src;
    var ddE = document.documentElement;
    var dB = document.body;
    //-- On traque les hybrides
    if( e && e.target){
        Mouse_X = e.pageX;
        Mouse_Y = e.pageY;
        O_Src = e.target;
    }
    //-- Pour IE
    else{
        var DocRef;
        if( ddE && ddE.clientWidth)
            DocRef = ddE;
        else
            DocRef = dB;
        Mouse_X = event.clientX +DocRef.scrollLeft;
        Mouse_Y = event.clientY +DocRef.scrollTop;
        O_Src = event.srcElement;
    }
    //-- Affiche Bulle si necessaire
    if( bBULLE){
        //-- Ajoute evenement mouseout
        if( !O_Src.gf_flag){
            O_Src.gf_flag = true;
            Add_Event( O_Src, 'mouseout', BulleHide);
        }
        ObjShowAll('GF_BULLE', Mouse_X +Decal_X, Mouse_Y +Decal_Y, 1000);
    }
    return( true);
}
//-- 15.08.2007 ---------------------------
// Fonction plus DOM que les document.write
//-----------------------------------------
function Init_Bulle(){
    if( document.createElement){
        //-- Creation du DIV Bulle
        var O_New = document.createElement('div');
        //-- Definition du style
        with( O_New){
            id = "GF_BULLE";
            style.position = "absolute";
            style.left = "0px";
            style.top = "0px";
            style.width = "auto";
            style.height = "auto";
            style.zIndex = 0;
            style.visibility = "hidden";
            }
        //-- Ajout de l'element DIV
        document.body.appendChild( O_New);
        //-- Ajout evenement position
        Add_Event( document, 'mousemove', WhereMouse);
    }
}
//== INITIALISATION ==================================
Add_Event( window, 'load', Init_Bulle);
    //-- EOF ------------------------------------------------------
