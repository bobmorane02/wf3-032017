-- ouvrir la console SQL sous XAMPP
--      cd c:\xampp\mysql\bin
--      mysql.exe -u root --password


-- ligne de commentaire en SQL débute par --
-- Les requêtes ne sont pas sensibles à la casse, mais une convention indique qu'il faut mettre les mots clés 
-- des requêtes en majuscule

-- ********************************************
-- Requêtes générales
-- ********************************************

 CREATE DATABASE entreprise; -- Créer une nouvelle base de données appelée "entreprise"

 SHOW DATABASES; -- permet d'afficher les BDD disponibles

--  NE PAS SAISIR DANS LA CONSOLE :
DROP DATABASE entreprise;       -- supprime la BDD entreprise

DROP table employes;            -- supprime la table employes

TRUNCATE employes;              -- vider la table employes de sont contenu

-- On peut coller dans la console :

USE entreprise;                 -- se connecter à la BDD entreprise

SHOW TABLES;                    -- permet de lister les tables de la BDD en court d'utilisation

DESC employes;                  -- observer la structure de la table ainsi que les champs (DESC pour describe)

--  *******************************************
-- Requêtes de séléction
-- ********************************************

SELECT nom,prenom FROM employes; -- sélectionné (affiche) le nom et le prenom de tous les enregistrements de la table employes
                                 -- SELECT sélectionne les champs indiqués, FROM de la table indiquée

SELECT service FROM employes;    -- affiche les services de l'entreprise

-- DISTINCT
-- On a vu dans la requête précédente que les services sont affichés plusieurs fois. Pour éliminer les doublons on utiliste DISTINCT

SELECT DISTINCT service FROM employes;

-- ALL ou *
-- On peut afficher toutes les info issues d'une table avec une étoile (*) pour dire ALL

SELECT * FROM employes;         -- affiche toute la table employes

-- clause WHERE
SELECT prenom,nom FROM employes WHERE service = 'informatique'; -- Affiche le prénom et nom des employés du service informatique.
                                                                -- Noter que le nom des champs ou des tables ne prennent pas de quotes,
                                                                -- alors que les valeurs telle que 'informatique' prennent des quotes
                                                                -- ou des guillements. Cependant, s'il s'agit d'un nombre one ne lui met 
                                                                -- pas de quote.

-- BETWEEN
SELECT nom,prenom,date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; -- affiche les employés dont la date d'embauche est entre 2006 et 2010

-- LIKE
SELECT prenom FROM employes WHERE prenom LIKE 's%'; -- Affiche les prenoms des employés commençant par s. Le signe % est un joker qui remplace les caractéres suivants.

SELECT prenom FROM employes WHERE prenom LIKE '%-%'; -- Affiche les prenoms composés des employés. LIKE est utilisé entre autre pour les formulaires de recherche

-- Opérateurs de comparaison
SELECT prenom,nom,service FROM employes WHERE service != 'informatique'; -- Affiche le prenom, le nom et le service des employés n'étant pas du service informatique

-- != ou <> : différent de 
-- =        : égal
-- <        : inférieur
-- >        : supérieur
-- <=       : inférieur ou égal
-- >=       : supérieur ou égal

-- ORDER BY pour faire des tris

SELECT nom,prenom,service,salaire FROM employes ORDER BY salaire; -- affiche les employés par salaire en ordre croissant.

SELECT nom,prenom,service,salaire FROM employes ORDER BY salaire ASC, prenom DESC; -- ASC pour un tri ascendant, DESC pour un tri descendant
                                                                                   -- ici on tri les salaires par order croissant puis à salaire égal , les prénoms
                                                                                   -- par ordre décroissant.

-- LIMIT

SELECT nom,prenom,salaire FROM employes ORDER BY salaire DESC LIMIT 0,1; -- Affiche ayant le salaire le plus élevé : on tri sur les salaires par ordre décroissant
                                                                         -- (pour avaoir le plus élevé en premier) puis on limite le résultat au premier enregistrement avec
                                                                         -- LIMIT 0,1 => 0 signifie "à partir de l'enregistrement 0 (le premier)" et 1 "sur une longueur d'un enregistrement"
                                                                         -- commande utile dans les paginations des sites.

-- AS (alias)
SELECT nom,prenom,salaire*12 AS salaire_annuel FROM employes;   -- Affiche le salaire annuel des employés. AS crée un alias "salaire_annuel" sur la valeur salaire*12  

-- SUM

SELECT SUM(salaire*12) FROM employes;   -- Affiche le salaire total annuel de tous les employés. SUM fait une addition de tous les salaires * 12 

-- MIN et MAX

SELECT MIN(salaire) FROM employes;  -- Affiche le salaire le plus bas
SELECT MAX(salaire) FROM employes;  -- Affiche le salaire le plus haut
                                    -- Attention ne renvoi qu'une valeur et pas une information sur l'enregistrement

-- AVG (moyenne)
SELECT AVG(salaire) FROM employes;  -- Affiche le salaire moyen de l'entreprise

-- ROUND
SELECT ROUND(AVG(salaire),1) FROM employes; -- Affiche le salaire moyen arrondie à un chiffre aprés la virgule

-- COUNT
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- Affiche le nombre d'employées féminine

-- IN
SELECT prenom,service FROM employes WHERE service IN ('comptabilite','informatique');   -- Affiche les prénoms des employés appartenant à la compta ou informatique

-- NOT IN
SELECT prenom,service FROM employes WHERE service NOT IN ('comptabilite','informatique');   -- Affiche les prénoms des employés n'appartenant pas à la compta ou informatique

