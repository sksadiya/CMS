<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
View All Posts
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
                    <h1 class="m-0">View All Posts</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= base_url('bulkOption') ?>" method="post">
                        <div class="mb-3">
                            <select class="form-control" name="select" id="bulkOptionContainer">
                                <option value="">Select Option</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="delete">Delete</option>
                                <option value="clone">Clone</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" class="btn btn-success" value="Apply">
                            <a href="<?= base_url('add_post') ?>" class="btn btn-primary">Add New</a>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
                                            <th><input id="selectAllBoxes" type="checkbox"
                                                    onclick="selectAllCheckboxes(this)">
                                            </th>
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Tittle</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Tags</th>
                                            <th>Date</th>
                                            <th>Comments</th>
                                            <th>Likes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($posts as $post): ?>

                                            <tr>
                                                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"
                                                        value="<?= $post['post_id'] ?>"></td>
                                                <td>
                                                    <?= $post['post_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $post['post_author'] ?>
                                                </td>
                                                <td>
                                                    <?= $post['post_tittle'] ?>
                                                </td>
                                                <td>
                                                    <?= $post['cat_tittle'] ?>
                                                </td>
                                                <td>
                                                    <?= $post['post_status'] ?>
                                                </td>
                                                <?php if (!empty($post['post_image'])): ?>
                                                    <td><img src="<?= base_url('public/images/' . $post['post_image']) ?>"
                                                            alt="Post Image" width="100" height="50">
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <?= $post['post_tags'] ?>
                                                </td>
                                                <td>
                                                    <?= $post['post_date'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('viewComments/' . $post['post_id']) ?>">
                                                        <?= $post['post_comment_count'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $post['post_likes_count'] ?>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="<?= base_url('post/' . $post['post_id']) ?>"
                                                            class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                        <a href="<?= base_url('Posts/editPost/' . $post['post_id']) ?>"
                                                            class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url('posts/delete/' . $post['post_id']) ?>"
                                                            onclick="return confirm('Are you sure you want to delete this Post?')"
                                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Tittle</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Tags</th>
                                            <th>Date</th>
                                            <th>Comments</th>
                                            <th>Likes</th>
                                            <th>Actions</th>

                                        </tr>
                                    </tfoot>
                                </table>
                                </form>

                            </div>
                            <script>
                                function selectAllCheckboxes(source) {
                                    var checkboxes = document.getElementsByClassName('checkBoxes');
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        checkboxes[i].checked = source.checked;
                                    }
                                }
                            </script>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item">
                                    <?= $pager->links() ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection('content') ?>