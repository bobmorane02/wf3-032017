<?php

add_action('wp_enqueue_scripts','theme_enqueue_styles');

function theme_enqueue_styles () {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

// Ce code permet de récupérer le fichier css du parent
// La fonction add_action() permet d'accroher le fichier style du théme parent et le
// fichier style du théme enfant, ce que l'on appel un 'hook'