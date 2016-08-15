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
			var subtotal = $("tr.cart-subtotal > td > span").text();
			var elId = "";
			$("img").removeAttr("width");
			$("img").removeAttr("height");
			$("img.attachment-shop_thumbnail").addClass("imagenCarrito");

			$('#page > .row > .woocommerce').bind('DOMNodeInserted DOMNodeRemoved', function(event) {
				if($("tr.cart-subtotal > td > span").text() != subtotal){
					subtotal = $("tr.cart-subtotal > td > span").text();
					$("#tablaProd > tbody > tr").each(function(){
						if(this.id != ""){
							elId = this.id;
							console.log("ID DE LA PLAYERA: "+elId);
							$("."+elId).each(function(index){
								if(index === 0){
									$(this).detach().insertAfter("#"+elId);	
								}else{
									$(this).detach().insertAfter($("."+elId).eq(index-1));	
									//$(this).detach().insertAfter("."+elId+":last");	
								}
								
							});
							
						}
					});
					//alert("EL PRECIO HA CAMBIADO");
				}
				/*if($(".woocommerce-message").is(":visible")){
					alert("HOLA2");
					return false;
				}*/

				
			});
			

				
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
		}else if(is_page('mi-cuenta')){
	?>
			console.log("es mi cuenta");
			$("div.woocommerce").css("width","100%");
			$.getScript('<? bloginfo('template_directory')?>/js/mi_cuenta.js');
	<?

		}else if(is_page('dudas-frecuentes')){
	?>
			$(document).ready(function(){
				console.log("Es dudas");
				$direccion = "<? bloginfo('template_url');?>/dudas.html";
				console.log($direccion);
			    $.ajax({
			        url: $direccion,
			        type: 'GET',
			        success: function(data){
			        	$("#page > .row").append(data);
			        	$(".respuesta").hide();

			        	$(".pregunta > i").click(function(){
			        		$(this).parent().parent().find("p.respuesta").slideToggle();
			        		if($(this).hasClass("fa-plus")){
			        			$(this).removeClass("fa-plus").addClass("fa-minus");
			        		}else{
			        			$(this).removeClass("fa-minus").addClass("fa-plus");
			        		}
			        	});
			        }
			    });

			});
						
	<?
		}else if(is_product()){
	?>	
		console.log("estas viendo un producto");
	<?		
		}


	?>

</script>
<?php get_footer(); ?>