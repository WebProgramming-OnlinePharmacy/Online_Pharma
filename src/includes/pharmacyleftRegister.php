<aside class="main-sidebar pt-5">
    <div class="sidebar pt-3">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <h2><?php echo $_SESSION['username']; ?></h2>
        </div>
        <!-- side bar menu -->
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="pharmacy.php?addpharmacyinfo" class="nav-link active">
                    <i class="fas fa-edit"></i>
                    <p>
                        Add Pharmacy Information
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-edit"></i>
                    <p>
                        Update Account
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>