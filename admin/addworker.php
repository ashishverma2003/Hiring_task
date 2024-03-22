<?php include 'dashboard.php';
    include '../dbconnect/config.php';
    $fullnameerr=$cpasserr=$emailerr=$passerr=$phoneerr="";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['addworker'])){
        if(empty($_POST['fullname']) || $_POST['fullname']==''){
            $fullnameerr="*Please Enter your fullname";
        }else if(empty($_POST['email']) || $_POST['email']==''){
            $emailerr="*Please Enter your email";
        }else if(empty($_POST['mobile']) || $_POST['mobile']==''){
            $phoneerr="*Please Enter your phone";
        }else if(empty($_POST['password']) || $_POST['password']==''){
            $passerr="*Please Enter your password";
        }else if((empty($_POST['c_password']) || $_POST['c_password']=='')){
            $cpasserr="*Please Enter your confirm password";
        }else if($_POST['c_password']!=$_POST['password']){
            $cpasserr="*Your confirm password is not same as password";
        }
        else{
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];
            $query = "INSERT INTO worker (fullname,email,mobileno,password,role) values('$fullname','$email','$mobile','$password','user')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<script>
                    alert('Worker Add successfully');
                    window.location.href='userlist.php';
                </script>";
            }
        }
    }
}
?>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 text-center"></div>
            <div class="col-lg-8 contact-info">
            <h2 class="text-center">Add Worker</h2>
                <form class="row g-3 mt-4" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="first_name">Full name</label>
                        <input type="text" class="form-control new-field" id="fullname" name="fullname">
                        <small style="color:red"><?php echo $fullnameerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Email</label>
                        <input type="text" class="form-control new-field" id="inputPassword2" name="email">
                        <small style="color:red"><?php echo $emailerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Mobile No</label>
                        <input type="number" class="form-control new-field" id="inputPassword2" name="mobile">
                        <small style="color:red"><?php echo $phoneerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Password</label>
                        <input type="password" class="form-control new-field" id="inputPassword2" name="password">
                        <small style="color:red"><?php echo $passerr;?></small>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="c_password">Confirm Password</label>
                        <input type="password" class="form-control new-field" id="c_password" name="c_password">
                        <small style="color:red"><?php echo $cpasserr;?></small>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="btn btn-dark mt-4 mb-5 px-5 py-2 rounded-pill " name="addworker" value="Add Worker" type="submit">
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>
