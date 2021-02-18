<?php
 include "connection.php";
?>
<?php
 if(isset($_POST["register"])){
    $firstname = mysqli_real_escape_string($con,$_POST["firstname"]); 
    $middlename = mysqli_real_escape_string($con,$_POST["middlename"]);
    $lastname = mysqli_real_escape_string($con,$_POST["lastname"]); 
    $address = mysqli_real_escape_string($con,$_POST["address"]); 
    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $city = mysqli_real_escape_string($con,$_POST["city"]);
    $state = mysqli_real_escape_string($con,$_POST["state"]);
    $country = mysqli_real_escape_string($con,$_POST["country"]); 
    $pin = mysqli_real_escape_string($con,$_POST["pin"]);
    $phone = mysqli_real_escape_string($con,$_POST["phone"]);
    $password = mysqli_real_escape_string($con,$_POST["password"]);
    $password = md5($password); 
    $query = "INSERT INTO users(FirstName,MiddleName,LastName,Address,City,State,Country,Postal,Phone,Email,Password) VALUES ('$firstname',' $middlename','$lastname','$address','$city',' $state',' $country','$pin','$phone','$email','$password')";
    $result = mysqli_query($con,$query); 
    if($result){
      echo '<script>alert("You have successfully registered yourself")</script>';
    }
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" href="_register.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
     <nav class="navbar navbar-expand-md bg-dark fixed-top navbar-light"> 
        <a href="#" class="navbar-brand"><i class="fas fa-globe fa-2x text-primary"></i></a>
      <div class="collapse navbar-collapse justify-content-between">
            
          <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-home mr-2"></i>Home</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-file mr-2"></i>Register</a></li>
                <li class="nav-item"><a href="category.php?p=1" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-book mr-2"></i>Books</a>
                </li>
                <li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-shopping-cart mr-2"></i>Cart</a></li>
            </ul>
        </div>
    </nav>
    <p><br /></p>
    <p><br /></p>

    
    <!----register start----------->
<section>
 <div class="container">
   <br><h5 class="text-center">New to our website?</h5>
 <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
    <header class="card-header">
	   <h4 class="card-title mt-2">Register</h4>
    </header>
<article class="card-body">
<form action="register.php" method="post">
	<div class="form-row">
		<div class="col form-group">
			<label>First name*</label>   
		  	<input type="text" class="form-control" name="firstname"  placeholder="enter first name" required pattern="[A-Za-z]+" title="Please enter valid first name[a-z only]" style="...">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Middle name </label>   
		  	<input type="text" class="form-control" name="middlename" placeholder="enter middle name" pattern="[A-Za-z]+" title="Please enter valid middle name[a-z only]" style="...">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Last name*</label>
		  	<input type="text" class="form-control" name="lastname"  placeholder="enter last name" required pattern="[A-Za-z]+" title="Please enter valid last name[a-z only]" style="...">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
	    <label>Address*</label>
	    <input type="address" class="form-control" name="address" placeholder="enter your address..." required style="..." >
	</div>
	<div class="form-group">
		<label>Email address*</label>
		<input type="email" class="form-control" name="email" placeholder="enter your email address.." required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="...">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div> <!-- form-group end.// -->
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>City*</label>
		  <input type="text" class="form-control" name="city" placeholder="enter your city.." required pattern="[A-za-z ]+" title="Please enter valid city name[a-z only]" style="...">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		  <label>State*</label>
		   <input type="text" class="form-control" name="state" placeholder="enter your state.." required pattern="[A-za-z]+" title="Please enter valid state name[a-z only]" style="...">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
	<div class="form-row">
	    <div class="form-group col-md-6">
	        <label>Country*</label>
	        <input type="text" class="form-control" name="country"   placeholder="enter your country.." required pattern="[A-za-z]+" title="Please enter valid country name[a-z only]" style="...">
	    </div>
	    <div class="form-group col-md-6">
	        <label>Pin Code*</label>
	        <input type="text" class="form-control" name="pin"  placeholder="enter your pin code.." required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]">
	    </div>
	</div>
	<div class="form-group">
	    <label>Phone Number*</label>
	    <input type="text" class="form-control" name="phone" placeholder="enter your phone number..." required pattern="[0-9]{10}" title="please enter valid phone number[0-9 and 10 digit only]">
	</div>
	<div class="form-group">
		<label>Create password*</label>
	    <input class="form-control" type="password" name="password"  placeholder="enter your password..." required pattern="[a-zA-Z0-9@]{5,10}" title="please enter minimum 5 and maximum 10 character only" style="...">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" name="register" style="..." class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="index.php">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
</section>
<p><br /></p>
<p><br /></p>   
<!----end of register----------->
    
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