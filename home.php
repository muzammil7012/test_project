<style>
td{
	padding:15px;
}

</style>

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
	
	$userprofile =  $_SESSION['user_name'];
	
	if($userprofile==true)
	{
	
	}
	else
	{
		header('location:login.php');
	}
	
	$query = "SELECT * FROM DATA WHERE username='$userprofile'";
	$run = mysqli_query($con, $query);
	if($run)
	{

?>
		<table>
        	<tr>
            	<th>Name</th>
                <th>UserName</th>
                <th>Email</th>
                <th>M-Number</th>
                <th>Password</th>
                <th>Cpassword</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Images</th>
                <th colspan="2">Operatins</th>
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

?>
		</table>

<a href="logout.php">Logout</a>

</body>
</html>
