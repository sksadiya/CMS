<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin') ?>" class="brand-link">
    <img src="<?= base_url('public/images/image_1.jpg') ?>" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CMS Project</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('public/images/avatar.webp') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('profile') ?>" class="d-block">
          <?= esc(session()->get('userData')['username']) ?>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Posts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('posts') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Posts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('add_post') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Post</p>
              </a>
            </li>
          </ul>
        <li class="nav-item">
          <a href="<?= base_url('categories') ?>" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('comments') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Comments</p>
          </a>
        </li>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user-friends nav-icon"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('users') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('add_users') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-home nav-icon"></i>
            <p>
              Home
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('courosel') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Courosels</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('sectionB') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Section B</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('feature') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Features</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('featureH') ?> " class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Features Text</p>
              </a>
              </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('pages') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Pages</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>