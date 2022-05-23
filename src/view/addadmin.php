<div class="content-wrapper pt-2 pb-5 ">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pt-2">
            <div class="card card-default">
                <div class="card-body ">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control" placeholder="Age" required>
                                </div>
                                <div class="form-group">
                                    <label>Sex</label>
                                    <select class="form-control" name="sex" data-placeholder="Sex" style="width: 100%;">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control <?php if (isset($username_err)) echo 'is-invalid'; ?>" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control <?php if (isset($email_err)) echo 'is-invalid'; ?>" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control <?php if (isset($password_err)) echo 'is-invalid'; ?>" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control <?php if (isset($password_err)) echo 'is-invalid'; ?>" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="display-flex">
                            <button name="addnewadmin" type="submit" class="btn btn-primary  btn-md float-right">Add</button>
                        </div>
                    </form> <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
</div>