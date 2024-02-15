<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Section
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
                    <h1 class="m-0">Section B</h1>

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
                            <h3 class="card-title">Section Table</h3>
                            <div class="text-right">
                                <span><a class="btn btn-primary" href="<?= base_url('addSection') ?>"
                                        role="button">Add</a></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Section_id</th>
                                            <th>Section_tittle</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($content as $section): ?>
                                            <tr>
                                                <td>
                                                    <?= $section['id'] ?>
                                                </td>
                                                <td>
                                                    <?= $section['heading'] ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= base_url('Section/edit/' . $section['id']) ?>"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('Section/delete/' . $section['id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this section?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        <a href="<?= base_url('Section/copy/' . $section['id']) ?>"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-copy"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Section_id</th>
                                            <th>Section_tittle</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection('content') ?>