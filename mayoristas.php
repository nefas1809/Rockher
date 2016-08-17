<?
global $current_user, $wpdb;
$role = $wpdb->prefix . 'capabilities';
$current_user->role = array_keys($current_user->$role);
$role = $current_user->role[0];
if(current_user_can("mayoristas" )){
?>
	console.log('es un mayorista');


<?
}
//echo ("<script>console.log('Vaamos a verl el rol del usuario actual: '+'$role');</script>");

?>
