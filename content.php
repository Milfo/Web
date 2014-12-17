    
    <div class="row-fluid">
      <div class="span12 cat-12">
      <div class="row-fluid">
    
      <div class="span12 white-bg">
        <?php 
			if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
				<div class="catpost-thumb cat-8">
          <div>  
						<a title="<?php printf(__('Permanent Link to %s', 'simple'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog'); ?></a>
					 
          </div>
        </div>
      <?php endif; ?>
      </div>
          
  <div class="row-fluid">
  
    <div class="span19 cat-9 white-bg push-post">	
    <h2 class="cat-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'simple'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
    
    
    		
      <div class="entry-content">
			 <?php the_content(); ?>
			</div>
     <div class="row-fluid">
      <div class="span9">
        <?php get_template_part('includes/cat-meta','category'); //Get meta ?>
         </div>
        <div class="span3">    
       <a class="postpage-more" href="<?php the_permalink(); ?>"><?php _e('Continue Reading','simple') ?></a>
         </div>
         </div>
    </div>
    </div>      
			                
        </div>
        </div>
        </div>