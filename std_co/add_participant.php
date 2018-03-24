<?php
include '../login/accesscontrolstdco.php';
require('connect.php');
$username=$_SESSION['s_username'];
$getfestname="SELECT s_id, fest FROM std_co WHERE s_username='$username'";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$sid=$getfestnamerow['s_id'];
$fid=$getfestnamerow['fest'];
$getfname="SELECT fname FROM fest where f_id='$fid'";
$getfestnameresult1=mysqli_query($connection,$getfname);
$getfestnamerow1=mysqli_fetch_assoc($getfestnameresult1);



if (isset($_POST['submitevent']))
{
	$eventname= mysqli_real_escape_string($connection,$_POST['event']);
	$check=mysqli_query($connection,"SELECT * FROM participant WHERE (sid='$sid') AND (p_eventname='$eventname') ");
	$checkrow=mysqli_num_rows($check);
	if($checkrow>=1)
	{
		$fmsg="Participants are already registered for this event";
	}
	else
	{
	if(isset($_POST['parti1']))
	{
		$p1= mysqli_real_escape_string($connection,$_POST['parti1']);
		
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p1', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "1 Participants are Selected For the Event";
		}
	}
	if(isset($_POST['parti2']))
	{
		$p2= mysqli_real_escape_string($connection,$_POST['parti2']);
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p2', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "2 Participants  are Selected For the Event";
		}
	}
	if(isset($_POST['parti3']))
	{
		$p2= mysqli_real_escape_string($connection,$_POST['parti3']);
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p2', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "3 Participants are Selected For the Event";
		}
	}
	if(isset($_POST['parti4']))
	{
		$p2= mysqli_real_escape_string($connection,$_POST['parti4']);
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p2', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "4 Participants are Selected For the Event";
		}
	}
	if(isset($_POST['parti5']))
	{
		$p2= mysqli_real_escape_string($connection,$_POST['parti5']);
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p2', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "5 Participants are Selected For the Event";
		}
	}
	if(isset($_POST['parti6']))
	{
		$p2= mysqli_real_escape_string($connection,$_POST['parti6']);
		$query="INSERT INTO `participant`(p_name, p_eventname, sid) VALUES ('$p2', '$eventname', '$sid')";
		$result = mysqli_query($connection, $query);
		if($result)
		{
			$smsg = "6 Participants are Selected For the Event";
		}
	}
							
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
	<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "country")
   {
    result = 'state';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
    
	var div=document.createElement("div");
	div.innerHTML=(data);

var parent_div=document.getElementById('state');
parent_div.appendChild(div);
    }
   })
  }
 });
});
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
                        <h4 class="page-title">Add Participant</h4>
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
                            <h3 class="box-title m-b-0">Details</h3>
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
            
									<input class="form-control" type="text" readonly value="<?php echo $getfestnamerow1['fname']; ?>" >
								</div>
								
								 <div class="form-group">
									 <label class="control-label "><strong>Event</strong></label>
									 <?php
									 $selectevent="SELECT e_id, e_eventname FROM add_event WHERE f_id='$fid'";
									 $resultevent = mysqli_query($connection, $selectevent);
									?>
									 <select onChange="disableDrop(this);" required class="form-control action" id="country" name="event">
								   	 <option disabled hidden selected>Select Event
									 </option>
									 <?php while($rowevent = mysqli_fetch_assoc($resultevent)) { ?>
   									  <option value="<?php echo $rowevent['e_id']; ?>"><?php echo $rowevent['e_eventname']; ?></option>
										 
								     <?php } ?>
										
									 </select>
									 <input type="hidden" id="getname" name="event">
									 <div class="text-right reloadButton" id="" style="display: none"><a href=""><i onClick="window.location.href='add_participant.php'" class="fa fa-refresh p-r-10" > Press here to load other Events</i></a></div>
									 <script>
										function disableDrop(elem) {
											var val=elem.value;

												if(elem.value == val){
														document.getElementById('getname').value=val;
												document.getElementById('country').disabled = true;
													$('.reloadButton').css('display','block');
													
												}
												else{
												 document.getElementById('country').disabled = false;        
												}

											}
										 </script>
                                </div>
								<div class="form-group" id="state">
                                    <label for="inputName1"  class="control-label"><strong>Enter Participant</strong></label>
                                    
								</div>

                                <div class="form-group">
                                    <button type="submit" name="submitevent" class="btn btn-info waves-effect waves-light">Submit</button>
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
