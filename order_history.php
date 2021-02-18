<?php
include "connection.php";
?>
<?php
session_start();
$getUser = "SELECT UserId FROM users WHERE Email='".$_SESSION['Email']."'";
$res = mysqli_query($con, $getUser);
if(mysqli_num_rows($res)>0)
{
 while($row=mysqli_fetch_assoc($res))
{
       $user = $row['UserId'];  
}
}
$sql="SELECT BookId FROM orderdetails WHERE OrderId='$user' ";
$res2 = mysqli_query($con, $sql); 
while($row=mysqli_fetch_assoc($res2))
{
      echo $row['BookId'];  
}   
?>