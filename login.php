<!DOCTYPE HTML> 
<html> 
<head> 
<title>DCC Inventory</title> 
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<body id="body-color"> 
</head> 
<?php 

$Success = "FALSE";
if(!empty($_POST))
{
$servername = "localhost";
$username = "root";
$password = "";
$db = "Inventory";
$con = mysqli_connect($servername,$username ,$password ,$db);
if($con)
{
	$sql = "SELECT * FROM login";
  	$result = mysqli_query($con, $sql); 
	while($row = $result->fetch_assoc()) 
	{
		$Username=$row['emp_username'];
		$Password = $row['emp_password'];
		if($_POST['user'] == $Username && $_POST['pass'] == $Password)	
		{
			$Success = "TRUE";
		}
	}
}



if($Success == "TRUE")
{
include('header.php');
echo '<div id="main"><h2>DCC Inventory - Main Menu</h2>';
echo'<div id="menu">';
echo'<div id="login">';
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
?>


<?php if($Success != "TRUE"){?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<body id="body-color"> 
</head>
<body>
<?php include('header.php');?>
<div id="main"><h2>DCC Inventory - Login </h2>
<div id="login"><h2>Login</h2>
<br>
<br>
<form method="post" action="login.php">
<label>UserName :</label>
<input id="name" name="user" placeholder="User Name" type="text">
<br>
<br>
<label>Password :</label>
<input id="pass" name="pass" placeholder="**********" type="password">
<br>
<br>
<br>
<input name="submit" type="submit" value=" Login ">
<br>
</form>
</div>
</div>
</div>
</body>
<?php }?>
</html>