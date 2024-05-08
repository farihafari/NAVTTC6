<?php
include("dbcon.php");
// category ref
$catref = 'img/category/';
// add category
if (isset($_POST['addCategory'])) {
  $catName = $_POST['cName'];
  $catImageName = $_FILES['cImage']['name'];
  $catTmpName = $_FILES['cImage']['tmp_name'];
  $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
  $desig = "img/category/" . $catImageName;
  if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
    if (move_uploaded_file($catTmpName, $desig)) {
      $query = $pdo->prepare("INSERT INTO `categories`(`catName`, `catImage`) VALUES (:pName,:PImage)");
      $query->bindParam("pName", $catName);
      $query->bindParam("PImage", $catImageName);
      $query->execute();
      echo "<script>alert('category added ')</script>";
    }
  } else {
    echo "<script>alert('invalid file type')</script>";
  }
}
// update category 
if (isset($_POST['editCategory'])) {
  $catId = $_POST['catId'];
  $catName = $_POST['cName'];
  if (!empty($_FILES['cImage']['name'])) {


    $catImageName = $_FILES['cImage']['name'];
    $catTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($catImageName, PATHINFO_EXTENSION);
    $desig = "img/category/" . $catImageName;
    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp") {
      if (move_uploaded_file($catTmpName, $desig)) {
        $query = $pdo->prepare("update categories set catName = :pName ,catImage = :PImage where catId = :Pid");
        $query->bindParam("Pid", $catId);
        $query->bindParam("pName", $catName);
        $query->bindParam("PImage", $catImageName);
        $query->execute();
        echo "<script>alert('category updated ');
      location.assign('viewcategory.php')
      </script>";
      }
    } else {
      echo "<script>alert('invalid file type')</script>";
    }
  } else {
    $query = $pdo->prepare("update categories set catName = :pName  where catId = :Pid");
    $query->bindParam("Pid", $catId);
    $query->bindParam("pName", $catName);
    $query->execute();
    echo "<script>alert('category updated without image');
      location.assign('viewcategory.php')
      </script>";
  }
}
// delete 
if (isset($_GET['deleteKey'])) {
  $catId = $_GET['deleteKey'];
  $query = $pdo->prepare("delete from categories where catId= :pid");
  $query->bindParam("pid", $catId);
  $query->execute();
  echo "<script>alert('category delete');
  location.assign('viewcategory.php')
  </script>";
}
