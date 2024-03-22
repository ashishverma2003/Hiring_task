<?php
$con=mysqli_connect("localhost","root",'',"hiring");
if(!$con){
    die("connection is not established").mysqli_error($con);
}