<?php 

$con = mysqli_connect("localhost" , "root" , "" ,"ajax");

if(!$con){
    echo "Error : ". mysqli_connect_error($conn);
    die();
}

