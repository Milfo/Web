<?php $options = get_option('basic'); ?>

<div class="clear"></div>
<!-- END .container -->
	</div>
  <!-- END .row -->
</div>



  
<div class="row-fluid footer-bottom">
  <div class="container">
     <div class="span6">
      <p class="copyright">Theme designed and created by <a href="http://www.themes4all.com/" title="Premium Wordpress templates Themes4all">Themes4all</a>. | Powered by <a href="http://wordpress.org/" title="Wordpress">Wordpress</a>.</p>
    </div>    
    
    <div class="span6">
        <div id="top-socials">
        <?php if($options['basic_facebooklink']){ ?>
          <a id="ico-facebook" href="<?php echo $options['basic_facebooklink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_googlelink']){ ?>
          <a id="ico-google" href="<?php echo $options['basic_googlelink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_twitterlink']){ ?>
          <a id="ico-twitter" href="<?php echo $options['basic_twitterlink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_youtubelink']){ ?>
          <a id="ico-youtube" href="<?php echo $options['basic_youtubelink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_linkedinlink']){ ?>
          <a id="ico-linkedin" href="<?php echo $options['basic_linkedinlink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_vimeolink']){ ?>
          <a id="ico-vimeo" href="<?php echo $options['basic_vimeolink']; ?>"></a>
        <?php } ?>
        <?php if($options['basic_emaillink']){ ?>
          <a id="ico-mail" href="<?php echo $options['basic_emaillink']; ?>"></a>
        <?php } ?>
        
          
        </div>
        </div> 
  </div>
</div> 
    
		
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
			
<!--END body-->
</body>
<!--END html-->
</html>