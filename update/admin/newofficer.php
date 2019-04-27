<?php

$emailErr = $yearErr =  $idErr =  $etakenErr =  $username_taken =  $idErr1 = $fnameErr = $lnameErr = 
$userErr = $addressErr = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" href="sweetalert2.min.css">
  <style media="screen">

  @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@media(min-width:768px) {
  body {
      margin-top: 50px;
  }
  /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
  padding-left: 0;
}

#page-wrapper {
  width: 100%;
  padding: 0;
  background-color: #fff;
}

@media(min-width:768px) {
  #wrapper {
      padding-left: 225px;
  }

  #page-wrapper {
      padding: 22px 10px;
  }
}

/* Top Navigation */

.top-nav {
  padding: 0 15px;
}

.top-nav>li {
  display: inline-block;
  float: left;
}

.top-nav>li>a {
  padding-top: 20px;
  padding-bottom: 20px;
  line-height: 20px;
  color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
  color: #fff;
  background-color: #1a242f;
}

.top-nav>.open>.dropdown-menu {
  float: left;
  position: absolute;
  margin-top: 0;
  /*border: 1px solid rgba(0,0,0,.15);*/
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  background-color: #fff;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
  white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
  .side-nav {
      position: fixed;
      top: 60px;
      left: 225px;
      width: 225px;
      margin-left: -225px;
      border: none;
      border-radius: 0;
      border-top: 1px rgba(0,0,0,.5) solid;
      overflow-y: auto;
      background-color: #222;
      /*background-color: #5A6B7D;*/
      bottom: 0;
      overflow-x: hidden;
      padding-bottom: 40px;
  }

  .side-nav>li>a {
      width: 225px;
      border-bottom: 1px rgba(0,0,0,.3) solid;
  }

  .side-nav li a:hover,
  .side-nav li a:focus {
      outline: none;
      background-color: #1a242f !important;
  }
}

.side-nav>li>ul {
  padding: 0;
  border-bottom: 1px rgba(0,0,0,.3) solid;
}

.side-nav>li>ul>li>a {
  display: block;
  padding: 10px 15px 10px 38px;
  text-decoration: none;
  /*color: #999;*/
  color: #fff;
}

.side-nav>li>ul>li>a:hover {
  color: #fff;
}

.navbar .nav > li > a > .label {
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
position: absolute;
top: 14px;
right: 6px;
font-size: 10px;
font-weight: normal;
min-width: 15px;
min-height: 15px;
line-height: 1.0em;
text-align: center;
padding: 2px;
}

.navbar .nav > li > a:hover > .label {
top: 10px;
}

.navbar-brand {
  padding: 5px 15px;
}
  </style>
  <script type="text/javascript">
  $(function(){
  $('[data-toggle="tooltip"]').tooltip();
  $(".side-nav .collapse").on("hide.bs.collapse", function() {
      $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
  });
  $('.side-nav .collapse').on("show.bs.collapse", function() {
      $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
  });
})

  </script>
</head>
<body>

  <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO"">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> create <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="newofficer.php"><i class="fa fa-angle-double-right"></i>createNewProfile</a></li>
                        <li><a href="addjail.php"><i class="fa fa-angle-double-right"></i>Add_jail</a></li>
                        <li><a href="unidentified_body.php"><i class="fa fa-angle-double-right"></i> found body</a></li>
                        <li><a href="lost_people.php"><i class="fa fa-angle-double-right"></i> Lost people</a></li>
                        <li><a href="mw.php"><i class="fa fa-angle-double-right"></i> Most wanted</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  edit <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="edit_officer.php"><i class="fa fa-angle-double-right"></i> officer</a></li>
                        <li><a href="edit_jail.php"><i class="fa fa-angle-double-right"></i> jail</a></li>
                        <li><a href="unidentified_body_edit.php"><i class="fa fa-angle-double-right"></i> body</a></li>
                        <li><a href="lost_people_edit.php"><i class="fa fa-angle-double-right"></i> lostPeople</a></li>
                        <li><a href="mw_edit.php"><i class="fa fa-angle-double-right"></i> Most wanted</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-star"></i>  View <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="view_officer.php"><i class="fa fa-angle-double-right"></i> officer</a></li>
                        <li><a href="view_jail.php"><i class="fa fa-angle-double-right"></i> jail</a></li>
                        <li><a href="view_body.php"><i class="fa fa-angle-double-right"></i> body</a></li>
                        <li><a href="view_lost_people.php"><i class="fa fa-angle-double-right"></i> lostPeople</a></li>
                        <li><a href="view_wanted.php"><i class="fa fa-angle-double-right"></i> Most wanted</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-star"></i>  cases <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="all_case.php"><i class="fa fa-angle-double-right"></i> All Cases</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-star"></i>  News <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="createnews.php"><i class="fa fa-angle-double-right"></i> Create</a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <!--registration-form--->


                   <?php
try{
  require 'mysql.php';

  if(isset($_POST['submit'])){
  
     $fname = test_input($_POST['fname']);
       $lname = test_input($_POST['lname']);
      $username = $_POST['username'];
      $password = $_POST['password'];
       $address = $_POST['address'];
      $year = test_input($_POST['year']);
       $email = $_POST['email'];
      $position = $_POST['position'];
     $pic = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));


      $id = generatepass($position);



//address error
if(preg_match('/^\d+$/',$address)){
  $addressErr = "You have Entered all integer!Put a valid Address";
}



     //fname and lname validation



     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $fnameErr = "Only whitespace and letter Allowed";
     }

     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only whitespace and letter Allowed";
     }
     if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $userErr = "No whitespace allowed in username";
    }



     //validate officerid

