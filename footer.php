		<footer>
			<div class="footer" id="footer">
				<div class="container">
					<div id="secciones" class="col-sm-6 col-xs-12 col-md-3">
						<span class="footer_title">Secciones</span>
						<ul id="menu_footer">
							<?php wp_list_pages(array('title_li' => '')); ?>
						</ul>
					</div>
					<div id="perfil" class="col-sm-6 col-xs-12 col-md-3">
						<span class="footer_title">Mi cuenta</span>
					</div>
					<div id="redes" class="col-sm-6 col-xs-12 col-md-3">
						<div><span class="footer_title">Encuéntranos</span>
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
		</footer>	
	</div><!--div padre-->
	
	<?php wp_footer(); ?>
	
  </body>
</html>