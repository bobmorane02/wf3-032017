<?php
/*
    Plugin Name: MonPlugin
    Plugin URI: http://www.test.fr
    Description: Plugin de personalisation de widget
    Version: 1.0
    Author: Moi
    Licence: -
*/

class MonPlugin extends WP_widget {
    public function __construct(){
        $option = array(
            'classname' => 'maclassesCSS',
            'description' => 'exemple de widget avec 3 informations'
        );

        $control = array(
            'width' => 1000,
            'height' => 500
        );

        $this->WP_widget('widget-exemple','widget exemple',$options,$control);
        add_action('widgets_init',function(){register_widget('MonPlugin');}); // Appel et init des widgets
    }

    public function widget($args,$instance){
        extract($args);
        echo $before_widget;
        echo $before_title.$instance['titre'].$after_title;
        echo $instance['nom'].' '.$instance['age'];
        echo $after_widget;
    }

    public function update($new,$old){
        return $new;
    }

    public function form($instance){
        $default = array(
            'titre' => 'widget exemple',
            'age' => '20'
        );
        $instance = wp_parse_args($instance,$defuat);
        echo '<p>';
        echo '<label>Titre :</label>';
        echo '<input type="text" name="';
            echo $this->get_field_name('titre');
        echo '" value="';
            echo $instance['titre'];
        echo'">';
        echo '<label>age :</label>';
        echo '<input type="text" name="';
            echo $this->get_field_name('age');
        echo '" value="';
            echo $instance['age'];
        echo'">';            
        echo '</p>';
    }
}
new MonPlugin;
