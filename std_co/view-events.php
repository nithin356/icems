<?php
require('connect.php');

$fid=$_GET['id'];

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
    <?php
	include 'assets/breadcrumbs.php';
	?>
        <!-- Page Content -->
        <div>
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Events</h4>
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
					$query = "SELECT * FROM add_event WHERE f_id='$fid'";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                  <div class="col-md-8 col-sm-8">
									Event Name:<h3 class="box-title m-b-0"><?php echo $result['e_eventname']; ?></h3>
                                    <p>  
									Event Description:<h3 class="box-title m-b-0"><?php echo $result['e_desc']; ?></h3>
								<p>  
									Event Rounds:<h3 class="box-title m-b-0"><?php echo $result['round']; ?></h3>
									<?php
				 					$store=$result['e_id'];
				 					$check="SELECT * FROM participant WHERE p_eventname='$store'";
									$part=mysqli_query($connection, $check);
				 					$parti=mysqli_num_rows($part);
				 					if($parti>=1)
									{ ?>
									  <a href="#" class="fcbtn btn btn-danger model_img deleteevent" data-id="<?php echo $result['e_id']; ?>" id="deleteDoc">Remove participants</a>
									<?php } else { ?>
									  <a href="add_participant.php" class="fcbtn btn btn-success model_img ">Add participants</a>
									  <?php } ?>
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
			  url: 'delete.php?id='+id,
			  type: 'DELETE',
			  data: {id:id},
			  success: function(){
				swal("Deleted!", "User has been deleted.", "success");
				window.location.replace("view-participant.php");
          }
        });
            } else {
                swal("Cancelled", "User data is safe :)", "error");
            }
      });
  });

});

</script>
