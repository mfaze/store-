<?php
include("./coonnection.php");
$upid = $_GET["upid"];
$usql = "SELECT * FROM `quant` WHERE `qid`='$upid'";
$urun = mysqli_query($conn, $usql);
$pre_fet = mysqli_fetch_assoc($urun);
if (isset($_POST["ub"])) {
    $quantity = strtolower(mysqli_real_escape_string($conn, $_POST["quantity"]));
    $quantity_detail = mysqli_real_escape_string($conn, $_POST["quantity_detail"]);
    $date = date("l jS \of F Y h:i:s A");
    if (!empty($quantity)) {
        $ssql = "SELECT * FROM `quant` WHERE `quantity`='$quantity'";
        $srun = mysqli_query($conn, $ssql);
        if ($srun) {
            if (mysqli_num_rows($srun) == 0) {
                $sql = "UPDATE `quant` SET  `quantity`='$quantity' , `quantity_detail`='$quantity_detail', `qdate`='$date' WHERE `qid`='$upid'";
                $run = mysqli_query($conn, $sql);
                if ($run) {
                    echo "<script>alert('Data Update') </script>";
                    header("Refresh:2,url=./quantity_view.php");
                } else {
                    echo "<script>alert('Data Not Update') </script>";
                }
            } else {
                echo "<script>alert('Category Already exists ') </script>";
            }
        }
    } else {
        echo "<script>alert('Fill All ') </script>";
    }
}
include('./navbar.php');
include('./sider.php');
?>
<div class="main-content">
    <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form>
                            <div class="card-header">
                                <h4>Quantity</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" value="<?php echo $pre_fet['quantity'] ?>" class="form-control" name="quantity">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Details</label>
                                    <input type="text" class="form-control" value="<?php echo $pre_fet["quantity_detail"] ?>" name="quantity_detail">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" name="ub">update</button>
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