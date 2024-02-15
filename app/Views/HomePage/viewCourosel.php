<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Courosels
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
                    <h1 class="m-0">Courosels</h1>

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Courosel Table</h3>
                            <div class="text-right">
                                <span><a class="btn btn-primary" href="<?= base_url('add') ?>"
                                        role="button">Add</a></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><input id="selectAllBoxes" type="checkbox"
                                                    onclick="selectAllCheckboxes(this)">
                                            </th>
                                            <th>Courosel_id</th>
                                            <th>Courosel_name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($content as $courosel): ?>
                                            <tr>
                                                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"
                                                        value="<?= $courosel['id'] ?>"></td>
                                                </td>
                                                <td>
                                                    <?= $courosel['id'] ?>
                                                </td>
                                                <td>
                                                    <?= $courosel['c_name'] ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= base_url('Courosel/edit/' .  $courosel['id']) ?>"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('Courosel/delete/' . $courosel['id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this courosel?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        <a href="<?= base_url('Courosel/copy/' . $courosel['id']) ?>" class="btn btn-primary">
                                                        <i class="fas fa-copy"></i></a>

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
                                            <th>Courosel_id</th>
                                            <th>Courosel_name</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>