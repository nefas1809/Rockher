<?
/*
Template Name: Estilos de prenda
*/
 get_header(); 
$imagenes = [];
 ?>
<script>
	var nombre = "noe0";
	var arrayImg = {};
	var arrayContenidos={};
	var temp = [];
</script>
<h1 class="page-title">Estilo de prenda</h1>
<div class="row">
	<?
		global $more;
		$more = 1;
		$query = new WP_Query(array('category' => 'estilo-de-prenda','orderby' => 'date', 'order' => 'ASC'));
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
	<div class="col-lg-3 col-md-4 col-sm-6 entrada-estilo">
		<div class="img-entry" id="<? echo ($post->ID);?>">
			<script>
				temp =[];
			</script>
			<? 
				$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
				if(get_post_gallery()){
					global $imagenes;
					$temps = [];
					$galeria = get_post_gallery(get_the_ID(), false);
					foreach($galeria['src'] as $src):
						$temps[] = $src;
					?>
					<script>
						temp.push('<?=$src ?>');
					</script>
					<?
					endforeach;
					//ob_start();
					$content =get_the_content();
					//$content2 = ob_get_contents();
					//ob_end_clean();
					?>
					<script>
						arrayImg[<?=$post->ID ?>] = temp;
						var contenido = <?=json_encode($content); ?>;
						console.log("CONTENIDO POST: "+contenido);
						arrayContenidos[<?=$post->ID ?>] = contenido;
						console.log("TEMP : "+temp[0]);
						console.log("IMG : "+arrayImg[<?=$post->ID ?>][0]);
					</script>
				<?
					$imagenes['$post->ID'] = [$temps];
					
				} 
				?>
			<!--<a href="<? the_permalink(); ?>">--><img src="<?=$url ?>" alt=""><!--</a>-->
				<!--the_post_thumbnail($post->ID, array(100,100)); ?>-->
			<div class="img-title abreu normal22">
				<span><? the_title(); ?></span>
				<span class="detail futura">Ver Detalle</span>
			</div>
		</div>
		<div class="img-titulo">
			
		</div>
	</div>
	

    <?php endwhile; else: ?>
      <p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal3">
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
        	<div id="prendaInfoEstilo" class="col-lg-4 col-sm-12">
        			<h3 id="prendaInfoEstiloH2" class="abreu"></h3>

        			<!--<img src="<? bloginfo('template_directory'); ?>/img/4.png" alt="">-->
        			<div id="descPrenda" class="col-md-12">
        				
        			</div>
        		</div>
        		<div id="estiloImagenes" class="col-lg-5 col-sm-12">
        		<!--class="col-md-5 col-sm-6 col-xs-6"el de abajo--> 
        		<div id="divImgPrinc" class="col-md-8 col-sm-6 col-xs-6"><img src="" alt="" id="imgPrincipal"></div>
        		<div id="galeria" class="col-md-2 col-sm-2 col-xs-2">
        			
        		</div>
        		</div>
        	</div>
        </div>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
	$(document).ready(function(){
		console.log("NOMBRE: "+nombre);
		$(".img-entry").find("img").removeAttr("height");

		$(".img-entry").hover(function(){
			var id = $(this).attr("id");
			if(id in arrayImg){
				var elem = $(this).find("img");
				elem.fadeOut('fast', function () {
	        		elem.attr('src', arrayImg[id][1]);
	        		elem.fadeIn('fast');
	    		});
			}
			$(this).find(".img-title").addClass("upDetail");
			$(this).find(".detail").addClass("showDetail");
			
		}, function(){
			var id = $(this).attr("id");
			if(id in arrayImg){
				var elem = $(this).find("img");
				elem.fadeOut('fast', function () {
	        		elem.attr('src', arrayImg[id][0]);
	        		elem.fadeIn('fast');
	    		});
			}
			$(this).find(".img-title").removeClass("upDetail");
			$(this).find(".detail").removeClass("showDetail");
			
		});

		$(".img-entry").click(function(){
			createGallery(this.id);
			var title ="Modelo: "+ $(this).find("div.img-title > span:first").text();
			console.log("EL TITLE: "+title);
			$("#prendaInfoEstiloH2").text(title);
			var idPost = $(this).attr("id");
			getContent(idPost);
			console.log("ID: "+idPost);
			/*$.ajax({
				data:{'idPost': idPost},
				type: 'post',
				success: function(result){
					console.log("EL RESULT: "+result);
					$("#estilos").text(result);
				}
			});*/
			showPopUp();
		});
		function showPopUp(){
			$("#myModal3").css("display","flex").modal("show");
		}

		

		function createGallery(idPrenda){
			$("#imgPrincipal").attr("src",arrayImg[idPrenda][0]);
			$("#galeria").html("");
			for (var i = 0; i < arrayImg[idPrenda].length; i++) {
				$newImg = "<div class='img_gal'><img src="+arrayImg[idPrenda][i]+"></div>";
				$("#galeria").append($newImg);
			}
		}

		function getContent(idPrenda){
			$("#descPrenda").html(arrayContenidos[idPrenda]);
			$("#descPrenda").find(".more-link").remove();
		}

		$("#galeria").click(function(evt){
			var child = $(evt.target);
			if(child.hasClass("img_gal") | child.is("img")){
				var src = child.attr("src");
				$("#imgPrincipal").attr("src",src);
			}else{
				console.log("no");
			}
			
		});
		
	});

	
</script>



 <?php 

 	get_footer(); 
 	function getPostContent($id){
 		$cont = get_post_field('post_content', $id);
 		return $cont;
 	}
?>