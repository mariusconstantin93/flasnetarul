<?php  include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>

<?php
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
    $post_id = $post['id'];
}
$topics = getAllTopics();
$sql = "SELECT id, profile_picture FROM users WHERE id=?";
$user = getSingleRecord($sql, 'i', [$_SESSION['user']['id']]);
$profile_picture = $user['profile_picture'];

$sql = "UPDATE posts SET visits = visits+1 WHERE id = $post_id";
    $conn->query($sql);

    $sql = "SELECT visits FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "";
    }


function getPostAuthorById($user_id)
{
    global $conn;
    $sql = "SELECT username FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['username'];
    } else {
        return null;
    }
}

?>

<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<title>Flashnetarul | <?php echo $post['title'] ?></title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
<meta property="fb:app_id"        content="505684229884132" /> 
<meta property="og:url"           content="https://flasnetarul.ro/single_post.php?post-slug=<?php echo $post['slug']; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $post['title'] ?>" />
<meta property="og:description"   content="<?php echo html_entity_decode($post['body'], ENT_NOQUOTES); ?>" />
<meta property="og:image"         content="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" />
<meta property="og:image:secure_url"         content="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" />

<!-- Limbaj de markup JSON-LD generat de Asistent de markup pentru date structurate Google. -->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Article",
  "name" : "<?php echo $post['title'] ?>",
  "author" : {
    "@type" : "Person",
    "name" : "<?php $post['author'] = getPostAuthorById($post['user_id']); echo $post['author']; ?>"
  },
  "datePublished" : "<?php echo date('d F Y, h:i:s A', strtotime($post["created_at"])); ?>",
  "image" : "<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>",
  "articleSection" : "<?php echo $post['topic']['name'] ?>",
  "articleBody" : "<?php echo html_entity_decode($post['body']); ?>",
  "headline" : "<?php echo $post['title'] ?>",
  "publisher" : {
      "@type" : "Organization",
      "name" : "Flashnetarul",
      "logo": {
            "@type": "ImageObject",
            "name": "myOrganizationLogo",
            "url": "https://www.flasnetarul.ro/logo.png"
        }
  },
  "dateModified" : "<?php echo date('d F Y, h:i:s A', strtotime($post["updated_at"])); ?>",
  "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "https://flasnetarul.ro/"
      }
}
</script>

<style>
    .no-copy {
        -webkit-user-select: none;   Chrome all / Safari all */
        -moz-user-select: none;     /* Firefox all */
        -ms-user-select: none;      /* IE 10+ */
        user-select: none;          /* Likely future */
    }

    .text_articol {
        font-family: Georgia,Times New Roman,Times,serif;
        font-size: 18px;
        line-height: 1.50;
        text-align: left;
    }
</style>
</head>

<body>
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQJXM2G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // Navbar -->
<div class="container-fluid shadow bg-light" style="max-width: 1599.98px;">

	<div class="row" >
		<!-- Page wrapper -->
		
			<!-- full post div -->
			<?php if (($post['published'] == false) AND (!(isAdmin($_SESSION['user']['id'])))): ?>
				<h3 class="text-center text-danger">Ne pare rﾄブ, acest articol nu este publicat!</h3>
			<?php else: ?>
                <div class="col-sm-6">
                         
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
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            
                            <?php if (isset($_SESSION['user']) and ($_SESSION['user']['role_id'] == 1 or $_SESSION['user']['role_id'] == 3)): ?>
         <a class="btn btn-sm btn-success edit mb-5" href="https://flasnetarul.ro/admin/posts/create_post.php?edit-post=<?php echo $post['id'] ?>" title="Editează articolul"><i class="fas fa-pen-fancy"></i>
        </a>
         <?php endif; ?>
        
                            <h4 class="card-title text-center"><?php echo $post['title']; ?></h4>
                            <div style="color: black; font-size: small;"><i class="fas fa-pen-fancy mt-3" style="font-size: large;"></i>&nbsp; &nbsp;<?php $post['author'] = getPostAuthorById($post['user_id']);
                                    echo $post['author']; ?>
                            </div>
                            <div style="color: black; font-size: small;"><i class="far fa-calendar-alt" style="font-size: large;"></i>&nbsp; &nbsp;<?php setlocale(LC_TIME, array('ro.utf-8', 'ro_RO.UTF-8', 'ro_RO.utf-8', 'ro', 'ro_RO', 'ro_RO.ISO8859-2')); echo strftime("%d %B %Y, la ora %H:%M", strtotime($post["created_at"])); ?></div>
                            <div style="color: black; font-size: small;"><i class="far fa-eye" style="font-size: large;"></i>&nbsp; &nbsp;<?php echo $visits; ?></div>
                            <div class="mb-3">
                                <a href="<?php echo BASE_URL . 'filtered_posts_pg_1.php?topic=' . $post['topic']['id'] ?>" class="badge badge-dark">
                                    <?php echo $post['topic']['name'] ?>
                                </a>
                            </div>
                            <img src="<?php echo BASE_URL . 'assets/images/' . $post['image']; ?>" width="100%" class="img-fluid mb-4">
                            <br>
                            <div class="text_articol"><?php echo html_entity_decode($post['body']); ?></div>
                            <div class="container-fluid">
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6203121279300725"
     data-ad-slot="1410616916"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<br>
                            <div class="text_articol"><?php echo html_entity_decode($post['body_2']); ?></div>
                            
                            <div class="content mt-2">
                                <div class="fb-share-button" data-href="https://flasnetarul.ro/single_post.php?post-slug=<?php echo $post['slug']; ?>" data-layout="box_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://flasnetarul.ro/single_post.php?post-slug=<?php echo $post['slug']; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Distribuie</a></div>
                            </div>
                            <hr>
                            <h6 class="mt-2"><span class="badge badge-danger mx-auto">Dacă ți-a plăcut poți dona astfel:</span></h6>
