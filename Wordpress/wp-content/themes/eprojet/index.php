<?php get_header(); //appel du fichier header.php_ini_loaded_file ?>

    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="contenu"><?php the_content(); ?></div>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria','eprojet'); ?></p>
    <?php endif; ?>

<?php get_footer(); // appel le fichier footer.php ?>

<!--
    Dans wordpress, nous mettrons toujours une boucle, même s'il n'y a qu'un seul contenu à recupérer

    - have_posts() : renvoi un boolean pour savoir s'il reste des objets à afficher sur la page en cours
    la fonction renvera true tant que tous le articles dans la BDD n'auront pas été affichés.

    - the_post() : à l'intérieur de la boucle, cette fonction effectue la récupération d'un article

    - the_content() : affiche le conteu

    -the_title() : affiche le titre

    -the_permalink() :l le lien du contenu

    - _e() : permet de traduire une portion de texte
-->