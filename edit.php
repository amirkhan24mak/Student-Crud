<?php
session_start();

$con = mysqli_connect('localhost','root','','students');
if(!$con){
    echo"Server is Not Connected";
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student Result</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1006/1006771.png" type="image/x-icon">

</head>


<body>
<?php

$id = $_GET['id'];

$select = "SELECT * from students where roll = $id ";
$run = mysqli_query($con,$select);
$fetch = mysqli_fetch_assoc($run);
$sname = $fetch['fname'];

$sclass = $fetch['class'];
$ssub = $fetch['subct'];
$smark = $fetch['tmarks'];



?>
  
<div class="container w-50 border my-3 rounded">
    <h1 class="text-center">Edit Form</h1>
    <form action="" method="POST">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" type="text" value="<?php  echo $sname?>" class="form-control" placeholder="Enter Your Name">
    </div>
    <div class="mb-3">
        <label  class="form-label">Class</label>
        <input name="class" type="text" value="<?php echo $sclass?>" placeholder="Enter Your Number " class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label">Subject</label>
        <input name="subject" type="text" value="<?php echo $ssub?>" placeholder="Enter Your Subject" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label">Total Marks</label>
        <input name="marks" type="number" value="<?php echo $smark?>" placeholder="Enter Your Total Marks" class="form-control">
    </div>
    <button name="update" class="btn btn-primary d-block m-auto my-1">Update</button>



    </form>
</div>
 <?php
 if(isset($_POST['update'])){
$name = $_POST['color_name'];

$query = "UPDATE students set fname = '$name' , class = '$class' , subct = '$subject' , tmarks = $marks where roll = $id ;" ;
$run1 = mysqli_query($con,$query);
if($run1){
    header('location: stportal.php');
}
else{
    header('location: edit.php');
}

 }

 ?>
  




    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  
</body>

</html>