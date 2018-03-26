<!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                
				<!-- Logo -->
             <div class="top-left-part">
                    <a class="logo" href="../index.html">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b><img hieght="150" style="padding-right: 65px" width="150" src="../plugins/images/favicon.png" /></b>
                        <!-- Logo text image you can use text also -->
						
                        <span class="hidden-xs"><font style="padding-left: 10px" size=5 face="batmanforeveralternate">ICEMS</font></span>
                    </a>
                </div>
                <!-- Logo -->
                
				<ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                </ul>
                
				<ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/user(2).png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $username; ?></b> </a>
                        <ul class="dropdown-menu dropdown-user scale-up">
							<li><a href="my-profile.php"><i class="ti-user"></i> My Profile</a></li>   <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                  </ul>
            </div>
		</nav>