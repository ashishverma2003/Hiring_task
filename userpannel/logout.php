<?php
session_start();
if(!isset($_SESSION['workerid'])){
    header('Location:../loginform.php');
}
else{
    session_destroy();
    header('Location:../loginform.php');
}