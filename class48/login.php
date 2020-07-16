<?php 
	$connection= mysqli_connect('localhost','root','','class48');

	if(isset($_POST['submit'])){
		$email =$_POST['email'];
		$pass =$_POST['pass'];
		if(!empty($email) && !empty($pass)){
			$sel_email = mysqli_query($connection,"SELECT * from register  where Email ='$email'");

			if(mysqli_num_rows($sel_email) == 1){
				$match = mysqli_query($connection , "SELECT Password from register WHERE Email='$email'");
				$pass_match = mysqli_fetch_assoc($match);
				if($pass == $pass_match['Password']){
					$query =mysqli_query($connection , "INSERT INTO login(Email,Password) VALUES ('$email', '$pass')");

					if($query){
						$result = 'Login successfully';
					}
				}
				else{
					$invalid="Invalid Password";
				}
			}
			else{
				$inv_email="Email dosen't exist";
			}
		}
		
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="register login">
	<h1>Login Form</h1>
	<form class ="form" action="" method="POST">
		<input type="email" name="email" placeholder="Email" required="Enter Email"><br />
		<input type="password" name="pass" placeholder="Password" required="Enter your Password"><br />
		<input type="submit" value="submit" name="submit">
	</form>
	<h3> <?php
		if(isset($result)){
			echo $result;
		}
		if(isset($inv_email)){
			echo $inv_email;
		}
		if(isset($invalid)){
			echo $invalid;
		}
	 ?></h3>
</div>
</body>
</html>