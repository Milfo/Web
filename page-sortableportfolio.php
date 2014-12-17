<?php 
/*
Template Name: Sortable Portfolio Page
*/
?>
<?php
 $options = get_option('basic'); 
 $i=1;
?>
<?php get_header(); ?>

      
  
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
      
       <!--BEGIN .hentry -->
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>" style="margin-top:15px;">
                
         	<!--BEGIN .entry-content -->
					<div class="entry-content">
                 <?php if (isset($options['breadcrumb_display']) && $options['breadcrumb_display']=='1'){ ?>
      <div id="breadcrumb"><?php echo the_breadcrumb(); ?></div>
      <?php } ?>
            <h1 class="page-title">
				<?php	the_title(); ?>
      </h1>        
				<div>		<?php the_content(); ?>
						<?php 
     
      $por_set = array();
      $por_set = maybe_unserialize( get_post_meta($post->ID,'portfolio_page_settings',true) );
     
     
      
      if (isset($por_set['portfolio_columns'])){
          if ($por_set['portfolio_columns']==1){
            get_template_part('/includes/templates/sortableportfolio-two-columns');
          }elseif($por_set['portfolio_columns']==2){
            get_template_part('/includes/templates/sortableportfolio-four-columns');
          }
      }else{
          get_template_part('/includes/templates/sortableportfolio-four-columns');
      }
      
      
?>        
    </div>  
        <!-- Pagination -->
        <?php
        
        //mm_pagination($g_query, $g_per_page);
        
        wp_reset_query();
        
        ?>
					<!--END .entry-content -->
					</div>

                <!--END .hentry-->  
				</div>
      <?php endwhile; ?>
      <?php endif; 
      wp_reset_query();
      ?>
     
			<div class="clear"></div>
      
        
      


<?php //get_sidebar(); ?>

<?php get_footer(); ?>