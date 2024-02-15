<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= $this->renderSection('title') ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="<?= base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/css/blog-home.css') ?>" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('/') ?>">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="<?= base_url('home/postsByCategory/' . $category['cat_id']) ?>">
                                <?= $category['cat_tittle'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                        <li>
                            <a href="<?= base_url('register') ?>">Register</a>
                        </li>
                    <li>
                        <a href="<?= base_url('admin') ?>">Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?= $this->renderSection('content') ?>

    <!-- Your footer content or scripts here -->

    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2023</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?= base_url('public/js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
</body>

</html>