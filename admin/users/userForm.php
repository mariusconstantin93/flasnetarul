<?php include('../../config.php'); ?>
<?php require_once '../middleware.php'; ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php') ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php'); ?>
<?php
$roles = getAllRoles();
$allUsers = getAllUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panou de control - Editare Utilizator</title>
</head>
<?php if ($_SESSION['user']['role_id'] == 1):?>
<body>
<?php include(INCLUDE_PATH . "/layouts/admin_navbar.php") ?>
<div class="container shadow mt-5 mb-3">
    <div class="row">
        <div class="col-sm-4 col-md-offset-4 mx-auto">
            <a href="userList.php" class="btn btn-primary" style="margin-bottom: 5px;">
                <i class="fas fa-chevron-left"></i>
                Utilizatori
            </a>
            <br>

            <form class="form border p-2" action="userForm.php" method="post" enctype="multipart/form-data">
                <?php if ($isEditing === true ): ?>
                    <h2 class="text-center">Actualizare Utilizator</h2>
                <?php else: ?>
                    <h2 class="text-center">Creare Utilizator</h2>
                <?php endif; ?>
                <hr>
                <!-- if editting user, we need that user's id -->
                <?php if ($isEditing === true): ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <?php endif; ?>
                <div class="form-group mt-5">
                    <label class="control-label">Nume</label>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
                    <?php if (isset($errors['lastname'])): ?>
                        <span class="help-block text-danger"><?php echo $errors['lastname'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="control-label">Prenume</label>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control">
                    <?php if (isset($errors['firstname'])): ?>
                        <span class="help-block text-danger"><?php echo $errors['firstname'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                    <label class="control-label">Utilizator</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                    <?php if (isset($errors['username'])): ?>
                        <span class="help-block"><?php echo $errors['username'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
                    <label class="control-label">Adresa de Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                    <?php if (isset($errors['email'])): ?>
                        <span class="help-block"><?php echo $errors['email'] ?></span>
                    <?php endif; ?>
                </div>

                <?php if ($isEditing === false): ?>
                <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                    <label class="control-label">Parola nouă</label>
                    <input type="password" name="password" class="form-control">
                    <?php if (isset($errors['password'])): ?>
                        <span class="help-block"><?php echo $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="form-group <?php echo isset($errors['role_id']) ? 'has-error' : '' ?>">
                    <label class="control-label">Funcție</label>
                    <select class="form-control" name="role_id">
                        <option value="" ></option>
                        <?php foreach ($roles as $role): ?>
                            <?php if ($role['id'] === $role_id): ?>
                                <option value="<?php echo $role['id'] ?>" selected><?php echo $role['name'] ?></option>
                            <?php else: ?>
                                <option value="<?php echo $role['id'] ?>"><?php echo $role['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['role_id'])): ?>
                        <span class="help-block"><?php echo $errors['role_id'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group" style="text-align: center;">
                    <?php if (!empty($profile_picture)): ?>
                        <img src="<?php echo BASE_URL . '/assets/images/' . $profile_picture; ?>" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
                    <?php else: ?>
                        <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
                    <?php endif; ?>
                    <input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
                </div>
                <div class="form-group">
                    <?php if ($isEditing === true): ?>
                        <button type="submit" name="update_user" class="btn btn-success btn-block btn-lg">Actualizare Utilizator</button>
                    <?php else: ?>
                        <button type="submit" name="save_user" class="btn btn-success btn-block btn-lg">Salvează Utilizator</button>
                    <?php endif; ?>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../assets/js/display_profile_image.js"></script>
<?php else: header("location: " . BASE_URL . "index.php") ?>
<?php endif ?>