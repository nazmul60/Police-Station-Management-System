

<?php
include 'mysql.php';

session_start();
$email = $_SESSION['email'];
 $offid = $_SESSION['officer_id'];

//test assigned case availability


$sql = "select * from officer_profile where email_address = '$email'";
$query  = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query);
$fname = $result['fname'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <style media="screen">

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

  :focus {
  	outline: none;
  }

  .side-menu {
  	position: relative;
  	width: 100%;
  	height: 100%;
  	background-color: #f8f8f8;
  	border-right: 1px solid #e7e7e7;
  }
  .side-menu .navbar {
  	border: none;
  }
  .side-menu .navbar-header {
  	width: 100%;
  	border-bottom: 1px solid #e7e7e7;
  }
  .side-menu .navbar-nav .active a {
  	background-color: transparent;
  	margin-right: -1px;
  	border-right: 5px solid #e7e7e7;
  }
  .side-menu .navbar-nav li {
  	display: block;
  	width: 100%;
  	border-bottom: 1px solid #e7e7e7;
  }
  .side-menu .navbar-nav li a {
  	padding: 15px;
  }
  .side-menu .navbar-nav li a .glyphicon {
  	padding-right: 10px;
  }
  .side-menu #dropdown {
  	border: 0;
  	margin-bottom: 0;
  	border-radius: 0;
  	background-color: transparent;
  	box-shadow: none;
  }
  .side-menu #dropdown .caret {
  	float: right;
  	margin: 9px 5px 0;
  }
  .side-menu #dropdown .indicator {
  	float: right;
  }
  .side-menu #dropdown > a {
  	border-bottom: 1px solid #e7e7e7;
  }
  .side-menu #dropdown .panel-body {
  	padding: 0;
  	background-color: #f3f3f3;
  }
  .side-menu #dropdown .panel-body .navbar-nav {
  	width: 100%;
  }
  .side-menu #dropdown .panel-body .navbar-nav li {
  	padding-left: 15px;
  	border-bottom: 1px solid #e7e7e7;
  }
  .side-menu #dropdown .panel-body .navbar-nav li:last-child {
  	border-bottom: none;
  }
  .side-menu #dropdown .panel-body .panel > a {
  	margin-left: -20px;
  	padding-left: 35px;
  }
  .side-menu #dropdown .panel-body .panel-body {
  	margin-left: -15px;
  }
  .side-menu #dropdown .panel-body .panel-body li {
  	padding-left: 30px;
  }
  .side-menu #dropdown .panel-body .panel-body li:last-child {
  	border-bottom: 1px solid #e7e7e7;
  }
  .side-menu #search-trigger {
  	background-color: #f3f3f3;
  	border: 0;
  	border-radius: 0;
  	position: absolute;
  	top: 0;
  	right: 0;
  	padding: 15px 18px;
  }
  .side-menu .brand-name-wrapper {
  	min-height: 50px;
  }
  .side-menu .brand-name-wrapper .navbar-brand {
  	display: block;
  }
  .side-menu #search {
  	position: relative;
  	z-index: 1000;
  }
  .side-menu #search .panel-body {
  	padding: 0;
  }
  .side-menu #search .panel-body .navbar-form {
  	padding: 0;
  	padding-right: 50px;
  	width: 100%;
  	margin: 0;
  	position: relative;
  	border-top: 1px solid #e7e7e7;
  }
  .side-menu #search .panel-body .navbar-form .form-group {
  	width: 100%;
  	position: relative;
  }
  .side-menu #search .panel-body .navbar-form input {
  	border: 0;
  	border-radius: 0;
  	box-shadow: none;
  	width: 100%;
  	height: 50px;
  }
  .side-menu #search .panel-body .navbar-form .btn {
  	position: absolute;
  	right: 0;
  	top: 0;
  	border: 0;
  	border-radius: 0;
  	background-color: #f3f3f3;
  	padding: 15px 18px;
  }
  /* Main body section */
  .side-body {
  	margin-left: 310px;
  }
  /* small screen */
  @media (max-width: 768px) {
  	.side-menu {
  		position: relative;
  		width: 100%;
  		height: 0;
  		border-right: 0;
  	}

  	.side-menu .navbar {
  		z-index: 999;
  		position: relative;
  		height: 0;
  		min-height: 0;
  		background-color:none !important;
  		border-color: none !important;
  	}
  	.side-menu .brand-name-wrapper .navbar-brand {
  		display: inline-block;
  	}
  	/* Slide in animation */
  	@-moz-keyframes slidein {
  		0% {
  			left: -300px;
  		}
  		100% {
  			left: 10px;
  		}
  	}
  	@-webkit-keyframes slidein {
  		0% {
  			left: -300px;
  		}
  		100% {
  			left: 10px;
  		}
  	}
  	@keyframes slidein {
  		0% {
  			left: -300px;
  		}
  		100% {
  			left: 10px;
  		}
  	}
  	@-moz-keyframes slideout {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: -300px;
  		}
  	}
  	@-webkit-keyframes slideout {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: -300px;
  		}
  	}
  	@keyframes slideout {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: -300px;
  		}
  	}
  	/* Slide side menu*/
  	/* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
  	.side-menu-container > .navbar-nav.slide-in {
  		-moz-animation: slidein 300ms forwards;
  		-o-animation: slidein 300ms forwards;
  		-webkit-animation: slidein 300ms forwards;
  		animation: slidein 300ms forwards;
  		-webkit-transform-style: preserve-3d;
  		transform-style: preserve-3d;
  	}
  	.side-menu-container > .navbar-nav {
  		/* Add position:absolute for scrollable menu -> see top comment */
  		position: fixed;
  		left: -300px;
  		width: 300px;
  		top: 43px;
  		height: 100%;
  		border-right: 1px solid #e7e7e7;
  		background-color: #f8f8f8;
  		overflow: auto;
  		-moz-animation: slideout 300ms forwards;
  		-o-animation: slideout 300ms forwards;
  		-webkit-animation: slideout 300ms forwards;
  		animation: slideout 300ms forwards;
  		-webkit-transform-style: preserve-3d;
  		transform-style: preserve-3d;
  	}
  	@-moz-keyframes bodyslidein {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: 300px;
  		}
  	}
  	@-webkit-keyframes bodyslidein {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: 300px;
  		}
  	}
  	@keyframes bodyslidein {
  		0% {
  			left: 0;
  		}
  		100% {
  			left: 300px;
  		}
  	}
  	@-moz-keyframes bodyslideout {
  		0% {
  			left: 300px;
  		}
  		100% {
  			left: 0;
  		}
  	}
  	@-webkit-keyframes bodyslideout {
  		0% {
  			left: 300px;
  		}
  		100% {
  			left: 0;
  		}
  	}
  	@keyframes bodyslideout {
  		0% {
  			left: 300px;
  		}
  		100% {
  			left: 0;
  		}
  	}
  	/* Slide side body*/
  	.side-body {
  		margin-left: 5px;
  		margin-top: 70px;
  		position: relative;
  		-moz-animation: bodyslideout 300ms forwards;
  		-o-animation: bodyslideout 300ms forwards;
  		-webkit-animation: bodyslideout 300ms forwards;
  		animation: bodyslideout 300ms forwards;
  		-webkit-transform-style: preserve-3d;
  		transform-style: preserve-3d;
  	}
  	.body-slide-in {
  		-moz-animation: bodyslidein 300ms forwards;
  		-o-animation: bodyslidein 300ms forwards;
  		-webkit-animation: bodyslidein 300ms forwards;
  		animation: bodyslidein 300ms forwards;
  		-webkit-transform-style: preserve-3d;
  		transform-style: preserve-3d;
  	}
  	/* Hamburger */
  	.navbar-toggle-sidebar {
  		border: 0;
  		float: left;
  		padding: 18px;
  		margin: 0;
  		border-radius: 0;
  		background-color: #f3f3f3;
  	}
  	/* Search */
  	#search .panel-body .navbar-form {
  		border-bottom: 0;
  	}
  	#search .panel-body .navbar-form .form-group {
  		margin: 0;
  	}
  	.side-menu .navbar-header {
  		/* this is probably redundant */
  		position: fixed;
  		z-index: 3;
  		background-color: #f8f8f8;
  	}
  	/* Dropdown tweek */
  	#dropdown .panel-body .navbar-nav {
  		margin: 0;
  	}
  }

  </style>
  <script type="text/javascript">
  $(function () {
  $('.navbar-toggle-sidebar').click(function () {
    $('.navbar-nav').toggleClass('slide-in');
    $('.side-body').toggleClass('body-slide-in');
    $('#search').removeClass('in').addClass('collapse').slideUp(200);
  });

  $('#search-trigger').click(function () {
    $('.navbar-nav').removeClass('slide-in');
    $('.side-body').removeClass('body-slide-in');
    $('.search-input').focus();
  });
});
  </script>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
			MENU
			</button>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" method="GET" role="search">

			</form>
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Hello <?php echo $fname;  ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">SETTINGS</li>
							<li class=""><a href="#">View profile</a></li>

							<li class="divider"></li>
							<li><a href="sub_logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>  	<div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="assgn_case.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
					<li><a href="assgn_case.php"><span class="glyphicon glyphicon-plane"></span> Assigned case</a></li>
					<li><a href="case_report.php"><span class="glyphicon glyphicon-cloud"></span>submit case report</a></li>



				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>

  		<div class="col-md-10 content">

