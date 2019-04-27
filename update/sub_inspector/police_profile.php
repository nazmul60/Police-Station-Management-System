<?php
include 'mysql.php';
session_start();
$username = $_SESSION['username'];

$sql = "select * from officer_profile where username = '$username'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_Array($query);

$fname = $result['fname'];
$lname = $result['lname'];
$joined_year = $result['joined_year'];
$address = $result['Address'];
$email = $result['email_address'];
$id = $result['id'];

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
    <div class="col-md-10 ">

<div class="panel panel-default" style = "margin-left:200px;">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">

    <div class="box box-info">

            <div class="box-body">
                     <div class="col-sm-6">
                       <?php

  echo '
                                 <td>
                                      <img src="data:image/jpeg;base64,'.base64_encode($result['pic'] ).'" height="200" width="200" class="img-thumnail" />
                                 </td>
                             ';


  ?>

                     </div>



              <br>

              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"><?php echo  $fname.$lname; ?> </h4></span>
              <span><p></p></span>
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">


<div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $fname; ?></div>
     <div class="clearfix"></div>
     <hr>
<div class="bot-border"></div>




<div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7">   <?php echo $lname;  ?>  </div>
  <div class="clearfix"></div>

  <hr>


  <div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Officer ID:</div><div class="col-sm-7">   <?php echo $id;  ?>  </div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >Address</div><div class="col-sm-7"><?php echo $address;  ?></div>
<hr>
  <div class="clearfix"></div>
<div class="bot-border"></div>
<hr>
<div class="col-sm-5 col-xs-6 tital " >JoinedYear</div><div class="col-sm-7"><?php  echo $joined_year; ?></div>
<hr>


<div class="col-sm-5 col-xs-6 tital " >Email</div><div class="col-sm-7"><?php echo $email; ?></div>
<hr>
 <div class="clearfix"></div>
<div class="bot-border"></div>



 <div class="clearfix"></div>
<div class="bot-border"></div>



            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>



    </div>
</div>










                </div>
</div>

</body>
</html>