$length = strlen($id);
if($length>2){
  $idErr1 = "Id length has to be less then 3";
}


     $sql5 = "select * from officer_profile where id = '$id'";
     $query5 = mysqli_query($con,$sql5);
     $count5 = mysqli_num_rows($query5);
     if($count5>0){
       $idErr = "Id Already taken";
     }



     //username taken error

     $sql7 = "select * from officer_profile where username = '$username'";
     $query7 = mysqli_query($con,$sql7);
     $count7 = mysqli_num_rows($query7);
     if($count7>0){
       $username_taken = "Username Already taken";
     }


//EmailUser Error

     $sql6 = "select * from officer_profile where email_address = '$email'";
     $query6 = mysqli_query($con,$sql6);
     $count6 = mysqli_num_rows($query6);
     if($count6>0){
       $etakenErr = "Email Already taken";
     }


     //validate year


     if(strlen($year)>4 || strlen($year)<4){
       
      $yearErr = "Please Enter a Valid Year  ! example:2000";

     
 
 
     }
     else{
       if(strlen($year)==4){
        $year1 = str_split($year);
        if($year1[0]<1|| $year1[0]>2 ||$year1[0]==1){
          $yearErr = "Please Enter the correct Year";
        }
       }
    
     }

    

     //end val
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $emailErr = "invalid email";
    }





     if(empty($emailErr) && empty ($userErr) && empty($yearErr)  && empty($username_taken)  && empty($fnameErr) && empty($lnameErr)  && empty($etakenErr) && empty($addressErr)){

      $sql2 = "select * from officer_profile";
      $query2 = mysqli_query($con,$sql2);
      $sql = "insert into officer_profile(fname,lname,pic,position,joined_year,Address,email_address,id,username,password) values('$fname','$lname','$pic','$position','$year','$address','$email','$id','$username','$password')";
      if(mysqli_query($con,$sql)){
        
     
        echo '<script>alert("New officer created")</script>';
      }
    
     }
     else{
       echo "<script> alert('Error Found!Check All your info') </script>";
     }





     }
}

catch(Exception $err){
  echo $err->getMessage();
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function generatepass($data)
{
    if($data=='sub-inspector'){
        return 'sub'.rand(10,100);
    }
    if($data=='inspector'){
        return 'ins'.rand(10,100);
    }
}

   ?>





                  <form action = "" method = "POST" enctype="multipart/form-data">


                    <div class="container">
                        <h1 class="well">Registration Form</h1>
                      <div class="col-lg-12 well">
                      <div class="row">
                            <form>
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Enter First Name Here.." class="form-control" name = "fname" value ="<?php echo isset($_POST['fname'])?$_POST['fname']:'' ?>"required>  <br>
                                    <span style = "color:red;">  <?php echo $fnameErr; ?> </span>

                                  </div>
                                  <div class="col-sm-6 form-group">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Enter Last Name Here.." class="form-control" name = "lname" value ="<?php echo isset($_POST['lname'])?$_POST['lname']:'' ?>" required> <br>
                                       <span style = "color:red;"> <?php echo $lnameErr; ?>  </span>
                                  </div>
                                </div>

                                <div class = "row">
                                <div class="col-sm-6 form-group">
                                    <label>username</label>
                                    <input type="text" placeholder="Enter username" class="form-control" name = "username" value ="<?php echo isset($_POST['username'])?$_POST['username']:'' ?>"required> <br>
                                    <span style = "color:red;"><?php echo $username_taken; 
                                    echo $userErr;
                                    ?></span>
                                  </div>
                                  <div class="col-sm-6 form-group">
                                    <label>password</label>
                                    <input type="password" placeholder="Enter password" class="form-control" name = "password"required>
                                  </div>
                                </div>
                             
                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea placeholder="Enter Address Here.." rows="3" class="form-control" name = "address" value = " <?php echo isset($_POST['address'])?$_POST['address']:'' ?>" required></textarea> <br>
                                  <span style = "color:red;"><?php echo $addressErr; ?></span>
                                </div>


                                  <div class="form-group">
                                    <label>Rank</label>
                                   <select name="position" id="" class = "form-control" style = "width:40%;"  name = "position"required>

                                   <option value="inspector">Inspector</option>
                                   <option value="sub-inspector">sub-inspector</option>


                                   </select>

                                </div>

                              <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" placeholder="Enter Email Address Here.." id =  "email" title = "example@gmail/yahoo.com" class="form-control" name = "email" value ="<?php echo isset($_POST['email'])?$_POST['email']:'' ?>"required> <br>
                             <span style = "color:red;"><?php  echo $emailErr; ?>  <?php echo $etakenErr; ?></span>
                              </div>
                              <div class="default-file-upload">
                             <label>
                             Default File Upload
                             </label>

                            <input id="file-upload1" type="file" name = "image" id = "image" required/>
                            </div>
                              <div class="form-group">
                                <label>Joined Year</label>
                                <input type="number" placeholder="Year of Joining in the police force.." name = "year" class="form-control" value ="<?php echo isset($_POST['year'])?$_POST['year']:'' ?>" required> <br>
                                <span style = "color:red;"><?php echo $yearErr;  ?></span>
                              </div>
                              <input type="submit" class="btn btn-lg btn-info" name = "submit" value="submit" >
                              </div>
                            </form>


                            <script>

                            $(document).ready(function(){
                              $('#email').tooltip();

                            });

                            </script>
                            </div>
                      </div>
                      </div>
                  </form>

                    <!---/.end reg-form---->




           </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>






    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
</body>
</html>









  
