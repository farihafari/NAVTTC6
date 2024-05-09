<?php
include("compnent/header.php");
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row bg-light rounded  mx-0">
        <div class="col-md-12">
            <h6 class="mb-4">All products</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col"> Name</th>
                        <th scope="col"> Price</th>
                        <th scope="col"> Quantity</th>
                        <th scope="col"> Description</th>
                        <th scope="col"> Category Name</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="px-5" colspan="2">Action</th>

                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $query = $pdo->query("SELECT `products`.*, `categories`.`catName`
FROM `products` 
	inner JOIN `categories` ON `products`.`productCatId` = `categories`.`catId`;");
                    $proRow = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($proRow as $values) {
                    ?>
                        <tr>
                            <td><?php echo $values['productId'] ?></td>
                            <td><?php echo $values['productName'] ?></td>
                            <td><?php echo $values['productPrice'] ?></td>
                            <td><?php echo $values['productQuantity'] ?></td>
                            <td><?php echo $values['productDesscription'] ?></td>
                            <td><?php echo $values['catName'] ?></td>
                            <td><img src="<?php echo $proRef . $values['productImage'] ?>" alt="" width="90"></td>
                            <td><a href="" class="btn btn-success">Edit</a></td>
                            <td><a href="" class="btn btn-danger">delete</a></td>
                        </tr>

                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Blank End -->

<?php
include("compnent/footer.php");
?>