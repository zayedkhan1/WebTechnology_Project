<?php 
$server="localhost";
$name="root";
$password="";
$database="apbs_db";

$con=mysqli_connect($server,$name,$password,$database);

if(!$con){
    die('not connected'.mysqli_error_connect());

}else{
    echo " ";
}


?>
