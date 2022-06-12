<div class="content-wrapper pt-5 pb-5">

    <?php
    $hid = $_GET['viewDrugdetail'];
    $id = base64_decode($hid);
    $row = $pharma->viewDrugdetail($id); ?>

    <section class="content-header pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php echo $row['name']; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content pb-3">
        <div class="card">
            <div class="card-body pl-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <?php
                        $src = $row['image_url'];
                        echo "<img src='$src' class='product-image' alt='Product Image'>" ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label class="input-group">Drug ID</label>
                        <p><?php echo $row['id']; ?></p>
                        <label class="input-group">Drug Name</label>
                        <p><?php echo $row['name']; ?></p>
                        <label class="input-group">Manufacture Date</label>
                        <p><?php echo $row['manufacture_date']; ?></p>
                        <label class="input-group">Expire Date</label>
                        <p><?php echo $row['expire_date']; ?></p>
                        <label class="input-group">Form</label>
                        <p><?php echo $row['form']; ?></p>
                        <label class="input-group">Strength</label>
                        <p><?php echo $row['strength']; ?></p>
                        <label class="input-group">Price</label>
                        <p><?php echo $row['price']; ?></p>
                        <label class="input-group">Quantity</label>
                        <p><?php echo $row['quantity']; ?></p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <label class="input-group">Images</label>
                        <div div class="row">
                            <?php $pharma->viewDrugImages(); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="input-group">Description</label>
                        <p><?php echo $row['description']; ?></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="diplay-flex pr-5">
            <?php
            $hashacc_id = base64_encode($row['id']);
            echo "<a href='pharmacy.php?updateDrug=" . $hashacc_id . "' class='btn btn-primary float-right btn-md'>Update</a>";
            ?>
        </div>
    </section>
</div>