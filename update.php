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
	$id=$_GET['edit'];
	
	$query = "SELECT * FROM DATA WHERE ID='".$id."' ";
	print_r($query);
	$run = mysqli_query($con, $query);
	
	$result = mysqli_fetch_assoc($run);
	
	
	
?>

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

input[type=submit]{
	
	width:95%;
	background:black;
	color:white;
	font-size:19px;
	font-weight:bold;
}

input[type=submit]:hover{
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
	<form action="" method="post" enctype="multipart/form-data">
    	<h2>Sign-Up Free</h2>
        <input type="text" name="yourname" placeholder="Your Name" value="<?php echo $result['Name']; ?>"/>
        <input type="text" name="uname" placeholder="User-Name" value="<?php echo $result['username']; ?>">
        <input type="email" name="email" placeholder="Your Email" value="<?php echo $result['Email']; ?>"/>
        <input type="number" name="mnumber" placeholder="Mobile Number" value="<?php echo $result['mnumber']; ?>"/>
        <input type="password" name="password" placeholder="Your Password" value="<?php echo $result['password']; ?>"/>
        <input type="password" name="conformpassword" placeholder="Conform Password" value="<?php echo $result['cpassword']; ?>"/>
        <br /><br />
        <span style="font-size:18px;">Date Of Birth</span>
        <br />
        <input type="date" name="dob" placeholder="Enter Data of Birth" value="<?php echo $result['dob']; ?>">
        <br /><br />
        
        <span style="font-size:18px;">Choose Gender</span>
        <br />
        <select name="gender" value="">
        	<option><?php echo $result['gender']; ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Others</option>
        </select>
        <br /><br />
        <span style="font-size:18px;"></span>
        <input type="file" name="uploadimage" value="<?php echo $result['picsource']; ?>"/>

        <input type="submit" name="submit1" value="Update Now"/>
    </form>
</div>

<?php
	if(isset($_POST['submit1'])){
		$name = $_POST['yourname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$numb = $_POST['mnumber'];
		$pass = $_POST['password'];
		$cpass = $_POST['conformpassword'];
		$dob = $_POST['dob'];
		$gend = $_POST['gender'];
		
		
		$filename = $_FILES["uploadimage"]["name"];
		$tempname = $_FILES["uploadimage"]["tmp_name"];
		$folder = "pics/".$filename;
		move_uploaded_file($tempname,$folder);
	
		$update = "UPDATE `data` SET `Name`='$name',`username`='$uname',`Email`='$email',`password`='$pass',`cpassword`='$cpass',`gender`='$gend',`picsource`='$folder',`dob`='$dob' WHERE `mnumber`='$numb'";
		$run = mysqli_query($con, $update);
		if(!$run){ 
    		echo '<script language="javascript">';
			echo 'alert("Sorry, Updating Process Failed")';
			echo '</script>';
			
		}
		else{ //query is successful
   			echo '<script language="javascript">';
			echo 'alert("Data Updated SuccessFully")';
			echo '</script>';
		}
?>

		<meta http-equiv="refresh" content="0; url=login.php" />

<?php		
	}		
?>
</body>
</html>
