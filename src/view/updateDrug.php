<div class="content-wrapper vh-100 ">
    <!-- Main content -->
    <?php
    $id = $_GET['updateDrug'];
    $id = base64_decode($id);
    $row = $pharma->drugInformation($id);
    ?>
    <section class="content">
        <div class="container-fluid pt-5">
            <div class="card card-default mt-5">
                <div class="card-body ">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Drug Name</label>
                                    <input type="text" name="drug_name" class="form-control" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Manufacture Date</label>
                                    <input type="date" name="manfacture_date" class="form-control" value="<?php echo $row['manufacture_date'](); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Expire Date</label>
                                    <input type="date" name="expire_date" class="form-control" value="<?php echo $row['expire_date']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Strength</label>
                                    <input type="number" name="strength" class="form-control" value="<?php echo $row['strength']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Form</label>
                                    <select class="form-control" name="form" data-placeholder="Form" style="width: 100%;" value="<?php echo $row['form']; ?>">
                                        <option>Tablet</option>
                                        <option>Drop</option>
                                        <option>Syrup</option>
                                        <option>Injection</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $row['price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4"> <?php echo $row['description']; ?> </textarea>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                </div>
                <div class="display-flex">
                    <button name="updateDrug" type="submit" class="btn btn-primary mb-3 mr-3 btn-md float-right">Update</button>
                </div>
                </form> <!-- /.row -->
            </div>
        </div>
</div>
</section>
</div>