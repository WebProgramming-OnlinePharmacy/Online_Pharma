<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $row = $pharma->viewdetails();
    if ($row > 0) { ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $row['username'] ?></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-body pl-5">
                    <label class="input-group">Pharmacy ID</label>
                    <p><?php echo $row['id'] ?></p>
                    <label class="input-group">Pharmacy Name</label>
                    <p><?php echo $row['Pharmacy_Name'] ?></p>
                    <label class="input-group">Location</label>
                    <p><?php echo $row['Loocation'] ?></p>
                    <label class="input-group">Phone</label>
                    <p><?php echo $row['phone'] ?></p>
                    <label class="input-group">Email</label>
                    <p><?php echo $row['email'] ?></p>
                </div>
            </div>
            <div class="diplay-flex pr-5">
                <form method="POST">
                    <input type="submit" name="approvenewpharmacy" value="Approve" class="btn btn-primary float-right">
                </form>
            </div>
        </section>
    <?php } else { ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>404 Error Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="admin.php?registeredPharmacylist">Home</a></li>
                            <li class="breadcrumb-item active">404 Error Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Pharmacy Information not found.</h3>

                    <p>
                        We could not find the Pharmacy Information you were looking for.
                        Meanwhile, you may return to <a href="admin.php?registeredPharmacylist"></br>Approve Pharmacy</a>
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
    <?php } ?>
</div>