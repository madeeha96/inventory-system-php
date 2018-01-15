<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Add Employees</title>
</head>
<body id="body-color"> 
<div id="main">
<?php 
if(!empty($_POST))
{
if(@$_POST['emp_name'])
{
$con = mysqli_connect("localhost","root" ,"" ,"Inventory"); 
if($con)
{
	
	$emp_name = $_POST['emp_name'];
	$contact_no = $_POST['contact_no'];
	$emp_dept = $_POST['emp_dept'];
	$equipments_list = $_POST['equipments_list'];
	$sql = "INSERT INTO Employee (emp_name , emp_contact, emp_dept,equipments_list) VALUES  ('$emp_name', '$contact_no' ,'$emp_dept', '$equipments_list')";
	if ($con->query($sql) === TRUE) { echo "New Employee Added successfully";} 
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
	echo '<br>';
	echo '<form method="post" action="report.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Report"></input></form>';
}
}
else
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css">
<?php include('header.php');?> 
<h2>DCC Inventory - Add Employees</h2><br>
<body id="body-color"> 
</head>
<body>
<br>
<br>
<form method="post" action="addemployee.php">
<label>Employee Name :</label>
<input id="emp_name" name="emp_name" placeholder="Employee Name" type="text">
<br>
<br>
<label>Equipments Already Taken:</label>
<input id="contact_no" name="equipments_list" placeholder="Add Equipments Separated with Commas" type="text">
<br>
<br>
<label>Contact No:</label>
<input id="contact_no" name="contact_no" placeholder="Contact Number" type="text">
<br>
<br>
<label>Department:</label>
<input id="emp_dept" name="emp_dept" placeholder="Department" type="text">
<br>
<br>
<br>
<input name="submit" type="submit" value=" ADD EMPLOYEE ">
<br>
</form>
<?php
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
 } }?>
 </div>
</body>
</html>