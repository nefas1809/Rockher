
console.log("VAMO A DARLE");
<?php 

	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
?>

console.log("URL: "+<?php=shop_page_url ?>);
var elem = "<a class='button alt wc-backward' href='<?php echo get_permalink( wc_get_page_id( "+'shop'+" ) ); ?>'>Continuar comprando</a>"
$("div.wc-proceed-to-checkout").append(elem);

