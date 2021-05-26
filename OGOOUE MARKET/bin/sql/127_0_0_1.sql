

CREATE TABLE IF NOT EXISTS `OM_mot_de_passe_oublie` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `state` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `OM_OM_panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_app` varchar(255) NOT NULL,
  `produit_id` varchar(255) NOT NULL,
  `id_marchand` int(2) NOT NULL,
  `id_client` int(2) NOT NULL,
  `produit_nom` varchar(255) NOT NULL,
  `produit_prix` int(16) NOT NULL,
  `date_enr` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `OM_user` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_pre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tel` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `OM_produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_boutique` varchar(255) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `prix` int(10) NOT NULL,
  `date_pub` int(10) NOT NULL,
  `date_exp` int(10) NOT NULL,
  `type_pub` int(1) NOT NULL,
  `point_boost` int(11) NOT NULL,
  `image_file` longblob NOT NULL,
  PRIMARY KEY (`id`)
);