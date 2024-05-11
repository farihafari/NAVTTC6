<?php
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
