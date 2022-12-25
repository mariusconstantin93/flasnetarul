<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/roles/roleLogic.php') ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/layouts/head_section.php'); ?>

<!-- Get all admin posts from DB -->
<?php $posts = getAllUploadedImages(); ?>
<title>Panou de control - Administrare Galerie de Imagini</title>
</head>
<body>
<!-- admin navbar -->
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>

<div class="container-fluid shadow-lg mb-3" style="max-width: 1599.98px;">
    <a href="<?php echo BASE_URL . 'admin/posts/upload_image.php' ?>" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i>
        Încarcă o imagine nouă
    </a>
    <hr>
    <div class="row">
        <div class="col-sm-9">
            <h1 class="text-center">Administrare Galerie de Imagini</h1>
            <br />
            <!-- Display records from DB-->
            <!-- Display notification message -->
            <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>

            <?php if (empty($posts)): ?>
                <h1 style="text-align: center; margin-top: 20px;">Nu sunt imagini în galerie.</h1>
            <?php else: ?>
            <div class="table-responsive-sm">
                <table class="table table-sm table-dark table-hover table-bordered">
                    <thead>
                    <th class="text-center">Nr</th>
                    <th class="text-center">Autor</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Previzualizare</th>
                    <th class="text-center">Nume</th>
                    <th class="text-center"><small>Vizualizări</small></th>
                    <!-- Only Admin can publish/unpublish post -->
                    <?php if ($_SESSION['user']['role_id'] == 1): ?>
                        <th class="text-center"><small>Publică</small></th>
                    <?php endif ?>
                    <th class="text-center"><small>Editează</small></th>
                    <?php if ($_SESSION['user']['role_id'] == 1): ?>
                        <th class="text-center"><small>Șterge</small></th>
                    <?php endif ?>
                    </thead>
                    <tbody>
                    <?php
                    krsort($posts);
                    foreach ($posts as $key => $post): ?>
                        <tr>
                            <td class="text-center"><?php echo $key + 1; ?></td>
                            <td class="text-center"><?php echo $post['author']; ?></td>
                            <td class="text-center">
                                <a 	target="_blank"
                                      href="<?php echo BASE_URL . 'galerie.php?post-slug=' . $post['slug'] ?>">
                                    <?php echo $post['id']; ?>
                                </a>
                            </td>
                            <td class="text-center"><img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Card Image" style="width: 231px; height: 121.275px"></td>
                            <td class="text-center"><?php echo $post['image']; ?></td>
                            <td class="text-center"><?php echo $post['visits']; ?></td>

                            <!-- Only Admin can publish/unpublish post -->
                            <?php if ($_SESSION['user']['role_id'] == 1 ): ?>
                                <td class="text-center">
                                    <?php if ($post['published'] == true): ?>
                                        <a class="btn btn-sm btn-primary unpublish_image" href="image_list.php?unpublish_image=<?php echo $post['id'] ?>">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php else: ?>
                                        <a class="btn btn-sm btn-primary publish_image" href="image_list.php?publish_image=<?php echo $post['id'] ?>">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    <?php endif ?>
                                </td>
                            <?php endif ?>

                            <td class="text-center">
                                <a class="btn btn-sm btn-success edit" href="upload_image.php?edit-image=<?php echo $post['id'] ?>">
                                    <i class="fas fa-pen-fancy"></i>
                                </a>
                            </td>
                            <?php if ($_SESSION['user']['role_id'] == 1): ?>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger confirmation" href="upload_image.php?delete-image=<?php echo $post['id'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php endif ?>
        </div>
        <div class="col-sm-3 mb-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Ești sigur că vrei să ștergi această imagine?\nAcțiunea este ireversibilă iar fișierele nu vor mai putea fi recuperate!')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</body>
</html>
