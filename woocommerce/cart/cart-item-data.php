<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once 'variables_carro.php';
global $color;
?>
<dl class="variation">
	<?php foreach ( $item_data as $data ) : ?>
		<!--<script>
			console.log("hola desde cart: "+'<? echo wp_kses_post( $data['key'] ); ?>');
		</script>-->
		<? if(strpos(wp_kses_post( $data['key'] ),'Tallas') === false){ 
				ob_start();
				echo wp_kses_post($data['key']);
				$stringD = ob_get_contents();
				ob_end_clean();
				
				if($stringD == "Colores"){
					echo "<script>console.log('Elemento key: '+'$stringD');</script>";
					ob_start();
					echo wp_kses_post($data['display']);
					$color = ob_get_contents();
					ob_end_clean();
					echo "<script>console.log('Color del elemento: '+'$color');</script>";

				}
		?>
			<!--añadido para ver color-->
			<dt class="variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</dt>
			<dd class="variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( wpautop( $data['display'] ) ); ?></dd>
				
		<? }else{
			//global $arrayTallas;
				ob_start();
				echo wp_kses_post($data['display']);
				$stringD = ob_get_contents();
				ob_end_clean();
				global $talla;
				$talla = $stringD;

				
				//createTalla($stringD);
				//addArreglo($stringD);
			}
		?>
		
	<?php endforeach;?>

</dl>
