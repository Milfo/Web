<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Sidebar social
	Plugin URI: 
	Description:  
	Version: 1.0
	Author: 
	Author URI: 

-----------------------------------------------------------------------------------*/


//Add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'sidebar_social' );

// Register widget.
function sidebar_social() {
	register_widget( 'sidebar_social_Widget' );
}

//Widget class.
class sidebar_social_widget extends WP_Widget {
	

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
	function sidebar_social_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'sidebar_social_widget', 'description' => __('Socials icons in sidebar.', 'ellias') );

		/* Widget control settings */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sidebar_social_widget' );

		/* Create the widget */
		$this->WP_Widget( 'sidebar_social_widget', __('Sidebar social', 'ellias'), $widget_ops );
	}
	

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );

    $path= get_template_directory_uri().'/includes/widgets/widget-sidebar-social/';
		/* Our variables from the widget settings. */
		//$title = apply_filters('widget_title', $instance['title'] );
		$facebook = $instance['facebook'];
    $google = $instance['google'];
    $twitter = $instance['twitter'];
    $rss = $instance['rss'];
    $youtube = $instance['youtube'];
    $vimeo = $instance['vimeo'];
    $pinterest = $instance['pinterest'];
    $linkedin = $instance['linkedin'];
    $skype = $instance['skype'];
    $tumblr = $instance['tumbrl'];
    $behance = $instance['behance'];
    $delicious = $instance['delicious'];
    $deviantart = $instance['deviantart'];
    $dribble = $instance['drible'];
    $flickr = $instance['flickr'];
    $forrst = $instance['forrst'];
    $grooveshark = $instance['grooveshark'];
    $lastfm = $instance['lastfm'];
    $myspace = $instance['myspace'];
    
		/* Before widget (defined by themes). */
		//echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		//if ( $title )
		//	echo '<h3 class="widget-title">' . $title . '</h3>';
			
      echo '<div class="sidebar-social">';
			
      if ( $facebook )
      echo'  <a href="'.$facebook.'"><img src="'.$path.'socials-icons/facebook_hover.png" alt="Facebook" /></a>';
      if ( $google )
      echo'  <a href="'.$google.'"><img src="'.$path.'socials-icons/google_hover.png" alt="Google" /></a>';
      if ( $twitter )
        echo'  <a href="'.$twitter.'"><img src="'.$path.'socials-icons/twitter_hover.png" alt="Twitter" /></a>';
      if ( $rss )
        echo'  <a href="'.$rss.'"><img src="'.$path.'socials-icons/rss_hover.png" alt="RSS" /></a>';
      if ( $youtube )
        echo'  <a href="'.$youtube.'"><img src="'.$path.'socials-icons/youtube_hover.png" alt="Youtube" /></a>';
      if ( $vimeo )
        echo'  <a href="'.$vimeo.'"><img src="'.$path.'socials-icons/vimeo_hover.png" alt="Vimeo" /></a>';
      if ( $pinterest )
        echo'  <a href="'.$pinterest.'"><img src="'.$path.'socials-icons/pinterest_hover.png" alt="Pinterest" /></a>';
      if ( $linkedin )
        echo'  <a href="'.$linkedin.'"><img src="'.$path.'socials-icons/linkedin_hover.png" alt="Linkedin" /></a>';
      if ( $skype )
        echo'  <a href="'.$skype.'"><img src="'.$path.'socials-icons/skype_hover.png" alt="Skype" /></a>';
      if ( $tumblr )
        echo'  <a href="'.$tumblr.'"><img src="'.$path.'socials-icons/tumblr_hover.png" alt="Tumblr" /></a>';
      if ( $delicious )
        echo'  <a href="'.$delicious.'"><img src="'.$path.'socials-icons/delicious_hover.png" alt="Delicious" /></a>';
      if ( $deviantart )
        echo'  <a href="'.$deviantart.'"><img src="'.$path.'socials-icons/deviantart_hover.png" alt="Devianart" /></a>';
      if ( $dribble )
        echo'  <a href="'.$dribble.'"><img src="'.$path.'socials-icons/dribble_hover.png" alt="Dribble" /></a>';
      if ( $flickr )
        echo'  <a href="'.$flickr.'"><img src="'.$path.'socials-icons/flickr_hover.png" alt="Flickr" /></a>';
      if ( $forrst )
        echo'  <a href="'.$forrst.'"><img src="'.$path.'socials-icons/forrst_hover.png" alt="Forrst" /></a>';
      if ( $grooveshark )
        echo'  <a href="'.$grooveshark.'"><img src="'.$path.'socials-icons/grooveshark_hover.png" alt="Grooveshark" /></a>';
      if ( $lastfm )
        echo'  <a href="'.$lastfm.'"><img src="'.$path.'socials-icons/lastfm_hover.png" alt="Lastfm" /></a>';
      if ( $myspace )
        echo'  <a href="'.$myspace.'"><img src="'.$path.'socials-icons/myspace_hover.png" alt="Myspace" /></a>';
        
      echo '</div>';
    
    /* After widget (defined by themes). */
		//echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		//$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		
    $instance['facebook'] = $new_instance['facebook'];
    $instance['google'] = $new_instance['google']; 
    $instance['twitter'] = $new_instance['twitter'];
    $instance['rss'] = $new_instance['rss'];
    $instance['youtube'] = $new_instance['youtube'];
    $instance['vimeo'] = $new_instance['vimeo'];
    $instance['pinterest'] = $new_instance['pinterest'];
    $instance['linkedin'] = $new_instance['linkedin'];
    $instance['skype'] = $new_instance['skype'];
    $instance['tumblr'] = $new_instance['tumblr'];
    $instance['behance'] = $new_instance['behance'];
    $instance['delicious'] = $new_instance['delicious'];
    $instance['deviantart'] = $new_instance['deviantart'];
    $instance['dribble'] = $new_instance['dribble'];
    $instance['flickr'] = $new_instance['flickr'];
    $instance['forrst'] = $new_instance['forrst'];
    $instance['grooveshark'] = $new_instance['grooveshark'];
    $instance['lastfm'] = $new_instance['lastfm'];
    $instance['myspace'] = $new_instance['myspace'];
    
		return $instance;
	}
	
	
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings
/*-----------------------------------------------------------------------------------*/

	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'facebook' => 'http://facebook.com',
    'google' => 'http://google.com',
    'twitter' => 'http://twitter.com',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'google' ); ?>"><?php _e('Google', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'google' ); ?>" name="<?php echo $this->get_field_name( 'google' ); ?>" value="<?php echo $instance['google']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Linkedin', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e('Delicious', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" value="<?php echo $instance['delicious']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'deviantart' ); ?>"><?php _e('Deviantart', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'deviantart' ); ?>" name="<?php echo $this->get_field_name( 'deviantart' ); ?>" value="<?php echo $instance['deviantart']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'dribble' ); ?>"><?php _e('Dribble', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dribble' ); ?>" name="<?php echo $this->get_field_name( 'dribble' ); ?>" value="<?php echo $instance['dribble']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'forrst' ); ?>"><?php _e('Forrst', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'forrst' ); ?>" name="<?php echo $this->get_field_name( 'forrst' ); ?>" value="<?php echo $instance['forrst']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'grooveshark' ); ?>"><?php _e('Grooveshark', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'grooveshark' ); ?>" name="<?php echo $this->get_field_name( 'grooveshark' ); ?>" value="<?php echo $instance['grooveshark']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'lastfm' ); ?>"><?php _e('Lastfm', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'lastfm' ); ?>" name="<?php echo $this->get_field_name( 'lastfm' ); ?>" value="<?php echo $instance['lastfm']; ?>" />
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'myspace' ); ?>"><?php _e('Myspace', 'ellias') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'myspace' ); ?>" name="<?php echo $this->get_field_name( 'myspace' ); ?>" value="<?php echo $instance['myspace']; ?>" />
		</p>
    
    
    

		
	<?php
	}
}
?>