<?php

// Création d'un widget pour insérer le plugin dans une sidebar
class Place_Search_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('place_search', 'Place Searches', array('description' =>  __('A tool for searching places near to you', 'Place Searches')));
    }
    
    public function form($instance)
    {
    $title = isset($instance['title']) ? $instance['title'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
    </p>
    <?php
    }

    public function widget($args, $instance)
    {
    echo $args['before_widget'];
    echo $args['before_title'];
    echo apply_filters('widget_title', $instance['title']);
    echo $args['after_title'];
    ?>
    <form>
    <input id="champ"/>
    <button id="valider"><?php _e('Search', 'Place Searches')?></button>
    </form>
    <div id="map"></div>
    <?php
    echo $args['after_widget'];
    }
}
