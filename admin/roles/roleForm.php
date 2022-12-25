<?php include('../../config.php') ?>
<?php require_once '../middleware.php'; ?>
<?php include(ROOT_PATH . '/includes/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/roles/roleLogic.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Panou de control - Creare funcție nouă </title>
</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
<div class="container shadow mt-5 mb-3">
    <a href="roleList.php" class="btn btn-primary">
        <i class="fas fa-chevron-left"></i>
        Funcții
    </a>
    <hr>
    <div class="row">
        <div class="col-sm-9">
            <form class="form" action="roleForm.php" method="post">
                <?php if ($isEditting === true): ?>
                    <h1 class="text-center">Actualizare funcție</h1>
                <?php else: ?>
                    <h1 class="text-center">Creare funcție</h1>
                <?php endif; ?>
                <br />

                <?php if ($isEditting === true): ?>
                    <input type="hidden" name="role_id" value="<?php echo $role_id ?>">
                <?php endif; ?>
                <div class="form-group <?php echo isset($errors['name']) ? 'has-error': '' ?>">
                    <label class="control-label">Role name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
                    <?php if (isset($errors['name'])): ?>
                        <span class="help-block"><?php echo $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo isset($errors['description']) ? 'has-error': '' ?>">
                    <label class="control-label">Description</label>
                    <textarea name="description" value="<?php echo $description; ?>"  rows="3" cols="10" class="form-control"><?php echo $description; ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <span class="help-block"><?php echo $errors['description'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <?php if ($isEditting === true): ?>
                        <button type="submit" name="update_role" class="btn btn-primary">Update Role</button>
                    <?php else: ?>
                        <button type="submit" name="save_role" class="btn btn-success">Save Role</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <?php include(ROOT_PATH . '/admin/menu.php') ?>
        </div>
    </div>
</div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
</body>
</html>