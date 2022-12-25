<?php include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>

<?php
// Get posts under a particular topic

if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = getPublishedPostsByTopicPage2($topic_id);
}
?>
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="cards-gallery.css">
<title>Flașnetarul | <?php echo getTopicNameById($topic_id); ?> </title>
</head>
<body>
    
<!-- Navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // Navbar -->
<div class="container-fluid shadow" style="max-width: 1599.98px;">

    <!-- content -->
    <div class="row">
        <div class="col-sm-9 p-2">
            <h3 class="text-dark text-center" style="font-family: 'Droid Sans', sans-serif;
    font-weight: bold;">
                <?php echo getTopicNameById($topic_id); ?>
            </h3>

            <hr>
            <br>
            <?php if (($topic_id==1) OR ($topic_id==2) OR ($topic_id==3) OR ($topic_id==5)): ?>
                <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-sm-4 mb-3">
                        <div class="card box rounded zoom">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid rounded-top">
                            </a>
                            <div class="link_articole py-1 mx-1 light border-bottom light">
                                <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                    <h6 class="mb-0 ml-1"><strong><?php echo $post['title'] ?></strong></h6>
                                </a>
                            </div>
                            
                            <div class="text-secondary rounded-bottom mx-1"><?php if (isset($post['topic']['name'])): ?>
                                <a
                                    href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=' . $post['topic']['id'] ?>"
                                    class="badge badge-light text-uppercase mb-1" style="position: relative; font-size: small;">
                                    <?php echo $post['topic']['name'] ?>
                                </a>
                            <?php endif ?>
                            <i class="far fa-eye" style="font-size: small;">  &nbsp;<span style="font-size: small;"><?php echo $post["visits"]; ?></span></i>
                            <i class="far fa-calendar-alt" style="font-size: small;">&nbsp;<span style="font-size: small;"><?php setlocale(LC_TIME, array('ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2')); echo strftime("%d %B %Y", strtotime($post["created_at"])); ?></span></i>
                            <i class="fas fa-pen-fancy" style="font-size: small;">&nbsp;<span style="font-size: small; font-weight: normal;"><?php $post['author'] = getPostAuthorById($post['user_id']);
                                    echo $post['author']; ?></span></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>   
            <?php else: ?>
			
		<div class="row">			
		<section class="gallery-block cards-gallery ">
	    <div class="container">
	        <div class="row">
	            <?php
							$posts = getPublishedImagPage2($topic_id);
							foreach ($posts as $post): ?>
	            <div class="col-md-6 col-lg-4 d-flex justify-content-center">
	                <div class="card border-0 transform-on-hover" style="width:231px; height: 121.275px; margin-bottom: 100px;">
	                	<a class="lightbox" href="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>">
	                		<img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="Card Image" class="card-img-top" style="width: 231px; height: 121.275px">
	                	</a>
	                    <div class="card-body">
	                        <div class="fb-like" data-href="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>

                            <div class="fb-share-button" data-href="https://flasnetarul.ro/galerie.php?post-slug=<?php echo $post['slug']; ?>" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
	                    </div>
	                </div>
	            </div>
	            <?php endforeach ?>
	        </div>
	    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>
				</div>   
            <?php endif ?>
			
 <!-- Paginatie -->
            
            <?php if ($topic_id==1): ?> <!-- politica -->
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">Prima</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=1'?>">1</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=1'?>">2</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_3.php?topic=1'?>">3</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_3.php?topic=1'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
            
            <?php if ($topic_id==2): ?> <!-- social -->
             
             <ul class="pagination justify-content-center">
        <li class="page-item mr-1"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=2'?>">Prima</a></li>
        
        <div class="dropdown show">
  <a class="btn dropdown-toggle border rounded-0 text-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Salt la pagina
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=2'?>">1</a>
    <a class="dropdown-item active" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=2'?>">2</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_3.php?topic=2'?>">3</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_4.php?topic=2'?>">4</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_5.php?topic=2'?>">5</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_6.php?topic=2'?>">6</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'filtered_posts_pg_7.php?topic=2'?>">7</a>
  </div>
</div>
        <li class="page-item ml-1"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_7.php?topic=2'?>">Ultima</a></li>
    </ul>
    
            <?php endif ?>
            
            <?php if ($topic_id==3): ?> <!-- stiinta -->
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">Prima</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=3'?>">1</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=3'?>">2</a></li>
    <li class="page-item disabled"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=3'?>">Ultima</a></li>
  </ul>
            <?php endif ?>
            
            <?php if ($topic_id==4): ?> <!-- imagini -->
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">Prima</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=4'?>">1</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=4'?>">2</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=4'?>">Ultima</a></li>
  </ul>
            <?php endif ?>

<?php if ($topic_id==5): ?> <!-- bancuri -->
             <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=5'?>">Prima</a></li>
    <li class="page-item"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=5'?>">1</a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=5'?>">2</a></li>
    <li class="page-item disabled"><a class="page-link" href="<?php echo BASE_URL . 'filtered_posts_pg_2.php?topic=5'?>">Ultima</a></li>
  </ul>
            <?php endif ?>

<!-- Sfarsit paginatie -->
        </div>

        <div class="col-sm-3">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6203121279300725"
     crossorigin="anonymous"></script>
<!-- flasnetarul -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6203121279300725"
     data-ad-slot="8379226238"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
        </div>

    </div>
</div>

<!-- Footer -->
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>
<!-- // Footer -->