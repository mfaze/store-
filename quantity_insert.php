<?php
include("./coonnection.php");
if (isset($_POST["sub"])) {
    $quantity = strtolower(mysqli_real_escape_string($conn, $_POST["quantity"]));
    $quantity_details = mysqli_real_escape_string($conn, $_POST["quantity_details"]);
    $date = date("l jS \of F Y h:i:s A");
    if (!empty($quantity)) {
        $sql = "SELECT * FROM `quant` WHERE `quantity`='$quantity'";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            if (mysqli_num_rows($run) == 0) {
                $csql = "INSERT INTO `quant`(`quantity`,`quantity_detail`,`qdate`)VALUE('$quantity','$quantity_details','$date')";
                $crun = mysqli_query($conn, $csql);
                if ($crun) {
                    echo "<script>alert('Data Inserted') </script>";
                } else {
                    echo "<script>alert('Data Not Inserted') </script>";
                }
            } else {
                echo "<script>alert('Already Entered') </script>";
            }
        }
    } else {
        echo "<script>alert('Fill All ') </script>";
    }
}
include("./navbar.php");
include("./sider.php");
?>
<!-- Main Content -->
<div class="main-content">
    <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form>
                           
                            <div class="card-header mt-4 ">
                                <div class="col-9"><h4>Quantity </h4></div>
                                <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./quantity_view.php">View</a></div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" class="form-control" name="quantity">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="quantity_details">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" name="sub">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include("./footer.php");
?>