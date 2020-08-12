<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM form ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>
<link rel="stylesheet" type="text/css" href="index.css">

<body>
<div class="bgimage">

	<a href="add.php" class="new">Add New User</a><br/><br/>

    <table width='80%' border=1>
	<thead>
    <tr>
        <th>Name</th> <th>Email Id</th> <th>Mobile No</th><th>Date Of Birth</th><th>PinCode</th>  <th  colspan="2">Action</th>
    </tr>
	</thead>
    <tbody>
	<?php while ($user_data = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $user_data['name']; ?></td>
			<td><?php echo $user_data['email']; ?></td>
			<td><?php echo $user_data['mobileno']; ?></td>
			<td><?php echo $user_data['dob']; ?></td>
			<td><?php echo $user_data['pincode']; ?></td>
			<td class="actions">
				<a href="edit.php?id=<?php echo $user_data['id']; ?>" class="edit" >Edit</a>
			</td>
			<td>
				<a href="delete.php?id=<?php echo $user_data['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
		
	<?php } ?>
   </tbody>
	
    
    </table>
</div>
</body>
</html>