<?php get_header(); ?>

<div class="row" id="page">
  <div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>


	
  </div>
  <!--<div class="span4">
    <?php get_sidebar(); ?>	
  </div>-->
</div>
<script>
	
	<?
		if(is_cart()){
	?>
			console.log("ES CARRO");
			$("img").removeAttr("width");
			$("img").removeAttr("height");
			$("img.attachment-shop_thumbnail").css("width","30%");
				
	<?
		}else if(is_checkOut()){
	?>
		console.log("ES check");
		$.getScript('<? bloginfo('template_directory')?>/js/modificarCarrito.js');	
	<?		
		}


	?>

</script>
<?php get_footer(); ?>