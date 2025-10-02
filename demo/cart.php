<?php
    session_start();
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart']=[];
    }
    $pname=$_POST['pname'];
    $pimage=$_POST['pimage'];
    $pprice=$_POST['pprice'];
    $pquantity=$_POST['pquantity'];
    $pcat=$_POST['pcat'];
   
    if($_SESSION['cart'][$pname])
    {
        $_SESSION['cart'][$pname]['pquantity']+=1;
    }
    else
    {
        $_SESSION['cart'][$pname]=['pname'=>$pname,'pimage'=>$pimage,'pprice'=>$pprice,'pquantity'=>$pquantity];
    }
    $n=count($_SESSION['cart']);
    $_SESSION['count']=$n;
    echo "<script>
        alert('Product Addedd In Cart');
        window.location='product.php?pcategory=".$pcat."';
    </script>";
?>