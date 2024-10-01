<style>

    .nav-link.active {
        color: #f00 !important;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- menu for all -->
        <a class="nav-link <?= is_active('/') ?>" href="/">Home</a>
        <a class="nav-link <?= is_active('/about') ?>" href="/about">About</a>

        <!-- menu for logged in only -->
        <?php if(isset($_SESSION['is_loggedin'])) :  ?>
            <a class="nav-link <?= is_active('/member') ?>" href="/member">Member</a>

            <?php if(App\Lib\Utils::is_role('admin')) : ?>            
                <a class="nav-link <?= is_active('/users*') ?>" href="/users">Users</a>
            <?php endif; ?>

            <a class="nav-link" href="/logout">Logout</a>
        <?php endif; ?>

        <!-- menus for public guests only -->
        <?php if(!isset($_SESSION['is_loggedin'])) :  ?>
            <a class="nav-link <?= is_active('/login') ?>" href="/login">Login</a>
            <a class="nav-link <?= is_active('/register') ?>" href="/register">Register</a>
        <?php endif; ?>


      </div>
    </div>
  </div>
</nav>