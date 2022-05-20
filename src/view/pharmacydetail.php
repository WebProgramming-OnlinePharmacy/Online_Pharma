<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $row = $pharma->viewdetails(); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $row['Pharmacy_Name'] ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <label class="input-group">Pharmacy Name</label>
                <p><?php echo $row['Pharmacy_Name'] ?></p>
                <label class="input-group">Location</label>
                <p><?php echo $row['Loocation'] ?></p>
                <label class="input-group">Phone</label>
                <p><?php echo $row['phone'] ?></p>
                <label class="input-group">Email</label>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>