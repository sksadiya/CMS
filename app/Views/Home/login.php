<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('public/style.css') ?>">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                
                <form class="login" action='<?= base_url('login/log') ?>' method='post'>

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
                        <input type="text" class="login__input" placeholder="User name" name='username' required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name='password' required>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3 onclick="window.location.href='<?= base_url('forgot') ?>'">Forgot Password?</h3>
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

</html>