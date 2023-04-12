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
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Sub category</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $view = "SELECT * FROM `suppliers`";
                                        $vrun = mysqli_query($conn, $view);
                                        while ($fet = mysqli_fetch_assoc($vrun)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ucwords($fet["name"]) ?></td>
                                                <td><?php echo ucwords($fet["category"]) ?></td>
                                                <td><?php echo ucwords($fet["scategory"]) ?></td>
                                                <td><?php echo $fet["email"] ?></td>
                                                <td><?php echo ucwords($fet["number"]) ?></td>
                                                <td><?php echo ucwords($fet["address"]) ?></td>
                                                <td><a href="./suplier_update.php?upid=<?php echo $fet["sid"]; ?>">Update</a></td>
                                                <td><a href="./suplier_delete.php?dlid=<?php echo $fet["sid"]; ?>">Delete</a></td>
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