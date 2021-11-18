<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>
	</div><!-- #page -->
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
<script>
(function($){
 $(".toggle_menu").click(function(){
      $("#navbarResponsive").toggleClass("hidmenu");
  });
	$(window).scroll(function() {    
      var scroll = $(window).scrollTop();

      if (scroll >= 100) {
          $("#mainNav").addClass("darkHeader");
      } else {
          $("#mainNav").removeClass("darkHeader");
			}
// 			 if ($(window).width()<500){
//   			$('#mainNav').removeClass('darkHeader');
//  }
  });
})(jQuery);
</script>
	</body>
</html>
