<?php
    include("./coonnection.php");
    $category_type = strtolower(mysqli_real_escape_string($conn, $_POST["category_type"]));
    $category_details = mysqli_real_escape_string($conn, $_POST["category_details"]);
    $date = date("l jS \of F Y h:i:s A");
    $category_img = $_FILES['category_img']['name'];
    $cimg = strtolower(pathinfo($category_img, PATHINFO_EXTENSION));
    $required = array("jpg", "jpeg", "png");
    if (in_array($cimg, $required)) {
        if (!empty($category_type)) {
            $pic=rand(20,200000);
            $c_pic=$pic.".".$cimg;
            $sql = "SELECT * FROM `category` WHERE `category_type`='$category_type'";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                if (mysqli_num_rows($run) == 0) {
                    $csql = "INSERT INTO `category`(`category_type`,`category_img`,`category_details`,`date`)VALUE('$category_type','$c_pic','$category_details','$date')";
                    $crun = mysqli_query($conn, $csql);
                    echo 1;
                    if ($crun) {
                        
                        move_uploaded_file($_FILES['category_img']['tmp_name'],"./img/".$c_pic);
                    } else {
                        echo 2;
                    }
                } else {
                    echo 3;
                }
            }
        } else {
            echo 4;
        }
    }else{
        echo 5;
    }
?>