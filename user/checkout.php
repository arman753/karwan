<?php
    include("../connection.php");
    $date=date('Y-m-d');
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
    $email=$_SESSION['email'];
    $sql="select * from register where email='$email'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
        while($r=mysqli_fetch_assoc($res))
        {
            $name=$r['name'];
            $contact=$r['contact'];
            $address=$r['address'];
        }
    }
    $totalAmount=0;
    foreach($_SESSION['cart'] as $p)
    {
        $total=$p['pprice']*$p['pquantity'];
        $totalAmount+=$total;
    }
    if(isset($_POST['sub']))
    {
        $cname=$_POST['name'];
        $ccontact=$_POST['contact'];
        $caddress=$_POST['address'];
        $cstate=$_POST['state'];
        $ccity=$_POST['city'];
        $pin=$_POST['pin'];
        $sql2="select * from order_status";
        $res2=mysqli_query($con,$sql2);
        $oid=mysqli_num_rows($res2)+1;
        foreach($_SESSION['cart'] as $pq)
        {
            $sql1="insert into orderrs(orderid,name,contact,email,address,state,city,pincode,date,productname,productquantity,productprice,productimage)values('$oid','$cname','$ccontact','$email','$caddress','$cstate','$ccity','$pin','$date','$pq[pname]','$pq[pquantity]','$pq[pprice]','$pq[pimage]')";
            $res1=mysqli_query($con,$sql1);
            if($res1)
            {

            }
        }
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
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col-lg-12 d-flex justify-content-center">
            <img src="../assets/logo6.png" height="80" alt="">
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="row bg-light">
        <div class="col-lg-6">
            <form  method="post">
                <div class="row my-4">
                    <div class="col-lg-4"><b>Product Name</b></div>
                    <div class="col-lg-4"><b>Quantity</b></div>
                    <div class="col-lg-4"><b>Price</b></div>
                </div>
                <div class="row my-4">
                    <?php
                    foreach($_SESSION['cart'] as $q)
                    {
                        echo '
                           <div class="col-lg-4">'.$q['pname'].'</div>
                             <div class="col-lg-4">'.$q['pquantity'].'</div>
                           <div class="col-lg-4">'.$q['pprice']*$q['pquantity'].'</div>
                        ';
                    }
                 
                    ?>
                </div>
                <div class="row my-4">
                    <div class="col-lg-8 my-3">Subtotal</div>
                    <div class="col-lg-4 my-3"><?php if(isset($totalAmount)) echo $totalAmount ?></div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-8 my-3">Shipping</div>
                    <div class="col-lg-4 my-3">20/-</div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-12 my-3">(Above $299 there is no delivery charge.)</div>
                </div>
                <div class="row my-4">
                    <div class="col-lg-6"><h4>Grand Total</h4></div>
                    <div class="col-lg-6">
                        <?php
                        if(isset($totalAmount)) echo $totalAmount+20
                        ?>
                    </div>
                </div>
            </form>
        </div>
            <div class="col-lg-6">
                <form  method="post">
                    <h4>Contact</h4>
                    <div class="row">
                        <div class="form-group my-3">
                           <b> <?php if(isset($email))echo $email ?></b>
                        </div> 
                    </div>
                    <h4>Delivery</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group my-3">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group my-3">
                           <input type="text" name="address" placeholder="Adddress" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group my-3">
                                <select name="state" id="" class="form-control">
                                     <option value="Aagra">Aagra</option>
                                     <option value="Lucknow">Lucknow</option>
                                     <option value="Kanpur">Kanpur</option>
                                     <option value="Sulatanpr">Sultanpur</option>
                                     <option value="Pratapgarh">Pratapgarh</option>
                                     <option value="Jaunpur">Jaunpur</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group my-3">
                                <input type="text" name="city" placeholder="City" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group my-3">
                                <input type="text" name="pin" placeholder="Pin" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group my-3">
                            <input type="text" name="contact" placeholder="Phone" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group my-3">
                            <input type="submit" value="Cash On Delivery" name="sub" class="btn btn-warning form-control text-light">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <input type="submit" value="Pay Now" name="sub" class="btn btn-warning form-control text-light">
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>