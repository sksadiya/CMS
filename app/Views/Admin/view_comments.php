<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
View Comment
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comments</h1>
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
                            <h3 class="card-title">Comments Table</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thread>
                                        <tr>
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Comment</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>In Response to</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thread>
                                    <tbody>
                                        <?php foreach ($comments as $comment): ?>
                                            <tr>
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
                                                <td> <a class="btn btn-danger"
                                                        href="<?= base_url('comments/delete/' . $comment['comment_id']) ?>"
                                                        onclick="return confirm('Are you sure you want to delete this post comment?')">Delete</a>
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