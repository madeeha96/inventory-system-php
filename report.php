<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Show Equipements Lend Report</title>
</head>
<body id="body-color"> 
<div id="main">
<?php if(!empty($_POST))
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<?php include('header.php');?>
<h2>DCC Inventry - Show Equipements Lend Report</h2><br><br>
<center><table border="1px">
<tr><td>ID</td><td> Employee Name </td><td> Equipment Name </td><td> Equipment Category </td><td> Quantity </td><td> Lend Date </td><td> Return Date </td></tr>
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
  //return lend
	if (isset($_POST['log_returned'])) {
	  		$id = $_POST['log_returned'];
	  		$date = date("Y-m-d");
	  		$updated = "UPDATE lendequipment SET return_date='$date' WHERE lend_id='$id'";
	  		mysqli_query($con, $updated);
	  		echo "Logged Equipment Returned Successfully!";
	}
	 //returne lend end

  $sql = "SELECT * FROM lendequipment";
  $result = mysqli_query($con, $sql); 
	while($row = $result->fetch_assoc()) 
	{
		$id= $row['lend_id'];
		$name=$row['employee_name'];
		$Equ_category = $row['equipment_name'];
		$Equ_no_items = $row['equipement_category'];
		$quinatito = $row['quantity'];
		$lend_date = $row['lend_date'];
		$return_date = $row['return_date'];
		if(empty($return_date)): $return_date = '<form style="margin:0;" method="post" action="report.php"><input type="hidden" name="username" value="letHimGo"/><input type="hidden" name="log_returned" value="'.$id.'"/><input style="padding:1px;font-size:11px;margin:0;" type="submit" name="delete" value="Log Returned!"/></form>'; endif;
		echo '<tr><td>';
		echo $id;
		echo"</td><td>";
		echo $name;
		echo "</td><td>";
		echo $Equ_category;
		echo "</td><td>";
		echo $Equ_no_items;
		echo"</td><td>";
		echo $quinatito;
		echo"</td><td>";
		echo $lend_date;
		echo"</td><td>";
		echo $return_date;
		echo"</td></tr>";		
	}
	echo '</table></center>';
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
  
  }
 }?>
 </div>
</body>
</html>