

<script type="text/javascript" src="http://127.0.0.1/project_w2/modules/carte/javascript/javascript_carte.js"></script>
<div id="info_carte"></div>
	{if (!empty($smarty.session.editionCarte) && $smarty.session.editionCarte == 1)}
		{* PARTIE EDITION DE CARTE *}
			{*if (isset($oCarte))*} 
			{if (isset($smarty.session.carte)) }
		 		Dimensions de la carte: {$oCarte->getNb_cases_x()} x {$oCarte->getNb_cases_y()} case(s)
		 		Dimensions de la carte: {$smarty.session.carte->getNb_cases_x()} x {$smarty.session.carte->getNb_cases_y()} case(s)
				<br/>
				<input type="hidden" id="idCarte" name="idCarte" value="{$oCarte->getId()}"/>
		   		<div id="carte" style="position: relative;
		   	                         min-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
		   	                         min-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
		   	                         max-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
		   	                         max-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
		   	                         border: 1px solid blue;
		   	                         /*top: 0px;
			                            left: 0px;*/
			                            z-index: 0;
			                            overflow: auto;
			                            background:url('{$cheminImageFond}?{$random}') 0 0 no-repeat;">
					{*
						PARTIE AFFICHAGE EFFECTIF DE LA CARTE A PARTIR DES CASES
					*}
					{foreach from=$aCasesCarte item=case}
						{*
							echo $oCase->affiche($oPdo,$_SESSION['admin'],$xDebut,$yDebut,$_SESSION['unite'],$_SESSION['caseUnite'],$_SESSION['typeAction']);
						*}
						{assign var=top value=($TAILLE_CASE_Y * ($case->getY() - $yDebut))}
						{assign var=left value=($TAILLE_CASE_X * ($case->getX() - $xDebut))}
						{* DEBUT DIV *}
						<div 
							id="case_{$case->getX()}_{$case->getY()}"
							style="position: absolute;
	   	                    top: {$top}px;
			                       left: {$left}px;
									{if ($EDITION_CARTE === true)}
										{if ($case->getEtatCase() == $PLATEAU)}
			                       			border: 1px solid yellow;
			                       		{else if ($case->getEtatCase() == $VIDE)}
			                       			border: 1px solid red;
			                       		{else if ($case->getEtatCase() == $LIEN)}
	   	                    				border: 1px solid green;
			                       		{/if}
			                       	{else}
			                       		border: 1px solid blue;
			                       	{/if} 
			                       	{if ($EDITION_CARTE === true)}
				                       	{if ({$case->getBloque()})}
				                       		background-color: #FF0000;
				                       	{else}
				                       		{if ($case->getEtatCase() == $LIEN)}
				                       			background-color: green;
				                       		{else}
				                       			background-color: transparent;
				                       		{/if}
				                       	{/if}
				                   	{else}
				                   			{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
				                   	{/if}
			                      	{if ($EDITION_CARTE === true)}
										opacity:0.25;
  	   	                       {* 	-moz-opacity:0.25;
 	   	                           	-khtml-opacity:0.25;
 	   	                           	filter:alpha(opacity=25); *}
			                       	{/if}
			                       width:   {$TAILLE_CASE_X}px;
			                       height:  {$TAILLE_CASE_Y}px;
			                       z-index: 1">
							{include file='case.tpl'}					
						{* FIN DIV *}
						</div>
					{/foreach}
			    </div>
	   		{else}
				Aucune carte s&eacute;lectionn&eacute;ee ==> liste "Pour une carte sauv&eacute;e"
			{/if}	{*fin IF $oCarte*}
	{else}
		{* PARTIE JEU *}
		{if (!empty($smarty.session.partieEnCours))}
			{* Affichage pour continuer ou non la partie en cours *}
			{if (!isset($affichage))}
				<table align="center">
					<tr>
							<td>
								<input 	type="button"
										value="Continuer la partie en cours"
										style="background-color: green; color: white;"
										onclick="alert('Continuer la partie')"
							/>
						</td>
						<td>
							<input 	type="button"
									value="Nouvelle partie"
									style="background-color: red; color: black;"
									onclick="alert('Nouvelle partie')"
							/>
						</td>
					</tr>
				</table>
			{else}
				{* Affichage de la carte *}
				{if (isset($oCarte)) }
			 		Dimensions de la carte: {$oCarte->getNb_cases_x()} x {$oCarte->getNb_cases_y()} case(s)
					<br/>
					<input type="hidden" id="idCarte" name="idCarte" value="{$oCarte->getId()}"/>
				   		<div id="carte" style="position: relative;
			   	                         min-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
			   	                         min-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
			   	                         max-width: {$TAILLE_CASE_X * $oCarte->getNb_cases_x() + $TAILLE_CASE_X}px;
					   	                         max-height: {$TAILLE_CASE_Y * $oCarte->getNb_cases_y() + $TAILLE_CASE_Y}px;
			   	                         border: 1px solid blue;
			   	                         /*top: 0px;
				                            left: 0px;*/
				                            z-index: 0;
				                            overflow: auto;
				                            background:url('{$cheminImageFond}?{$random}') 0 0 no-repeat;">
						{*
							PARTIE AFFICHAGE EFFECTIF DE LA CARTE A PARTIR DES CASES
						*}
						{foreach from=$aCasesCarte item=case}
							{*
								echo $oCase->affiche($oPdo,$_SESSION['admin'],$xDebut,$yDebut,$_SESSION['unite'],$_SESSION['caseUnite'],$_SESSION['typeAction']);
							*}
							{assign var=top value=($TAILLE_CASE_Y * ($case->getY() - $yDebut))}
							{assign var=left value=($TAILLE_CASE_X * ($case->getX() - $xDebut))}
							{* DEBUT DIV *}
							<div 
								id="case_{$case->getX()}_{$case->getY()}"
								style="position: absolute;
		   	                    top: {$top}px;
				                       left: {$left}px;
										{if ($EDITION_CARTE === true)}
											{if ($case->getEtatCase() == $PLATEAU)}
				                       			border: 1px solid yellow;
				                       		{else if ($case->getEtatCase() == $VIDE)}
				                       			border: 1px solid red;
				                       		{else if ($case->getEtatCase() == $LIEN)}
		   	                    				border: 1px solid green;
				                       		{/if}
				                       	{else}
				                       		border: 1px solid blue;
				                       	{/if} 
				                       	{if ($EDITION_CARTE === true)}
					                       	{if ({$case->getBloque()})}
					                       		background-color: #FF0000;
					                       	{else}
					                       		{if ($case->getEtatCase() == $LIEN)}
					                       			background-color: green;
					                       		{else}
					                       			background-color: transparent;
					                       		{/if}
					                       	{/if}
					                   	{else}
					                   			{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
					                   	{/if}
				                      	{if ($EDITION_CARTE === true)}
											opacity:0.25;
  		   	                       {* 	-moz-opacity:0.25;
 		   	                           	-khtml-opacity:0.25;
 		   	                           	filter:alpha(opacity=25); *}
				                       	{/if}
				                       width:   {$TAILLE_CASE_X}px;
				                       height:  {$TAILLE_CASE_Y}px;
				                       z-index: 1">
								{include file='case.tpl'}					
							{* FIN DIV *}
							</div>
						{/foreach}
				    </div>
		   		{else}
					Pas de donn&eacute;ees pour le jeu
				{/if}	{*fin IF $oCarte*}
			{/if}		{*fin IF $affichage*}
		{else}
			{if (isset($listeImagesMiniCarte) && sizeof($listeImagesMiniCarte) > 0)}
				{html_table loop=$listeImagesMiniCarte}
			{else}
				Aucune carte actuellement disponible au jeu.
			{/if}
		{/if}
	{/if}
