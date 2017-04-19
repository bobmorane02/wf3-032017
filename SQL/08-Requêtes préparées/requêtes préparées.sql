-- ********************************************
-- Requêtes préparées
-- ********************************************

-- Les requêtes préparées sont des requêtes qui dissocient les phases d'analyse, interprétation et execution.
-- La préparation de la requête consiste à réaliser les étapes d'analyse et interprétation. Ensuite on effectue
-- l'exécution à part.

-- La séparation des phases permet de faire des gains de performance quand une requête doit étre executée une 
-- multitude de foix. En effet on execute qu'une seule fois les 2 premiéres étapes, et X fois la derniére.

-- Requête préparée sans marqueur
-- 1 -Préparation
PREPARE req FROM "SELECT * FROM employes WHERE service='commercial'"; -- Consiste à déclarer une requête préparée

-- 2 -Exécution de la requête
EXECUTE req;
-- On peut exécuter la requête plusieurs fois sans refire le cycle analyse/préparation -> gain de performance

-- Requête préparée avec un marqueur "?"
-- 1 -Préparation
PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?"; -- le "?" est un marqueur qui attend une valeur

-- 2 -Execution
SET @prenom = 'emilie';     -- déclare et affecte la variable prenom
EXECUTE req2 USING @prenom;   -- On éxecute la requête en utilisant la variable prenom

-- Supprimer une requête préparée
DROP PREPARE req2;

-- Les requêtes préparées ont la durée de vie de la session de connexion à la BDD.