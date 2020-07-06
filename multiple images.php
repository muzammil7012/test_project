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
?>
<style type="text/css">
		th,td{
			text-align: center;
		}
		table ,th,td{
			border: 1px solid blue;
		}
		img{
			margin-right: 20px;
		}
	</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form action="" method="post" enctype="multipart/form-data">
    	<lable>Upload Multiple Images</lable>
        <input type="file" name="file1[]" multiple required /><br /><br />
        <input type="submit" name="btn" value="upload">
    </form>
    
<?php
	if (isset($_POST['btn'])) 
	{
		for ($i=0; $i <count($_FILES['file1']['name']); $i++) {
			$file_name=$_FILES['file1']['name'][$i];
			$temp_name=$_FILES['file1']['tmp_name'][$i];
			$store="multiple pics/".$file_name;
			if (move_uploaded_file($temp_name,$store)) {
				$img[$i]=$_FILES['file1']['name'][$i];
			}
			else{
				echo "error";
			}
		}
		$imgs=implode(',',$img);
		$query=mysqli_query($con, "INSERT INTO `images`(`image_path`) VALUES ('$imgs')");
		if ($query) {
			echo "<script>
			alert('Inserted SuccessFully')
			</script>";
		}
		else{
			echo "<script>
			alert('Insertion Failed')
			</script>";
		}	
	}
	
	
	 
?>
<table align="center" class="table" style="width: auto;">
		<tr>
			<th>S.No</th>
			<th>Images</th>
            <th>Operations</th>
		</tr>
		<?php
			$query1=mysqli_query($con, "SELECT * FROM IMAGES");
	while ($rows=mysqli_fetch_array($query1)) {
		$id=$rows['id'];
		$path=$rows['image_path'];
		$path_arr=explode(',', $path);
		$len_arr=count($path_arr);

	echo "<tr>";
	echo "<td>";
	echo $id;
	echo "</td>";
	echo "<td>";	
		foreach ($path_arr as $img) {
		echo"<img src='multiple pics/".$img."' width='80px' height='80px'>";
		}
		
		echo "</td>";	
		echo "<td><button><a href='edit.php?edit_id=$rows[id]'>Edit</a></button>
			<button><a href='delete1.php?del_id=$rows[id]' onclick='return checkdelete()'>Delete</a></button>
			<button><a href='delete_all.php?delete_id=$rows[id]' onclick='return checkdeleteall()'>Delete All</a></button></td>";
		
	echo "</tr>";
	}
		?>
	
	</table>
<script>
	
	function checkdeleteall()
	{
		return confirm('Are You Sure You Want To Delete This Record??');
	}
</script>
    
</body>
</html>