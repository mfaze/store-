<?php
include("./coonnection.php");
$did=$_GET["delid"];
$dsql="SELECT * FROM `quant` WHERE `qid`='$did'";
$drun=mysqli_query($conn,$dsql);
$dfet=mysqli_fetch_assoc($drun);
if($drun){
    $irun="DELETE FROM `quant` WHERE `qid`='$did'";
    $run=mysqli_query($conn,$irun);
    if($run){
        header("Location:./quantity_view.php");
    }
}
?>