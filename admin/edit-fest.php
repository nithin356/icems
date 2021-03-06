<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
$f_id = $_GET['id'];

$query="SELECT coname, fname, date, f_desc FROM fest WHERE f_id='$f_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

//update profile
if(isset($_POST['updateprofile']))
{
	$cname=mysqli_real_escape_string($connection,$_POST['cname']);
	$fest=mysqli_real_escape_string($connection,$_POST['fest']);
	$date=mysqli_real_escape_string($connection,$_POST['date']);
	$desc=mysqli_real_escape_string($connection,$_POST['desc']);
	$uquery="UPDATE fest SET coname='$cname', fname='$fest', date='$date', f_desc='$desc' WHERE f_id='$f_id'";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT coname, fname, date, f_desc FROM fest WHERE f_id='$f_id'";
		$sresult = mysqli_query($connection, $squery);
		$row = mysqli_fetch_assoc($sresult);
		$smsg="Fest Name updated successfully!";

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
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Fest Details</h4>
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
                            <div class="white-box">
                            <div class="user-bg">
								<br><center><img width="50%" height="50%"  alt="user" src="../plugins/images/calendar.png"></center>
								
                                <div class="overlay-box">
									<br><center><img width="50%" height="50%"  alt="user" src="../plugins/images/calendar.png"></center>
                                    <div class="user-content">
                                       </div>
                                </div>
                                </div>
							</div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <!--<li role="presentation" class="nav-item"><a href="#home" class="nav-link " aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-home"></i></span><span class="hidden-xs"> Activity</span></a></li>-->
                                <li role="presentation" class="nav-item"><a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Fest Profile</span></a></li>
                                <li role="presentation" class="nav-item"><a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Setting</span></a></li>
                                <li role="presentation" class="nav-item">
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>College Name</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["coname"]; ?></p>
                                        </div> 
										<div class="col-md-3 col-xs-6 b-r"> <strong>Fest</strong>
                                            <br>
                                            <p class="text-muted"><?php echo $row["fname"]; ?></p>
                                        </div> 
										<div class="col-md-3 col-xs-6 b-r"> 
											&nbsp;<strong>Date</strong>
                                            <br>
                                            &nbsp;<i><?php echo $row["date"]; ?></i>
                                        </div>
										<div class="col-md-3 col-xs-6 b-r" style="word-wrap: break-word"> 
											&nbsp;<strong>Description</strong>
                                            <br>
                                            &nbsp;<i><?php echo $row["f_desc"]; ?></i>
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
                                	<div class="col-md-6">
                                       <div class="form-group">
                                        	 <label class="control-label">College Name</label>
											<div class="col-sm-12 p-l-0">
												<div class="input-group">
											<input type="text" name="cname" class="form-control" id="cname" placeholder="<?php echo $row['coname']; ?>" value="<?php echo $row['coname']; ?>" required>
													</input>
													<!--onKeyUp="copyTextValue();"-->
												</div>
											</div>
                                         </div>
									<div class="form-group">
                                        	 <label class="control-label">Fest Name</label>
											<div class="col-sm-12 p-l-0">
												<div class="input-group">
											<input type="text" name="fest" class="form-control" id="fname" placeholder="<?php echo $row['fname']; ?>" value="<?php echo $row['fname']; ?>" required>
													</input>
													<!--onKeyUp="copyTextValue();"-->
												</div>
											</div>
                                         </div>
                                    </div>
								 </div>
									<div class="form-group">
                                    <label for="inputName1" class="control-label">Fest date</label>
										<input id="datepicker" type="date" onchange="checkDate()" required class="datepicker-input form-control" name="date" type="text" data-date-format="yyyy-mm-dd" placeholder="<?php echo $row['date']; ?>" value="<?php echo $row['date']; ?>">
                                    <!--<input id="datepicker" onchange="checkDate()" name="date" required class="form-control datepicker-input" type="date" data-date-format="yyyy-mm-dd" placeholder="<?php echo $row['date']; ?>" value="<?php echo $row['date']; ?>">-->
								</div>
								
								<div>
                                    <label for="inputName1" class="control-label">Fest Description</label>
                                    <input type="text" class="form-control" id="username" name="desc" required value="<?php echo $row['f_desc']; ?>">
								</div>
                               <br>
                              
                                <div class="form-group p-t-0">
                                    <button class="btn btn-success" name="updateprofile">Update Fest Details </button>
						
								</div>
								</div>
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
<script>
  function checkDate() {
   var selectedText = document.getElementById('datepicker').value;
   var selectedDate = new Date(selectedText);
   var now = new Date();
   if (selectedDate < now) {
    alert("Date must be in the future");
	document.getElementById('datepicker').value=null;
   }
 }
</script>
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>

</html>
