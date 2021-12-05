<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "<script language='javascript'>alert('Please enter some valid information!');</script>"; 
			
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="inputStyle.css">
</head>
<body>


	<div class="form">
		
		<form method="post">

			<h2>Sign up</h2>
			<div class="input">
		      <div class="inputbox">
				  <label>Username</label>
			      <input type="text" name="user_name" placeholder="User_name@ucd.ma">
			  </div>
			  <div class="inputbox">
			    <label>Password</label>
			    <input type="password" name="password" placeholder="Password">
			  </div>
			  <div class="inputbox">
			<input type="submit" value="Signup">
			</div>
	    </div>
			<p class="forget">Connect ? <a href="login.php">Click to Log in</a><br><br></p>
			</div>
		</form>
	</div>
</body>
</html>