<?php
        //test assigned case availability

        $sql55 = "select * from case_details where officer_id = '$offid' and (investigation_status = 'phase-1' or investigation_status = 'phase-2')  ";
  $query55 = mysqli_query($con,$sql55);
  $count55 = mysqli_num_rows($query55);

  if($count55==0){
  	echo "<script> alert('Currently No case is Assigned To you') </script>";
   
  }
  else{

         ?>

  			  <div class="panel panel-default">
	<div class="panel-heading">
		Dashboard
	</div>
	<div class="panel-body">
<form class="form-group" action="submit_report.php" method="POST">
<input type="text" name=" id" id = "id" title = "id can only be integer" placeholder=" Enter the case id" value="" class = "form-control"><br>

<input type="text" id = "phase" name="phase" title = "Phase number can only be2 or 3" placeholder=" Enter the phase number"class = "form-control"> <br>
<input type="submit" class = "form-control btn btn-success" name="submit" value="submit" >
</form>

<script>
$(document).ready(function(){
	$('#phase').tooltip();
	$('#id').tooltip();
});

</script>



	</div>
</div>

<?php

}
 ?>
  		</div>
  		<footer class="pull-left footer">
  			<p class="col-md-12">
  				<hr class="divider">

  			</p>
  		</footer>
  	</div>
</div>

</body>
</html>
