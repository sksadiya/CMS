<?= $this->extend('Admin/default') ?>

<?= $this->section('title') ?>
Not found
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

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
                <div class="center">
                    <h1 class="page-header">
                        <b>Not Found</b>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content') ?>