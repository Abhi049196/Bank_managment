<?php
include 'connection.php';
 $ac_no = $_GET['deleteAc_no'];
 $sql="delete from `sheet` where ac_no = $ac_no";
 $result=mysqli_query($conn,$sql);
 if($result){    
    header('location:success.php');
 }else {
    die(mysqli_error($conn));
 }


?>
