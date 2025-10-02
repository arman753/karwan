<!-- delete-category.php -->
<?php
    $cid=$_GET['id'];
    include("../connection.php");
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
    $sql="delete from category where cid='$cid'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        header("location:show-category.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>