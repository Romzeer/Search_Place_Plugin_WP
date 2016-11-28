<?php
/**
 * Add async attr on scripts
 * @param $url
 * @return string
 * @author Julien Maury
 */


function _make_async_scripts( $url ) {
    if ( is_admin() || false === strpos( $url, '#async')  ) {
        return $url;
    }
  
    // delete our marker
    $url = str_replace( '#async', '', $url );
  
    return $url . "' async='async'";
}
add_filter( 'clean_url', '_make_async_scripts', 11 );
add_action( 'wp_enqueue_scripts', '_my_enqueue_scripts' );
/**
 * Enqueue our script
 * @author Julien Maury
 */
function _my_enqueue_scripts() {
    wp_enqueue_script( 'localiz', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&callback=initMap#async', [], null, true );
}

