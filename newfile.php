<?php
/***************************/
// PREPARATION DES DONNEES //
/**
 * ************************
 */

/**
 * ************
 */
/* LES MEMBRES */
/**
 * ************
 */
// quelques corrections utiles
$requete = "SELECT * ";
$requete .= "FROM membre INNER JOIN dossier_membre ";
$requete .= "ON membre.id = dossier_membre.idmembre ";
$requete .= "WHERE dossier_membre.ndossier = :ndossier";

$reponse = $bdd->prepare ( $requete );
$reponse->bindValue ( 'ndossier', $_POST ['ndossier'] );

if (! $reponse->execute ()) {
	echo 'Erreur recherche dossier numero ' . $_POST ['ndossier'];
} else {
	// execute OK donc on peut avoir des données
	// PDO::FETCH_OBJ => tu vas avoir des objets membres
	// cree à partir des champs de la BDD ^^
	// sympa non ?
	// simplifions les choses => 1 tableau membreS
	$aMembres = array (); // a pour ARRAY
	while ( $membre = $reponse->fetch ( PDO::FETCH_OBJ ) ) {
		$aMembres [] = $membre;
	}
}

// A partir de là, nous avons les membres concernant le dossier
// Passons à l'affichage
?>
<table>
	<tr>
		<td width="200"></td>
		<td width="200">Demandeur</td>
		<td width="200">Conjoint</td>
	</tr>
	<tr>
		<td><label>Civilité</label>:</td>
		<td><input type="text" name="civilite1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->civilite : ''; ?>" />
		</td>
		<td><input type="text" name="civilite2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->civilite : ''; ?>" />
		</td>
	</tr>
	<tr>
		<td><label>Nom</label> :</td>
		<td><input type="text" name="nom1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->nom : ''; ?>" />
		</td>
		<td><input type="text" name="nom2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->nom : ''; ?>" />
		</td>
	</tr>
	<tr>
		<td><label>Prénom</label> :</td>
		<td><input type="text" name="prenom1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->prenom : ''; ?>" />
		</td>
		<td><input type="text" name="prenom2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->prenom : ''; ?>" />
		</td>
	</tr>
	<tr>
		<td><label>Nationalité</label> :</td>
		<td><input type="text" name="nationalite1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->nationalite : ''; ?>" /></td>
		<td><input type="text" name="nationalite2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->nationalite : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Date de naissance</label> :</td>
		<td><input type="date" name="datenaiss1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->datenaissance : ''; ?>" /></td>
		<td><input type="date" name="datenaiss2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->datenaissance : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Lieu</label> :</td>
		<td><input type="text" name="lieu1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->lieu : ''; ?>" /></td>
		<td><input type="text" name="lieu2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->lieu : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Etat Civil</label> :</td>
		<td><input type="text" name="etat_civil1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->etat_civil : ''; ?>" /></td>
		<td><input type="text" name="etat_civil2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->etat_civil : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Statut</label> :</td>
		<td><input type="text" name="statutad1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->statutad : ''; ?>" /></td>
		<td><input type="text" name="statutad2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->statutad : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Téléphone</label> :</td>
		<td><input type="tel" name="telephone1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->telephone : ''; ?>" /></td>
		<td><input type="tel" name="telephone2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->telephone : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>GSM</label> :</td>
		<td><input type="tel" name="gsm1"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->gsm : ''; ?>" /></td>
		<td><input type="tel" name="gsm2"
			value="<?php echo (!empty($aMembres[1])) ? $aMembres[1]->gsm : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Adresse</label> :</td>
		<td><input type="text" name="adresse"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->adresse : ''; ?>" /></td>
	</tr>
	<tr>
		<td><label>Localiter</label> :</td>
		<td><input type="text" name="localiter"
			value="<?php echo (!empty($aMembres[0])) ? $aMembres[0]->localiter : ''; ?>
		</td>
	</tr>
</table>