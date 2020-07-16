<?php 
	$connection= mysqli_connect('localhost','root','','class48');

	$query = mysqli_query($connection,"SELECT * FROM register");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>members</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>

		<?php while($row = mysqli_fetch_assoc($query)): ?>
		<tr>
			<td><?php echo $row['Fname']; ?></td>
			<td><?php echo $row['Lname']; ?></td>
			<td><?php echo $row['Email']; ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</body>
</html>