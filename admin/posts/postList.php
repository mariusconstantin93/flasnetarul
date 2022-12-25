<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/roles/roleLogic.php') ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/layouts/head_section.php'); ?>

<!-- Get all admin posts from DB -->
<?php $posts = getAllPosts(); ?>
	<title>Panou de control - Administrare Postﾄビi</title>
</head>
<body>
	<!-- admin navbar -->
    <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>

	<div class="container-fluid shadow-sm mt-5 mb-3">
        <a href="<?php echo BASE_URL . 'admin/posts/create_post.php' ?>" class="btn btn-success mt-2">
            <i class="fas fa-plus"></i>
            Creare articol nou
        </a>
        <hr>
        <div class="row">
            <div class="col-sm-9">
                <h1 class="text-center">Administrare Articole</h1>
                <br />
                <!-- Display records from DB-->
                        <!-- Display notification message -->
                        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>

                        <?php if (empty($posts)): ?>
                            <h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
                        <?php else: ?>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-dark table-hover table-bordered">
                                <thead>
                                <th class="text-center">N</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Titlu</th>
                                <th class="text-center"><small>Vizite</small></th>
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
                                                  href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
                                                <?php echo $post['title']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo $post['visits']; ?></td>

                                        <!-- Only Admin can publish/unpublish post -->
                                        <?php if ($_SESSION['user']['role_id'] == 1 ): ?>
                                            <td class="text-center">
                                                <?php if ($post['published'] == true): ?>
                                                    <a class="btn btn-sm btn-primary unpublish" href="postList.php?unpublish=<?php echo $post['id'] ?>">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="btn btn-sm btn-primary publish" href="postList.php?publish=<?php echo $post['id'] ?>">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                        <?php endif ?>

                                        <td class="text-center">
                                            <a class="btn btn-sm btn-success edit" href="create_post.php?edit-post=<?php echo $post['id'] ?>">
                                                <i class="fas fa-pen-fancy"></i>
                                            </a>
                                        </td>
                                        <?php if ($_SESSION['user']['role_id'] == 1): ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-danger confirmation" href="create_post.php?delete-post=<?php echo $post['id'] ?>">
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
        if (!confirm('Ești sigur că vrei să ștergi acest articol?\nAcțiunea este ireversibilă iar fișierele nu vor mai putea fi recuperate!')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</body>
</html>
