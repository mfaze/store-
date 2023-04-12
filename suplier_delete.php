<?php
include("./coonnection.php");
$delid=$_GET['dlid'];
$dsql="SELECT * FROM `suppliers` WHERE `sid`='$delid'";
$drun=mysqli_query($conn,$dsql);
$fdrun=mysqli_fetch_assoc($drun);
if($drun){
    $sql="DELETE FROM `suppliers` WHERE `sid`='$delid'";
    $run=mysqli_query($conn,$sql);
    if($run){
        header("Location:./suplier_view.php");
        echo "<script>alert('Data Removed')</script>";
    }
}
?>