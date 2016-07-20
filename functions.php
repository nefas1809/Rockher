<?php 


/*function wc_dropdown_variation_attribute_options( $args = array() ) {
		$args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected' 	       => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'show_option_none' => __( 'Elige una opción', 'woocommerce' )
		) );

		$options   = $args['options'];
		$product   = $args['product'];
		$attribute = $args['attribute'];
		$name      = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
		$id        = $args['id'] ? $args['id'] : sanitize_title( $attribute );
		$class     = $args['class'];

		if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
			$attributes = $product->get_variation_attributes();
			$options    = $attributes[ $attribute ];
		}

		$html = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '">';
		$nuevoHtml;

		if ( $args['show_option_none'] ) {
			$html .= '<option value="">' . esc_html( $args['show_option_none'] ) . '</option>';
		}

		if ( ! empty( $options ) ) {
			if ( $product && taxonomy_exists( $attribute ) ) {
				// Get terms if this is a taxonomy - ordered. We need the names too.
				$terms = wc_get_product_terms( $product->id, $attribute, array( 'fields' => 'all' ) );

				foreach ( $terms as $term ) {
					if ( in_array( $term->slug, $options ) ) {
						$html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
						$nuevoHtml .= "<div class='modificadoNOE'><span id=".esc_attr( $option ).">".$term->name."</span></div>";
					}
				}
			} else {
				foreach ( $options as $option ) {
					// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
					$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
					$html .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
					$nuevoHtml .= "<div class='modificadoNOE'><span id=".esc_attr( $option ).">".esc_attr( $option )."</span></div>";
				}
			}
		}

		$html .= '</select>';

		echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html.$nuevoHtml, $args );
	}*/

/*function conditionally_load_woc_js_css(){
if( function_exists( 'is_woocommerce' ) ){
        # Only load CSS and JS on Woocommerce pages   
	if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) { 		
		
		## Dequeue scripts.
		wp_dequeue_script('woocommerce'); 
		wp_dequeue_script('wc-add-to-cart'); 
		wp_dequeue_script('wc-cart-fragments');
		wp_dequeue_script('wc-add-to-cart-variation');
		
		## Dequeue styles.	
		wp_dequeue_style('woocommerce-general'); 
		wp_dequeue_style('woocommerce-layout'); 
		wp_dequeue_style('woocommerce-smallscreen'); 
			
		}
	}else{
		echo "<script>console.log('no es');</script>";
	}	
}*/

add_theme_support( 'nav-menus' );
register_nav_menus(array('menu' => __('menu')));


function wpbootstrap_scripts_with_jquery()
{

	wp_enqueue_style('estiloAdmin',get_stylesheet_uri());
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




?>