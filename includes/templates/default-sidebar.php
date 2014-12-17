<!-- Search form -->
  <div class="widget widget_search"><!--BEGIN #searchform-->
    <form method="get" id="searchform" action="http://pixbee.themes4all.com/">
	   <fieldset>
	 	   <input type="text" name="s" id="s" value="search" onfocus="if(this.value=='search')this.value='';" onblur="if(this.value=='')this.value='search';" />
        <input type="submit" name="submit" value="" id="s-submit">
	   </fieldset>
<!--END #searchform-->
    </form>
  </div>
  
  
  <div class="vid-widget">
    <div style="float:left;width:100%;">
      <h3 class="widget-title"><?php _e('My video','simple') ?></h3>		
		    <div class="tz_video">
		      <iframe width="259" height="220" src="http://www.youtube.com/embed/wkmqDiDTcBY" style="border: none;"></iframe>		
        </div>
		  <p class="tz_video_desc"><?php _e('This is my latest video.','simple') ?></p>
	 </div>    
  </div>

  <div class="my-ads">
    <div class="ads-259">
      <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/common/300x230.png" width="300" height="230" alt="" /></a>
    </div>
  </div>