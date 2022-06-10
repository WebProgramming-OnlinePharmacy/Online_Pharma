<div class="content-wrapper pt-2 pb-5 ">
    <!-- Main content -->
    <?php
    $row = $admin->adminInfo($_SESSION['accid']);
    $row1 = $acc->accountInfo($_SESSION['accid']);
    ?>
    <section class="content">
        <div class="container-fluid pt-2">
            <div class="card card-default">
                <div class="card-body ">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="<?php echo $row['F_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" placeholder="<?php echo $row['M_name']; ?>" required>
                                </div>
                                <div class=" form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="<?php echo $row['L_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control" placeholder="<?php echo $row1['username']; ?>" required>
                                </div>
                                <div class=" form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="<?php echo $row1['email']; ?>" required>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="<?php echo $row['Phone']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="display-flex">
                            <button name="updateAdmin" type="submit" class="btn btn-primary  btn-md float-right">Update</button>
                        </div>
                    </form> <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
</div>