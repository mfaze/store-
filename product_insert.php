<?php
include("./coonnection.php");
if (isset($_POST['sc'])) {
    $pcategory=mysqli_real_escape_string($conn,$_POST['pcategory']);
    $pscategory=mysqli_real_escape_string($conn,$_POST['pscategory']);
    $psupplier=mysqli_real_escape_string($conn,$_POST['psupplier']);
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $code=mysqli_real_escape_string($conn,$_POST['code']);
    $p_price=mysqli_real_escape_string($conn,$_POST['p_price']);
    $s_price=mysqli_real_escape_string($conn,$_POST['s_price']);
    $d_price=mysqli_real_escape_string($conn,$_POST['d_price']);
    $quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
    $stock=mysqli_real_escape_string($conn,$_POST['stock']);
    $status=mysqli_real_escape_string($conn,$_POST['status']);
    $product_img=$_FILES['product_img']['name'];
    $p_img=strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
    $required=array("jpg","jpeg","png");
    if(in_array($p_img,$required)){
        $pic=rand(200,200000);
        $p=$pic.".".$p_img;
        $ssql="SELECT * FROM `product` WHERE `pcategory`='$pcategory' and `pscategory`='$pscategory'and`code`='$code'";
        $srun=mysqli_query($conn,$ssql);
        if(mysqli_num_rows($srun)==0){
            $sql="INSERT INTO `product`(`pcategory`,`pscategory`,`psupplier`,`title`,`description`,`code`,`p_price`,`s_price`,`d_price`,`quantity`,`stock`,`status`,`product_img`)VALUE('$pcategory','$pscategory','$psupplier','$title','$description','$code','$p_price','$s_price','$d_price','$quantity','$stock','$status','$p')";
            $run=mysqli_query($conn,$sql);
            if($run){
                echo "<script>alert('Product Entered')</script>";
                move_uploaded_file($_FILES['product_img']['tmp_name'],"./img/".$p);
            }
        }
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
                                <div class="col-9"><h4>Product</h4></div>
                                <div class="col-3 align-right"><a class="btn btn-primary align-right" href="./product_view.php">View</a></div>
                            </div>

                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Category </label>
                                    <select class="form-control" name="pcategory" id="">
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
                                    <select class="form-control" name="pscategory" id="">
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        $scsql="SELECT * FROM `sub_category`";
                                        $scrun=mysqli_query($conn,$scsql);
                                        while($scategory_fet=mysqli_fetch_assoc($scrun)){
                                            ?>
                                            <option value="<?php echo $scategory_fet['scid']?>"><?php echo $scategory_fet["scategory_name"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Supplier Name</label>
                                    <select class="form-control" name="psupplier" id="">
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        $scsql="SELECT * FROM `suppliers`";
                                        $scrun=mysqli_query($conn,$scsql);
                                        while($scategory_fet=mysqli_fetch_assoc($scrun)){
                                            ?>
                                            <option value="<?php echo $scategory_fet['sid']?>"><?php echo $scategory_fet["name"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Product Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group ">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                <div class="form-group ">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" name="code">
                                </div>
                                <div class="form-group ">
                                    <label>Purchase Price</label>
                                    <input type="text" class="form-control" name="p_price">
                                </div>
                                <div class="form-group ">
                                    <label>Sale Price</label>
                                    <input type="text" class="form-control" name="s_price">
                                </div>
                                <div class="form-group ">
                                    <label>Discount Price</label>
                                    <input type="text" class="form-control" name="d_price">
                                </div>
                                <div class="form-group ">
                                    <label>Quantity</label>
                                    <select class="form-control" name="quantity" id="">
                                        <option value="" selected disabled>Select</option>
                                        <?php
                                        $scsql="SELECT * FROM `quant`";
                                        $scrun=mysqli_query($conn,$scsql);
                                        while($scategory_fet=mysqli_fetch_assoc($scrun)){
                                            ?>
                                            <option value="<?php echo $scategory_fet['qid']?>"><?php echo $scategory_fet["quantity"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="stock">
                                </div>
                                <div class="form-group ">
                                    <label>Status</label>
                                    <input type="text" class="form-control" name="status">
                                </div>
                                <div class="form-group ">
                                    <label>image</label>
                                    <input type="file" class="form-control" name="product_img">
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