<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>

<body>
<?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
    <div class="container-fluid shadow mb-3 mt-4" style="max-width: 1599.98px;">
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="col-md-4 mx-auto mb-2 mt-5">
                <h2 class="text-center">Logare</h2>
                <br/>
                <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                <div class="input-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Utilizator sau Email" id="password" aria-describedby="inputGroupPrepend2" value="<?php echo $username; ?>">
                    <?php if (isset($errors['username'])): ?>
                        <span class="help-block"><?php echo $errors['username'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 mx-auto mb-2 <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                <input type="password" name="password" id="password" class="form-control" placeholder="Parola">
                <?php if (isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password'] ?></span>
                <?php endif; ?>
            </div>
            <div class="col-md-4 mx-auto">
                <button class="btn btn-danger btn-block mb-2" type="submit" name="login_btn">Login</button>
                <h6 class="text-center"><small>(Numai adminii au acces la această funcție)</small></h6>
                <br>
                <!--<h6 class="text-center">Nu ai un cont?</h6>-->
                <!--<a class="btn btn-primary btn-block" href="signup.php">ﾃ始registrare</a>-->
            </div>
        </form>
        <br>
    </div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>