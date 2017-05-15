<?php get_header(); // appel du fichier header.php ?>

    <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <img src="<?php the_field('photo'); ?>" alt="image"><br>      
    <p>Téléphone : <?php the_field('telephone');?></p>
    <p>Adresse : <?php the_field('adresse');?></p>
    <div><p>Horaires : </p><?php the_field('horaires');?></div>
    <?php the_field('promotions');?><br>
    <?php the_field('brunch');?><br>
    <?php the_field('type_de_cuisine');?><br>
    <?php the_field('prix_moyen');?><br>
    <?php the_field('acces');?><br>
        
    <!-- the_field() est une fonction interne wordpress qui permet de récupérer les informations des champs -->

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCq8tO1pJCgvto8_qZTcm43kNbDdXwhuos"></script>
    <!-- chemin et intégration du fichier js -->
    <script src="<?php bloginfo('template_directory'); ?>/assets/acf-map.js"></script>

    <!-- déclaration d'une variable adresse qui contient notre carte. Si la variable $adresse n'est pas vide 
         c'est donc qu'une carte existe. -->
    <?php
        $adresse = get_field('localisation');
        if(!empty($adresse)) : 
    ?>
    <div class="acf-map">
        <div class="marker" data-lat="<?php echo $adresse['lat'];?>" data-lng="<?php echo $adresse['lng']; ?>"></div>
    </div>
    <?php endif; endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria','eprojet'); ?></p>
    <?php endif ?>

    <?php comments_template(); // Charge le modéle de commentaire ?>
    <?php if(function_exists('the_ratings')) { the_ratings(); }?>

<?php get_footer(); // appel le fichier footer ?>

