<?php
  if(isset($_POST)){
  if(isset($_GET['go'])){
  $name=$_POST['name'];
  //connect  to the database
  $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
  //-select  the database to use
  $mydb=mysql_select_db("Inventory");
  //-query  the database table
  $sql="SELECT  emp_id, emp_name, emp_dept FROM employee WHERE LOWER(equipments_list) LIKE '%".$name."%' ";
  //-run  the query against the mysql query function
  $result=mysql_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
          $name  =$row['emp_name'];
          $dept=$row['emp_dept'];
          $ID=$row['emp_id'];
  //-display the result of the array
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$name . " " . $dept .  "</a></li>\n";
  echo "</ul>";
  }
  }else{
    echo  "<p>Please enter a search query</p>";
  }
  }
  
?>