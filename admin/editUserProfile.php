<?php include('../config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/users/userLogic.php'); ?>
<?php
$sql = "SELECT id, username, lastname, firstname, email, profile_picture FROM users WHERE id=?";
$user = getSingleRecord($sql, 'i', [$_SESSION['user']['id']]);
$roles = getMultipleRecords("SELECT * FROM roles");
$user_id = $user['id'];
$username = $user['username'];
$lastname = $user['lastname'];
$firstname = $user['firstname'];
$email = $user['email'];
$profile_picture = $user['profile_picture'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editare profil</title>
    <?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
</head>
<body>
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>

<div class="container-fluid shadow-sm mt-5 mb-3" style="max-width: 1365.98px;">
        <form action="editUserProfile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <h2 class="text-center">Editare profil</h2>
                <hr>
                <div class="col-sm-4 mx-auto" style="text-align: center;">
                    <?php if (isset($profile_picture)): ?>
                        <img src="<?php echo BASE_URL . '/assets/images/' . $profile_picture; ?>" id="profile_img" style="height: 150px; border-radius: 50%" alt="">
                    <?php else: ?>
                        <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 150px; border-radius: 50%" alt="">
                    <?php endif; ?>
                    <h6>Schimbă fotografia de profil</h6>
                    <!-- hidden file input to trigger with JQuery  -->
                    <input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">

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
                        <label class="control-label">Nume de utilizator</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                        <?php if (isset($errors['username'])): ?>
                            <span class="help-block text-danger"><?php echo $errors['username'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
                        <label class="control-label">Adresa de email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                        <?php if (isset($errors['email'])): ?>
                            <span class="help-block text-danger"><?php echo $errors['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ($_SESSION['user']['role_id'] == 1): ?>
                        <div class="form-group <?php echo isset($errors['role_id']) ? 'has-error' : '' ?>">
                            <label class="control-label">Funcție</label>
                            <select class="form-control" name="role_id" >
                                <option value="" ></option>
                                <?php foreach ($roles as $role): ?>
                                    <?php if ($role['name'] === $_SESSION['user']['role']): ?>
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
                    <?php endif ?>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Această acțiune are consecințe ireversibile iar datele dumneavoastră nu vor mai putea fi recuperate! Sunteți sigur că doriți să ștergeți contul?
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                        <a href="<?php echo BASE_URL ?>admin/users/userForm.php?delete_user=<?php echo $value['id'] ?>" name="delete_user" class="btn btn-danger">
                                            Da, șterge!
                                        </a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Anulează</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
<!--                        <button type="submit" name="delete_user" class="btn btn-danger pull-right">Delete Your Account</button>-->
                        <button type="submit" name="update_profile" class="btn btn-success">Update Profile</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            Șterge contul
                        </button>
                    </div>
                </div>
        </form>
    <br>
</div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
<script type="text/javascript" src="../assets/js/display_profile_image.js"></script>