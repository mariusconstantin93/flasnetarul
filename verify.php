<?php
require_once('config.php');
//print_r($_GET);
$key = $_GET['key'];
$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id=$id AND verification_key='$key' AND active=0";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if($count == 1){
	$usql = "UPDATE `users` SET active=1 WHERE id=$id";
	$ures = mysqli_query($conn, $usql);
	if($ures){
		$smg = "Contul a fost activat cu succes";
	}else{
		$fmsg = "Activarea contului a eșuat, contactează-ne la admin@flasnetarul.ro!";
	}
}else{
	$fmsg = "cheia nu poate fi găsită în baza de date";
}

?>

<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<title>Flașnetarul.ro | Verificarea utilizatorului</title>

</head>
<body>
<?php include(INCLUDE_PATH . "/layouts/navbar.php") ?>
	<div class="container mt-5">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    </div>
<?php include(INCLUDE_PATH . "/layouts/footer.php") ?>
</body>
</html>