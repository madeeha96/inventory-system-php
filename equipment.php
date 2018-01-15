<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Equipment</title>
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
<h2>DCC Inventry - Equipment</h2><br>
	<div id="login">
		<form method="post" action="addequipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Add Equipment"></input></form>
		<br>
		<form method="post" action="showequipment.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Show Equipment"></input></form>
	</div>
</div>
<?php }?>
</body>
</html>