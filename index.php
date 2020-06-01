<?php include_once('header.php'); ?>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4" id="form_box">
					<h1 class="text-primary text-center">Login</h1>
					<div class="form-group">
						<label>Username:</label>
						<input type="email" name="Username" id="Username" class="form-control" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label>Password:</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
					</div>
					<div class="" id = "date_id"></div>
					<div id="response_data"></div>
					<div id="attempt_count"></div>
					<?php
					echo $resdate = '<script> $("#response_data").val();</script>'; 
					echo $TodaysDate = "<script>var today = new Date();           
								var TodaysDate = today.getFullYear()+ '-0' +(today.getMonth() + 1)+ '-' +today.getDate();</script>";
					if($resdate == $TodaysDate){
						echo '<button class="btn btn-primary btn-block" id="login" style="disabled">Login</button>';
					}
					else{
						echo'<button class="btn btn-primary btn-block" id="login">Login</button>';
					}
					?>
					
					<div id="timer"></div><br>


				</div>
				<div class="col-md-4"></div>
			</div>
<?php include_once('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		//CheckTime();
		$(document).on("click","#login",function(){
			var Username = $("#Username").val();
			var password = $("#password").val();

			var data = {
				"Username":Username,
				"password":password
			}

			$.ajax({
				type:'POST',
				url:'login_sub.php',
				data:data,
				success:function(res){
					if(res == "success"){
						window.location.href = "dashboard.php";
					}
					if(res == "failed"){
						alert("Failed");

					}
					if(res=="first_attempt"){
						alert("first attempt");


					}

					if(res == "second_attempt"){
						alert("Second attempt");


					}
					if(res == "third_attempt"){
						alert("Third attempt");

					}
					if(res == "Final_Attempt"){
						$.ajax({
							type:"POST",
							data:data,
							url:"getdata.php",
							/*dataType:"html",*/
							success:function(response){

								var today = new Date();           
								var TodaysDate = today.getFullYear()+ '-0' +(today.getMonth() + 1)+ '-' +today.getDate();
								//alert(TodaysDate);

								

								/*$("#response_data").html(response);
								$("#attempt_count").html(response);*/

								if(TodaysDate == response){
									$("#login").prop("disabled",true);


								}
							}

							});
						

					}
					if(res == "UnblockMe"){

							alert(res);
					}

				}

			});

		});

	});
</script>

<script>
/*var total_seconds =900;
var c_minutes=parseInt(total_seconds/60);
var c_seconds=parseInt(total_seconds%60);
function CheckTime()
{
document.getElementById('timer').innerHTML='TIME LEFT:'+' '+ c_minutes+'   ' + 'min'+' '+ c_seconds+'  ' + 'sec';
if(total_seconds<=30){
{
 	timer.style.color='#f90';
 	//
 }
}
if(total_seconds<=10){

 {
 	timer.style.color='red';
 	//
}
}
if(total_seconds<=0){

			//alert("Sorry your time is over!!!");
        $("#submit").click();
        //this code is used for submitting form it requires Jquery CDN 
        
        
        
        
    }
    else{
    total_seconds=total_seconds-1;
    c_minutes=parseInt(total_seconds/60);
    c_seconds=parseInt(total_seconds%60); 
     setTimeout("CheckTime()",1000);
	}
}
setTimeout("CheckTime()",1000);*/
   </script>
		