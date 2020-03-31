<?php ?>

<!-- index -->
<nav class="navbar" style="padding: .3rem 0rem; box-shadow: 0px 3px 15px rgba(0,0,0,.08)" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <strong style="margin-right: 6px; font-size: 15pt;"><?= useEnv( "APPNAME") ?> </strong> | Dashboard
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
      <div class="dropdown is-hoverable">
        <div class="dropdown-trigger">
          <button class="button" aria-haspopup="true" aria-controls="dropdown-menu3" style="border: none; outline: none;">
            <span><?= $userdata["username"]; ?></span>
            <span class="icon is-small">
              <i class="fas fa-angle-down" aria-hidden="true"></i>
            </span>
          </button>
        </div>
        <div class="dropdown-menu" id="dropdown-menu3" role="menu">
          <div class="dropdown-content">
            <a href="<?= base_url("/user/account"); ?>" class="dropdown-item">
              <i class="fas fa-fw fa-cog" style="color: skyblue;"></i> Manage Account
            </a>
            <hr class="dropdown-divider">
            <a href="<?= base_url("/user/logout"); ?>" class="dropdown-item">
              <i class="fas fa-fw fa-power-off" style="color: skyblue;"></i> Log Out
            </a>
          </div>
        </div>
      </div>
        <figure class="image" style="width: 30px;">
          <img class="is-rounded" style="margin-left: 8px;" src="<?= base_url( "/assets/image/user/") . $userdata["avatar"]; ?>" alt="user image">
        </figure>
      </div>
    </div>
  </div>
</nav>