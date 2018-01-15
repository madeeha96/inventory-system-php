<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<title>DCC Inventory - Show Employees</title>
</head>
<body id="body-color"> 
<div id="main">
<?php if(!empty($_POST))
{
?>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css"> 
<?php include('header.php');?>
<h2>DCC Inventry - Show Employees</h2><br><br>
<!-- search equipments -->
	<form  style="display:block;overflow:hidden;" method="post" action="showemployee.php?go"  id="searchform"> 
    	<input type="text" name="term" style="
	    width: 250px;
	    float: left;"/> 
		<input type="submit" name="submit" value="Search" style="
	    float: left;
	    width: 66px;
	    font-size: 12px;
	    padding: 13px 0;
	    margin: 7px 10px 0px 10px;
	    "/>  
	</form> 
	<div class="clearer"></div>
<!-- search equipments -->
<center><table border="1px">
<tr><td>Employee ID</td><td> Employee Name </td><td> Contact Number </td><td> Department </td><td> Already Taken Equipments </td><td> Delete </td></tr>
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
  		$delete = "DELETE FROM Employee WHERE emp_id='$id'";
  		mysqli_query($con, $delete);
  		echo "Deleted Successfully";
  }
  //deleting records end here
  if(isset($_GET['go'])){ // run search query 
  	$term = $_POST['term'];
  	$sql="SELECT  emp_id, emp_name,emp_contact, emp_dept, equipments_list FROM employee WHERE LOWER(equipments_list) LIKE '%".$term."%' ";
  }else{ //run normal query
  	$sql = "SELECT * FROM Employee";
  }
  $result = mysqli_query($con, $sql); 
	while($row = $result->fetch_assoc()) 
	{
		$id= $row['emp_id'];
		$name=$row['emp_name'];
		$contact = $row['emp_contact'];
		$department = $row['emp_dept'];
		$equipments_list = $row['equipments_list'];
		if(empty($equipments_list)): $equipments_list = '-'; endif;
		echo '<tr><td>';
		echo $id;
		echo"</td><td>";
		echo $name;
		echo "</td><td>";
		echo $contact;
		echo "</td><td>";
		echo $department;
		echo "</td><td>";
		echo $equipments_list;
		echo "</td><td>";
		echo '<form style="margin:0;" method="post" action="showemployee.php"><input type="hidden" name="username" value="letHimGo"/><input type="hidden" name="id_delete" value="'.$id.'"/><input style="padding:1px;font-size:11px;margin:0;" type="submit" name="delete" value="Delete"/></form>';
		echo"</td></tr>";		
	}
	echo '</table></center>';
echo '<br><form method="post" action="mainmenu.php"><input type="hidden" name="username" value="letHimGo"></input><input type="submit" value="Main Menu"></input</form>';
  
  }



 }?>
 </div>
</body>
</html>