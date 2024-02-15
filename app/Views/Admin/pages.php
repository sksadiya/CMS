<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Pages
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
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session('error');
                    echo '</div>';
                } ?>
                <div class="col-sm-6">
                    <h1 class="m-0">Pages</h1>
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
                                <span><a class="btn btn-primary" href="<?= base_url('addPage') ?>"
                                        role="button">Add</a></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                           
                                        <th>Page_id</th>
                                            <th>Page_title</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($pages as $content): ?>
                                            <tr>
                                                
                                                <td>
                                                    <?= $content['page_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $content['page_title'] ?>
                                                </td>
                                                <td>
                                                    <?= $content['slug'] ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= base_url('Pages/edit/' . $content['page_id']) ?>"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('Pages/delete/' . $content['page_id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this page?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        <a href="<?= base_url('Pages/copy/' . $content['page_id']) ?>"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-copy"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>Page_id</th>
                                            <th>Page_title</th>
                                            <th>Slug</th>
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