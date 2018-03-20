<?php
include '../login/accesscontrolstdco.php';
require('connect.php');
$username=$_SESSION['s_username'];
$eid = $_GET['id'];

$query="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
												
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

//update profile
if(isset($_POST['update']))
{
	if(isset($_POST['parti1']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti1']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid1']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
	}
	if(isset($_POST['parti2']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti2']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid2']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	
		if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
	}
	if(isset($_POST['parti3']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti3']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid3']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
	}
	if(isset($_POST['parti4']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti4']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid4']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
	}
	if(isset($_POST['parti5']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti5']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid5']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
	}
	if(isset($_POST['parti6']))
	{
	$p1=mysqli_real_escape_string($connection,$_POST['parti6']);
	$partid=mysqli_real_escape_string($connection,$_POST['partid6']);
	$uquery="UPDATE participant SET p_name='$p1' WHERE p_id='$partid'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,add_event.e_eventname,fest.fname,add_event.parti FROM participant JOIN add_event ON  participant.p_eventname=add_event.e_id JOIN fest ON fest.f_id=add_event.f_id WHERE p_eventname='$eid'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Profile updated successfully!";
	}
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
	      $.post("check-eventname.php", {
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
                        <h4 class="page-title">Edit Participant Details</h4>
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
                            <div class="user-bg"> <img width="100%" height="100%" alt="user" src="../plugins/images/png.png">
                                <div>
                                    <div class="user-content">
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
                                <li role="presentation" class="nav-item">
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 "> <strong>Fest:</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["fname"]; ?></p>
                                        </div>
											<div class="col-md-6 col-xs-6 "> <strong>Event name:</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["e_eventname"]; ?></p>
                                        </div>
											<div class="col-md-6 col-xs-6 text-uppercase"> <strong>Participant:</strong>
                                        	 <?php $loopquery="SELECT * FROM participant WHERE p_eventname='$eid'";
												$loopresult=mysqli_query($connection,$loopquery);
												while($looprow=mysqli_fetch_assoc($loopresult)) { echo '<br>'.$looprow["p_name"]; }?>
                                        </div>
									  </div>
                                     <div class="row">
                                     <div class="col-md-3 col-xs-6 b-r">
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6 b-r"> 
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6">
										 <p class="text-muted"></p>
                                     </div>
									 </div>
                                     </div>
                                
                               
                            <div class="tab-pane" id="settings">
                             <form data-toggle="validator" method="post">
                              	<div class="row">
                                	<div class="col-md-12">
                                       <div class="form-group">
                                        	 <label class="control-label">Event Name</label>
											<div class="col-sm-12 p-l-0">
											<div class="input-group">
											<?php
											 $selectevent="SELECT e_eventname FROM add_event";
											 $resultevent = mysqli_query($connection, $selectevent);
											?>
											<input readonly class="form-control" value="<?php echo $row['e_eventname']; ?>">
												</div>	
											</div>
											</div>
                                         </div>
								 </div>                      
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Edit Participant</label>
                                    <!--<input type="text" class="form-control" autocomplete="off" id="username" name="p1" value="<?php //echo $row['p_name']; ?>" required>-->
									<br>
									<?php $loopid=1; 
									$loopend=$row['parti']; 
									while($loopid<=$loopend)
									{
										$loopquery="SELECT * FROM participant WHERE p_eventname='$eid'";
										$loopresult=mysqli_query($connection,$loopquery);
										while($looprow=mysqli_fetch_assoc($loopresult)) {
										$pname=$looprow['p_name'];
											$pid=$looprow['p_id'];
										echo '<input type="hidden" class="form-control" name="partid'.$loopid.'" value="'.$pid.'" > <br>';
									echo '<input type="text" class="form-control" autocomplete="off" id="username" name="parti'.$loopid.'" value="'.$pname.'" required> <br>'; 
										$loopid++; }
									  } ?> 
								
	
										<div>
						                </div>
                                        </div>
                                  
                                <div class="form-group p-t-0">
                                    
                                        <button class="btn btn-success" name="update">Update Event </button>
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
