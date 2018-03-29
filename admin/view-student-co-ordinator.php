<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];
$getfestname="SELECT *,fest.f_id FROM admin INNER JOIN fest ON admin.id=fest.id WHERE username='$userid'";
$getfestnameresult=mysqli_query($connection,$getfestname);
$getfestnamerow=mysqli_fetch_assoc($getfestnameresult);
$ID=$getfestnamerow['f_id'];

if (isset($_POST['submit']))
{
		$user= mysqli_real_escape_string($connection,$_POST['cname']);
		$getid= mysqli_real_escape_string($connection,$_POST['getid']);
		$query="UPDATE `std_co` SET Code='$user' WHERE s_id='$getid'";
		$sresult = mysqli_query($connection, $query);
		if($sresult)
			{ 
			$GEET="SELECT s_email FROM std_co WHERE s_id='$getid'";
			$result12= mysqli_query($connection, $GEET);
			$fetch=mysqli_fetch_assoc($result12);
			$email=$fetch['s_email'];
			$smsg = "Team Code Updated & Sent Successfully.";
			$to_Email       = $email; 
            $subject        = 'TEAM CODE'; 
			$host           = "smtp.gmail.com"; 
            $username       = "icemscentre@gmail.com";
            $password       = "icems123";
            $SMTPSecure     = "tls"; 
            $port           = 587;

    include("../login/php/PHPMailerAutoload.php"); 
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
		  <br/>
          <img src="https://imgur.com/h9o15Ni.png" style="border:none"></a> </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #000;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td style="border-bottom:1px solid #f6f6f6;"><h1 style="font-size:14px; font-family:arial; margin:0px; font-weight:bold;">Dear Student Coordinator,</h1>
              <p style="margin-top:0px; color:#bbbbbb;">
			  <br>TEAM CODE: '.$user.' 
			  <br>
			  Here is your TEAMCODE Please inform your respective Partcipants.</p></td>
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

        $fmsg="E-mail not sent";

    }
			}
		else
			{
				$fmsg = "Already Code Name is Taken";
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
                <div class="row bg-title" >
                    <!-- .page title -->
                    <div >
                        <h4 class="page-title">View Student co-ordniator</h4>
						
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
                <div class="row" >
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Student co-ordinator Accounts</h3>
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
                            <div class="table-responsive">
                                <table class="table table-striped color-bordered-table dark-bordered-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Phone No.</th>
											<th>College</th>
											<th>Team Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php
										//$selectfest="SELECT *,admin.username FROM fest JOIN admin ON fest.f_id=admin.id where fest.id='$ID'";
												$sql = "SELECT * FROM std_co WHERE fest='$ID'";
												$result = mysqli_query($connection, $sql);
												foreach($result as $key=>$result)
												{ ?>
													<tr>
														<td> <?php echo $key+1; ?> </td>
														<td> <?php echo $result["s_name"]; ?> </td>
														<td> <?php echo $result["s_email"]; ?> </td>
														<td> <?php echo $result["s_phone"]; ?> </td>
														<td> <?php echo $result["s_college"]; ?> </td>
														<td>
														<form data-toggle="validator" method="post">
														<input type="text" placeholder="Teamcode" id="disabledTb" required name="cname" <?php if(isset($result['code'])){ $disp=$result['code']; echo 'value=" '.$disp.' " disabled '; } ?> ></input> 
														<input type="hidden" value="<?php echo $result['s_id']; ?>" name="getid">
														&nbsp;&nbsp;&nbsp;
															<?php if(!isset($result['code'])){ ?>
														<button type="submit" name="submit" class="btn btn-info waves-effect waves-light p-l-20"  data-toggle="tooltip" data-original-title="Note:only once you can enter the team code">
														<i class="fa fa-check"></i></button>
															<?php } ?></td></form>
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
	<!--<script>
	function dis(){
		document.getElementById("disabledTb").disabled=true;
	}
	</script>-->
            <!--footer.php contains footer-->
            <?php include'assets/footer.php'; ?>
        </div>
    </div>
    <!-- /#wrapper -->
    <!--jslink has all the JQuery links-->
    <?php include'assets/jslink.php'; ?>
</body>
</html>
