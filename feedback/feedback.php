<?php
require('connect.php');
if(isset($_POST['f_email']) && isset($_POST['f_message']))
{
	$fest=mysqli_real_escape_string($connection,$_POST['fest']);
	$email=mysqli_real_escape_string($connection,$_POST['f_email']);
	$feedback=mysqli_real_escape_string($connection,$_POST['f_message']);
	$insert="INSERT INTO `feedback`(fest,f_email, f_message) VALUES ('$fest','$email','$feedback')";
	$result = mysqli_query($connection, $insert);
	if($result)
				{
			$smsg = "Thank you for the feedback";
			$to_Email       = $email; // Replace with recipient email address
            $subject        = 'Feedback'; //Subject line for emails
			$host           = "smtp.gmail.com"; // Your SMTP server. For example, smtp.mail.yahoo.com
            $username      = "icemscentre@gmail.com"; //For example, your.email@yahoo.com
            $password       = "icems123"; // Your password
            $SMTPSecure     = "tls"; // For example, ssl
            $port           = 587; // For example, 465

    //proceed with PHP email.
    include("../login/php/PHPMailerAutoload.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
 
    $mail = new PHPMailer();
     
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host = $host;
    $mail->Username = $username;




    $mail->Password = $password;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Port = $port;
    
     
    $mail->setFrom($username);
    $mail->addReplyTo($email);
     
    $mail->AddAddress($to_Email);
    $mail->Subject = $subject;
    
    $mail->Body = '<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
          <td style="vertical-align: top; padding-bottom:30px;" align="center"><a target="_blank">
            <img src="https://imgur.com/h9o15Ni.png" style="border:none"></a> </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #000;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td style="border-bottom:1px solid #000;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Users,</h1>
              <p style="margin-top:0px; color:#fff;">
			  
			  <STRONG>THANK YOU FOR THE FEEDBACK</p></td>
          </tr>
              
              <b>- Thanks (ICEMS team)</b> </td>
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

        $fmsg="E-mail not sent,Posting Failed";

    }
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
					<div class="form-group ">
						
                        <div class="col-xs-12">
                            <select class="form-control" name="fest">
								 <option disabled hidden selected> SELECT FEST</option>		
                                    <?php
									 $selectfest="SELECT * FROM fest";
									 $resultfest = mysqli_query($connection, $selectfest);
									?>
									 <?php while($rowfest = mysqli_fetch_assoc($resultfest)) { ?>
								   	
									<option> <?php echo $rowfest["fname"]; ?></option>		
									 <?php } ?>
									 </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea  rows="6" class="form-control" type="text" name="f_message" id="pw2" required="" placeholder="Write FeedBack...."></textarea>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="submit" id="reset-button">Post</button>
                        </div>
                    </div>
					<div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <a href="../index.html"><button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" >Back</button></a>   
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
