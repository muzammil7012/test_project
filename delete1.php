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

	if (isset($_GET['del_index'])) {
		$del_index=$_GET['del_index'];
		$query="SELECT * FROM images where id='".$_GET['del_id']."'";
		$result=mysqli_query($con,$query);
	while ($rows=mysqli_fetch_array($result)) {
			$path=$rows['image_path'];
			$path_arr=explode(',', $path);
			unset($path_arr[$del_index]);
		$newarray=array_values($path_arr);
		$newpath=implode(',', $newarray);
		$del="UPDATE images SET image_path='$newpath' WHERE id='".$_GET['del_id']."'";
		$delresult=mysqli_query($con,$del);
		if($delresult)
		{
			echo "<script>alert('Data Deleted')</script>";
			echo "<script>window.location.href='multiple images.php';</script>";
		}
		else
			{
				echo "<script>alert('Deletion Failed!')</script>";
			}
		
	}
}
	$del_id = $_GET['del_id'];
	$query="SELECT * FROM images where id='$del_id'";
	$run=mysqli_query($con,$query);
	while ($rows=mysqli_fetch_array($run)) {
			$path=$rows['image_path'];
			$path_arr=explode(',', $path);
		for($i=0; $i<count($path_arr); $i++){
			echo "<table>";
			echo "<tr>";
			echo "<td>";
			echo "<img src='multiple pics/$path_arr[$i]' width='50px' height='50px'>";
			echo "</td>";
			echo "<td><input type='button' name='delete' value='Delete' width='60px' onclick='delme($i,$del_id)'></td>";
			echo "</tr>";
			echo "</table>";
		 	
		}
		
		}
	
	?>
	<script type="text/javascript">
		function delme(del_index,del_id){
			if(confirm("Do you want to delete it?")){
				window.location.href="delete1.php?del_index="+del_index+"&del_id="+del_id;
			};
		}
		
	</script>
