<?php 
if(!isset($_SESSION['email']))
{
    header("location:../login.php");
}
if(isset($_SESSION['count']))
{
    $count=$_SESSION['count'];
}
else
{
    $count='';
}
?>
<div class="sticky-top">
<div class="container-fluid bg-light">
    <div class="row mt-1">
        <div class="col-lg-6 brand">
            <a href="" class="brand"><h3><img src="../assets/logo6.png" height="60" alt=""></h3></a>
        </div>
        <div class="col-lg-6 d-flex justify-content-end align-items-center">
         <nav class="nav"> 
           <li class="nav-item">
              <a href="check-cart.php" class="nav-link">
                   <i class="fa fa-cart-plus" style="font-size:30px"></i><span class="text-warning">  cart<?php if(isset($count)) echo $count ?></span>
               </a>
           </li>
            <li class="nav-item">
               <a href="profile.php" class="nav-link">
                <i class="fa fa-user-circle" style="font-size:30px"></i><span class="text-warning">  profile</span>
               </a>
            </li>
         </nav>
        </div>
    </div>
</div>
<div class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Grocery" class="nav-link">Grocery</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Electronics" class="nav-link">Electronics</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Mobile" class="nav-link">Mobile</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Clothes" class="nav-link">Clothes</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Furniture" class="nav-link">Furniture</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Beauty" class="nav-link">Beauty</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Toys" class="nav-link">Toys</a>
            </li>
            <li class="nav-item">
                <a href="product.php?pcategory=Sports" class="nav-link">Sports</a>
            </li>
        </ul>
        <form action="product.php" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" name="pcategory" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
    </div>
</div>
</div>