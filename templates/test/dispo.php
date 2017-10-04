<?php
    session_start();
    if (!empty($_POST)) {
        $aListeCompteMotDePasse = array(
            'toto' => 'toto',
            'tutu' => 'tutu',
            'titi' => 'titi',
            'tata' => 'tata',
        );
        
        if (!empty($_POST['razSession']) && $_POST['razSession'] == 1) {
            $_SESSION = array();
        }
        
        if (!empty($_POST['compte']) && !empty($_POST['password'])) {
            if (array_key_exists(trim($_POST['compte']), $aListeCompteMotDePasse)) {
                if ($aListeCompteMotDePasse[trim($_POST['compte'])] == trim($_POST['password'])) {
                    //OK on loggue
                    $_SESSION['logged'] = true;
                    $_SESSION['compte'] = trim($_POST['compte']);
                }
            } else {
                echo 'Mauvais compte/mot de passe<br/>';
            }
        }
    }
    
    //Pour exemple
    $dispo = false;
?>
<html>
<head>
</head>
<body>
<?php
    if (!empty($_SESSION['logged']) && $_SESSION['logged'] === true) {
        echo 'Bonjour '.strtoupper($_SESSION['compte']).' bienvenue.';
?>
		<div id="bouton" style="border: 1px solid red; width: 200px;">
			<input type="button" onclick="dispoPasDispo()" value="Dispo/pasdispo" 
<?php
        if ($dispo === true) {
?>
			style="background: green;"
<?php
        } else {
?>
			style="background: red;"
<?php
        }
?>
			/>
		</div>
		<div id="affichage" style="border: 1px solid black; width: 200px; display: inline;"></div>
		<br/>pour test:
		<br/>
		<form action="#" method="post">
			<input type="hidden" name="razSession" value="1" />
			<input type="submit" value="RAZ SESSION"/>
		</form>
<?php
    } else {
            //Login
?>
    	<form action="#" method="post">
        	<table>
        		<tr>
        			<td>Compte</td>
        			<td><input type="text" id="compte" name="compte"></td>
        		</tr>
        		<tr>
        			<td>Mot De Passe</td>
        			<td><input type="password" id="password" name="password"></td>
        		</tr>
        		<tr>
        			<td colspan="2" align="right"><input type="submit" value="Entrer"></td>
        		</tr>
        	</table>
    	</form>
<?php
    }
?>
</body>
</html>