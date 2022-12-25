<?php include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php
// Get posts under a particular topic

function getPublishedPostsSocialPage1($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 0, 12";
    $result = mysqli_query($conn, $sql);
    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getPostTopic($post['id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}

if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getPublishedPostsSocialPage1($topic_id);
}
?>
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">
<link href="https://flasnetarul.ro/galerie.css" rel="stylesheet">
<script src="https://flasnetarul.ro/galerie.js"></script>
<title>Flașnetarul | <?php echo getTopicNameById($topic_id); ?> </title>

<meta property="og:url"           content="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:image"         content="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" />
</head>
<body>
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQJXM2G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    			
<!-- Navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // Navbar -->
<div class="container-fluid shadow mb-3 mt-4" style="max-width: 1599.98px;">

    <!-- content -->
    <div class="row">
        <div class="col-sm-9 p-4 mt-3">
            <h3 class="text-dark text-center mt-3" style="font-family: 'Droid Sans', sans-serif;
    font-weight: bold;">
                <?php echo getTopicNameById($topic_id); ?>
            </h3>

            <hr>
            <br>
            <?php if (($topic_id==1) OR ($topic_id==2) OR ($topic_id==3)): ?>
                <div class="row mt-2">
                <?php foreach ($posts as $post): ?>
                    <div class="col-sm-4 mb-4">
                        <div class="box">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="post_image img-fluid">
                            <div class="text-white" style="background-color: black"><?php if (isset($post['topic']['name'])): ?>
                                <a
                                    href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
                                    class="badge badge-danger ml-1 mb-1 mt-1">
                                    <?php echo $post['topic']['name'] ?>
                                </a>
                            <?php endif ?>
                            <i class="far fa-calendar-alt ml-1" style="font-size: small;"></i> <span><?php echo date('d F Y', strtotime($post["created_at"])); ?></span>
                            </div>
                            <div class="link_articole">
                                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                    <div class="caption"><h6><strong><?php echo $post['title'] ?></strong></h6></div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>   
            <?php else: ?>
			
		<div class="row mt-2">			

	            <div class="demo-gallery">
	                
                <ul id="lightgallery" class="list-unstyled row">
                    <?php
                    if (isset($_GET['slide'])) {
    $slide_id = $_GET['slide'];}
    if ($slide_id = 0){
        echo "ceva";
    }
							$posts = getPublishedImages();
							foreach ($posts as $post): ?>
                    <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-responsive="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" data-src="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>">
                        <a href="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>">
                            <img class="img-responsive" src="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>">
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
                
            </div>
            <script>
            $(document).ready(function(){
                $('#lightgallery').lightGallery(); 
            });
        </script>
	
				</div>   
            <?php endif ?>
            
            <!-- Paginatie -->
            
            <?php if ($topic_id==1): ?>
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">Prima</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">1</a></li>
    <!--<li class="page-item disabled"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=1'?>">2</a></li>-->
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
            
            <?php if ($topic_id==2): ?>
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=2'?>">Prima</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=2'?>">1</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=2'?>">2</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=2'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
            
            <?php if ($topic_id==3): ?>
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">Prima</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">1</a></li>
    <!--<li class="page-item disabled"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=3'?>">2</a></li>-->
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
            
            <?php if ($topic_id==4): ?>
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">Prima</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">1</a></li>
    <!--<li class="page-item disabled"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=4'?>">2</a></li>-->
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
        </div>

        <div class="col-sm-3 p-2">
            
        </div>

    </div>
</div>

<!-- Footer -->
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>
<!-- // Footer -->