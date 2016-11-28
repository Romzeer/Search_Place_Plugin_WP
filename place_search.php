<?php
/*
Plugin Name: Place Search
Plugin URI: http://localhost
Description: A tool for searching places near to you
Version: 0.1
Author: Romain Peyret
Author URI: localhost/wp-admin
License: GPL2
License URI:
Text Domain: Place Searches
Domain Path: /languages
*/
include_once plugin_dir_path(__FILE__).'/place_search_widget.php';
require_once dirname(__FILE__).'/library/class.settings-api.php';
require_once dirname(__FILE__).'/inc/admin/procedural-example.php';
require_once dirname(__FILE__).'/addasync.php';


function traduction() {
	load_plugin_textdomain( 'Place Searches', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'traduction' );

// fonction pour ajouter l'api Google Map ainsi que le Javascript'

function localize ( ) {
wp_localize_script( 'apiGoogle', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&callback=initMap', array(), '1.1', true );
wp_register_script('localize-js', esc_url( plugins_url( 'js/localize.js', __FILE__ ) ), array(), '1.1', true);
wp_enqueue_script('localize-js');
}
add_action('wp_enqueue_scripts', 'localize');
add_action('widgets_init', function(){register_widget('Place_Search_Widget');});


// Ajout d'un peu de CSS pour la carte'

function insert_css() {
 
    wp_register_style( 'localize',  esc_url( plugins_url('css/global.css', __FILE__ )));
    wp_enqueue_style( 'localize' );
}
add_action('wp_enqueue_scripts', 'insert_css');


