<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <?php $this->load->view('includes/titletag'); ?>
        
        <!-- Favicon -->
        <?php $this->load->view('includes/favicon'); ?>

        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/poppins-font.css">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/pre-skool/assets/plugins/bootstrap/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/pre-skool/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/pre-skool/assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/pre-skool/assets/css/style.css">

        <!-- MAIN STYLESHEET -->
         <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/main.css">
    </head>
    <body>
        <div class="main-wrapper">
            <!-- masthead -->
            <?php $this->load->view('includes/masthead'); ?>

            <!-- sidebar -->
            <?php $this->load->view('includes/sidebar'); ?>
       
