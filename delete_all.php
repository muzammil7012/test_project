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

<?php

	$del_id = "$_GET[delete_id]";
	$delete = "DELETE FROM `images` WHERE id='$del_id'";
	$run = mysqli_query($con, $delete);
	if($run)	
	{
		echo "<script>alert('Record Deleted')</script>";
	}
	else
	{
		echo "<script>alert('Sorry, Data Not Deleted!!')</script>";
	}
	
?>
<meta http-equiv="refresh" content="0; url=multiple images.php" />