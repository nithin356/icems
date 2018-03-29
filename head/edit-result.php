<?php
include '../login/accesscontrolhead.php';
require('connect.php');
$username=$_SESSION['h_username'];
$t_id = $_GET['id'];
$gethname="SELECT h_id FROM head WHERE h_username='$username'";
$gethnameresult=mysqli_query($connection,$gethname);
$gethnamerow=mysqli_fetch_assoc($gethnameresult);
$hid=$gethnamerow['h_id'];
$geteventname="SELECT h_event FROM head where h_id='$hid'";
$getfestnameresul1=mysqli_query($connection,$geteventname);
$getfestnamero1=mysqli_fetch_assoc($getfestnameresul1);

$query="SELECT *,fest.fname FROM result JOIN fest ON result.r_id=fest.f_id WHERE r_id='$t_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['update']))
{
	$ff= $_POST['ff'];
	$team=$_POST['college'];
	$uquery="UPDATE result SET  round='$ff' cname='$team' WHERE r_id=1";
	$uresult = mysqli_query($connection, $uquery);
	if($uresult)
	{
		$squery="SELECT *,fest.fname FROM result JOIN fest ON result.r_id=fest.f_id WHERE r_id='$t_id'";
		$sresult = mysqli_query($connection, $squery);
		$rows = mysqli_fetch_assoc($sresult);
		$smsg="Result updated successfully!";
	}
		else
		{
			$fmsg="Result Updating Failed";
		}
	}
?>
<!--html design-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ICEMS | EDIT</title>
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
        <div id="page-wrapper" style="background-image: url(../plugins/images/w.jpg)">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Result</h4>
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
                           <div class="overlay-box">
							<div class="user-bg p-l-30 m-l-10 p-t-10"> <img width="80%" height="95%"  alt="user" src="../plugins/images/Time-Free-PNG-Image.png">
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
                                <li role="presentation" class="nav-item">
								<a href="#settings" class="nav-link" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Setting</span></a></li>
                                <li role="presentation" class="nav-item">
                            </ul>
                           
							<div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> Fest Name
                                            <br>
                                            <p><strong><?php echo $row["fname"]; ?></strong></p>
                                        </div>
                                        
                                        <div class="col-md-6 col-xs-6 "> Event Name :
                                            <br>
                                            <p><strong><?php echo $row["r_eventname"]; ?></strong></p>
										</div>
										<div class="col-md-6 col-xs-6 "> Qualified Team :
                                          <p><strong><?php echo $row["cname"]; ?></strong></p>
										
										 Qualified Round :
                                          <p><strong><?php echo $row["round"]; ?></strong></p>
										</div>
										
										
									</div>
										
                                     <div class="row">
                                     <div class="col-md-3 col-xs-6 b-r">
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6 b-r"> 
                                            
                                     <p class="text-muted"></p>
                                     </div>
                                     <div class="col-md-3 col-xs-6">                                   <p class="text-muted"></p>
                                     </div>
									 </div>
                                     </div>
                                
                               
                            <div class="tab-pane" id="settings">
                             <form data-toggle="validator" method="post">
                              
                              
                         		<div class="row">
                                	<div class="col-md-6">
                                       <div class="form-group">
                                        	   <div class="row">
                           				   <div class="form-group col-md-12">
											 <label class="control-label ">Event</label>
											<input type="text" id="username" name="eventname" class="form-control" value="<?php echo $getfestnamero1['h_event']; ?>" readonly/>  
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
								<select required class="form-control" name="ff">
									<option disabled hidden selected>SELECT ROUND</option>
									<?php while($countid <= $totrows) { ?>
									<option value="<?php echo $countid ?>"> <?php echo 'Round '.$countid; ?></option>
									<?php $countid++; } ?>
								</select> 
									 <br>
								</div>
                                	<?php
									 $college="SELECT code FROM std_co WHERE fest='$t_id'";
									 $colres=mysqli_query($connection, $college);
									 ?>
								 <div class="form-group">
									 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 <label for="inputEmail" class="control-label">SELECTED TEAM</label>
									<select required class="form-control" name="college">
									<option disabled hidden selected>SELECT TEAM</option>
									 <?php while($rowcollege = mysqli_fetch_assoc($colres)) { ?>
									<option value= "<?php echo $rowcollege['code'];?>"> <?php echo $rowcollege['code'];?></option>
									<?php }?>
									</select> 
									</div>
							</div>
								 </div>
										 <div class="form-group p-t-0">
                                       <button class="btn btn-success" name="update">Update Result </button>
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
