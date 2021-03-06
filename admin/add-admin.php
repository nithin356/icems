<?php
include '../login/accesscontroladmin.php';
require('connect.php');
$userid=$_SESSION['username'];

//CONTROL STATEMENT

if (isset($_POST['submit']))
{
		$user= mysqli_real_escape_string($connection,$_POST['username']);
		$fnamee=mysqli_real_escape_string($connection,$_POST['fnamee']);
		$email=mysqli_real_escape_string($connection,$_POST['email']);
		$password= mysqli_real_escape_string($connection,$_POST['password']);
		$repassword= $_POST['retypepassword'];
		
	if($password == $repassword)
	{

			$usersql="SELECT * FROM `admin` WHERE username='$user'";
			$checkuser=mysqli_query($connection, $usersql);
			$countu=mysqli_num_rows($checkuser);
			$emailsql="SELECT * FROM `admin` WHERE email='$email'";
			$checkemail=mysqli_query($connection, $emailsql);
			$counte=mysqli_num_rows($checkemail);
		
			if($counte==1 || $countu==1)
			{
				$fmsg = " username/email alredy exists";
			}
		
		else
		{
			$query="INSERT INTO `admin`(username, full, email, password) VALUES ('$user','$fnamee','$email','$password')";
			$result = mysqli_query($connection, $query);
			
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

<!--HTML DESIGN-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICEMS Inter Collegiate Event Management System">
    <meta name="author" content="Nithin">
    <!--csslink.php includes Title-->
    <?php include 'assets/csslink.php'; ?>
    <!-- username check javascript start -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#usernameLoading').hide();
		$('#username').keyup(function(){
		  $('#usernameLoading').show();
	      $.post("check-adminusername.php", {
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
    
	<?php include 'assets/header.php';
	include 'assets/left-sidebar.php';
	include 'assets/breadcrumbs.php';
	?>
        
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        
						<h4 class="page-title">Add Admin</h4>
                    
					</div>
                    
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<a href="../index.html" target="_blank" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Home</a>
            <?php echo breadcrumbs(); ?>
		</div>
		</div>
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
                   	<div>
					<span id="usernameLoading"><img src="../plugins/images/busy.gif" alt="Ajax Indicator" height="15" width="15" /></span>
					<span id="usernameResult" style="color: #E40003"></span>
					</div>
		</div>
		<div class="form-group">
					<label class="control-label">Full Name</label>
                    <input name="fnamee" type="text" class="form-control" id="inputEmail" placeholder="Enter your Full Name"  required>
		</div>
		<div class="form-group">
					<label for="inputEmail" class="control-label">E-Mail</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter your E-mail" data-error="This E-Mail address is invalid" required>
                    <div class="help-block with-errors">
					</div>
		</div>
		
		<div class="form-group">
                    <label for="inputPassword" class="control-label">Password</label>
                    <div class="row">
                    <div class="form-group col-sm-6">
                    <input type="password" name="password" data-toggle="validator" data-minlength="8" class="form-control" id="inputPassword" placeholder="Password" required>
                    <span class="help-block">Minimum of 8 characters</span> 
					</div>
                    <div class="form-group col-sm-6">
                    <input type="password" name="retypepassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password don't match" placeholder="Confirm" min="8" required>
                    <div class="help-block with-errors">
					</div>
                    </div>
                    </div>
        </div>
        <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Submit</button>
					<button type="reset" class="btn btn-info waves-effect waves-light">Clear</button>
		</div>
					</form>
        </div>
		</div>
		</div>
        </div>
        <?php include'assets/footer.php'; ?>
        </div>
</div>
        <?php include'assets/jslink.php'; ?>
</body>
</html>