<div class="content-wrapper vh-100 ">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid pt-5">
            <div class="card card-default mt-5">
                <div class="card-body ">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Drug Name</label>
                                    <input type="text" name="drug_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Manufacture Date</label>
                                    <input type="date" name="manfacture_date" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Expire Date</label>
                                    <input type="date" name="expire_date" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>strength</label>
                                    <input type="number" name="strength" class="form-control" placeholder="Age">
                                </div>
                                <div class="form-group">
                                    <label>Form</label>
                                    <select class="form-control" name="form" data-placeholder="Sex" style="width: 100%;">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" class="form-control <?php if (isset($username_err)) echo 'is-invalid'; ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control <?php if (isset($email_err)) echo 'is-invalid'; ?>" placeholder="quantitiy">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Images</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image[]" class="custom-file-input" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                </div>
                <div class="display-flex">
                    <button name="addDrug" type="submit" class="btn btn-primary mb-3 mr-3 btn-md float-right">Add</button>
                </div>
                </form> <!-- /.row -->
            </div>
        </div>
</div>
</section>
</div>