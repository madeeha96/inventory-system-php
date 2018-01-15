<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Show Equipements</title>
</head>
<body id="body-color"> 
<div id="main">
<?php if(!empty($_POST))
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<?php include('header.php');?>
<h2>DCC Inventry - Show Equipements</h2><br><br>
<center><table border="1px">
<tr><td>Equipment ID</td><td> Equipment Name </td><td> Catagory </td><td> Quantity </td><td> Details </td><td> Date </td><td> Delete </td></tr>
<body id="body-color"> 
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "Inventory";
$con = mysqli_connect($servername,$username ,$password ,$db);
if($con)
  {
  	//deleteing records starts
  if (isset($_POST['delete'])) {
  		$id = $_POST['id_delete'];
  		$delete = "DELETE FROM Equipement WHERE equipment_id='$id'";
  		mysqli_query($con, $delete);
  		echo "Deleted Successfully";
  }
  //deleting records end here
  $sql = "SELECT * FROM Equipement";
  $result = mysqli_query($con, $sql); 
	while($row = $result->fetch_assoc()) 
	{
		$id= $row['equipment_id'];
		$name=$row['equ_name'];
		$Equ_category = $row['equ_category'];
		$Equ_no_items = $row['equ_no_items'];
		$Equ_details = $row['Equ_details'];
		$date = $row['date'];
		if(empty($Equ_details)): $Equ_details = '<center>-</center>'; endif;
		echo '<tr><td>';
		echo $id;
		echo"</td><td>";
		echo $name;
		echo "</td><td>";
		echo $Equ_category;
		echo "</td><td>";
		echo $Equ_no_items;
		echo "</td><td>";
		echo $Equ_details;
		echo "</td><td>";
		echo $date;
		echo "</td><td>";
		echo '<form style="margin:0;" method="post" action="showequipment.php"><input type="hidden" name="username" value="letHimGo"/><input type="hidden" name="id_delete" value="'.$id.'"/><input style="padding:1px;font-size:11px;margin:0;" type="submit" name="delete" value="Delete"/></form>';
		echo"</td></tr>";		
	}
	echo '</table></center>';
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
  
  }
 }?>
 </div>
</body>
</html>