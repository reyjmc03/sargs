<div class="sidebar" id="sidebar">
	<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 887px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 887px;">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span><u>MAIN MENU</u></span>
				</li>
				<li class='<?php echo $nav == "DASHBOARD" ? "active" : " "; ?>'> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
				</li>
				<li class='<?php echo $nav == "DASHBOARD" ? "active" : " "; ?>'> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-th-users"></i> <span>Student Registration</span></a>
				</li>

				<li class=''>  
					<a href="<?php echo base_url(); ?>"><i class="fas fa-book"></i> <span>Courses</span></a>
				</li>
				<li class=''>  
					<a href="<?php echo base_url(); ?>"><i class="fas fa-chalkboard-teacher"></i> <span>Instructors</span></a>
				</li>
				<li class='submenu'>  
					<a href="#"><i class="fas fa-users"></i> <span> Students</span> <span class="menu-arrow"></span></a>
					<ul class="" style="display:block;">
						<li class="sub-active"><a href="student-details.html"><i class="fas fa-users"></i> Student Registration</a></li>
						<!-- <li class="sub-active"><a href="student-details.html">Student List</a></li> -->
					</ul>
					<ul class="" style="display:block;">
						<li class="sub-active"><a href="student-details.html">Instructor List</a></li>
						<!-- <li class="sub-active"><a href="student-details.html">Student List</a></li> -->
					</ul>
				</li>

				<!-- <li class="submenu active">
					<a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
					<ul class="" style="display:block">
						<li><a href="student-details.html">Instructor List</a></li>
						<li class="sub-active"><a href="student-details.html">Student List</a></li>
					</ul>
				</li> -->


				<!-- <li class="submenu">
					<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="student-details.html">Instructor List</a></li>
					</ul>
				</li> -->
				<!-- <li class="submenu">
					<a href="#"><i class="fas fa-building"></i> <span> Course</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="departments.html">Course List</a></li>
					</ul>
				</li> -->

				<br>
				<!-- Reports -->
				<li class="menu-title"> 
					<span><u>IDENTIFICATION CARDS (I.D)</u></span>
				</li>
				<li class='<?php echo $nav == "STUDENT I.D" ? "active" : " "; ?>'> 
					<a href="<?php echo base_url(); ?>student-identification"><i class="fas fa-id-card"></i> <span>Generate Student ID</span></a>
				</li>
				<br>
				<!-- Reports -->
				<li class="menu-title"> 
					<span><u>REPORTS</u></span>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-file"></i> <span>Individual Training List Report</span></a>
				</li>
				<br>
				<!-- certificates and awards -->
				<li class="menu-title"> 
					<span><u>GRADES, CERTIFICATE & AWARDS</u></span>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>student-certificate"><i class="fas fa-certificate"></i> <span>Student Course Certificate</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-building"></i> <span> Course Awards</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="<?php echo base_url(); ?>commanders-recognition-award"><i class="fas fa-certificate"></i> <span>Commanders Recognition Award</span></a></li>
						<li><a href="<?php echo base_url(); ?>commandants-award"><i class="fas fa-certificate"></i> <span>Commandants Award</span></a></li>
						<li><a href="<?php echo base_url(); ?>comtradoc-award"><i class="fas fa-certificate"></i> <span>COMTRADOC Award</span></a></li>
					</ul>
				</li>
				<br>

				<!-- References -->
				<li class="menu-title">
					<span><u>REFERENCES</u></span>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-pen"></i> <span> Signatories</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="<?php echo base_url(); ?>commanders-recognition-award"><i class="fas fa-certificate"></i> <span>Commanders Recognition Award</span></a></li>
						<li><a href="<?php echo base_url(); ?>commandants-award"><i class="fas fa-certificate"></i> <span>Commandants Award</span></a></li>
						<li><a href="<?php echo base_url(); ?>comtradoc-award"><i class="fas fa-certificate"></i> <span>COMTRADOC Award</span></a></li>
					</ul>
				</li>
				<li class='<?php echo $nav == "RANKS" ? "active" : " "; ?>'>  
					<a href="<?php echo base_url(); ?>ranks"><i class="fas fa-th-large"></i> <span>Ranks</span></a>
				</li>
				<br>

				<!-- System Management -->
				<li class="menu-title"> 
					<span><u>SYSTEM MANAGEMENT</u></span>
				</li>
				<li class='<?php echo $nav == "USER ACCOUNTS" ? "active" : " "; ?>'>  
					<a href="<?php echo base_url(); ?>user-accounts"><i class="fas fa-user"></i> <span>User Accounts</span></a>
				</li>
				<li class='<?php echo $nav == "ACTIVITY LOGS" ? "active" : " "; ?>'>  
					<a href="<?php echo base_url(); ?>activity-logs"><i class="fas fa-clock"></i> <span>Activity Logs</span></a>
				</li>
				<li class='<?php echo $nav == "DOWNLOAD DATABASE" ? "active" : "";?>'>
					<a href="<?php echo base_url(); ?>download-database"><i class="fas fa-database"></i> <span>Download Database</span></a>
				</li>
				<li class='<?php echo $nav == "ABOUT" ? "active" : "";?>'>
					<a href="<?php echo base_url(); ?>about"><i class="fas fa-question-circle"></i> <span>About</span></a>
				</li>
				<br>
				<hr style="background-color: #d5dea7">
				<li>
					<a id="sargs-logout"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
				</li>
			</ul>
		</div>
	</div>
				
	<div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 620.48px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
	
</div>