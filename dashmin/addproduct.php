<?php
include("compnent/header.php");
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row  bg-light rounded  mx-0">
        <div class="col-md-12 ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Products</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product name</label>
                        <input type="text" class="form-control" name="cName" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product price</label>
                        <input type="text" class="form-control" name="cName" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product quantity</label>
                        <input type="text" class="form-control" name="cName" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product description</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"></textarea>
                            <label for="floatingTextarea">description</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" name="cImage" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="addCategory" class="btn btn-primary">add product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Blank End -->
<?php
include("compnent/footer.php");
?>