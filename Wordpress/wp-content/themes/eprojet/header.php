<!DOCTYPE html>
<html lang="fr">
<head <?php language_attributes(); // langage du site ?>>
    <title><?php bloginfo('name'); /*nom du site*/ wp_title('_',true,'left'); ?></title>
    <meta charset="<?php bloginfo('charset'); // encodage du site ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <!--<link rel="stylesheet" href="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/css/bootstrap.css">-->
    <link rel="stylesheet" href="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/style.css">
    <script type="text/javascript" src="<?php bloginfo ('template_directory'); // chemin vers le dossier du theme actif ?>/js/js.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?php wp_head(); // On intégre des éléments indispensable à WP.Comme les fichiers css, js, liés au plugin ou à wordpress en général. ?>
</head>
<body <?php body_class(); ?>>
<header>
    <div id="information">
        <a href="<?php echo get_site_url(); ?>/" class="nomdusite"><?php bloginfo('name'); ?></a>
    </div>
    <nav>
        <?php wp_nav_menu(array('theme_location'=>'primary')); // menu principal ?>
        <div class="clear"></div>
    </nav>
    <div id="description">
        <p class="description"><?php bloginfo('description'); // description du site ?></p>
    </div>  

    <?php do_shortcode('[ultimate_ajax_login template=popmodal]');  // do_shortcode() est une fonction interne wordpress permettant ?>
</header>
<div class="clear"></div>
<?php get_sidebar('entete'); ?>
<div class="clear"></div>
<section>
    <div class="conteneur">
