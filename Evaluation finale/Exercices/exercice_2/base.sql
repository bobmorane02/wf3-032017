CREATE DATABASE `exo2` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('eleve','formateur') NOT NULL DEFAULT 'eleve',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='\n\n\n\n';
SELECT * FROM exo2.users;

INSERT INTO `users` (`id`,`nom`,`prenom`,`email`,`password`,`type`) VALUES (1,'robert','kowal','bob@gvg.org','tytyeini','eleve');