<?php
require('connect.php');
$selectfest=mysqli_query($connection,"SELECT * FROM fest");
$count=mysqli_num_rows($selectfest);
if($count==0)
{
   echo "<script>alert('no fests')
   window.location='../index.html'
   </script>";	 

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
       <!-- Page Content -->
        <div >
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Fests</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
                             </div>
                    <!-- /.breadcrumb -->
                </div>
				<div class="row">
                <?php
					$query = "SELECT * FROM fest";
					$result = mysqli_query($connection, $query);
					foreach($result as $key=>$result)
				{ ?>
                <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                  <div>
									  
                                    College Name:<h3 class="box-title m-b-0"><?php echo $result['cname']; ?></h2>  
                                    Fest Name:<h3 class="box-title m-b-0"><?php echo $result['fname']; ?></h2>  
                                    Date:<h3 class="box-title m-b-0"><?php echo $result['date']; ?></h2>
<br/>  
                                    Description:
									  <p><?php echo $result['f_desc']; ?>
										<div class="p-t-5">
											   
								<a href="view-events.php?id=<?php echo $result['f_id']; ?>" class="fcbtn btn btn-danger model_img">More Info</a>
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
							