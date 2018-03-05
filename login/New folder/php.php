if(isset($_POST['resetemail']))
{
    
    $remail=$_POST['resetemail'];
    $query="SELECT * FROM `admin` WHERE email='$remail'";
    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
        if($count==1||$count1==1)
        {
            $str=random_int(256321,986523);
            $mdstr=md5($str);
            $query2="INSERT INTO `reset_password` (email,tempstr) VALUES ('$remail','$mdstr') ";
            $result2 = mysqli_query($connection, $query2);
            $link="http://localhost/icems/login/reset-password.php?id=$mdstr";
                
            $to_Email       = $remail; // Replace with recipient email address
            $subject        = 'Password Reset'; //Subject line for emails

            $host           = "smtp.gmail.com"; // Your SMTP server. For example, smtp.mail.yahoo.com
            $username       = "alphacare.ohms@gmail.com"; //For example, your.email@yahoo.com
            $password       = "dnspnb@78"; // Your password
            $SMTPSecure     = "tls"; // For example, ssl
            $port           = 587; // For example, 465

    //proceed with PHP email.
    include("php/PHPMailerAutoload.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
 
    $mail = new PHPMailer();
     
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host = $host;
    $mail->Username = $username;




    $mail->Password = $password;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->Port = $port;
    
     
    $mail->setFrom($username);
    $mail->addReplyTo($remail);
     
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
              <p style="margin-top:0px; color:#bbbbbb;">Here are your password reset instructions.</p></td>
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