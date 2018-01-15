<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Main Menu</title> 
</head>
<body id="body-color">
<div id="main">

<?php if(!empty($_POST))
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
</head>
<body id="body-color">
<?php include('header.php');?>
<h2>DCC Inventry - Main Menu</h2><br> 
<div id="login">
	<br>
	<form method="post" action="employee.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Employees"></input></form>
	<br>
	<form method="post" action="equipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Equipment"></input></form>
	<br>
	<form method="post" action="lend-equipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Lend Equipments"></input></form>
	<br>
	<form method="post" action="report.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Report"></input></form>
</div>
</body>
<?php } ?>

</div>
</body>
</html>