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
                                            <th>Sub Categor</th>
                                            <th>Details</th>
                                            <th>Code</th>
                                            <th>Brand</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $view = "SELECT * FROM `sub_category` s INNER JOIN `category` c ON s.`category`=c.`cid`";
                                        $vrun = mysqli_query($conn, $view);
                                        while($fet = mysqli_fetch_assoc($vrun)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ucwords($fet["category_type"]) ?></td>
                                                <td><?php echo ucwords($fet["scategory_name"]) ?></td>
                                                <td><?php echo ucwords($fet["scategory_details"]) ?></td>
                                                <td><?php echo ucwords($fet["scategory_code"]) ?></td>
                                                <td><?php echo ucwords($fet["scategory_brand"]) ?></td>
                                                <td><?php echo ucwords($fet["scdate"]) ?></td>
                                                
                                                <td><a href="./scategory_update.php?upid=<?php echo $fet["scid"]; ?>">Update</a></td>
                                                <td><a href="./scategory_delete.php?deelid=<?php echo $fet["scid"]; ?>">Delete</a></td>
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