<?php
session_start();
// session_unset();
$catImgRef = "../dashmin/img/category/";
$proImgRef = "../dashmin/img/products/";
// session_unset();
include("dbcon.php");
if (isset($_POST['register'])) {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $userNumber = $_POST['number'];
    $query = $pdo->prepare("insert into users (name,email,password,phone) values (:un,:ue,:up,:unum)");
    $query->bindParam("un", $userName);
    $query->bindParam("ue", $userEmail);
    $query->bindParam("up", $userPassword);
    $query->bindParam("unum", $userNumber);
    $query->execute();
    echo "<script>alert('registered your account successfully')
    location.assign('login.php')
    </script>";
}
// login 
if (isset($_POST['login'])) {
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $query = $pdo->prepare("select * from users where email=:ue && password=:up");
    $query->bindParam("ue", $userEmail);
    $query->bindParam("up", $userPassword);

    $query->execute();
    $userData = $query->fetch(PDO::FETCH_ASSOC);
    if ($userData) {
        $_SESSION['sessionEmail'] = $userData['email'];
        $_SESSION['sessionName'] = $userData['name'];
        $_SESSION['sessionPassword'] = $userData['password'];
        $_SESSION['sessionRole'] = $userData['role'];
        if ($_SESSION['sessionRole'] == "user") {
            echo "<script>alert('logged in successfully');
            location.assign('customer.php')
            </script>";
        } else {
            echo "<script>alert('logged in successfully');
            location.assign('../dashmin/index.php')
            </script>";
        }
    }
}
// add to cart
if (isset($_POST['addToCart'])) {
    $pId = $_POST['proId'];
    $pName = $_POST['proName'];
    $pPrice = $_POST['proPrice'];
    $pQuantity = $_POST['proQuantity'];
    $pImage = $_POST['proImage'];
    if (isset($_SESSION['cart'])) {
        $cartExist = false;

        foreach ($_SESSION['cart'] as $key => $values) {
            if ($values['pId'] == $pId) {

                $_SESSION['cart'][$key]['pQuantity'] += $pQuantity;
                $cartExist = true;
                echo "<script>alert('cart has been updated')</script>";
                break;
            }
        }
        if (!$cartExist) {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]
                = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
            echo "<script>alert('product add into cart')</script>";
        }
    } else {
        $_SESSION['cart'][0] = array("pId" => $pId, "pName" => $pName, "pQuantity" => $pQuantity, "pPrice" => $pPrice, "pImage" => $pImage);
        echo "<script>alert('product add into cart')</script>";
        // print_r($_SESSION['cart']);
    }
}
// delete item
if (isset($_GET['deleteCart'])) {
    $CartID = $_GET['deleteCart'];
    foreach ($_SESSION['cart'] as $key => $values) {
        if ($values['pId'] == $CartID) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "<script>alert('product remove from cart');
            location.assign('shoping-cart.php');
            </script>";
        }
    }
}
