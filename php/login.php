<?php
 
$email  = "";
$password = "";
function test_input($data)
{   $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{   $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
}
// Database connection 
include("connect.php");
    $query = "SELECT * FROM users WHERE Email='".$email."' ";
    
    //$query = "SELECT * FROM users" ;
    $result = mysqli_query($con, $query);
    if ($result->num_rows == 1)
    {   // setting the session variable .
        session_start();
        
        while($row = mysqli_fetch_array($result)) 
        {
           if(password_verify($password, $row['Password']))
           {//echo "<p>matched</p>";
           $_SESSION['User'] = $row['Email'];
		   header('Location:../index.php');
           }
            else{
            
			header('Location:../signin2.php');
			}
           
        }
         
    }
    else{
    header('Location:../signin.php');
    }

?>