<?php
 $con = mysqli_connect('localhost','root','','onlinebookstore'); 
  if(!$con){
      echo "Failed to connect to MySQL Database: ".mysqli_connect_error();
  }
?>