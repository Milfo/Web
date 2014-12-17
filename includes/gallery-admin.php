<?php 

//ADD CAT-SCRIPT JS
add_action( 'admin_enqueue_scripts', 'mm_upload_cat_script' );
function mm_upload_cat_script( $hook_suffix ) {
	if ( in_array($hook_suffix, array('post.php','post-new.php')) ) {
		wp_register_script('cat-script', get_template_directory_uri().'/includes/js/cat-script.js', array('jquery'));
		wp_enqueue_script('cat-script');
	}
}

//ADD META BOX
add_action('admin_init', 'mm_gallery_setting');
function mm_gallery_setting(){
	add_meta_box('gallery_meta_box', 'Gallery Setting', 'gallery_meta_box', 'page', 'side');
}

//META BOX BODY FUNCTION
if ( ! function_exists( 'gallery_meta_box' ) ){
	function gallery_meta_box($callback_args) {
		global $post;
		
    //Define array
    $gall_array = array();
    //Check post meta
		$gall_array = maybe_unserialize(get_post_meta($post->ID,'gallery_page_settings',true));
		//Category setting 
		if (isset($gall_array['gall_cat'])){
      $gallery_categories = array();
      $gallery_categories = $gall_array['gall_cat'];
    }else{
      $gallery_categories = array();
    }
    //Per page setting
    if (isset($gall_array['gall_per_page'])){
      $gallery_per_page = $gall_array['gall_per_page'];
    }else{
      $gallery_per_page = 10;//Default setting
    }
    $gallery_columns = isset( $gall_array['gallery_columns'] ) ? (int) $gall_array['gallery_columns'] : 2;
    $blog_sidebar = isset( $gall_array['blog_sidebar'] ) ? (int) $gall_array['blog_sidebar'] : 2;
    
		?>
		
		<?php //wp_nonce_field( 'et_ptemplates_nonce', '_wpnonce_ptemplates_save' ); ?>
		
		<div style="margin: 13px 0 11px 4px;" class="set_info">
			<p><?php esc_html_e( 'Settings will be displayed when i choosen gallery-page', 'simple' ); ?></p>
		</div>
    
    
    <div style="margin: 13px 0 11px 4px; display: none;" class="set_gallery  set_portfolio">
			<p style="font-weight: bold; padding-bottom: 7px;"><?php esc_html_e( 'Number columns:', 'simple' ); ?></p>
			<label title="Two columns"><input type="radio" name="gallery_columns" value="1"<?php checked( $gallery_columns, 1 ); ?>> <span><?php esc_html_e( 'Two columns', 'single' ); ?></span></label><br><br>
			<label title="Four columns"><input type="radio" name="gallery_columns" value="2"<?php checked( $gallery_columns, 2 ); ?>> <span><?php esc_html_e( 'Four columns', 'single' ); ?></span></label><br><br>
			
		</div>
     <div style="margin: 13px 0 11px 4px; display: none;" class="set_blog">
			<p style="font-weight: bold; padding-bottom: 7px;"><?php esc_html_e( 'Display or hide sidebar:', 'simple' ); ?></p>
			<label title="Fullwith"><input type="radio" name="blog_sidebar" value="1"<?php checked( $blog_sidebar, 1 ); ?>> <span><?php esc_html_e( 'Fullwith', 'single' ); ?></span></label><br><br>
			<label title="With sidebar"><input type="radio" name="blog_sidebar" value="2"<?php checked( $blog_sidebar, 2 ); ?>> <span><?php esc_html_e( 'With sidebar', 'single' ); ?></span></label><br><br>
			
		</div>
    
		
		<div style="margin: 13px 0 11px 4px; display: none;" class="set_gallery  set_portfolio set_blog">
		  <label for="gallery_perpage" style="color: #000; font-weight: bold;"> <?php esc_html_e( 'Number of posts per page:', 'simple' ); ?> </label>
		  <input type="text" class="small-text" value="<?php echo $gallery_per_page; ?>" id="gallery_perpage" name="gallery_perpage" size="2" />
		</div>
		
		<div style="margin: 13px 0 11px 4px; display: none;" class="set_gallery set_portfolio set_blog">
			<h4><?php esc_html_e( 'Select gallery categories:', 'simple' ); ?></h4>
					
<?php 
//Check all categories
$cats_array = get_categories('hide_empty=0');
$site_cats = array();
foreach ($cats_array as $categs) {
$checked = '';
if (!empty($gallery_categories)) {
					if (in_array($categs->cat_ID, $gallery_categories)) $checked = "checked=\"checked\"";
				} ?>
				
				<label style="padding-bottom: 5px; display: block;" for="<?php echo 'gallerycats-',$categs->cat_ID; ?>">
					<input type="checkbox" name="gallerycats[]" id="<?php echo esc_attr( 'gallerycats-' . $categs->cat_ID ); ?>" value="<?php echo esc_attr( $categs->cat_ID ); ?>" <?php echo $checked; ?> />
					<?php echo esc_html( $categs->cat_name ); ?>
				</label>							
			<?php } ?>
		</div>
		
		<?php
	}
}


