<aside class="main-sidebar pt-5">
    <div class="sidebar pt-3">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <h2><?php echo $_SESSION['username']; ?></h2>
        </div>
        <!-- side bar menu -->
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="fas fa-tasks"></i>
                    <p>
                        Manage Drug
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pharmacy.php?addDrug" class="nav-link active">
                            <p>Add Drug</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pharmacy.php?viewDrug" class="nav-link">
                            <p>View Drug</p>
                        </a>
                    </li>
                </ul>
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