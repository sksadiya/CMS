<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Bootstrap 5 Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Reset Password</h1>
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
                            <form action="<?= base_url('reset') ?>" method="post" class="needs-validation" novalidate="" autocomplete="off">
                        <input type="hidden" name="token" value="<?= $token ?>">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">New Password</label>
                                    <input id="password" type="password" class="form-control" name="password" value=""
                                        required autofocus>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>

</html>