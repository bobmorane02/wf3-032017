CREATE TABLE IF NOT EXISTS 'immo'.`ville` (
  `id_ville` mediumint(6) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(100) NOT NULL,
  `code_postal` varchar(5) DEFAULT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=36959 DEFAULT CHARSET=utf8;