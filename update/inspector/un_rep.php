<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];

$sql = "select * from officer_profile where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_Array($query);

$fname = $result['fname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> Hello <?php echo $fname; ?> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="police_profile.php"><i class="fa fa-user-secret"></i> My Profile</a></li>
                    </ul>
                </li>
                <li><a href="logout1.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>

<!-- /Header -->

<!-- Main -->

<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">

    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
        <!--<li class="nav-header"></li>-->

        <li><a href="verif.php"><i class="fa fa-tags"></i>Take Complain</a></li>
        <li><a href="dutymgmt.php"><i class="fa fa-tags"></i>Assign Duties</a></li>
        <li><a href="un_rep.php"><i class="fa fa-lock"></i> unapproved Report</a></li>

    </ul>
</div><!-- /span-3 -->
<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
    <!-- Right -->

    <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
    <hr>


    <div class="panel panel-default">
      <div class="panel-heading panel-heading-custom">        <h3 class = "text-center">Pending phase 2 report</h3>       </div>
      <div class="panel-body">

<?php

$sql11 = "select * from unapp_phase2";
$query11 = mysqli_query($con,$sql11);
$count = mysqli_num_rows($query11);
if($count==0){
  echo "<h3 class = 'text-center'>  No data </h3>";
}
else{
  ?>


<table class = "table table-bordered">
<thead>
  <tr>
    <th>CaseId</th>
    <th>Suspect</th>
    <th>Description</th>
    <th>Arrest_Location</th>
    <th>Approve</th>
  </tr>
</thead>

  <?php
  while($result = mysqli_fetch_array($query11)){
    $id = $result['case_id'];
    $suspect = $result['suspect'];
    $desc = $result['description'];
    $location=$result['arrest_location'];
  
 ?>

<tbody>
  <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $suspect; ?></td>
    <td><?php echo $desc; ?></td>
    <td><?php echo $location; ?></td>
    <td> <a href="case_approve.php?value=<?php echo $id; ?>  " >Approve</a>
    </td>
  </tr>


  <?php
  }
}
?>
</tbody>
 </table>

      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading"> <h3 class = "text-center">Pending phase 3 report</h3>   </div>
      <div class="panel-body">

<?php
$sql3 = "select * from  unapp_phase3";
$query3 = mysqli_query($con,$sql3);
$count3 = mysqli_num_rows($query3);

if($count3==0){
  echo "<h3 class = 'text-center'>  No data </h3>";
}

else{
?>

<table class = "table table-bordered">
   <thead>
     <tr>
       <th>caseid</th>
       <th>ReleasedTime</th>
       <th>CourtVerdict</th>
       <th>GovtAttorney</th>
       <th>SuspectAttorney</th>
       <th>Judge</th>
       <th>Approve</th>
     </tr>
   </thead>

<?php

  while($result3 = mysqli_fetch_array($query3)){
  $caseid = $result3['case_id'];
  $released = $result3['released_for_court'];
  $verdict = $result3['court_verdict'];
  $govt = $result3['govt_attorney'];
  $suspect = $result3['suspect_attorney'];
  $judge = $result3['Judge'];
 ?>



   <tbody>
     <tr>
       <td><?php  echo $caseid; ?></td>
       <td><?php  echo $released; ?></td>
       <td><?php  echo $verdict; ?></td>
       <td><?php  echo $govt; ?></td>
       <td><?php  echo $suspect; ?></td>
       <td><?php  echo $judge; ?></td>
       <td>    <a href="phas3_approve.php?value=<?php echo $caseid; ?>">approve</a>     </td>
     </tr>

     <?php

}
}
      ?>
   </tbody>
 </table>


      </div>
    </div>

</div>

</body>
</html>
