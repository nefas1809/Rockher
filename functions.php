<?php 


add_theme_support( 'nav-menus' );
register_nav_menus(array('menu' => __('menu')));


function wpbootstrap_scripts_with_jquery()
{
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_register_style('bootstrap_resp', get_template_directory_uri() . '/css/bootstrap-responsive.css' );
	wp_register_style('estiloAdmin', get_template_directory_uri() . '/css/estiloAdmin.css' );
	wp_register_style("estilos", get_template_directory_uri() . '/css/estilos.css' );
	wp_register_style("estiloTienda", get_template_directory_uri() . '/css/estiloTienda.css' );
	wp_register_style("estiloCarrito", get_template_directory_uri() . '/css/estiloCarrito.css' );
	wp_register_style("contactoResponsive", get_template_directory_uri() . '/css/contacto.responsive.css' );
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('bootstrap_resp');
	wp_enqueue_style('estilos');
	wp_enqueue_style('estiloTienda');
	wp_enqueue_style('estiloCarrito');
	wp_enqueue_style('contactoResponsive');
	// Register the script like this for a theme:
	wp_register_script( 'jqueryScript', get_template_directory_uri() . '/js/jquery-3.0.0.js', array( 'jquery' ) );
	wp_register_script( 'custom-script', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );
	
	wp_register_script('scriptTallas',get_template_directory_uri().'/js/eventosTallas.js', array( 'jquery' ));
	
	

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'jqueryScript' );
	wp_enqueue_script( 'custom-script' );
	
	
	wp_enqueue_script('scriptTallas' );
	//wp_deregister_script("jquery" );
	//wp_dequeue_script( 'jquery' );
	/*wp_enqueue_script('add-to-cart-variation', plugins_url( 'woocommerce/assests/js/frontend/add-to-cart-variation.min.js', __FILE__ ), array( 'jquery'), false, true );*/
	//echo(plugins_url());


/*if( function_exists( 'is_woocommerce' ) ){
        # Only load CSS and JS on Woocommerce pages   
	if(is_product_category()) { 		
		
		## Dequeue scripts.
		wp_dequeue_script("jqueryScript" );
		wp_dequeue_script("custom-script" );
			
		}
	}	*/

}






add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function my_custom_admin_styles() {
   ?>
        <style type="text/css">
          #wpwrap {
               background-color:#000;
           }
         </style>
    <?php
}

function my_custom_admin_js(){
	?>
		<script>
			jQuery(document).ajaxSuccess(function(){
				console.log("ha cambiado");
				jQuery("input#color.short").addClass("jscolor");
			});
		</script>

	<?php
}
add_action('admin_head', 'my_custom_admin_js');
/*add_action('admin_head', 'my_custom_admin_styles');*/

add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
 
function child_manage_woocommerce_styles() {
 //remove generator meta tag
 remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
 
 //first check that woo exists to prevent fatal errors
 if ( function_exists( 'is_woocommerce' ) ) {
 //dequeue scripts and styles
 if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
 wp_dequeue_style( 'woocommerce_frontend_styles' );
 wp_dequeue_style( 'woocommerce_fancybox_styles' );
 wp_dequeue_style( 'woocommerce_chosen_styles' );
 wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
 wp_dequeue_script( 'wc_price_slider' );
 wp_dequeue_script( 'wc-single-product' );
 wp_dequeue_script( 'wc-add-to-cart' );
 wp_dequeue_script( 'wc-cart-fragments' );
 wp_dequeue_script( 'wc-checkout' );
 wp_dequeue_script( 'wc-add-to-cart-variation' );
 wp_dequeue_script( 'wc-single-product' );
 wp_dequeue_script( 'wc-cart' );
 wp_dequeue_script( 'wc-chosen' );
 wp_dequeue_script( 'woocommerce' );
 wp_dequeue_script( 'prettyPhoto' );
 wp_dequeue_script( 'prettyPhoto-init' );
 wp_dequeue_script( 'jquery-blockui' );
 wp_dequeue_script( 'jquery-placeholder' );
 wp_dequeue_script( 'fancybox' );
 wp_dequeue_script( 'jqueryui' );
 }
 }
 
}





// Add Variation Settings
//add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
// Save Variation Settings
//add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );

