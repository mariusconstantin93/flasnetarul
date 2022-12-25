<?php include('config.php'); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>


<title>Flașnetarul | Înregistrare </title>

<script type="text/javascript">

    $(document).ready(function() {
        $('#usernameLoading').hide();
        $('#username').keyup(function(){
            $('#usernameLoading').show();
            $.post('check.php', {
                username: $('#username').val()
            }, function(response){
                $('#usernameResult').fadeOut();
                setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
            });
            return false;
        });
    });

    function finishAjax(id, response) {
        $('#usernameLoading').hide();
        $('#'+id).html(unescape(response));
        $('#'+id).fadeIn();
    } //finishAjax
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<body>
<?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
<div class="container-fluid shadow mb-3 mt-4" style="max-width: 1599.98px;">
            <form action="signup.php" method="post" enctype="multipart/form-data">
                <div class="col-md-4 mx-auto mb-2">
                    <h2 class="text-center">Înregistrare</h2>
                    <?php include(INCLUDE_PATH . "/layouts/messages.php") ?>
                    <div class="input-group <?php echo isset($errors['username']) ? 'has-error' : '' ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Utilizator" id="username" aria-describedby="inputGroupPrepend2" value="<?php echo $username; ?>">
                        <?php if (isset($errors['username'])): ?>
                            <span class="help-block"><?php echo $errors['username'] ?></span>
                        <?php endif; ?>
                        <span id="usernameLoading" class="input-group-addon"><img src="loading.gif" height="30px" alt="Ajax Indicator" /></span>
                    </div>
                    <div class="mt-2"><span id="usernameResult"></span></div>
                </div>
                <div class="col-md-4 mx-auto mb-2 <?php echo isset($errors['email']) ? 'has-error' : '' ?>">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                    <?php if (isset($errors['email'])): ?>
                        <span class="help-block"><?php echo $errors['email'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mx-auto mb-2 <?php echo isset($errors['password']) ? 'has-error' : '' ?>">
                    <input type="password" name="password" class="form-control" placeholder="Parola">
                    <?php if (isset($errors['password'])): ?>
                        <span class="help-block"><?php echo $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 mx-auto mb-2 <?php echo isset($errors['passwordConf']) ? 'has-error' : '' ?>">
                    <input type="password" name="passwordConf" class="form-control" placeholder="Parola din nou">
                    <?php if (isset($errors['passwordConf'])): ?>
                        <span class="help-block"><?php echo $errors['passwordConf'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group" style="text-align: center;">
                    <img src="http://via.placeholder.com/150x150" id="profile_img" style="height: 100px; border-radius: 50%" alt="">
                    <!-- hidden file input to trigger with JQuery  -->
                    <input type="file" name="profile_picture" id="profile_input" value="" style="display: none;">
                    <p>Selectați o fotografie de profil</p>
                </div>
                <div class="col-md-4 mx-auto mb-2">
                    <div class="g-recaptcha" data-sitekey="6Lc8ym0UAAAAAOful3Jfj5Gk8vPRKws5UTzL2OB_"></div>
                </div>
                <div class="col-md-4 mx-auto">
                    <button class="btn btn-danger btn-block mb-2" type="submit" name="signup_btn">Înregistrare</button>
                    <br>
                    <h6 class="text-center">Ai deja un cont?</h6>
                    <a class="btn btn-primary btn-block" href="login.php">Logare</a>
                </div>
            </form>
    <br>
</div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
<script type="text/javascript" src="assets/js/display_profile_image.js"></script>