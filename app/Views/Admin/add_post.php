<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Add Post
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
                <div class="col-sm-6">
                    <h1 class="m-0">Add Post</h1>
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
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <!-- form start -->
                        <form action="<?= base_url('add_post') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Post Tittle</label>
                                    <input type="text" class="form-control" name="post_tittle" placeholder="Post tittle"
                                        required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name='post_status' class="form-control" id=''>
                                                <option value="published">Published</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="post_category_id" class="form-control" required>
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category['cat_id'] ?>">
                                                        <?= $category['cat_tittle'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Post Tags</label>
                                    <input type="text" class="form-control" name="post_tags" placeholder="Post tags"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Post Author</label>
                                    <input type="text" class="form-control" name="post_author" placeholder="Post author"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Post Image</label>
                                    <input type="file" class="form-control" name="post_image" required>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Post Content</label>
                                    <textarea class="form-control" name="post_content" id="summernote" cols="30"
                                        rows="10" required></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="create_post">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    

</div>
<?= $this->endsection('content') ?>