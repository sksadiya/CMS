<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=  base_url('public/style.css')?>">
</head>
<style>
    .login {
        padding-top: 10px;
    }
    .screen {
        height:300px;
    }
    .social-login { 
        height:70px;
    }
    h3 {
        color:#776BCC;
         }
</style>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                
                <form class="login" action='<?= base_url('forgot_password') ?>' method='post'>

                <div class="login__field">
                    <?php if (session()->has('fail')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('fail') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->has('message')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('message') ?>
                        </div>
                    <?php endif; ?>
                </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" placeholder="User email" name='email' required>
                    </div>
                    
                    <button class="button login__submit">
                        <span class="button__text">Send Link</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3 onclick="window.location.href='<?= base_url('login') ?>'">Login</h3>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    <script src="<?= base_url('public/assets/js/login.js') ?>"></script>
</body>
<!-- <body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Forgot Password</h1>
                            <?php if (session()->has('fail')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('fail') ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->has('message')): ?>

                                <div class="alert alert-success" role="alert">
                                    <?= session('message') ?>
                                </div>

                            <?php endif; ?>
                            <form action="<?= base_url('forgot_password') ?>" method="post" class="needs-validation"
                                novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required
                                        autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Send Link
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Remember your password? <a href="<?= base_url('login') ?>" class="text-dark">Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('public/assets/js/login.js') ?>"></script>
</body> -->

</html>