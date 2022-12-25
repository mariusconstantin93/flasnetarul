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

	<div class="container-fluid shadow mt-5 mb-3" style="max-width: 1365.98px;">
        <a href="<?php echo BASE_URL . 'admin/posts/create_post.php' ?>" class="btn btn-success">
            <i class="fas fa-plus"></i>
            Creare articol nou
        </a>
        <hr>
        <div class="row">
            <div class="col-sm-9">
                <h1 class="text-center">Administrare Articole</h1>
                <br />
                        <!-- Afiseaza mesajele de notificare -->
                        <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>

												<div class="table-responsive">
                        <?php if (empty($posts)): ?>
													<h2 style="text-align: center; margin-top: 20px;">Nu sunt articole in baza de date.</h2>
												<?php else: ?>
                            <table class="table table-sm table-dark table-hover table-bordered">
                                <thead>
                                <th class="text-center">Nr</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Titlu</th>
                                <th class="text-center"><small>Vizualizări</small></th>
                                <!-- Numai adminul poate publica/anula publicarea unui articol -->
                                <?php if ($_SESSION['user']['role_id'] == 1): ?>
                                    <th class="text-center"><small>Publish</small></th>
                                <?php endif ?>

                                <th class="text-center"><small>Edit</small></th>

																<!-- Numai adminul sterge un articol -->
                                <?php if ($_SESSION['user']['role_id'] == 1): ?>
                                <th class="text-center"><small>Delete</small></th>
                                <?php endif ?>
                                </thead>

                                <tbody>
                                <?php
                                krsort($posts);
                                foreach ($posts as $key => $post): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $key + 1; ?></td>
                                        <td class="text-center"><?php echo $post['author']; ?></td>
                                        <td class="text-center"><?php echo $post['id']; ?></td>
                                        <td>
                                            <a 	target="_blank"
                                                  href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
                                                <?php echo $post['title']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center"><?php echo $post['visits']; ?></td>

                                        <!-- Numai adminul poate publica/anula publicarea unui articol -->
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
																				<td class="text-center">
																							<a class="btn btn-sm btn-danger" href="create_post.php?delete-post=<?php echo $post['id']; ?>">
																									<i class="fas fa-trash-alt"></i>
																							</a>
																				</td>
																				<!-- Numai adminul sterge un articol -->
                                        <?php if ($_SESSION['user']['role_id'] == 1): ?>

                                        <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
					</div>
        </div>
				<div class="col-sm-3">
						<?php include(ROOT_PATH . '/admin/menu.php') ?>
				</div>
			</div>
    </div>
		<!-- // Display records from DB -->
</body>
</html>
