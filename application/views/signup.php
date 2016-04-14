<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Contest Manager - A way of programming contest</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post" action="<?php echo site_url('signup/create_user');?>">
		        <h2 class="form-login-heading">sign up now</h2>
		        <div class="login-wrap">

              <span id="error_design"><?php echo form_error('first_name'); ?></span>
		        	<input name="first_name" type="text" class="form-control" value="<?php echo set_value('first_name'); ?>" placeholder="First Name" autofocus>
		            <br>
              <span id="error_design"><?php echo form_error('last_name'); ?></span>
		        	<input name="last_name" type="text" class="form-control" value="<?php echo set_value('last_name'); ?>" placeholder="Last Name">
		            <br>
              <span id="error_design"><?php echo form_error('username'); ?></span>
		            <input name="username" type="text" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Username">
		            <br>
              <span id="error_design"><?php echo form_error('email'); ?></span>
		            <input name="email" type="text" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="E mail" autofocus>
		            <br>
              <span id="error_design"><?php echo form_error('password'); ?></span>
		            <input name="password" type="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="Password">
		            <br>
		            <button class="btn btn-theme btn-block" href="#" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
		            <hr>
		         
		            <div class="registration">
		                Already have an account?<br/>
		                <a class="" href="<?php echo site_url('signin');?>">
		                    Sign in
		                </a>
		            </div>
		
		        </div>

		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script src="<?php echo base_url('assets/js/jquery.backstretch.min.js') ?>"></script>
    <script>
        $.backstretch("<?php echo base_url('assets/img/login-bg.jpg') ?>", {speed: 500});
    </script>


  </body>
</html>
