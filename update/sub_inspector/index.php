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
  /*    --------------------------------------------------
:: Login Section
-------------------------------------------------- */
#login {
  padding-top: 50px
}
#login .form-wrap {
  width: 30%;
  margin: 0 auto;
}
#login h3 {
  color: #1fa67b;
  font-size: 18px;
  text-align: center;
  font-weight: bold;
  padding-bottom: 20px;
}
#login .form-group {
  margin-bottom: 25px;
}
#login .checkbox {
  margin-bottom: 20px;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}
#login .checkbox.show:before {
  content: '\e013';
  color: #1fa67b;
  font-size: 17px;
  margin: 1px 0 0 3px;
  position: absolute;
  pointer-events: none;
  font-family: 'Glyphicons Halflings';
}
#login .checkbox .character-checkbox {
  width: 25px;
  height: 25px;
  cursor: pointer;
  border-radius: 3px;
  border: 1px solid #ccc;
  vertical-align: middle;
  display: inline-block;
}
#login .checkbox .label {
  color: #6d6d6d;
  font-size: 13px;
  font-weight: normal;
}
#login .btn.btn-custom {
  font-size: 14px;
margin-bottom: 20px;
}
#login .forget {
  font-size: 13px;
text-align: center;
display: block;
}

/*    --------------------------------------------------
:: Inputs & Buttons
-------------------------------------------------- */
.form-control {
  color: #212121;
}
.btn-custom {
  color: #fff;
background-color: #1fa67b;
}
.btn-custom:hover,
.btn-custom:focus {
  color: #fff;
}

/*    --------------------------------------------------
  :: Footer
-------------------------------------------------- */
#footer {
  color: #6d6d6d;
  font-size: 12px;
  text-align: center;
}
#footer p {
  margin-bottom: 0;
}
#footer a {
  color: inherit;
}
  </style>

  <script type="text/javascript">
  function showPassword() {

  var key_attr = $('#key').attr('type');

  if(key_attr != 'text') {

      $('.checkbox').addClass('show');
      $('#key').attr('type', 'text');

  } else {

      $('.checkbox').removeClass('show');
      $('#key').attr('type', 'password');

  }

}
  </script>
</head>
<body>

  <section id="login">
      <div class="container">
        <h2 class = "text-center" style = "font-size:3vw;">  <strong>Police Station Management System</strong>   </h2>

      	<div class="row">
      	    <div class="col-xs-12">
          	    <div class="form-wrap">
                  <h3>Sub-inspector Login Panel</h3>
                      <form role="form" action="" method="post" id="login-form" autocomplete="off">
                          <div class="form-group">
                              <label for="email" class="sr-only">EmailAddress</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email Address" required>
                          </div>
                          <div class="form-group">
                              <label for="key" class="sr-only">Password</label>
                              <input type="password" name="password" id="key" class="form-control" placeholder="Enter your password" required>
                          </div>
                          <div class="checkbox">
                              <span class="character-checkbox" onclick="showPassword()"></span>
                              <span class="label">Show password</span>
                          </div>
                          <input type="submit" name = "submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                      </form>
                      <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                      <hr>
          	    </div>
      		</div> <!-- /.col-xs-12 -->
      	</div> <!-- /.row -->
      </div> <!-- /.container -->
  </section>

  <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-sm">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">
  					<span aria-hidden="true">×</span>
  					<span class="sr-only">Close</span>
  				</button>
  				<h4 class="modal-title">Recovery password</h4>
  			</div>
  			<div class="modal-body">
  				<p>Type your email account</p>
  				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  				<button type="button" class="btn btn-custom">Recovery</button>
  			</div>
  		</div> <!-- /.modal-content -->
  	</div> <!-- /.modal-dialog -->
  </div> <!-- /.modal -->

  <footer id="footer">
      <div class="container">
          <div class="row">
              <div class="col-xs-12">

              </div>
          </div>
      </div>
  </footer>

</body>
</html>


<?php

include 'mysql.php';
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $_SESSION['email'] = $email;
  $password = $_POST['password'];

$sql = "select * from officer_profile where email_address = '$email' and password = '$password' and position = 'sub-inspector'";
$query = mysqli_query($con,$sql);

$count = mysqli_num_rows($query);
if($count==0){
  echo "<script> alert('invalid credentials') </script>";

}
else{
  echo "<script> window.location = 'sub_inspector_panel.php' </script>";
}
}



 ?>
