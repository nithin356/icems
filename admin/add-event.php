<?php
include '../login/accesscontroladmin.php';
$userid=$_SESSION['username'];
require('connect.php');
if (isset($_POST['eventsubmit']))
	{
		$event_name=mysqli_real_escape_string($connection,$_POST['username']);
		$festid=$_POST['festid'];
		$e_desc=mysqli_real_escape_string($connection,$_POST['e_desc']);
		$round=mysqli_real_escape_string($connection,$_POST['round']);
		$parti=mysqli_real_escape_string($connection,$_POST['parti']);
		$query="INSERT INTO `add_event` (`f_id`, `e_eventname`, `e_desc`, `round`, `parti`) VALUES ('$festid', '$event_name', '$e_desc', '$round', '$parti')";
		$result = mysqli_query($connection, $query);

	if($result)
				{
					$smsg = "Event Created Successfully.";
				}
				else
				{
					$fmsg = "Event Creation Failed".mysqli_error($connection);
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
                </div>

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
									<select required class="form-control" name="festid">
                                    <?php
									 $selectfest="SELECT * FROM fest";
									 $resultfest = mysqli_query($connection, $selectfest);
									?>
									 
								   	 <option disabled hidden selected >Select Fest</option>
									 <?php while($rowfest = mysqli_fetch_assoc($resultfest)) { ?>
   									 <option value="<?php echo $rowfest['f_id']; ?>"> <?php echo $rowfest["fname"]; ?> </option>
								     <?php } ?>
									 </select>
								</div>
								<div class="form-group">
                                    <label for="inputName1" class="control-label">Event name</label>
                                    <input type="text" autocomplete="off" name="username" class="form-control" id="username" placeholder="Enter your Event name" required >
                                   	<div>
										<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="usernameResult" style="color: #E40003"></span>
										</div>
				              </div>
				        
                           <div class="form-group">
                                
                                    <label for="inputName1" class="control-label">Event Description</label>
                                    <textarea class="form-control" id="username" name="e_desc" placeholder="Enter Event Description" value="" required></textarea>
								</div>
			                    <div class="form-group">
									 <label for="inputEmail" class="control-label">Event Round</label>
								<select required class="form-control" name=round>
									<option disabled hidden selected>SELECT ROUND</option>
									<option value="1">1 ROUNDS</option>
									<option value="2">2 ROUNDS</option>
									<option value="3">3 ROUNDS</option>
									<option value="4">4 ROUNDS</option>
									<option value="5">5 ROUNDS</option>
									<option value="6">6 ROUNDS</option>
									<option value="7">7 ROUNDS</option>
									<option value="8">8 ROUNDS</option>
															
								</select> 
								</div>
								<div class="form-group">
									 <label class="control-label">Required Participants</label>
								<select required class="form-control" name=parti>
									<option disabled hidden selected>SELECT PARTICIPANTS</option>
									<option value="1">1 Participants</option>
									<option value="2">2 Participants</option>
									<option value="3">3 Participants</option>
									<option value="4">4 Participants</option>
									<option value="5">5 Participants</option>
									<option value="6">6 Participants</option>
								</select> 
								</div>
                                <div class="form-group">
                                  <button type="submit" name="eventsubmit" class="btn btn-info">Submit</button>
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
