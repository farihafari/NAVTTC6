<?php
include("components/header.php");
if (!isset($_SESSION["sessionEmail"])) {
    echo "<script>location.assign('index.php')</script>";
}
if ($_SESSION['sessionRole'] == "admin") {
    echo "<script>location.assign('index.php')</script>";
}
?>


<?php
include("components/footer.php")
?>