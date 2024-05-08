<?php
include("compnent/header.php");
if (isset($_GET['Cid'])) {
    $catstringid = $_GET['Cid'];
    $query = $pdo->prepare("select * from categories where catId=:pid");
    $query->bindParam("pid", $catstringid);
    $query->execute();
    $catData = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row  bg-light rounded  mx-0">
        <div class="col-md-12 ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">update category</h6>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="catId" value="<?php echo $catData['catId'] ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">category name</label>
                        <input type="text" class="form-control" name="cName" aria-describedby="emailHelp" value="<?php echo $catData['catName'] ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" name="cImage" class="form-control" id="exampleInputPassword1">
                        <img src="<?php echo $catref . $catData['catImage'] ?>" width="80" alt="">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="editCategory" class="btn btn-primary">Update category</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->
<?php
include("compnent/footer.php");
?>