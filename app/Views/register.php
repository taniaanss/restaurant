<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?= base_url('login/prosesRegister') ?>" class="needs-validation" novalidate="">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">First Name</label>
                                            <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control" name="last_name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                                        <!-- <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div> -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already Registered? <a href="<?= base_url('login') ?>">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src=" <?= base_url('admin/assets/js/app.min.js'); ?>"></script>
    <!-- JS Libraies -->
    <script src="<?= base_url('admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js'); ?>"></script>
    <script src="<?= base_url('admin/assets/bundles/jquery-selectric/jquery.selectric.min.js'); ?>"></script>
    <!-- Page Specific JS File -->
    <script src="<?= base_url('admin/assets/js/page/auth-register.js'); ?>"></script>
    <!-- Template JS File -->
    <script src="<?= base_url('admin/assets/js/scripts.js'); ?>"></script>
    <!-- Custom JS File -->
    <script src="<?= base_url('admin/assets/js/custom.js'); ?>"></script>
</body>