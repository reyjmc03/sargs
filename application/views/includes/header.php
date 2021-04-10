<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <?php $this->load->view('includes/titletag'); ?>
        
        <!-- Favicon -->
        <?php $this->load->view('includes/favicon'); ?>

        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap"> -->
        <!-- <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/overlay/css/poppins-font.css"> -->
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/plugins/bootstrap/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/pre-skool/assets/css/style.css">

        <!-- MAIN STYLESHEET -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/overlay/css/main.css">

        <style type="text/css">
        .search-form-control {
            background-color: #d5dea !important;
            border-color: rgba(0, 0, 0, 0.1) !important;
            border-radius: 50px !important;
            color: black !important;
            height: 40px !important;
            padding: 10px 50px 10px 15px !important;
            width: 400px !important;
        }

        .search-button {
            background-color: transparent !important;
            border-color: transparent !important;
            color: #ffbc53 !important;
            min-height: 40px !important;
            padding: 7px 15px !important;
            right: 0px !important; */
            top: 0 !important;
        }
        </style>

    </head>
    <body>
        <div class="main-wrapper">
            <!-- masthead -->
            <?php $this->load->view('includes/masthead'); ?>
            <!-- /masthead -->

            <!-- sidebar -->
            <?php $this->load->view('includes/sidebar'); ?>
            <!-- /sidebar -->


            <!-- page wrapper -->
            <div class="page-wrapper" style="">
                <div class="content container-fluid">

                    <!-- page header -->
                    <div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title"><?php echo $page_title; ?></h3>
								<ul class="breadcrumb">
									<?php echo $breadcrumbs;?>
								</ul>
							</div>
						</div>
                    </div>
                    <!-- /page header -->
       
