{*****************************************************************************}
{*                 Affiche les messages d'erreure                            *}
{*                                                                           *}
{* Variables                                                                 *}
{*    $URL_BASE : URL de la racine du site                                   *}
{*    $DIR_BASE : Chemin de la racine du site                                *}
{*    $charset                                                               *}
{*    $url_redir : URL de redirection                                        *}
{*    $message : message d'erreur                                            *}
{*****************************************************************************}

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset={$CHARSET}' />
    {if isset($url_redir)}
        <meta http-equiv='refresh' content='5; url={$url_redir}' />
    {/if}
    <title>Erreur</title>
    <link rel='stylesheet' type='text/css' 
    href='{$URL_BASE}css/walkyrie/niftyCorners.css' />
    
    <link rel='stylesheet' type='text/css' 
    href='{$URL_BASE}css/walkyrie/style.css' />
    
    <script type='text/javascript' src='{$URL_BASE}js/nifty.js'></script>
</head>

<body>
<div class='box-containeur-size'>
	<table>
		<tr>
			<td align="left" valign="top">
				<h1>404&nbsp;:</h1>
			</td>
			<td align="right" valign="bottom">
				<h1>{$message}</h1>
			</td>
		</tr>
	</table>
</body>
</html>
