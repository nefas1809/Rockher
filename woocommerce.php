
<?php get_header(); 
if(!is_product()){
?>


<div id="contenedorTienda">

	<div id="contenedorMenu" class="row">
		<div id="menuLateral">
			<?php get_sidebar(); ?>
		</div>
		<div id="imgCatalogo"><img src="<?php bloginfo('template_url') ?>/img/etiquetaCatalogo.png" alt=""></div>	
	</div>
	<div id="contenedorProductos">
		<div class="row">
		<!--<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
		  	<?php the_content(); ?>

		<?php endwhile; else: ?>
			<p><?php _e('Sorry, this page does not exist.'); ?></p>
		<?php endif; ?>-->
		<?php woocommerce_content();?>
		
  		</div>
  		<div id='opaco'></div>
	</div>


</div>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog container">
    <div class="modal-content row">
      <!--<div class="modal-header">
        
      </div>-->
      <div class="modal-body row" id="showDetails">
        <div id="productInfo row">
        	<div style="display:flex;">
        		<h2 id="productInfoH2"></h2>
        		<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--><i id="i-cerrarDetalles" class="fa fa-times close" data-dismiss="modal" aria-label="Close" aria-hidden="true" style="font-size: 32px;"></i><!--</button>-->
        	</div>
        	
        	<div id="contentInfo" class="col-md-12">
        		<div id="productInfoImg" class="col-lg-4 col-sm-12">
        		<img src="" alt="">
        		</div>
        		<div id="productInfoEstilo" class="col-lg-4 col-sm-6">
        			<h3 id="productInfoEstiloH2">Estilo de prenda</h3>

        			<!--<img src="<? bloginfo('template_directory'); ?>/img/4.png" alt="">-->
        			<div id="estilos" class="col-md-12">
        				
        			</div>
        		</div>
        		<div id="productInfoExtras" class="col-lg-4 col-sm-6">
        			<div id="precio">
        				<h4></h4>
        				<span>Menudeo</span>
        			</div>
        			<div id="productInfoColores">
        				<span>Colores</span>
        				<div id="colores">
	        				
	        			</div>
        			</div>
        			<div id="productInfoTallas">
        				<span>Tallas</span>
	        			<div id="tallas">
	        	
	        			</div>
        			</div>
        			<div id="productInfoCantidad">
        				<span>Cantidad</span>
	        			<div id="cantidad">
	        				<input type="number" step="1" min="1" value="1">
	        			</div>
	        		</div>
        			<div id="agregar">
        				<a href=""><img src="<? bloginfo('template_directory') ?>/img/agregarCarrito.png" alt=""></a>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="getProducto" style="display:none;">
	
</div>
<?
}else{
?>
	<div id="contenedorTienda">

	<div id="contenedorMenu" class="row">
		<div id="menuLateral">
			<?php get_sidebar(); ?>
		</div>
		<div id="imgCatalogo"><img src="<?php bloginfo('template_url') ?>/img/etiquetaCatalogo.png" alt=""></div>	
	</div>
	<div id="contenedorProductos">
		<div class="row">
		<!--<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
		  	<?php the_content(); ?>

		<?php endwhile; else: ?>
			<p><?php _e('Sorry, this page does not exist.'); ?></p>
		<?php endif; ?>-->
		<?php woocommerce_content();?>
		
  		</div>
  		<div id='opaco'></div>
	</div>


</div>
<div class="modal fade" tabindex="-1" role="dialog" id="myModalProd">
  <div class="modal-dialog container">
    <div class="modal-content row">
      <!--<div class="modal-header">
        
      </div>-->
      <div class="modal-body row" id="showDetails">
        <div id="productInfo row">
        	<div style="display:flex;">
        		<h2 id="productInfoH2"></h2>
        		<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--><i id="i-cerrarDetalles" class="fa fa-times close" data-dismiss="modal" aria-label="Close" aria-hidden="true" style="font-size: 32px;"></i><!--</button>-->
        	</div>
        	
        	<div id="contentInfo" class="col-md-12">
        		<div id="productInfoImg" class="col-lg-4 col-sm-12">
        		<img src="" alt="">
        		</div>
        		<div id="productInfoEstilo" class="col-lg-4 col-sm-6">
        			<h3 id="productInfoEstiloH2">Estilo de prenda</h3>

        			<!--<img src="<? bloginfo('template_directory'); ?>/img/4.png" alt="">-->
        			<div id="estilos" class="col-md-12">
        				
        			</div>
        		</div>
        		<div id="productInfoExtras" class="col-lg-4 col-sm-6">
        			<div id="precio">
        				<h4></h4>
        				<span>Menudeo</span>
        			</div>
        			<div id="productInfoColores">
        				<span>Colores</span>
        				<div id="colores">
	        				
	        			</div>
        			</div>
        			<div id="productInfoTallas">
        				<span>Tallas</span>
	        			<div id="tallas">
	        	
	        			</div>
        			</div>
        			<div id="productInfoCantidad">
        				<span>Cantidad</span>
	        			<div id="cantidad">
	        				<input type="number" step="1" min="1" value="1">
	        			</div>
	        		</div>
        			<div id="agregarProd">
        				<a href=""><img src="<? bloginfo('template_directory') ?>/img/agregarCarrito.png" alt=""></a>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="getProducto" style="display:none;">
	
</div>
<?
}
?>



