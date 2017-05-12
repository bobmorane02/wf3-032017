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