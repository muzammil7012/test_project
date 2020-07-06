<?php
	session_start();
	
	echo $localIP = getHostByName(getHostName());
	$_SESSION["ip"] = "$localIP";
	
?>

<style>
td{
	padding:15px;
}

</style>

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
	
	
	$view = "SELECT * FROM DATA WHERE status=1 ";
	$run = mysqli_query($con,$view);
	$total = mysqli_num_rows($run);
	
	
	if($total != 0)
	{
?>

		<table>
        	<tr>
            	<th>Name</th>
                <th>U-Name</th>
                <th>Email</th>
                <th>M-Number</th>
                <th>Password</th>
                <th>Cpassword</th>
                <th>Data Of Birth</th>
                <th>Gender</th>
                <th>Images</th>
                <th colspan="2">Operations</th>
            </tr>
        

<?php

		while($result = mysqli_fetch_assoc($run))
		{
			echo "<tr>
            		<td>".$result['Name']."</td>
					<td>".$result['username']."</td>
                	<td>".$result['Email']."</td>
                	<td>".$result['mnumber']."</td>
                	<td>".$result['password']."</td>
                	<td>".$result['cpassword']."</td>
                	<td>".$result['dob']."</td>
                	<td>".$result['gender']."</td>
					<td><a href='$result[picsource]'><img src='".$result['picsource']."' height='80' width='80'></a></td>
					<td><button><a href='update.php?edit=$result[ID]'>Edit</a></button></td>
					<td><button><a href='delete.php?mnum=$result[mnumber]' onclick='return checkdelete()'>Delete</a></button></td>
            	</tr>";
		}	
	}
	else
	{
		echo "No Record Found";
	}

?>
		</table>

<script>
	function checkdelete()
	{
		return confirm('Are You Sure You Want To Delete This Record??');
	}
</script>
