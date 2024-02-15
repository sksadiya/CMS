<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Categories
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
                <div class="col-sm-6">
                    <h1 class="m-0">Categories</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6 col-sm-6">
                <form action="<?= site_url('categories/save_category') ?>" method="post">
                    <div class="form-group">
                        <label for="cat-tittle">Add category</label>
                        <input type="text" class="form-control" name="cat_tittle">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Posts Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Tittle</th>
                                            <th></th>
                                            <th>Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $category): ?>
                                            <tr>
                                                <td>
                                                    <?= $category['cat_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $category['cat_tittle'] ?>
                                                </td>
                                                <td>
                                                    <div id="edit-mode-<?= $category['cat_id'] ?>" style="display: none;">
                                                        <form method="post" action="<?= base_url('categories/update') ?>">
                                                            <input type="hidden" name="cat_id"
                                                                value="<?= $category['cat_id'] ?>">
                                                            <div class="form-group">
                                                                <input type="text" class='form-control' name="cat_tittle"
                                                                    value="<?= $category['cat_tittle'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary" name="submit"
                                                                    value="Update">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-left py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="#"
                                                            onclick="toggleEdit(<?= $category['cat_id'] ?>); return false;"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('categories/delete/' . $category['cat_id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Tittle</th>
                                            <th></th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
<script>
    function toggleEdit(id) {
        // Toggle visibility of elements based on the category ID
        $(`#view-mode-${id}`).toggle();
        $(`#edit-mode-${id}`).toggle();

        if ($(`#edit-mode-${id}`).is(':visible')) {
            // Focus on the input field when in edit mode
            $(`#edit-mode-${id} input[name="name"]`).focus();
        }
    }
</script>


<?= $this->endsection('content') ?>