<?= $this->extend('home/default') ?>

<?= $this->section('title') ?>
Blogs
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($couroselContent as $index => $image): ?>

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>"
                class="<?= $index === 0 ? 'active' : '' ?>" aria-label="Slide <?= $index ?>"></button>
        <?php endforeach ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($couroselContent as $index => $image): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= base_url('public/images/' . $image['image']) ?>" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>
                        <?= $image['caption'] ?>
                    </h5>
                    <p>
                        <?= $image['para'] ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container px-4 py-5" id="custom-cards" style="max-width:1300px;">
    <?php foreach ($featureHeading as $featureH): ?>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center animated animatedFadeInUp fadeInUp " id='feature_h'>
                <div class="section-title">
                    <h3><span class="orange-text">
                            <?= $featureH['sub_heading'] ?>
                        </span>
                        <?= $featureH['heading'] ?>
                    </h3>
                    <p>
                        <?= $featureH['para'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <?php foreach ($feature as $feature): ?>
            <div id="feature_col" class="col py-3">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style=" border-radius:1rem ; background-image:url(<?= base_url('public/images/' . $feature['image']) ?>); background-size:cover; background-repeat: no-repeat; background-position: center center;">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">

                        <h2 id="feature_title" class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style='color:#fff;'>
                            <?= $feature['sub_heading'] ?><span><i
                                    class="fas fa-<?= $feature['icon_class'] ?> px-3"></i></span>
                        </h2>
                        <p id="feature_para" style="color:#fff">
                            <?= esc($feature['para']) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php foreach ($bootstrap as $hero): ?>
    <div class="container col-xxl-8 px-4 ">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6" id='boot_col1'>

                <img src="<?= base_url('public/images/' . $hero["image"]) ?>" class="d-block mx-lg-auto img-fluid"
                    alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6" id='boot_col2'>
                <h1 class="display-5 fw-bold lh-1 mb-3">
                    <?= $hero['heading'] ?>
                </h1>
                <p class="lead">
                    <?= $hero['para'] ?>
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <?php if (!empty($hero['primary_button'])): ?>
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
                            <?= $hero['primary_button'] ?>
                        </button>
                    <?php endif ?>
                    <?php if (!empty($hero['primary_button'])): ?>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                            <?= $hero['secondary_button'] ?>
                        </button>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<div class="latest-news mt-80 mb-80">
    <div class="container">

        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-4 col-md-6 py-5 pulser">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="<?= base_url('public/images/' . $post['post_image']) ?>"
                            height="200px" width="128px" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title"><a href="<?= base_url('post/' . $post['post_id']) ?>">
                                    <?= $post['post_tittle'] ?>
                                </a></h3>
                            <p class="card-text">
                                <?= substr($post['post_content'], 0, 10) ?>
                            </p>
                            <a href="<?= base_url('post/' . $post['post_id']) ?>" class="read-more-btn">read more <i
                                    class="fas fa-angle-right"></i></a>
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
                    <div class="col-lg-12 text-center py-3">
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

    <?= $this->endsection('content') ?>