-- AND et OR
SELECT prenom, service,salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000; -- Affiche le prénom des commerciaux dont le salaire est inférieur ou égal à 2000

SELECT prenom, service,salaire FROM employes WHERE (service='production' AND salaire=1900) OR salaire=2300; -- Affiche les employés du service production dont le sailire est de
                                                                                                            -- 1900 ou dans les autres services ceux qui gagnent 2300

-- GROUP BY
SELECT service,COUNT(id_employes) AS nombre FROM employes GROUP BY service; -- Affiche le nombre d'employés par service. GROUP BY regroupe les résultats du comptage par les services
                                                                            -- correspondant

-- GROUP BY ... HAVING
SELECT service,COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;   -- Affiche les service ou il y a plus d'un employé. HAVING remplace WHERE dans GROUP BY 

-- ********************************************
-- Requêtes d'insertion
-- ********************************************

SELECT * FROM employes  -- Afficher la table en entier

INSERT INTO employes (id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES (8059,'alexis','richy','m','informatique','2011-10-28','1800');
-- Insertion d'un employé. Noter que l'ordre des champs énoncés entre les deux paires de parenthèses doit étre le méme que pour les valeurs

-- UNe requête sans préciser les champs concernés. le nombre et l'ordre des valeurs attendus sont respectés. 
INSERT INTO employes VALUES (8060,'bob','léponge','m','secretariat','2010-09-05','1524');

-- ********************************************
-- Requêtes de modification
-- ********************************************

-- UPDATE
UPDATE employes SET salaire=1870 WHERE nom='cottet';    -- Modifie le salaire de l'employé Cottet (ne pas faire comme ça car fait sur le nom)
UPDATE employes SET salaire=1875 WHERE id_employes=699; -- Mise à jour faite grace à id_employes car clé primaire
UPDATE employes SET salaire=1872,service='autre' WHERE id_employes=699; -- Mise à jour de plusieurs champs à la fois

-- Ne pas faire d'UPDATE sans clause WHERE car on change les valeurs ciblées de tous les enregistrements

-- REPLACE
-- REPLACE INTO se comporte comme un INSERT INTO lorsque l'enregistrement n'existe pas.
-- REPLACE INTO se comporte comme un UPDATE lorsque l'enregistrement existe.
REPLACE INTO employes (id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES (2000,'zobi','lamouche','f','marketing','2012-02-15',2600); -- Ce champ n'existe pas => ajoute
REPLACE INTO employes (id_employes,prenom,nom,sexe,service,date_embauche,salaire) VALUES (2000,'zobi','lamouche','f','marketing','2012-02-15',2200); -- Ce champ existe => le modifie

-- ********************************************
-- Requêtes de suppression
-- ********************************************

-- DELETE
DELETE FROM employes WHERE id_employes=2000; -- Suppression de l'employé dont la clé primaire est 2000
DELETE FROM employes WHERE service='informatique' AND id_employes != 854; -- Suppression de tous les informaticiens sauf celui dont la clé primaire est 854
DELETE FROM employes WHERE id_employes=388 OR id_employes=990; -- Suppression de deux employés avec leur clé primaire ,on fait ça avec un OR car un employé ne peut pas avoir 
                                                               -- deux clé primaire et donc on ne peut pas employer un AND

-- A NE PAS FAIRE !!!! 
-- un DELETE sans clause WHERE car cela revient à faire un TRUNCATE de table (vidage) de maniére irréversible.

-- ********************************************
-- Exercices
-- ********************************************

    -- 1. Afficher le service de l'employé 547
            SELECT service FROM employes WHERE id_employes=547;
    -- 2. Afficher la date d'embauche d'Amandine
            SELECT date_embauche FROM employes WHERE prenom='amandine';
    -- 3. Afficher le nombre de commerciaux
            SELECT COUNT(id_employes) FROM employes WHERE service='commercial';
    -- 4. Afficher le coût des commerciaux sur l'année
            SELECT SUM(salaire*12) FROM employes WHERE service='commercial';
    -- 5. Afficher le salaire moyen par service
            SELECT service,AVG(salaire) FROM employes GROUP BY service;
    -- 6. Afficher le nombre de recrutement sur l'année 2010 (3 syntaxes possibles)
            SELECT COUNT(id_employes) FROM employes WHERE (date_embauche>='2010-01-01' AND date_embauche<='2010-12-31');
            -- ou
            SELECT COUNT(id_employes) FROM employes WHERE date_embauche LIKE '2010%';
    -- 7. Augementer le salaire de chaque employé de 100
            UPDATE employes SET salaire=salaire+100;
    -- 8. Afficher le nombre de services différents
            SELECT COUNT(DISTINCT service) FROM employes;
    -- 9. Afficher le nombre d'employés par service
            SELECT service,COUNT(id_employes) FROM employes GROUP BY service;
    -- 10. Afficher les infos de l'employé du service commercial ayant le salaire le plus élevé
            SELECT nom,prenom,sexe,date_embauche,service,salaire FROM employes WHERE service='commercial' AND salaire=(SELECT MAX(salaire) FROM employes WHERE service='commercial');
            -- ou
            SELECT nom,prenom,sexe,date_embauche,service,salaire FROM employes WHERE service='commercial' ORDER BY salaire DESC LIMIT 0,1;
    -- 11. Afficher l'employé ayant ete embauché en dernier
            SELECT nom,prenom FROM employes WHERE date_embauche=(SELECT MAX(date_embauche) FROM employes);