<?php
 $options = get_option('basic'); 
 $i=1;
 
      $por_set = array();
      $por_set = maybe_unserialize( get_post_meta($post->ID,'portfolio_page_settings',true) );
      
      
      if (isset($por_set['por_cat'])){
      $p_terms = $por_set['por_cat'];
      }else { $p_terms = array();}
      
      
      
      if ( !empty($p_terms) ) $p_query =  implode(",", $p_terms);
      
      //echo '<p>'.$g_query.'</p>';
      
      $args = array(
	                   'post_type' => 'portfolio',
                     'orderby' => 'name',
                     'order' => 'DESC',
                     'posts_per_page' => '-1',
	                   'tax_query' => array(
		                                      array(
			                                           'taxonomy' => 'work',
			                                           'terms' => $p_terms
		                                            )
	                                        )
                    );

$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query($args);
$count_posts = $wp_query->post_count;
 
 
 $a=1;
 
 
 
 echo '<ul class="sortable-source"  id="filterOptions">';
 
 echo '<li class="active"><a href="#" class="all">All</a></li>';
 
$all_terms = array();
 
 foreach ($p_terms as $li){

 $ter = get_term( $li, 'work' );


  echo '
  <li><a href="#" class="'.$ter->slug.'">'.$ter->name.'</a></li>
  ';
 
 }
 
 echo '</ul>';
 echo '<ul class="ourHolder">';
 if (have_posts()) : while (have_posts()) : the_post(); 
 
 $cate = wp_get_post_terms( $wp_query->post->ID, 'work' );
 ?>
			
      <li <?php echo 'class="item item-two" data-id="id-'.$a.'" data-type="'.$cate[0]->slug.'"'; ?>> 
      <div class="gallery-img-wrap">  
        
        <?php /* if the post has a WP 2.9+ Thumbnail */
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
					
          
          <?php $image_id = get_post_thumbnail_id();
          $image_url = wp_get_attachment_image_src($image_id,'large', true);
          ?>
          
          <div id="gall-<?php echo $image_id; ?>" class="gallery-thumb sortable-thumb">
          
						<?php the_post_thumbnail('portfolio-two-thumb'); ?>
            
            <?php if(isset($options['port_fancybox'])){ ?>
          <?php if($options['port_fancybox']=='2'){ ?>
            <a class="gall-thumb-img fancybox" href="<?php echo $image_url[0]; ?>" title="<?php  the_title(); ?>" ></a>
            <a class="gall-thumb-link" href="<?php the_permalink(); ?>" title="<?php  the_title(); ?>" ></a>
            <?php 
              }else{
              ?>
              <a class="gall-thumb-link-one fancybox" href="<?php echo $image_url[0]; ?>" title="<?php  the_title(); ?>" ></a>
              <?php
              }
            }
            ?>
          </div>
          <?php else : ?>
          <div class="gallery-thumb">
						<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/gall-img1.png" alt="Thumbnail" /></a>
					</div>
					<?php endif; ?>	
					
        </div> 
        </li>  
       
				<?php
        if($i==4){$i=0;}
        $i++;
        $a++;
        endwhile; 
        endif;
        
        
        echo '</ul>';
         
?>

