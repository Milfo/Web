<?php
/*
-----------------------------------------------------------------------------------

 	Plugin Name: Tripodion Twitter Widget
 	Plugin URI: 
 	Description: A widget that displays messages from twitter.com
 	Version:
 	Author: 
 	Author URI: 
 
-----------------------------------------------------------------------------------
*/


add_action( 'widgets_init', 'Themes4all_twitter_load_widget' );

// Register widget
function Themes4all_twitter_load_widget() {
	register_widget( 'Themes4all_Twitter_Widget' );
}

// Widget class
class Themes4all_Twitter_Widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function Themes4all_Twitter_Widget() {

		/* Widget settings. */
		$widget_ops = array( 'classname' => 'themes4all_twitter_widget' , 'description' => __( 'Twitter Widget' , 'simple' ) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'themes4all_twitter_widget' );
		
		/* Create the widget. */
		$this->WP_Widget('themes4all_twitter_widget', __( 'Themes4all : Twitter Widget' , 'simple' ) , $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );

	$title = apply_filters('widget_title', $instance['title'] );
	$user_name = $instance['user_name'];
	$count_message = $instance['count_message'];	

	echo $before_widget;

	if ( $title )
		echo $before_title . $title . $after_title;
?>

<script type="text/javascript">
jQuery(document).ready(function() {


	  $(".tweet").tweet({
        	count: <?php echo $instance['count_message']; ?>,
        	username: "<?php echo $instance['user_name']; ?>",
        	loading_text: "loading twitter...",
        				avatar_size: 32      
		});

	
});
</script>		

			<div class="tweet"></div>
	
	<?php

	echo $after_widget;
	
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] = strip_tags( $new_instance['title'] );
	
	$instance['user_name'] = stripslashes( $new_instance['user_name']);
	$instance['count_message'] = stripslashes( $new_instance['count_message']);	

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	$defaults = array( 'title' => __( 'From Twitter' , 'simple' ), 'user_name' => 'VladaMusilek', 'count_message' => '3', );
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'simple' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

	
	<p>
		<label for="<?php echo $this->get_field_id( 'user_name' ); ?>"><?php _e( 'User Name:' , 'simple'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'user_name' ); ?>" name="<?php echo $this->get_field_name( 'user_name' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['user_name'] ), ENT_QUOTES)); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'count_message' ); ?>"><?php _e( 'The Number of Displayed Messages:' , 'simple' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'count_message' ); ?>" name="<?php echo $this->get_field_name( 'count_message' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['count_message'] ), ENT_QUOTES)); ?>" />
	</p>
		
	<?php
	}
}
?>