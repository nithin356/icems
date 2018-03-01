<?php
include '../login/accesscontroladmin.php';
$username=$_SESSION['username'];
require('connect.php');
if (isset($_POST['eventsubmit']))
	{
		// real eacape sting is used to prevent sql injection hacking
		$event_name=mysqli_real_escape_string($connection,$_POST['event_name']);
		$e_desc=mysqli_real_escape_string($connection,$_POST['e_desc']);
		$e_heads= mysqli_real_escape_striang($connection,$_POST['e_heads']);
		//sqll query
		//double quotes outside so we can use single quotes inside
				$query="INSERT INTO `add_event`(e_eventname, e_desc, e_heads) VALUES ('$event_name','$e_desc','$e_heads')";
				$result = mysqli_query($connection, $query);
				//takes two arguments
				if($result)
				{
					$smsg = "Event Created Successfully.";
				}
				else
				{
					$fmsg = "Event Creation Failed";
				}
			}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AlphaCare Online Hospital Management System">
    <meta name="author" content="Dhanush KT, Nishanth Bhat">
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
	        e_eventname: $('#e_eventname').val()
	      }, function(response){
	        $('#e_eventnameResult').fadeOut();
	        setTimeout("finishAjax('e_eventnameResult', '"+escape(response)+"')", 500);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#e_eventnameLoading').hide();
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Event</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

				<!--- imported add-doctors---->
				<!--Script to copy the input from fname to username-->
				<script>
					function copyTextValue() {
					var text1 = document.getElementById("e_eventname").value;
					document.getElementById("username").value = text1;
					}
				</script>

				<div class="row">
				<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Events Information</h3>
                            <form data-toggle="validator" method="post">
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
                                	<div class="col-md-6">
                                       <div class="form-group">
                                        	 <label class="control-label">Event Name</label>
											<div class="col-sm-12 p-l-0">
												<div class="input-group">
																<input type="text" name="e_eventname" class="form-control" id="fname" placeholder="Enter the Event name" required>
													<!--onKeyUp="copyTextValue();"-->
												</div>
											</div>
                                         </div>
                                    </div>
                                    <!--/span-->
									 <div class="col-md-6">
										  <div class="form-group">
											   <label class="control-label">Event head</label>
											   <input type="text" name="e_heads" id="lastName" class="form-control" placeholder="If there is two Event Heads then drop a comma(,)" required>
											   <!--<span class="help-block"> This field has error. </span>-->
										   </div>
									 </div>
                                    <!--/span-->
                                 </div>

                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Event Description</label>
                                    <textarea  class="form-control" autocomplete="off" id="username" name="e_desc" placeholder="Description of the Event " required>
									</textarea>
                                    <!-- username check start -->								
								<div>
			                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="eventsubmit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
				<!---End of impoted--->
                <!-- .right-sidebar -->
                <!--DNS Removed Service Panel-->
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
