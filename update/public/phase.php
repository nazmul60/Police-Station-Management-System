
<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];
$sql = "select * from public_account where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_Fetch_array($query);
$fname = $result['firstname'];
$complinee_id = $result['user_id'];
$lname = $result['lastname'];
$address = $result['address'];
$city = $result['city'];
$phone = $result['phoneNumber'];
$email = $result['EmailAddress'];


if(isset($_POST['submit'])){

  $id = $_POST['id'];
  $_SESSION['id'] = $id;


  //test the case id
  $sql11 = "select * from case_details where case_id = '$id' and complainee_id = '$complinee_id'";
  $query11 = mysqli_query($con,$sql11);
  $count11 = mysqli_num_rows($query11);

  if($count11 ==0){
    echo "<script> alert('No case Matches this Case_id Found') </script>";
    echo "<script> window.location = 'show_case.php' </script>";
   
  }
  else{

  
//complain-form

$sql3 = "select * from complain_form where id = '$id' and email = '$email'";
$query3 = mysqli_query($con,$sql3);
$result = mysqli_fetch_array($query3);
$location = $result['incident_location'];
$details = $result['complaint_details'];
$outcome = $result['Desired_outcome'];


$sql2 = "select * from case_details where case_id = '$id' and complainee_id = '$complinee_id'";
$query2 = mysqli_query($con,$sql2);
$count2 = mysqli_num_rows($query2);
$result2 = mysqli_fetch_array($query2);
$officer = $result2['assigned_officer'];
$status = $result2['investigation_status'];


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

  <style>

  h1.page-header {
    margin-top: -5px;
}

.sidebar {
    padding-left: 0;
}

.main-container {
    background: #FFF;
    padding-top: 15px;
    margin-top: -20px;
}

.footer {
    width: 100%;
}
  </style>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



			</form>
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Hello <?php  echo "$fname.&nbsp;.$lname"; ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><a href="edit_public_user.php">Edit_profile</a></li>

							<li class="divider"></li>
							<li><a href="public_logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="show_case.php">show cases</a></li>

			</ul>
		</div>
		<div class="col-md-10 content">
      <div class="row">
                                        <div class="col-md-10">
                                        <!-- Nav tabs --><div class="card">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">phase1</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Phase2</a></li>
                                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">phase3</a></li>
                                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">phase4</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="home">
                                              <h2></h2>
                                              <div class="panel panel-default">
                                                <div class="panel-heading">Phase1</div>
                                                <div class="panel-body">

                                                <?php

                                     if($count2==0){
                                       echo "<h3>  No data </h3>";
                                     }
                                     else{





                                                ?>
                                          <div class="well">
                                            <strong>incident_location:</strong><?php  echo $location; ?><br>
                                            <hr>
                                            <strong>Details:</strong><?php  echo $details; ?><br>
                                            <hr>
                                            <strong>Outcome:</strong><?php  echo $outcome; ?><br>
                                            <hr>
                                            <strong>Officer:</strong><?php  echo $officer; ?><br>
                                            <hr>
                                            <strong>status:</strong><?php  echo $status; ?><br>
                                          </div>
                                          <?php

}
                                           ?>
                                                </div>
                                              </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="profile">

                 <?php
         $sql4 = "select * from phase_2 where case_id = '$id' and complainee_id = '$complinee_id' ";
         $query4 = mysqli_query($con,$sql4);
         $count4 =mysqli_num_rows($query4);
      $result4 = mysqli_fetch_array($query4);
      $suspect = $result4['suspect'];
      $desc = $result4['description'];
      $location = $result4['arrest_location'];
         if($count4==0){
           echo "<h3>  No data available <h3>";
         }
         else{
 ?>


<div class="well">
  <strong>suspect:</strong><?php echo $suspect; ?><br>
  <hr>
  <strong>Description</strong>  <?php echo $desc; ?>  <br>
  <hr>
  <strong>location</strong>  <?php  echo $location; ?><br>
</div>

<?php

}


 ?>







                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="messages">

<?php

$sql7 = "select * from phase3 where case_id = '$id' and complainee_id = '$complinee_id'";
$query7 = mysqli_query($con,$sql7);
$count7 = mysqli_num_rows($query7);
if($count7==0){
  echo "<h3>  No data </h3>";
}
else{
  $result7 = mysqli_fetch_array($query7);
  $released = $result7['released_for_court'];
  $verdict = $result7['court_verdict'];
  $govt_attorney = $result7['govt_attorney'];
  $suspect_attorney = $result7['suspect_attorney'];
  $judge = $result7['Judge'];





 ?>


 <div class="card">
<strong>released:</strong><?php echo $released; ?><br>
<hr>
<strong>verdict</strong> <?php echo $verdict; ?>  <br>
<hr>
<strong>govt_attorney</strong>  <?php echo $govt_attorney ?><br>
<hr>
<strong>Judge</strong>  <?php echo $judge  ?><br>

 </div>

 <?php


}
}
  ?>



                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
                                        </div>
    </div>
                                    </div>
      </div>
		</div>
		<footer class="pull-left footer">
			<p class="col-md-12 text-center">
				<hr class="divider">

			</p>
		</footer>
	</div>
</body>
</html>


<?php

}

?>