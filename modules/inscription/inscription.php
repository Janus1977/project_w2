<?php

	$path='config/config.php';
	$i=0;
	while (!file_exists($path)) {
	    if($i>10) {
	        echo 'Impossible de trouver les fichiers de configuration global,<br/>remplacement par celui du module';
	        $path='config/config.php';
	        break;
	    }
	    
	    $path='../'.$path;
	    $i++;
	}
	
	require_once $path;
	
	if (!empty($_SESSION['inscription'])) {
	    $_SESSION['inscription'] = protectionFormulaire($_SESSION['inscription']);
	    if (!empty($_SESSION['inscription']['captcha']) && !empty($_POST['captchaconfirm']) && $_SESSION['inscription']['captcha'] != $_POST['captchaconfirm']) {
	        //erreur captcha
	        foreach ($_SESSION['inscription'] AS $data) {
	            if (!empty($data)) {
	                unset($data);
	            }
	        }
	        unset($_SESSION['inscription']);
	        throw new Exception("MAUVAIS CAPTCHA", 100);
	    }
	    if (!empty($_POST['userpassword']) && !empty($_POST['userconfirm']) && $_POST['userpassword'] == $_POST['userconfirm']) {
	        if (!empty($_POST['usermail']) && !empty($_POST['usermailconfirm']) && $_POST['usermail'] == $_POST['usermailconfirm']) {
	            foreach ($_POST AS $cle => $valeur) {
	                if (preg_match("/user/i",$cle)) {
	                    echo '<br/>DATA_USER ('.substr($cle,4).'): '.$valeur;
	                    $dataUser[substr($cle,4)] = $valeur;
	                }
	//                if (preg_match("/heros/i",$cle)) {
	//                    echo '<br/>DATA_HEROS ('.substr($cle,5).'): '.$valeur;
	//                    $dataHeros[substr($cle,5)] = $valeur;
	//                }
	            }
	            $dataUser['inscription'] = $_POST['inscription'];
	
	            try {
	                $oManagerMembre = managerMembre::getInstance($oPdo);
	                $oManagerMembre -> create($dataUser);
	                
	//                $dataHeros['idmembre'] = $oManagerMembre -> _liste[0] -> getId();
	//                $oManagerHeros = managerHeros::getInstance($oPdo);
	//                $oManagerHeros -> create($dataHeros);
	
	                //A ce moment, l'inscription est OK, on peut rediriger vers le jeu lui-même
	                header("Location: ?page=identification");
	            } catch (PDOException $pdoE) {
	                echo $pdoE -> getMessage();
	            } catch (exceptionManager $eMan) {
	                echo $eMan;
	            } catch (Exception $e) {
	                echo $e -> getMessage();
	            }
	        } else {
	            echo '<div class="rouge centre grande">Le mail et sa confirmation doivent &ecirc;tre identiques</div>';
	        }
	    } else {
	        echo '<div class="rouge centre grande">Le mot de passe et sa confirmation doivent &ecirc;tre identiques</div>';
	    }
	}

	require_once _SMARTY_LOAD_;
	$smarty->assign('CHARSET',_CHARSET_);
	$smarty->assign('DIR_BASE',_DIR_BASE_);
	$smarty->assign('URL_BASE',_URL_BASE_);
	$smarty->assign('URL_REDIR',_URL_BASE_);
	$smarty->assign('TPL_BASES',_TEMPLATES_BASE_);
	$smarty->assign('URL_INCLUDES_INSCRIPTION',_URL_INCLUDES_INSCRIPTION_);
	
	$smarty->assign('identifie',false);	
	
	$smarty->assign('dateHeure',date("Y,n,d,H,i,s"));
	$smarty->display(_TEMPLATES_INSCRIPTION_.'inscription.tpl');
?>
