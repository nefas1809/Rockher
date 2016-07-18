<?

function sanitize($str, $quotes = ENT_NOQUOTES){
   $str = htmlspecialchars($str, $quotes);
   return $str;
}
 
$method = $_POST;
 
//Sanitize the json received from the client-side
//Keys correspond to 'data:{ js_string: val , js_array: arr,  js_object: obj }' in $.ajax

if(isset($method['array']))  $json_array = sanitize($method['array']);


	$tag = $_POST['tag'];
	echo $tag;
	echo "<script>console.log('whcuiwheuichiwuec')</script>";
	if(isset($tag) && $tag !== ''){
		echo "<script>console.log('whcuiwheuichiwuec')</script>";
	}else{
		echo "<script>('whcuiwheuichiwuecNO')</script>";
	}


	//Decode the json to get workable PHP variables
$php_array = json_decode($json_array);
$php_object = json_decode($json_object);
 
//Alter values
$php_array[0] = "Altered in the PHP script";
$php_object->first = "Altered in the PHP script";






?>

