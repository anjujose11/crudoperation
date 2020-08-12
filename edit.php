<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobileno = $_POST['mobileno'];
	$dob = "";
	if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
	$pincode = $_POST['pincode'];
	

	// update user data
	$result = mysqli_query($mysqli, "UPDATE form SET name='$name',email='$email',mobileno='$mobileno',dob='$dob',pincode='$pincode' WHERE id=$id");

	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM form WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];
	$email = $user_data['email'];
	$mobileno = $user_data['mobileno'];
	$dob = $user_data['dob'];
	$pincode = $user_data['pincode'];
}
?>
<html>
<head>
	<title>Edit User Data</title>
	<script type="text/javascript">
function valid()
{
if(document.form1.name.value=="")//textbox name=name
{
alert("enter your name");
document.form1.name.focus();
return false;
    }

	if(!(isNaN(document.form1.name.value)))
{
alert("Only alphabets are allowed");
document.form1.name.focus();
return false;
}

var email=document.form1.email.value;
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if(document.form1.email.value=="")
{
alert("enter your emailid");
document.form1.email.focus();
return false;
}

 if(reg.test(email) == false)
 {
        alert("Please enter a valid Email id");
        document.form1.email.focus();
       return false;
    }


if(document.form1.mobileno.value=="")
{
alert("enter your mobile number");
document.form1.mobileno.focus();
return false;
}
if((isNaN(document.form1.mobileno.value)))
{
alert("Only numbers are allowed");
document.form1.mobileno.focus();
return false;
}

var phone=document.form1.mobileno.value.length;

var max=10;
if((phone<max) || (phone>max))
{
alert("Please Enter your 10 digit mobile phone number");
document.form1.mobileno.value="";
document.form1.mobileno.focus();
return false;
}

if(document.form1.pincode.value=="")//textbox name=name
{
alert("enter your age");
document.form1.pincode.focus();
return false;
    }

if((isNaN(document.form1.pincode.value)))
{
alert("Only numbers are allowed");
document.form1.pincode.focus();
return false;
}
}

</script>
</head>
<link rel="stylesheet" type="text/css" href="edit.css">
<body>
		<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table width="25%" border="0">
		<div class="input-group">
			<h1>Edit User Data </h1>
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value=<?php echo $name;?> required>
		</div>
		<div class="input-group">
			<label>Email Id</label>
			<input type="text" name="email" value=<?php echo $email;?> required>
		</div>
		<div class="input-group">
			<label>Mobile No</label>
			<input type="number" name="mobileno" value=<?php echo $mobileno;?> required>
		</div>
		<div class="input-group">
			<label>Date Of Birth</label>
			<input type="date" name="dob" value=<?php echo $dob;?> required>
		</div>
		<div class="input-group">
			<label>PinCode</label>
			<input type="text" name="pincode" value=<?php echo $pincode;?> required>
		</div>
			<div class="input-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<button class="btn" type="submit" name="update" onclick ="return valid();" >update</button>
		
			<a href="index.php" class="btn">Back</a>
			</div>
		</table>
	</form>
</body>
</html>