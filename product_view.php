<?php
include("./coonnection.php");
include("./navbar.php");
include("./sider.php");
?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Supplier</th>
                                            <th>Product Title</th>
                                            <th>Description</th>
                                            <th>Product Code</th>
                                            <th>Purchase Price</th>
                                            <th>Sale Price</th>
                                            <th>Discount Price</th>
                                            <th>Quantity</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $view = "SELECT * FROM `product` p INNER JOIN `category` c ON p.`pcategory`=c.`cid` INNER JOIN `sub_category` sc ON p.`pscategory`=sc.`scid` INNER JOIN `suppliers` su ON p.`psupplier`=su.`sid` INNER JOIN `quant` q ON p.`quantity`=q.`qid`";
                                        $vrun = mysqli_query($conn, $view);
                                        while ($fet = mysqli_fetch_assoc($vrun)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ucwords($fet['category_type']) ?></td>
                                                <td><?php echo ucwords($fet['scategory_name']) ?></td>
                                                <td><?php echo ucwords($fet['name']) ?></td>
                                                <td><?php echo ucwords($fet['title']) ?></td>
                                                <td><?php echo $fet['description'] ?></td>
                                                <td><?php echo $fet['code'] ?></td>
                                                <td><?php echo $fet['p_price'] ?></td>
                                                <td><?php echo $fet['s_price'] ?></td>
                                                <td><?php echo $fet['d_price'] ?></td>
                                                <td><?php echo $fet['quantity'] ?></td>
                                                <td><?php echo $fet['stock'] ?></td>
                                                <td><?php echo $fet['status'] ?></td>
                                                <td><img src="<?php echo "./img/" . $fet["product_img"] ?>" alt="" width="50" height="50"></td>
                                                <td></td>
                                                
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php
include("./footer.php");
?>