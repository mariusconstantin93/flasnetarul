<?php include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>
<?php include(ROOT_PATH . '/admin/posts/post_functions.php'); ?>

<title>Flashnetarul</title>

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

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB6PHNP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // navbar -->

<!-- Page content -->
<div class="container-fluid shadow bg-light" style="max-width: 1599.98px;">
    <div class="row">
        <div class="col-sm-9">
            
            <!-- The Modal -->
  <div class="modal fade mt-3" id="popupMaintenanceModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          
        <!--  <div class="modal-header">-->
        <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <!--</div>-->
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="col-sm">
          <div align="center">
               <h2><span class="badge badge-danger mx-auto">Dă-ne LIKE!</span></h2>
               <i class="far fa-hand-point-down mb-2" style="font-size:50px"></i>
               </div>
                <div align="center">
                <div class="fb-page" data-href="https://www.facebook.com/flashnetarul/" data-tabs="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/flashnetarul/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/flashnetarul/">Flashnetarul</a></blockquote></div>
                
                <section id="installBanner" class="banner">
                <button type="button" class="btn btn-warning mt-3" id="installBtn">Instalează aplicația Flashnetarul</button>
            </section>
            </div>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <div class="d-flex flex-grow-1 justify-content-start custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="popupMaintenanceCheckbox" name="checkbox-maintenance"/>
                    <label class="custom-control-label checkbox-maintenance" for="popupMaintenanceCheckbox">Nu mai afișa din nou!</label>
                </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
        </div>
        
      </div>
    </div>
  </div>
  
  <script>
      jQuery(document).ready(function($) {
  if ($.cookie("cacher-modal")) {
    $("#popupMaintenanceModal").remove();
  } else {
    setTimeout(function(){ 
        $("#popupMaintenanceModal").modal("show");
    }, 3500);
  }

  $("#popupMaintenanceCheckbox").click(function() {
    if ($(this).is(":checked")) {
        $("#popupMaintenanceModal").modal("hide");
        $.cookie("cacher-modal", true);
    } else {
      $.cookie("cacher-modal", false);
    }
  })
});
  </script>
           <!--
            <div id="myCarousel" class="carousel slide img-fluid mx-auto d-block mt-3" data-ride="carousel" data-interval="3000" style="width: 600px; height: 315px; box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.75)">

                               Indicators 
                <ul class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ul>

                                 The slideshow 
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

                           Left and right controls 
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><i class="fas fa-angle-left" style="color: red; font-size: 32px"></i></a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next"><i class="fas fa-angle-right" style="color: red; font-size: 32px"></i></a>
            </div>