<!--<div class="row">
  
  <div class="span4">
    
  </div>
</div>-->

<script>	
<?
	if(is_product_category()){
?>

		var divModal = $("#myModal");
		//console.log("MODAL: "+divModal.html());
		$("div.loopDeContentProduct").click(function(e){
			e.preventDefault();
			console.log("--------click---------");
			$("getProducto").empty().hide();
			/*if($("#contenedorProductos").find("div#opaco").is(":visible")){
				console.log("-.-.-.-.-.Esta visible");
				$("#contenedorProductos").find("#opaco").hide('slow');
				$("div.div-detalle").slideToggle('slow');
				return true;
				//$("div.div-detalle").slideToggle('slow');
				
				
			}else{
				console.log(".-.-.-.-.-.-.-.-.no esta visible");
				$("#contenedorProductos").find("div#opaco").show('slow');
			}*/
			//$("#contenedorProductos").append("<div id='opaco'></div>");

			// $(this).parent().css("zIndex", "15");
			$link_ir = $(this).children(":first-child").attr("href");
			$direccion = "<? bloginfo('template_directory_uri');?>";
			console.log($direccion);
			console.log($link_ir);
			$.ajax({
			   url:$link_ir,
			   type:'GET',
			   success: function(data){
			   		var obtenido = $(data).find("#contenedorProductos").html();
			   		console.log("/*/*/*/*/*/*/*/*/*/*/*/*/*/*");
			   		console.log(obtenido);
			       $('#showDetails').find($('#productInfoImg')).html(data);
			       	//html($(data).find("#contenedorProductos").html()));
			      //$('#showDetails').html(myhtml);
			       $("#showDetails").find(('#productInfoImg')).find("head").remove();
			       $('#showDetails').find("#contenedorMenu").remove();
			       $('#showDetails').find("nav").remove();
			       $('#showDetails').find("footer").remove();
			       $('#showDetails').find("#contenedorMenu").remove();
			       $('#showDetails').find("div.related").remove();
			       $('#showDetails').find("#tab-additional_information").remove();
			       $('#showDetails').find("li.additional_information_tab").remove();
			       $('#showDetails').find("#commentform").remove();
			       $('#showDetails').find("div.woocommerce-tabs").remove();
			       $('#showDetails').find("div.product_meta").remove();
			       $('#showDetails').find("table.variations").hide();
			       $('#showDetails').find("h1.product_title").hide();
			       $('#showDetails').find("form.variations_form").hide();
			       $('#showDetails').find("div.summary").hide();
			       var titulo = $("#showDetails").find("h1.product_title").text();
			       //var cantidad = $("#showDetails").find("div.quantity > input").appendTo("div#cantidad");
			       //var addCart = $("form.variations_form").detach();
			       //console.log("ADDCART: "+addCart);
			       //$("#agregar > a").replaceWith(addCart);
			      // $("div#cantidad").append(cantidad);






			       /*$(divModal).find($('#productInfoImg').html($(data)));

			      //$(divModal).find("#showDetails").html(myhtml);
			       $(divModal).find("#showDetails").find(('#productInfoImg')).find("head").remove();
			       $(divModal).find("#showDetails").find("#myModal").remove();
			       $(divModal).find("#showDetails").find("#contenedorMenu").remove();
			       $(divModal).find("#showDetails").find("nav").remove();
			       $(divModal).find("#showDetails").find("footer").remove();
			       $(divModal).find("#showDetails").find("#contenedorMenu").remove();
			       $(divModal).find("#showDetails").find("div.related").remove();
			       $(divModal).find("#showDetails").find("#tab-additional_information").remove();
			       $(divModal).find("#showDetails").find("li.additional_information_tab").remove();
			       $(divModal).find("#showDetails").find("#commentform").remove();
			       $(divModal).find("#showDetails").find("div.woocommerce-tabs").remove();
			       $(divModal).find("#showDetails").find("div.product_meta").remove();
			       $(divModal).find("#showDetails").find("table.variations").hide();
			       $(divModal).find("#showDetails").find("h1.product_title").hide();
			       $(divModal).find("#showDetails").find("form.variations_form").hide();
			       $(divModal).find("#showDetails").find("div.summary").hide();
			       var titulo = $(divModal).find("#showDetails").find("h1.product_title").text();
			       //var cantidad = $(divModal).find("#showDetails").find("div.quantity > input").appendTo("div#cantidad");
			       //var addCart = $("form.variations_form").detach();
			       //console.log("ADDCART: "+addCart);
			       //$("#agregar > a").replaceWith(addCart);
			      // $("div#cantidad").append(cantidad);
			       var nuevoContenido = $(divModal).find($('#showDetails')).html();
			       //console.log("NUEVO CONTENIDO: "+nuevoContenido);
			       //$(divModal).find($('#showDetails')).find($("#productInfoImg")).empty();*/




			       

			       $.getScript('<? bloginfo('template_directory')?>/js/mostrarColores.js');

			       $('#myModal').modal("show");



			        var divID = $(this).parent();
					console.log("divID: "+divID);
					/*$(divID).addClass("col-md-12").html("soy del div presionado");*/

					var anchoDiv = $(this).parent().width();
					console.log("ancho del div: "+anchoDiv);
					var index = $('#divPopUp div.product').index(divID);
					console.log("hijos: "+$("#divPopUp").children().length);

					/*$("#divPopUp > div.product").each(function(index){
						console.log("Linea "+(index+1));
						if(((index+1)%4) === 0 ){
							console.log("una linea de 4");
							var nuevoIndex = "index"+(index+1);
							var nuevoDiv = "<div id='"+nuevoIndex+"' class='col-md-12 div-detalle'>Holi</div>";
							if($("#divPopUp").find('#'+nuevoIndex).length <= 0){
								//$(nuevoDiv).hide().insertAfter($("#divPopUp").children(":nth-child("+(index+1)+")")).html($("#showDetails").html()).slideToggle('slow');


console.log("Antes de agregar el div, esto trae el show details del modal: "+$(divModal).find("#showDetails").html());

								$(nuevoDiv).hide().insertAfter($("#divPopUp").children(":nth-child("+(index+1)+")")).html(nuevoContenido).slideToggle('slow');


							}else{
								$('#'+nuevoIndex).html($("#showDetails").html()).slideToggle('slow').slideToggle('slow');
							}
							
						}else if($("#divPopUp").children().length < 4){
							console.log("no tieen muchos hijos, menos de 4");
							var nuevoDiv2 = "<div id='detalle' class='col-md-12 div-detalle'>Holi</div>";
							if($("#divPopUp").find('#detalle').length <= 0){
								console.log('aun no tiene el div nuevo' );
								$(nuevoDiv2).hide().insertAfter($('#divPopUp > div.product:last-child')).html($('#showDetails').html()).slideToggle('slow');

							}else{
								console.log('ya tiene el div nuevo' );
								$('#detalle').html($('#showDetails').html()).slideToggle('slow').slideToggle('slow');
							}
							
							
						}
					});*/
					$("#productInfoH2").text($("#myModal").find("h1.product_title").text());

			   }
			});
			
			
			
		});

	



<?
	}
	if(is_product()){
?>
		//$("#principal").css("top","0px");
console.log("hoooooooooooooliii");
		$("#productInfoImg").find("div.images > a > img").each(function(){
			$(this).removeAttr("width");
			$(this).removeAttr("height");
			$(this).css("width","100%");
		});
<?  } ?>
$('#myModal').on('hidden.bs.modal', function () {
    		//$('div#tallas').empty();
    		//$('div#colores').empty();
    		clearModal();
		});

