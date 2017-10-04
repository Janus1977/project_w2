<?php
	require_once('includes/fonctions.inc.php');
// 	require_once('includes/lancer_de_des.inc.php');
	require_once('includes/smarty.inc.php');
//	debug($_POST);
//	debug(explode(",",$_POST['listeOrdres']));
//	lanceDes2(explode(",",$_POST['listeOrdres']),true);
	
//	lanceDes2(explode(",",$_POST['listeOrdres']),false);
	
	$smarty->assign('resultatParDes',lanceDes2(explode(",",$_POST['listeOrdres']),true));
	$smarty->assign('resultatSomme',lanceDes2(explode(",",$_POST['listeOrdres']),false));
	$aLesOrdres = explode(",",$_POST['listeOrdres']);
	$sLesOrdres = implode("+",$aLesOrdres);
	$smarty->assign('jet',$sLesOrdres);
	$smarty->display('templates/test.tpl');
?>
