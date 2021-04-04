
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Feb 2021 17:04:28 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Preskool - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('dist/pre-skool/assets/img/favicon.png');?>">
	
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('dist/pre-skool/assets/plugins/bootstrap/css/bootstrap.min.css');?>">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo base_url('dist/pre-skool/assets/plugins/fontawesome/css/fontawesome.min.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('dist/pre-skool/assets/plugins/fontawesome/css/all.min.css');?>">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo base_url('dist/pre-skool/assets/css/style.css');?>">
		
		<!-- animate CSS -->
		<link rel="stylesheet" href="<?php echo base_url('dist/animatecss/animate.min.css');?>">
		
		<!-- ALTER STYLESHEET -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/dist/css/alter.css">
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
					<div class="animate__animated animate__zoomIn">
						<div class="loginbox">
							<div class="login-left">
								<img class="img-fluid" src="<?php echo base_url('dist/images/C2C.png');?>" alt="Logo">
							</div>
							<div class="login-right">
								<div class="login-right-wrap">
									<h1><b>STUDENT, ADMISSION, REGISTRATION AND GRADING SYSTEM (S.A.R.G.S v1.0)</b></h1>
									<br>
									<p class="account-subtitle">Administrator Login</p>
									
									<!-- Form -->
									<form action="https://preschool.dreamguystech.com/html-template/index.html">
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Username">
										</div>
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Password">
										</div>
										<div class="form-group">
											<button class="btn btn-primary btn-block" type="submit">Login</button>
										</div>
									</form>
									<!-- /Form -->
									
									<!-- <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div> -->
									<?php //<div class="login-or">
										//<span class="or-line"></span>
										//<span class="span-or">or</span>
									//</div> ?>
									
									<!-- Social Login -->
									<?php //<div class="social-login">
										//<span>Login with</span>
										//<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
									//</div> ?>
									<!-- /Social Login -->
									
									<?php //<div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div> ?>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->



		 <!-- *************
			************ Footer *************
		************* -->
		<?php $this->load->view('includes/footer'); ?>
		 <!-- *************
			************ End Footer *************
		************* -->
		
		<!-- jQuery -->
        <script src="<?php echo base_url('dist/pre-skool/assets/js/jquery-3.5.1.min.js');?>"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?php echo base_url('dist/pre-skool/assets/js/popper.min.js');?>"></script>
        <script src="<?php echo base_url('dist/pre-skool/assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo base_url('dist/pre-skool/assets/js/script.js');?>"></script>
		
    </body>

<!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Feb 2021 17:04:28 GMT -->
</html>