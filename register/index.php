<?php
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password']))
    {
        // real eacape sting is used to prevent sql injection hacking
        $username= mysqli_real_escape_string($connection,$_POST['username']);
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $college=mysqli_real_escape_string($connection,$_POST['college']);
        $phone=$_POST['phone'];
		$password= $_POST['password'];
        $repassword= $_POST['repassword'];
        //sqll query
        //double quotes outside so we can use single quotes inside
        if($password == $repassword) 
        {
            
            $usersql="SELECT * FROM `std_co` WHERE s_username='$username'";
            $checkuser=mysqli_query($connection, $usersql);
            $countu=mysqli_num_rows($checkuser);
            $emailsql="SELECT * FROM `std_co` WHERE s_email='$email'";
            $checkemail=mysqli_query($connection, $emailsql);
            $counte=mysqli_num_rows($checkemail);
            if($counte==1 || $countu==1)
            {
                $fmsg = " username/email alredy exists";
            }
            else
            {
            
                $query="INSERT INTO `std_co`(s_username, s_email, s_phone, s_college, s_password) VALUES ('$username','$email','$phone','$college','$password')";
                $result = mysqli_query($connection, $query); 
                //takes two arguments 
                if($result)
                {
                    $smsg = "User Created Successfully.";
                }
                else
                {
                    $fmsg = "User Registration Failed";
                }
            }
        }
        else
        {
            $fmsg="Password Doesn't Match"; 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>REGISTER | ICEMS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../plugins/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../plugins/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../plugins/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                    
					<h3 class="box-title m-b-20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font face="algerian">Sign Up only for Student Co-ordinator</font></h3>
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" placeholder="Email" name="email">
                        </div>
                    </div>
					<div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="number" required="" placeholder="Phone Number" name="phone">
                        </div>
                    </div>
					 <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="College Name" name="college">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password(Max 7)" name="password" maxlength="7">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Confirm Password" name="repassword">
                        </div>
					</div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Already have an account? <a href="../login/" class="text-primary m-l-5"><b>Sign In</b></a></p>
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
