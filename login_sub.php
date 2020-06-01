<?php require_once('config.php');

$Username = $_POST['Username'];
$password = md5($_POST['password']);

$login_query = "SELECT `username`, `password`, `date_of_login`, `no_of_attempts` FROM `users` WHERE `username`= '".$Username."' AND  `password` = '".$password."'";
$res = mysqli_query($conn,$login_query);
if(mysqli_num_rows($res)>0){
	echo "success";

}
else{
	//echo "failed";
	$date = date('Y-m-d');
	

	$select_attempt_count = "SELECT `id`, `username`, `password`, `date_of_login`, `no_of_attempts` FROM `users` WHERE `username`='".$Username."'";
	
	$result = mysqli_query($conn,$select_attempt_count);

	$getData = mysqli_fetch_assoc($result);

	//echo $getData['no_of_attempts'];

	if($getData['no_of_attempts'] == 0 ){
		$first_attempts = 1;
		$insert_first_attempt = "UPDATE `users` SET `date_of_login`='".$date."',`no_of_attempts`='".$first_attempts."' WHERE username = '".$Username."'";
		$result =mysqli_query($conn,$insert_first_attempt); 
		echo "first_attempt";


	}
	else if($getData['no_of_attempts'] == 1){
		$second_attempts = 2;
		$insert_sec_attempt = "UPDATE `users` SET `date_of_login`='".$date."',`no_of_attempts`='".$second_attempts."' WHERE username = '".$Username."'";
		$result =mysqli_query($conn,$insert_sec_attempt); 
		echo "second_attempt";


	}
	else if ($getData['no_of_attempts'] == 2) {
		$third_attempts = 3;
		$insert_third_attempt = "UPDATE `users` SET `date_of_login`='".$date."',`no_of_attempts`='".$third_attempts."' WHERE username = '".$Username."'";
		$result =mysqli_query($conn,$insert_third_attempt); 
		echo "third_attempt";

		
	}
	else if($getData['no_of_attempts'] == 3){

		$block_user = "SELECT `date_of_login`, `no_of_attempts` FROM `users` WHERE `username`='".$Username."' AND `date_of_login`= '".$date."'";
	
	$resultData = mysqli_query($conn,$block_user);
	if(mysqli_num_rows($resultData) > 0){
		$getBlockData = mysqli_fetch_assoc($resultData);

		
		
		echo "Final_Attempt";



	}else{
		echo "UnblockMe";
	}


	

	}
	
}



?>