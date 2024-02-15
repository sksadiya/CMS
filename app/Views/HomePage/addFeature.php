<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Add Feature
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
                    <h1 class="m-0">Add Feature</h1>
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
                            <h3 class="card-title">Add Feature</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?= base_url('addFeature') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="form-group">
                                            <label>Feature Image</label>
                                            <input type="file" class="form-control" name="image" required>
                                        </div>

                                <div class="row">
                                    <div class="col-sm-4">

                                        <div class="form-group">
                                            <label>Feature Title</label>
                                            <input type="text" class="form-control" name="sub_heading" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Feature Icon Class</label>
                                            <input type="text" class="form-control" name="icon_class">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <label for="content_page_id">Select Page</label>
                                            <select class='form-control' name="content_page_id" id="content_page_id">
                                                <option value="" selected disabled>Select a Page</option>
                                                <?php foreach ($pages as $page): ?>
                                                    <option value="<?= $page['page_id']; ?>">
                                                        <?= $page['page_title']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="content_section" value='feature'>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea class="form-control" name="para" id="summernote" cols="30" rows="10"
                                        required></textarea>
                                </div>
                            </div>
                           
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="create_feature">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>