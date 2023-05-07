<?php
ob_start();
include('includes/header.php');
require('includes/connection.php');
if (isset($_POST['submit'])) {
    $fullname =$_POST['name'];
    $email    =$_POST['email'];
    $pass     =$_POST['password'];

    $query="INSERT INTO admin (admin_name,email,password)
    VALUES('$fullname','$email','$pass')";
    mysqli_query($conn,$query);
    header("Location: manage_admin.php");
}
if (isset($_POST['submit1'])){
    $fullname =$_POST['name'];
    $email    =$_POST['email'];
    $pass     =$_POST['password'];

    $query="UPDATE admin SET admin_name='$fullname',
                             email     ='$email',
                             password  ='$pass'
                             WHERE admin_id={$_GET['id']}";
    mysqli_query($conn,$query);
    header("Location: manage_admin.php");
}
if (isset($_GET['id'])) {
    $query="SELECT * FROM admin WHERE admin_id={$_GET['id']}";
    $result=mysqli_query($conn,$query);
    $admin= mysqli_fetch_assoc($result);
}
if (isset($_GET['id1'])) {
    $query="DELETE FROM admin WHERE admin_id={$_GET['id1']}";
    $result=mysqli_query($conn,$query);
    $admin= mysqli_fetch_assoc($result);
}

?> 
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        	<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Admin Info</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="name" name="name" placeholder="Adminname" class="form-control" value="<?php if(isset($_GET['id'])){ echo $admin['admin_name']; }?>">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php if(isset($_GET['id'])){ echo $admin['email']; }?>">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="<?php if(isset($_GET['id'])){ echo $admin['password']; }?>">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">  
                                            <?php
                                                if (isset($_GET['id'])) {
                                                    echo '<button type="submit" name="submit1" value="Edit" class="btn btn-info btn-ml">Edit</button>';
                                                }
                                                else{
                                                    echo '<button type="submit" name="submit" value="Create" class="btn btn-info btn-ml">Create</button>';
                                                }

                                            
                                            ?>                                                                                             
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Data Admin</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>Admin ID</th>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query="SELECT * FROM admin";
                                            $result= mysqli_query($conn,$query);
                                            while ($admin= mysqli_fetch_assoc($result)) {
                                                echo '<tr class="tr-shadow">';
                                                echo '<td>';
                                                echo ' <label class="au-checkbox">';
                                                echo '<input type="checkbox">';
                                                echo '<span class="au-checkmark"></span>';
                                                echo '</label>';
                                                echo '</td>';
                                                echo "<td>{$admin['admin_id']}</td>";
                                                echo "<td><span class='block-email'>{$admin['admin_name']}</span></td>";
                                                echo "<td>{$admin['email']}</td>";
                                                echo '<td>';
                                                echo '<div class="table-data-feature">';
                                                echo '<button class="item" data-toggle="tooltip" data-placement="top" title="Edit">';
                                                echo "<a href='manage_admin.php?id={$admin['admin_id']}'><i class='zmdi zmdi-edit'></i></a>";
                                                echo '</button>';
                                                echo '<button class="item" data-toggle="tooltip" data-placement="top" title="Delete">';
                                                echo "<a href='manage_admin.php?id1={$admin['admin_id']}'><i class='zmdi zmdi-delete'></i></a>";
                                                echo '</button>';
                                                echo '<button class="item" data-toggle="tooltip" data-placement="top" title="More">';
                                                echo '<i class="zmdi zmdi-more"></i>';
                                                echo '</button>';
                                                echo '</div>';
                                                echo '</td>';
                                                echo '</tr>';

                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
<?php
include('includes/footer.php')
?>