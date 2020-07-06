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
	
	$mnumb = $_GET['mnum'];
	
	$delete = "UPDATE `data` SET status=0,ip='$ipaddress' WHERE mnumber='$mnumb'";
	$run = mysqli_query($con, $delete);
	if($run)	
	{
		echo '<script language="javascript">';
		echo 'alert("Record Deleted")';
		echo '</script>';
	}
	
	
?>	
	<meta http-equiv="refresh" content="0; url=display.php" />
	
<?
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Delete Process Failed")';
		echo '</script>';
	}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Data</title>

</head>

<body>

</body>
</html>
