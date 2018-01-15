<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Employees</title>
<body id="body-color"> 
</head>
<body>
<?php if(!empty($_POST))
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
</head>
<body id="body-color"> 
<?php include('header.php');?>
<div id="main">
<h2>DCC Inventry - Employees</h2><br>
	<div id="login">
		<form method="post" action="addemployee.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Add Employees"></input></form>
		<br>
		<form method="post" action="showemployee.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Show Employees"></input></form>
	</div>
</div>
<?php }?>
</body>
</html>