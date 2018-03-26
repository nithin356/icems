<?php
session_start();
require('connect.php');
if (isset($_POST['username']) && isset($_POST['password']))
    {
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $query ="SELECT * FROM `admin` WHERE BINARY (BINARY username='$username' OR email='$username') AND BINARY password='$password'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            $_SESSION['username'] = $row["username"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo '<script> window.location="../admin/";</script>';            
        }
	else
	{
        $susername = mysqli_real_escape_string($connection,$_POST['username']);
        $spassword = $_POST['password'];
        $querys="SELECT * FROM `std_co` WHERE BINARY (BINARY s_username='$susername' OR s_email='$susername') AND BINARY s_password='$spassword'";
        $results = mysqli_query($connection,$querys);
        $rows = mysqli_fetch_assoc($results);
        $counts = mysqli_num_rows($results);
        if($counts==1)
        {
            $_SESSION['s_username'] = $rows["s_username"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo'<script> window.location="../std_co/";</script>';
            //header('Location: index.html');
            
        }
        else
			{
		$husername = mysqli_real_escape_string($connection,$_POST['username']);
        $hpassword = $_POST['password'];
        
			$queryh="SELECT * FROM `head` WHERE BINARY( BINARY h_username='$husername' OR h_email='$husername') AND BINARY h_password='$hpassword'";
        $resulth = mysqli_query($connection,$queryh);
        $rowh = mysqli_fetch_assoc($resulth);
        $counth = mysqli_num_rows($resulth);
        if($counth==1)
        {
            $_SESSION['h_username'] = $rowh["h_username"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo'<script> window.location="../head/";</script>';
            //header('Location: index.html');
            
        } 
        else
		{
			$fmsg="Invalid UserName/Password";
		}
       }
	 }
   }
if(isset($_POST['resetemail']))
{
    
    $remail=$_POST['resetemail'];
    $query="SELECT * FROM `admin` WHERE email='$remail'";
	$hquery="SELECT * FROM `head` WHERE h_email='$remail'";
	$squery="SELECT * FROM `std_co` WHERE s_email='$remail'";
    $result = mysqli_query($connection,$query);
    $hresult = mysqli_query($connection,$hquery);
    $sresult = mysqli_query($connection,$squery);
	$count = mysqli_num_rows($result);
    $count1 = mysqli_num_rows($hresult);
    $count2 = mysqli_num_rows($sresult);
        if($count==1||$count1==1||$count2==1)
        {
            $str=random_int(256321,986523);
            $mdstr=md5($str);
            $query2="INSERT INTO `reset_password` (email,tempstr) VALUES ('$remail','$mdstr') ";
            $result2 = mysqli_query($connection, $query2);
            $link="http://localhost/icems/login/reset-password.php?id=$mdstr";
                
            $to_Email       = $remail; // Replace with recipient email address
            $subject        = 'Password Reset'; //Subject line for emails

            $host           = "smtp.gmail.com"; // Your SMTP server. For example, smtp.mail.yahoo.com
            $user	        = "icemscentre@gmail.com"; //For example, your.email@yahoo.com
            $password       = "icems123"; // Your password
            $SMTPSecure     = "tls"; // For example, ssl
            $port           = 587; // For example, 465

    //proceed with PHP email.
    include("php/PHPMailerAutoload.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
 
    $mail = new PHPMailer();
     
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host = $host;
    $mail->Username = $user;




    $mail->Password = $password;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Port = $port;
    
     
    $mail->setFrom($user);
    $mail->addReplyTo($remail);
     
    $mail->AddAddress($to_Email);
    $mail->Subject = $subject;
    
    $mail->Body = '<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center">
		  <img src="https://imgur.com/h9o15Ni.png" style="border:none"></a> </td>
        </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Sir/Madam,</h1>
              <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p></td>
          </tr>
          <tr>
            <td style="padding:10px 0 30px 0;"><p>A request to reset your Account password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
              <center>
                <a href="'.$link.'" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Reset Password</a>
              </center>
              <b>- Thanks (ICEMS team)</b> </td>
          </tr>
          <tr>
            <td  style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at icemscentre@gmail.com</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p>Inter Collegiate Event Management System © 2018 <br>
      </p>
    </div>
  </div>
</div>';
    
    $mail->WordWrap = 200;
    $mail->IsHTML(true);

    if(!$mail->send()) {

        $fmsg="E-mail not sent";

    } else {
        $smsg="e-mail sent successfully";
    }
    
}
    else
    {
        $fmsg="email address is not registered";
    }
}

    //if(isset($_SESSION['username']))
    //{
    //  $fmsg="User already logged in";
    //}
    

?>

<!--DESIGNING-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="100*100" href="../plugins/images/favicon.png">
    <title>Login | ICEMS</title>
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
                <?php if(isset($fmsg)) { ?><div class="alert alert-danger"> <?php echo $fmsg; ?> </div> <?php }?>
                
                <?php if(isset($smsg)) { ?> <div class="alert alert-success"> <?php echo $smsg; ?> </div><?php }?>
               <!--add image-->
                <a href="javascript:void(0)" class="text-center db">
				
                <br/><img src="../plugins/images/eliteadmin-text.png" alt="" /></a>
                        
                    <h3 class="box-title m-b-20"><u>Sign In</u></h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="username" autofocus value="<?php if(isset($username) & !empty($username)){ echo $username; }?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Password"  onkeypress="capLock(event)" name="password">
							<div id="divMayus" style="visibility:hidden">Caps Lock is on.</div> 
                        </div>
                    </div>
<script>
function capLock(e){
  var kc = e.keyCode ? e.keyCode : e.which;
  var sk = e.shiftKey ? e.shiftKey : kc === 16;
  var visibility = ((kc >= 65 && kc <= 90) && !sk) || 
      ((kc >= 97 && kc <= 122) && sk) ? 'visible' : 'hidden';
  document.getElementById('divMayus').style.visibility = visibility
}
	</script>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div >
                                <label>  </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Password ?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="../register/" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    Inter Collegiate Event Management System © 2018
					</div>
                </form>
                <for0m class="form-horizontal form-material" id="recoverform" method="post">
                   <?php if(isset($fmsg)) { ?><div class="alert alert-danger"> <?php echo $fmsg; ?> </div> <?php }?>
  
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email! To Change your password </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" name="resetemail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" onClick="location.reload();">Back</button>   
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
