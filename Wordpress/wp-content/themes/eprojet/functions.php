<?php
    // --------------- Region / Widget

    add_action('widgets_init','eprojet_init_sidebar'); // j'execute la fonction nommée "eprojet_init_sidebar".

    function eprojet_init_sidebar() {
        if (function_exists('register_sidebar')) {
            register_sidebar(array(
                                    'name'          => __('region entete','eprojet'),
                                    'id'            => 'region-entete',
                                    'descriptioon'  => __('Add widget here to appear in your entete region.','eprojet')
            ));

            register_sidebar(array(
                                    'name'          => __('colonne de droite','eprojet'),
                                    'id'            => 'colonne-droite',
                                    'descriptioon'  => __('Add widget here to appear in your colonne de droite.','eprojet')
            ));

            register_sidebar(array(
                                    'name'          => __('region footer','eprojet'),
                                    'id'            => 'region-footer',
                                    'descriptioon'  => __('Add widget here to appear in your footer region.','eprojet')
            ));           
        }
    }

    // --------------- Menu

    add_action('init','eprojet_init_menu'); // j'exécute la fonction "eprojet_init_menu()" à l'initialistion du théme.

    function  eprojet_init_menu() { // fonction qui contient la déclaration du menu
        if (function_exists('register_nav_menu')) { // si la fonction register_nav_menu existe (fonction interne wordpress), alors je déclare le menu
            register_nav_menu('primary', __('Primary Menu','eprojet'));
        }
    }

    function showCategory() {
        $cat = '';
        $categories = get_categories(array('category_name'=>'ville','orderby'=>'name','exclude'=>1)); // on exclue la catégorie "non classé".
        foreach($categories as $category) {
            $cat .= '<a href"'.get_category_link($category->term_id).'">'.$category->name.'</a><br>';
        }
        return $cat;
    }

    // Fontion permettant de récuperer tous les contenus en fonction d'une catégorie
    function showCategoryByPostType() {
        $current_cat= get_query_var('cat');
        query_posts("post_type=$type&cat=$current_cat");
    }

    // fonction permettant de récupérer toutes les images déposées dans le corps d'un texte.
    function getImage() {
        $content = '';
        $image = get_children('post_parent='.get_the_ID().'&post_type=attachement&post_mine_type=image&post_per_page=10');
        foreach ($image as $image_id => $a) {
            $content .= wp_get_attachement($image_id,'medium');
        }
        return $content;
    }