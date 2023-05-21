<div class="wrapper"><!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('backend/user') ?>" class="brand-link">
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
            <a href="<?= base_url('backend/user') ?>" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('backend/user/rbarang')?>" class="nav-link">
            <i class="fa-solid fa-cart-flatbed"></i>
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('backend/user/klelang') ?>" class="nav-link">
            <i class="fa-solid fa-inbox"></i>
              <p>Lelang</p>
            </a>
          </li>
        <li class="nav-item">
            <a href="<?= base_url('backend/user/rlelang') ?>" class="nav-link">
            <i class="fa-solid fa-clock"></i>
              <p>
               Bidding History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('backend/user/plelang') ?>" class="nav-link">
            <i class="fa-solid fa-trophy"></i>
              <p>
               Auction Winner
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