<?php include('../config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php'); ?>
<?php
$sql = "SELECT id, username FROM users WHERE id=?";
$user = getSingleRecord($sql, 'i', [$_SESSION['user']['id']]);
$roles = getMultipleRecords("SELECT * FROM roles");
$user_id = $user['id'];
$username = $user['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Schimbare parolă</title>
    <?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
</head>
<body>
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>

<div class="container-fluid shadow-sm mt-5 mb-3" style="max-width: 1365.98px;">
    <form action="changePassword.php" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Schimbare parolă</h2>
        <hr>
        <div class="col-sm-4 mx-auto" style="text-align: center;">
            <div class="form-group <?php echo isset($errors['passwordOld']) ? 'has-error' : '' ?>">
                <label class="control-label">Parola veche</label>
                <input type="password" name="passwordOld" class="form-control">
                <?php if (isset($errors['passwordOld'])): ?>
                    <span class="help-block"><?php echo $errors['passwordOld'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                <label class="control-label">Parola nouă</label>
                <input type="password" name="password" class="form-control">
                <?php if (isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                <label class="control-label">Parola nouă din nou</label>
                <input type="password" name="passwordConf" class="form-control">
                <?php if (isset($errors['passwordConf'])): ?>
                    <span class="help-block"><?php echo $errors['passwordConf'] ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" name="change_password" class="btn btn-success">Schimbă parola</button>
            </div>
        </div>
    </form>
    <br>
</div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>