<?= $this->extend('home/default') ?>
<?= $this->section('title') ?>
<?php if (!empty($categoryPosts)): ?>
    Articles of
    <?= esc($categoryPosts[0]['cat_tittle']) ?>
<?php endif ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <?php if (!empty($categoryPosts)): ?>
                        <h1>Articles of
                            <?= esc($categoryPosts[0]['cat_tittle']) ?>
                        </h1>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="latest-news mt-150 mb-150">
    <div class="container">

        <div class="row">
            <?php foreach ($categoryPosts as $post): ?>
                <div class="col-lg-4 col-md-6 py-5">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="<?= base_url('public/images/' . $post['post_image']) ?>"
                            height="200px" width="128px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= base_url('post/' . $post['post_id']) ?>">
                                    <?= $post['post_tittle'] ?> by
                                </a><span><?= $post['post_author'] ?></span></h5>
                            <p class="card-text">
                                <?= substr($post['post_content'], 0, 10) ?>
                            </p>
                            <a href="<?= base_url('post/' . $post['post_id']) ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                            <span><button class="like-btn" style="border:none;" data-post-id="<?= $post['post_id'] ?>"><i
                                        class="far fa-heart" style="color:#ff0000"></i></button></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-wrap">
                            <ul>
                                <li>
                                    <?= $pager->links() ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection('content') ?>