<?php
include("./coonnection.php");
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
                $sql="INSERT INTO `suppliers`(`name`,`category`,`scategory`,`email`,`number`,`address`,`date`)VALUE('$name','$category','$scategory','$email','$number','$address','$date')";
                $run=mysqli_query($conn,$sql);
                if($run){
                    echo "<script>alert('Data Inserted')</script>";
                }else{
                    echo "<script>alert('Data Not Inserted')</script>";
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
                                <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./suplier_view.php">View</a></div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <input type="text" class="form-control" value="" name="category">
                                </div>
                                <div class="form-group">
                                    <label>Product Sub-Category</label>
                                    <input type="text" class="form-control" name="scategory">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="number">
                                </div>
                                <div class="form-group mb-0">
                                    <label>Adderss</label>
                                    <input type="text" class="form-control" name="address">
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