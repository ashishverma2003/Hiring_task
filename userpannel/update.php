<?php 
    include '../layout/index.php'; 
    include 'userdashboard.php';
    include '../dbconnect/config.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobileno=$_POST['mobileno'];
    $query="update worker set fullname='$fullname',email='$email',mobileno='$mobileno',password='$password',role='user' where workerid=$id";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<script>
            alert('your data updated successfully');
            window.location.href='userdata.php';
        </script>";
    }else{
        echo mysqli_error($result);
    }
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $select="select * from worker where workerid=$id";
    $selectresult=mysqli_query($con,$select);
    if(mysqli_num_rows($selectresult)){
        $row=mysqli_fetch_assoc($selectresult);
            
?>
<section class="contact-section">
    <div class="container">
        <div class="row">
        <h2 class="text-center">Edit User Information</h2><br/>
            <div class="col-lg-2 "></div>
            <div class="col-lg-8 contact-info">
                <form class="row g-3 mt-4" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="first_name">Full name</label>
                        <input type="hidden" value="<?=$row['workerid']?>" name="id">
                        <input type="text" value="<?=$row['fullname']?>" class="form-control new-field" id="fullname" name="fullname">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Email</label>
                        <input type="text" value="<?=$row['email']?>" class="form-control new-field" id="inputPassword2" name="email">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Mobile No</label>
                        <input type="number" value="<?=$row['mobileno']?>" class="form-control new-field" id="inputPassword2" name="mobileno">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="inputPassword2">Password</label>
                        <input type="password" value="<?=$row['password']?>" class="form-control new-field" id="inputPassword2" name="password">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <input class="btn btn-dark mt-4 mb-5 px-5 py-2 rounded-pill " name="update" value="Update" type="submit">
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section>
<?php 
    }
}else{
    header('Location:userlist.php');
}
