<?php
require_once('config.php');
$username = $_POST['username'];
$usernamesql = "SELECT * FROM `users` WHERE username='$username'";
$usernameres = mysqli_query($conn, $usernamesql);
$count = mysqli_num_rows($usernameres);
if($count == 1){
    echo  "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Numele de utilizator nu este disponibil!";
}else{
    echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Nume de utilizator disponibil!";
}
?>