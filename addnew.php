<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($username)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($userjob)){
			$errMSG = "Please Enter Your Job Work.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_users(userName,userCategory,userPic) VALUES(:uname, :ujob, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "New record successfully inserted";
				header("refresh:5;home.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Facing Some Error while inserting";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Photo Album</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

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
 				<li><a href="addnew.php"> <span class="glyphicon glyphicon-plus-sign"></span>   Add</a></li>
				<li><a href="editform.php"> <span class="glyphicon glyphicon-edit"></span>  Edit</a></li>
				<li><a href="home.php"> <span class="glyphicon glyphicon-eye-open"></span>  View</a></li>
 				<li><a href="search.php"> <span class="glyphicon glyphicon-search"></span>  Search</a></li>
 				<li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
				 
			</ul>
		
		</div>
	</div>
</nav>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">Add new user</h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Photo Name:</label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="Enter Photo Name" value="<?php echo $username; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Photo Category:</label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="Enter Photo Category" value="<?php echo $userjob; ?>" /></td>
    </tr>
	
 
    
    <tr>
    	<td><label class="control-label">Upload Image:</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2">
			<button type="submit" name="btnsave" class="btn btn-default">
			<span class="glyphicon glyphicon-save"></span> &nbsp; save
			</button>		
        </td>
    </tr>    
 
    
    </table>
    
</form>



<div class="alert alert-info">
	<center><strong>Developer: Subrata Paul</strong></center>
</div>



</div>
 

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>