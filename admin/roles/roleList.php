<?php include('../../config.php') ?>
<?php require_once '../middleware.php'; ?>
<?php include(ROOT_PATH . '/admin/roles/roleLogic.php') ?>
<?php
$roles = getAllRoles();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panou de control - Administrare Funcții </title>
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
<div class="container shadow mt-5 mb-3">
    <a href="roleForm.php" class="btn btn-success">
        <i class="fas fa-plus"></i>
        Creare funcție nouă
    </a>
    <hr>
    <div class="row">
        <div class="col-sm-9">
            <h1 class="text-center">Administrare Funcții</h1>
            <br />
            <div class="table-responsive">
                <?php if (isset($roles)): ?>
                    <table class="table table-sm table-dark table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>N</th>
                            <th>Numele frunției</th>
                            <th colspan="3" class="text-center">Acțiune</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($roles as $key => $value): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin/roles/assignPermissions.php?assign_permissions=<?php echo $value['id'] ?>" class="btn btn-sm btn-info">
                                        permisiuni
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin/roles/roleForm.php?edit_role=<?php echo $value['id'] ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-pen-fancy"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo BASE_URL ?>admin/roles/roleForm.php?delete_role=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <h2 class="text-center">No roles in database</h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
    <br>
</div>
</body>
</html>