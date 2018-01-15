<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Add Equipments</title>
 </head>
<body id="body-color">
<div id="main">
<?php 
if(!empty($_POST))
{
if(@$_POST['Equ_name'])
{
$con = mysqli_connect("localhost","root" ,"" ,"Inventory"); 
if($con)
{
	
	$name = $_POST['Equ_name'];
	$Equ_category = $_POST['Equ_category'];
	$Equ_no_items = $_POST['Equ_no_items'];
	$Equ_details = $_POST['Equ_details'];
	$date = date("Y-m-d");
	$sql = "INSERT INTO Equipement (Equ_name , Equ_category , Equ_no_items,Equ_details, date) VALUES  ('$name', '$Equ_category' ,'$Equ_no_items','$Equ_details', '$date')";
	if ($con->query($sql) === TRUE) { echo "New Equipment Added successfully";} 
	else {echo "Error: " . $sql . "<br>" . $con->error;}
	$con->close();
	echo'<div id="menu">';
	echo'<div id="login"><h2>DCC Inventory - Main Menu</h2>';
	echo'<br>';
	echo '<form method="post" action="employee.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Employees"></input></form>';
	echo'<br>';
	echo '<form method="post" action="equipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Equipment"></input></form>';
	echo'<br>';
	echo '<form method="post" action="lend-equipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Lend Equipment"></input></form>';
	echo'<br>';
	echo '<form method="post" action="report.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Report"></input></form>';
}
}
else
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
</head>
<body id="body-color">
<?php include('header.php');?>
<h2>DCC Inventry - Add Equipments</h2><br>
<br>
<br>
<form method="post" action="addequipment.php">
<label>Equipement Name:</label>
<input id="Equ_name" name="Equ_name" placeholder="Equipement Name" type="text">
<br>
<br>
<label>Catagory:</label>
<input id="Equ_category" name="Equ_category" placeholder="Catagory" type="text">
<br>
<br>
<label>Quantity:</label>
<input id="Equ_no_items" name="Equ_no_items" placeholder="Quantity" type="text">
<br>
<br>
<label>Detail:</label>
<input id="Equ_details" name="Equ_details" placeholder="Detail about Equipment" type="text">
<br>
<br>
<label>Date:</label>
<input id="Equ_details" value="<?php echo date('Y-m-d');?>" type="text" readonly>
<br>
<br>
<br>
<input name="submit" type="submit" value=" ADD EQUIPEMENT ">
<br>
</form>
<?php
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
echo '</body>';
 } }?>
 </div>
</body>
</html>