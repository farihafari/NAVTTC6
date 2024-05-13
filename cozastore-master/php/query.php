<?php
session_start();
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
