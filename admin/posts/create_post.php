<?php  include('../../config.php'); ?>
<?php require_once '../middleware.php'; ?>
<?php  include(ROOT_PATH . '/admin/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/layouts/head_section.php'); ?>
<!-- Get all topics -->
<?php $topics = getAllTopics();	?>
	<title>Admin | Create Post</title>
	
<!-- ckeditor -->
<script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
<script src="../../ckfinder/ckfinder.js"></script> 


</head>
<body>
	<div class="container-fluid shadow-sm mt-5 mb-3" style="max-width: 1365.98px;">
        <div class="row">
            <div class="col-sm-9">
                    <h1 class="page-title">Create/Edit Post</h1>
                    <form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/posts/create_post.php'; ?>" >
                        <?php include(ROOT_PATH . '/includes/layouts/errors.php') ?>
                        <!-- if editing post, the id is required to identify that post -->
                        <?php if ($isEditingPost === true): ?>
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                        <?php endif ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" placeholder="Titlu">
                        </div>
                        <div class="form-group">
                            <label for="imagine">Imagine:</label> 
                            <input type="file" class="form-control-file border" name="featured_image">
                            <p style="color: red">Imaginea trebuie selectată din nou chiar și la actualizarea articolului!!!</p>
                        </div>
                        <div class="form-group">
                            <label for="body">Conținut 1:</label>
                            <textarea class="form-control" rows="10" id="body" name="body"><?php echo $body; ?></textarea>
                               <script>
                            //     CKEDITOR.replace('body', {
                            //         filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                            //         filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                            //     });
                             </script> 
                        </div>
                        <br>
                        
                        <br>
                        <div class="form-group">
                            <label for="body_2">Conținut 2:</label>
                            <textarea class="form-control" rows="10" id="body_2" name="body_2"><?php echo $body_2; ?></textarea>
                            <script>
                            //     CKEDITOR.replace('body_2', {
                            //         filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                            //         filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                            //     });
                            </script>
                        </div>
                        
                        <div class="form-group">
                            <label for="sel1">Subiect:</label>
                            <select class="form-control" id="sel1" name="topic_id">
                                <?php foreach ($topics as $topic): ?>
                                    <option value="<?php echo $topic['id']; ?>">
                                        <?php echo $topic['name']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- Only admin users can view publish input field -->
                        <?php if ($_SESSION['user']['role_id'] == 1): ?>
                            <!-- display checkbox according to whether post has been published or not -->
                            <?php if ($published == true): ?>
                                <div class="form-check">
                                    <label class="form-check-label" for="publish">
                                        <input type="checkbox" class="form-check-input" id="publish" name="publish" value="1" checked>Publică articolul
                                    </label>
                                </div>
                            <?php else: ?>
                                <div class="form-check">
                                    <label class="form-check-label" for="publish">
                                        <input type="checkbox" class="form-check-input" id="publish" name="publish" value="1" checked>Publică articolul
                                    </label>
                                </div>
                            <?php endif ?>
                        <?php endif ?>

                        <!-- if editing post, display the update button instead of create button -->
                        <?php if ($isEditingPost === true): ?>
                            <button type="submit" class="btn btn-primary float-right" name="update_post">Actualizează articolul</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary float-right" name="create_post">Salvează articolul</button>
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

