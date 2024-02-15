<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Features
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
                    <h1 class="m-0">Features</h1>

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
                            <h3 class="card-title"></h3>
                            <div class="text-right">
                                <span><a class="btn btn-primary" href="<?= base_url('addFeatureH') ?>"
                                        role="button">Add</a></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Features_Heading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($featureH as $content): ?>
                                            <tr>
                                                <td><?= $content['id'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('FeatureH/edit/' . $content['id']) ?>"> 
                                                    <?= $content['heading'] ?></a>
                                                   
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
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