//SAVE GALLERY SETTINGS
add_action( 'save_post', 'gal_sets_save_details', 10, 2 );
function gal_sets_save_details( $post_id, $post ){
	global $pagenow;
	
//if ( 'post.php' != $pagenow ) return $post_id;
//if ( 'page' != $post->post_type )
//		return $post_id;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
//$post_type = get_post_type_object( $post->post_type );
//if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
//		return $post_id;

//if ( !isset( $_POST["page_template"] ) )
//		return $post_id;
		
//	if ( !in_array( $_POST["page_template"], array('page-blog.php', 'page-sitemap.php', 'page-gallery.php', 'page-search.php', 'page-login.php', 'page-contact.php', 'page-template-portfolio.php') ) )
//		return $post_id;
  
  //Define array  		
	$gall_array = array();
	
	if ( 'page-gallery.php' == $_POST['page_template'] ) {
		if (isset($_POST['gallerycats'])) $gall_array['gall_cat'] = (array) $_POST['gallerycats'];
		if (isset($_POST['gallery_perpage'])) $gall_array['gall_per_page'] = (int) $_POST['gallery_perpage'];
    if (isset($_POST['gallery_columns'])) $gall_array['gallery_columns'] = (int) $_POST['gallery_columns'];
	}
  elseif ( 'page-portfolio.php' == $_POST['page_template'] ) {
		if (isset($_POST['gallerycats'])) $gall_array['gall_cat'] = (array) $_POST['gallerycats'];
		if (isset($_POST['gallery_perpage'])) $gall_array['gall_per_page'] = (int) $_POST['gallery_perpage'];
    if (isset($_POST['gallery_columns'])) $gall_array['gallery_columns'] = (int) $_POST['gallery_columns'];
	}
  elseif ( 'page-blog.php' == $_POST['page_template'] ) {
		if (isset($_POST['gallerycats'])) $gall_array['gall_cat'] = (array) $_POST['gallerycats'];
		if (isset($_POST['gallery_perpage'])) $gall_array['gall_per_page'] = (int) $_POST['gallery_perpage'];
    if (isset($_POST['blog_sidebar'])) $gall_array['blog_sidebar'] = (int) $_POST['blog_sidebar'];
	}
	//Update post meta with setting values
	update_post_meta( $post_id, 'gallery_page_settings', $gall_array );
} 

/***********************************************************
 *
 *  Sortable portfolio settings
 *
/***********************************************************/    


//ADD META BOX
add_action('admin_init', 'mm_portfolio_setting');
function mm_portfolio_setting(){
	add_meta_box('portfolio_meta_box', __('Portfolio Options','simple'), 'portfolio_meta_box', 'page', 'side');
}

//META BOX BODY FUNCTION
if ( ! function_exists( 'portfolio_meta_box' ) ){
	function portfolio_meta_box($callback_args) {
		global $post;
		
    //Define array
    $por_array = array();
    //Check post meta
		$por_array = maybe_unserialize(get_post_meta($post->ID,'portfolio_page_settings',true));
		//Category setting 
		if (isset($por_array['por_cat'])){
      $por_categories = array();
      $por_categories = $por_array['por_cat'];
    }else{
      $por_categories = array();
    }
    //Number of columns setting
    $por_columns = isset( $por_array['portfolio_columns'] ) ? (int) $por_array['portfolio_columns'] : 2;
    
		?>
		
		<?php //wp_nonce_field( 'et_ptemplates_nonce', '_wpnonce_ptemplates_save' ); ?>
		<div style="margin: 13px 0 11px 4px; display: none;" class="set_sortableportfolio">
			<p style="font-weight: bold; padding-bottom: 7px;"><?php esc_html_e( 'Number columns:', 'simple' ); ?></p>
			<label title="Two columns"><input type="radio" name="por_columns" value="1"<?php checked( $por_columns, 1 ); ?>> <span><?php esc_html_e( 'Two columns', 'simple' ); ?></span></label><br><br>
			<label title="Four columns"><input type="radio" name="por_columns" value="2"<?php checked( $por_columns, 2 ); ?>> <span><?php esc_html_e( 'Four columns', 'simple' ); ?></span></label><br><br>
			
		</div>
    
		
		<div style="margin: 13px 0 11px 4px; display: none;" class="set_sortableportfolio">
			<h4><?php esc_html_e( 'Select portfolio categories:', 'simple' ); ?></h4>
					
<?php 
//Check portfolio taxonomy

$args = array(
  'object_type' => array('portfolio')
);
 
$taxonomies = get_terms('work'); 

//$por_array = get_categories('hide_empty=0');
$site_cats = array();

foreach ($taxonomies as $taxonomy) {
$checked = '';
if (!empty($por_categories)) {
					if (in_array($taxonomy->term_id, $por_categories)) $checked = "checked=\"checked\"";
				} 
        
        ?>
				
				<label style="padding-bottom: 5px; display: block;" for="<?php echo 'gallerycats-',$taxonomy->term_id; ?>">
					<input type="checkbox" name="portfoliotaxonomy[]" id="<?php echo esc_attr( 'gallerycats-' . $taxonomy->term_id ); ?>" value="<?php echo esc_attr( $taxonomy->term_id ); ?>" <?php echo $checked; ?> />
					<?php echo esc_html( $taxonomy->name ); ?> 
				</label>							
			<?php } ?>
		</div>
		
		<?php
	}
}


//SAVE GALLERY SETTINGS
add_action( 'save_post', 'por_sets_save_details', 10, 2 );
function por_sets_save_details( $post_id, $post ){
	global $pagenow;
	
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
  
  //Define array  		
	$por_array = array();
	
	
  if ( 'page-sortableportfolio.php' == $_POST['page_template'] ) {
  
  	if (isset($_POST['portfoliotaxonomy'])) $por_array['por_cat'] = (array) $_POST['portfoliotaxonomy'];
		if (isset($_POST['por_columns'])) $por_array['portfolio_columns'] = (int) $_POST['por_columns'];
	}
  //Update post meta with setting values
	update_post_meta( $post_id, 'portfolio_page_settings', $por_array );
} 




?>