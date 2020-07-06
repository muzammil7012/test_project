<?php
	$con = mysqli_connect('localhost','root','','record');
	if($con)
	{
		echo "";
	}
	else
	{
		echo("connection failed because".mysqli_connect_error());
	}
	
	$edit_id = $_GET['edit_id'];
	$query="SELECT * FROM IMAGES where id='$edit_id'";
	$result=mysqli_query($con,$query);
	while ($rows=mysqli_fetch_array($result)) 
	{
		$path=$rows['image_path'];
		$path_arr=explode(',', $path);
		for($i=0; $i<count($path_arr); $i++){
			echo "<table>";
			echo "<tr>";
			echo "<td>";
			echo "<img src='multiple pics/$path_arr[$i]' width='50px' height='50px'>";
			echo "</td>";
			echo "<td><input type='button' name='edit' value='Edit' width='60px' onclick='editme($i,$edit_id)'></td>";
			echo "</tr>";
			echo "</table>";
		 	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Image</title>
</head>

<body>

<script type="text/javascript">
	function editme(editindex,editid) {
		window.location.href="edit2.php?edit_index="+editindex+"&edit_id="+editid;
	}
</script>

</body>
</html>