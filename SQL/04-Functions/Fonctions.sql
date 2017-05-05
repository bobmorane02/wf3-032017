-- ********************************************
-- Fonctions prédéfinies
-- ********************************************
-- Function predéfinies: prévues par le langage SQL, et executés par le developpeur

-- Derniére Id insére :
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID(); -- Affiche le dernier identifiant insérer.

-- Fonctions de dates :
SELECT *,DATE_FORMAT(date_rendu,'%d-%m-%Y') AS date_FR FROM emprunt; -- met les dates du champ date_FR au format français JJ-MM-AAAA

SELECT NOW(); -- affiche la date et l'heure courante

SELECT CURDATE(); -- retourne la date du jour au format YYYY-MM-DD
SELECT CURTIME(); -- retourne l'heure courante au format hh:mm:ss

-- Crypter un mot de passe avec l'algorithme AES :
SELECT PASSWORD('mypass'); -- affiche 'mypass' crypté par l'algorithme AES
INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass')); -- insére le mdp crypté en base

-- Concaténation : 
SELECT CONCAT('a','b','c'); -- concaténe les 3 chaines de caratéres
SELECT CONCAT_WS('-','a','b','c'); -- Concaténation avec un séparateur

-- Functions sur les chaines de caractéres
SELECT SUBSTRING('bonjour',1,3); -- affiche 'bon' : compte trois caractéres à partir de la position 1 
SELECT TRIM('   bonjour  '); -- supprime les espaces avant et aprés la chaine de caractéres

-- Source internet pour SQL et fonctions www.sql.sh