 <?php
    // Start the session
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
    
    // Check if the product ID is provided in the URL
    if (isset($_GET['id'])) {
        $productname = $_GET['id'];
        // Remove product from the cart
        if (isset($_SESSION['cart'][$productname])) {
             // Reduce quantity by 1
            $_SESSION['cart'][$productname]['quantity']--;
            // Remove the product if the quantity reaches 0
            if ($_SESSION['cart'][$productname]['quantity'] < 1) {
                unset($_SESSION['cart'][$productname]);
            }
        }
    }
    
    // Redirect back to the cart page
    header("Location:check-cart.php");
    exit;
 ?>