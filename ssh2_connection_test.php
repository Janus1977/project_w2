<?php

	/**
	 * Notification à l'utilisateur si le serveur termine la connexion
	 * @param string $reason
	 * @param string $message
	 * @param string $language
	 */
	function my_ssh_disconnect($reason, $message, $language) {
	  printf("Server disconnected with reason code [%d] and message: %s\n",
	         $reason, $message);
	}
	
	$host = '<TBD>';
	
	$methods = array(
			'kex' => 'diffie-hellman-group1-sha1',
			'client_to_server' => array(
								  'crypt'            => '3des-cbc',
								  'comp'             => 'none'
								  ),
			'server_to_client' => array(
									  'crypt'            => 'aes256-cbc,aes192-cbc,aes128-cbc',
									  'comp'             => 'none'
									  )
							
			);
	
	$callbacks = array('disconnect' => 'my_ssh_disconnect');
	
	//ssh2_connect(host, port, methods, callbacks)
	$connection = ssh2_connect($host, 22, $methods, $callbacks);
	if (!$connection) {
		die('Connection to '.$host.'failed');
	} else {
		//public key using once connection is done
		$usernname = '<TBD>';
		$pathToPublicKeyFile = '/home/'.$usernname.'/.ssh/id_rsa.pub';
		$pathToPrivateKeyFile = '/home/'.$usernname.'/.ssh/id_rsa';
		$secretPassSentence = '<TBD>';
		if (ssh2_auth_pubkey_file(	$connection,
									$usernname,
									$pathToPublicKeyFile,
									$pathToPrivateKeyFile,
									$secretPassSentence)) {
				echo "Public key authentication successful\n";
		} else {
			die('Public key authentication failed');
		}
	}
?> 