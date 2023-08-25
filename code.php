<?php
session_start();

$localhost = "localhost";
$dbname = "students";





$conn = mysqli_connect($localhost, "root", "", $dbname);

if (isset($_POST['save_student'])) {
   $email = $_POST['roll'];
   $fname = $_POST['fname'];
   $class = $_POST['class'];
   $subject = $_POST['subct'];
   $tmarks = $_POST['tmarks'];
   $omarks = $_POST['omarks'];
   $grade = $_POST['grade'];


   $query = "INSERT INTO students(roll,fname,class,subct,tmarks,omarks,grade) VALUE ('$email','$fname','$class','$subject','$tmarks','$omarks','$grade')";
   $query_run = mysqli_query($conn, $query);

   if ($query_run) {
      $_SESSION['status'] = "Data Saved Successfully";
      header('Location:stportal.php');
   } else {
      $_SESSION['status'] = "Data Saved Successfully";
      header('Location:stportal.php');
   }
};
// veiw
if (isset($_POST['checking_viewbtn'])) {
   $s_id = $_POST['student_id'];
   // echo $return = $s_id ;
   $sql = "SELECT * FROM `students` WHERE roll='$s_id';";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {

      // while ($row = mysqli_fetch_array($result))
      foreach ($result as $row) {
         echo $return = '
         <h5>ID:' . $row['roll'] . '</h5>
         <h5>Name:' . $row['fname'] . '</h5>
         <h5>Class:' . $row['class'] . '</h5>
         <h5>Subject:' . $row['subct'] . '</h5>
         <h5>Total Marks:' . $row['tmarks'] . '</h5>
         <h5>Otainted Marks:' . $row['omarks'] . '</h5>
         <h5>Grade:' . $row['grade'] . '</h5>
         ';
      };
   } else {
      echo $return = "no data found ";
   }
}
// veiw

// edit

if (isset($_POST['checking_edit_btn'])) {
   $s_id = $_POST['student_id'];
   // echo $return = $s_id ;
   $answer_arry=[];
   $sql = "SELECT * FROM `students` WHERE roll='$s_id';";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {

      // while ($row = mysqli_fetch_array($result))
      foreach ($result as $row) 
      {
         
         array_push($answer_arry,$row);
         header('Content-type:application/json');
         echo json_encode($answer_arry);

      };
   } else {
      echo $return = "no data found ";
   }
};


if(isset($_POST['update_student'])){
    
  
   $roll = $_POST['roll'];
   $fname = $_POST['fname'];
   $class = $_POST['class'];
   $subject = $_POST['subct'];
   $totalmark = $_POST['tmarks'];
   $obtainedmark = $_POST['omarks'];
   $grade = $_POST['grade'];

   $sql = "UPDATE students SET roll='$roll', fname='$fname', class='$class', subct='$subject', tmarks='$totalmark', omarks='$obtainedmark', grade='$grade' WHERE roll='$roll' ";
   $query_run = mysqli_query($conn,$sql);

   if($query_run){
      $_SESSION['status'] = "Data Update Successfully";
      header('Location:stportal.php');
   }
   else{
      $_SESSION['status'] = "Something went Wrong.!";
      header('Location:stportal.php');
   };
}


// edit

// delete

if (isset($_POST['delete_btn'])) {
   $s_id = $_POST['student_id'];
   // echo $return = $s_id ;
   $answer_arry=[];
   $sql = "DELETE FROM students WHERE roll='$roll';";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {

      // while ($row = mysqli_fetch_array($result))
      foreach ($result as $row) 
      {
         
         array_push($answer_arry,$row);
         header('Content-type:application/json');
         echo json_encode($answer_arry);

      };
   } else {
      echo $return = "no data found ";
   }
};




// delete