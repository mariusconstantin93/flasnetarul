<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/admin_functions.php'); ?>
<!-- Get all topics from DB -->
<?php $topics = getAllTopics();	?>
	<title>Admin | Manage Topics</title>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
</head>
<body>
	<!-- admin navbar -->
    <?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
	<div class="container shadow mt-5 mb-3">
        <div class="row">
            <div class="col-sm-9">
                <!-- Middle form - to create and edit -->
                <h1 class="text-center mb-5">Crează/Editează subiecte</h1>
                <form class="form-inline col-sm" role="form" method="post" action="<?php echo BASE_URL . 'admin/topics.php'; ?>" >
                    <!-- validation errors for the form -->
                    <?php include(INCLUDE_PATH . '/layouts/errors.php') ?>
                    <!-- if editing topic, the id is required to identify that topic -->
                    <?php if ($isEditingTopic === true): ?>
                        <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                    <?php endif ?>
                    <label class="m-2" for="usr">Nume subiect:</label>
                    <input type="text" class="form-control m-2" id="usr" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Subiect">
                    <!--				<input type="text" name="topic_name" value="--><?php //echo $topic_name; ?><!--" placeholder="Topic">-->
                    <!-- if editing topic, display the update button instead of create button -->
                    <?php if ($isEditingTopic === true): ?>
                        <button type="submit" class="btn btn-dark ml-2" name="update_topic">Actualizează</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-dark ml-2" name="create_topic">Salvează subiect</button>
                    <?php endif ?>
                </form>
                <br>
                <!-- // Middle form - to create and edit -->

                <!-- Display records from DB-->
                <div class="table-div">
                    <!-- Display notification message -->
                    <?php include(INCLUDE_PATH . '/layouts/messages.php') ?>
                    <?php if (empty($topics)): ?>
                        <h1>Nu sunt subiecte în baza de date.</h1>
                    <?php else: ?>
                        <h4>Tabel subiecte</h4>
                        <table class="table table-sm table-dark table-hover table-bordered">
                            <thead>
                            <th>N</th>
                            <th>Nume subiect</th>
                            <th class="text-center" colspan="2">Acțiune</th>
                            </thead>
                            <tbody>
                            <?php foreach ($topics as $key => $topic): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $topic['name']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-success" href="topics.php?edit-topic=<?php echo $topic['id'] ?>">
                                            <i class="fas fa-pen-fancy"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php endif ?>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Ștergere subiect</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Această acțiune are consecințe ireversibile iar datele nu vor mai putea fi recuperate! Sunteți sigur că doriți să ștergeți acest subiect?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <a href="topics.php?delete-topic=<?php echo $topic['id'] ?>" class="btn btn-danger">
                                    Da, șterge!
                                </a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Anulează</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <?php include(ROOT_PATH . '/admin/menu.php') ?>
            </div>
        </div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>