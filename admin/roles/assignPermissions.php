<?php include('../../config.php') ?>
<?php include(ROOT_PATH . '/admin/roles/roleLogic.php') ?>
<?php require_once '../middleware.php'; ?>
<?php
$permissions = getAllPermissions();
if (isset($_GET['assign_permissions'])) {
    $role_id = $_GET['assign_permissions']; // The ID of the role whose permissions we are changing
    $role_permissions = getRoleAllPermissions($role_id); // Getting all permissions belonging to role

    // array of permissions id belonging to the role
    $r_permissions_id = array_column($role_permissions, "id");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panou de control - Atribuire permisiuni </title>
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
<div class="container shadow mt-5 mb-3">
    <a href="roleList.php" class="btn btn-success">
        <i class="fas fa-chevron-left"></i>
        Funcții
    </a>
    <hr>
    <div class="row">
        <div class="col-sm-9">
            <h1 class="text-center">Atribuire permisiuni</h1>
            <br />
            <?php if (count($permissions) > 0): ?>
                <form action="assignPermissions.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>N</th>
                            <th>Funcție</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($permissions as $key => $value): ?>
                            <tr class="text-center">
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td>
                                    <input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
                                    <!-- if current permission id is inside role's ids, then check it as already belonging to role -->
                                    <?php if (in_array($value['id'], $r_permissions_id)): ?>
                                        <input type="checkbox" name="permission[]" value="<?php echo $value['id'] ?>" checked>
                                    <?php else: ?>
                                        <input type="checkbox" name="permission[]" value="<?php echo $value['id'] ?>" >
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3">
                                <button type="submit" name="save_permissions" class="btn btn-block btn-success">Salvează permisiunile</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            <?php else: ?>
                <h2 class="text-center">Nu sunt permisiuni in baza de date!</h2>
            <?php endif; ?>
        </div>
        <div class="col-sm-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
    <br>
</div>
</body>
</html>