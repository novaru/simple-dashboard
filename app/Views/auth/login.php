<?php helper(['form', 'url']); ?>

<body class="app sidebar-mini ltr login-img">
    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="<?= base_url('/'); ?>assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="<?= base_url(); ?>">
                            <img src="<?= base_url('/'); ?>assets/images/brand/logo-white.png" class="header-brand-img" alt="">
                        </a>
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">

                        <!-- Display Error/Success Messages -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger mb-3">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mb-3">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    <?= session()->getFlashdata('errors') ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form class="login100-form validate-form" method="post" action="<?= base_url('auth/login'); ?>">
                            <?= csrf_field() ?>

                            <span class="login100-form-title pb-5">
                                Login
                            </span>

                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Email</a></li>
                                            <li class="mx-0"><a href="#tab6" data-bs-toggle="tab">Mobile</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    type="email"
                                                    name="email"
                                                    placeholder="Email"
                                                    value="<?= old('email') ?>"
                                                    required>
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    type="password"
                                                    name="password"
                                                    placeholder="Password"
                                                    required>
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Forgot Password?</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="login100-form-btn btn-primary">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="text-center pt-3">
                                                <p class="text-dark mb-0">Not a member?<a href="<?= base_url('/') ?>auth/register" class="text-primary ms-1">Sign UP</a></p>
                                            </div>
                                            <label class="login-social-icon"><span>Login with Social</span></label>
                                            <div class="d-flex justify-content-center">
                                                <a href="javascript:void(0)">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-google"></i>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="social-login me-4 text-center">
                                                        <i class="fa fa-facebook"></i>
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <div class="social-login text-center">
                                                        <i class="fa fa-twitter"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+62</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0"
                                                    name="mobile"
                                                    placeholder="Mobile Number">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" name="otp1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" name="otp2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" name="otp3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" name="otp4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP</span>
                                            <div class="container-login100-form-btn ">
                                                <button type="button" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
