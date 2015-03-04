<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
	body {
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}

	.form-signin {
		max-width: 450px;
		padding: 19px 29px 29px;
		margin: auto;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		box-shadow: 0 1px 2px rgba(0,0,0,.05);
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
		margin-bottom: 10px;
	}
	.form-signin input[type="text"],
	.form-signin input[type="password"] {
		font-size: 16px;
		height: auto;
		margin-bottom: 15px;
		padding: 7px 9px;
	}

	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SI KP</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Add custom CSS here -->
	<link href="css/business-casual.css" rel="stylesheet">
</head>

<body>

	<div class="brand">SiSDISGAS</div>
	<div class="address-bar">Sistem Informasi Distribusi Gas</div>

	

	<div class="container">

		
		<div class="row1">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						-<strong> Sign In </strong>-
					</h2>
					<hr>
					<div class="row">
						<form class="form-signin" action="<?php echo base_url() ?>index.php/c_verifylogin/" method="post" id="login-form">
							<input type="text" name="username" id="username" class="span4" placeholder="Username" required autofocus>
							<input type="password" name="password" id="password" class="span4" placeholder="Password" required>
							<input type="submit" id="btn-login" class="btn btn-large btn-primary" value="Sign in">
							
						</form>
					</div>

				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Copyright &copy; 198201</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- JavaScript -->
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.js"></script>
	<script>
	    // Activates the Carousel
	    $('.carousel').carousel({
	        interval: 5000
	    })
        </script>

    </body>

    </html>
