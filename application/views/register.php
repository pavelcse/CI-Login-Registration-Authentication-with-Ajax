<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Welcome - Please Login</title>
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="resource/front/css/bootstrap.min.css" rel="stylesheet">
	<link href="resource/front/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="resource/front/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="resource/front/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="resource/front/img/favicon.ico">
	<!-- end: Favicon -->
	<style type="text/css">
		body { background: url(resource/front/img/bg-login.jpg) !important; }
	</style>	
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="<?php echo base_url()?>"><i class="halflings-icon home"></i></a>
					</div>
					<h2>Register as a new User</h2>
					<?php 
                        if($this->session->flashdata('message')){
                        	echo '<p class="alert alert-danger">'.$this->session->flashdata('message').'</p>';
                        }
					?>
					<form class="form-horizontal" action="<?php echo base_url()?>save-user" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Name">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="name" id="name" type="text" placeholder="type name" required="" />
							</div>
							<div class="input-prepend" title="Email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="email" placeholder="type email" required=""/><br>
                                <span id='email_result'></span>
							</div>
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password" required=""/>
							</div>
							<div class="input-prepend" title="Confirm Password">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input name="confpassword" type="password" class="input-large span10" id="confpassword" onkeyup="checkPass(); return false;" placeholder="Confirm your password" required>
                    			<span id="confirmMessage" class="confirmMessage"></span>
							</div>
							<div class="input-prepend" title="Address">
								<textarea class="input-large span11" name="address" id="address" cols="" rows="" placeholder="type address" required></textarea>
							</div>
							<div class="input-prepend" title="Country">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="country" id="country" type="text" value="Bangladesh" required=""/>
							</div>
							<div class="input-prepend" title="User Type">
								<select class="input-large span11" name="type" id="type">
									<option id="show" value="2">Owner</option>
									<option id="hide" value="0">User</option>
								</select>
							</div>
							<div id="owner">
								<div class="input-prepend" title="Shop Name">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="shop_name" id="shop_name" type="text" placeholder="type shop name"/>
							</div>
							<div class="input-prepend" title="Shop Address">
								<textarea class="input-large span11" name="shop_address" id="shop_address" cols="" rows="" placeholder="type shop address"></textarea>
							</div>
							</div>
							
							

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Register</button>
							</div>
							<div class="clearfix"></div>

							<hr>
					        <h3>Already Registered?</h3>
					        <p>
						        No problem, <a href="<?php echo base_url()?>">click here</a> to Login.
					        </p>
					</form>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<!-- <script src="resource/front/js/jquery-1.9.1.min.js"></script> -->
		
		<script src="resource/front/js/custom.js"></script>
	<!-- end: JavaScript-->

	<!-- Unique Email Check -->
	<script>
		$(document).ready(function(){
            $('#email').blur(function(){
            	var email = $(this).val();
            	if(email !='')
            	{
            		$.ajax({
            			url: "<?php echo base_url()?>check",
            			method: "POST",
            			data: {email:email},
            			success: function(data){
            				$('#email_result').html(data);
            			}
            		});
            	}
            });
		});
	</script>
	<!-- End:  Unique Email Check -->
	<!-- Show/Hide Shop Information -->
	<script>
        $(document).ready(function(){
            $("#hide").click(function(){
                $("#owner").hide();
            });
            $("#show").click(function(){
                $("#owner").show();
            });
        });
    </script>
    <!--End: Show/Hide Shop Information -->

    <!-- Confirm Password Check -->
    <script type="text/javascript">
        function checkPass()
        {
            //Store the password field objects into variables ...
            var password = document.getElementById('password');
            var confpassword = document.getElementById('confpassword');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colors we will be using ...
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            //Compare the values in the password field
            //and the confirmation field
            if(password.value == confpassword.value){
                //The passwords match.
                //Set the color to the good color and inform
                //the user that they have entered the correct password
                confpassword.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                confpassword.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        }
    </script>
    <!--End: Confirm Password Check -->
</body>
</html>