<?
	if(is_product_category() || is_shop()){
		wp_enqueue_script('prettyPhoto');
		wp_enqueue_script('prettyPhoto-init');
?>

		console.log("es category o tienda");
		$("div.product").addClass("col-lg-3 col-md-4 col-sm-6 col-xs-12");
		$("ul.products").addClass("row");
		$(".children").css('display','none');
		$("li.cat-item").each(function(){
				if($(this).parents("ul.children").length == 0){
					if(!$(this).hasClass("cat-parent")){
						$(this).addClass("cat-parent");
					}
				}
		});

		
		$("<span class='flecha' ></span>").insertAfter(".cat-parent > a");
		$(".cat-parent > span").click(function(event){
			$span = $(this);
			var $yaActivo = $(this).hasClass("activo");
			$(".cat-parent > span").each(function(){
				if($(this).hasClass("activo")){
					$(this).parent().children(":nth-child(3)").hide("slow");
					$(this).removeClass("activo");
					
				}
			});

			if(!$yaActivo){
				$(this).addClass("activo");
				$(this).parent().children(":nth-child(3)").show("slow");
			}

		
		});

		var ancho = $("#menuLateral").width();
		console.log(ancho);
		$("#contenedorMenu").css('left',(ancho+20)*-1);
		ancho = (ancho+20)*-1;
		var izq = $("#contenedorMenu").offset().left;
		console.log(izq);
		

		$("#imgCatalogo").click(function(){
			izq = $("#contenedorMenu").offset().left;
			console.log("Despues de clic: "+izq);
			if(izq < 0){
				console.log("Es menor a 0, esta oculto");
				$("#contenedorMenu").animate({left: "0"},700);
			}else{
				console.log("Es mayor a 0, se esta mostrando");
				$("#contenedorMenu").animate({left: ""+ancho+""},500);
			}
			
			
		});


		$("#agregar > a").click(function(e){
			console.log("Presiono el de añadir al carro");
			e.preventDefault();
			$("#myModal").find("button.single_add_to_cart_button").click();
			console.log("se encontro el boton");
			
		});
<?
	}else if(is_product()){
	?>	
		console.log("estas viendo un producto");
	<?		
		}


	?>
	

/*$("#i-cerrarDetalles").click(function(){
	/*$("div.div-detalle").slideToggle("slow").remove();
	$("div#opaco").hide('slow');
	$("div.loopDeContentProduct").parent().css("zIndex", "0");
	$("#myModal").hide();
});*/



$("div#cantidad > input").change(function(){
	$("#myModal").find("div.quantity > input").val($(this).val()).change();
	console.log("Cambio el valor: "+$(this).val());
});

$("div.loopDeContentProduct > a > img").each(function(){
	$(this).removeAttr("width");
	$(this).removeAttr("height");
});




	
	/*$("#noe li div a").removeAttr('href');*/

	

	
	/*var $scrollingDiv = $("#menuLateral");
	$(window).scroll(function(){            
    var y = $(this).scrollTop(),
        maxY = $('#footer').offset().top,
        scrollHeight = $scrollingDiv.height();
    if(y< maxY-scrollHeight ){
        $scrollingDiv
        .stop()
        .animate({"marginTop": ($(window).scrollTop()) + "px"}, "slow" );        
    }    
});*/
</script>

<?php get_footer(); ?>
<script>
	leerScripts();
</script>