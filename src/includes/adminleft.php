<aside class="main-sidebar control-sidebar-dark">
    <!-- side -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <h2>Admin page</h2>
        </div>
        <!-- side bar menu -->
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="fas fa-tasks"></i>
                    <p>
                        Manage Pharmacy
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin.php?registeredPharmacylist" class="nav-link <?php if (isset($_GET['registeredPharmacylist'])) {
                                                                                        echo 'active';
                                                                                    } ?> ">
                            <p>Approve Pharmacy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin.php?viewpharmacy" class="nav-link <?php if (isset($_GET['viewpharmacy'])) {
                                                                                echo 'active';
                                                                            } ?>">
                            <p>View Pharmacy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin.php?deletedpharmacylist" class="nav-link <?php if (isset($_GET['deletedpharmacylist'])) {
                                                                                    echo 'active';
                                                                                } ?>">
                            <p>Deleted Pharmacy</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="fas fa-edit"></i>
                    <p>
                        Update Account
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="admin.php?addadmin" class="nav-link <?php if (isset($_GET['addadmin'])) {
                                                                    echo 'active';
                                                                } ?>"">
                    <i class=" fas fa-edit"></i>
                    <p>
                        Add Admin
                    </p>
                </a>
            </li>
        </ul>
</aside>