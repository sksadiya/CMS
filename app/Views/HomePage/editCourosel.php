<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Edit Courosels
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
                    <h1 class="m-0">Edit Courosels</h1>
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
                            <h3 class="card-title">Add Courosel</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?= base_url('Courosel/update') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="courosel_id" value="<?= $homeCourosel['id'] ?>">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Courosel_name</label>
                                    <input type="text" class="form-control" name="name"
                                        value='<?= $homeCourosel['c_name'] ?>' required>
                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="content_page_id">Select Page</label>
                                            <select class='form-control' name="content_page_id" id="content_page_id">
                                               
                                                <?php foreach ($pages as $page): ?>
                                                    <option value="<?= $page['page_id'] ?>"
                                                        <?= ($page['page_id'] == $homeCourosel['content_page_id']) ? 'selected' : '' ?>>
                                                        <?= $page['page_title'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Active Image</label>
                                    <input type="file" class="form-control" name="image1" >
                                    <input type="hidden" class="form-control" name="old_image1"
                                        value='<?= $homeCourosel['image'] ?>'>
                                </div>
                                <div class="form-group">
                                    <label>Caption</label>
                                    <input type="text" class="form-control" name="caption"
                                        value="<?= $homeCourosel['caption'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="content_section" value='courosel'
                                        <?= $homeCourosel['content_section'] ?>>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea class="form-control" name="description" id="summernote" cols="30"
                                        rows="10"> <?= esc($homeCourosel['para']) ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="edit_courosel">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection('content') ?>