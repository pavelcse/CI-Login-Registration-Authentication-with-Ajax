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
					<h2>Login to your account</h2>
					
					<?php 
                        if($this->session->flashdata('message')){
                        	echo '<p class="alert alert-danger">'.$this->session->flashdata('message').'</p>';
                        }
					?>
					
					<form class="form-horizontal" action="<?php echo base_url()?>login" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="email" placeholder="type email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>New Here?</h3>
					<p>
						No problem, <a href="<?php echo base_url()?>register">click here</a> to Signup.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="resource/front/js/jquery-1.9.1.min.js"></script>
		<script src="resource/front/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
