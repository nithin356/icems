<?php
include '../login/accesscontrolhead.php';
require('connect.php');
$username=$_SESSION['h_username'];
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
        <div id="page-wrapper" style="background-image: url(../plugins/images/w.jpg)">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Results</h4>
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
					$query = "SELECT *,fest.fname FROM result JOIN fest ON result.r_id=fest.f_id";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
                        <div class="white-box">
							<div class="ribbon ribbon-corner ribbon-info ribbon-right" style="margin-right:7px"><i class="fa fa-users"></i></div>
                            <div class="row">
                                  <div class="col-md-8 col-sm-8">
									Fest Name:<h3 class="box-title m-b-0"><?php echo $result['fname']; ?></h3>
                                    Event Name:<h3 class="box-title m-b-0"><?php echo $result['r_eventname']; ?></h3>
									Team Code:<h3 class="box-title m-b-0"><?php echo $result['cname']; ?></h3>
									Round:<h3 class="box-title m-b-0"><?php echo $result['round']; ?></h3>
									<div class="p-t-5">
											<a href="#" class="fcbtn btn btn-danger model_img deleteevent" data-id="<?php echo $result['r_id']; ?>" id="deleteDoc">Delete</a>
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
			  url: 'del.php?id='+id,
			  type: 'DELETE',
			  data: {id:id},
			  success: function(){
				swal("Deleted!", "User has been deleted.", "success");
				window.location.replace("view-result.php");
          }
        });
            } else {
                swal("Cancelled", "User data is safe :)", "error");
            }
      });
  });

});

</script>
