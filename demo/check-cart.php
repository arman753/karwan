<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
     include("cdn.php");
    ?>
    <style>
        <?php include("assets/style.css")?>
    </style>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid">
<table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </thead>
        <tbody>
            <?php
                session_start();
                if(!isset($_SESSION['cart']))
                {
                    echo "<tr><td colspan='5'><h4 class='text-success'>No Product Added In Cart</h4></td></tr>";
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
                                <td><img src='".$p['pimage']."' height='50px'/></td>
                                <td>".$p['pprice']."</td>
                                <td>".$p['pquantity']."</td>
                                <td>".$total."</td>
                            </tr>
                        ";
                    }
                    echo "<tr>
                        <td colspan='5' align='right'>Total Amount: ".$totalAmount."</td>
                    </tr>";
                }
            
            ?>
        </tbody>
    </table>
</div>
</body>
</html>