<?php 
    include '../layout/index.php';
    include 'dashboard.php';
    include '../dbconnect/config.php';
?>
<div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10 table-data">
                <h3 class="text-center">Worker List</h3>
                <a href="addworker.php" class="btn btn-primary rounded-pill">Add Worker</a>
                <table class="table bg-danger" border="1">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Worker Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Timestamp</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                        $query='select * from worker';
                        $i=1;
                        $result=mysqli_query($con,$query);
                        if(mysqli_num_rows($result)){
                            while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $i++;?></td>
                            <td scope="row"><?=$row['workerid']?></td>
                            <td><?=$row['fullname']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['mobileno']?></td>
                            <td><?=$row['password']?></td>
                            <td><?=$row['role']?></td>
                            <td><?=$row['timestamp']?></td>
                            <td><a href="<?php echo "userupdate.php?id=$row[workerid]"; ?>" class="mx-2">Edit</i></a>
                            <a href="<?php echo "userdelete.php?id=$row[workerid]"; ?>" class="mx-2">/Delete</a></td>
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
