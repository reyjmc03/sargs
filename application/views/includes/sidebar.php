<div class="sidebar" id="sidebar">
	<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 887px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 887px;">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span>MAIN MENU</span>
				</li>
				<li class='<?php echo $nav == "DASHBOARD" ? "active" : " "; ?>'> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="student-details.html">Student List</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="student-details.html">Instructor List</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-building"></i> <span> Course</span> <span class="menu-arrow"></span></a>
					<ul>
						<li><a href="departments.html">Course List</a></li>
					</ul>
				</li>
				
				<!-- <hr> -->
				<!-- System Management -->
				<li class="menu-title"> 
					<span>REPORTS</span>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-th-large"></i> <span>Individual Training List</span></a>
				</li>

				<li class="menu-title"> 
					<span>CERTIFICATES AND AWARDS</span>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="fas fa-th-large"></i> <span>Individual Training List</span></a>
				</li>
				<!-- <hr> -->
				<!-- System Management -->
				<li class="menu-title"> 
					<span>SYSTEM MANAGEMENT</span>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>user-accounts"><i class="fas fa-users"></i> <span>User Accounts</span></a>
				</li>
				<li class=""> 
					<a href="<?php echo base_url(); ?>user-logs"><i class="fas fa-clock"></i> <span>User Logs</span></a>
				</li>
			</ul>
		</div>
	</div>
				
	<!-- <div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 620.48px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
	-->
</div>