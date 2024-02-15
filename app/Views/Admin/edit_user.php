<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Edit User
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
                    <h1 class="m-0">Edit User</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>

                        <form action="<?= base_url('users/update') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" class="form-control" name="firstname"
                                                value="<?= $user['user_firstname'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" class="form-control" name="lastname"
                                                value="<?= $user['user_lastname'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                value="<?= $user['username'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="user_role" required>
                                                <option value="subscriber" <?= ($user['user_role'] == 'subscriber') ? 'selected' : '' ?>>
                                                    Subscriber</option>
                                                <option value="admin" <?= ($user['user_role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="user_email"
                                        value="<?= $user['user_email'] ?>" required>
                                </div>
                                <div>
                                    <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection('content') ?>