<?php 
$connection= mysqli_connect('localhost','root','','class48');

if(isset($_POST['submit'])){

	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$email =$_POST['email'];
	$pass =$_POST['pass'];
	$sel_email = mysqli_query($connection,"SELECT * from register Where Email='$email'");
	if(mysqli_num_rows($sel_email) == 0){
			if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass)){
		$query =mysqli_query($connection , "INSERT INTO register(Fname,Lname,Email,Password) VALUES ('$fname','$lname', '$email', '$pass')");
			if($query){
			$error = "Register successfully";
			$login = "Please  <a href='login.php'>Login</a>";
			}
		}
	}
	else{
		$error2= "Email has already register";
	}


	
	
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="background">
	<div class="register">
	<h1>Register Form</h1>
	<form class ="form" action="" method="POST">
		<input type="text" name="fname" placeholder="First name" required="Enter first name"><br />
		<input type="text" name="lname" placeholder="Last name" required="Enter Last name"><br />
		<input type="email" name="email" placeholder="Email" required="Enter Email"><br />
		<input type="password" name="pass" placeholder="Password" required="Enter your Password"><br />
		<input type="submit" value="submit" name="submit">
	</form>
	<h3> <?php 
		if(isset($error)){
			echo $error;
			echo "<br />";
			echo $login;
		}
		if(isset($error2)){
			echo $error2;
		}
	?></h3>
</div>
<div class="table">
	<h1>Members</h1>
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>

		<?php
		$query = mysqli_query($connection,"SELECT * FROM register");
		 while($row = mysqli_fetch_assoc($query)): ?>
		<tr>
			<td><?php echo $row['Fname']; ?></td>
			<td><?php echo $row['Lname']; ?></td>
			<td><?php echo $row['Email']; ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</div>
</div>
</body>
</html>
