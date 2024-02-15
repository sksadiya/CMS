<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
  <title>
    <?= $this->renderSection('title') ?>
  </title>

	<!-- favicon -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-+d4V4cNisyz4q5FtzO9fjqHWDS4BFKcREfVqh2zHE5jBM2Bh6P0rFIACjFU3b1/sQgzneNqac8A5vw+kzmjfGA==" crossorigin="anonymous" />

	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/all.min.css') ?>">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('public/assets/bootstrap/css/bootstrap.min.css') ?>">
	<!-- owl carousel -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/owl.carousel.css') ?>">
	<!-- magnific popup -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/magnific-popup.css') ?>">
	<!-- animate css -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/animate.css') ?>">
	<!-- mean menu css -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/meanmenu.min.css') ?>">
	<!-- main style -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>">
	<!-- responsive -->
	<link rel="stylesheet" href="<?= base_url('public/assets/css/responsive.css') ?>">

</head>
<style>
	   .carousel-item img {
        height: 600px;
        width: 100%;
        object-fit: cover;

    }

    #carouselExampleCaptions {
        margin-top: 100px;
    }

	#feature_title:hover {
    color: #f59d53 !important;
}
#feature_para:hover {
    color: #f59d53 !important;
}
#feature_col { transition: all .2s ease-in-out; }
#feature_col:hover { transform: scale(1.1); }

#boot_col1 {
	animation: slideIn1 2s ease-in-out;
}
#boot_col2 {
	animation: slideIn2 2s ease-in-out;
}

@keyframes slideIn1 {
    from {
      transform: translateX(100%);
      opacity: 0 !important;
    }
    to {
      transform: translateX(0) ;
      opacity: 1 ;
    }
  }

  @keyframes slideIn2 {
    from {
		transform: translateX(-100%);
    opacity: 0;
    }
    to {
      transform: translateX(0) ;
      opacity: 1 ;
    }
  }


  @keyframes fadeInUp {
    from {
        transform: translate3d(0,40px,0)
    }

    to {
        transform: translate3d(0,0,0);
        opacity: 1
    }
}

@-webkit-keyframes fadeInUp {
    from {
        transform: translate3d(0,40px,0)
    }

    to {
        transform: translate3d(0,0,0);
        opacity: 1
    }
}

.animated {
    animation-duration: 2s;
    animation-fill-mode: both;
    -webkit-animation-duration: 2s;
    -webkit-animation-fill-mode: both
}

.animatedFadeInUp {
    opacity: 0
}

.fadeInUp {
    opacity: 0;
    animation-name: fadeInUp;
    -webkit-animation-name: fadeInUp;
}


  </style>
<body>
	

    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>