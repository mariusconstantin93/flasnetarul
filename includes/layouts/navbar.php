<div class="jumbotron text-center py-2 px-0" style="margin-bottom:0">
    <h1 style="font-family: 'Bungee Inline', cursive; display: inline-block;">Flașnetarul</h1>
    <h6><b>~ flașnetar pamfletar ~</b></h6>
</div>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow-lg mb-2">
    <a class="navbar-brand p-0" href="<?php echo BASE_URL . 'index.php'?>"><img class="img-fluid" src="https://i.imgur.com/vz8PQz8.png" width="40px"></a>
    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse float-right" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">Politică</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=2'?>">Social</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">Știință</a>
            </li>
            <!--<li class="nav-item">-->
            <!--    <a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">Imagini</a>-->
            <!--</li>-->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=5'?>">Bancuri</a>
            </li>
        </ul>
 <div class="container">
                <?php if (isset($_SESSION['user'])): ?>
                <div class="dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['user']['username'] ?>
                    </button>
                    <?php if (isAdmin($_SESSION['user']['id'])): ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/myProfile.php' ?>">Profilul meu</a>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">Panou de control</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a>
                        </div>
                    <?php else: ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'admin/myProfile.php' ?>">Profilul meu</a>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php' ?>" style="color: red;">Logout</a>
                        </div>
                    <?php endif; ?>
                    <?php else: ?>
                <!--<a style="text-decoration: none;" class="float-right ml-3 text-white" href="<?php echo BASE_URL . 'signup.php' ?>"><i style="font-size: 24px" class="fas fa-user-plus mr-2"></i>Înregistrare</a>-->
                <!-- <a style="text-decoration: none;" class="float-right text-white" href="<?php echo BASE_URL . 'login.php' ?>"><i style="color: white; font-size: 24px" class="fas fa-sign-in-alt mr-2"></i>Logare</a> -->
        <?php endif; ?>
                    
                </div>
 </div>
 </div>
</nav>