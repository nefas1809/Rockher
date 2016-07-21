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
		}else if(is_page('contacto')){
			$dir1 = get_option("contacto-dir1");
			$dir2 = get_option("contacto-dir2");
			$dir3 = get_option("contacto-dir3");
			$horario = get_option("horario" );
			$tel = get_option("telefono" );
			$chat = get_option("chat" );
			$terminos = get_option("terminos" );


	?>
			$("#dir-1").html('<?=$dir1 ?>');
			$("#dir-2").html('<?=$dir2 ?>');
			$("#dir-3").html('<?=$dir3 ?>');
			$("#horario").html('<?=$horario ?>');
			$("#telefono").html('<?=$tel ?>');
			$("#chat").html('<?=$chat ?>');
			$("#terminos").html('<?=$terminos ?>');

			var alturaSeparador = $("#form-contacto").height()+$("#chat").height();
			$(".separador").css("height",alturaSeparador);

	<?		
		}


	?>

</script>
<?php get_footer(); ?>