-- ********************************************
-- Création de la BDD
-- ********************************************

CREATE DATABASE bibliotheque;
USE bibliotheque;

-- copie/colle le contenu de bibliotheque.sql dans la console

-- ********************************************
-- Exercices
-- ********************************************

-- 1. Quel est l'id_abonne de Laura ?
    SELECT id_abonne FROM abonne WHERE prenom='laura';
-- 2. L'abonné d'id_abonne 2 est venue emprunter un livre à quelles dates ?
    SELECT date_sortie FROM emprunt WHERE id_abonne=2;
-- 3. Combien d'emprunts ont été effectués en tout ?
    SELECT COUNT(*) FROM emprunt;
-- 4. Combien de livres sont sortis le 2011-12-19 ?
    SELECT COUNT(id_emprunt) FROM emprunt WHERE date_sortie='2011-12-19';
-- 5. Une Vie est de quel auteur ?
    SELECT auteur FROM livre WHERE titre='une vie';
-- 6. De combien de livre d'Alexandre Dumas dispose-t-on ?
    SELECT COUNT(id_livre) FROM livre WHERE auteur='alexandre dumas';
-- 7. Quel id_livre est le plus emprunté ?
    SELECT id_livre,COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1; -- (LIMIT 0,1 peut étre remplacé par LIMIT 1)
-- 8. Quel id_abonne emprunte le plus de livre ?
    SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1; 


-- ****************************************
-- Requêtes imbriquées
-- ****************************************
-- Syntaxe "aide mémoire" de la requête imbriquée :
-- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- Afin de réaliser une requête imbriquée il faut obligatoirement un champ COMMUN entre les deux tables.

-- Un champ NULL se teste avec IS NULL :
    SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- Affiche les id_livre non rendus.

-- Afficher les titres de ces livres non rendus :
    SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- Afficher le numéro des livres que Chloé a emprunté :
    SELECT id_livre FROM emprunt WHERE id_abonne=(SELECT id_abonne FROM abonne WHERE prenom='chloe'); 
-- Quand il n'y a qu'un seul résultat dans la requête imbriquée, on met un signe "="

-- EXERCICE : afficher le prenom des abonnés ayant emprunté un livre le 19-12-2011
    SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie='2011-12-19');

-- EXERCICE : afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet
    SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur='alphonse daudet' ) );

-- EXERCICE : afficher le ou les titres de livre que Chloe a empruntée :
    SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='chloe'));

-- EXERCICE : afficher le ou les titres de livre que Chloé n'a pas encore rendue :
    SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='chloe'));

-- EXERCICE : Combien de livre Benoit à emprunter
    SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='benoit');

-- EXERCICE :  Qui (prénom) a emprunter le plus de livre
    SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 1);
    -- On ne peut pas utiliser un LIMIT dans une clause IN mais obligatoirement dans un "="

-- ********************************************
-- Jointures internes
-- ********************************************
-- Différence entre jointure et requête imbriquée : une requête imbriquée est possible uniquement dans le cas où les champs
-- affichés (ceux qui sont dans le SELECT) sont issus de la même table.
-- Avec une requête de jointure les champs sélectionnés peuvent être issus de tables différentes. Une jointure est une requête 
-- permettant de faire des relations entre les différentes tables afin d'avoir des colonnes ASSOCIEES qui ne forme d'UN SEUL résultat.

-- Afficher les dates de sortie et de rendu pour l'abonné Guillaume :
SELECT a.prenom,e.date_sortie,e.date_rendu  -- Ce que je souhaite afficher
FROM abonne a                               -- La premiére table d'où proviennent les info.
INNER JOIN emprunt e                        -- La deuxiéme table d'où proviennent les info.
ON a.id_abonne = e.id_abonne                -- La jointure qui lie les deux tables avec le champ COMMUN
WHERE a.prenom ='guillaume';                -- la ou les conitions supplémentaires

-- EXERCICE : Nous aimerions connaitre les mouvements des livres (titre, date_sortie et date_rendu) écrit par Alphonse Daudet :
SELECT l.titre,e.date_sortie,e.date_rendu FROM livre l INNER JOIN emprunt e ON l.id_livre = e.id_livre WHERE l.auteur = 'alphonse daudet';

-- EXERCICE : qui à emprunté "une vie" sur l'année 2011
SELECT a.prenom 
FROM abonne a 
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne 
INNER JOIN livre l 
ON e.id_livre = l.id_livre 
WHERE l.titre = 'une vie' AND e.date_sortie LIKE '2011%';

-- EXERCICE : afficher le nombre de livre emprunté par chaque abonné
SELECT a.prenom,COUNT(e.date_sortie) AS nombre
FROM abonne a 
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
GROUP BY a.prenom;

-- EXERCICE : Qui à emprunter quel livre et à quelle date de sortie (prénom,date_sortie et titre)
SELECT a.prenom,e.date_sortie,l.titre FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre;

-- EXERCICE : Afficher les prénoms des abonnés avec les d _livres qu'ils ont empreinté
SELECT a.prenom,e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;

-- ********************************************
-- Jointure externe
-- ********************************************
-- Une jointure externe permet de faire des requêtes sans correspondance exigée entre les valeurs requêtées.

-- Ajouter vous dans la base abonné:
INSERT INTO abonne (prenom) VALUES('Robert');

-- Si on relance la derniére requête de jointure interne, nous n'apparaissons pas dans la liste car nous n'avons pas emprunté de livre
-- Pour y remédier, nous faisons une jointure externe :
SELECT a.prenom,e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON e.id_abonne = a.id_abonne;
-- La clause LEFT JOIN permet de rapatrier TOUTES les données dans la table considérée comme étant à gauche de l'instruction LEFT JOIN
-- (donc abonné dans notre cas), sans correspondance éxigée dans l'autre table (emprunt ici).

-- Voici le cas avec un livre supprimé de la bibliothéque :
DELETE FROM livre WHERE id_livre = 100; -- Le livre "Une Vie"

-- On visualise les emprunts avec une jointure interne :
SELECT emprunt.id_emprunt,livre.titre
FROM emprunt
INNER JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- On ne voit pas dans cette requete le livre "Une Vie" qui à été supprimé

-- On fait la même chose avec une jointure externe
SELECT emprunt.id_emprunt,livre.titre
FROM emprunt
LEFT JOIN livre
ON emprunt.id_livre = livre.id_livre;
-- Ici tous les emprunts sont affichés, y compris ceux pour lesquels les titres sont supprimés et remplacés par NULL.

-- ********************************************
-- Union
-- ********************************************
-- Union permet de fusionner le résultat de deux requêtes dans la même liste de résultat.

-- Exemple : si on supprime Guillaume (suppression du profil de la table abonne), on peut afficher à la fois tous les livres empruntés, y compris ceux 
-- par des lecteurs supprimés (on affiche NULL à la place de Guillaume), et tous les abonnés, y compris ceux qui n'ont rien emprunté (on affiche NULL dans
-- id_livre).

-- Suppression du profil de Guillaume
DELETE FROM abonne WHERE id_abonne = 1;

-- Requête sur les livres empruntés avec UNION
(SELECT abonne.prenom,emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne)
    UNION
(SELECT abonne.prenom,emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);