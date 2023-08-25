<?php
$con = mysqli_connect('localhost','root','','students');
if(!$con){
    echo "Server is not Connected";
}
$id = $_GET['id'];
$sql = "DELETE from `students` where roll = $id;";
$run = mysqli_query($con,$sql);
if($run){
    header('location: stportal.php');
}
else{
        header('edit.php');
}
?>