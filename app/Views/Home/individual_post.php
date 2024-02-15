<?= $this->extend('home/default') ?>

<?= $this->section('title') ?>
Post for
<?= $post['post_tittle'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Read the Details</p>
                    <h1> <?= $post['post_tittle'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                            <div class="card mb-3">
                            <img class="img-responsive" src="<?= base_url('public/images/' . $post['post_image']) ?>"
                                alt="">
                                </div>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i>
                                <?= $post['post_author'] ?>
                            </span>
                            <span class="date"><i class="fas fa-calendar"></i>
                                <?= $post['post_date'] ?>
                            </span>
                        </p>
                        <h2><?= $post['post_tittle'] ?></h2>
                        <p>
                            <?= $post['post_content'] ?>
                        </p>
                    </div>

                    <div class="comments-list-wrap">
                        <h3 class="comment-count-title">Comments</h3>
                        <div class="comment-list">
                            <?php foreach ($comments as $comment): ?>
                                <div class="single-comment-body">
                                    <div class="comment-user-avater">
                                        <img src="<?= base_url('public/images/profile.jpg') ?>" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>
                                            <?= $comment['comment_email'] ?> <span class="comment-date">
                                                <?= $comment['comment_date'] ?>
                                            </span>
                                        </h4>
                                        <p>
                                            <?= $comment['comment_content'] ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                    <div class="comment-template">
                        <h4>Leave a comment</h4>
                        <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                        <form action="<?= base_url('comment/leaveComment/' . $post['post_id']) ?>" method='post'>
                            <p>
                                <input type="text" name="comment_author" placeholder="Your Name">
                                <input type="email" name="comment_email" placeholder="Your Email">
                                <?php if (session()->getFlashdata('validationMessages')): ?>
                                <p>
                                    <?= session()->getFlashdata('validationMessages')['comment_email'] ?>
                                </p>
                            <?php endif; ?>
                            </p>
                            <p><textarea name="comment_content" id="comment" cols="30" rows="10"
                                    placeholder="Your Message"></textarea></p>
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            <?php foreach ($recentPost as $recent): ?>
                                <li>
                                  <a href="<?= base_url('post/' . $recent['post_id']) ?>">  <?= $recent['post_tittle'] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="archive-posts">
                        <h4>Categories</h4>
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li><a href="<?= base_url('home/postsByCategory/' . $category['cat_id']) ?>">
                                        <?= $category['cat_tittle'] ?>
                                    </a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            <li><a href="">
                                    <?= $post['post_tags'] ?>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection('content') ?>