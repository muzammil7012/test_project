<?php
	$con = mysqli_connect('localhost','root','','images');
	if($con)
	{
		echo "Connected";
	}
	else
	{
		die("Connection Failed Because".mysqli_connect_error());
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Images Upload</title>
</head>

<body>
	<form action="" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" value=""/>
        <input type="submit" name="submit" value="Upload File"/>
    </form>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$filename = $_FILES["file"]["name"];
		$tempname = $_FILES["file"]["tmp_name"];
		$folder = "pics/".$filename;
		echo $folder;
		move_uploaded_file($tempname,$folder); 
		echo "<img src='$folder' height='100' width='100'>";
		
		$insert = "INSERT INTO `data`(`picsource`) VALUES ('$folder')";
		$run = mysqli_query($con, $insert);
		if($run)	
		{
			echo "Data Inserted Into DataBase";
		}
		else
		{
			echo "Not Inserted";
		}
		
	}
	
	
?>