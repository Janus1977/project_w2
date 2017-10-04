<?php
    if (!empty($_POST)) {
        //TODO
        if (!empty($_POST['texteAHasher'])) {
            echo 'Texte re&ccedil;u pour hashage: '.$_POST['texteAHasher'].'<br/>';
            $options = [
                'cost' => 12,
            ];
            echo 'Texte re&ccedil;u trait&eacute; avec password_hash: '.password_hash($_POST['textedetest'],PASSWORD_BCRYPT, $options).'<br/>';
        }
        if (!empty($_POST['texteAVerifier'])) {
            //Premier form => letexte
            $hash = '$2y$12$fnoupNL15LQCWBQvm1vHbOt5aV7qNwu7HKZ7UswI2Gh0yGUuwADwK';
            echo 'Texte trait&eacute; avec password_hash: '.$hash;
            echo 'Texte re&ccedil;u pour v&eacute;rification: '.$_POST['texteAVerifier'].'<br/>';
            echo 'V&eacute;rification: '.(password_verify($_POST['texteAVerifier'], $hash) === true) ? 'OK' : 'KO';
        }
    }
?>
<form action="#" method="post">
	<input type="text" name="texteAHasher"/>
	<input type="submit" value="envoyer"/>
</form>
<br/>
<form action="#" method="post">
	<input type="text" name="texteAVerifier"/>
	<input type="submit" value="envoyer"/>
</form>