<?php
include("./coonnection.php");
$uid = $_GET["upid"];
$pre_sql = "SELECT * FROM `sub_category` WHERE `scid`='$uid'";
$pre_run = mysqli_query($conn, $pre_sql);
$fpre = mysqli_fetch_assoc($pre_run);
if (isset($_POST["usub"])) {
    $category=mysqli_real_escape_string($conn,$_POST["category"]);
    $scategory_name=strtolower(mysqli_real_escape_string($conn,$_POST["scategory_name"]));
    $scategory_details=mysqli_real_escape_string($conn,$_POST["scategory_details"]);
    $scategory_code=mysqli_real_escape_string($conn,$_POST["scategory_code"]);
    $scategory_brand=mysqli_real_escape_string($conn,$_POST["scategory_brand"]);
    $date=date("l jS \of F Y h:i:s A");
    if(!empty($category) && !empty($scategory_name)){
        $usql="SELECT * FROM `sub_category` where `category`='$category' and `scategory_name`='$scategory_name'";
        $urun=mysqli_query($conn,$usql);
        if(mysqli_num_rows($urun)==0){
            $sql="UPDATE `sub_category` SET `category`='$category', `scategory_name`='$scategory_name', `scategory_details`='$scategory_details',`scategory_code`='$scategory_code', `scategory_brand`='$scategory_brand',`scdate`='$date' WHERE `scid`='$uid'";
            $run=mysqli_query($conn,$sql);
            if($run){
                echo "<script>alert('Date Entered')</script>";
                header("Refresh:3,url=./scategory_view.php");
            }else{
                echo "<script>alert('Date Not Entered')</script>";
            }
        }else{
            echo "<script>alert('Already exists')</script>";
        }
    }else{
        echo "<script>alert('Fill all colums')</script>";
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
                                <div class="col-9">
                                    <h4>Sub-Catogrey </h4>
                                </div>
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
                                    <input type="text" value="<?php echo $fpre['scategory_name'] ?>" class="form-control" name="scategory_name">
                                </div>
                                <div class="form-group ">
                                    <label>Details</label>
                                    <input type="text" class="form-control" value="<?php echo $fpre['scategory_details'] ?>" name="scategory_details">
                                </div>
                                <div class="form-group ">
                                    <label>Sub-Category Code</label>
                                    <input type="text" class="form-control" value="<?php echo $fpre['scategory_code'] ?>" name="scategory_code">
                                </div>
                                <div class="form-group ">
                                    <label>Sub-Category Brand</label>
                                    <input type="text" class="form-control" value="<?php echo $fpre['scategory_brand'] ?>" name="scategory_brand">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" name="usub">Submit</button>
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