<?php if($this->session->flashdata('messages')){echo $this->session->flashdata('messages');} ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url() ?>">Lelang Geming</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= site_url() ?>">Home</a>
        </li>
        <?php if ($activeUser) : ?>
        <li class="nav-item">
          <a class="nav-link"  href="<?= site_url('page/penawaran') ?>">Auction History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('page/lelang') ?>">Auction Won</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('page/edit') ?>"><i class="fa-solid fa-user"></i>Hi, <?= $activeUser->nama; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  title="Change Password" href="<?= site_url('page/change') ?>"><i class="fa-solid fa-lock"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  title="Logout" href="<?= site_url('page/logout') ?>"><i class="fa fa-sign-out"></i></i></a>
        </li>
        <?php endif ?>
        <?php if (!$activeUser) : ?>
        <li class="nav-item">
          <a class="nav-link"  href="<?= site_url('auth') ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="<?= site_url('auth/register') ?>">Register</a>
        </li>
        <?php endif ?>
      </ul>
    </div>
    <form class="d-flex" method="post"action="<?= site_url('page/cari') ?>">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Cari di Lelang Geming" id="cari" name="cari" aria-describedby="button-addon2">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
</nav>