<?

$arreglo = array();

function addArreglo($item){
	global $arreglo;
	$arreglo[] = $item;
	?>
		<script>
			console.log("añadido: "+"<?=$item ?>");
		</script>
		<?
}

function getArreglo(){
	global $arreglo;
	return $arreglo;
}

function showArreglo(){
	global $arreglo;
	foreach ($arreglo as $key) {
		# code...
		?>
		<script>
			console.log("mostrando: "+"<?=$key ?>");
		</script>
		<?
	}
}

function createTalla(){
	global $arreglo;
	foreach ($arreglo as $key) {
		# code...
		?>

		<div class='circle circle-talla' style='float: left;';'><span style='text-align: center;'><?=$key ?></span></div>
		<?
	}
	unset($GLOBALS['arreglo']);
	//$arreglo = array();
	

}

function clearArreglo(){
	global $arreglo;
	unset($arreglo);
	$arreglo = array();
}

function addBack2Shop(){
	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	echo("<script>console.log('".$shop_page_url."')</script>");
	?>

		<script>
		var ruta = "";
		console.log(""+ruta);
		var elem = "<a class='button alt wc-backward continuarComprando' href='<?=$shop_page_url?>'>Continuar comprando</a>";
		$("div.wc-proceed-to-checkout").prepend(elem);
		</script>

	<?
}


?>