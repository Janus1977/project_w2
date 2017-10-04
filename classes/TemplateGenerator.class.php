<?php

class TemplateGenerator extends Generator {

 	protected $_attributFilleSupp;
 	protected $_classeMere;
 	protected $_formOpenned;
 	
 	public function __construct() {
 		parent::__construct();
 		$this->_formOpenned = false;
 	}
 	
 	protected function generateHeader() {
 		$chaine = "{*\n";
 		$chaine .= "\tTemplate auto genere pour la classe ".ucfirst($this->getNomTableEnCoursDeTraitement())."\n";
 		$chaine .= "\tAUTO-GENERATED FILE on ".date("d/m/Y H:i:s")."\n";
 		$chaine .= " *}\n";
 		return $chaine;
 	}
 	
 	protected function generateListeTablesChamps() {
 		$chaine = "{*\n";
 		$chaine .= "\tTemplate auto genere pour la classe ".ucfirst($this->getNomTableEnCoursDeTraitement())."\n";
 		$chaine .= " *}\n";
 		return $chaine;
 	}
 	
 	protected function testDebug() {
 		$chaine = "\t{foreach from=\$".$this->getNomTableEnCoursDeTraitement()."->getAttributes() item=attribute}\n";
 		$chaine .= "\t{\$attribute}\n";
 		$chaine .= "\t{/foreach}\n";
 		return $chaine;
 	}
 	
 	protected function openForm($id,$action='#',$method='post') {
 		$chaine = "";
 		if ($this->_formOpenned === false) {
	 		$this->_formOpenned = true;
	 		$chaine = "\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
	 		//20160422,CBA: cree<TypeObjet>() => creeObjet(<nomTable>)
// 	 		$chaine .= "\t\t<form id=\"".$id."\" action=\"".$action."\" method=\"".$method."\" onSubmit=\"cree".ucfirst($this->getNomTableEnCoursDeTraitement())."()\">\n";
	 		$chaine .= "\t\t<form id=\"formNewObject\">\n";
	 		$chaine .= "\t\t\t<input type=\"hidden\" name=\"table\" value=\"".$this->getNomTableEnCoursDeTraitement()."\"/>\n";
// 	 		$chaine .= "\t\t\t<input type=\"hidden\" name=\"action\" value=\"insertion\"/>\n";
	 		$chaine .= "\t{/if}\n";
 		}
	 	return $chaine;
 	}
 	
 	protected function closeForm() {
 		$chaine = "";
 		if ($this->_formOpenned === true) {
 			$this->_formOpenned = false;
	 		$chaine = "\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
// 	 		$chaine .= "\t\t<input type=\"submit\" name=\"formSubmitButton\" value=\"Envoyer\"/>\n";
	 		//20160422,CBA: cree<TypeObjet>() => creeObjet(<nomTable>)
// 	 		$chaine .= "\t\t<input type=\"button\" name=\"formSubmitButton\" value=\"Envoyer\" onclick=\"cree".ucfirst($this->getNomTableEnCoursDeTraitement())."()\"/>\n";
// 	 		$chaine .= "\t\t<input type=\"button\" name=\"formSubmitButton\" value=\"Envoyer\" onclick=\"creeObjet('".$this->getNomTableEnCoursDeTraitement()."','affichage')\"/>\n";
	 		$chaine .= "\t\t</form>\n";
	 		$chaine .= "\t{/if}\n";
 		}
	 	return $chaine;
 	}
 	
 	
 	/* A VOIR */
 	protected function afficheBouton() {
 		$chaine = "";
 		$chaine = "\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
 		$chaine .= "\t\t<input type=\"button\" id=\"buttonEnvoie\" name=\"buttonEnvoie\"";
 		$chaine .= "\t\t{if ()}\n";
 		$chaine .= "\t\t\tonclick=\"\"";
 		$chaine .= "\t\t\tvalue=\"Modifier\"";
 		$chaine .= "\t\t{else}\n";
 		$chaine .= "\t\t\tonclick=\"\"";
 		$chaine .= "\t\t\tvalue=\"Cr&eacute;er\"";
 		$chaine .= "\t\t{/if}\n";
 		$chaine .= "\t\t/>\n";
 		$chaine .= "\t\t{/if}\n";
 		return $chaine;
 	}
 	
