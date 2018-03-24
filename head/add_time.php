<?php
include '../login/accesscontrolhead.php';
require('connect.php');
$username=$_SESSION['h_username'];
$gethname="SELECT h_id FROM head WHERE h_username='$username'";
$gethnameresult=mysqli_query($connection,$gethname);
$gethnamerow=mysqli_fetch_assoc($gethnameresult);
$hid=$gethnamerow['h_id'];
$geteventname="SELECT h_event FROM head where h_id='$hid'";
$getfestnameresul1=mysqli_query($connection,$geteventname);
$getfestnamero1=mysqli_fetch_assoc($getfestnameresul1);

if (isset($_POST['submit']))
	{
		$eventname= mysqli_real_escape_string($connection,$_POST['event']);
		$ff= $_POST['ff'];
		$tt= $_POST['tt'];
		if($ff <= $tt)
	{	
				$query="INSERT INTO `time`(t_event, t_from, t_to) VALUES ('$eventname','$ff','$tt')";
				$result = mysqli_query($connection, $query);
	
				if($result)
				{
					$smsg = "Time Added Succesfully";
				}
				else
				{
					$fmsg = "Time Updating Failed";
				}
		}
			else
			{
			$fmsg = "Avoid overlapping of From and To time";
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="../plugins/bower_components/colorpicker/bootstrap-colorpicker.js" rel="stylesheet" type="text/css"/>
      <!-- username check js start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check-eventheadname.php", {
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
                        <h4 class="page-title">Event Scheduling</h4>
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
                <!--row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Event Info</h3>
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
									 <label for="inputEmail" class="control-label ">Event</label>
									<input type="text" id="username" name="event" class="form-control" value="<?php echo $getfestnamero1['h_event']; ?>" readonly/>  
									
                                </div>
								<div class="form-group">
                                    <label for="inputName1" class="control-label">Enter Time</label>
                                    <br>
									From:
									<input id="time" type="time" name="ff" 
									class="form-control clockpicker" required >
                                    To:
									<input id="time" type="time" name="tt" 
									class="form-control clockpicker" required >
								</div>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
            </div>
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
	<script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="js/mask.js"></script>
    <?php include'assets/jslink.php'; ?>
</body>

</html>
