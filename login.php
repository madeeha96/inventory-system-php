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
$username = "root";							//Can you expot your DB and send the file to me. So I can run the App ?
$password = "";
$db = "Inventory";
$con = mysqli_connect($servername,$username ,$password ,$db);
if($con)
{
	$sql = "SELECT * FROM login";					//You are Typing a direct query, If you used an approach like this. I can hack your system easily just I need to send query to your system
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
//------------------------------------------------------------------------------------------------------------------------
        
       //Pls find the below login code. you can review it only. it's week login but stronger than you
       //You must use a frame work or pior object oriented PHP application. NOT old school (HTML with PHP)
                    if (isset($_POST["LoginButt"])) {
                        $con = new mysqli('localhost', 'username', 'Password', 'DB_name');
                        if ($con->error) {
                            echo "connection failed";
                        } else {
                            $userID = $con->query("Call LOGIN('" . $_POST['inputEmail'] . "','" . $_POST['inputPassword'] . "')");
                            if ($userID == null)
                                die("Something goes wrong, Please wait few minutes<br>");
                            if (!$userID = $userID->fetch_object()) {
                                die("Username or Password are wrong");
                            } else {
                                $Security_Level = $userID->SECURITY_LEVEL;
                                $userID = $userID->USER_ID;
                                //Login Done successfull without checking the company activation status
                                $con = new mysqli('localhost', 'username', 'Password', 'DB_name');
                                $activationStatus = $con->query("CALL checkCompanyActivationThrowUser('" . $userID . "')");
                                if (!$activationStatus = $activationStatus->fetch_object()) {
                                    die("Error by retrieving the company status");
                                } else {
                                    $activationStatus = $activationStatus->ACTIVATION;
                                    if ($activationStatus == "DISABLED") {
                                        echo "The company accounts are disabled, check your administrator";
                                    } else if ($activationStatus == "ACTIVE") {
                                        // write code after signin and checking the company status is successfully done ------------------------
                                        if (isset($_POST['RememberMeCheck'])) {
                                            setcookie('userID', $userID, time() + 10000);
                                            setcookie('Email', $Email, time() + 10000);
                                            setcookie('Passw', $Password, time() + 10000);
                                        }
                                        $_SESSION['userID'] = $userID;
                                        $_SESSION['SECURITY_LEVEL'] = $Security_Level;
                                        header("location: ../AMP/users/Level_" . $_SESSION['SECURITY_LEVEL'] . ".php");
                                    } else {
                                        echo "The system can not defined activation status, check support team";
                                    }
                                }
                            }
                        }
                    }
                    if (isset($_COOKIE['Email']) && isset($_COOKIE['Passw'])) {
                        $Email = $_COOKIE['Email'];
                        $Password = $_COOKIE['Passw'];
                        echo "<script>
                                document.getElementById('Emailtxt').value = '$Email';
                                document.getElementById('PassTxt').value = '$Password';
                            </script>";
                    }
                    
//-------------------------------------------------------------------------------------------------------------------------

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
