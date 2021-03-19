<!doctype html>
<html lang="en">
	<!-- htmlhead -->
	<?php $this->load->view('includes/htmlhead'); ?>
		
    <body>
        <!-- Loading starts -->
		<!-- <div id="loading-wrapper">
			<div class='spinner-wrapper'>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
				<div class='spinner'>
					<div class='inner'></div>
				</div>
			</div>
		</div> -->
        <!-- Loading ends -->
        
		<!-- ************ Header ************* -->
		<?php $this->load->view('includes/header'); ?>
		

		<!-- ************ Footer ************* -->
		<?php $this->load->view('includes/footer'); ?>


        <!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
        <script src="<?php echo basse_url(); ?>/dist/royal-hospital/version12/js/jquery.min.js"></script>
        <script src="<?php echo basse_url(); ?>/dist/royal-hospital/version12/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo basse_url(); ?>/dist/royal-hospital/version12/js/moment.js"></script>
		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Main Js Required -->
        <script src="<?php echo basse_url(); ?>/dist/royal-hospital/version12/js/main.js"></script>
    </body>
</html>
