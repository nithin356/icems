<?php
require('connect.php');
if(isset($_POST['f_email']) && isset($_POST['f_message']))
{
	$email=mysqli_real_escape_string($connection,$_POST['f_email']);
	$feedback=mysqli_real_escape_string($connection,$_POST['f_message']);
	$insert="INSERT INTO `feedback`(f_email, f_message) VALUES ('$email','$feedback')";
	$result = mysqli_query($connection, $insert);
	if($result)
				{
					$smsg = "Thank you for the Feedback";
				}
				else
				{
					$fmsg = "Posting Failed";
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
    <title>Inter-Collegiate Event Management System - ICEMS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../plugins/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../plugins/css/colors/blue.css" id="theme" rel="stylesheet">
	<!--end-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" method="post">

                <?php if(isset($fmsg)) { ?><div class="alert alert-danger"> <?php echo $fmsg; ?> </div> <?php }?>
                <!--DNS Added Expired link with disable function-->
				<?php if(isset($emsg)) { echo '<BODY onLoad="dissableForm()">'; ?>
				<div class="alert alert-danger"> <?php echo $emsg; ?> </div>
				<?php }?>
				<!--end-->
				<?php if(isset($smsg)) { ?> <div class="alert alert-success"> <?php echo $smsg; ?> </div>
                <?php }?>

                    <h3 class="box-title m-b-20">Write Your FeedBack</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="f_email" id="pw1" required="" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea  rows="6" class="form-control" type="text" name="f_message" id="pw2" required="" placeholder="Write FeedBack...."></textarea>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" id="reset-button">Post</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../plugins/bootstrap/dist/js/tether.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../plugins/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../plugins/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../plugins/js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
