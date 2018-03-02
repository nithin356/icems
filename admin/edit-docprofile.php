<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$username=$_SESSION['username'];
$e_id = $_GET['id'];

$query="SELECT e_eventname, e_desc, e_heads FROM add_event WHERE e_id='$e_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

//update profile
if(isset($_POST['updateprofile']))
{
	$e_eventname=mysqli_real_escape_string($connection,$_POST['e_eventname']);
	$e_heads=mysqli_real_escape_string($connection,$_POST['e_heads']);
	$e_desc= mysqli_real_escape_string($connection,$_POST['e_desc']);
	
	$uquery="UPDATE add_event SET e_eventname='$e_eventname', e_heads='$e_heads', e_heads='$e_heads' WHERE e_id='$e_id'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT e_eventname, e_desc, e_heads FROM add_event WHERE e_id='$e_id'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";

	}
	else
	{
		$fmsg="error!";
	}
}

?>
<!--html design-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICEMS Inter Collegiate Event Management System">
    <meta name="author" content="Nithin">
    <!--csslink.php includes fevicon and title-->
    <?php include 'assets/csslink.php'; ?>
      
    <!-- username check js start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#e_eventnameLoading').hide();
		$('#e_eventname').keyup(function(){
		  $('#e_eventnameLoading').show();
	      $.post("check-docusername.php", {
	        username: $('#e_eventname').val()
	      }, function(response){
	        $('#e_eventnameResult').fadeOut();
	        setTimeout("finishAjax('e_eventnameResult', '"+escape(response)+"')", 500);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#usernameLoading').hide();
	  $('#'+e_id).html(unescape(response));
	  $('#'+e_id).fadeIn();
	} //finishAjax
</script>
<!-- username check js end -->
      
      
      
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Event Details</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!--DNS added Dashboard content-->
                <?php if(isset($fmsg)) { ?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $fmsg; ?>
									</div> 
					            <?php }?> 
							<?php if(isset($smsg)) { ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										 <?php echo $smsg; ?>
									</div> 
				<?php }?>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" height="100%" alt="user" src="../plugins/images/profile-menu.png">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><?php if($row["gender"]=='male') { ?> <img src="../plugins/images/users/doctor-male.jpg" class="thumb-lg img-circle" ><?php } else { ?> <img src="../plugins/images/users/doctor-female.jpg" class="thumb-lg img-circle" > <?php } ?> </a>
                                        <h4 class="text-white"><?php echo $row["username"]; ?></h4>
                                        <h5 class="text-white"><?php echo $row["email"]; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <!--<li role="presentation" class="nav-item"><a href="#home" class="nav-link " aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs"> Activity</span></a></li>-->
                                <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Setting</span></a></li>
                                <li role="presentation" class="nav-item">
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Event Name</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["e_eventname"]; ?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Event Head</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["e_heads"]; ?></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 "> <strong>Event Description</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["e_desc"]; ?></p>
                                        </div>
                                        
                                    </div>
                                     <div class="row">
                                     <div class="col-md-3 col-xs-6 b-r">
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6 b-r"> 
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6">                                   <p class="text-muted"></p>
                                     </div>
									 </div>
                                     </div>
                                
                               
                            <div class="tab-pane" id="settings">
                             <form data-toggle="validator" method="post">
                              
                              
                         		<div class="row">
                                	<div class="col-md-6">
                                       <div class="form-group">
                                        	 <label class="control-label">Event Name</label>
											<div class="col-sm-12 p-l-0">
												<div class="input-group">
											<input type="text" name="e_eventname" class="form-control" id="fname" placeholder="Enter your Event name" value="<?php echo $row["e_eventname"]; ?>" required>
													<!--onKeyUp="copyTextValue();"-->
												</div>
											</div>
                                         </div>
                                    </div>
                                    <!--/span-->
									 <div class="col-md-6">
										  <div class="form-group">
											   <label class="control-label">Event Heads</label>
											   <input type="text" name="e_heads" id="lastName" class="form-control" placeholder="Enter Event head name" value="<?php echo $row["e_heads"]; ?>" required>
											   <!--<span class="help-block"> This field has error. </span>-->
										   </div>
									 </div>
                                    <!--/span-->
                                 </div>
                               
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Event Description</label>
                                    <textarea type="text" class="form-control" autocomplete="off" id="username" name="e_desc" placeholder="Your Description" value="<?php echo $row["e_desc"]; ?>" required></textarea>
                                    <!-- username check start -->
										<div>
						                </div>
                                        </div>
                                  
                                <div class="form-group p-t-0">
                                    
                                        <button class="btn btn-success" name="updateprofile">Update </button>
								 </div>
								 </div>
								</div>
                                </div>
                                
								</form>
                                
                                
								</div>
                               
                            </div>
                        </div>
                    </div>
                </div>
              
                <!--/row -->
                
                <!--DNS End-->
                <!-- .row -->
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Blank Starter page</h3>
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->
                <!-- .right-sidebar -->
                 <!-- Removed Service Panel DNS-->
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>

</html>
