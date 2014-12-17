<?php get_header(); ?>
<?php
 $options = get_option('basic'); 
 global $paged;
      $paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : get_query_var( 'paged' );
?>
<div class="row-fluid content">
  <div class="span8">
 
  
  <?php if (have_posts()) : ?>    
        <?php while (have_posts()) : the_post(); ?>
    
		<?php get_template_part( 'content', get_post_format() ); ?>
		
    <?php endwhile; ?>

      <?php //get_template_part('includes/navigation','category'); //Get navigation ?> 
      <div class="navigations"><?php posts_nav_link(' ',__('PREVIOUS page','simple'),__('NEXT page','simple')); ?></div>      

			<?php else : ?>

				<!--BEGIN #post-0-->
				
        <div id="post-0" <?php post_class(); ?>>
				
					<h1 class="entry-title"><?php _e('Error 404 - Not Found', 'simple') ?></h1>
				
					<!--BEGIN .entry-content-->
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "simple") ?></p>
					<!--END .entry-content-->
					</div>
				
				<!--END #post-0-->
				</div>

			<?php endif; 
      wp_reset_query();
      ?>
			</div>
      <div class="span4">
        <?php get_sidebar(); ?>
      </div>
    </div>
				

<?php get_footer(); ?>