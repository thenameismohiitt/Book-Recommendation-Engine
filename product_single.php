<?php
include "connection.php";
?>
<?php
$id=$_GET["id"];
$query ="select * from books where id=$id";
$query2="SELECT * FROM author INNER JOIN authorbook ON author .authorid=authorbook.authorid where authorbook.bookid=$id";
$result2=mysqli_query($con,$query2);
$result=mysqli_query($con,$query);
if (isset($_POST["submit1"]))
{
   $d=0;
    if(is_array($_COOKIE['item']))
    {
        foreach($_COOKIE['item'] as $name => $value)
        {
            $d=$d+1;
        }
        $d=$d+1;
    }
    else{
        $d=$d+1;
    }
   $qer ="select * from books where id=$id";
   $res=mysqli_query($con,$qer); 
   while ($rw=mysqli_fetch_array($res))
   {
       $img=$rw["CoverImage"];
       $name=$rw["Title"];
       $rate=$rw["Price"]; 
       $qty="1";
       $total= $rate*$qty;
       $id=$rw["Id"];
   }
if(isset($_COOKIE['item'])){
 foreach($_COOKIE['item'] as $name1 => $value)
 {
  $value11=explode("_",$value);
  $found=0;
  if($img==$value11[0])
  {
   $found=$found+1;
   $qty=$value11[3]+1;
   $total=$value11[2]*$qty;
  setcookie("item[$name1]",$img."_".$name."_".$rate."_".$qty."_".$total."_".$id,time()+300);   }     
 }
    if($found==0)
    {
    setcookie("item[$d]",$img."_".$name."_".$rate."_".$qty."_".$total."_".$id,time()+300);   
    }
}
else
 {
 setcookie("item[$d]",$img."_".$name."_".$rate."_".$qty."_".$total."_".$id,time()+300);     
 }
 echo '<script>alert("Item successfully added to your cart")</script>';
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
    <link rel="stylesheet" href="_single_product.css">
      <title>Product Details</title>
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
					<h2>Single Product Page</h2>
					<div class="page_link">
					    <a href="index.php">Home<i class="fas fa-arrow-right icon"></i></a>
						<a href="category.php?p=1">Books<i class="fas fa-arrow-right icon"></i></a>
						<a href="product_single.php">Description</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================End Home Banner Area =================-->
  
    <!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
        <div class="row">
            <?php
             while($row = mysqli_fetch_array($result))
             {
              ?>
               <div class="col-lg-6">
              <img src="<?php echo $row["CoverImage"]; ?>" class="s_image" alt="product image">
              </div>
            <div class="col-lg-5 about">
               <form name="form1" action="" method="post"> 
                <h3><?php echo $row["Title"]; ?></h3>
                <h6>Description of book</h6>
                <p class="text-justify"><?php echo $row["Description"]; ?></p>
                <h5>₹<?php echo $row["Price"];   ?></h5>
                <h5>Publisher: <?php echo $row["Publisher"];   ?></h5>
                <?php
              while($rw = mysqli_fetch_array($result2))
              {
               ?>
                <h5>Author Name: <?php echo $rw["FirstName"]; echo " "; echo $rw["MiddleName"]; echo " "; echo $rw["LastName"];  ?></h5>   
              <?php        
              }
              ?>  
                <h5>Publish Date: <?php echo $row["PublishDate"];   ?></h5>
                <h5>Availability: <?php echo $row["Qty"];   ?></h5>
                <hr>
                <button type="submit" name="submit1" class="btn btn-outline-success">Add to cart</button>
            </form>
            </div>
            <?php        
             }
             ?>
                      
        </div>        
        </div>
      </div>
	<!--================End Single Product Area =================--> 
    
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