function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Text Field
	woocommerce_wp_text_input( 
		array( 
			'id'          => 'color', 
			'label'       => __( 'My Text Field', 'woocommerce' ), 
			'placeholder' => 'http://',
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_text_field', true)
		)
	);
	// Number Field
	/*woocommerce_wp_text_input( 
		array( 
			'id'          => '_number_field[' . $variation->ID . ']', 
			'label'       => __( 'My Number Field', 'woocommerce' ), 
			'desc_tip'    => 'true',
			'description' => __( 'Enter the custom number here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_number_field', true ),
			'custom_attributes' => array(
							'step' 	=> 'any',
							'min'	=> '0'
						) 
		)
	);
	// Textarea
	woocommerce_wp_textarea_input( 
		array( 
			'id'          => '_textarea[' . $variation->ID . ']', 
			'label'       => __( 'My Textarea', 'woocommerce' ), 
			'placeholder' => '', 
			'description' => __( 'Enter the custom value here.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_textarea', true ),
		)
	);
	// Select
	woocommerce_wp_select( 
	array( 
		'id'          => '_select[' . $variation->ID . ']', 
		'label'       => __( 'My Select Field', 'woocommerce' ), 
		'description' => __( 'Choose a value.', 'woocommerce' ),
		'value'       => get_post_meta( $variation->ID, '_select', true ),
		'options' => array(
			'one'   => __( 'Option 1', 'woocommerce' ),
			'two'   => __( 'Option 2', 'woocommerce' ),
			'three' => __( 'Option 3', 'woocommerce' )
			)
		)
	);
	// Checkbox
	woocommerce_wp_checkbox( 
	array( 
		'id'            => '_checkbox[' . $variation->ID . ']', 
		'label'         => __('My Checkbox Field', 'woocommerce' ), 
		'description'   => __( 'Check me!', 'woocommerce' ),
		'value'         => get_post_meta( $variation->ID, '_checkbox', true ), 
		)
	);
	// Hidden field
	woocommerce_wp_hidden_input(
	array( 
		'id'    => '_hidden_field[' . $variation->ID . ']', 
		'value' => 'hidden_value'
		)
	);*/
}
/**
 * Save new fields for variations
 *
*/
function save_variation_settings_fields( $post_id ) {
	// Text Field
	$text_field = $_POST['_text_field'][ $post_id ];
	if( ! empty( $text_field ) ) {
		update_post_meta( $post_id, '_text_field', esc_attr( $text_field ) );
	}
	
	/*// Number Field
	$number_field = $_POST['_number_field'][ $post_id ];
	if( ! empty( $number_field ) ) {
		update_post_meta( $post_id, '_number_field', esc_attr( $number_field ) );
	}
	// Textarea
	$textarea = $_POST['_textarea'][ $post_id ];
	if( ! empty( $textarea ) ) {
		update_post_meta( $post_id, '_textarea', esc_attr( $textarea ) );
	}
	
	// Select
	$select = $_POST['_select'][ $post_id ];
	if( ! empty( $select ) ) {
		update_post_meta( $post_id, '_select', esc_attr( $select ) );
	}
	
	// Checkbox
	$checkbox = isset( $_POST['_checkbox'][ $post_id ] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_checkbox', $checkbox );
	
	// Hidden field
	$hidden = $_POST['_hidden_field'][ $post_id ];
	if( ! empty( $hidden ) ) {
		update_post_meta( $post_id, '_hidden_field', esc_attr( $hidden ) );
	}*/
	}
//add_action("woocommerce_init","removeJQueryOthers");

function removeJQueryOthers(){
	if(is_product()){
		//wp_deregister_script("jqueryScript" );
		echo "<script>console.log('ESTAMOS EN LA PAGINA DE DETALLE DEL PRODUCTO')</script>";
		//remove_action( 'wp_head',array($woocommerce, 'generator' ));
		wp_dequeue_style('estiloAdmin',get_stylesheet_uri());
	// Register the script like this for a theme:
	//wp_register_script( 'jqueryScript', get_template_directory_uri() . '/js/jquery-3.0.0.js', array( 'jquery' ) );
	//wp_register_script( 'custom-script', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ) );
	
	//wp_register_script('scriptTallas',get_template_directory_uri().'/js/eventosTallas.js', array( 'jquery' ));
	
	

	// For either a plugin or a theme, you can then enqueue the script:
	wp_dequeue_script( 'jqueryScript' );
	wp_dequeue_script( 'custom-script' );
	
	
	//wp_dequeue_script('scriptTallas' );

	}
}

add_filter('gettext', 'translate_reply');
add_filter('ngettext', 'translate_reply');

function translate_reply($translated) {
$translated = str_ireplace('Price', 'Precio unitario', $translated);
return $translated;
}



