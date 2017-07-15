<?php

	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM tbl_users WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM tbl_users WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: home.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Online Photo Album</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<link href='image/logo.png' rel='icon' type='image/x-icon'/></head>

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
  				<li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
			 </ul>
		
		</div>
	</div>
</nav>
 

<div class="container">

	<div class="page-header">
     	<marquee><h1>Search All data!!!</h1></marquee>
    </div>
	
	
					 <form method="post" action="search.php" class="navbar-form">
                            <div class="input-group">
                                <input type="text" name="search"  placeholder="Search" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                  </form>
 

 
            <?php

            $search=$_POST['search'];


            if($search==""){
                header("Location: home.php");
                
            }


            require_once 'dbconfig.php';

            $query = mysql_query("SELECT * FROM users WHERE std_id like '%" . $search . "%' OR name like '%" . $search . "%' OR Address like '%" . $search . "%' OR email like '%" . $search . "%' OR mobile like '%" . $search . "%'");



            while($arr=mysql_fetch_array($query)>0){



            ?>
            <tr>



                <td class="text-center"><?php echo $arr[1];?></td>
                <td class="text-center"><?php echo $arr[2];?></td>
                <td class="text-center"><?php echo $arr[3];?></td>
                <td class="text-center"><?php echo $arr[4];?></td>
                <td class="text-center"><?php echo $arr[5];?></td>
                <td><center><a href = "edit.php? txtid=<?php echo $arr[0]; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                        <a href = "delete.php? txtid=<?php echo $arr[0]; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></center></td>
            </tr>


            <?php
                  }
            ?>
            </tbody>
 
 
 
 
 
 
<div class="alert alert-info">
	<center><strong>Developer: Subrata Paul</strong></center>
</div>


</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>