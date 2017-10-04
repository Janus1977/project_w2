{*
	Template Smarty pour le module carte
*}	
	{if (isset($dataCarte) && $dataCarte) }
		Dimensions de la carte: {$nb_cases_x} x {$nb_cases_y} case(s)
		<br/>
		<input type="hidden" id="idCarte" name="idCarte" value="{$idCarte}"/>
	    <div id="carte" style="position: relative;
	                            min-width: {$largeurCarte}px;
	                            min-height: {$hauteurCarte}px;
	                            max-width: {$largeurCarte}px;
	                            max-height: {$hauteurCarte}px;
	                            border: 1px solid blue;
	                            /*top: 0px;
	                            left: 0px;*/
	                            z-index: 0;
	                            overflow: auto;
	                            background:url('{$cheminImageFond}?{$random}') 0 0 no-repeat;">
			{*
				PARTIE AFFICHAGE EFFECTIF DE LA CARTE
			*}
			{foreach from=$aCasesCarte item=case}
				{*
					echo $oCase->affiche($oPdo,$_SESSION['admin'],$xDebut,$yDebut,$_SESSION['unite'],$_SESSION['caseUnite'],$_SESSION['typeAction']);
				*}
				
				{* DEBUT DIV *}
				<div 
					id="case_{$case->getX()}_{$case->getY()}"
					style="position: absolute;
							{assign var=top value=($TAILLE_CASE_Y * ($case->getY() - $yDebut))}
	                       top: {$top}px;
	                       
							{assign var=left value=($TAILLE_CASE_X * ($case->getX() - $xDebut))}
	                       left: {$left}px;
	                       border: 1px solid
	                       {if (EDITION_CARTE)}
	                       		{if ($case->getEtatCase() == $PLATEAU)}
	                       			yellow;
	                       		{else if ($case->getEtatCase() == $VIDE)}
	                       			red;
	                       		{/if}
	                       {else}
	                       		blue;
	                       {/if}
	                       background-color: 
	                       {if (EDITION_CARTE)}
		                       {if ({$case->estBloquee()})}
		                       		#FF0000;
		                       {else}
		                       		transparent;
		                       {/if}
		                   {else}
		                   		{* hors edition, il faudra gerer les differentes options (depl,att,charge...) *}
		                   {/if}
	                       {if (EDITION_CARTE)}
                                 opacity:0.25;
                                 -moz-opacity:0.25;
                                 -khtml-opacity:0.25;
                                 filter:alpha(opacity=25);
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
		Pas de donn&eacute;ees
	{/if}