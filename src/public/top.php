<nav class="navbar navbar-expand navbar-primary navbar-dark pt-3 pb-2 fixed-top">
    <!-- Left navbar links -->
    <div class="form-inline">
        <form action="">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="text" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block pr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signin">
                Signin
            </button>
        </li>
        <li class="nav-item d-none d-sm-inline-block pr-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup">
                SignUp
            </button>
        </li>
    </ul>
</nav>
<div class="modal fade" id="signup">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <p class="login-box-msg text-secondary">SingUp for a new membership</p>
                        <form action="#" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password" name="confirmpassword">
                            </div>
                            <div class="input-group mb-3">
                                <select name="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="pharmacy">Pharmacy</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" name="registerAccount" class="btn btn-primary btn-block">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <a href="home.html" class="text-center">I already have an Account</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<div class="modal fade" id="signin">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card ">
                    <div class="card-body">
                        <p class="login-box-msg">Login to CSEC_ASTU</p>
                        <form action="#" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username or Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                        <!-- Button trigger modal -->
                        <a href="./ForgetPassword.html">Forget Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>