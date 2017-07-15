<?php
session_start();


$con = mysqli_connect("localhost", "root", "", "testdb") or die("Error " . mysqli_error($con));

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			//$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Online Photo Album</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<link href='image/logo.png' rel='icon' type='image/x-icon'/>
	
	<style>
	body  {
	    background-image: url("img/2.jpg");
	    background-color: #cccccc;
	}
	</style>

</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-folder-open"></span>   Manage Your Online Photo Album</a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span>  Contact Us</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
						</br></br>
						Already Registered? <a href="login.php">Login Here</a>
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
 		</div>
	</div>
</div>

 
         <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">

            <div class="container">
                <div class="navbar-text pull-left">
                    <p> <span class="glyphicon glyphicon-globe"></span> 2017 We Are "One"</p>
                </div>
                <div class="navbar-text pull-right">
                    <a href="#"><i class="fa fa-facebook-square fa-2x icon-padding"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-2x icon-padding"></i></a>
                    <a href="#"><i class="fa fa-google-plus fa-2x icon-padding"></i></a>
					
                </div>
            </div>

        </div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>



