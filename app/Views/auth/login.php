<?php helper('form'); ?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <title>Login - Transaksi Penjualan APP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Irfan" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <link rel="shortcut icon" href="<?= base_url('themes/images/favicon.ico') ?>">
        <link href="<?= base_url('themes/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('themes/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('themes/css/theme.min.css') ?>" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-dark">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center min-vh-100">
                            <div class="w-100 d-block my-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-4 mt-3">
                                                    <h2>SIGN IN</h2>
                                                </div>
                                                <?= form_open(route_to('login'), ['class' => 'p-2']) ?>
                                                    <?= isset($failed) && !empty($failed) ? "<p class='text-danger mb-2'><small>{$failed}</small></p>" : ""; ?>
                                                    <div class="form-group">
                                                        <label for="emailaddress">Username atau email</label>
                                                        <input class="form-control" <?= $config->validFields === ['email'] ? 'type="email"' : 'type="text"' ?> id="emailaddress" required="" placeholder="" name="login">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                                        <div class="mt-1"><small class="text-danger"><?= $this->include('auth/login-message') ?></small></div>
                                                    </div>
                                                    <?php if ($config->allowRemembering): ?>
                                                        <div class="form-group mb-4 pb-3">
                                                            <div class="custom-control custom-checkbox checkbox-primary">
                                                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember">
                                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                                    </div>
                                                <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <script src="<?= base_url('themes/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('themes/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('themes/js/metismenu.min.js') ?>"></script>
        <script src="<?= base_url('themes/js/waves.js') ?>"></script>
        <script src="<?= base_url('themes/js/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('themes/js/theme.js') ?>"></script>
    </body>

</html>