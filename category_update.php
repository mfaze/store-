<?php
include("./coonnection.php");
$upid = $_GET["upid"];
$usql = "SELECT * FROM `category` WHERE `cid`='$upid'";
$urun = mysqli_query($conn, $usql);
$pre_fet = mysqli_fetch_assoc($urun);
if (isset($_POST["ub"])) {
    $category_type = strtolower(mysqli_real_escape_string($conn, $_POST["category_type"]));
    $category_details = mysqli_real_escape_string($conn, $_POST["category_details"]);
    $date = date("l jS \of F Y h:i:s A");
    $category_img = $_FILES['category_img']['name'];
    $cimg = strtolower(pathinfo($category_img, PATHINFO_EXTENSION));
    $required = array("jpg", "jpeg", "png");
    if (in_array($cimg, $required)) {
        if (!empty($category_type)) {
            $pic = rand(20, 200000);
            $c_pic = $pic . "." . $cimg;
            $ssql = "SELECT * FROM `category` WHERE `category_type`='$category_type'";
            $srun = mysqli_query($conn, $ssql);
            if ($srun) {
                if (mysqli_num_rows($srun) == 0) {
                    $sql = "UPDATE `category` SET  `category_type`='$category_type' , `category_details`='$category_details',`category_img`='$c_pic', `date`='$date' WHERE `cid`='$upid'";
                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                        echo "<script>alert('Data Update') </script>";
                        header("Refresh:2,url=./category_view.php");
                        move_uploaded_file($_FILES['category_img']['tmp_name'],"./img/".$c_pic);
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
                                <h4>Catogrey</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Catagory Type</label>
                                    <input type="text" value="<?php echo $pre_fet['category_type'] ?>" class="form-control" name="category_type">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Details</label>
                                    <input type="text" class="form-control" value="<?php echo $pre_fet["category_details"] ?>" name="category_details">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Category Image</label>
                                    <input type="file" class="form-control" name="category_img">
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