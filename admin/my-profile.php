<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];

$query="SELECT * FROM admin WHERE username='$userid'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$id=$row["id"];

//update profile
if(isset($_POST['updateprofile']))
{
	$fnamee= mysqli_real_escape_string($connection,$_POST['fnamee']);
	$username= mysqli_real_escape_string($connection,$_POST['username']);
	$email=mysqli_real_escape_string($connection,$_POST['email']);
	
	$uquery="UPDATE admin SET username='$username', full='$fnamee', email='$email' WHERE id='$id'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT username, full, email FROM admin WHERE a_id='$id'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
		$_SESSION['username']=$row['username'];
		$username=$_SESSION['username'];
		

	}
	else
	{
		$fmsg="error!";
	}
}
//change password
if(isset($_POST['changepw']))
{
	$oldpw=mysqli_real_escape_string($connection,$_POST['oldpassword']);
	if($oldpw==$row["password"])
	{
		$npw=mysqli_real_escape_string($connection,$_POST['newpassword']);
		$pwquery="UPDATE admin SET password='$npw' WHERE username='$userid'";
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
</head>

<body class="fix-sidebar">
    <?php include 'assets/header.php';
	include 'assets/left-sidebar.php';
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url(../plugins/images/w.jpg)">
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                    <?php echo breadcrumbs(); ?>
                </div>
                </div>
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
				   <div class="user-bg">
					   <div class="overlay-box">
						   <div class="user-content">
							   <a href="javascript:void(0)"> <img src="../plugins/images/users/user(2).png" class="thumb-lg img-circle" > </a>
							   <h4 class="text-white"><?php echo $userid; ?></h4>
							   <h5 class="text-white"><?php echo $row["email"]; ?></h5>
						   </div>
					   </div>
				   </div>
			   </div>
		   </div>
		   <div class="col-md-8 col-xs-12">
			   <div class="white-box">
				   <ul class="nav customtab nav-tabs" role="tablist">
                      <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> 
					  <span class="hidden-xs">Profile</span></a></li>
                      <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> 
					  <span class="hidden-xs">Setting</span></a></li>
                      <li role="presentation" class="nav-item"><a href="#changepassword" class="nav-link" aria-controls="changepassword" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-key"></i></span> 
					  <span class="hidden-xs">Change Password</span></a></li>
                      <li role="presentation" class="nav-item"><a href="#remove" class="nav-link" aria-controls="remove" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-times"></i></span> 
					  <span class="hidden-xs">Remove Account</span></a></li>
                   </ul>
           <div class="tab-content">
			   <div class="tab-pane active" id="profile">
				   <div class="row">
					   <div class="col-md-3 col-xs-6 b-r"> 
						   <strong>Username</strong>
        	                 <br>
                           <p class="text-muted"><?php echo $userid; ?></p>
                       </div>
					   <div class="col-md-3 col-xs-6 b-r"> 
						   <strong>Full Name</strong>
        	                 <br>
                           <p class="text-muted"><?php echo $row["full"]; ?></p>
                       </div>
                       <div class="col-md-6 col-xs-6 "> 
						   <strong>Email</strong>
                             <br>
                            <p class="text-muted"><?php echo $row["email"]; ?></p>
                       </div>
                   </div>
			   </div>             
           <div class="tab-pane" id="settings">
			   <form data-toggle="validator" method="post">
				   <div class="form-group">
					   <label for="inputName1" class="control-label">Username</label>
                       <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username is used to login" value="<?php echo $userid ?>" required>
                  	<div>
						<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
						<span id="usernameResult" style="color: #E40003"></span>
				   </div>
				   </div>
                   <div class="form-group">
                       <label class="control-label">Full Name</label>
                       <input type="text" name="fnamee" class="form-control" placeholder="Fullname" value="<?php echo $row["full"]; ?>" required>
                   </div>
				   <div class="form-group">
                       <label for="inputEmail" class="control-label">Email</label>
                       <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row["email"]; ?>" data-error="This email address is invalid" required>
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
							   <label for="inputPassword" class="control-label">Change Password</label><div calss="row">
                               <div class="form-group col-sm-12 p-l-0 p-t-10">
                               <input type="password" name="oldpassword" data-toggle="validator" data-minlength="6" class="form-control" id="oldPassword" placeholder="Old Password" required>
                               </div>
							   </div>
                        	<div class="row">
								<div class="form-group col-sm-6">
                                    <input type="password" name="newpassword" data-toggle="validator" data-minlength="6" class="form-control" id="inputPassword" placeholder="New Password" required>
                               		<span class="help-block">Minimum of 6 characters</span> 
								</div>
                                <div class="form-group col-sm-6">
                                    <input type="password" name="retypepassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Passwords don't match" placeholder="Confirm New Password" required>
                                <div class="help-block with-errors">
								</div>
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
						   <a href="#" class="fcbtn btn btn-danger model_img deleteAdmin" data-id="<?php echo $id ?>" id="deleteDoc">Remove Admin Account</a>
			 		   </div>
			       </div>
				</div>
		   </div>
		</div>
	</div>
</div>
</div>
	</div>
	<?php include'assets/footer.php'; ?>
    </div>
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
			  url: 'deleteadmin.php?id='+id,
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
