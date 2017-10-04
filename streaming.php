<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlentities($_POST['nom']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
    
    $destinataire = 'skatoux@hotmail.com';
    $sujet = 'SKYLOST'; // Titre de l'email
    $contenu = '<html><head><title>Titre du message</title></head><body>';
    $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
    $contenu .= '<p><strong>Nom</strong>: ' . $nom . '</p>';
    $contenu .= '<p><strong>Email</strong>: ' . $email . '</p>';
    $contenu .= '<p><strong>Message</strong>: ' . $message . '</p>';
    $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Envoyer l'email
    mail($destinataire, $sujet, $contenu, $headers);
    echo '<h2>Message envoyé!</h2>';
}
?>

Si vous voulez le code en entier (index.php) : 

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlentities($_POST['nom']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
    
    $destinataire = 'skatoux@hotmail.com';
    $sujet = 'SKYLOST';
    $contenu = '<html><head><title>Titre du message</title></head><body>';
    $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
    $contenu .= '<p><strong>Nom</strong>: ' . $nom . '</p>';
    $contenu .= '<p><strong>Email</strong>: ' . $email . '</p>';
    $contenu .= '<p><strong>Message</strong>: ' . $message . '</p>';
    $contenu .= '</body></html>';
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Envoyer l'email
    mail($destinataire, $sujet, $contenu, $headers);
    echo '<h2>Message envoyé!</h2>';
}
?>

<html>
<head>
<title>Titre de la page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<h1>Contacter le webmaster</h1>
	<!-- Ceci est un commentaire HTML. Le code PHP devra remplacé cette ligne -->
	<form method="post"
		action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
		<p>
			Votre nom et prénom: <input type="text" name="nom" size="30" />
		</p>
		<p>
			Votre email: <span style="color: #ff0000;">*</span>: <input
				type="text" name="email" size="30" />
		</p>
		<p>
			Message <span style="color: #ff0000;">*</span>:
		</p>
		<textarea name="message" cols="60" rows="10"></textarea>
		<!-- Ici pourra être ajouté un captcha anti-spam (plus tard) -->
		<p>
			<input type="submit" name="submit" value="Envoyer" />
		</p>
	</form>
</body>
</html>