<div class="wrapper"><!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('backend/admin') ?>" class="brand-link">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fa-solid fa-code-compare"></i>
    <span class="brand-text font-weight-light">Lelang Geming</span>
    </div>
  </a>
  
  <!-- Sidebar Menu -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('backend/admin') ?>" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user fa-fw"></i>
          <p>
            Manage User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('backend/admin/user')?>" class="nav-link">
              <p>List Data User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('backend/admin/auser') ?>" class="nav-link">
              <p>Add Data User</p>
            </a>
          </li>
        </ul>
      </li>  
          <li class="nav-item">
            <a href="<?= base_url('backend/admin/masyarakat') ?>" class="nav-link">
            <i class="fas fa-fw fa-user"></i>
              <p>
               Masyarakat's Data
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('backend/auth/logout') ?>" class="nav-link">
            <i class="fas fa-fw fa-sign-out-alt"></i>
              <p>
               Logout 
              </p>
            </a>
          </li>
                  </aside>