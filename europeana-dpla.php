<?php
/**
 * @package Europeana & DPLA Searcher
 * @version 0.1
 */
/*
Plugin Name: Europeana & DPLA Searcher
Description: Searching Europeana & DPLA
Author: José Fernández
Version: 0.1
Author URI: http://www.jose-fernandez.com.es/
License: GPLv3
*/


// Creating the widget Europeana
class europeana_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'europeana_widget', 

// Widget name will appear in UI
__('Searching Europeana', 'europeana_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget searching Europeana', 'europeana_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// Content Europeana
$europeanasearcher = '

	<form role="search" method="get" id="searchform" action="http://www.europeana.eu/portal/search.html">
<input type="checkbox" name="qf" title="Content provided by Hispana" value="PROVIDER:Hispana" >Hispana <input type="checkbox" name="qf" title="Public domain" value="RIGHTS:http://creativecommons.org/publicdomain/mark/1.0/*" >Public domain<br>
<input type="checkbox" name="qf" title="Select images" value="TYPE:IMAGE" >IMG
<input type="checkbox" name="qf" title="Select texts" value="TYPE:TEXT" >TXT
<input type="checkbox" name="qf" title="Select sounds" value="TYPE:SOUND" >AUD
<input type="checkbox" name="qf" title="Select videos" value="TYPE:VIDEO" >VID<br>
<input style="border-width:2px; width:100%" type="text" name="query" value="" id="query" placeholder="Searching Europeana..." />
<br><input type="submit" value="Search"> 
	</form>	
	
	';

echo __( $europeanasearcher , 'europeana_widget_domain' );
}


// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Searching Europeana', 'europeana_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class europeana_widget ends here

// Register and load the widget
function europeana_load_widget() {
	register_widget( 'europeana_widget' );
}
add_action( 'widgets_init', 'europeana_load_widget' );



// Widget DPLA

// Creating the widget dpla
class dpla_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'dpla_widget', 

// Widget name will appear in UI
__('Searching DPLA', 'dpla_widget_domain'), 

// Widget description
array( 'description' => __( 'Widget searching DPLA', 'dpla_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];


// Content DPLA

$dplasearcher = '

	<form role="search" method="get" id="searchform" action="http://dp.la/search">
<input type="checkbox" name="type"" title="Select images" value="image" >IMG
<input type="checkbox" name="type" title="Select texts" value="text" >TXT
<input type="checkbox" name="type" title="Select sounds" value="sound" >AUD
<input type="checkbox" name="type" title="Select videos and films" value="moving image" >VID</br>
<input style="border-width:2px; width:100%" type="text" name="q" value="" id="query" placeholder="Searching DPLA..." />
<input type="submit" value="Search">
	</form>

	';

echo __( $dplasearcher , 'dpla_widget_domain' );

}
	
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Searching DPLA', 'dpla_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class dpla_widget ends here

// Register and load the widget
function dpla_load_widget() {
	register_widget( 'dpla_widget' );
}
add_action( 'widgets_init', 'dpla_load_widget' );


?>
