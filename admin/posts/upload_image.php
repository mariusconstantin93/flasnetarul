<?php  include('../../config.php'); ?>
<?php require_once '../middleware.php'; ?>
<?php  include(ROOT_PATH . '/admin/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/layouts/head_section.php'); ?>
<!-- Get all topics -->
<?php $topics = getAllTopics();	?>
<title>Admin | Upload images</title>
</head>
<body>
<div class="container-fluid shadow-sm mt-5 mb-3" style="max-width: 1365.98px;">
    <div class="row">
        <div class="col-sm-9">
            <h1 class="page-title">Încărcare imagini in Galerie</h1>
            <form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/posts/upload_image.php'; ?>" >
                <?php include(ROOT_PATH . '/includes/layouts/errors.php') ?>
                <!-- if editing post, the id is required to identify that post -->
                <?php if ($isEditingPost === true): ?>
                    <input type="hidden" name="image_id" value="<?php echo $image_id; ?>">
                <?php endif ?>

                <div class="form-group">
                    <label for="imagine">Imagine:</label>
                    <input type="file" class="form-control-file border" name="featured_image">
                </div>

                <!-- Only admin users can view publish input field -->
                <?php if ($_SESSION['user']['role_id'] == 1): ?>
                    <!-- display checkbox according to whether post has been published or not -->
                    <?php if ($published == true): ?>
                        <div class="form-check">
                            <label class="form-check-label" for="publish_image">
                                <input type="checkbox" class="form-check-input" id="publish_image" name="publish_image" value="1" checked>Publică imaginea
                            </label>
                        </div>
                    <?php else: ?>
                        <div class="form-check">
                            <label class="form-check-label" for="publish_image">
                                <input type="checkbox" class="form-check-input" id="publish_image" name="publish_image" value="1" checked>Publică imaginea
                            </label>
                        </div>
                    <?php endif ?>
                <?php endif ?>

                <!-- if editing post, display the update button instead of create button -->
                <?php if ($isEditingPost === true): ?>
                    <button type="submit" class="btn btn-primary float-right" name="update_image">Actualizează imaginea</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-primary float-right" name="upload_image">Salvează imaginea</button>
                <?php endif ?>

            </form>
        </div>
        <div class="col-sm-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
</div>
</body>
</html>

