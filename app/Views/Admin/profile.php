<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <?php if (session()->has('message')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session('message');
                    echo '</div>';
                } ?>
                <?php if (session()->has('fail')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session('fail');
                    echo '</div>';
                } ?>
                <div class="col-sm-6">
                    <h1 class="m-0"> Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="<?= base_url('public/images/profile.jpg') ?>" alt="User profile picture" style='border:none;'>
                            </div>

                            <h3 class="profile-username text-center"><?= esc(session()->get('userData')['username']) ?></h3>

                            <p class="text-muted text-center"><?= esc(session()->get('userData')['user_role']) ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?= esc(session()->get('userData')['user_email']) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Firstname</b> <a class="float-right"><?= esc(session()->get('userData')['user_firstname']) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Lastname</b> <a class="float-right"><?= esc(session()->get('userData')['user_lastname']) ?></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                              Edit Profile
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('profile') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">

                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" name="firstname"
                                        value="<?= $userData['user_firstname']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" name="lastname"
                                        value="<?= $userData['user_lastname']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="<?= $userData['username']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="user_email"
                                        value="<?= $userData['user_email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Change Password</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                                <div>
                                    <input class="btn btn-primary" type="submit" name="update_user"
                                        value="Update profile">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection('content') ?>