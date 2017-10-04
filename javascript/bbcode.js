/*
	Fonction de BBcode pour le minichat et les MP, dans un premier temps r�cup�r� du tuto du SDZ
*/

function insertTag(startTag, endTag, textareaId, tagType) {
        var field = document.getElementById(textareaId);
        field.focus();
        var currentSelection;
        var startSelection;
        var endSelection;
        var textRange;
        var URL;
        var label;
        var auteur;
        var citation;

        /* === Partie 1 : on r�cup�re la s�lection === */

        if (window.ActiveXObject) { // C'est IE
                textRange = document.selection.createRange();
                currentSelection = textRange.text;

                textRange.text = startTag + currentSelection + endTag;
                textRange.moveStart("character", -endTag.length - currentSelection.length);
                textRange.moveEnd("character", -endTag.length);
                textRange.select();
        } else { // Ce n'est pas IE
                startSelection   = field.value.substring(0, field.selectionStart);
                currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
                endSelection     = field.value.substring(field.selectionEnd);

                field.value = startSelection + startTag + currentSelection + endTag + endSelection;
                field.focus();
                field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
        }

        /* === Partie 2 : on analyse le tagType === */
        if (tagType) {
                switch (tagType) {
						case "lien":
						        endTag = "\[/lien\]";
						        if (currentSelection) { // Il y a une s�lection
						                if (currentSelection.indexOf("http://") == 0 || currentSelection.indexOf("https://") == 0 || currentSelection.indexOf("ftp://") == 0 || currentSelection.indexOf("www.") == 0) {
						                        // La s�lection semble �tre un lien. On demande alors le libell�
						                        label = prompt("Quel est le libell� du lien ?") || "";
						                        startTag = "\[lien url=\"" + currentSelection + "\"\]";
						                        currentSelection = label;
						                } else {
						                        // La s�lection n'est pas un lien, donc c'est le libelle. On demande alors l'URL
						                        URL = prompt("Quelle est l'url ?");
						                        startTag = "\[lien url=\"" + URL + "\"\]";
						                }
						        } else { // Pas de s�lection, donc on demande l'URL et le libelle
						                URL = prompt("Quelle est l'url ?") || "";
						                label = prompt("Quel est le libell� du lien ?") || "";
						                if (URL.indexOf("http://") == 0 || URL.indexOf("https://") == 0 || URL.indexOf("ftp://") == 0 || URL.indexOf("www.") == 0) {
							                startTag = "\[lien url=\"" + URL + "\"\]";
							            } else {
							                startTag = "\[lien url=\"http://" + URL + "\"\]";
							            }
						                currentSelection = label;
						        }
						break;
						case "citation":
						        endTag = "\[/citation\]";
						        if (currentSelection) { // Il y a une s�lection
						                if (currentSelection.length > 30) { // La longueur de la s�lection est plus grande que 30. C'est certainement la citation, le pseudo fait rarement 20 caract�res
						                        auteur = prompt("Quel est l'auteur de la citation ?") || "";
						                        startTag = "\[citation nom=\"" + auteur + "\"\]";
						                } else { // On a l'Auteur, on demande la citation
						                        citation = prompt("Quelle est la citation ?") || "";
						                        startTag = "\[citation nom=\"" + currentSelection + "\"\]";
						                        currentSelection = citation;
						                }
						        } else { // Pas de selection, donc on demande l'Auteur et la Citation
						                auteur = prompt("Quel est l'auteur de la citation ?") || "";
						                citation = prompt("Quelle est la citation ?") || "";
						                startTag = "\[citation nom=\"" + auteur + "\"\]";
						                currentSelection = citation;
						        }
						break;
                }
        }

        /* === Partie 3 : on ins�re le tout === */
        if (window.ActiveXObject) {
                textRange.text = startTag + currentSelection + endTag;
                textRange.moveStart("character", -endTag.length - currentSelection.length);
                textRange.moveEnd("character", -endTag.length);
                textRange.select();
        } else {
                field.value = startSelection + startTag + currentSelection + endTag + endSelection;
                field.focus();
                field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
        }
}

