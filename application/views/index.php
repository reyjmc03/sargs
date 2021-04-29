
<!DOCTYPE html>
<html  class="perfect-scrollbar-on" lang="en">
    <head>
        <meta charset="utf-8" />
        <?php $this->load->view('includes/titletag'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
    
        <!-- app favicon -->
        <?php $this->load->view('includes/favicon'); ?>

        <!-- login css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/css/login.css" />

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url();?>assets/overlay/nazox/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- Icons Css -->
        <link href="<?php echo base_url();?>assets/overlay/nazox/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="<?php echo base_url();?>assets/overlay/nazox/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


        <!-- animate css -->
        <link href="<?php echo base_url();?>assets/overlay/animatecss/animate.min.css" id="animate-style" rel="stylesheet" type="text/css" />

        <!-- ALTER STYLESHEET -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/css/alter.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/plugins/fontawesome/css/all.min.css">



        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/css/style.css">

        <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/overlay/css/poppins-font.css">

        <style>
       .auth-form-group-custom .auti-custom-input-icon {
           color: black !important;
       }
        </style>

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
                        <div class="bg-overlay">
                            <div class="text-center">
                                <br>
                                <br><br><br><br><br><br><br><br>
                                <div class="animate__animated animate__fadeIn">
                                <a href="<?php echo base_url(); ?>" class="logo">
                                    <img src="<?php echo base_url(); ?>assets/images/C2C.png" height="350" width="350" alt="logo">
                                </a>
                                </div>
                                <br>
                                <br>
                                <h1 class="mb-4 text-white font-weight-bold animate__animated animate__fadeIn"><strong>STUDENT ADMISSION, REGISTRATION AND GRADING SYSTEM</strong></h1>
                                <!-- <h1 class="mb-4 text-white font-weight-bold  "><strong>STUDENT ADMISSION, REGISTRATION AND GRADING SYSTEM</strong></h1>
                                <p class="lead text-warning">version 1.0</p> -->
                                <!-- <p class="lead text-white">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p> -->
                            </div>
                        </div>
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
                                                <a href="<?php echo base_url(); ?>" class="logo">
                                                    <img src="<?php echo base_url(); ?>assets/images/C2C.png" height="250" width="250" alt="logo">
                                                </a>
                                            </div>
                                            <!-- <h1 class="font-size-18 mt-4"></h1> -->
                                            <!-- <h1 class="font-size-20 mt-4">Welcome, Please Login!</h1> -->
                                            <!-- <p class="text-muted">Login to continue to S.A.R.G.S.</p> -->

                                            <!-- <p class="text-muted">Hello! let's get started</p>
                                            <p class="text-muted">Sign in to continue.</p> -->
                                            
                                        </div>
                                        <div class="p-2 mt-5">
                                            <h3>Sign In to <strong>SARGS v1.0</strong></h3>
                                            <p>Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                                            <br>
                                            <div id="login" class="form-horizontal">
                                                <p class="text-danger text-center animate__animated animate__zoomIn" v-html="message.failed" v-if="message.failed"></p>

                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <!-- <i class="ri-user-2-line auti-custom-input-icon"></i> -->
                                                    <i class="fas fa-user auti-custom-input-icon"></i>
                                                    <label for="username">USERNAME</label>
                                                    <input type="text" class="form-control red-tooltip" placeholder="Please Enter Username" name="username"v-model="userLogin.username">
                                                </div>
                                                <p class="text-danger animate__animated animate__fadeIn" v-if="message.username" v-html="message.username"></p>
                        
                                                <div class="form-group auth-form-group-custom mb-4">
                                                    <!-- <i class="ri-lock-2-line auti-custom-input-icon"></i> -->
                                                    <i class="fas fa-lock auti-custom-input-icon"></i>
                                                    <label for="userpassword">PASSWORD</label>
                                                    <input type="password" class="form-control" placeholder="Please Enter Password" name="password"v-model="userLogin.password" id="password">
                                                </div>
                                                <p class="text-danger animate__animated animate__fadeIn" v-if="message.password" v-html="message.password"></p>
                        
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                </div>

                                                <div class="form-group mt-4 text-center">
                                                    <input type="submit" class="btn btn-block btn-sargs-button" value="Login" @click="login()">
                                                </div>


                                                <!-- <div class="mt-4 text-center">
                                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                                </div> -->
                                            </div>
                                        </div>

                                        <!-- <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Register </a> </p>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php //include'includes/modal.php'?>
        </div>


        <?php //include'includes/vue_templates.php';?>

        <!-- JAVASCRIPT -->
        <script> var url = '<?php echo base_url(); ?>'</script>
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vue.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vuex.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/axios.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/login.js"></script>
    
    </body>
</html>