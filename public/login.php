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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<script language='javascript'>alert('wrong username or password!');</script>"; 

			
			
		}else
		{
			echo "<script language='javascript'>alert('the password or name zone is empty');</script>"; 
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="inputStyle.css">
	
</head>
<body>


	<div class="form">
		
		<form method="post">
			<h2>Log in</h2>
			<div class="input">
		      <div class="inputbox">
			    <label>Username</label>
			    <input  type="text" name="user_name" placeholder="user_name@ucd.ma">

        </div>		
	      <div class="inputbox">
	      <label>Password</label>
			<input  type="password" name="password" placeholder="password">
	      </div>
		 <div class="inputbox">
			<input  type="submit" value="Login">
		 </div>
		 </div>
		    <p class="forget">Forget Password ? <a href="#">Click Here</a></p>
			<p class="forget">Not yet a member ? <a href="signup.php">Sign Up Now</a></p>
		</form>
	</div>
</body>
</html>