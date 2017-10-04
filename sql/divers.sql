--liste equipement joueur via l'inventaire
SELECT ej.* 
FROM inventaire i
inner join equipement_joueur ej 
	on i.membre = ej.membre 
	and i.equipement_joueur = ej.id
where i.membre = 28


--liste equipement unite via l'inventaire
SELECT ej.* 
FROM inventaire 
inner join equipement_joueur ej
	on i.unite_joueur = ej.unite_joueur
	and i.equipement_joueur = ej.id
where i.unite_joueur = 33