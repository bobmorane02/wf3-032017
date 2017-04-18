-- ********************************************
-- Transactions
-- ********************************************

-- Une transaction permet de lancer des requêtes, telles que les modifications
--  engendrées soit réversibles.

-- Transaction simple :
START TRANSACTION; -- démarre la transaction
    SELECT * FROM employes; -- pour voir la table avant modification
    UPDATE employes SET prenom='fabrice' WHERE id_employes=739;

ROLLBACK; -- Annule la transaction, l'employé reprenant son prénom
-- Ou bien
COMMIT;   -- Valide définitivement la transaction
-- Lorsqu'un ROLLBACK ou un COMMIT est effectué la TRANSACTION est automatiquement fermée
-- Si on se déconnecte de la BDD un ROLLBACK est automatiquement effectué.

-- Transaction avancée :
START TRANSACTION;
    SAVEPOINT point1; -- point de sauvegarde appelé point1
    UPDATE employes SET prenom='julien A' WHERE id_employes=699;
    SAVEPOINT point2; -- point de sauvegarde appelé point2
    UPDATE employes SET prenom='julien B' WHERE id_employes=699;

ROLLBACK TO point2; -- pour une partie de la transaction : retour au point2 on garde "Julien A" (reste dans la transaction)

-- ou bien :
ROLLBACK; -- annule toute la transaction on garde "Juline" en base --|
                                                                   --| Sortie définitive de la transaction 
-- ou bien :                                                       --|     
COMMIT;   -- Pour valider définitivement la transaction            --| 