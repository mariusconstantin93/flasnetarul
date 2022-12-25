<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top shadow-lg">
    <a class="navbar-brand" href="<?php echo BASE_URL . 'index.php' ?>"><i class="fas fa-home" style="font-size:24px"></i></a>
    <a class="navbar-brand" href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Panou de control</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <?php if (isset($_SESSION['user'])): ?>
            <div class="container-fluid">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['user']['username'] . ' (' . $_SESSION['user']['role'] . ')'; ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/myProfile.php' ?>">Profile</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Panou de control</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</nav>