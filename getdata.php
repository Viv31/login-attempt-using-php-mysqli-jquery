<?php
require_once('config.php');

$Username = $_POST['Username'];
//$password = md5($_POST['password']);
$GetAll_Data = "SELECT * FROM users WHERE username ='".$Username."' ";
$res = mysqli_query($conn,$GetAll_Data);
if(mysqli_num_rows($res) > 0){
	$Data = mysqli_fetch_array($res);
	echo $Data['date_of_login'];
	/*echo $Data['id'];
	echo $Data['no_of_attempts'];*/

}
?>