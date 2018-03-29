<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
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
            <div class="container-fluid" style="background-image: url(../plugins/images/w.jpg)">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">View Event Head</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                       <?php echo breadcrumbs(); ?>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
				<div class="row">
                <?php
					$query = "SELECT *,fest.fname FROM head JOIN fest ON head.h_fest=fest.f_id";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
					<div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:7px"><i class="fa fa-user"></i></div>
					
                        <div class="white-box">
                            <div class="row">
                                  <div class="col-md-10 col-sm-10">
                                    <h3 class="box-title m-b-0"><?php echo $result['h_username']; ?></h3>
                                    <p>
									  Fest Name:&nbsp;&nbsp;<?php echo $result['fname']; ?>
                                      <br/>
										Event Name:&nbsp;&nbsp;<?php echo $result['h_event']; ?>
									  <br/>
									  Phone Number:&nbsp;&nbsp;<?php echo $result['h_pno']; ?>
									
                  										<div class="p-t-5">
											<a href="edit-eventhead.php?id=<?php echo $result['h_id']; ?>" class="fcbtn btn btn-info">Edit</a>
											<a href="#" class="fcbtn btn btn-danger model_img deleteevent" data-id="<?php echo $result['h_id']; ?>" id="deleteDoc">Delete</a>
									    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php
					}
				  ?>

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
<script>
$(document).ready(function() {
  $('.deleteevent').click(function(){
    id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false,
		  closeOnCancel: false
      },function(isConfirm)
		 {
           if (isConfirm) {
			   $.ajax({
			  url: 'deleteeventhead.php?id='+id,
			  type: 'DELETE',
			  data: {id:id},
			  success: function(){
				swal("Deleted!", "Event Head has been deleted.", "success");
				window.location.replace("view_eventhead.php");
          }
        });
            } else {
                swal("Cancelled", "User data is safe :)", "error");
            }
      });
  });

});

</script>
