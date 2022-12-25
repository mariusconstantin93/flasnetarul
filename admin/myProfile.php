<?php include('../config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/common_functions.php'); ?>
<?php
$sql = "SELECT id, firstname, role_id, lastname, username, email, profile_picture FROM users WHERE id=?";
$user = getSingleRecord($sql, 'i', [$_SESSION['user']['id']]);
$roles = getMultipleRecords("SELECT * FROM roles");
$user_id = $user['id'];
$lastname = $user['lastname'];
$firstname = $user['firstname'];
$username = $user['username'];
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
        <h2 class="text-center">Profilul meu</h2>
    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
        <hr>
        <div class="row mx-auto">
            <div class="col-sm-4" style="text-align: center;">
                <h5><?php echo $lastname, " ", $firstname; ?></h5>
                <?php if (isset($profile_picture)): ?>
                    <img src="<?php echo BASE_URL . '/assets/images/' . $profile_picture; ?>" id="profile_img" style="height: 175px; border-radius: 50%" alt="">
                <?php else: ?>
                    <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 150px; border-radius: 50%" alt="">
                    <p>Editează-ți profilul pentru a-ți seta imaginea de profil</p>
                <?php endif; ?>
            </div>
            <div class="col-sm-4 mt-5">
                <h6>Nume de utilizator:</h6>
                <p><?php echo $username; ?></p>
                <h6>Adresa de email:</h6>
                <p><?php echo $email; ?></p>
                <h6>Tip de utilizator:</h6>
                <?php if ($_SESSION['user']['role_id'] == 1): ?>
                    <p>Admin</p>
                <?php elseif ($_SESSION['user']['role_id'] == 2): ?>
                    <p>Autor</p>
                <?php elseif ($_SESSION['user']['role_id'] == 3): ?>
                    <p>Editor</p>
                <?php else: ?>
                    <p>User</p>
                <?php endif ?>
            </div>
            <div class="col-sm-4 mt-5">
                <form>
                    <div class="form-group">
                        <a class="btn btn-dark" href="editUserProfile.php">Editează profilul</a>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-danger" href="changePassword.php">Schimbă parola</a>
                    </div>
                </form>
            </div>
        </div>
        <br>
        </div>
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>