<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Lend Equipments</title>
<body id="body-color"> 
</head>
<body>
<div id="main">
<?php 
if(!empty($_POST))
{
if(@$_POST['employee_name'])
{
$con = mysqli_connect("localhost","root" ,"" ,"Inventory"); 
if($con)
{
	
	$name = $_POST['employee_name'];
	$Equ_category = $_POST['equipment_name'];
	$Equ_no_items = $_POST['equipement_category'];
	$quantity_equipa = $_POST['quantity'];
	$lend_date = $_POST['lend_date'];
	$return_date = "";
	$sql = "INSERT INTO lendequipment (employee_name , equipment_name , equipement_category, quantity,lend_date,return_date) VALUES  ('$name', '$Equ_category' ,'$Equ_no_items', '$quantity_equipa','$lend_date', '$return_date')";
	if ($con->query($sql) === TRUE) { echo "New Equipment Lended successfully";} 
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
</head>
<?php include('header.php');?>
<h2>DCC Inventry - Lend Equipments</h2><br>
<body id="body-color"> 
<body>
<br>
<br>
<form method="post" action="lend-equipment.php">
<label>Employee Name:</label>
<input id="Equ_name" name="employee_name" placeholder="Name of Employee" type="text"> <i>Or Use DropDown of Pre-Added Emlpoyees</i>
<select name="employee_name">
	<?php $servername = "localhost"; $username = "root";	$password = "";	$db = "Inventory";
	$con = mysqli_connect($servername,$username ,$password ,$db);
	if($con){
	  $sql = "SELECT * FROM Employee";
	  $result = mysqli_query($con, $sql); 
		while($row = $result->fetch_assoc()) 
		{
			$name=$row['emp_name'];
			echo '<option value="'.$name.'">'.$name.'</option>';
		}
	}
	?>  
</select>
<br>
<br>
<label>Equipment Name:</label>
<input id="Equ_category" name="equipment_name" placeholder="Name of Equipment" type="text"><i>Or Use DropDown of Pre-Added Equipments</i>
<select name="equipment_name">
	<?php $servername = "localhost"; $username = "root";	$password = "";	$db = "Inventory";
	$con = mysqli_connect($servername,$username ,$password ,$db);
	if($con){
	  $sql = "SELECT * FROM Equipement";
	  $result = mysqli_query($con, $sql); 
		while($row = $result->fetch_assoc()) 
		{
			$name=$row['equ_name'];
			echo '<option value="'.$name.'">'.$name.'</option>';
		}
	}
	?>  
</select>
<br>
<br>
<label>Category of Equipment:</label>
<input id="Equ_no_items" name="equipement_category" placeholder="Category of Item Lended" type="text"><i>Or Use DropDown of Pre-Added Categories</i>
<select name="equipement_category">
	<?php $servername = "localhost"; $username = "root";	$password = "";	$db = "Inventory";
	$con = mysqli_connect($servername,$username ,$password ,$db);
	if($con){
	  $sql = "SELECT * FROM Equipement";
	  $result = mysqli_query($con, $sql); 
		while($row = $result->fetch_assoc()) 
		{
			$category = $row['equ_category'];
			echo '<option value="'.$category.'">'.$category.'</option>';
		}
	}
	?>  
</select>
<br>
<br>
<label>Quantity:</label>
<input id="Equ_no_items" name="quantity" placeholder="Quantity" type="text">
<br>
<br>
<label>Quantity:</label>
<input id="lend_date" name="lend_date" value="<?php echo date('Y-m-d');?>" type="text" readonly>
<br>
<br>
<br>
<input name="submit" type="submit" value=" Lend Equipment ">
<br>
</form>
<?php
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
 } }?>
 </div>
</body>
</html>