<?php include('../config.php') ?>
<?php include(ROOT_PATH . '/admin/middleware.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>

<div class="container-fluid shadow-sm mt-5 mb-3" style="max-width: 1365.98px;">
    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
    <h1 class="text-center">Operațiuni</h1>
    <br />
    <ul class="list-group font-weight-bold">
        <a href="<?php echo BASE_URL . 'admin/posts/create_post.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Creare articol nou</a>
        <a href="<?php echo BASE_URL . 'admin/posts/upload_image.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Încarcă imagini în galerie</a>
        <a href="<?php echo BASE_URL . 'admin/posts/postList.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Administrare articole</a>
        <a href="<?php echo BASE_URL . 'admin/posts/image_list.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Administrare Galerie de Imagini</a>
        <?php if ($_SESSION['user']['role_id'] == 1): ?>
        <a href="<?php echo BASE_URL . 'admin/topics.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Administrare subiecte</a>
        <a href="<?php echo BASE_URL . 'admin/users/userList.php' ?>" class="list-group-item list-group-item-action list-group-item-dark">Administrare Utilizatori</a>
        <?php endif ?>
    </ul>
    <br>
</div>
</body>
</html>