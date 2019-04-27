
<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];
$sql = "select * from public_account where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_Fetch_array($query);
$fname = $result['firstname'];
$lname = $result['lastname'];
$address = $result['address'];
$city = $result['city'];
$phone = $result['phoneNumber'];
$email = $result['EmailAddress'];
$_SESSION['email'] = $email;
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
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3 class = "text-center">  My subMitted Complaint Data  </h3>
                </div>
                <div class="panel-body">
                  <?php
$sql = "select * from complain_form where fname = '$fname' and lname = '$lname' ";
$query = mysqli_query($con,$sql);

$count = mysqli_num_rows($query);
if($count==0){
  echo "<h3>  No data available </h3>";
}
else{

  while($result2 = mysqli_Fetch_array($query)){

    $id = $result2['id'];
    $location = $result2['incident_location'];
    $status = $result2['status'];

$sql20 = "select * from case_details where case_id = '$id'";
$query20 = mysqli_query($con,$sql20);
$result = mysqli_fetch_array($query20);

$officer = $result['assigned_officer'];
                   ?>
        <table class = "table table-bordered">
          <thead>
            <tr>
              <th>case_Id</th>
              <th>Incident Location</th>
              <th>AssignedOfficer</th>
              <th>Status</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><?php  echo $id; ?></td>
                <td><?php  echo $location; ?></td>
                <td><?php  echo $officer; ?></td>
                <td>  <?php  echo $status; ?></td>
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
  <div class="panel-heading">  <h3 class = "text-center">Search Panel</h3>  </div>
  <div class="panel-body">

        <form class="" action="phase.php" method="POST">
<input type="text" placeholder="Enter the case id....."  class = "form-control" name="id" value="">
<input  style = "width:20em;margin-left:250px;margin-top:100px;" class  ="btn btn-primary" type="submit" name="submit" value="search">
        </form>
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
