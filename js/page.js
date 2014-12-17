jQuery(document).ready(function() {

jQuery("a.fancybox").fancybox();


/*
* resize obrázků  - start
*/

//***resize pro obrázky v enty-content a hentry
// získání velikosti obrázků
function imageSizes( i, $this, count ){ 
  var img = new Image();
      img.src = $this.attr('src');
      img.onload = function() {
        $('body').data('image'+i, this.width);
        var loads = ($('body').data('loads')*1);
        if(isNaN(loads)){ loads = 1;}
        $('body').data('loads', (loads+1));
        
        if(count==loads){
          imageEdit();
        }
      } 
}
function imageSizes2( i, $this, count ){ 
  var img = new Image();
      img.src = $this.attr('src');
      img.onload = function() {
        $('body').data('image'+i, this.width);
        var loads = ($('body').data('loads2')*1);
        if(isNaN(loads)){ loads = 1;}
        $('body').data('loads2', (loads+1));
        
        if(count==loads){
          imageEdit();
        }
      }     
}


var i = 0;
var imagesToLoad = $('.entry-content').not('#slider').find('img').not('.avatar').not('.author-avatar').not('.aligncenter');   
imagesToLoad.each(function(){
  imageSizes( i , $(this),imagesToLoad.length);      
  i++;
})

var i = 0;
var imagesToLoad = $('.hentry').not('#slider').find('img').not('.avatar').not('.author-avatar').not('.aligncenter');
imagesToLoad.each(function(){
  imageSizes2( i , $(this),imagesToLoad.length);      
  i++;
})


// funkce na responzive
function imageEdit(){ /* 
  var wWidth = $(window).width();

  var img = $('.entry-content').not('#slider').find('img').not('.avatar').not('.author-avatar').not('.aligncenter');
  var contentWidth = $('.entry-content').width()-50,   
      i = 0;    
      
      if(contentWidth > wWidth){
          contentWidth = wWidth; 
      }

  img.each(function(){    
    if($('body').data('image'+i) > contentWidth){
        $this = $(this);
        margins = parseInt($this.css('margin-left')) + parseInt($this.css('margin-right'));
        $(this).width(contentWidth-margins);
    } else {
        $this = $(this);
        margins = parseInt($this.css('margin-left')) + parseInt($this.css('margin-right'));
        $(this).width($('body').data('image'+i)-margins);
    }
  i++;
  })

  var img = $('.hentry').find('img').not('#slider').find('img').not('.avatar').not('.author-avatar').not('.aligncenter');
  var contentWidth = $('.hentry').width(),   
      i = 0;   
        
      if(contentWidth > wWidth){
          contentWidth = wWidth; 
      }
 
  img.each(function(){
    if($('body').data('image'+i) > contentWidth){
        $this = $(this);
        margins = parseInt($this.css('margin-left')) + parseInt($this.css('margin-right'));
        $(this).width(contentWidth-margins);
    } else {
        $this = $(this);
        margins = parseInt($this.css('margin-left')) + parseInt($this.css('margin-right'));
        $(this).width($('body').data('image'+i)-margins);
    }   
  i++;
  })    */
}

$(window).resize(function() {
  imageEdit();
});      

/*
* resize obrázků  - end
*/


//Gallery ico
$mm_gall = $('.gallery-thumb');

$mm_gall.find('img').css('background-color','#000000');
jQuery('.gall-thumb-img, .gall-thumb-link, .gall-thumb-link-one').css({'opacity':'0','visibility':'visible'});

	$mm_gall.hover(function(){
		jQuery(this).find('img').stop(true, true).animate({opacity: 0.7},500);
		jQuery(this).find('.gall-thumb-img').stop(true, true).animate({opacity: 1},400);
		jQuery(this).find('.gall-thumb-link').stop(true, true).animate({opacity: 1},400);
    jQuery(this).find('.gall-thumb-link-one').stop(true, true).animate({opacity: 1},400);
	}, function(){
		jQuery(this).find('.gall-thumb-img').stop(true, true).animate({opacity: 0},400);
		jQuery(this).find('.gall-thumb-link').stop(true, true).animate({opacity: 0},400);
    jQuery(this).find('.gall-thumb-link-one').stop(true, true).animate({opacity: 0},400);
		jQuery(this).find('img').stop(true, true).animate({opacity: 1},500);
	});
  
//Homepage Gallery ico
$mm_gall = $('.page-gallery-thumb');

$mm_gall.find('img').css('background-color','#000000');
jQuery('.page-thumb-img, .page-thumb-link, .page-thumb-link-one').css({'opacity':'0','visibility':'visible'});

	$mm_gall.hover(function(){
		jQuery(this).find('.page-thumb-img').stop(true, true).animate({opacity: 1},400);
		jQuery(this).find('.page-thumb-link').stop(true, true).animate({opacity: 1},400);
    jQuery(this).find('.page-thumb-link-one').stop(true, true).animate({opacity: 1},400);
	}, function(){
		jQuery(this).find('.page-thumb-img').stop(true, true).animate({opacity: 0},400);
		jQuery(this).find('.page-thumb-link').stop(true, true).animate({opacity: 0},400);
    jQuery(this).find('.page-thumb-link-one').stop(true, true).animate({opacity: 0},400);
	});  
  
//Post thumb  
$mm_postthumb = $('.post-thumb');  		
$mm_postthumb.find('img').css('background-color','#000000');      
$mm_postthumb.hover(function(){
		jQuery(this).find('img').stop(true, true).animate({opacity: 0.7},500);
	}, function(){
		jQuery(this).find('img').stop(true, true).animate({opacity: 1},500);
	});        

//Contact form
$('form#contactForm').submit(function(){
    
    var hasError = false;
    
    $('#contactName').each(function() {
      if(jQuery.trim($(this).val()) == '') {
				$('.name_error').show();
        hasError = true; 
			}
    });
    $('#email').each(function() {
      if(jQuery.trim($(this).val()) == '') {
				$('.email_error').show();
        hasError = true;
			}
    });
    $('#your-message').each(function() {
      if(jQuery.trim($(this).val()) == '') {
				$('.message_error').show();
        hasError = true;
			}
    });
		
    
    if(!hasError) {
			 return true;
		}
		
		return false;
    
    
		
	});
  
  
 //Recent and popular post sidebar
 
 $("#id-tab-posts").click(function() {
  $('#tab-posts').show();
  $('#tab-popular').hide();
  $('#tab-comments').hide();
  $('#tab-tags').hide();
  $("#id-tab-posts").addClass("active");
  $("#id-tab-popular").removeClass("active");
  $("#id-tab-comments").removeClass("active");
  $("#id-tab-tags").removeClass("active");
  
});

$("#id-tab-popular").click(function() {
  $('#tab-posts').hide();
  $('#tab-popular').show();
  $('#tab-comments').hide();
  $('#tab-tags').hide();
  $("#id-tab-posts").removeClass("active");
  $("#id-tab-popular").addClass("active");
  $("#id-tab-comments").removeClass("active");
  $("#id-tab-tags").removeClass("active");
});

$("#id-tab-comments").click(function() {
  $('#tab-posts').hide();
  $('#tab-popular').hide();
  $('#tab-comments').show();
  $('#tab-tags').hide();
  $("#id-tab-posts").removeClass("active");
  $("#id-tab-popular").removeClass("active");
  $("#id-tab-comments").addClass("active");
  $("#id-tab-tags").removeClass("active");
});

$("#id-tab-tags").click(function() {
  $('#tab-posts').hide();
  $('#tab-popular').hide();
  $('#tab-comments').hide();
  $('#tab-tags').show();
  $("#id-tab-posts").removeClass("active");
  $("#id-tab-popular").removeClass("active");
  $("#id-tab-comments").removeClass("active");
  $("#id-tab-tags").addClass("active");
}); 



// get the action filter option item on page load
  var $filterType = $('#filterOptions li.active a').attr('class');
 
  // get and assign the ourHolder element to the
  // $holder varible for use later
  var $holder = $('ul.ourHolder');
 
  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();
 
  // attempt to call Quicksand when a filter option
  // item is clicked
  $('#filterOptions li a').click(function(e) {
    // reset the active class on all the buttons
    $('#filterOptions li').removeClass('active');
 
    // assign the class of the clicked filter option
    // element to our $filterType variable
    var $filterType = $(this).attr('class');
    $(this).parent().addClass('active');
    if ($filterType == 'all') {
      // assign all li items to the $filteredData var when
      // the 'All' filter option is clicked
      var $filteredData = $data.find('li');
    }
    else {
      // find all li elements that have our required $filterType
      // values for the data-type element
      var $filteredData = $data.find('li[data-type=' + $filterType + ']');
    }
 
    // call quicksand and assign transition parameters
    $holder.quicksand($filteredData, {
      duration: 800,
      easing: 'swing'
    });
    return false;
  });

       
  
  
               
    
}); 
    