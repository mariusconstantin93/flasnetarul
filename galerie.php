<?php  include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>

<?php
if (isset($_GET['post-slug'])) {
    $post = getImage($_GET['post-slug']);
    $post_id = $post['id'];
}
$topics = getAllTopics();
$sql = "SELECT id, profile_picture FROM users WHERE id=?";
$user = getSingleRecord($sql, 'i', [$_SESSION['user']['id']]);
$profile_picture = $user['profile_picture'];

$sql = "UPDATE imagini SET visits = visits+1 WHERE id = $post_id";
    $conn->query($sql);

    $sql = "SELECT visits FROM imagini WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
?>

<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<title>Flașnetarul | Imagini</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
<meta property="og:url"           content="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Flashnetarul | Imagini" />
<meta property="og:image"         content="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" />
<meta property="og:image:width"         content="600" />
<meta property="og:image:height"         content="315" />
<style>
    .no-copy {
        -webkit-user-select: none;  /* Chrome all / Safari all */
        -moz-user-select: none;     /* Firefox all */
        -ms-user-select: none;      /* IE 10+ */
        user-select: none;          /* Likely future */
    }

    .text_articol {
        font-family: Georgia,Times New Roman,Times,serif;
        font-size: 1.100rem;
        line-height: 1.50;
        text-align: left;
    }
</style>
</head>

<body>

<!-- Navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // Navbar -->
<div class="container-fluid shadow" style="max-width: 1599.98px;">

    <div class="row" >
        <!-- Page wrapper -->

        <!-- full post div -->
        <?php if (($post['published'] == false) AND (!(isAdmin($_SESSION['user']['id'])))): ?>
            <h3 class="text-center text-danger">Ne pare rău, această poză nu este publicată!</h3>
        <?php else: ?>
            <div class="col-sm-6 no-copy mt-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div style="color: black; font-size: small;"><i class="fas fa-pen-fancy mt-3" style="font-size: large;"></i>&nbsp; &nbsp;<?php $post['author'] = getPostAuthorById($post['user_id']);
                            echo $post['author']; ?>
                        </div>                      
                        <div style="color: black; font-size: small;"><i class="far fa-calendar-alt" style="font-size: large;"></i>&nbsp; &nbsp;<?php echo date('d F Y', strtotime($post["created_at"])); ?></div>
                        <div style="color: black; font-size: small;"><i class="far fa-eye" style="font-size: large;"></i>&nbsp; &nbsp;<?php echo $visits; ?></div>
                        <div class="mb-3">
                            <a href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=' . $post['topic']['id'] ?>" class="badge badge-dark">
                                <?php echo $post['topic']['name'] ?>
                            </a>
                        </div>
                         <div class="d-flex justify-content-center">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid mb-4">
                        </div>
                        <div class="content mt-4">
                            <a href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=' . $post['topic']['id'] ?>" role="button" class="btn btn-danger">Înapoi la galerie</a>
                        </div>
<div class="float-right">                       
                            <div class="fb-share-button" data-href="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                            </div>
                    </div>
                </div>
                    
                    <h5 class="text-center">Comentarii</h5>
                    <br>
                    <div class="fb-comments" data-href="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" data-width="" data-numposts="20"></div>
                
            </div>
        <?php endif ?>
        
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6 mt-5">
            <div class="card bg-light text-dark mb-3 mx-auto">
                <div class="card-body p-2 font-weight-bold text-center">Alte imagini:</div>
            </div>

            <?php
            $posts = getRandomPublishedImages();
            foreach ($posts as $post): ?>
                <div class="col-sm mb-4">
                    <div class="box">
                    <a href="galerie.php?post-slug=<?php echo $post['slug']; ?>">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="post_image img-fluid">
                    </a>
                    </div>
                </div>
            <?php endforeach ?>

            <?php
            $posts = getRandomPublishedImages();
            foreach ($posts as $post): ?>
                <div class="col-sm mb-4">
                    <div class="box">
                        <a href="galerie.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="post_image img-fluid">
                        </a>
                    </div>
                </div>
            <?php endforeach ?>

            <?php
            $posts = getRandomPublishedImages();
            foreach ($posts as $post): ?>
                <div class="col-sm mb-4">
                    <div class="box">
                        <a href="galerie.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="post_image img-fluid">
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-sm-6">

        </div>
            </div>
            
        </div>
    </div>
</div>
<!-- // content -->

<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>