<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
     include("../cdn.php");
    ?>
    <style>
        <?php include("../assets/style.css")?>
    </style>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid p-0">
<table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php
                
                if(!isset($_SESSION['cart']))
                {
                    echo "<tr><td colspan='6'><h4 class='text-warning'>No Product Added In Cart</h4></td></tr>";
                    exit;
                }
                else{
                    $totalAmount=0;
                    foreach($_SESSION['cart'] as $p)
                    {
                        $total=$p['pprice']*$p['pquantity'];
                        $totalAmount+=$total;
                        echo"
                            <tr>
                                <td>".$p['pname']."</td>
                                <td><img src='../".$p['pimage']."' height='50px'/></td>
                                <td>".$p['pprice']."</td>
                                <td>".$p['pquantity']."</td>
                                <td class='align-center'>
                                   <a href='remove.php?id=".$p['pname']."' class='text-danger'>
                                      remove
                                   </a>
                                </td>
                                <td>".$total."</td>
                            </tr>
                        ";
                    }
                    echo "<tr>
                        <td colspan='6' align='right'>Total Amount: ".$totalAmount."</td>
                    </tr>";
                }
            
            ?>
        </tbody>
    </table>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="checkout.php" class="btn btn-warning">Place Order</a>
        </div>
    </div>
</div>
</body>
</html>