function preview(textareaId, previewDiv) {
	var field = textareaId.value;
	if (document.getElementById('previsualisation').checked && field) {
		
		//Smilies: il faut que les �l�ments des symboles correspondent avec les �l�ments des noms d'images
		//Ex: ';-\)' => 'wink.gif', ou ':innocent:' => 'innocent.gif'
		//En gros: smiliesName[i] == smiliesUrl[j] pour avoir le bon smiley au bon symbole
		//Symboles des smilies
		var smiliesName = new Array(';-\\)',':-\\)',':-D',':-P',':-s','\\^\\^',':lol:',':mdr:',':oO:',':o',':bien:',':oops:',':cool:',':bye:',':lu:',':euh:',':innocent:',':mad:',':-_-:',':ninga:',':roll:',':\\(',':pff:',':love:');
		
		//Nom des images � compl�ter
		var smiliesUrl  = new Array('wink.gif','smile.gif','biggrin.gif','tongue.gif','wacko.gif','happy.gif','laugh.gif','w00t.gif','blink.gif','blink.gif','bien.gif','blushing.gif','cool.gif','bye.gif','hello.gif','huh.gif','innocent.gif','mad.gif','mellow.gif','ph34r.gif','rolleyes.gif','sad.gif','scratch.gif','wub.gif');
		
		//Adresse � changer quand on passera sur le serveur de jeu
		var smiliesPath = "http://ultimewar.olympe-network.com/images/smileys/";
	
		field = field.replace(/&/g, '&amp;');
		field = field.replace(/</g, '&lt;').replace(/>/g, '&gt;');
		field = field.replace(/\n/g, '<br />').replace(/\t/g, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
		
		field = field.replace(/\[g\]([\s\S]*?)\[\/g\]/g, '<strong>$1</strong>');
		field = field.replace(/\[i\]([\s\S]*?)\[\/i\]/g, '<em>$1</em>');
		field = field.replace(/\[u\]([\s\S]*?)\[\/u\]/g, '<u>$1</u>');
		field = field.replace(/\[s\]([\s\S]*?)\[\/s\]/g, '<s>$1</s>');
		field = field.replace(/\[lien\]([\s\S]*?)\[\/lien\]/g, '<a href="$1">$1</a>');
		field = field.replace(/\[lien url="([\s\S]*?)"\]([\s\S]*?)\[\/lien\]/g, '<a href="$1" title="$2">$2</a>');
		field = field.replace(/\[image\]([\s\S]*?)\[\/image\]/g, '<img src="$1" alt="Image" />');
		field = field.replace(/\[citation nom=\"(.*?)\"\]([\s\S]*?)\[\/citation\]/g, '<br /><span class="citation">Citation : $1</span><div class="citation2">$2</div>');
		field = field.replace(/\[citation lien=\"(.*?)\"\]([\s\S]*?)\[\/citation\]/g, '<br /><span class="citation"><a href="$1">Citation</a></span><div class="citation2">$2</div>');
		field = field.replace(/\[citation nom=\"(.*?)\" lien=\"(.*?)\"\]([\s\S]*?)\[\/citation\]/g, '<br /><span class="citation"><a href="$2">Citation : $1</a></span><div class="citation2">$3</div>');
		field = field.replace(/\[citation lien=\"(.*?)\" nom=\"(.*?)\"\]([\s\S]*?)\[\/citation\]/g, '<br /><span class="citation"><a href="$1">Citation : $2</a></span><div class="citation2">$3</div>');
		field = field.replace(/\[citation\]([\s\S]*?)\[\/citation\]/g, '<br /><span class="citation">Citation</span><div class="citation2">$1</div>');
		field = field.replace(/\[taille valeur=\"(.*?)\"\]([\s\S]*?)\[\/taille\]/g, '<span class="$1">$2</span>');
		field = field.replace(/\[couleur valeur=\"(.*?)\"\]([\s\S]*?)\[\/couleur\]/g, '<span class="$1">$2</span>');
		
		for (var i=0, c=smiliesName.length; i<c; i++) {
			field = field.replace(new RegExp(" " + smiliesName[i] + " ", "g"), "&nbsp;<img src=\"" + smiliesPath + smiliesUrl[i] + "\" alt=\"" + smiliesUrl[i] + "\" />&nbsp;");
		}
		
		document.getElementById(previewDiv).innerHTML = field;
	}
}

function textareaSize(zoneTexte) {
	if (zoneTexte) {
		nbrLignes=2;longueurDeLigne=2; // Taille minimal de la zone de texte.
		nbrLignesMax=18;longueurDeLigneMax=9; // Taille maximale de la zone de texte.
		lesLignes=escape(zoneTexte.value).split("%0D%0A");
		
		if (lesLignes) {
			nbrLignes=lesLignes.length;
		}
		
		if (nbrLignes>document.body.clientHeight/nbrLignesMax) {
			nbrLignes=document.body.clientHeight/nbrLignesMax;
		}
		
		if (lesLignes) {
			for(n=0; n<(lesLignes.length); n++) {
				if (longueurDeLigne<unescape(lesLignes[n]).length) {
					longueurDeLigne=unescape(lesLignes[n]).length;
				}
				if (longueurDeLigne>document.body.clientWidth/longueurDeLigneMax) {
					longueurDeLigne=document.body.clientWidth/longueurDeLigneMax;
					nbrLignes+=unescape(lesLignes[n]).length/(document.body.clientWidth/longueurDeLigneMax);
				}
			}
		} else {
			longueurDeLigne=zoneTexte.value.length
		}
		if (nbrLignes>document.body.clientHeight/nbrLignesMax) {
			nbrLignes=document.body.clientHeight/nbrLignesMax;
		}
		
		zoneTexte.cols=(longueurDeLigne+1); // Charge le nombre de colonnes utile, plus une colonne pour la clart�
		zoneTexte.rows=(nbrLignes+1); // Charge le nombre de lignes utile, plus une ligne pour la clart�
	}
}


function textareaSizeLimites(zoneTexte,colMin,colMax,rowMin,rowMax) {
	if (zoneTexte) {
		nbrLignesMin=rowMin;longueurDeLigneMin=colMin; // Taille minimal de la zone de texte.
		nbrLignesMax=rowMax;longueurDeLigneMax=colMax; // Taille maximale de la zone de texte.
		nbrLignes=nbrLignesMin;
		longueurDeLigne=longueurDeLigneMin;
		lesLignes=escape(zoneTexte.value).split("%0D%0A");
		
		if (lesLignes) {
			nbrLignes=lesLignes.length;
		}
		
		if (nbrLignes>nbrLignesMax) {
			nbrLignes=nbrLignesMax;
		} else if (nbrLignes<nbrLignesMin) {
			nbrLignes=nbrLignesMin;
		}
		
		if (lesLignes) {
			for(n=0; n<(lesLignes.length); n++) {
				if (longueurDeLigneMin<unescape(lesLignes[n]).length) {
					longueurDeLigne=unescape(lesLignes[n]).length;
				}
				if (longueurDeLigne>longueurDeLigneMax) {
					longueurDeLigne=longueurDeLigneMax;
					nbrLignes+=unescape(lesLignes[n]).length/longueurDeLigneMax;
				}
			}
		} else {
			longueurDeLigne=zoneTexte.value.length;
		}
		
		if (nbrLignes>nbrLignesMax) {
			nbrLignes=nbrLignesMax;
		} else if (nbrLignes<nbrLignesMin) {
			nbrLignes=nbrLignesMin;
		}
		
		zoneTexte.cols=(longueurDeLigne+1); // Charge le nombre de colonnes utile, plus une colonne pour la clart�
		zoneTexte.rows=(nbrLignes+1); // Charge le nombre de lignes utile, plus une ligne pour la clart�
	}
} 

function limite(zone,max) {
	if(zone.value.length>=max){
		zone.value=zone.value.substring(0,max);
	}
}

function strLen(str) {
    var newStr = str.replace(/(\r\n)|(\n\r)|\r|\n/g,"\n");
    return newStr.length;
}

function nbcarrestant(idtextarea,nbMax) {
	/*
		Astuce pour donner toujours un identifiant existant m�me si on envoi 'this' � la fonction.
	*/
	if (idtextarea.id == null) {
		id = idtextarea;
	} else {
		id = idtextarea.id;
	}
    var nr_chars = nbMax-strLen(document.getElementById(id).value);
    if (nr_chars<=0) { 
        document.getElementById('nr_chars').innerHTML='<span style="color: #f00; font-weight: bold">0</span>';
    } else {
        document.getElementById('nr_chars').innerHTML=nr_chars;
    }
}  