 	protected function afficheTableau() {
 		$cClasse = ucfirst($this->getNomTableEnCoursDeTraitement());
 		$oClasse = new $cClasse;
 		$aListeAttributs = $oClasse->getAttributes();
 		
//  		debug($aListeAttributs, true);
 		
 		$aListeMethodes = get_class_methods(ucfirst($this->getNomTableEnCoursDeTraitement()));
//  		debug($aListeMethodes, true);exit;
 		$aListeTableChamps = $this->getListeTablesChamps($this->getNomTableEnCoursDeTraitement());

 		$chaine = "\t<table>\n";
 		
 		/* le nom dans le CAPTION */
 		$chaine .= "\t<caption>{\$".$this->getNomTableEnCoursDeTraitement()."->getNom()} (identifiant {\$".$this->getNomTableEnCoursDeTraitement()."->getId()})</caption>\n";
 		
 		/* l'image de l'equipement */
 		$chaine .= "\t\t<tr>\n";
 		$chaine .= "\t\t\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
 		$chaine .= "\t\t\t<td align=\"center\" colspan=\"3\">\n";
 		$chaine .= "\t\t\t{else}\n";
 		$chaine .= "\t\t\t<td align=\"center\" colspan=\"2\">\n";
 		$chaine .= "\t\t\t{/if}\n";
 		$chaine .= "\t\t\t\t<img src=\"{\$URL_IMGS_EQUIPEMENT}{\$".$this->getNomTableEnCoursDeTraitement()."->getChemin()}\" alt=\"{\$".$this->getNomTableEnCoursDeTraitement()."->getNom()}\"/>\n";
		$chaine .= "\t\t\t</td>\n";
 		$chaine .= "\t\t</tr>\n";
 		
 		/* les caracteristiques de l'equipement */
		$chaine .= "\t\t<tr>\n";
		$chaine .= "\t\t\t<td>\n";
		$chaine .= "\t\t\t\t&nbsp;\n";
		$chaine .= "\t\t\t</td>\n";
		$chaine .= "\t\t\t<td>\n";
		$chaine .= "\t\t\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
		$chaine .= "\t\t\t\tCaract&eacute;ristiques actuelles\n";
		$chaine .= "\t\t\t\t</td>\n";
		$chaine .= "\t\t\t\t<td>\n";
		$chaine .= "\t\t\t\tCaract&eacute;ristiques &agrave; appliquer\n";
		$chaine .= "\t\t\t{else}\n";
		$chaine .= "\t\t\t\tCaract&eacute;ristiques\n";
		$chaine .= "\t\t\t{/if}\n";
		$chaine .= "\t\t\t</td>\n";
		$chaine .= "\t\t</tr>\n";
		
		//Parcours des attributs
		foreach ($aListeAttributs AS $attribut) {
			if (strtolower($attribut) != 'otile') {
				$chaine .= "\t\t<tr>\n";
				$chaine .= "\t\t\t<td align=\"left\">\n";
				//une cle etrangere
				if (substr($attribut, 0,1) == 'o') {
					$chaine .= "\t\t\t\t".$attribut."\n";
				} else {
					if (in_array(strtolower($attribut),$aListeTableChamps)) {
						$chaine .= "\t\t\t\t".$aListeTableChamps[strtolower($attribut)]."\n";
					} else {
						$chaine .= "\t\t\t\t".$attribut."\n";
					}
					
				}
				$chaine .= "\t\t\t</td>\n";
				
				$chaine .= "\t\t\t<td align=\"center\">\n";
				//une cle etrangere
				if (substr($attribut, 0,1) == 'o') {
					//AFFICHAGE DU NOM DE L'OBJET ASSOCIE
					$chaine .= "\t\t\t\t{if (\$".$this->getNomTableEnCoursDeTraitement()."->get".ucfirst(substr($attribut,1))."() > 0)}\n";
// 					$chaine .= "\t\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->charge".ucfirst(substr($attribut,1))."()}\n";
// 					$chaine .= "\t\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->get".ucfirst(substr($attribut,1))."Object()}\n";
					if (strtolower(substr($attribut,1)) == 'membre') {
						$chaine .= "\t\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->get".ucfirst(substr($attribut,1))."Object()->getPseudo()}\n";
					} else {
						$chaine .= "\t\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->get".ucfirst(substr($attribut,1))."Object()->getNom()}\n";
					}
					$chaine .= "\t\t\t\t\t\n";
					$chaine .= "\t\t\t\t{else}\n";
					$chaine .= "\t\t\t\t\tAucun\n";
					$chaine .= "\t\t\t\t{/if}\n";
					$chaine .= "\t\t\t</td>\n";
					$chaine .= "\t\t\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
					$chaine .= "\t\t\t<td align=\"center\">\n";
					$chaine .= "\t\t\t\t&nbsp;\n";
					$chaine .= "\t\t\t</td>\n";
				} else {
					//AFFICHAGE IDENTIFIANT ET NOM ASSOCIE DANS LA PARTIE MODIFICATION (LISTE)
					$chaine .= "\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->get".ucfirst($attribut)."()}\n";
					$chaine .= "\t\t\t</td>\n";
					$chaine .= "\t\t\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
					$chaine .= "\t\t\t\t<td align=\"center\">\n";
					if (strtolower($attribut) == 'description') {
						$chaine .= "\t\t\t\t\t<textarea cols=\"20\" rows=\"5\" name=\"".strtolower($attribut)."\" id=\"".strtolower($attribut)."\">{\$".$this->getNomTableEnCoursDeTraitement()."->get".$attribut."()}</textarea>\n";
					} else {
						//Interdiction de changer l'identifiant interne
		 				if (in_array(strtolower($attribut), $this->getListeTables())) {
		 					//Creation de la liste des identifiants possibles
		 					
		 					$chaine .= "\t\t\t\t\t{if (!empty(\$liste".ucfirst($attribut)."))}\n";
		 					$chaine .= "\t\t\t\t\t\t<select id=\"liste".$attribut."\" name=\"".$attribut."\" style=\"display:inline;\">\n";
		 					$chaine .= "\t\t\t\t\t\t\t<option value=\"-1\" selected>Choisissez un(e) ".ucfirst($attribut)."</option>\n";
		 					$chaine .= "\t\t\t\t\t\t\t{foreach from=\$liste".ucfirst($attribut)." item=".$attribut."}\n";
		 					if (strtolower($attribut) == 'membre') {
		 						//Un membre n'a pas de nom mais un pseudo
		 						$chaine .= "\t\t\t\t\t\t\t\t<option value=\"{\$".$attribut."->getId()}\">{\$".$attribut."->getPseudo()} ({\$".$attribut."->getId()})</option>\n";
		 					} else if (strtolower($attribut) == 'tile') {
		 						//les tuiles n'ont pas de nom, j'affiche les coordonnees
		 						$chaine .= "\t\t\t\t\t\t\t\t<option value=\"{\$".$attribut."->getId()}\">{\$".$attribut."->getX()} / {\$".$attribut."->getY()} ({\$".$attribut."->getId()})</option>\n";
		 					} else {
		 						$chaine .= "\t\t\t\t\t\t\t\t<option value=\"{\$".$attribut."->getId()}\">{\$".$attribut."->getNom()} ({\$".$attribut."->getId()})</option>\n";
		 					}
		 					$chaine .= "\t\t\t\t\t\t\t{/foreach}\n";
		 					$chaine .= "\t\t\t\t\t\t</select>\n";		 					
		 					$chaine .= "\t\t\t\t\t{/if}\n";
		 					//$chaine .= "\t\t\t\t\t<input type=\"text\" name=\"".strtolower(substr($methode,3))."\" id=\"".strtolower(substr($methode,3))."\" value=\"{\$".$this->getNomTableEnCoursDeTraitement()."->".$methode."()}\" readonly=\"readonly\"/>\n";
		 				} else {
							$chaine .= "\t\t\t\t\t<input type=\"text\" name=\"".strtolower($attribut)."\" id=\"".strtolower($attribut)."\" value=\"{\$".$this->getNomTableEnCoursDeTraitement()."->get".$attribut."()}\"/>";
		 				}
					}
					$chaine .= "\t\t\t\t</td>\n";
				}
				$chaine .= "\t\t\t{/if}\n";
				$chaine .= "\t\t</tr>\n";
			}
		}

		
//  		foreach ($aListeMethodes AS $methode) {
//  			if (substr($methode,0,3) == 'get' && in_array(strtolower(substr($methode,3)),$aListeAttributs)) {
//  				$chaine .= "\t\t<tr>\n";
//  				$chaine .= "\t\t\t<td align=\"left\">\n";
//  				$chaine .= "\t\t\t\t".$aListeTableChamps[strtolower(substr($methode,3))]."\n";
//  				$chaine .= "\t\t\t</td>\n";
 				
//  				$chaine .= "\t\t\t<td align=\"center\">\n";
//  				$chaine .= "\t\t\t\t{\$".$this->getNomTableEnCoursDeTraitement()."->".$methode."()}\n";
//  				$chaine .= "\t\t\t</td>\n";
 				
//  				$chaine .= "\t\t\t{if (!empty(\$smarty.session.user) && \$smarty.session.user->getStaff() == 1)}\n";
//  				$chaine .= "\t\t\t\t<td align=\"center\">\n";
//  				if (strtolower(substr($methode,3)) == 'description') {
//  					$chaine .= "\t\t\t\t\t<textarea cols=\"20\" rows=\"5\" name=\"".strtolower(substr($methode,3))."\" id=\"".strtolower(substr($methode,3))."\">{\$".$this->getNomTableEnCoursDeTraitement()."->".$methode."()}</textarea>\n";
//  				} else {
//  					//Interdiction de changer l'identifiant interne
//  					//  				if (strtolower(substr($methode,3)) == 'id') {
//  					//  					$chaine .= "\t\t\t\t\t<input type=\"text\" name=\"".strtolower(substr($methode,3))."\" id=\"".strtolower(substr($methode,3))."\" value=\"{\$".$this->getNomTableEnCoursDeTraitement()."->".$methode."()}\" readonly=\"readonly\"/>\n";
//  					//  				} else {
//  					$chaine .= "\t\t\t\t\t<input type=\"text\" name=\"".strtolower(substr($methode,3))."\" id=\"".strtolower(substr($methode,3))."\" value=\"{\$".$this->getNomTableEnCoursDeTraitement()."->".$methode."()}\"/>";
//  					//  				}
//  				}
//  				$chaine .= "\t\t\t\t</td>\n";
//  				$chaine .= "\t\t\t{/if}\n";
//  				$chaine .= "\t\t</tr>\n";
//  			}
//  		}
 		$chaine .= "\t</table>";
 		return $chaine;
 	}
 	
