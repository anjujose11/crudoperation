<html>
<head>
	<title>Add Users</title>
<link rel="stylesheet" type="text/css" href="add.css">
<script type="text/javascript">
function valid()
{
if(document.form.name.value=="")//textbox name=name
{
alert("enter your name");
document.form.name.focus();
return false;
    }

	if(!(isNaN(document.form.name.value)))
{
alert("Only alphabets are allowed");
document.form.name.focus();
return false;
}

var email=document.form.email.value;
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  if(document.form.email.value=="")
{
alert("enter your emailid");
document.form.email.focus();
return false;
}

 if(reg.test(email) == false)
 {
        alert("Please enter a valid Email id");
        document.form.email.focus();
       return false;
    }


if(document.form.mobileno.value=="")
{
alert("enter your mobile number");
document.form.mobileno.focus();
return false;
}
if((isNaN(document.form.mobileno.value)))
{
alert("Only numbers are allowed");
document.form.mobileno.focus();
return false;
}

var phone=document.form.mobileno.value.length;

var max=10;
if((phone<max) || (phone>max))
{
alert("Please Enter your 10 digit mobile phone number");
document.form.mobileno.value="";
document.form.mobileno.focus();
return false;
}

if(document.form.pincode.value=="")//textbox name=name
{
alert("enter your pincode");
document.form.pincode.focus();
return false;
    }

if((isNaN(document.form.pincode.value)))
{
alert("Only numbers are allowed");
document.form.pincode.focus();
return false;
}
}

</script>
</head>

<body>
	
	<br/><br/>
	<div class="bgimage">
	<form action="add.php" method="post" name="form"  autocomplete="off" >
		<table width="25%" border="0">
		<div class="input-group">
			<h1>New User Form</h1>
		</div>
		<div class="input-group">
			<label for="name">Name</label>
			<input type="text" name="name" value="" id="name" size="50" required>
		</div>
		<div class="input-group">
			<label for="email">Email Id</label>
			<input type="text" name="email" id="email" value="" required>
		</div>
		<div class="input-group">
			<label for="mobileno">Mobile No</label>
			<input type="number" name="mobileno" value=""  required>
		</div>
		<div class="input-group">
			<label for="dob">Date Of Birth</label>
			<input type="date" name="dob" id="dob" value="" required>
		</div>
		<div class="input-group">
			<label for="pincode">PinCode</label>
			<input type="text" name="pincode" id="pincode" value="" size="6" required>
		</div>
			<div class="input-group">
			<button class="btn" type="submit" name="Submit" onclick ="return valid();" >Save</button>
		
			<a href="index.php" class="btn">Back</a>
			</div>
			</table>
	</form>
   </div>
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		
		$dob = "";
		if ($_POST["dob"]) {
                $dob_timestamp = strtotime($_POST["dob"]);
                $dob = date("Y-m-d", $dob_timestamp);
            }
		$pincode = $_POST['pincode'];
		$mobileno = $_POST['mobileno'];
		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO form(name,email,mobileno,dob,pincode) VALUES('$name','$email','$mobileno','$dob','$pincode')");

		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>