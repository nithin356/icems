<?php
include '../login/accesscontrolhead.php';
require('connect.php');
$username=$_SESSION['h_username'];
$gethname="SELECT h_id FROM head WHERE h_username='$username'";
$gethnameresult=mysqli_query($connection,$gethname);
$gethnamerow=mysqli_fetch_assoc($gethnameresult);
$hid=$gethnamerow['h_id'];
$geteventname="SELECT h_event,h_fest FROM head where h_id='$hid'";
$getfestnameresul1=mysqli_query($connection,$geteventname);
$getfestnamero1=mysqli_fetch_assoc($getfestnameresul1);
$festid=$getfestnamero1['h_fest'];
if (isset($_POST['college']))
	{
		$getfid=mysqli_query($connection,"SELECT * FROM fest where f_id='$festid'");
		$get=mysqli_fetch_assoc($getfid);
		$fest=$get['f_id'];
		$eventname= $getfestnamero1['h_event'];
		$round=mysqli_real_escape_string($connection,$_POST['round']);
		$college=mysqli_real_escape_string($connection,$_POST['college']);
		$query="INSERT INTO `result`(r_eventname,f_id,cname,round) VALUES ('$eventname','$fest','$college','$round')";
				$result = mysqli_query($connection, $query);
	
				if($result)
				{
					$smsg = "Result Updated Succesfully";
				}
				else
				{
					$fmsg = "Result Updating Failed".mysqli_error($connection);
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
									 <label for="inputEmail"  class="control-label ">Event</label>
									 <input type="text" id="username" class="form-control" value="<?php echo $getfestnamero1['h_event']; ?>" readonly/> 
                                </div>
								<?php
									$eventname=$getfestnamero1['h_event'];
									$i="SELECT * FROM add_event WHERE e_eventname='$eventname'";
									$res=mysqli_query($connection, $i);
									$rowevent = mysqli_fetch_assoc($res);
									$totrows=$rowevent['round'];
									$countid=1;
									?>
								 <div class="form-group">
									 <label for="inputEmail" class="control-label">Round</label>
								<select required class="form-control" name="round">
									<option disabled hidden selected>SELECT ROUND</option>
									<?php while($countid <= $totrows) { ?>
									<option value="<?php echo $countid ?>"> <?php echo 'Round '.$countid; ?></option>
									<?php $countid++; } ?>
								</select> 
								</div>
								<?php
									 $college="SELECT s_college FROM std_co";
									 $colres=mysqli_query($connection, $college);
									 ?>
								 <div class="form-group">
									 <label for="inputEmail" class="control-label">Round</label>
									 
								<select required class="form-control" name="college">
									<option disabled hidden selected>SELECT COLLEGE</option>
									 <?php while($rowcollege = mysqli_fetch_assoc($colres)) { ?>
									<option value= "<?php echo $rowcollege['s_college'];?>"> <?php echo $rowcollege['s_college'];?></option>
									<?php }?>
									</select> 
									 
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
