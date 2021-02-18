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
}
$sql="select distinct books.* from books join orderdetails on books.id=orderdetails.bookid join users as user1 on orderdetails.orderid=user1.UserId join orderdetails as orders1 on user1.UserId=orderdetails.orderid join books as book1 on orders1.bookid=book1.id where user1.UserId not in('$user') limit 4";
$res2 = mysqli_query($con,$sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>
 <!--navbar-->
    <nav class="navbar navbar-expand-md bg-dark fixed-top navbar-light"> 
        <a href="#" class="navbar-brand"><i class="fas fa-globe fa-2x text-primary"></i></a>
      <div class="collapse navbar-collapse">
            
          <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-home mr-2"></i>Home</a></li>
                <li class="nav-item"><a href="category.php?p=1" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-book mr-2"></i>Books</a>
                </li>
                <li class="nav-item"><a href="#contact" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-address-book mr-2"></i>Contact Us</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-shopping-cart mr-2"></i>Cart</a></li>
                <li class="nav-item"><a href="recommendation.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-cogs"></i> Recommendation</a></li>    
            </ul>
            <?php
              echo "<h5 style='color:white; margin-left:100px; padding-top:10px;'>Welcome:".' '.$_SESSION['Email']."</h5>";
              echo "<a href='logout.php' style='color:white; text-decoration:none; padding:14px 10px 14px 10px; text-align: center; margin-left:30px; background-color: #f44336;'>Logout</a>";
            ?>
        </div>
    </nav>
      <p><br/></p>
      <p><br/></p>
   <!--end of navbar--> 
  
<h1 class="text-center">Recommended Books</h1>

<div class="row">

<?php
while($rw=mysqli_fetch_assoc($res2))
{
?> 
  <div class="col-lg-3">
       <img  src="<?php echo $rw["CoverImage"]; ?>" width="150px" alt="" >
      <p>Book Name:<?php echo $rw["Title"]; ?></p>
      <p class="">₹<?php echo $rw["Price"]; ?></p>
  <button class="btn btn-outline-info">Add to cart</button>
  <br/>
  </div>
  
<?php    
}
?>
</div> 
<p><br/></p>
<p><br/></p>
<!--fotter-->
     <footer class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="text-white font-weight-light text-capitalize pt-3 pr-3 pl-3">Online Book</h1>
                    <h1 class="text-white font-weight-light text-capitalize">Recommendation</h1>
                    <h1 class="text-white font-weight-light text-capitalize">System</h1>
                    <h3 class="text-light font-weight-light font-italic mb-3">Lorem ipsum dolor sit amet.</h3>
                    <div class="py-2">
                        <a href="#"><i class="fab fa-facebook fa-2x text-primary mx-3"></i></a>
                        <a href="#"><i class="fab fa-google-plus fa-2x text-danger mx-3"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x text-info mx-3"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-2x text-danger mx-3"></i></a>
                    </div>
                    <p class="text-light py-4 m-0">&copy;Copyright 2019- Made with love by cdac student</p>
                </div>
            </div>
        </div>
     </footer>
<!--end of fotter-->
    
            
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>