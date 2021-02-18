<?php
session_start();
if(isset($_COOKIE['item']))
{
 foreach($_COOKIE['item'] as $name1 => $value)
 {
  if(isset($_POST["delete$name1"]))
  {
    setcookie("item[$name1]","",time()-300);
    ?>
 <script type="text/javascript">
  window.location.href=window.location.href; 
 </script>
<?php    
  }
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="_cart_style.css">
    <link rel="stylesheet" href="style.css">
    <title>Cart</title>
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
                <li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-shopping-cart mr-2"></i>Cart</a></li>
            </ul>
        </div>
    </nav>
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
   <!--end of navbar-->
   
   <!--================Home Banner Area =================-->
	<section class="bg-info" style="height:395px;">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center text-light">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="index.php">Home<i class="fas fa-arrow-right icon"></i></a>
						<a href="cart.php">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================End Home Banner Area =================-->
<!--================Cart Area =================-->
	<section class="cart_area">
	    <div class="container">
	        <div class="cart_inner">
	            
                    <?php
                            $d=0;
                            if(isset($_COOKIE['item']))
                               {
                                $d=$d+1;
                               }
                               if($d==0)
                               {
                                 echo "<h5>Your cart is empty.<h5>";   
                               }
                               else{
                                ?>
                <div class="table-responsive">
	               <table class="table">
                    <thead>
							<tr>
								<th scope="col">Book</th>
								<th scope="col">Price per book</th>
								<th scope="col">Action</th>
								<th scope="col">Total you have ordered</th>
							</tr>
						</thead>
                           <tbody>  
                                <?php
                                  foreach($_COOKIE['item'] as $name => $value)
                                    {
                                      $value11 = explode("_",$value);
                                      ?>
                                      <tr>
                                <td><div class="media">
										<div class="d-flex">
											<img src="<?php echo $value11[0]; ?>" alt="">
										</div>
										<div class="media-body">
											<p style="font-size: 12px;"><?php echo $value11[1]; ?></p>
										</div>
									</div></td>  
                                <td><h5>₹<?php echo $value11[2]; ?></h5></td>  
                                <td>
                                 <form action="cart.php" method="post">
									<input type="submit" name="delete<?php echo $name1;?>" value="delete" class="btn btn-outline-info">
                                </form> 
                               </td>  
                                <td><h5>₹<?php echo $value11[4]; ?></h5></td> 
                                </tr>     
                                   <?php  
                                    }  
                                ?> 
                             <tr>
								<td></td>
								<td></td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td></td>
							</tr>                            
                            <tr class="out_button_area">
                               <td></td>
                               <td></td>
                               <td></td>
                               <td>
                                   <div class="checkout_btn_inner">
                                      <a class="gray_btn" href="category.php?p=1" style="text-decoration:none;">Continue Shopping</a>
										<a class="main_btn" style="text-decoration:none;" href="paypal.php">Proceed to checkout</a>
                                   </div>
                               </td>
                           </tr>                  
                      </tbody>
                </table> 
	         </div>                                    
                    <?php   
                    }
                $total=0;
               if(isset($_COOKIE['item']))
            { 
               foreach($_COOKIE['item'] as $name => $value)
                {
                $value11 = explode("_",$value);  
                $total=$total+$value11[4];
                }
                 echo "<h5 style='margin-left: 835px; margin-top:-169px; '>" ."₹"." " .$total."</h5>"; 
                $_SESSION["pay"]=$total;
               }
                    ?>                     
	        </div>
	    </div>
    </section>
    <p><br/></p>
    <p><br/></p>
    <p><br/></p>
<!--================End of Cart Area =================-->
    
    
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