 	protected function generatePreview() {
 		$chaine = "\t{if (!empty(\$".$this->getNomTableEnCoursDeTraitement()."->getChemin()))}\n";
 		$chaine .= "\t\t<img src=\"{\$urlVersMiniature}\" alt=\"\"/>\n";
 		$chaine .= "\t{/if}\n";
 		return $chaine;
 	}
 	
 	public function generate($tables,$listeChamps) {
 		//Memorisation des tables pour les champ de cle etrangeres
		//on charge les tables car l'option "1 table" a ete cochée
		$this->setListeTables($_SESSION['tables']);
		foreach ($tables AS $table) {

			$this->_classeMere = null;
			/* La table */
			$this->setNomTableEnCoursDeTraitement($table);
			/* Les champs des tables */
			$this->setListeChampsEnCoursDeTraitement($listeChamps[$this->getNomTableEnCoursDeTraitement()]);
			
			$cheminFichier = _TEMPLATES_BASE_."classes/".ucfirst($this->getNomTableEnCoursDeTraitement()).".tpl";
			$aMemo = array();
			$memo = "";
			$nomTag = 0;
			
			/*
			 * Si le fichier existe, on l'ouvre, et on cherche les parties
			 *  de code specifique pour ne pas les perdre
			 */
			if (file_exists($cheminFichier)) {
				$fichierALire = fopen($cheminFichier,"r");
				$memorisation = false;
				$this->_aListOfSpecificCode = array();
				while ($tampon = fgets($fichierALire)) {
					$tamponTest = $tampon;
					if (preg_match('/\[TAG(?<digit>\d+)/',$tamponTest,$matches) == 1) {
						if (!empty($nomTag)) {
							/* En cours de fichier => TAGx, il fau vider la memorisation anterieure */
							$memo = "";
						}
						/* Debut memorisation */
						$nomTag = substr($matches[0],1,strlen($matches[0]));
						$memorisation = true;
						/*A FAIRE*/
						/* Traitement du cas du tag en ligne [TAGx]blablabla[/TAGx] */
//						if (strpos($tampon,'[/TAG') !== false) {
//							$memorisation = false;
//						}
//						if ($memorisation === true) {
//							/* Memorisation du code specifique entre les deux TAG */
//							$memo .= $tampon;
//						}
//						if ($memorisation === false && strlen($memo) > 0) {
//							/* Sauvegarde du code specifique pour le re-injecter plus tard */
//							$this->_aListOfSpecificCode[$nomTag] = $memo;
//						}
					} else {	
						if (strpos($tampon,'[/TAG') !== false) {
							$memorisation = false;
						}
						if ($memorisation === true) {
							/* Memorisation du code specifique entre les deux TAG */
							$memo .= $tampon;
						}
						if ($memorisation === false && strlen($memo) > 0) {
							/* Sauvegarde du code specifique pour le re-injecter plus tard */
							$this->_aListOfSpecificCode[$nomTag] = $memo;
						}
					}
	
				}
				fclose($fichierALire);
			}
			
			/* Creation du fichier */
			$fichierTemplate = fopen($cheminFichier,"w");

			fwrite($fichierTemplate,$this->generateHeader());			
			fwrite($fichierTemplate,"\n");

//			fwrite($fichierTemplate,$this->testDebug());			
//			fwrite($fichierTemplate,"\n");

			fwrite($fichierTemplate,$this->openForm('form'.ucfirst($this->getNomTableEnCoursDeTraitement())));			
			fwrite($fichierTemplate,"\n");
			
			fwrite($fichierTemplate,$this->afficheTableau());			
			fwrite($fichierTemplate,"\n");

			fwrite($fichierTemplate,$this->closeForm());		
			fwrite($fichierTemplate,"\n");
			
			fwrite($fichierTemplate,$this->addSpecificCodeTag(true));			
			fwrite($fichierTemplate,"\n");
			
			fclose($fichierTemplate);

			/* Init du TAG Number */
			$this->initTagNumber();

			/* Init du tableau de code specifique pour la classe en cours */
			$this->_aListOfSpecificCode = array();
			
			debug("<hr>", true);
		}
 	}
}
?>