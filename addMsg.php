<?php
include "db.php";
session_start();

$msg = $_GET['msg'];
$phone = $_SESSION['phone'];

$q = "select * from `users` where phone = '$phone'";
if($rq=mysqli_query($db,$q)){
if(mysqli_num_rows($rq)==1){
$q = "insert into `msg`(`phone`,`msg`) values('$phone' , '$msg')";
$rq = mysqli_query($db,$q);
}
}

?>