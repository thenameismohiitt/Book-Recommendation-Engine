<?php
include "connection.php";
?>
<?php
session_start();
$getUser = "SELECT Email, UserId FROM users WHERE Email='".$_SESSION['Email']."'";
$res = mysqli_query($con, $getUser);
if(mysqli_num_rows($res)>0)
{
 while($row=mysqli_fetch_assoc($res))
{
       $user = $row['UserId'];  
}
$sql="INSERT INTO orders (DateCreated, UserId) VALUES (CURDATE(), '".$user."');";

    $con->query($sql);
    $orderId = $con->insert_id;
}


foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
 {
    $values11 = explode("_", $value);
    mysqli_query($con,"insert into orderdetails values('$values11[4]','$user','$values11[5]','$values11[3]')"); 
    setcookie("item[$name1]","",time()-300);
 }
    
echo "we have successfully received your order.Thanks for shopping with us." ; 
?>
<script type="text/javascript">

    setTimeout(function(){
        window.location="cart.php";

    },3000);

</script>


