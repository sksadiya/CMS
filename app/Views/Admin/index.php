<?= $this->extend('admin/default') ?>

<?= $this->section('title') ?>
Admin Panel
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
                <?php if (session()->has('fail')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo session('fail');
                    echo '</div>';
                } ?>
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?= $postCount ?>
                            </h3>
                            <p>Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-document"></i>
                        </div>
                        <a href="<?= base_url('posts') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?= $commentCount ?>
                            </h3>
                            <p>Comments</p>
                        </div>
                        <div class="icon  mt-0 py-0">
                            <i class="ion-android-chat"></i>
                        </div>
                        <a href="<?= base_url('comments') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?= $userCount ?>
                            </h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-people"></i>
                        </div>
                        <a href="<?= base_url('users') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?= $categoryCount ?>
                            </h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion-bookmark"></i>
                        </div>
                        <a href="<?= base_url('categories') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Line Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="Linechart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

<div class="container-fluid mt-1 mb-1">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Recent Action</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="timeline">
                        <?php foreach ($timelinedata as $time): ?>
                            <li>
                                <a href="<?= base_url('profile') ?>" class="d-block">
                                    <?= esc(session()->get('userData')['username']) ?>
                                </a>
                                <h4> <a href="">
                                        <?= $time['table_name'] ?>
                                        <?= $time['action_type'] ?>
                                    </a></h4>
                                <h6 class='float-right'>
                                <?= date('d M Y h:i A', strtotime($time['created_at'])) ?>
                                </h6>

                                <p>
                                    <?= $time['action_description'] ?>
                                </p>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var labels = ['Posts', 'Categories', 'Comments', 'Users'];
        var data = [<?= $postCount ?>, <?= $categoryCount ?>, <?= $commentCount ?>, <?= $userCount ?>];

        var ctx = document.getElementById('Linechart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Count',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'category',
                        labels: labels,
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
<?= $this->endsection('content') ?>