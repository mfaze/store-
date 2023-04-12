<?php
include("./coonnection.php");
$did=$_GET["delid"];
$dsql="SELECT * FROM `category` WHERE `cid`='$did'";
$drun=mysqli_query($conn,$dsql);
$dfet=mysqli_fetch_assoc($drun);
if($drun){
    $irun="DELETE FROM `category` WHERE `cid`='$did'";
    $run=mysqli_query($conn,$irun);
    if($run){
        header("Location:./category_view.php");
    }
}
?>