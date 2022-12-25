<?php include('../../config.php'); ?>
<?php include(INCLUDE_PATH . "/logic/common_functions.php"); ?>
<?php
include('mailConfig.php');
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
                $user_id = $stmt->insert_id;
                $stmt->close();
                loginById($user_id); // log user in

                $id = mysqli_insert_id($connection);
                require 'PHPMailer/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                $mail->isSMTP();
				$mail->Host = $smtphost;
                $mail->SMTPAuth = true;
				$mail->Username = $smtpuser;
				$mail->Password = $smtppass;
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('admin@flanetarul.ro', 'Flasnetarul');
                $mail->addAddress('admin@flanetarul.ro', 'Minitehnicus');

                $mail->Subject = 'Verifică email-ul';
                $mail->Body    = "https://flasnetarul.ro/verify.php?key=$verification_key&id=$id";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    echo 'Mesajul nu poate fi expediat.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Mesajul a fost expediat';
                }
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
        $sql = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $user = getSingleRecord($sql, 'ss', [$username, $username]);

        if (!empty($user)) { // if user was found
            if (password_verify($password, $user['password'])) { // if password matches
                // log user in
                loginById($user['id']);
            } else { // if password does not match
                $_SESSION['error_msg'] = "Parola sau utilizatorul sunt incorecte!";
            }
        } else { // if no user found
            $_SESSION['error_msg'] = "Parola sau utilizatorul sunt incorecte!";
        }
    }
}