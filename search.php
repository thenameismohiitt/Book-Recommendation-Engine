<?php
include "connection.php";
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Category</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" href="css/_category.css">
	<!-- main css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

	<!--================Header Menu Area =================-->
	  <nav class="navbar navbar-expand-md bg-dark fixed-top navbar-light"> 
        <a href="#" class="navbar-brand"><i class="fas fa-globe fa-2x text-primary"></i></a>
      <div class="collapse navbar-collapse justify-content-between">
            
          <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-home mr-2"></i>Home</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-file mr-2"></i>Register</a></li>
                <li class="nav-item"><a href="category.php?p=1" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-book mr-2"></i>Books</a>
                </li>
                <li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-shopping-cart mr-2"></i>Cart</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold px-3 text-light"><i class="fas fa-heart mr-2"></i>WishList</a></li>
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
    <p><br /></p>
    <p><br /></p>
    <p><br /></p>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area bg-info">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shop Category Page</h2>
					<div class="page_link">
						<a href="index.php">Home</a>
						<a href="category.php?p=1">Category</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
			 <div class="col-lg-9">
             <div class="latest_product_inner row">
                	
		<?php
if(isset($_GET["search"]))
{
 $search=mysqli_real_escape_string($con,$_GET["search"]); 
 $sql = "SELECT * FROM books WHERE Title LIKE '%$search%' ";
 $rst=mysqli_query($con,$sql); 
 $count=mysqli_num_rows($rst);   
 ?>
    <?php 
    if($count>=1)
    {
            while($rw=mysqli_fetch_array($rst))
        {
        ?>
     <div class="col-lg-3 col-md-3 col-sm-6">
						<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="<?php echo $rw["CoverImage"];   ?>" alt="">
								</div>
								<a href="#">
									<h4><?php echo $rw["Title"];   ?></h4>
								</a>
                            <h5>₹<?php echo $rw["Price"];   ?></h5>
                            <h5>Publisher:<?php echo $rw["Publisher"];   ?></h5>
                            <a href="product_single.php?id=<?php echo $rw['Id']; ?>" class="btn btn-outline-success mt-3">Description</a>
                            </div>
				</div>
        <?php        
            }
                }
            else
                 {
                    echo "<h5>Sorry! that book is currently not in our database.</h5>";
                        
                 }		      
         
             }
                    ?>
                </div>	
				</div>
    
			<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Browse Categories</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="#">Fictional</a>
									</li>
									<li>
										<a href="#">Non-Fictional</a>
											</li>
											<li>
												<a href="#">Kids</a>
											</li>
											<li>
												<a href="#">Teens</a>
											</li>
										</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
             <p><br/ ></p>
             <p><br/ ></p>
		</div>
	</section>
	<!--================End Category Product Area =================-->

	<!--================ start footer Area  =================-->
	 <footer class="bg-secondary">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="text-white font-weight-light text-capitalize p-3">Online Book Recommendation System</h1>
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
	<!--================ End footer Area  =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js/theme.js"></script>
</body>
</html>