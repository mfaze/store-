<?php
include("./coonnection.php");
if (isset($_POST['sc'])) {
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $scategory_name = strtolower(mysqli_real_escape_string($conn, $_POST['scategory_name']));
    $sccategory_details = mysqli_real_escape_string($conn, $_POST['scategory_details']);
    $scategory_code = mysqli_real_escape_string($conn, $_POST['scategory_code']);
    $scategory_brand = mysqli_real_escape_string($conn, $_POST['scategory_brand']);
    $scdate = date("l jS \of F Y h:i:s A");
    if (!empty($category) && !empty($scategory_name)) {
        $ssql = "SELECT * FROM `sub_category` WHERE `category`='$category' and `scategory_name`='$scategory_name' and `scategory_code`='$scategory_code'";
        $srun = mysqli_query($conn, $ssql);
        if (mysqli_num_rows($srun) == 0) {
            $sql = "INSERT INTO `sub_category`(`category`,`scategory_name`,`scategory_details`,`scategory_code`,`scategory_brand`,`scdate`)VALUE('$category','$scategory_name','$sccategory_details','$scategory_code','$scategory_brand','$scdate')";
            $irun = mysqli_query($conn, $sql);
            if ($irun) {
                echo "<script>alert('Data Entered')</script>";
            } else {
                echo "<script>alert('Data Not Entered')</script>";
            }
        } else {
            echo "<script>alert('Already entered')</script>";
        }
    } else {
        echo "<script>alert('Fill All Fileds')</script>";
    }
}
include("./navbar.php");
include("./sider.php");
?>
<div class="main-content">
    <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form-body">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form>
                            <div class="card-header mt-4">
                                <div class="col-9"><h4>Sub-Catogrey </h4></div>
                                <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./scategory_view.php">View</a></div>
                            </div>

                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Category </label>
                                    <select class="form-control" name="category" id="">
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        $sql = "SELECT * FROM `category`";
                                        $run = mysqli_query($conn, $sql);
                                        while ($category_fetch = mysqli_fetch_assoc($run)) {
                                        ?>
                                            <option value="<?php echo $category_fetch["cid"]; ?>"><?php echo $category_fetch["category_type"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Sub-Catagory Name</label>
                                    <input type="text" class="form-control" name="scategory_name">
                                </div>
                                <div class="form-group ">
                                    <label>Details</label>
                                    <input type="text" class="form-control" name="scategory_details">
                                </div>
                                <div class="form-group ">
                                    <label>Sub-Category Code</label>
                                    <input type="text" class="form-control" name="scategory_code">
                                </div>
                                <div class="form-group ">
                                    <label>Sub-Category Brand</label>
                                    <input type="text" class="form-control" name="scategory_brand">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" name="sc">Submit</button>
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