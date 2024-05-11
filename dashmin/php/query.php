<?php
include("dbcon.php");
// category ref
$catref = 'img/category/';
$proRef = 'img/products/';
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
// add product 
if (isset($_POST['addProduct'])) {
  $productName = $_POST['pName'];
  $productPrice = $_POST['pPrice'];
  $productQuantity = $_POST['pQuantity'];
  $productDescription = $_POST['pDescription'];
  $productCatId = $_POST['pCatId'];
  $productImageName = $_FILES['pImage']["name"];
  $productTmpName = $_FILES['pImage']["tmp_name"];
  $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
  $desig = "img/products/" . $productImageName;
  if ($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "webp") {
    if (move_uploaded_file($productTmpName, $desig)) {
      $query = $pdo->prepare("INSERT INTO `products`(`productName`, `productQuantity`, `productPrice`, `productDesscription`, `productCatId`,`productImage`) VALUES(:pn,:pq,:pp,:pd,:pc,:pi)");
      $query->bindParam("pn", $productName);
      $query->bindParam("pq", $productQuantity);
      $query->bindParam("pp", $productPrice);
      $query->bindParam("pd", $productDescription);
      $query->bindParam("pc", $productCatId);
      $query->bindParam("pi", $productImageName);
      $query->execute();
      echo "<script>alert('product added ')</script>";
    } else {
      echo "<script>alert('file not uploaded')</script>";
    }
  } else {
    echo "<script>alert('invalid file type')</script>";
  }
}
// update product
if (isset($_POST['updateProduct'])) {
  $productId = $_POST['proId'];
  $productName = $_POST['pName'];
  $productPrice = $_POST['pPrice'];
  $productQuantity = $_POST['pQuantity'];
  $productDescription = $_POST['pDescription'];
  $productCatId = $_POST['pCatId'];
  if (!empty($_FILES['pImage']['name'])) {
    $productImageName = $_FILES['pImage']["name"];
    $productTmpName = $_FILES['pImage']["tmp_name"];
    $extension = pathinfo($productImageName, PATHINFO_EXTENSION);
    $desig = "img/products/" . $productImageName;
    if ($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "webp") {
      if (move_uploaded_file($productTmpName, $desig)) {
        $query = $pdo->prepare("UPDATE `products` SET `productName`= :pn,`productQuantity`=:pq,`productPrice`=:pp,`productDesscription`=:pd,`productImage`=:pi,`productCatId`=:pc WHERE productId = :pid");
        $query->bindParam('pid', $productId);
        $query->bindParam("pn", $productName);
        $query->bindParam("pq", $productQuantity);
        $query->bindParam("pp", $productPrice);
        $query->bindParam("pd", $productDescription);
        $query->bindParam("pc", $productCatId);
        $query->bindParam("pi", $productImageName);
        $query->execute();
        echo "<script>alert('product updated ');
          location.assign('viewproduct.php');</script>";
      } else {
        echo "<script>alert('file not uploaded')</script>";
      }
    } else {
      echo "<script>alert('invalid file type')</script>";
    }
  } else {
    $query = $pdo->prepare("UPDATE `products` SET `productName`= :pn,`productQuantity`=:pq,`productPrice`=:pp,`productDesscription`=:pd,`productCatId`=:pc WHERE productId = :pid");
    $query->bindParam('pid', $productId);
    $query->bindParam("pn", $productName);
    $query->bindParam("pq", $productQuantity);
    $query->bindParam("pp", $productPrice);
    $query->bindParam("pd", $productDescription);
    $query->bindParam("pc", $productCatId);
    $query->execute();
    echo "<script>alert('product updated without');
    location.assign('viewproduct.php');
    </script>";
  }
}
// delete product
if (isset($_GET['deletepro'])) {
  $proDelete = $_GET['deletepro'];
  $query = $pdo->prepare('delete from products where productId = :pid');
  $query->bindParam("pid", $proDelete);
  $query->execute();
  echo "<script>alert('delete product');
    location.assign('viewproduct.php');
    </script>";
}
