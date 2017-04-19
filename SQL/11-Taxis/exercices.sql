-- ********************************************
-- EXERCICES
-- ********************************************

-- 1. Qui conduit la voiture d'id_vehicule 503 ?
SELECT c.prenom,c.nom 
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
WHERE a.id_vehicule = 503;

-- 2. Qui (prenom) conduit quel modele ?
SELECT c.prenom,v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
INNER JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 3. Insérez vous dans la table conducteur . Puis affichez tous les conducteurs (même ceux qui n'ont pas de
--    véhicule affecté) ainsi que les modéles de véhicules.
INSERT INTO conducteur (prenom,nom) VALUES ('Robert','Kowalczyk');
SELECT c.prenom,c.nom,v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 4. Ajouter l'enregistrement suivant:
INSERT INTO vehicule (marque,modele,couleur,immatriculation) VALUES ('Renault','Espace','noir','ZE-123-RT');
--    Puis afficher tous les modèles de véhicule, y compris ceux qui n'ont pas de chauffeur affecté, et les prénom des conducteurs.
SELECT v.modele,c.prenom
FROM vehicule v
LEFT JOIN association_vehicule_conducteur a
ON v.id_vehicule = a.id_vehicule
LEFT JOIN conducteur c
ON a.id_conducteur = c.id_conducteur;

-- 5. Afficher les prénoms des conducteurs (y compris ceux qui n'ont pas de vehicule) et tous les modèles (y compris ceux qui n'ont pas de chauffeur)
(SELECT c.prenom,v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule)
UNION
(SELECT c.prenom,v.modele
FROM vehicule v
LEFT JOIN association_vehicule_conducteur a
ON v.id_vehicule = a.id_vehicule
LEFT JOIN conducteur c
ON a.id_conducteur = c.id_conducteur);

