<?php
include("dbcon.php");
if(isset($_POST['addCategory'])){
  $catName = $_POST['cName'];
  $catImageName= $_FILES['cImage']['name'];
  $catTmpName = $_FILES['cImage']['tmp_name'];
  $extension = pathinfo($catImageName,PATHINFO_EXTENSION);
  $desig = "img/category/".$catImageName;
  if($extension =="jpg" || $extension =="jpeg"|| $extension =="png" || $extension == "webp"){
if(move_uploaded_file($catTmpName,$desig)){
    $query = $pdo->prepare("INSERT INTO `categories`(`catName`, `catImage`) VALUES (:pName,:PImage)");
    $query->bindParam("pName",$catName);
    $query->bindParam("PImage",$catImageName);
    $query->execute();
    echo "<script>alert('category added ')</script>";

}
  }else{
    echo "<script>alert('invalid file type')</script>";
  }

}
?>