<?php
/*
* Template Name: Modéle trois colonnes
*/

get_header();?>

    <div class="mdl-3-cl-gauche"></div>
    <div id="primary" class="mdl-3-cl-centre">
        <div id="content" role="main">
            <?php  while (have_posts()) : the_post();
                     get_template_part('content','page');
                     comments_template ('',true);
                   endwhile; ?>     
        </div>
    </div>
    <div class="mdl-3-cl-droite"><?php get_sidebar(); ?></div>
    <div class="clear"></div>

    <?php get_footer(); ?>