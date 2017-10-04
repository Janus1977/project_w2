<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <meta http-equiv='content-type' content='text/html; charset={$CHARSET}' />
    <!--
    	<link rel="stylesheet" type="text/css" href="{$URL_BASE}css/staff/style.css" />
    	<link href='{$URL_BASE}php/mj/objediteur/theme/defaulttheme/style/style.css' title='default' rel='stylesheet' type='text/css' media='all' />
	-->
    <title>{$TITRE}</title>
    <script type="text/javascript" src="{$URL_BASE}lib/javascript/prototype.js"></script>
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
    <script type="text/javascript" src="{$URL_BASE}javascript/javascript.js"></script>
	<script type="text/javascript" src="{$URL_BASE}javascript/gfbulle.js"></script>
	<script type="text/javascript" src="{$URL_BASE}javascript/ajax.js"></script>
	<!--<script type="text/javascript" src="{$URL_BASE}javascript/horloge.js"></script>-->

	{* Chargement des URL de l'application *}
	<script type="text/javascript">
			var URL_BASE='{$URL_BASE}';
			var URL_INCLUDES_BASE='{$URL_INCLUDES_BASE}';
			var URL_TEMPLATES_BASE='{$URL_TEMPLATES_BASE}';
			var DIR_TEMPLATES_BASE='{$DIR_TEMPLATES_BASE}';
			var URL_MODULES_BASES='{$URL_MODULES_BASES}';
			var URL_MINIATURE='{$URL_MINIATURE}';
			var URL_IMGS_DECORS='{$URL_IMGS_DECORS}';
			var URL_IMGS_SOL='{$URL_IMGS_SOL}';
	</script>
	
	{* Chargement des javascript des modules de l'application *}
	<script type="text/javascript" src="{$URL_MODULES_BASES}javascript/javascript_modules.js"></script>
		{if !empty($aListeModulesSmarty)}
			{foreach from=$aListeModulesSmarty item=module}
				<script type="text/javascript">
					/* MODULE {strtoupper($module->getNom())} */
					var URL_MODULE_{strtoupper($module->getNom())}		= '{${'URL_MODULE_'|cat: strtoupper($module->getNom())}}';
					var URL_IMGS_{strtoupper($module->getNom())}		= '{${'URL_IMGS_'|cat: strtoupper($module->getNom())}}';
					var URL_INCLUDES_{strtoupper($module->getNom())}	= '{${'URL_INCLUDES_'|cat: strtoupper($module->getNom())}}';
					var URL_TEMPLATES_{strtoupper($module->getNom())}	= '{${'URL_TEMPLATES_'|cat: strtoupper($module->getNom())}}';
					var URL_JAVASCRIPT_{strtoupper($module->getNom())}	= '{${'URL_JAVASCRIPT_'|cat: strtoupper($module->getNom())}}';
				</script>
				<script type="text/javascript" src="{$URL_MODULES_BASES}{$module->getNom()}/javascript/javascript_{$module->getNom()}.js"></script>
			{/foreach}
		{/if}
        <script type="text/javascript">
            //Parametrage pour l'horloge
            jours = new Array ("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi");
            mois = new Array ("jan","fev","mars","avr","mai","juin","juil","aout","sept","oct","nov","dec");
            ejs_server_date = new Date({$dateHeure});
			n = ejs_server_date.getDate();
            ejs_server_moi = mois[ejs_server_date.getMonth()-1];
            ejs_server_ann = ejs_server_date.getYear()+1900;
            ejs_server_heu = ejs_server_date.getHours();
            ejs_server_min = ejs_server_date.getMinutes();
            ejs_server_sec = ejs_server_date.getSeconds();
            setInterval("ejs_server_calc()", 1000);
        </script>
    </head>