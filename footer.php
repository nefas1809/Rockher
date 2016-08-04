		<footer>
			<div class="footer" id="footer">
				<div class="row" id="footerDiv">
					<div id="secciones" class="col-sm-6 col-xs-12 col-md-3">
						<div>
						<span class="footer_title">Secciones</span>
						<ul id="menu_footer">
							<?php wp_list_pages(array('title_li' => '')); ?>
						</ul>
						</div>
					</div>
					<div id="perfil" class="col-sm-6 col-xs-12 col-md-3">
						<div>
							<span class="footer_title">Mi cuenta</span>
							<? echo get_option('encuentranos-direccion') ?>
						</div>
					</div>
					<div id="redes" class="col-sm-6 col-xs-12 col-md-3">
						<div>
							<span class="footer_title">Encuéntranos</span>
							<!--<p>Obregón #357, entre Mariano Jiménez y Juan Díaz Covarrubias. Col. San Juan de Dios. Guadalajara Jalisco</p>
							<br>
							<p>(33) 3654 1219</p>
							<p>hola@rockher.mx</p>-->
							<? echo get_option('encuentranos-direccion') ?>
							<div id="iconos_redes">
								<div><a href="<? echo get_option('twit-dir')?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/iconoTwitter.png" alt="" class="social"></div></a>
								<div><a href="<? echo get_option('face-dir')?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/iconoFacebook.png" alt="" class="social"></div></a>
								<div><a href="<? echo get_option('insta-dir')?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/iconoInstagram.png" alt="" class="social"></div></a>
								<div><a href="<? echo get_option('snap-dir')?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/iconoSnapchat.png" alt="" class="social"></div></a>
							</div>
						</div>
					</div>
					<div id="contacto_rap" class="col-sm-6 col-xs-12 col-md-3">
						<div>
							<span class="footer_title">Contacto rápido</span>
							<form action="#">
								<div id="contenidoForm">
									<input type="text" name="txtNom" placeholder="Nombre">
									<br>
									<textarea name="coment" placeholder="Comentario"></textarea>
									<br>
									<div id="enviarRapido">
										<button>
											<img src="<?php bloginfo('template_url'); ?>/img/enviarContactoRapido.jpg" alt="Enviar">
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script>
			var seccionesAltoOrig = $("#secciones > div").height();
			var perfilAltoOrig = $("#perfil > div").height();
			var redesAltoOrig = $("#redes > div").height();
			var contactoAltoOrig = $("#contacto_rap > div").height();

		if($(window).width() > 767){
			resizeFooter();
		}
		$(window).resize(function(){
			if($(window).width() > 767){
				resizeFooter();
			}else{
				resetHeight();
			}
		});



		function resizeFooter(){
			var seccionesAlto = $("#secciones > div").height();
			var perfilAlto = $("#perfil > div").height();
			var redesAlto = $("#redes > div").height();
			var contactoAlto = $("#contacto_rap > div").height();
			var mayor = Math.max(seccionesAlto, perfilAlto, redesAlto, contactoAlto);
			$("#secciones > div, #perfil > div, #redes > div, #contacto_rap > div").css("height",mayor);
		}

		function resetHeight(){
			$("#secciones > div").css("height",seccionesAltoOrig);
			$("#perfil > div").css("height",perfilAltoOrig);
			$("#redes > div").css("height",redesAltoOrig);
			$("#contacto_rap > div").css("height",contactoAltoOrig);
		}

			
		</script>	
	</div><!--div padre-->
	
	<?php wp_footer(); ?>
	
  </body>
</html>