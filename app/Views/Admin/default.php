<?= $this->include('admin/header') ?>
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url('public/dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo"
        height="60" width="60">
    </div>

    <?= $this->include('admin/navigation') ?>
   
    <?= $this->include('admin/sidebar') ?>
   
    <?= $this->renderSection('content') ?>

   
</div> 
<?= $this->include('admin/footer') ?>