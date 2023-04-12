<?php
include("./coonnection.php");
$did=$_GET["deelid"];
$dsql="SELECT * FROM `sub_category` WHERE `scid`='$did'";
$drun=mysqli_query($conn,$dsql);
$dfet=mysqli_fetch_assoc($drun);
if($drun){
    $sql="DELETE FROM `sub_category` WHERE `scid`='$did'";
    $run=mysqli_query($conn,$sql);
    if($run){
        header("Location:./scategory_view.php");
        echo "<script>alert('Data Deleted')</script>";
    }else{
        echo "<script>alert('Data Not Deleted')</script>";
    }
}
?>