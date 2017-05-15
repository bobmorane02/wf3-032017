<?php get_header(); ?>
    <?php showCategoryByPostType();
        if (have_posts()) : while (have_posts()) : the_post();
        echo category_description(get_cat_ID(get_cat_name('ville')));
    ?>
    <div class="contenu-category"><?php $photo=get_field('photo'); ?>
        <a href="<?php the_permalink(); ?>"><span class="titre"><?php the_title(); ?></span></a>
            <?php if(function_exists('the_rating_results')) : echo the_ratings_results(get_the_ID()); endif; ?><br>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $photo->value; ?>"></a>
    </div>
    <?php endwhile; else : ?>
    <p><?php _e('Sory, no posts matched your criteria','eprojet');?></p>
    <?php endif; ?>

<?php get_sidebar('colonne-droite'); 
      get_header(); ?>