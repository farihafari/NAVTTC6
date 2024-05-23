<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
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
        $_SESSION['sessionId'] = $userData['id'];
        $_SESSION['sessionEmail'] = $userData['email'];
        $_SESSION['sessionName'] = $userData['name'];
        $_SESSION['sessionPassword'] = $userData['password'];
        $_SESSION['sessionPhone'] = $userData['phone'];
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
// placeorder
if (isset($_POST['orderPlace'])) {
    date_default_timezone_set("Asia/karachi");
    $now = time();
    $dateString = date("Y-m-d H:i:s", $now);
    $time = date("H:i:s", strtotime($dateString));
    // echo "<script>
    // alert('" . $dateString . "')
    // alert('" . $time . "')</script>";
    function confirmationCode()
    {
        $code = str_pad(rand(0, pow(10, 6) - 1), 6, 0, STR_PAD_LEFT);
        return '#od' . $code;
    }


    $userId = $_SESSION['sessionId'];
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $confirmationCode = confirmationCode();
    foreach ($_SESSION['cart'] as $orderkey => $ordervalues) {
        $proId = $ordervalues['pId'];
        $proName = $ordervalues['pName'];
        $proQuantity = $ordervalues['pQuantity'];
        $proPrice = $ordervalues['pPrice'];
        $proImage = $ordervalues['pImage'];
        $orderQuery = $pdo->prepare("INSERT INTO `orders`( `productId`, `productName`, `productPrice`, `productQuantity`, `userId`, `orderDate`, `orderTime`, `productImage`,`confirmationcode`) VALUES(:opi,:opn,:opp,:opq,:oui,:od,:ot,:opim,:ccode)");
        $orderQuery->bindParam("opi", $proId);
        $orderQuery->bindParam("opn", $proName);
        $orderQuery->bindParam("opq", $proQuantity);
        $orderQuery->bindParam("opp", $proPrice);
        $orderQuery->bindParam("oui", $userId);
        $orderQuery->bindParam("opim", $proImage);
        $orderQuery->bindParam("od", $dateString);
        $orderQuery->bindParam("ot", $time);
        $orderQuery->bindParam("ccode", $confirmationCode);

        $orderQuery->execute();
    }
    $itemCount = count($_SESSION['cart']);
    $pQuantityCount = 0;
    $pTotal = 0;
    $invoiceQuery = $pdo->prepare("INSERT INTO `invoices`( `userId`, `userEmail`, `userName`, `itemCount`, `totalQuantity`, `totalAmount`, `invoiceDate`, `invoiceTime`,`confirmationcode`) VALUES(:iui,:iue,:iun,:itc,:itq,:ita,:id,:it,:icc) ");

    $invoiceQuery->bindParam("iui", $userId);
    $invoiceQuery->bindParam("iue", $userEmail);
    $invoiceQuery->bindParam("iun", $userName);
    $invoiceQuery->bindParam("itc", $itemCount);
    $invoiceQuery->bindParam("id", $dateString);
    $invoiceQuery->bindParam("it", $time);
    $invoiceQuery->bindParam("icc", $confirmationCode);
    foreach ($_SESSION['cart'] as $invoicevalues) {
        $pQuantityCount += $invoicevalues['pQuantity'];
        $pTotal += $invoicevalues['pQuantity'] * $invoicevalues['pPrice'];
    }
    $invoiceQuery->bindParam("itq", $pQuantityCount);
    $invoiceQuery->bindParam("ita", $pTotal);
    $invoiceQuery->execute();
    unset($_SESSION['cart']);
    echo "<script>alert('order placed successfully');
    location.assign('index.php');
    </script>";
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'farihaaptech888@gmail.com';                     //SMTP username
        $mail->Password   = 'rkbokfhbogfyolco';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('farihaaptech888@gmail.com', 'fariha');
        $mail->addAddress($userEmail, $_SESSION['sessionName']);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmation of order';
        $mail->Body    = 'Dear ' . $_SESSION['sessionName'] . ' your order confirmation code is ' . $confirmationCode . '</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
