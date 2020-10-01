<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky">
      <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
          <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li>
        </ul>
      </div>
      <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= base_url('upload/pp.svg'); ?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
          <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">Hello <?= session("firstname") . ' ' . session("lastname"); ?></div>
            <a href="<?= base_url('user/view/' . session("id")); ?>" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile
            </a>
            <a href="<?= base_url('user/edit/' . session("id")); ?>" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Setting
            </a>
            <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#logoutModal"> <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>