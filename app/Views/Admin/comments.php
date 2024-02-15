<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Comments
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
                    <h1 class="m-0">Comments</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= base_url('bulkoption') ?>" method="post">
                        <div class="mb-3" id="bulkOptionContainer">
                            <select class='form-control' name='select' id=''>
                                <option value="">Select Option</option>
                                <option value="approve">Approve</option>
                                <option value="disapprove">Disapprove</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" class="btn btn-success"
                                onclick="return confirm('Are you sure you want apply this bulk option?')" value="Apply">
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comments Table</h3>
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
                                            <th>Comment</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>In Response to</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($comments as $comment): ?>

                                            <tr>
                                                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"
                                                        value="<?= $comment['comment_id'] ?>"></td>
                                                <td>
                                                    <?= $comment['comment_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $comment['comment_author'] ?>
                                                </td>
                                                <td>
                                                    <?= $comment['comment_content'] ?>
                                                </td>
                                                <td>
                                                    <?= $comment['comment_email'] ?>
                                                </td>
                                                <td>
                                                    <?= $comment['comment_status'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('post/' . $comment['comment_post_id']) ?>">
                                                        <?= $comment['post_tittle'] ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?= $comment['comment_date'] ?>
                                                </td>
                                                <td>

                                                    <a class="btn btn-danger"
                                                        href="<?= base_url('comments/delete/' . $comment['comment_id']) ?>"
                                                        onclick="return confirm('Are you sure you want to delete this post comment?')">Delete</a>
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
                                            <th>Comment</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>In Response to</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </form>

                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item">
                                        <?= $pager->links() ?>
                                    </li>
                                </ul>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endsection('content') ?>