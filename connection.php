<?php session_start();
 $con=mysql_connect('localhost','mynetai_pin2','pin234')or die("Error in connection");

$mydb=mysql_select_db('mynetai_pininfo')or die("Error : database is not  connected");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>