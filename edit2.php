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


<?php

if (isset($_GET['edit_index'])) {
			$edit_index = $_GET['edit_index'];
			echo "<form action='' method='post' enctype='multipart/form-data'><input type='file' name='newimg'><input type='submit' name='upload'></form>";
			
	}

if (isset($_POST['upload'])) {
				$edit_id=$_GET['edit_id'];
				$file_name=$_FILES['newimg']['name'];
				$temp_name=$_FILES['newimg']['tmp_name'];
				$store="multiple pics/".$file_name;
				if (move_uploaded_file($temp_name, $store)) {
					$newimg=$_FILES['newimg']['name'];
				}
				else{
					echo "error...";
				}
				$query="SELECT * FROM images where id='$edit_id'";
				$run=mysqli_query($con,$query);
				while ($rows=mysqli_fetch_array($run)) 
				{	
					$path=$rows['image_path'];
					$path_arr=explode(',', $path);
					$path_arr[$edit_index]=$newimg;
					$newpath=implode(',', $path_arr);
					$query="UPDATE images SET image_path='$newpath' WHERE id='$edit_id'";
					$res=mysqli_query($con,$query);
					if($res)
					{
						echo "<script>alert('Changes SuccessFully')</script>";
						echo "<script>window.location.href='multiple images.php';</script>";
					}
					else
					{
						echo "<script>alert('Changes Failed!')</script>";
					}
				}
			}

?>