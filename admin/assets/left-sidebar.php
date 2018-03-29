<!-- Left navbar-sidebar -->
<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse slimscrollsidebar">
				<div class="user-profile">
						<div class="dropdown user-pro-body">
								<div>
									<img src="../plugins/images/users/man.png" alt="user-img" class="img-circle"></div>
								<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<?php echo $userid; ?></a>
								<ul class="dropdown-menu animated flipInY">
										<li><a href="my-profile.php"><i class="ti-user"></i> My Profile</a></li>
										<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
								</ul>
						</div>
				</div>
			
				<ul class="nav" id="side-menu">
								<!-- /input-group -->
						</li>
						<li class="nav-small-cap m-t-10"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						Main Menu
						</li>
			<!--sidebar design-->
						<li><a href="../admin/index.php" class="waves-effect">
							<i data-icon=")" class="fa fa-dashboard"></i>&nbsp;&nbsp; 
							<span class="hide-menu">Dashboard</span></a>									
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="fa fa-bookmark-o"></i>&nbsp;&nbsp; 
							<span class="hide-menu">Fest<span class="fa arrow"></span></span></a>
								<ul class="nav nav-second-level">
									<li><a href="../admin/view-fest.php">view Fest</a></li>
								</ul>
						</li>
						<li> <a href="" class="waves-effect">
							<i class="fa fa-calendar-o" data-icon="v"></i>&nbsp;&nbsp;
							<span class="hide-menu"> Event<span class="fa arrow"</span> 
							<span class="label label-rouded label-danger pull-right"></span></a>
								<ul class="nav nav-second-level">
										<li> <a href="../admin/add-event.php">Add Event</a> </li>
										<li> <a href="../admin/view-event.php">View Event</a> </li>
								</ul>
						</li>
						
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="fa fa-group"></i>&nbsp;&nbsp; 
							<span class="hide-menu">Event Head<span class="fa arrow"></span></span>
							</a>
								<ul class="nav nav-second-level">
										<li><a href="../admin/add-eventhead.php">Add Event Head</a></li>
										<li><a href="../admin/view_eventhead.php">View Event Head</a></li>
								</ul>
						</li>
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="fa fa-group"></i>&nbsp;&nbsp;
							<span class="hide-menu"><font size=2>Student Co-ordinator</font><span class="fa arrow"></span></span></a>
								<ul class="nav nav-second-level">
										<li><a href="../admin/view-student-co-ordinator.php">View Co-ordinator</a></li>
										</ul>
										</li>
			
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="fa fa-group"></i>&nbsp;&nbsp;
							<span class="hide-menu"><font size=2>Participants</font>
								<span class="fa arrow"></span></span></a>
								<ul class="nav nav-second-level">
										<li><a href="../admin/view-participant.php">View Participant</a></li>
										</ul>
						</li>
	
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="linea-icon linea-basic fa-fw"></i>&nbsp;&nbsp;
							<span class="hide-menu">Feedback<span class="fa arrow"></span></span></a>
								<ul class="nav nav-second-level">
										<li><a href="../admin/feedback.php">View FeedBack</a></li>
										</ul>
										</li>
						<li><a href="logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
		</div>
</div>

<!-- Left navbar-sidebar end -->
