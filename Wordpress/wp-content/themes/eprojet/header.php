<!DOCTYPE html>
<html lang="fr">
<head <?php language_attributes(); // langage du site ?>>
    <title><?php bloginfo('name'); /*nom du site*/ wp_title('_',true,'left'); ?></title>
    <meta charset="<?php bloginfo('charset'); // encodage du site ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/style.css">
    <script type="text/javascript" src="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/js/js.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?php wp_head(); // On intégre des éléments indispensable à WP.Comme les fichiers css, js, liés au plugin ou à wordpress en général. ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_nav_menu(array('theme_location'=>'primary')); ?>