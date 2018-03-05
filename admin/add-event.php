<?php
include '../login/accesscontroladmin.php';
$username=$_SESSION['username'];
require('connect.php');
if (isset($_POST['eventsubmit']))
	{
		$event_name=mysqli_real_escape_string($connection,$_POST['username']);
		$fest=mysqli_real_escape_string($connection,$_POST['fest']);
		$e_desc=mysqli_real_escape_string($connection,$_POST['e_desc']);
		$query="INSERT INTO `add_event`(fest, e_eventname, e_desc) VALUES ('$fest','$event_name','$e_desc')";
		$result = mysqli_query($connection, $query);

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
	      $.post("check-eventname.php", {
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

                         		<div class="form-group">
                                    <label class="control-label">Fest name</label>
                                    <input type="text" autocomplete="off" name="fest" class="form-control" placeholder="Enter your Fest name" required ></input>
								<br/>
								<div class="form-group">
                                    <label for="inputName1" class="control-label">Event name</label>
                                    <input type="text" autocomplete="off" name="username" class="form-control" id="username" placeholder="Enter your Event name" required >
                                    <!--value="<?php // if(isset($username) & !empty($username)){ echo $username; }?>"-->
                                    <!-- username check start -->
										<div>
										<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="usernameResult" style="color: #E40003"></span>
										</div>
				                     <!-- username check end -->
                                </div>
				        
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Event Description</label>
                                    <textarea type="text" class="form-control" autocomplete="off" id="username" name="e_desc" placeholder="Enter Event Description" value="" required></textarea>
								</div>
			                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="eventsubmit" class="btn btn-info">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
            <?php include'assets/footer.php'; ?>
        </div>
	</div>
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>

</html>
