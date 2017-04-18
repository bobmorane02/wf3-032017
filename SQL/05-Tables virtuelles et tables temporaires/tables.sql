-- ********************************************
-- Tables virtuelles : vues
-- ********************************************
-- Les vues (ou tables virtuelles) sont des objets de la base de donnée, constitué d'un nom
-- et d'une requête de selection.

-- Une fois une vue définie, on peut l'utiliser comme on le ferait avec une table, laquelle
-- serait constituée des données sélectionnées par la requéte définissant la vue.

USE entreprise;

-- Création d'une vue :
CREATE VIEW vue_homme AS SELECT prenom,nom,sexe,service FROM employes WHERE sexe='m';
-- crée une table virtuelle  (ou vue) remplie avec les donées du SELECT.

-- Une seconde requête effectuée sur la vue :
SELECT prenom FROM vue_homme; -- on peut effectuer toutes les opérations habituelles sur cette table virtuelle vue_homme

-- Toute opération sur la table d'origine est répercutée automatiquement sur la vue et la réciproque est également vraie
-- toute opération sur la vue est répercutée sur la table d'origine.
-- Les vues sont d'un grand intéret en terme de performance.

SHOW TABLES; -- la vue est visible dans la liste des tables

-- Supprimer une vue
DROP VIEW vue_homme;

-- ********************************************
-- Tables temporaires
-- ********************************************
-- Créer une table temporaire :
CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe='f'; -- Crée une table temporaire avec les données du SELECT
                                                                   -- Cette table s'efface quand on quitte le session, elle
                                                                   -- n'est pas visible avec SHOW TABLES.

-- Utiliser une table temporarire :
SELECT prenom FROM temp; -- affiche les prénoms contenus dans la table temporaire

-- Contrairement au tables virtuelles, les opérations sur la table d'origine ne sont pas repercutées sur la table temporaire
-- car celle-ci est une photographie à un instant donnée de la table d'origine