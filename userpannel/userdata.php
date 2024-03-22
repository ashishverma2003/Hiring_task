<?php 
    include '../layout/index.php'; 
    include 'userdashboard.php';
    include '../dbconnect/config.php';
?>
<div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10 table-data">
                <h3 class="text-center">User Details</h3>
                <table class="table bg-danger" border="1">
                    <thead>
                        <tr>
                            <th scope="col">Worker Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                        session_start();
                        $query="select * from worker where workerid=$_SESSION[workerid]";
                        $result=mysqli_query($con,$query);
                        if(mysqli_num_rows($result)){
                            while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?=$row['workerid']?></td>
                            <td><?=$row['fullname']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['mobileno']?></td>
                            <td><?=$row['password']?></td>
                            <td><a href="<?php echo "update.php?id=$row[workerid]"; ?>" class="mx-2">Edit</i></a></td>
                        </tr>
                        <?php  
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
