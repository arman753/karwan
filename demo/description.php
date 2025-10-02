<?php

    $pid=$_GET['pid'];
    include("connection.php");
    $sql="select * from product where pid='$pid'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($r=mysqli_fetch_assoc($res))
        {
            $pname=$r['pname'];
            $pdescription=$r['pdiscription'];
            $ppicture=$r['ppicture'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Description</title>
  <style>
    <?php
        include("assets/style.css");
    ?>
  </style>
  <?php   
    include("cdn.php");
    ?>
</head>
<body>
    <?php   
    include("header.php");
    ?>
  <div class="container py-5 ">
   <div class="row align-items-center border rounded shadow p-4">
      <!-- Left Image -->
      <div class="col-md-4">
        <?php
            echo '<img src="'.$ppicture.'">';
        ?>
      </div>
      <!-- Right Description -->
      <div class="col-md-8">
        <h1 class="display-6"><?php if(isset($pname)) echo $pname; ?></h1>
        <p class="text-muted">
          <?php if(isset($pdescription)) echo $pdescription; ?>
        </p>
        <a href="login.php" class="btn btn-info">Buy Now</a>
      </div>
    </div>
  </div>
   <?php 
   include("footer.php");  
  ?> 
</body>
</html>