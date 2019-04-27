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

    <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
    <hr>

   <div class = "well">
   <h2 style = "text-align:center;">Enter the public user id to register the complain</h2>
   <form action="" method = "post" action = "">
    <input type="text " style = "width:600px; margin-left:200px;margin-top:100px;" name = "user_id" class = "form-control" placeholder = "Enter the user id" required>
    <input style = "width:20em; margin-left:300px;margin-top:100px;" type="submit" name = "submit" value = "Search" class = "btn btn-success">
    </form>


    <?php
include 'mysql.php';
if(isset($_POST['submit'])){
    $id = $_POST['user_id'];

    $sql = "select * from public_account where user_id = '$id'";
    $query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($query);

    if($count==0){
        echo "<script> alert('No user with such id found') </script>";
    }
    else{
        
        $_SESSION['id'] = $id;
        echo "<script> window.location = 'comp_test.php' </script>";
    }
}

?>
   </div>
</div>

</body>
</html>