//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Ajustes globales', 'Ajustes globales', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Configuraciones editables</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>
	<h3>Campos para el footer (encuéntranos):</h3>
	

	<p><strong>Dirección y teléfonos:</strong><br />
	<textarea name="encuentranos-direccion" cols="100%" rows="7"><?php echo get_option('encuentranos-direccion'); ?></textarea></p>
	<p><strong>Dirección de Twitter:</strong><br />
	<input type="text" name="twit-dir" size="45" value="<?php echo get_option('twit-dir'); ?>" /></p>
	<p><strong>Dirección de Facebook:</strong><br />
	<input type="text" name="face-dir" size="45" value="<?php echo get_option('face-dir'); ?>" /></p>
	<p><strong>Dirección de Instagram:</strong><br />
	<input type="text" name="insta-dir" size="45" value="<?php echo get_option('insta-dir'); ?>" /></p>
	<p><strong>Dirección de Snapchat:</strong><br />
	<input type="text" name="snap-dir" size="45" value="<?php echo get_option('snap-dir'); ?>" /></p><br />
	<div style="width:100%; border-bottom:5px dashed gray; margin:50px 0px;"></div>
	<h3>Campos para formulario de contacto:</h3>
	<p><strong>Dirección 1:</strong><br />
	<textarea name="contacto-dir1" cols="100%" rows="7"><?php echo get_option('contacto-dir1'); ?></textarea></p>
	<p><strong>Dirección 2:</strong><br />
	<textarea name="contacto-dir2" cols="100%" rows="7"><?php echo get_option('contacto-dir2'); ?></textarea></p>
	<p><strong>Dirección 3:</strong><br />
	<textarea name="contacto-dir3" cols="100%" rows="7"><?php echo get_option('contacto-dir3'); ?></textarea></p>

	<h4>Llámanos</h4>
	<p><strong>Horario:</strong><br />
	<input type="text" name="horario" size="45" value="<?php echo get_option('horario'); ?>" /></p>
	<p><strong>Teléfono:</strong>
	<p style="font-weight:bold; color:red;">**El número de telefono debe tener el siguiente formato: <span style="color:#52ACCC;">Tel: &lt;span&gt;Aquí el número de télefono&lt;/span&gt;</span><br/>
	<span style="color:#4f4f4f;">Puedes copiar y pegar la parte en color azul y colocar tu número teléfonico.</span>
	</p>
	<input type="text" name="telefono" size="45" value="<?php echo get_option('telefono'); ?>" /></p>
	<br/>
	<h4>Chat y términos</h4>
	<p><strong>Chat:</strong>
	<p style="font-weight:bold; color:red;">**La palabra resaltada debe ir dentro de la etiqueta: <span style="color:#52ACCC;">&lt;span id="chatVivo"&gt;Aquí la palabra resaltada&lt;/span&gt;</span></p>
	<textarea name="chat" cols="100%" rows="7"><?php echo get_option('chat'); ?></textarea></p>
	<p><strong>Términos y condiciones:</strong><br />
	<textarea name="terminos" cols="100%" rows="7"><?php echo get_option('terminos'); ?></textarea></p>
	<p><input type="submit" name="Submit" value="Guardar cambios" class="button button-primary" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="twit-dir,face-dir,insta-dir,snap-dir,encuentranos-direccion, contacto-dir1, contacto-dir2, contacto-dir3, horario, telefono, chat, terminos" />

	</form>
	</div>
	<?php
}

// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( 'Confirmar contraseña', 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}





function wpb_woo_my_account_order() {
	$myorder = array(
		'dashboard'       => __( 'Mi cuenta', 'woocommerce' ),
		'orders'          => __( 'Mis pedidos', 'woocommerce' ),
		'edit-address'    => __( 'Direcciones', 'woocommerce' ),
		'payment-methods' => __( 'Metodos de pago', 'woocommerce' ),
		'edit-account'    => __( 'Detalles de mi cuenta', 'woocommerce' ),
		'customer-logout' => __( 'Logout', 'woocommerce' ),
	);
	return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );

function wpb_woo_endpoint_title( $title, $id ) {
	if ( is_wc_endpoint_url( 'dashboard' ) && in_the_loop() ) { // add your endpoint urls
		$title = "Mi cuenta"; // change your entry-title
	}
	elseif ( is_wc_endpoint_url( 'orders' ) && in_the_loop() ) {
		$title = "Mis pedidos";
	}
	elseif ( is_wc_endpoint_url( 'edit-address' ) && in_the_loop() ) {
		$title = "Direcciones";
	}
	elseif ( is_wc_endpoint_url( 'payment-methods' ) && in_the_loop() ) {
		$title = "Motodos de pago";
	}
	return $title;
}
add_filter( 'the_title', 'wpb_woo_endpoint_title', 10, 2 );







?>