-->

            <!--<hr style="border-bottom: 3px solid #000000;" class="mt-3">-->

           
                <!--<h1 class="text-center text-uppercase font-weight-bold mb-2 ultimelearticole">Ultimele articole</h1>-->
            
            
            <!-- Retrieve only the last post from database  -->
                <?php $posts = getLastPublishedPost(); ?>
            <div class="row p-1">
                <?php foreach ($posts as $post): ?>
    		    <div class="col-sm-6 mb-4">
                        <div class="card box rounded zoom">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid rounded-top">
                            </a>
                            <div class="link_articole py-1 mx-1 light border-bottom">
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
    		    
    		     <!-- Retrieve only the last but one post from database  -->
                <?php $posts = getLastButOnePublishedPost(); ?>
    		    <?php foreach ($posts as $post): ?>
    		    <div class="col-sm-6 mb-4">
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
            
            <div class="row">
                 <!-- Retrieve last two posts except the last two from database  -->
            <?php $posts = getLastTwoButTwoPublishedPost(); ?>
                <div class="col-sm-6">
                <?php foreach ($posts as $post): ?>
                <div class="card mb-4 box rounded zoom">
                <div class="row no-gutters">
                    <div class="col-sm">
                        <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid">
                            </a>
                    </div>
                <div class="col-sm">
                <div class="card-body py-0 px-1 mt-2">
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
                </div>
            </div>
    
                <?php endforeach ?>
                </div>
              
              <!-- Retrieve last tow posts except the last four from database  -->
            <?php $posts = getLastTwoButFourPublishedPost(); ?>
              <?php foreach ($posts as $post): ?>
                    <div class="col-sm-3 mb-4">
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
                            <i class="far fa-eye" style="font-size: small;">  &nbsp;<span class="mr-1" style="font-size: small;"><?php echo $post["visits"]; ?></span></i>
                            <i class="far fa-calendar-alt" style="font-size: small;">&nbsp;<span class="mr-1" style="font-size: small;"><?php setlocale(LC_TIME, array('ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2')); echo strftime("%d %B %Y", strtotime($post["created_at"])); ?></span></i>
                            <i class="fas fa-pen-fancy" style="font-size: small;">&nbsp;<span style="font-size: small; font-weight: normal;"><?php $post['author'] = getPostAuthorById($post['user_id']);
                                    echo $post['author']; ?></span></i>
                            </div>
                            
                            <div class="mx-1" style="opacity: 0.8;"><p class="mb-0 mt-1"><?php custom_echo(html_entity_decode($post['body'] . " " .$post['body_2']), 60) ?></p></div>
                        </div>
                    </div>
                <?php endforeach ?>
            
            </div>
            
             <!-- Retrieve last three posts except the last six from database  -->
            <?php $posts = getLastThreeButSixPublishedPost(); ?>
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
            
            <div class="row">
                 <!-- Retrieve last two posts except the last nine from database  -->
            <?php $posts = getLastTwoButNinePublishedPost(); ?>
                <div class="col-sm-8">
                <?php foreach ($posts as $post): ?>
                <div class="card mb-4 box rounded zoom">
                <div class="row no-gutters">
                    <div class="col-sm">
                        <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" class="img-fluid">
                            </a>
                    </div>
                <div class="col-sm">
                <div class="card-body py-0 px-1 mt-2">
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
                            
                            <div class="mx-1" style="opacity: 0.8;"><p class="mb-0 mt-1"><?php custom_echo(html_entity_decode($post['body'] . " " .$post['body_2']), 130) ?></p></div>
                </div>
                </div>
                </div>
            </div>
    
                <?php endforeach ?>
                </div>
              
             
              <!-- Retrieve last ome posts except the last eleven from database  -->
            <?php $posts = getLastOneButElevnPublishedPost(); ?>
              <?php foreach ($posts as $post): ?>
                    <div class="col-sm-4 mb-5">
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
                            <div class="mx-1" style="opacity: 0.8;"><p class="mb-0 mt-1"><?php custom_echo(html_entity_decode($post['body'] . " " .$post['body_2']), 160) ?></p></div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            
        <ul class="pagination justify-content-center">
        <!--<li class="page-item mr-1 disabled"><a class="page-link" href="<?php echo BASE_URL . 'index.php'?>">Prima</a></li>-->
        
        <div class="dropdown show">
  <a class="btn dropdown-toggle border rounded-0 text-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mergi la pagina
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item active" href="<?php echo BASE_URL . 'index.php'?>">1</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg2.php'?>">2</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg3.php'?>">3</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg4.php'?>">4</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg5.php'?>">5</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg6.php'?>">6</a>
    <a class="dropdown-item" href="<?php echo BASE_URL . 'index_pg7.php'?>">7</a>
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
            
            <div class="card bg-secondary text-white m-4 mb-3 mt-5">
                <div class="card-body p-2 rounded font-weight-bold">Amintirile zilei</div>
            </div>
            <!-- Retrieve all posts created in a current day of month from database  -->
            <?php $posts = getPublishedMemories(); ?>
            
            <?php
            $rowcount = mysqli_num_rows($sql);
            if (!empty($posts)): ?>
            
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
            
            <?php else: ?>
            <?php $today = date("j F"); 
            setlocale(LC_TIME, array('ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2'));?>
            <div class="alert alert-info mb-2 p-0 px-2 text-center">
                <strong>Info!</strong> <?php echo "Nu există amintiri pentru data de ", strftime("%d %B", strtotime($today)), "!";?>
            </div>
            
            <?php endif ?>
        </div>


        <div class="col-sm-3">
            <div class="mb-1" align="center">
                <h3><span class="badge badge-secondary mx-auto">Dă-ne LIKE!</span></h3>
                <i class="far fa-hand-point-down mb-2" style="font-size:50px"></i>
                <div align="center" class="mb-2">
                <div class="fb-page" data-href="https://www.facebook.com/flashnetarul/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/flashnetarul/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/flashnetarul/">Flashnetarul</a></blockquote></div>
            </div>
            
                <h5><span class="badge badge-info mx-auto">Urmărește-ne și pe:</span></h5>
                <!-- <a href="https://www.facebook.com/flashnetarul/" target="_blank"> 
                    <i class="fab fa-facebook" style="font-size:50px"></i>
                </a> -->
                <a href="https://www.instagram.com/flashnetarul/?hl=ro" target="_blank">
                    <i class="fab fa-instagram" style="font-size:50px"></i>
                </a>
                <!-- <a href="https://www.youtube.com/channel/UC_chUJOKGsRT1d70S_ncDEQ" target="_blank">
                    <i class="fab fa-youtube" style="font-size:50px"></i>
                </a> -->
               <hr>
            <h5 class="mt-2"><span class="badge badge-danger mx-auto">Donații:</span></h5>
<p style="text-align: left; word-wrap: break-word;">✅&nbsp;Revolut:&nbsp;<a href="https://revolut.me/mcp93" target="_blank"> @mcp93</a> <br>✅&nbsp;BTC:&nbsp;bc1qs7e9rhh95g8dtx6jzzx0ymtuahafddwz0elq3p <br>✅&nbsp;ETH:&nbsp;0x29f9ed85EE2552e5cC5CFA520FCdC2Be8F35a979 <br>✅&nbsp;EGLD:&nbsp;erd195fz9jxjhke8rdeuuue4ys4mg9550dkwvt698kn8w3xez8d4mxuq4txllr <br>✅&nbsp;DOT:&nbsp;14Ymsnor4uETt5GzRqqYnq3kMENK4gKnheA47VK1k8QsHrAD <br>✅ Câștigă $10 la prima achiziție de eGold ($EGLD) în valoare de 200$ folosind linkul meu de afiliere:<a href="https://get.maiar.com/referral/x8bcbfnr9o" target="_blank"> https://get.maiar.com/referral/x8bcbfnr9o</a></p>
            
            </div>
            
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

<!-- footer -->
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>
<!-- // footer -->