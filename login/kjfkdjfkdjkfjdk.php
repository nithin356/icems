{
        $queryd="SELECT * FROM `std_co` WHERE (username='$username' OR email='$username') AND password='$password'";
        $resultd = mysqli_query($connection,$queryd);
        $rowd = mysqli_fetch_assoc($resultd);
        $countd = mysqli_num_rows($resultd);
        if($countd==1)
        {
            $_SESSION['dusername'] = $rowd["usernamee"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo'<script> window.location="../doctor/";</script>';
            //header('Location: index.html');
            
        }
        else
          {
        $queryd="SELECT * FROM `participant` WHERE (username='$username' OR email='$username') AND password='$password'";
        $resultd = mysqli_query($connection,$queryd);
        $rowd = mysqli_fetch_assoc($resultd);
        $countd = mysqli_num_rows($resultd);
        if($countd==1)
        {
            $_SESSION['dusername'] = $rowd["usernamee"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo'<script> window.location="../participant/";</script>';
            //header('Location: index.html');
            
        } 
        else
          {
        $queryd="SELECT * FROM `head` WHERE (usernamee='$username' OR email='$username') AND password='$password'";
        $resultd = mysqli_query($connection,$queryd);
        $rowd = mysqli_fetch_assoc($resultd);
        $countd = mysqli_num_rows($resultd);
        if($countd==1)
        {
            $_SESSION['dusername'] = $rowd["usernamee"];
            // alternative redirect (die() should be there)
            // echo "<script>location.href='target-page.php';</script>";
            //define('BASEPATH',TRUE);
            //<script type="text/javascript">location.href = 'newurl';</script>
            echo'<script> window.location="../head/";</script>';
            //header('Location: index.html');
            
        }