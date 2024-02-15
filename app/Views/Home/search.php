<!-- app/Views/home/search_results.php -->

<?= $this->extend('home/default') ?>

<?= $this->section('title') ?>
Search Results
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h1>Search Results</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">

        <div class="row">
        <?php if (!empty($searchResults)): ?>
                <?php foreach ($searchResults as $post): ?>
                <div class="col-lg-4 col-md-6 py-5">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="<?= base_url('public/images/' . $post['post_image']) ?>" height="200px" width="128px" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= base_url('post/' . $post['post_id']) ?>"><?= $post['post_tittle']?></a></h5>
                            <p class="card-text"><?= substr($post['post_content'], 0, 10) ?></p>
                            <a href="<?= base_url('post/' . $post['post_id']) ?>" class="btn btn-primary">Read More</a>
                            <span><button class="like-btn" style="border:none;" data-post-id="<?= $post['post_id'] ?>"><i class="far fa-heart" style="color:#ff0000"></i></button></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?>
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

<?= $this->endSection('content') ?>