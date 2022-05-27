<div class="content-wrapper ">
    <div class="content pt-5">
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Drug List</h3>
                        </div>
                        <div class="card-body table-responsive " style="height: 400px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Manufacture Date</th>
                                        <th>Expire Date</th>
                                        <th>Form</th>
                                        <th>Strength</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Available</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $pharma->viewDrug() ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>