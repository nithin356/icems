<?php
include '../login/accesscontroladmin.php';
$userid=$_SESSION['username'];
$getfestname="SELECT id FROM admin WHERE username='$userid'";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$id=$getfestnamerow['id'];
require('connect.php');
if (isset($_POST['eventsubmit']))
	{
		$cname=mysqli_real_escape_string($connection,$_POST['cname']);
		$fest=mysqli_real_escape_string($connection,$_POST['fest']);
		$desc=mysqli_real_escape_string($connection,$_POST['desc']);
		$date=mysqli_real_escape_string($connection,$_POST['date']);
		$query="INSERT INTO `fest`(coname, fname, date, f_desc, id) VALUES ('$cname','$fest','$date','$desc',$id)";
		$result = mysqli_query($connection, $query);
		if($result)
				{
					$smsg = "Fest Created Successfully.";
				}
				else
				{
					$fmsg = "Fest Creation Failed";
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
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#festLoading').hide();
		$('#fest').keyup(function(){
		  $('#festLoading').show();
	      $.post("check-fest.php", {
	        fest: $('#fest').val()
	      }, function(response){
	        $('#festResult').fadeOut();
	        setTimeout("finishAjax('festResult', '"+escape(response)+"')", 500);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#festLoading').hide();
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
                        <h4 class="page-title">Add Fest</h4>
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
					var text1 = document.getElementById("username").value;
					document.getElementById("username").value = text1;
					}
				</script>
				<script>
					function copyTextValue() {
					var text1 = document.getElementById("fest").value;
					document.getElementById("fest").value = text1;
					}
				</script>

				<div class="row">
				<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Fest Information</h3>
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
                                    <label class="control-label">College name</label>
                                    <input type="text" autocomplete="off" name="cname" class="form-control" placeholder="Enter your College name" required ></input>
								
								</div>
							<div class="form-group">
                                    <label class="control-label">Fest name</label>
                                    <input type="text" autocomplete="off" name="fest" class="form-control" id="fest" placeholder="Enter your Fest name" required ></input>
								
										<div>
										<span id="festLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="festResult" style="color: #E40003"></span>
										</div>
								</div>
							<div class="form-group">
                                    <label for="inputName1" class="control-label">Date</label>
                                    <input id="datepicker" type="date" name="date" onchange="checkDate()" required class="datepicker-input form-control" type="text" data-date-format="yyyy-mm-dd" >

								</div>
							<div class="form-group">
                                    <label for="inputName1" class="control-label">Fest Description</label>
                                    <textarea type="text" class="form-control" autocomplete="off" id="username" name="desc" placeholder="Enter Fest Description" value="" required></textarea>
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
