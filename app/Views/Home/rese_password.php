<?= $this->extend('home/navigation') ?>

<?= $this->section('title') ?>
forgot password
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
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
                        <h2>Reset Password</h2>
                        <form action="<?= base_url('reset') ?>" method="post" class="form">
                        <input type="hidden" name="token" value="<?= $token ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user color-blue"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Your New Password"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Reset Password" class="btn btn-lg btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Include this script in your login view or layout -->
        </div>
    </div>
</div>


<?= $this->endSection() ?>