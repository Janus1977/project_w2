    function ucFirst(str) {
        if (str.length > 0) {
            return str[0].toUpperCase() + str.substring(1);
        } else {
            return str;
        }
    }

    function activeHero() {
        afficheInfosCamp();
        afficheInventaire();
    }

    function afficheInfosCamp() {
        if (document.getElementById('infocamp').style.visibility == "hidden") {
            document.getElementById('infocamp').style.visibility = "visible";
            document.getElementById('infocamp').style.display = "block";
            setCout(100, '', true);
        } else {
            document.getElementById('infocamp').style.visibility = "hidden";
            document.getElementById('infocamp').style.display = "none";
            setCout(100, '', false);
        }
    }

    function afficheInventaire() {
        if (document.getElementById('inventaire').style.visibility == "hidden") {
            document.getElementById('inventaire').style.visibility = "visible";
            document.getElementById('inventaire').style.display = "block";
        } else {
            document.getElementById('inventaire').style.visibility = "hidden";
            document.getElementById('inventaire').style.display = "none";
        }
    }

    function affiche(data,type) {
        //id_cout_taille
        var datas = data.split("_");
        afficheData('affiche'+ucFirst(type),data,type);
        setCout(datas[1]);
    }
    
    function switchHerosCamp() {
        if (document.getElementById('heroscamp').disabled) {
            document.getElementById('heroscamp').disabled = false;
        } else {
            document.getElementById('heroscamp').disabled = true;
        }
    }
    function envoiFormulaire() {
//        var xhr = getXMLHttpRequest();
//
//        if (xhr && xhr.readyState != 0) {
//            xhr.abort();
//            delete xhr;
//        }
//
//        xhr.onreadystatechange = function() {
//            if (xhr.readyState == 4 && xhr.status == 200){
//                document.getElementById('afficheUnite').innerHTML = xhr.responseText;
//            } else if (xhr.readyState == 3){
//                document.getElementById('afficheUnite').innerHTML = "<div style=\"text-align: center;\">Chargement en cours...</div>";
//            }
//        }
//
//        xhr.open("POST", "ajax/unite.ajax.php", true);
//        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
//        xhr.send("idarmure="+idArmure);
    }

    var cout_initial = 0;
    var cout_actuel = 0;
    var cout_arme_g = 0;
    var cout_arme_d = 0;
    var cout_armure = 0;

    function setCout(valeur,cote,ajout) {
        lValeur = parseInt(valeur);
        if (cout_initial == 0) {
            cout_initial = lValeur;
            cout_actuel = cout_initial;
        } else {
            if (ajout) {
                //Ajout d'une valeur
                cout_actuel += parseInt(valeur);
            } else {
                //retrait d'une valeur
                if (cote != '') {
                    if (cote == "g") {
                        cout_actuel -= cout_arme_g;
                    } else {
                        cout_actuel -= cout_arme_d;
                    }
                } else {
                    if (cout_armure != 0) {
                        cout_actuel -= cout_armure;
                    } else {
                        cout_actuel -= lValeur;
                    }
                }
                //cout_actuel += parseInt(valeur);
            }
            if (document.getElementById('coutUnite') != null) {
                document.getElementById('coutUnite').innerHTML = cout_actuel;
            }
            
            //document.getElementById('cout').value = cout_actuel;
        }
        
    }

    function setArmure(idArmure) {
       //id_cout
        var datas = idArmure.split("_");
        //traitement du cout de l'unité
        if (cout_initial >= cout_actuel) {
            setCout(datas[1],'',true);
        } else {
            setCout(datas[1],'',false);
        }
        cout_armure = parseInt(datas[1]);
    }

    function setArme(sel,idArme) {
        //arme_g ou arme_d
        var cote = sel.name.substr(-1);
        //id_cout_taille
        var datas = idArme.split("_");
        //traitement du cout de l'unité
        if (cout_initial >= cout_actuel) {
            setCout(datas[1],cote,true);
        } else {
            setCout(datas[1],cote,false);
        }
        if (cote == "g") {
            //taille de l'arme
            cout_arme_g = parseInt(datas[1]);
            if (datas[2] == "1") {
                //Arme à deux mains
                document.getElementById('idarme_d').selectedIndex = sel.selectedIndex;
                document.getElementById('idarme_d').disabled = true;
            } else {
                //Arme à une main
                if (document.getElementById('idarme_d').disabled == true) {
                    document.getElementById('idarme_d').disabled = false;
                    document.getElementById('idarme_d').selectedIndex = 0;
                }
            }
        } else {
            cout_arme_d = parseInt(datas[1]);
            if (datas[2] == "1") {
                //Arme à deux mains
                document.getElementById('idarme_g').selectedIndex = sel.selectedIndex;
                document.getElementById('idarme_g').disabled = true;
            } else {
                //Arme à une main
                if (document.getElementById('idarme_g').disabled == true) {
                    document.getElementById('idarme_g').disabled = false;
                    document.getElementById('idarme_g').selectedIndex = 0;
                }
            }
        }
    }