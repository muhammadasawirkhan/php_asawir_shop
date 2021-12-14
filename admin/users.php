<?php
session_start();
include("includes/connection.php");
if($_SESSION['admin_auth']==1);
else{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Control Panel - Online Profile System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="container"> 
	<?php include("includes/header.php");?>
	<div class="row1"> 

	<?php include("includes/menu.php");?>
	<div class="pages">
		<h1>Users</h1>
		<hr/>
<?php 
			$sql="select * from users";


$recordset=mysqli_query($connection,$sql);
$counter=0;
echo "<table border='1' class='admin-users-list'>";
echo '<tr>';
echo '<td>Email</td>';
echo '<td>Name</td>';
echo '<td>Block</td>';

echo '</tr>';



while($record=mysqli_fetch_array($recordset))
{
	echo '<tr>';
	echo "<td>".$record['email']."</td>";
	echo "<td>".$record['name']."</td>";
	if($record['block_user']==0)
	{
	echo "<td><a href='block.php?record_id=".$record['email']."&option=block'>Block</a></td>";
	}
	else{
		echo "<td><a href='block.php?record_id=".$record['email']."&option=block'>Unblock</a></td>";
		
	}
	echo '</tr>';

}
echo '</table>';

?>




	</div>

	</div>
	<?php include("includes/footer.php");?>
	
</div>
</body>
</html>