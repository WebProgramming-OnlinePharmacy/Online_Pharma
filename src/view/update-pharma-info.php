

<div class="content-wrapper pt-5  vh-100">
    <!-- Main content -->
    <section class="content mt-5">
<?php 
$row = $pharma->pharmaInfo($_SESSION['accid']);
?>
        <div class="container-fluid">
            <div class="register-box" style="margin-left: 30%; padding-top: 5%;">
                <div class="card">
                    <div class="card-body register-card-body">
                        <form method="POST">
                            <p class="login-box-msg input-group">Update Your Pharmacy Information</p>
                            <div class="input-group mb-3">
                                <label class="input-group">Pharmacy name</label>
                                <input type="text" name="name" class="form-control" placeholder="<?php echo $row['Pharmacy_Name']; ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="<?php echo $row['Loocation']; ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group">Phone number</label>
                                <input type="text" name="Phonenumber" class="form-control" placeholder="<?php echo $row['phone']; ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-4">
                                    <button name="updatePharmaInfo" type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
    </section>
</div>