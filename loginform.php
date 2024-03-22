<?php include 'layout/index.php';
include 'dbconnect/config.php';
$nameerr=$passerr=$failer="";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['login'])){
        if(empty($_POST['fullname']) || $_POST['fullname']==''){
            $nameerr="*Please Enter your fullname";
        }else if(empty($_POST['password']) || $_POST['password']==''){
            $passerr="*Please Enter your password";
        }
        else{
            $fullname=$_POST['fullname'];
            $password=$_POST['password'];
            $query="select * from worker where fullname='$fullname' && password='$password'";
            $result=mysqli_query($con,$query);
            //print_r($result);
            if(mysqli_num_rows($result)==1){
                $data=mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['fullname']=$data['fullname'];
                $_SESSION['email']=$data['email'];
                $_SESSION['password']=$data['password'];
                $_SESSION['mobileno']=$data['mobileno'];
                $_SESSION['role']=$data['role'];
                $_SESSION['workerid']=$data['workerid'];
                if($data['role']=='admin'){
                    header('Location:admin/dashboard.php');
                }
                else{
                    header('Location:userpannel/userdashboard.php');
                }
            }else{
                $failer="You are entering worng data";
            }
        }
    }
}
?>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h2 class="text-center">Login Form</h2>
                <p class="text-center" style="color:red"><?=$failer; ?></p>
                <div class="col-lg-12 contact-info">
                    <form class="row mt-4" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <label for="fullname">Username</label>
                            <input type="text" class="form-control new-field" id="fullname" name="fullname">
                            <small><?php echo $nameerr; ?></small>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <label for="password">Password</label>
                            <input type="text" class="form-control new-field" id="password" name="password">
                            <small><?php echo $passerr; ?></small>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input class="btn btn-dark mt-4 mb-5 px-5 py-2 rounded-pill " name="login" value="Sign In"
                                type="submit">
                            <a href="signupform.php" class="ms-2 justify-content-end">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>
