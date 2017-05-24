CREATE DATABASE sallea;
CREATE TABLE `sallea`.`salle` ( `id_salle` INT(3) NOT NULL AUTO_INCREMENT , `titre` VARCHAR(200) NOT NULL , `description` TEXT NOT NULL , `photo` VARCHAR(200) NOT NULL , `pays` VARCHAR(20) NOT NULL , `ville` VARCHAR(20) NOT NULL , `adresse` VARCHAR(50) NOT NULL , `cp` INT(5) NOT NULL , `capacite` INT(3) NOT NULL , `categorie` ENUM('reunion','bureau','formation') NOT NULL , PRIMARY KEY (`id_salle`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
CREATE TABLE `sallea`.`produit` ( `id_produit` INT(3) NOT NULL AUTO_INCREMENT , `id_salle` INT(3) NOT NULL , `date_arrivee` DATETIME NOT NULL , `date_depart` DATETIME NOT NULL , `prix` INT(3) NOT NULL , `etat` ENUM('libre','reservation') NOT NULL , PRIMARY KEY (`id_produit`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
CREATE TABLE `sallea`.`commande` ( `id_commande` INT(3) NOT NULL AUTO_INCREMENT , `id_membre` INT(3) NOT NULL , `id_produit` INT(3) NOT NULL , `date_enregistrement` DATETIME NOT NULL , PRIMARY KEY (`id_commande`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
CREATE TABLE `sallea`.`avis` ( `id_avis` INT(3) NOT NULL AUTO_INCREMENT , `id_membre` INT(3) NOT NULL , `id_salle` INT(3) NOT NULL , `commentaire` TEXT NOT NULL , `note` INT(2) NOT NULL , `date_enregistrement` DATETIME NOT NULL , PRIMARY KEY (`id_avis`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
CREATE TABLE `sallea`.`membre` ( `id_membre` INT(3) NOT NULL AUTO_INCREMENT , `pseudo` VARCHAR(20) NOT NULL , `mdp` VARCHAR(60) NOT NULL , `nom` VARCHAR(20) NOT NULL , `prenom` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `civilite` ENUM('m','f') NOT NULL , `statut` INT(1) NOT NULL , `date_enregistrement` DATETIME NOT NULL , PRIMARY KEY (`id_membre`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;