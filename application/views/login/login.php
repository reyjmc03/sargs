
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Student Admission, Registration and Grading System (SARGS) FOR C2C TRADOC, PA</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />


        <!-- app favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>dist/nazox/assets/images/favicon.ico" />

        <!-- login css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/login.css" />

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>dist/nazox/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="<?php echo base_url();?>dist/nazox/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="<?php echo base_url();?>dist/nazox/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        <!-- animate css -->
        <link href="<?php echo base_url();?>dist/animatecss/animate.min.css" id="animate-style" rel="stylesheet" type="text/css" />

         <!-- ALTER STYLESHEET -->
         <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/css/alter.css">
    </head>
    <body class="auth-body-bg">
        <!-- <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div> -->


        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <!-- background image -->
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
                    </div>
                </div>
                <!-- login form -->
                <div class="col-lg-4">
                    <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                        <div class="w-100">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div>
                                        <div class="text-center">
                                            <div class="animate__animated animate__zoomIn">
                                                <a href="index.html" class="logo">
                                                    <!-- <img src="<?php //echo base_url('dist/nazox/assets/images/logo-dark.png');?>" height="20" alt="logo"> -->
                                                    <img src="<?php echo base_url(); ?>dist/images/C2C.png" height="250" width="250" alt="logo">
                                                </a>
                                            </div>

                                            <h4 class="font-size-18 mt-4">Welcome User!</h4>
                                            <p class="text-muted">Login to continue to S.A.R.G.S.</p>
                                        </div>

                                        <div class="p-2 mt-5">
                                            <form class="form-horizontal" action="https://themesdesign.in/nazox/layouts/vertical/index.html">

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                                </div>
                        
                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                    <label for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                </div>
                        
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                </div>

                                                <div class="form-group mt-4 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit">Log In</button>
                                                </div>


                                                <div class="mt-4 text-center">
                                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Register </a> </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- *************
			************ Footer *************
		************* -->
		<?php $this->load->view('includes/footer'); ?>
		 <!-- *************
			************ End Footer *************
		************* -->


        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url(); ?>dist/nazox/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/nazox/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/nazox/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/nazox/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/nazox/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url(); ?>dist/nazox/assets/js/app.js"></script>
    </body>
</html>