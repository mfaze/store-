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
                                            <th>Category Details</th>
                                            <th>Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $view = "SELECT * FROM `quant`";
                                        $vrun = mysqli_query($conn, $view);
                                        while($fet = mysqli_fetch_assoc($vrun)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $fet["quantity"] ?></td>
                                                <td><?php echo $fet["quantity_detail"] ?></td>
                                                <td><?php echo $fet["qdate"] ?></td>
                                                <td><a href="./quantity_update.php?upid=<?php echo $fet["qid"]; ?>">Update</a></td>
                                                <td><a href="./quantity_delete.php?delid=<?php echo $fet["qid"]; ?>">Delete</a></td>
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