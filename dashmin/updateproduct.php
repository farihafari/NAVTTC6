<?php
include("compnent/header.php");
if (isset($_GET['proid'])) {
    $urlId = $_GET['proid'];
    $query = $pdo->prepare("select * from products where productId=:pid");
    $query->bindParam("pid", $urlId);
    $query->execute();
    $proData = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row  bg-light rounded  mx-0">
        <div class="col-md-12 ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Products</h6>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="proId" value="<?php echo $proData['productId'] ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product name</label>
                        <input type="text" class="form-control" name="pName" aria-describedby="emailHelp" value="<?php echo $proData['productName'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product price</label>
                        <input type="text" class="form-control" name="pPrice" aria-describedby="emailHelp" value="<?php echo $proData['productPrice'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product quantity</label>
                        <input type="text" class="form-control" name="pQuantity" aria-describedby="emailHelp" value="<?php echo $proData['productQuantity'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product category</label>
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="pCatId">
                            <option selected hidden>select anyone</option>
                            <?php
                            $query = $pdo->query("select * from categories");
                            $row  = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($row as $values) {
                            ?>
                                <option value="<?php echo $values['catId'] ?>" <?= $proData['productCatId'] == $values['catId'] ? 'selected' : "" ?>><?php echo $values['catName'] ?></option>
                            <?php
                            }
                            ?>


                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product description</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;" name="pDescription"><?php echo $proData['productDesscription'] ?></textarea>
                            <label for="floatingTextarea">description</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" name="pImage" class="form-control" id="exampleInputPassword1">
                        <img src="<?php echo $proRef . $proData['productImage'] ?>" width="90" alt="">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="updateProduct" class="btn btn-primary">add product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->
<?php
include("compnent/footer.php");
?>