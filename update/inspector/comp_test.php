
<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$sql = "select * from officer_profile where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_Array($query);

$fname = $result['fname'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  var options={
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  };
  date_input.datepicker(options);
})
</script>
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
                        <li><a href="#"><i class="fa fa-user-secret"></i> My Profile</a></li>
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

     <h1 class="well text-center">Complaint registration Form</h1>
  	<div class="col-lg-12 well">
  	<div class="row">
      <?php

include 'mysql.php';
$sql = "select * from public_account where user_id = '$id'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query);

$fname = $result['firstname'];
$lname = $result['lastname'];
 $address = $result['address'];
$city = $result['city'];
$zip = $result['zip'];
$phone = $result['phoneNumber'];
$email = $result['EmailAddress'];


?>
  				<form method = "POST" action = "">
  					<div class="col-sm-12">
              

  						<div class="row">
  							<div class="col-sm-6 form-group">
  								<label>First Name</label>
  								<input type="text" name = "fname" placeholder="Enter First Name Here.." class="form-control" value = "<?php echo $fname;  ?>" disabled>
  							</div>
  							<div class="col-sm-6 form-group">
  								<label>Last Name</label>
  								<input type="text" name = "lname" placeholder="Enter Last Name Here.." class="form-control" value = "<?php echo $lname;  ?>" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label>Address</label>
  							<input type = "text" placeholder="Enter Address Here.." name = "address" rows="3" class="form-control" value = "<?php echo $address;  ?>" disabled>
  						</div>
  						<div class="row">
  							<div class="col-sm-4 form-group">
  								<label>City</label>
  								<input type="text" name = "city" placeholder="Enter City Name Here.." class="form-control" value = "<?php echo $city;  ?>" disabled>
  							</div>
  							
  							<div class="col-sm-4 form-group">
  								<label>Zip</label>
  								<input type="text" placeholder="Enter Zip Code Here.." name = "zip" class="form-control"value = "<?php echo $zip;  ?>" disabled>
  							</div>
  						</div>
              <div class="form-group"> <!-- Date input -->
                <label class="control-label" for="date">Date of the incedent</label>
                <input width = "200px"class="form-control" id="date" name="doi" placeholder="YYYY/MM/DD" type="text" required/>
              </div>

  					
  					<div class="form-group">
  						<label>Phone Number</label>
  						<input type="text" name = "ph_number" placeholder="Enter Phone Number Here.." class="form-control" value = "0<?php echo $phone;  ?>" disabled>
  					</div>
  					<div class="form-group">
  						<label>Email Address</label>
  						<input type="text" name = "email" placeholder="Enter Email Address Here.." class="form-control" value = "<?php echo $email;  ?>" disabled>
  					</div>
  					<div class="form-group">
  						<label>Incident Location</label>
  						<input type="text" name  = "incident_location" placeholder="Enter Website Name Here.." class="form-control" required>
  					</div>
            <div class="form-group">
              <label>Complaint details</label>
              <textarea placeholder="Enter Address Here.." name = "comp_details" rows="3" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label>Desired Outcome</label>
              <input type="text" placeholder="Enter Website Name Here.."  name = "desired_outcome" class="form-control" required>
            </div>
  					<input  style = "margin-left:450px;" type="submit" name  = "submit" class = "btn btn-success" value = "SUBMIT COMPLAINT">
  					</div>
  				</form>
  				</div>
  	</div>
</div>

</body>
</html>


<?php


    if(isset($_POST['submit'])){
 

     

  
        
     
        echo $doi = $_POST['doi'];
      
        echo $details  =$_POST['comp_details'];
        echo $incident_location = $_POST['incident_location'];
        echo $desired_outcome = $_POST['desired_outcome'];
        echo $status  = "unassigned";
        
        
        $sql = "insert into complain_form(id,fname,lname,email,Address,city,zip,Doi,phone_number,incident_location,complaint_details,Desired_outcome,status) values ('','$fname','$lname','$email','$address','$city','$zip','$doi','$phone','$incident_location','$details','$desired_outcome','$status')";
        $query = mysqli_query($con,$sql);
        
        if($query){
            echo '<script>alert("Case submitted ")</script>';
            echo "<script> window.location = 'verif.php' </script>";
        }
        else{
            echo '<script>alert("something wrong")</script>';
        }
        
        
       
}




?>