<!-- Header start -->
<!-- <div class="fixed-top"> -->
<div class="fixed-top">
    <header class="header header-alt">
        <div class="container-fluid">

            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <!-- <a href="index-2.html" class="logo">STUDENT ADMISSION REGISTRATION AND GRADING SYSTEM <span>Version 1.0</span></a> -->
                    <img height="50px" img="img-fluid" src="<?php echo base_url(); ?>/dist/images/logo-sargs-4.png" alt="avatar" />
                    <!-- <img img="img-fluid" src="https://placeimg.com/400/50/tech" alt="avatar" /> -->
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                   
                    <!-- Header actions start -->
                    <ul class="header-actions">
                            <!-- <li class="dropdown d-none d-sm-block">
                                <a href="contact3.html" class="help">Support</a>
                            </li> -->
                        <li class="dropdown d-none d-sm-block">
                            <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                <i class="icon-bell"></i>
                                <span class="count-label"></span>
                            </a>
                            <div class="dropdown-menu lrg" aria-labelledby="notifications">
                                <div class="dropdown-menu-header">
                                    <h5>Notifications</h5>
                                    <p class="m-0 sub-title">You have 5 unread notifications</p>
                                </div>	
                                <ul class="header-notifications">
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="avatar">
                                                    <img src="img/user24.png" alt="avatar" />
                                                    <span class="notify-iocn icon-drafts text-danger"></span>
                                                </div>
                                                <div class="details">
                                                    <h6>Dr. Clive</h6>
                                                    <p>Appointed as a new President 2019-2020</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="avatar">
                                                    <img src="img/user21.png" alt="avatar" />
                                                    <span class="notify-iocn icon-layers text-info"></span>
                                                </div>
                                                <div class="details">
                                                    <h6>Dr. G. Levsmia</h6>
                                                    <p>Will be on leave on October 2nd week.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="clearfix">
                                                <div class="avatar">
                                                    <img src="img/user19.png" alt="avatar" />
                                                    <span class="notify-iocn icon-person_add text-success"></span>
                                                </div>
                                                <div class="details">
                                                    <h6>Dr. George S</h6>
                                                    <p>Sent new applointments list</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <!-- <span class="user-name">Welcome, Mr Uvuvwevwevwe Onyetenyevwe Ugwemuhwem Osas</span> -->
                                <span class="avatar">NR<span class="status busy"></span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <div class="header-user-profile">
                                        <div class="header-user">
                                            <img src="<?php echo base_url(); ?>dist/royal-hospital/version12/img/user11.png" alt="Royal Hospitals Admin Template" />
                                        </div>
                                        <h5>Mr Nelson Mandela</h5>
                                        <p>Admin</p>
                                    </div>
                                    <a href="<?php echo base_url(); ?>my-profile"><i class="icon-user1"></i> My Profile</a>
                                    <a href="<?php echo base_url(); ?>account-settings"><i class="icon-settings1"></i> Account Settings</a>
                                    <a href="<?php echo base_url(); ?>activity-logs"><i class="icon-activity"></i> Activity Logs</a>
                                    <a href="login.html"><i class="icon-log-out1"></i> Sign Out</a>
                                </div>
                            </div>
                        </li>
                    </ul>						
                    <!-- Header actions end -->

                </div>
                
            </div>
            <!-- Row end -->

        </div>
	</header>
	
    <div class="container-fluid p-0">
        <!-- Navigation start -->
		<nav class="navbar navbar-expand-lg custom-navbar">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar" aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</button>
			<div class="collapse navbar-collapse" id="royalHospitalsNavbar">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active-page" href="<?php echo base_url(); ?>dashboard">
							<i class="icon-devices_other nav-icon"></i>
							Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>dashboard">
							<i class="icon-devices_other nav-icon"></i>
							Students
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>dashboard">
							<i class="icon-devices_other nav-icon"></i>
							Instructors
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>dashboard">
							<i class="icon-devices_other nav-icon"></i>
							Course
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>dashboard">
							<i class="icon-devices_other nav-icon"></i>
							User Management
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Navigation end -->
	</div>
	
	<div class="container-fluid p-0">
		<!-- Page header start -->
		<div class="page-header">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">SARGS Dashboard</li>
				<!-- <li class="breadcrumb-item">
					<a href="#">Contacts</a>
				</li>
				<li class="breadcrumb-item active">Contact Form</li> -->
			</ol>
		</div>
	</div>
	<!-- Page header end -->
</div>
<!-- Header end -->