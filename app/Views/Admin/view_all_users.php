<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Users
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
                <?php if (session()->has('error')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session('error');
                    echo '</div>';
                } ?>
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= base_url('userBulk') ?>" method="post">
                        <div class="mb-3" id="bulkOptionContainer">
                            <select class='form-control' name='select' id=''>
                                <option value="">Select Option</option>
                                <option value="subscriber">Subscriber</option>
                                <option value="admin">Admin</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" class="btn btn-success" value="Apply">
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users Table</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><input id="selectAllBoxes" type="checkbox"
                                                    onclick="selectAllCheckboxes(this)">
                                            </th>
                                            <th>User_Id</th>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"
                                                        value="<?= $user['user_id'] ?>">
                                                </td>
                                                <td>
                                                    <?= $user['user_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['username'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['user_firstname'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['user_lastname'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['user_email'] ?>
                                                </td>
                                                <td>
                                                    <?= $user['user_role'] ?>
                                                </td>
                                                <td class="text-left py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= base_url('users/editUser/' . $user['user_id']) ?>"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('users/delete/' . $user['user_id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><input id="selectAllBoxes" type="checkbox"
                                                    onclick="selectAllCheckboxes(this)">
                                            </th>
                                            <th>User_Id</th>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>

                                </table>
                                <script>
                                    function selectAllCheckboxes(source) {
                                        var checkboxes = document.getElementsByClassName('checkBoxes');
                                        for (var i = 0; i < checkboxes.length; i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                    }
                                </script>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item">
                                    <?= $pager->links() ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>