<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Recent Posts From Category
	Plugin URI: 
	Description: Display a list of recent post from one or more categories. You can choose the number of posts to show.
	Version: 1.0
	Author: 
	Author URI: 

-----------------------------------------------------------------------------------*/


// Add function to widgets_init that'll load our widget
add_action( 'widgets_init', 'crp_widgets' );

// Register widget
function crp_widgets() {
	register_widget( 'category_recent_post_Widget' );
}

// Widget class
class category_recent_post_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function category_recent_post_Widget() {

	// Widget settings
	$widget_ops = array(
			'classname'   => 'widget_category_recent_post', 
			'description' => __('Display a list of recent post from one or more categories. You can choose the number of posts to show.','simple')
		);

	// Widget control settings
	$control_ops = array(
		'width' => 300,
		'height' => 200,
		'id_base' => 'widget_category_recent_post'
	);

	// Create the widget
	$this->WP_Widget( 'widget_category_recent_post', __('Theme4all Recent Post From Category', 'simple'), $widget_ops, $control_ops );
	
}


/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
function widget( $args, $instance ) {
	extract( $args );
		
			$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Category Recent Posts' : $instance['title'], $instance, $this->id_base);	
			
			
			if ( ! $number = absint( $instance['number'] ) ) $number = 5;
						
			if( ! $cats = $instance["cats"] )  $cats='';
					
			// array to call recent posts.
			
			$crp_args=array(
						   
				'showposts' => $number,
				'category__in'=> $cats,
				);
			
			$crp_widget = null;
			$crp_widget = new WP_Query($crp_args);
			
			echo $before_widget;
			
			// Widget title
			
			echo $before_title;
			echo $instance["title"];
			echo $after_title;
			
			// Post list in widget
			
			echo "<ul>";
			
		while ( $crp_widget->have_posts() )
		{
			$crp_widget->the_post();
		?>
			<li class="crp-item">

				<a  href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="crp-title"><?php the_title(); ?></a>
			</li>
		<?php

		}

		 wp_reset_query();

		echo "</ul>";
		echo $after_widget;
}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
    
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['cats'] = $new_instance['cats'];
		$instance['number'] = absint($new_instance['number']);
	  
       
 		return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	
function form( $instance ) {

	$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
	$number = isset($instance['number']) ? absint($instance['number']) : 5;
	
  	
?>
  
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
  </p>
                        
  <p>
    <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
  </p>
        
  <p>
    <label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Select categories to include in the recent posts list:','simple');?> 
            
                <?php
                   $categories=  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'cats' ) .'[]" name="'. $this->get_field_name( 'cats' ) .'[]"';
                            if (is_array($instance['cats'])) {
                                foreach ($instance['cats'] as $cats) {
                                    if($cats==$cat->term_id) {
                                         $option=$option.' checked="checked"';
                                    }
                                }
                            }
                            $option .= ' value="'.$cat->term_id.'" />';
			    $option .= '&nbsp;';
                            $option .= $cat->cat_name;
                            $option .= '<br />';
                            echo $option;
                         }
                    
                    ?>
    </label>
  </p>
        
<?php
	}
}
?>