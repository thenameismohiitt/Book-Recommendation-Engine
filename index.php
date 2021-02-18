<?php
 include "connection.php";
?>
<?php
 session_start();
if(isset($_SESSION["Email"]))
{
    header("location:entry.php");
}
 if(isset($_POST["login"])){
    if(isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['digit']) {  
  $email = mysqli_real_escape_string($con,$_POST["email"]);  
  $pass = mysqli_real_escape_string($con,$_POST["pass"]);
  $pass = md5($pass);   
  $query = "SELECT * FROM users WHERE Email='$email' AND Password='$pass' ";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0){
      $_SESSION["Email"]=$email;
      header("location:entry.php");
 }
  }
   else{
       echo '<script>alert("Wrong details")</script>';
   }  
 }
?>
<?php
if(isset($_POST["submit"])){
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $mail=mysqli_real_escape_string($con,$_POST["mail"]);
    $message=mysqli_real_escape_string($con,$_POST["message"]);
    $query="INSERT INTO  query(name,email,message) VALUES ('$name','$mail','$message')";
    $res=mysqli_query($con,$query);
    if($res){
      echo '<script>alert("Your message have been submitted")</script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="title icon" href="images/title.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Book Recommendation System</title>
  </head>
  <body>
   <!--navbar-->
    <nav class="navbar navbar-expand-md bg-dark fixed-top navbar-light"> 
        <a href="#" class="navbar-brand"><i class="fas fa-globe fa-2x text-primary"></i></a>
      <div class="collapse navbar-collapse justify-content-between">
            
          <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-home mr-2"></i>Home</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-file mr-2"></i>Register</a></li>
                <li class="nav-item"><a href="category.php?p=1" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-book mr-2"></i>Books</a>
                </li>
                <li class="nav-item"><a href="#contact" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-address-book mr-2"></i>Contact Us</a></li>
                <li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-shopping-cart mr-2"></i>Cart</a></li>
        </ul>
         <form class="form-inline ml-3" action="search.php" method="get">
          <div class="input-group">
            <input type="text" name="search" class="form-control input-search text-light" placeholder="Search...">
            <div class="input-group-append">
              <button type="submit" value= "search" class="btn btn-light search-btn"><i class="fas fa-search text-warning"></i></button>
          </div>
          </div>
         </form>
        </div>
    </nav>
   <!--end of navbar-->

    <!--front-->
   <header id="home-section">
     <div class="dark-overlay">
      <div class="home-inner container">
        <div class="row">
          <div class="col-lg-4">
            <div class="card bg-primary card-form">
              <div class="card-body">
                <form action="index.php" method="post">
                <h3 class="text-center word">Login!</h3>
                <p class="text-center">Please fill up to login</p>
                  <div class="form-group">
                      <label for="username" class="text-warning">Enter Email*</label>
                    <input type="text" name="email" placeholder="enter your email..." class="form-control" id="username" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="...">
                  </div>
                  <div class="form-group">
                      <label for="password" class="text-warning">Enter Password*</label>
                      <input type="password" name="pass" placeholder="enter password..." class="form-control" id="password" required pattern="[a-zA-Z0-9@]{5,10}" title="please enter minimum 5 and maximum 10 character only" style="...">
                    </div>
               <div class="form-group">
                  <label for="captcha" class="text-warning">Please Enter the Captcha Text*</label> 
                 <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
                <br>
                 <input type="text" class="form-control" id="captcha" name="captcha_challenge" required style="...">
              </div>  
            <div class="form-group text-center">
                <button type="submit" name="login" class="btn btn-outline-warning pt-30px" style="...">Login</button>
            </div>
                </form>
              </div>
            </div>
          </div>
        
          <div class="col-lg-4">
            <h3 class="text-light text-capitalize read"><strong>We</strong> <i class="fas fa-heart text-danger"></i> <strong>reading</strong></h3>
          </div>
        </div>
      </div>
     </div>
   </header>
    <!--end of front-->

    <!--contact us-->
    <section class="p-5 bg-light">
        <div class="container-fluid" id="contact">
             <!-- title -->
             <div class="row">
                <div class="col text-center mb-3">
                    <h1 class="text-warning display-2">Contact Us</h1>
                    <p class="lead text-secondary">We would love to hear your queries<i class="fas fa-smile-wink text-warning ml-20"></i></p>
                </div>
            </div>
            <!-- end of title -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="text-center text-secondary">
                        <h2>Got Question ?</h2>
                        <p>Stay Connected</p>
                    </div>
                    <form class="text-muted" action="index.php" method="post">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="enter name" required pattern="[A-Za-z ]+" title="Please enter valid name[a-z only]" style="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="text" class="form-control" name="mail" id="email" 
                            placeholder="enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="...">
                        </div>
                        <div class="form-group">
                            <label for="message">Message*</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="enter your message here" required style="..."></textarea>
                        </div>
                        <button class="btn btn-outline-warning btn-block" type="submit" name="submit" style="...">Submit Question</button>
                    </form>
                </div>
            </div>
        </div>
     </section>
<!--end of contact us-->
    
     <!--fotter-->
     <footer class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="text-white font-weight-light text-capitalize pt-3 pr-3 pl-3">Online Book</h1>
                    <h1 class="text-white font-weight-light text-capitalize">Recommendation</h1>
                    <h1 class="text-white font-weight-light text-capitalize">System</h1>
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
 <script>
  var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}      
</script>    
  </body>
</html>