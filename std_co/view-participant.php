<?php
include '../login/accesscontrolstdco.php';
require('connect.php');
$username=$_SESSION['s_username'];
$getfestname="SELECT s_id, fest FROM std_co WHERE s_username='$username'";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$sid=$getfestnamerow['s_id'];
$fid=$getfestnamerow['fest'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICEMS Inter Collegiate Event Management System">
    <meta name="author" content="Nithin">
        <!--csslink.php includes fevicon and title-->
    <?php include 'assets/csslink.php'; ?>
</head>

<body class="fix-sidebar">
    <!--header.php includes preloader, top navigarion, logo, user dropdown-->
    <!--div id wrapper in header.php-->
    <!--left-sidebar.php includes mobile search bar, user profile, menu-->
    <?php include 'assets/header.php';
	include 'assets/left-sidebar.php';
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url(../plugins/images/w.jpg)">
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Participant</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                      <?php echo breadcrumbs(); ?>
                    </div>
                </div>
				<div class="row">
      			<?php
					$sql = "SELECT *,fest.fname FROM add_event JOIN fest ON add_event.f_id=fest.f_id WHERE add_event.f_id='$fid'";
					$sresult = mysqli_query($connection, $sql);
					//$result = mysqli_fetch_assoc($sresult);
					?>
				       <?php while($result = mysqli_fetch_assoc($sresult)) { ?>
   					 <div class="col-md-4 col-sm-4">
						 <div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:10px"><i class="fa fa-users"></i></div>
                       	<div class="white-box">
                            <div class="row">
								   <div>
									<h4>Fest Name:</h4><h3 class="box-title m-b-0"><?php echo $result["fname"];?></h3>  
                                    <h4>Date:</h4><h3 class="box-title m-b-0"><?php echo $result["e_eventname"];?></h3>
									   <h4>Participants Names:<br></h4> <!--u dead ot still working?-->
									   <?php $geteventid=$result['e_id']; $getpatrispeenkan=mysqli_query($connection,"SELECT * FROM participant WHERE p_eventname='$geteventid'"); 
										if(mysqli_num_rows($getpatrispeenkan)<=0){ echo "No registered paricipants<br><br>"; } else {						
									while($getparti=mysqli_fetch_assoc($getpatrispeenkan)) {   ?><strong> 
									   <?php echo $getparti["p_name"].', ';?> </strong> <?php } } ?>
									   <?php if(mysqli_num_rows($getpatrispeenkan)<=0){ ?>
									   <a href="add_participant.php" class="fcbtn btn btn-info">Register</a>
									   <?php } else { ?>
									   <br><br>
                                    <a href="edit.php?id=<?php echo $result['e_id']; ?>" class="fcbtn btn btn-info">Edit</a>
									   <?php } ?>
								  </div>
								
                               </div>
                            </div>
                        </div>
					<?php
						} 
							?>
                    </div>
           		</div>
			</div>
				
      <!--row -->
               <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Registered Participants</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Participant ID</th>
                                            <th>Participant 1</th>
                                           	<th>Fest</th>
											<th>Event Name</th>
											<th>Action</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>

										
													<tr>
														<td> <?php// echo $key+1; ?> </td>
														<td> <?php//echo $result["p_name"] ?> </td>
														<td> <?php //echo $result["fname"]; ?> </td>
														<td> <?php //echo $result["e_eventname"]; ?> </td>
														<td><a href="edit.php?id=<?php //echo $result['e_id']; ?>" class="fcbtn btn btn-info">Edit</a></td>
											
												</tr>
										  <?php
											//	}
										  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>
</html>

