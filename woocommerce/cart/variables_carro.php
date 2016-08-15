<?

$arreglo = array();
$arregloProductos = array();

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
			//console.log("mostrando: "+"<?=$key ?>");
		</script>
		<?
	}
}

function createTalla($talla){
	/*global $arreglo;
	foreach ($arreglo as $key) {
		# code...*/
		$tallaC = $talla;
		?>

		<div class='circle circle-talla' style='float: left;';'><span style='text-align: center;'><?=$tallaC ?></span></div>
		<?
	/*}
	unset($GLOBALS['arreglo']);
	//$arreglo = array();*/
	

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

function addNewId($newId){

}

function if_exists($productId){
	global $arregloProductos;
	if(count($arregloProductos) > 0){
		if(!in_array($productId, $arregloProductos)){
			$arregloProductos[] = $productId;
			return true;
		}else{
			//echo "<script>console.log('Ya existe en el arreglo');</script>";
			return false;
		}
	}else{
		$arregloProductos[] = $productId;
		return true;
	}
		
	

}

function showArrayIDS(){
	global $arregloProductos;
	foreach ($arregloProductos as $key) {
		//echo "<script>console.log('SHOWARRAYIDS: '+'$key')</script>";
	}
}

function addToSameRow($productId){
?>
	<script>
		var elem = "#"+$productId;
		$(elem)
		
	</script>


<?
}


?>