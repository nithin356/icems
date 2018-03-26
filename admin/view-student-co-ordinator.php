<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];

if (isset($_POST['submit']))
{
		$user= mysqli_real_escape_string($connection,$_POST['cname']);
		$getid= mysqli_real_escape_string($connection,$_POST['getid']);
		$query="UPDATE `std_co` SET Code='$user' WHERE s_id='$getid'";
		$sresult = mysqli_query($connection, $query);
		if($sresult)
			{
				$smsg = "Team Code Updated & Sent Successfully.";
			}
		else
			{
				$fmsg = "Already Code Name is Taken";
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
                    <div >
                        <h4 class="page-title">View Student co-ordniator</h4>
						
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
                            <h3 class="box-title">Student co-ordinator Accounts</h3>
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
                            <div class="table-responsive">
                                <table class="table table-striped color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Phone No.</th>
											<th>College</th>
											<th>Team Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php
												$sql = "SELECT * FROM std_co";
												$result = mysqli_query($connection, $sql);
												foreach($result as $key=>$result)
												{ ?>
													<tr>
														<td> <?php echo $key+1; ?> </td>
														<td> <?php echo $result["s_name"]; ?> </td>
														<td> <?php echo $result["s_email"]; ?> </td>
														<td> <?php echo $result["s_phone"]; ?> </td>
														<td> <?php echo $result["s_college"]; ?> </td>
														<td>
														<form data-toggle="validator" method="post">
														<input type="text" placeholder="Teamcode" id="disabledTb" required name="cname" <?php if(isset($result['code'])){ $disp=$result['code']; echo 'value=" '.$disp.' " disabled '; } ?> ></input> 
														<input type="hidden" value="<?php echo $result['s_id']; ?>" name="getid">
														&nbsp;&nbsp;&nbsp;
															<?php if(!isset($result['code'])){ ?>
														<button type="submit" name="submit" class="btn btn-info waves-effect waves-light p-l-20"  data-toggle="tooltip" data-original-title="Note:only once you can enter the team code">
														<i class="fa fa-check"></i></button>
															<?php } ?></td></form>
													</tr>
										  <?php
												}
										  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	<!--<script>
	function dis(){
		document.getElementById("disabledTb").disabled=true;
	}
	</script>-->
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>
</html>
