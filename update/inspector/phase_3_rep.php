<?php
include 'mysql.php';
session_start();
$id = $_SESSION['id'];
 $complainee = $_SESSION['complainee'];
$time = date('h:i:sa');

if(isset($_POST['submit'])){
  $verdict = $_POST['verdict'];
  $govt_attorney = $_POST['gattorney'];
  $suspect_attorney = $_POST['sattorney'];
  $judge = $_POST['Judge'];
  $sql  = "insert into unapp_phase3(case_id,released_for_court,court_verdict,govt_attorney,suspect_attorney,Judge,complainee_id) values ('$id','$time','$verdict','$govt_attorney','$suspect_attorney','$judge','$complainee')";
  $query = mysqli_query($con,$sql);

  if($query){
echo "<script> alert('Report submitted')  </script>";
echo "<script> window.location = 'case_report.php' </script>";

  }
}



 ?>
