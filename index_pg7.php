<?php include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>

<title>Flashnetarul - Toate articolele (pagina 7)</title>

<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'ro', parsetags: 'explicit'}
</script>

<style>
    .carousel-indicators li {
    background-color: red;
}
.carousel-indicators .active {
    background-color: yellow;
}
</style>
</head>
<body>
    
<!-- navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // navbar -->

<!-- Page content -->
<div class="container-fluid shadow mb-3 mt-4 bg-light" style="max-width: 1599.98px;">

    <div class="row">
        <div class="col-sm-9 p-4">
            <div id="myCarousel" class="carousel slide img-fluid mx-auto d-block mt-3" data-ride="carousel" data-interval="3000" style="width: 600px; height: 315px">

                <!--                 Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>

                <!--                     The slideshow -->
                <div class="carousel-inner">
                    <?php
                    $posts = getLastPublishedPostsByTopic($topic_id = 1);
                    foreach ($posts as $post): ?>
                        <div class="carousel-item active">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid mx-auto d-block" style="width: 600px; height: 315px">
                                <div class="carousel-caption p-0" style="background-color: black; opacity: 0.8;">
                                    <p style="opacity: 1;"><strong><?php echo $post['title'] ?></strong></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>

                    <?php
                    $posts = getLastPublishedPostsByTopic($topic_id = 2);
                    foreach ($posts as $post): ?>
                        <div class="carousel-item">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid mx-auto d-block" style="width: 600px; height: 315px">
                                <div class="carousel-caption p-0" style="background-color: black; opacity: 0.8;">
                                    <p style="opacity: 1;"><strong><?php echo $post['title'] ?></strong></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>

                    <?php
                    $posts = getLastPublishedPostsByTopic($topic_id = 3);
                    foreach ($posts as $post): ?>
                        <div class="carousel-item">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid mx-auto d-block" style="width: 600px; height: 315px">
                                <div class="carousel-caption p-0" style="background-color: black; opacity: 0.8;">
                                    <p style="opacity: 1;"><strong><?php echo $post['title'] ?></strong></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>

                <!--                 Left and right controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><i class="fas fa-angle-left" style="color: red; font-size: 32px"></i></a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next"><i class="fas fa-angle-right" style="color: red; font-size: 32px"></i></a>
            </div>

            <!-- Retrieve all posts from database  -->
            <?php $posts = getPublishedPostsPg7(); ?>

            <div class="card bg-secondary text-white m-4 mb-3">
                <div class="card-body p-2 border-left border-warning rounded font-weight-bold">Toate articolele (pagina 7)</div>
            </div>
            
            <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-sm-4 mb-4">
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
            
        <ul class="pagination justify-content-center">
        <!--<li class="page-item mr-1"><a class="page-link" href="<?php echo BASE_URL . 'index.php'?>">Prima</a></li>-->
        
        <div class="dropdown show">
  <a class="btn dropdown-toggle border rounded-0 text-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mergi la pagina
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index.php'?>">1</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg2.php'?>">2</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg3.php'?>">3</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg4.php'?>">4</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg5.php'?>">5</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg6.php'?>">6</a>
    <a class="dropdown-item active" href="<?php echo BASE_URL . 'index_pg7.php'?>">7</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg8.php'?>">8</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg9.php'?>">9</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg10.php'?>">10</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg11.php'?>">11</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg12.php'?>">12</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg13.php'?>">13</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg14.php'?>">14</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg15.php'?>">15</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg16.php'?>">16</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg17.php'?>">17</a>
  </div>
</div>
        <!--<li class="page-item ml-1"><a class="page-link" href="<?php echo BASE_URL . 'index_pg12.php'?>">Ultima</a></li>-->
    </ul>
            
        </div>


        <div class="col-sm-3 mt-2">
            <div class="mb-4" align="center">
                <h5><span class="badge badge-info mx-auto">Urmărește-ne pe:</span></h5>
                <a href="https://www.facebook.com/flashnetarul/" target="_blank">
                    <i class="fab fa-facebook" style="font-size:50px"></i>
                </a>
                <a href="https://www.instagram.com/flashnetarul/?hl=ro" target="_blank">
                    <i class="fab fa-instagram" style="font-size:50px"></i>
                </a>
                <a href="https://www.youtube.com/channel/UC_chUJOKGsRT1d70S_ncDEQ" target="_blank">
                    <i class="fab fa-youtube" style="font-size:50px"></i>
                </a>
            </div>
            
            <div class="card bg-danger text-white mb-3 mx-auto">
                <div class="card-body p-2 text-center font-weight-bold">Susține-ne</div>
            </div>
            
            <h6 class="mb-3" style="text-align:justify;">Flashnetarul este o publicație care se autofinanțează din publicitate și din donațiile cititorilor. Ne poți susține folosind una din variantele de mai jos:</h6>
            
            <h5>Donează prin cont bancar</h5>
            <p class="mb-3">Nume: Marius Constantin Popescu<br>IBAN: RO61RNCB0672142419140001<br>Deschis la: Banca Comercială Română<br>SWIFT CODE: RNCBROBU</p>
            <p></p>
            
            <h5>Donează prin PayPal</h5>
            <form class="mb-3" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="M6YKDSXX2TEB6" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_RO/i/scr/pixel.gif" width="1" height="1" />
</form>

            <div align="center" class="mb-5 mt-4">
                <div class="fb-page" data-href="https://www.facebook.com/flashnetarul/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/flashnetarul/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/flashnetarul/">Flashnetarul</a></blockquote></div>
            </div>
        </div>

    </div>
</div>

<!-- footer -->
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>
<!-- // footer -->