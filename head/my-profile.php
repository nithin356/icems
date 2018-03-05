<?php
include '../login/accesscontrolhead.php';
require('connect.php');
$username=$_SESSION['h_username'];

$query="SELECT h_id, h_email, h_event, h_password FROM head WHERE h_username='$username'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$id=$row["h_id"];

//update profile
if(isset($_POST['updateprofile']))
{
	$username= mysqli_real_escape_string($connection,$_POST['h_username']);
	$email=mysqli_real_escape_string($connection,$_POST['h_email']);
	$event=mysqli_real_escape_string($connection,$_POST['h_event']);
	
	$uquery="UPDATE head SET h_username='$username', h_email='$email' h_event='$event', WHERE h_id='$id'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT h_username, h_email, h_event FROM admin WHERE h_id='$id'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
		$_SESSION['h_username']=$row['h_username'];
		$username=$_SESSION['h_username'];
		

	}
	else
	{
		$fmsg="error!";
	}
}
//change password
if(isset($_POST['changepw']))
{
	$oldpw=$_POST['oldpassword'];
	if($oldpw==$row["h_password"])
	{
		$npw=$_POST['newpassword'];
		$pwquery="UPDATE head SET h_password='$npw' WHERE h_username='$username'";
		$pwresult = mysqli_query($connection, $pwquery);
		$smsg="Password updated successfully!";
		
	}
	else
	{
		$fmsg="Wrong old password!";
	}
}


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
      <!-- username check js start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check-adminusername.php", {
	        username: $('#username').val()
	      }, function(response){
	        $('#usernameResult').fadeOut();
	        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 500);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#usernameLoading').hide();
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
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
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
         
               
                
                <!--row -->
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
                                        <a href="javascript:void(0)"> <img src="../plugins/images/users/user(2).png" class="thumb-lg img-circle" > </a>
                                        <h4 class="text-white"><?php echo $username; ?></h4>
                                        <h5 class="text-white"><?php echo $row["h_email"]; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <!--<li role="presentation" class="nav-item"><a href="#home" class="nav-link " aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs"> Activity</span></a></li>-->
                                <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Setting</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#changepassword" class="nav-link" aria-controls="changepassword" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-key"></i></span> <span class="hidden-xs">Change Password</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#remove" class="nav-link" aria-controls="remove" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-times"></i></span> <span class="hidden-xs">Remove Account</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Username</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $username; ?></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6 "> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["h_email"]; ?></p>
										 <strong>Event</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["h_event"]; ?></p>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                               
                            <div class="tab-pane" id="settings">
                             <form data-toggle="validator" method="post">
                             
                               
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Username</label>
                                    <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username is used to login" value="<?php echo $username ?>" required>
                                    <!-- username check start -->
										<div>
										<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="usernameResult" style="color: #E40003"></span>
										</div>
				                     <!-- username check end -->
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row["h_email"]; ?>" data-error="This email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>
								 <div class="form-group">
                                    <label for="inputEmail" class="control-label">Event Name</label>
                                    <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row["h_event"]; ?>" data-error="This email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" type="submit" name="updateprofile">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="tab-pane" id="changepassword"> 
                                
                                <form data-toggle="validator" method="post">
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label">Change Password</label>
                                    <div class="row">
                                    <div class="form-group col-sm-12 p-l-0 p-t-10">
                                    <input type="password" name="oldpassword" data-toggle="validator" data-minlength="6" class="form-control" id="oldPassword" placeholder="Old Password" required>
                                     </div>
									</div>
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="newpassword" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="New Password" required>
                                            <span class="help-block">Minimum of 6 characters</span> </div>
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="retypepassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Passwords don't match" placeholder="Confirm New Password" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group p-t-0">
                                    
                                        <button class="btn btn-success" name="changepw">Change Password</button>
                                     
                                </div>
                                
								</form>
                                
                                
								</div>
                              	<div class="tab-pane" id="remove">
                              		<div class="text-center">
                              		<a href="#" class="fcbtn btn btn-danger model_img deleteAdmin" data-id="<?php echo $h_id ?>" id="deleteDoc">Remove Admin Account</a>
									</div>
								</div>
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

<script>
$(document).ready(function() {
  $('.deleteAdmin').click(function(){
    id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this account!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false,
		  closeOnCancel: false
      },function(isConfirm)
		 {   
           if (isConfirm) {
			   $.ajax({
			  url: 'delete.php?id='+id,
			  type: 'DELETE',
			  data: {id:id},
			  success: function(){
				swal("Deleted!", "User has been deleted.", "success");
				window.location.replace("logout.php");
          }
        });   
            } else {     
                swal("Cancelled", "Admin account is safe :)", "error");   
            }
      });
  });

});
	
</script>
