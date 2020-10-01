<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('dashboard'); ?>"> <img alt="image" src="<?= base_url('upload/logo.jpg'); ?>" class="header-logo" /> <span class="logo-name">Restaurant</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="dropdown active">
        <a href="<?= base_url('dashboard'); ?>" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-tie"></i><span>Users</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('user'); ?>">Users</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-concierge-bell"></i><span>Menu</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('menu'); ?>">Menu</a></li>
          <li><a class="nav-link" href="<?= base_url('category'); ?>">Menu Categories</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-users"></i><span>Entity</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('customer'); ?>">Customers</a></li>
          <li><a class="nav-link" href="<?= base_url('supplier'); ?>">Suppliers</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Transaction</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('input'); ?>">Input</a></li>
          <li><a class="nav-link" href="<?= base_url('output'); ?>">Output</a></li>
        </ul>
      <li>
      <li class="dropdown">
        <a href="" class="nav-link" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-door-closed"></i><span>Logout</span></a>
      </li>
    </ul>
  </aside>
</div>