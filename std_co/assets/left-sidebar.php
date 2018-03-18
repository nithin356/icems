<!-- Left navbar-sidebar -->
<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse slimscrollsidebar">
				<div class="user-profile">
						<div class="dropdown user-pro-body">
								<div>
									<img src="../plugins/images/users/man.png" alt="user-img" class="img-circle"></div>
								<a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<?php echo $username; ?></a>
								<ul class="dropdown-menu animated flipInY">
										<li><a href="my-profile.php"><i class="ti-user"></i> My Profile</a></li>
										<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
								</ul>
						</div>
				</div>
			
				<ul class="nav" id="side-menu">
								<!-- /input-group -->
						</li>
						<li class="nav-small-cap m-t-10"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Main Menu
						</li>
			<!--sidebar design-->
						<li> <a href="" class="waves-effect">
							<i class="fa fa-bookmark-o" data-icon="v"></i>&nbsp;&nbsp;
							<span class="hide-menu"> Fest <span class="fa arrow"</span> 
							<span class="label label-rouded label-danger pull-right"></span></a>
								<ul class="nav nav-second-level">
								<li> <a href="../std_co/view-fest.php">View Fest</a> </li>
								</ul>
						</li>
						<li> <a href="" class="waves-effect">
							<i class="fa fa-users" data-icon="v"></i>&nbsp;&nbsp;
							<span class="hide-menu text-danger"> Participant <span class="fa arrow"</span> <span class="label label-rouded label-danger pull-right"></span></a>
								<ul class="nav nav-second-level">
										<li> <a href="../std_co/add_participant.php">Add Participant</a> </li>
										<li> <a href="../std_co/view-participant.php">View Partcipant</a> </li>
									<li> <a href="../std_co/edit-participant.php">Edit Particixpant</a> </li>
								</ul>
						</li>
						
						<li><a href="" class="waves-effect">
							<i data-icon=")" class="fa fa-bullhorn"></i>&nbsp;&nbsp; 
							<span class="hide-menu">Results<span class="fa arrow"></span></span></a>
								<ul class="nav nav-second-level">
										<li><a href="../std_co/result.php">View Results</a></li>
								</ul>
						</li>
						<li><a href="logout.php" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
		</div>
</div>

<!-- Left navbar-sidebar end -->
