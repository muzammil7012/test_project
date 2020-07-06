<?php
	
	session_start();
	$ipaddress = $_SESSION["ip"];
	
?>


<?php

	$con = mysqli_connect('localhost','root','','record');
	if($con)
	{
		echo "";
	}
	else
	{
		die ("Connection Failed Because".mysqli_connect_error());
	}

?>

<script>
	function validateform()
	{
		var name = document.forms["myform"]["yourname"].value;
		if(name=="")
		{
			alert("Name is Missing");
			return false;
		}
		var uname = document.forms["myform"]["username"].value;
		if(uname=="")
		{
			alert("Username Is Missing");
			return false;
		}
		var email = document.forms["myform"]["email"].value;
		if(email=="")
		{
			alert("Email Is Missing");
			return false;
		}
		var mnumber = document.forms["myform"]["mnumber"].value;
		if(mnumber=="")
		{
			alert("Mobile Number Is Missing");
			return false;
		}
		var password = document.forms["myform"]["password"].value;
		if(password=="")
		{
			alert("Password Is Missing");
			return false;
		}
		var cpass = document.forms["myform"]["conformpassword"].value;
		if(cpass=="")
		{
			alert("Conform Password Field Is Empty");
			return false;
		}
		var dobmonth = document.forms["myform"]["dobmonth"].value;
		if(dobmonth=="")
		{
			alert("Date Of Birth Is Missing");
			return false;
		}
		var dobday = document.forms["myform"]["dobday"].value;
		if(dobday=="")
		{
			alert("Day of Birth Is Missing");
			return false;
		}
		var dobyear = document.forms["myform"]["dobyear"].value;
		if(dobyear=="")
		{
			alert("Birth Year Is Missing");
			return false;
		}
		var gender = document.forms["myform"]["gender"].value;
		if(gender=="")
		{
			alert("Gender Field Is Empty");
			return false;
		}
		var uploadimage = document.forms["myform"]["uploadimage"].value;
		if(uploadimage=="")
		{
			alert("Image Uploading Field Is Empty");
			return false;
		}
	}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{
	background-color:#009999;
}

.wrap{
	width:350px;
	margin:auto;
	margin-top:50px;
	background-color:#CCCC66;
	padding:5px;
}

form{
	padding:10px;
	font-family:arial;
	border:2px dotted white;
	margin:10px;
}

h2{
	text-align:center;
	background:#000000;
	color:white;
	padding:10px;
	border-radius:10px;
}

input{
	padding:10px;
	margin:5px;
	border-radius:5px;
	border:none;
}

input[type=submit]{
	width:80px;
	height:40px;
	padding:10px;
	margin:5px;
	border-radius:5px;
	border:none;
}
input[type=text], input[type=email], input[type=number], input[type=password]{
	width:90%;
}

#operations{
	
	width:100%;
	height:45px;
	background:black;
	color:white;
	font-size:19px;
	font-weight:bold;
}

#operations:hover{
	background:#999999;
}

select{
	padding:7px;
	width:32%;
	border-radius:5px;
}

</style>
</head>

<body>
<div class="wrap">
	<form name="myform" action="" method="post" enctype="multipart/form-data" onSubmit="return validateform()">
    	<h2>Sign-Up Free</h2>
        <input type="text" name="yourname" placeholder="Name">
        <input type="text" name="username" placeholder="User Name">
        <input type="email" name="email" placeholder="Your Email">
        <input type="number" name="mnumber" placeholder="Mobile Number">
        <input type="password" name="password" placeholder="Your Password">
        <input type="password" name="conformpassword" placeholder="Conform Password">
        <br /><br />
        <span style="font-size:18px;">Date Of Birth</span><br />
        <input type="date" name="dob" placeholder="Enter Data of Birth">
        <br /><br />
        
        <span style="font-size:18px;">Choose Gender</span>
        <br />
        <select name="gender">
        	<option>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Others</option>
        </select>
        <br /><br />
        <span style="font-size:18px;">Choose Image</span>
        <input type="file" name="uploadimage" value="">
        
        <button name="submit1" id="operations">Insert Now</button>
    </form>
</div>

<?php

	

	if(isset($_POST['submit1'])){
		$ipaddress = $_SESSION["ip"];
		$name = $_POST['yourname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$mnumber = $_POST['mnumber'];
		$pass = $_POST['password'];
		$cpass = $_POST['conformpassword'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		
		$filename = $_FILES["uploadimage"]["name"];
		$tempname = $_FILES["uploadimage"]["tmp_name"];
		$folder = "pics/".$filename;
		move_uploaded_file($tempname,$folder);
		
		if($pass==$cpass){
		
			$insert = "INSERT INTO `data`(`Name`, `username`, `Email`, `mnumber`, `password`, `cpassword`,`gender`, `picsource`, `dob`, `ip`, `status`) VALUES ('$name','$username','$email','$mnumber','$pass','$cpass','$gender','$folder','$dob','$ipaddress',1)";
	
			$run = mysqli_query($con,$insert);
			if($run)	
			{
				echo '<script language="javascript">';
				echo 'alert("Data Inserted Into DataBase")';
				echo '</script>';
			
		}	
			}
			else
		
			{
				echo '<script language="javascript">';
				echo 'alert("Password Not Matched")';
				echo '</script>';
			}
	}	
?>


</body>
</html>
