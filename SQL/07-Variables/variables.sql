-- ********************************************
-- Les variables en SQL
-- ********************************************
-- Une variable est un espace mémoire nommé qui permet de conserver une valeur.

-- permet d'observer les variables systèmes :
SHOW VARIABLES;

SELECT @@version; -- on met 2 @ pour accéder à une varaiable système

-- Déterminer nos propres variables :
SET @ecole = 'WF3'; -- déclare une variable ecole et lui affecte la valeur 'WF3'
SELECT @ecole;      -- on accéde au contenu de cette variable par son nom
