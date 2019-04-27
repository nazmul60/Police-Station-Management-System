<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];

$sql = "select * from officer_profile where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_Array($query);

$fname = $result['fname'];
$complain_name = "";
$complainee_id = "";
$police_name = "";
$case_count = "";
$caseid = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>

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
    <div class = "well">
<h3 style = "margin-left:300px;">Available Cases</h3>
<table class = "table table-hover">
<thead>
<tr>
<th>CaseId</th>
<th>Complainee</th>
<th>Complaint Desc</th>
<th>Status</th>

</tr>

</thead>
<tbody>
<?php
include 'mysql.php';
$sql = "select * from complain_form where status ='unassigned'";
$query  = mysqli_query($con,$sql);
while($result = mysqli_fetch_array($query)){
    $caseid = $result['id'];
    $fname = $result['fname'];
    $lname = $result['lname'];

//getting the complainee id
$sql10 = "select * from public_account where firstname = '$fname' and lastname = '$lname'";
$query10 = mysqli_query($con,$sql10);
$result10 = mysqli_fetch_array($query10);
$userid = $result10['user_id'];
$complainee_id = $userid;

    $complainee = $fname.$lname;
    $complain_name = $complainee;
    $desc = $result['complaint_details'];
    $status=$result['status'];

$complain_name = $complainee;

?>

<tr>

<td><?php echo $caseid; ?></td>
<td><?php echo $complainee; ?></td>
<td><?php echo $desc; ?></td>
<td><?php echo $status; ?></td>

</tr>
<?php

}
?>

</tbody>

</table>


</div>
<div class = "well">
<h3 style = "margin-left:300px;">Available Officer</h3>


<?php




$sql = "select * from officer_profile where  position = 'sub-inspector'";
$query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);


if($count==0){
  echo "<h3 class = 'text-center'> No officer available </h3>";
}

else{

  while($result=mysqli_fetch_array($query)){

      $id = $result['id'] ;


      //case count validation

      $sql52 = "select * from case_details where officer_id = '$id' and (investigation_status = 'phase-1' or investigation_status = 'phase-2')";
      $query52 = mysqli_query($con,$sql52);
      $case_count = mysqli_num_rows($query52);

      $fname = $result['fname'];
      $lname = $result['lname'];
      $name = $fname.$lname;
      $police_name = $name;
      $year = $result['joined_year'];










    ?>

    <table class = 'table table-bordered'>

    <thead>
    <tr>

    <th>officer_id</th>
    <th>Name</th>
    <th>Joinedyear</th>
    <th>CaseCount</th>

    </tr>

    </thead>
  <td> <?php echo $id; ?></td>
<td><?php  echo $name; ?></td>
<td> <?php echo $year; ?></td>
<td><?php echo $case_count; ?></td>
</tr>
<?php
}
}
 ?>
</tbody>



</table>














</div>

<div class = "well">
<h3>Assign case</h3>

<form action="" method = "post">

<input type="text" name = "caseid" class = "form-control" placeholder = "Enter the case id" value = "<?php echo isset($_POST['caseid'])?$_POST['caseid']:'' ?>" required><br>
<input type="text" name = "policeid" class = "form-control" Placeholder = "Enter the officer id" value = "<?php echo isset($_POST['policeid'])?$_POST['policeid']:''?>" required><br>
<input type = "submit" name = "submit" class = "btn btn-success" value = "Assign">
</form>

<?php

if(isset($_POST['submit'])){

   
    $case_id = $_POST['caseid'];
    $policeid = $_POST['policeid'];


/*
//casecount validation
$sql202 = "select * from case_details where officer_id = '$id' and (investigation_status = 'phase-1' or investigation_status = 'phase-2')";
$query202 = mysqli_query($con,$sql202);
$case_count202 = mysqli_num_rows($query202);
if($case_count202==3){
    echo "<script> alert('Sub-inspector can only Investigate 3 case at a time') </script>";
    echo "<script> window.location = 'dutymgmt.php' </script>";
}
else{
    $sql5 = "insert into case_details(case_id,complainee,complainee_id,officer_id,assigned_officer,investigation_status) values ('$case_id','$complain_name','$complainee_id','$policeid','$police_name','phase-1')";
    $query5 = mysqli_query($con,$sql5);

    $sql2 = "update complain_form set status = 'assigned' where id = '$caseid'";
$query3 = mysqli_query($con,$sql2);


if($query3 && $query5){
    echo "<script> alert('Case Assigned') </script>";
}

}
*/
//validate caseid and policeid

$sql101 = "select * from complain_form where id = '$case_id'";
$query101 = mysqli_query($con,$sql101);
$count101 = mysqli_num_rows($query101);


$sql102 = "select * from officer_profile where id = '$policeid'";
$query102 = mysqli_query($con,$sql102);
$count102 = mysqli_num_rows($query102);


if($count101==0 || $count102==0 || ($count101==0 && $count102==0)){
    echo "<script>  alert('Invalid caseid or officer id') </script>";
}
else{
    $sql5 = "insert into case_details(case_id,complainee,complainee_id,officer_id,assigned_officer,investigation_status) values ('$case_id','$complain_name','$complainee_id','$policeid','$police_name','phase-1')";
        $query5 = mysqli_query($con,$sql5);

        $sql2 = "update complain_form set status = 'assigned' where id = '$caseid'";
    $query3 = mysqli_query($con,$sql2);


    if($query3 && $query5){
        echo "<script> alert('Case Assigned') </script>";
    }

}


   

  



    //case_Details table

   


   


}
?>

</div>
</div>

</body>
</html>
