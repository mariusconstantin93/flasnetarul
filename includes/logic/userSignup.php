<?php include('../../config.php'); ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<?php
// grab recaptcha library
require_once "recaptchalib.php";
// your secret key
$secret = "6Lc8ym0UAAAAAEsycSonyh0N2aw4K3gxvSR8PUeN";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// variable declaration
$username = "";
$email  = "";
$errors  = [];
// SIGN UP USER
if (isset($_POST['signup_btn'])) {

    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }

    if ($response != null && $response->success) {
        // validate form values
        $errors = validateUser($_POST, ['signup_btn']);

        // receive all input values from the form. No need to escape... bind_param takes care of escaping
        $username = $_POST['username'];
        $verification_key = md5($username);
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt the password before saving in the database
        $profile_picture = uploadProfilePicture();
        $created_at = date('Y-m-d H:i:s');

        // if no errors, proceed with signup
        if (count($errors) === 0) {
            // insert user into database
            $query = "INSERT INTO users SET username=?, email=?, password=?, profile_picture=?, created_at=?, verification_key=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssssss', $username, $email, $password, $profile_picture, $created_at, $verification_key);
            $result = $stmt->execute();
            if ($result) {
                $id = mysqli_insert_id($conn);
                require 'PHPMailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;
                // $mail->SMTPDebug = 4;  Enable verbose debug output
                $mail->isSMTP();
                $mail->SMTPSecure = 'ssl'; // Set mailer to use SMTP
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Host = 'flasnetarul.ro'; // Specify main and backup SMTP servers
                $mail->Username = 'flasneta'; // SMTP username
                $mail->Password = '***NemerteaGT1993***'; // SMTP password
                $mail->Port = 465;
                $mail->SetLanguage("ro", "PHPMailer/language");
                $mail->CharSet ="utf-8";
                $mail->Encoding="base64";
                $mail->setFrom('admin@flasnetarul.ro', 'Flasnetarul.ro');
                $mail->addAddress($email); // Add a recipient
                $mail->isHTML(true); // Set email format to HTML

                $mail->Subject = 'Activează contul';
                $mail->Body    = "Salut, <br><br>Pentru a-ți activa contul te rog să dai click pe următorul link: <br><a href='https://flasnetarul.ro/verify.php?key=$verification_key&id=$id'>Activează</a><br><br>Cu drag,<br>Flasnetarul.ro";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                if(!$mail->send()) {
                    ?>
                    <?php require_once( INCLUDE_PATH . "/layouts/head_section.php");?>
                    <html>
                    <body>
                    <?php include(INCLUDE_PATH . "/layouts/navbar.php");?>
                    <div class="container shadow mt-5 mb-3">
                        <div class="alert alert-success mt-5 mb-5">
                            <strong>Mesajul nu poate fi expediat!</strong>
                            <?php echo 'Mailer Error: ' . $mail->ErrorInfo; ?>
                        </div>
                    </div>
                    <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
                    </body>
                    </html>
                    <?php
                } else {
                    ?>
                    <?php require_once( INCLUDE_PATH . "/layouts/head_section.php");?>
                    <html>
                    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <meta http-equiv="refresh" content="10;url=https://flasnetarul.ro/logout.php">
                    </head>
                        <body>
                        <?php include(INCLUDE_PATH . "/layouts/navbar.php");?>
                        <div class="container shadow mt-5 mb-3">
                            <div class="alert alert-success mt-5 mb-3">
                                <strong>Un link de activare a contului a fost expediat pe adresa dumneavoastră de email. Verificați inbox-ul!</strong>
                            </div>
                            <div class="alert alert-info mb-2">
                                Veți fi redirecționat în 10 secunde!
                            </div>
                        </div>
                        <?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
                        </body>
                    </html>
                    <?php
                }
                $user_id = $stmt->insert_id;
                $stmt->close();
                loginById($user_id); // log user in
            } else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
            }
        }
    }
}

// USER LOGIN
if (isset($_POST['login_btn'])) {
    // validate form values
    $errors = validateUser($_POST, ['login_btn']);
    $username = $_POST['username'];
    $password = $_POST['password']; // don't escape passwords.

    if (empty($errors)) {
        $sql = "SELECT * FROM users WHERE (username=? OR email=?) AND ((username=? OR email=?) AND active=1) LIMIT 1";
        $user = getSingleRecord($sql, 'ssss', [$username, $username, $username, $username]);

        if (!empty($user)) { // if user was found
            if (password_verify($password, $user['password'])) { // if password matches
                // log user in
                loginById($user['id']);
            }
            else { // if password does not match
                $_SESSION['error_msg'] = "Parola nu este corectă!";
            }
        } else { // if no user found
            $_SESSION['error_msg'] = "Parola sau utilizatorul sunt incorecte sau contul nu a fost activat!";
        }
    }
}