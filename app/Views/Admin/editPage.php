<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Edit Page
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<script type='text/javascript'>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 200,
        });
    });
</script>

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
                    <h1 class="m-0">Pages</h1>
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
                            <h3 class="card-title">Edit Pages</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?= base_url('updatePage') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="page_id" value=<?= $page['page_id'] ?>>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <input type="text" class="form-control" name="page_title" value='<?= $page['page_title'] ?>' required>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="edit_page">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>