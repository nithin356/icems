<?php
include '../login/accesscontrolstdco.php';
require('connect.php');
$username=$_SESSION['s_username'];
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
        <div id="page-wrapper" align="justify">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Participant</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                      <?php echo breadcrumbs(); ?>
                    </div>
                </div>
				
      <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Registered Participants</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Result ID</th>
                                            <th>Participant 1</th>
                                            <th>Participant 2</th>
                                            <th>Fest</th>
											<th>Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php
												$sql = "SELECT r_id, r_eventname, r_pname, r_pname2, round FROM result";
												$result = mysqli_query($connection, $sql);
												foreach($result as $key=>$result)
												{ ?>
													<tr>
														<td> <?php echo $key+1; ?> </td>
														<td> <?php echo $result["r_pname"]; ?> </td>
														<td> <?php echo $result["r_pname"]; ?> </td>
														<td> <?php echo $result["r_fest"]; ?> </td>
														<td> <?php echo $result["r_eventname"]; ?> </td>
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
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>
</html>
