<?php
	session_start();
	$con = mysqli_connect('localhost','root','','record');
	if($con)
	{
		echo "";
	}
	else
	{
		die ("Connection Failed Because".mysqli_connect_error());
	}
	if(!empty($_SESSION['user_name'])){
		header("location:home.php");
	}

?>
<form action="" method="post">
	Username: <input type="text" name="uname" value=""><br /><br />
    Password: <input type="text" name="upassword" value=""><br /><br />
    <input type="submit" name="submit1" value="Login">
    <button><a href="insert.php" target='blank'>Sign-Up</a></button>
</form>
<?php
	if(isset($_POST['submit1']))
	{
		$user = $_POST['uname'];
		$pwd = $_POST['upassword'];
		$query = "SELECT * FROM DATA WHERE username='$user' && password='$pwd'";
		$run = mysqli_query($con, $query);
		$total = mysqli_num_rows($run);
		if($total==1)
		{
			$_SESSION['user_name'] = $user;
			header('location:home.php');
		}
		else
		{
			echo "Login Failed";
		}
	}

?>