<p style="text-align: left; word-wrap: break-word;"><small>✅&nbsp;Revolut:&nbsp;<a href="https://revolut.me/mcp93" target="_blank"> @mcp93</a> <br>✅&nbsp;BTC:&nbsp;bc1qs7e9rhh95g8dtx6jzzx0ymtuahafddwz0elq3p <br>✅&nbsp;ETH:&nbsp;0x29f9ed85EE2552e5cC5CFA520FCdC2Be8F35a979 <br>✅&nbsp;EGLD:&nbsp;erd195fz9jxjhke8rdeuuue4ys4mg9550dkwvt698kn8w3xez8d4mxuq4txllr <br>✅&nbsp;DOT:&nbsp;14Ymsnor4uETt5GzRqqYnq3kMENK4gKnheA47VK1k8QsHrAD <br>✅ Câștigă $10 la prima achiziție de eGold ($EGLD) în valoare de 200$ folosind linkul meu de afiliere:<a href="https://get.maiar.com/referral/x8bcbfnr9o" target="_blank"> https://get.maiar.com/referral/x8bcbfnr9o</a></small></p>
                        </div>
                    </div>
        
                    <h5 class="text-center">Comentarii</h5>
                    <p class="text-center small opacity-3">Pentru a putea lăsa și vedea comentarii trebuie să fii autentificat pe <a href="https://www.facebook.com" target="_blank">Facebook</a> în browserul de pe care accesezi acest articol</p>
 <br>
                    <div class="fb-comments" data-href="https://flasnetarul.ro/single_post.php?post-slug=<?php echo $post['slug']; ?>" data-colorscheme="light" data-mobile="true" data-order-by="reverse_time" data-width="" data-numposts="20"></div>
                    <br><br>
                    
<div class="container-fluid">                          
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
			<?php endif ?>
        
        <div class="col-sm-6">
            <div class="row">
            <div class="col-sm-6">
                <h3><span class="card bg-secondary text-white mb-2 text-center mt-3">Articole similare</span></h3>
                
                    <?php
                    $posts = getLastPublishedPostsByTopic($topic_id = 1);
                    foreach ($posts as $post): ?>
                        <div class="col-sm mb-4">
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

                <?php
                $posts = getLastPublishedPostsByTopic($topic_id = 2);
                foreach ($posts as $post): ?>
                    <div class="col-sm mb-4">
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

                <?php
                $posts = getLastPublishedPostsByTopic($topic_id = 3);
                foreach ($posts as $post): ?>
                    <div class="col-sm mb-4">
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
                
                <?php
                $posts = getLastPublishedPostsByTopic($topic_id = 5);
                foreach ($posts as $post): ?>
                    <div class="col-sm mb-4">
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
        
        <div class="col-sm-6">
              <div align="center">
               <h3><span class="badge badge-secondary mx-auto">Dă-ne LIKE!</span></h3>
               <i class="far fa-hand-point-down mb-2" style="font-size:50px"></i>
               </div>
                <div align="center" class="mb-5">
                <div class="fb-page" data-href="https://www.facebook.com/flashnetarul/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/flashnetarul/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/flashnetarul/">Flashnetarul</a></blockquote></div>
            </div>
            </div>
        </div>
        </div>
	</div>
</div>
<!-- // content -->

<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>