<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
if (isset($_POST['username']) && isset($_POST['password']))
	{
		$user= mysqli_real_escape_string($connection,$_POST['username']);
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$fest=mysqli_real_escape_string($connection,$_POST['fest']);
		$event=mysqli_real_escape_string($connection,$_POST['event']);
		$pno= $_POST['pno'];	
		$pwd= $_POST['password'];	
		$repassword= $_POST['retypepassword'];
		
	if($pwd == $repassword)
		{

			$usersql="SELECT * FROM `head` WHERE h_username='$user'";
			$checkuser=mysqli_query($connection, $usersql);
			$countu=mysqli_num_rows($checkuser);
			$emailsql="SELECT * FROM `head` WHERE h_email='$email'";
			$checkemail=mysqli_query($connection, $emailsql);
			$counte=mysqli_num_rows($checkemail);
			if($counte==1 || $countu==1)
			{
				$fmsg = " username/email alredy exists";
			}
			else
			{

				$query="INSERT INTO `head`(h_username, h_fest, h_event, h_email, h_pno, h_password) VALUES ('$user','$fest', '$event', '$email','$pno','$pwd')";
				$result = mysqli_query($connection, $query);
	
				if($result)
				{
					$smsg = "Event Head Created Successfully.";
					
					$link="http://localhost/icems/login/";
                
            $to_Email       = $email; // Replace with recipient email address
            $subject        = 'Password Reset'; //Subject line for emails

            $host           = "smtp.gmail.com"; // Your SMTP server. For example, smtp.mail.yahoo.com
            $username      = "alphacare.ohms@gmail.com"; //For example, your.email@yahoo.com
            $password       = "dnspnb@78"; // Your password
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
          <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="http://infinityx.000webhostapp.com/login/" target="_blank"><img src="https://i.imgur.com/zKKdcP7.png" alt="AlphaCare" style="border:none"><br/>
            <img src="https://i.imgur.com/ZA1Wwui.png" style="border:none"></a> </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Sir/Madam,</h1>
              <p style="margin-top:0px; color:#bbbbbb;">naidamaga u gor regiseretsese  fuck u '.$user.' password: '.$pwd.' Here are your password reset instructions.</p></td>
          </tr>
          <tr>
            <td style="padding:10px 0 30px 0;"><p>A request to reset your Account password has been made. If you did not make this request, simply ignore this email. If you did make this request, please reset your password:</p>
              <center>
                <a href="'.$link.'" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Reset Password</a>
              </center>
              <b>- Thanks (AlphaCare team)</b> </td>
          </tr>
          <tr>
            <td  style="border-top:1px solid #f6f6f6; padding-top:20px; color:#777">If the button above does not work, try copying and pasting the URL into your browser. If you continue to have problems, please feel free to contact us at alphacare.ohms@gmail.com</td>
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
		$smsg .= "Event Head Created Successfully.";
					
    }
    
}
				else
				{
					$fmsg = "Event Head Registration Failed";
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
    <meta name="description" content="ICEMS Inter Collegiate Event Management System">
    <meta name="author" content="Nithin">
    <!--csslink.php includes fevicon and title-->
    <?php include 'assets/csslink.php'; ?>
      <!-- username check js start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check-eventheadname.php", {
	        username: $('#username').val()
	      }, function(response){
	        $('#usernameResult').fadeOut();
	        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 500);
	      });
	    	return false;
		});
	});

	function finishAjax(id, response) {
	  $('#usernameLoading').hide();
	  $('#'+id).html(unescape(response));
	  $('#'+id).fadeIn();
	} //finishAjax
</script>
<!-- username check js end -->
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Event Head</h4>
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
                            <h3 class="box-title m-b-0">Account Information</h3>
                            <form data-toggle="validator" method="post">
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
                                <div class="form-group">
                                    <label for="inputName1" class="control-label">Username</label>
                                    <input type="text" autocomplete="off" name="username" class="form-control" id="username" placeholder="Enter your username" required >
                                    <!--value="<?php // if(isset($username) & !empty($username)){ echo $username; }?>"-->
                                    <!-- username check start -->
										<div>
										<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
										<span id="usernameResult" style="color: #E40003"></span>
										</div>
				                     <!-- username check end -->
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter your email" data-error="This email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>
								<div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input name="pno" type="number" class="form-control" iplaceholder="Enter heads Phone Number" maxlength="12" required>
                                    <div class="help-block with-errors"></div>
                                </div>
								<div class="form-group">
                                    <label class="control-label">Fest name</label>
                                    <?php
									 $selectfest="SELECT fest FROM fest";
									 $resultfest = mysqli_query($connection, $selectfest);
									?>
									 <select required class="form-control" name="fest">
								   	 <option disabled hidden selected>Select fests</option>
									 <?php while($rowfest = mysqli_fetch_assoc($resultfest)) { ?>
   									 <option>
								     <?php echo $rowfest["fest"]; ?></option>
								     <?php } ?>
									 </select>
								</div>
								 <div class="form-group">
									 <label for="inputEmail" class="control-label">Event</label>
									 <?php
									 $selectevent="SELECT e_eventname FROM add_event";
									 $resultevent = mysqli_query($connection, $selectevent);
									?>
									 <select required class="form-control" name="event">
								   	 <option "disabled hidden selected">Select Event</option>
									 <?php while($rowevent = mysqli_fetch_assoc($resultevent)) { ?>
   									 <option>
								     <?php echo $rowevent["e_eventname"]; ?></option>
								     <?php } ?>
									 </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="control-label">Password</label>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="password" data-toggle="validator" data-minlength="8" class="form-control" id="inputPassword" placeholder="Password" required>
                                            <span class="help-block">Minimum of 8 characters</span> </div>
                                        <div class="form-group col-sm-6">
                                            <input type="password" name="retypepassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password don't match" placeholder="Confirm" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
