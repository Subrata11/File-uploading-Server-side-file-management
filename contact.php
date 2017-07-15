<?php


session_start();
$con = mysqli_connect("localhost", "root", "", "testdb") or die("Error " . mysqli_error($con));
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
	    background-image: url("img/4.jpg");
	    background-color: #cccccc;
	}
	</style>


</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-folder-open"></span>   Manage Your Online Photo Album</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span>  Contact Us</a></li>
			</ul>
		</div>
	</div>
</nav>

 
 

<!--==========================
  Contact Section
============================--> 
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
           <center><h2 class="section-title">Contact With Me</h2> </center>
		  <button type="button" class="btn btn-primary btn-lg btn-block"></button> 
          <div class="section-title-divider"></div>
      
        </div>
		</br>
		</br>
		</br>
		</br>
		</br>
      </div>
      
      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
             
              <span class="glyphicon glyphicon-user"></span><p>Binodpur<br>Rajshahi,Bangladesh.</p>
            </div>
			
             <div>
                <span class="glyphicon glyphicon-envelope"></span><p>sksubrata96@gmail.com</p>
            </div>
            
            <div>
               <span class="glyphicon glyphicon-earphone"></span><p>+8801738061325</p>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-5 col-md-push-2">
          <div class="form">
 			
            <div id="errormessage">
 
			</div>
            <form action="welcome.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
 
  </section>


 
 
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

