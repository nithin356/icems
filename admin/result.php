<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
if (isset($_POST['event']) && isset($_POST['participant']))
	{
		$eventname= mysqli_real_escape_string($connection,$_POST['event']);
		$fest= mysqli_real_escape_string($connection,$_POST['fest']);
		$round=mysqli_real_escape_string($connection,$_POST['round']);
		$particpant=mysqli_real_escape_string($connection,$_POST['participant']);
		$particpant1=mysqli_real_escape_string($connection,$_POST['participant1']);
		$query="INSERT INTO `result`(r_eventname, r_pname, r_pname2, r_fest, round) VALUES ('$eventname','$fest','$particpant1','$round')";
				$result = mysqli_query($connection, $query);
	
				if($result)
				{
					$smsg = "Result Updated Succesfully";
				}
				else
				{
					$fmsg = "Result Updating Failed";
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
                        <h4 class="page-title">Add Event Head</h4>
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
                            <h3 class="box-title m-b-0">Result Information</h3>
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
                                    <?php
									 $selectfest="SELECT fname FROM fest";
									 $resultfest = mysqli_query($connection, $selectfest);
									?>
									 <select required class="form-control" name="fest">
								   	 <option disabled hidden selected class="form-control" value="">Select fests</option>
									 <?php while($rowfest = mysqli_fetch_assoc($resultfest)) { ?>
   									 <option>
								     <?php echo $rowfest["fname"]; ?></option>
								     <?php } ?>
									 </select>
								</div>
								 <div class="form-group">
									 <label for="inputEmail" class="control-label ">Event</label>
									 <?php
									 $selectevent="SELECT e_eventname FROM add_event";
									 $resultevent = mysqli_query($connection, $selectevent);
									?>
									 <select required class="form-control" name="event">
								   	 <option disabled hidden selected class="form-control">Select Event</option>
									 <?php while($rowevent = mysqli_fetch_assoc($resultevent)) { ?>
   									 <option>
								     <?php echo $rowevent["e_eventname"]; ?></option>
								     <?php } ?>
									 </select>
                                </div>
								 <div class="form-group">
									 <label for="inputEmail" class="control-label">Round</label>
								<select required class="form-control" name=round>
									<option disabled hidden selected>SELECT ROUND</option>
									<option>ROUND 1</option>
									<option>ROUND 2</option>
									<option>ROUND 3</option>
									<option>ROUND 4</option>
									<option>ROUND 5</option>
									<option>ROUND 6</option>
									<option>ROUND 7</option>
									<option>ROUND 8</option>
									<option>ROUND 9</option>
									<option>ROUND 10</option>
									<option>ROUND 11</option>
									<option>ROUND 12</option>
									<option>ROUND 13</option>
									<option>ROUND 14</option>
									
								</select> 
								</div>
								<div class="form-group">
                                    <label for="inputName1" class="control-label">Enter Participant | TeamName</label>
									<?php
									$parti="SELECT * FROM participant ";
									$row=mysqli_query($connection, $parti);
									?>
                                    <select name="participant" class="form-control" required >
										<option><?php while($rows = mysqli_fetch_assoc($row)) { ?>
   									 <option>
								     <?php echo $rows["p_name1"]; ?></option>
										<?php } ?></select>
									<?php
									$parti="SELECT * FROM participant ";
									$rowz=mysqli_query($connection, $parti);
									?>
                                    <select name="participant1" class="form-control"  >
										<option><?php while($rowes = mysqli_fetch_assoc($rowz)) { ?>
   									 <option>
								     <?php echo $rowes["p_name2"]; ?></option>
										<?php } ?></select>
                                    
								</div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
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
    <?php include'assets/jslink.php'; ?>
</body>

</html>
