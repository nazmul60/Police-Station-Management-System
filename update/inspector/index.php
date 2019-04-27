<?php


session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style media="screen">
  .panel-heading {
  padding: 5px 15px;
}

.panel-footer {
padding: 1px 15px;
color: #A0A0A0;
}

.profile-img {
width: 96px;
height: 96px;
margin: 0 auto 10px;
display: block;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
border-radius: 50%;
}
  </style>
</head>
<body>
<h3 class = "text-center" style = "font-size:3vw;">  <strong>Police Station Management System</strong>   </h3>
  <div class="container" style="margin-top:40px">

  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class = 'text-center'>Inspector Login Panel</h3>
        </div>
        <div class="panel-body">
          <form role="form" action="#" method="POST">
            <fieldset>
              <div class="row">
                <div class="center-block">
                  <img class="profile-img"
                    src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>
                      <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                      </span>
                      <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name = "submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="panel-footer ">
          Don't have an account! <a href="admin_contact.php" onClick=""> Contact Admin </a>
        </div>
              </div>
    </div>
  </div>
</div>

</body>
</html>


  <?php

if(isset($_POST['submit'])){
    include 'mysql.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
   
$_SESSION['username'] = $username;
    $sql = "select * from officer_profile where username = '$username' and password = '$password' and  position = 'inspector'";
    $query = mysqli_query($con,$sql);
$count = mysqli_num_rows($query);

if($count==0){
  echo "<script>  alert('invalid credentials') </script>";
}
else{
  echo "<script>  window.location = 'admin_panel.php' </script>";
}

}


?>
