<?php
include("./coonnection.php");
$upid=$_GET["upid"];
$psql="SELECT * FROM `suppliers` WHERE `sid`='$upid'";
$prun=mysqli_query($conn,$psql);
$pfet=mysqli_fetch_assoc($prun);
if(isset($_POST["isb"])){
    $name=strtolower(mysqli_real_escape_string($conn,$_POST["name"]));
    $category=mysqli_real_escape_string($conn,$_POST['category']);
    $scategory=mysqli_real_escape_string($conn,$_POST['scategory']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $number=mysqli_real_escape_string($conn,$_POST['number']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $date=date("l jS \of F Y h:i:s A");
    if(!empty($name)){
        if(!empty($category)){
            if(!empty($number)){
                $sql="UPDATE `suppliers` SET `name`='$name', `category`='$category', `scategory`='$scategory', `email`='$email', `number`='$number',`address`='$address',`date`='$date' WHERE `sid`='$upid'";
                $run=mysqli_query($conn,$sql);
                if($run){
                    echo "<script>alert('Data Updated')</script>";
                    header("Refresh:3,url=./suplier_view.php");
                }else{
                    echo "<script>alert('Data Not Updated')</script>";
                }
            }else{
                echo "<script>alert('Write Supplier Number')</script>";
            }
        }else{
            echo "<script>alert('Write Supplier Category')</script>";
        }
    }else{
        echo "<script>alert('Write Supplier Name')</script>";
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
                           
                            <div class="card-header mt-4 ">
                                <div class="col-9"><h4>Suppliers</h4></div>
                                <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./category_view.php">View</a></div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="<?php echo $pfet['name']?>" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <input type="text" value="<?php echo $pfet['category']?>" class="form-control" value="" name="category">
                                </div>
                                <div class="form-group">
                                    <label>Product Sub-Category</label>
                                    <input type="text" class="form-control" value="<?php echo $pfet['scategory']?>" name="scategory">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Email</label>
                                    <input type="email" value="<?php echo $pfet['email']?>" class="form-control" name="email">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo $pfet['number']?>" name="number">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Adderss</label>
                                    <input type="text" class="form-control" value="<?php echo $pfet['address']?>" name="address">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" name="isb">Submit</button>
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