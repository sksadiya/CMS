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
                    <h1 class="m-0">Feature Heading</h1>
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
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- form start -->
                        <form action="<?= base_url('updateFeatureH') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="feature_id" value="<?= $feature['id'] ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Feature Heading</label>
                                            <input type="text" class="form-control" name="heading"
                                                value='<?= $feature['heading'] ?>' required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Feature Secondary Heading</label>
                                            <input type="text" class="form-control" name="sub_heading"
                                                value=<?= $feature['sub_heading'] ?>>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                            <label for="content_page_id">Select Page</label>
                                            <select class='form-control' name="content_page_id" id="content_page_id">
                                               
                                                <?php foreach ($pages as $page): ?>
                                                    <option value="<?= $page['page_id'] ?>"
                                                        <?= ($page['page_id'] == $feature['content_page_id']) ? 'selected' : '' ?>>
                                                        <?= $page['page_title'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="content_section"
                                        value='feature_heading'>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea class="form-control" name="para" id="summernote" cols="30" rows="10"
                                        required><?= $feature['para'] ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary"
                                        name="update_feature_heading">Save</button>
                                </div>
                                <div class="text-right">
                                    <a href="<?= base_url('FeatureH/delete/' . $feature['id']) ?>"
                                    onclick="return confirm('Are you sure you want to delete this Heading?')" class="btn btn-danger">Delete</a>
                                    <a href="<?= base_url('FeatureH/copy/' . $feature['id']) ?>"
                                        class="btn btn-info">Copy</a>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection('content') ?>