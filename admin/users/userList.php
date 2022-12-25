<?php include('../../config.php') ?>
<?php require_once '../middleware.php'; ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php') ?>
<?php
$adminUsers = getAdminUsers();
$allUsers = getAllUsers();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panou de control - Administrare Utilizatori </title>
</head>
<?php if ($_SESSION['user']['role_id'] == 1):?>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
<div class="container shadow mt-5 mb-3">
    <a href="userForm.php" class="btn btn-success">
        <i class="fas fa-plus"></i>
        Creare admin nou
    </a>
    <a href="normalUserForm.php" class="btn btn-success">
        <i class="fas fa-plus"></i>
        Creare utilizator nou
    </a>
        <hr>
    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
    <div class="row">
        <div class="col-sm-9">
            <h1 class="text-center">Administrare Utilizatori</h1>
            <br />
            <div class="table-responsive">
                <h4>Admini</h4>
                <?php if (isset($users)): ?>
                    <table class="table table-sm table-dark table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>N</th>
                            <th>Utilizator</th>
                            <th>Funcție</th>
                            <th colspan="2" class="text-center">Acțiune</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($adminUsers as $key => $value): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo $value['role']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin/users/userForm.php?edit_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-fancy"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h2 class="text-center">No users in database</h2>
                <?php endif; ?>
                <br>
                <h4>Utilizatori</h4>
                <?php if (isset($users)): ?>
                    <table class="table table-sm table-dark table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>N</th>
                            <th>Utilizator</th>
                            <th>Funcție</th>
                            <th colspan="2" class="text-center">Acțiune</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($allUsers as $key => $value): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['username'] ?></td>
                                <td><?php echo "user"; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin/users/normalUserForm.php?edit_user=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-fancy"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h2 class="text-center">No users in database</h2>
                <?php endif; ?>

                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Ștergere utilizator</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Această acțiune are consecințe ireversibile iar datele nu vor mai putea fi recuperate! Sunteți sigur că doriți să ștergeți acest utilizator?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" class="btn btn-danger">
                                    Da, șterge!
                                </a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Anulează</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
    <br>
</div>
</body>
<?php else: header("location: " . BASE_URL . "index.php") ?>
<?php endif ?>
</html>