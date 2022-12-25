<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fruktur&display=swap" rel="stylesheet">
	<!-- Styling for public area -->
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
    <link rel="icon" href="https://i.imgur.com/vz8PQz8.png" type="image/x-icon">
    
    <script defer src="../../site.js"></script>
    
    <link rel="manifest" href="../../manifest.json">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Flashnetarul">
    <meta name="apple-mobile-web-app-title" content="Flashnetarul">
    <meta name="theme-color" content="#212529">
    <meta name="msapplication-navbutton-color" content="#212529">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="https://flasnetarul.ro/index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" sizes="128x128" href="../../images/icon-128x128.png">
    <link rel="apple-touch-icon" sizes="128x128" href="../../images/icon-128x128.png">
    <link rel="icon" sizes="192x192" href="../../images/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="192x192" href="../../images/icon-192x192.png">
    <link rel="icon" sizes="256x256" href="../../images/icon-256x256.png">
    <link rel="apple-touch-icon" sizes="256x256" href="../../images/icon-256x256.png">
    <link rel="icon" sizes="384x384" href="../../images/icon-384x384.png">
    <link rel="apple-touch-icon" sizes="384x384" href="../../images/icon-384x384.png">
    <link rel="icon" sizes="512x512" href="../../images/icon-512x512.png">
    <link rel="apple-touch-icon" sizes="512x512" href="../../images/icon-512x512.png">
    
    <style>
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        
        .link_articole a:link {
            text-decoration: none;
        }

        .link_articole a {
            color: black;
        }

        .link_articole a:hover {
            color: #d00000 !important;
            background-color: #d00000 !important;
        }

        .post_image {
            height: 175px;
            width: 100%;
            background-size: 100%;
        }
        
        .post_image2 {
            height: 300px;
            width: 100%;
            background-size: 100%;
        }

        .box:hover {
            -webkit-box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.75);
        }

        .titlu:hover {
            background-color:hsla(360, 100%, 0%, 0.05);
        }
        
        @mixin clearfix() {
            &::after {
            display: block;
            content: "";
            clear: both;
            }
        }

        // Usage as a mixin
        .element {
            @include clearfix;
        }
        
        .banner {
            align-content: center;
            display: none;
            justify-content: center;
            width: 100%;
        }
        
        .opacity-0 {
            opacity:0!important;
        }
        
        .opacity-1 {
            opacity:0.2!important;
        }
        
        .opacity-2 {
            opacity:0.4!important;
        }
        
        .opacity-3 {
            opacity:0.6!important;
        }
        
        .opacity-4 {
            opacity:.8!important;
        }
        
        .opacity-5 {
            opacity:1!important;
        }

        /* Maybe even support hover opacity shifts */
        .opacity-0h5 {
            opacity:0!important;
            transition: opacity .25s ease-in-out!important;
            -moz-transition: opacity .25s ease-in-out!important;
            -webkit-transition: opacity .25s ease-in-out!important;
        }
        
        .opacity-0h5:hover {
            opacity:1!important;
        }
        
        .zoom {
            transition: transform .2s; /* Animation */
        }

        .zoom:hover {
            transform: scale(1.03);
        }
        .ultimelearticole {
            font-family: 'Fruktur', cursive;
        }
    </style>

    <!--<script type="text/javascript" id="cookieinfo"-->
    <!--        src="//cookieinfoscript.com/js/cookieinfo.min.js"-->
    <!--        SameSite=Lax-->
    <!--        data-message = "Folosim cookie-uri pentru a vă îmbunătăţi experienţa. Continuând să vizitaţi acest site sunteţi de acord cu utilizarea cookie-urilor."-->
    <!--        data-linkmsg = "Mai multe informații"-->
    <!--        data-bg = "#dc3545"-->
    <!--        data-fg = "#fff">-->
    <!--</script>-->
    
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '505684229884132',
      autoLogAppEvents : true,
      cookie     : true,
      xfbml      : true,
      version    : 'v14.0'
    });
      
    FB.AppEvents.logPageView();   
      
  }; 
(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "https://connect.facebook.net/ro_RO/sdk.js";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));
</script>

<!-- Facebook Pixel Code -->
<!--<script>-->
<!--  !function(f,b,e,v,n,t,s)-->
<!--  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?-->
<!--  n.callMethod.apply(n,arguments):n.queue.push(arguments)};-->
<!--  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';-->
<!--  n.queue=[];t=b.createElement(e);t.async=!0;-->
<!--  t.src=v;s=b.getElementsByTagName(e)[0];-->
<!--  s.parentNode.insertBefore(t,s)}(window, document,'script',-->
<!--  'https://connect.facebook.net/en_US/fbevents.js');-->
<!--  fbq('init', '354039585195033');-->
<!--  fbq('track', 'PageView');-->
<!--</script>-->
<!--<noscript><img height="1" width="1" style="display:none"-->
<!--  src="https://www.facebook.com/tr?id=354039585195033&ev=PageView&noscript=1"-->
<!--/></noscript>-->
<!-- End Facebook Pixel Code -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6203121279300725"
     crossorigin="anonymous"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PB6PHNP');</script>
<!-- End Google Tag Manager -->

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137158752-1');
</script>

<script>
    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', event => {

      // Prevent Chrome 67 and earlier from automatically showing the prompt
      event.preventDefault();

      // Stash the event so it can be triggered later.
      deferredPrompt = event;

      // Attach the install prompt to a user gesture
      document.querySelector('#installBtn').addEventListener('click', event => {

        // Show the prompt
        deferredPrompt.prompt();

        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice
          .then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
              console.log('User accepted the A2HS prompt');
            } else {
              console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
          });
      });

      // Update UI notify the user they can add to home screen
      document.querySelector('#installBanner').style.display = 'flex';
    });
  </script>
  
  <script>
      if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('service-worker.js')
    .then(registration => {
      console.log('Service Worker is registered', registration);
    })
    .catch(err => {
      console.error('Registration failed:', err);
    });
  });
}
  </script>
  
  <?php
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . ' [...]';
    echo $y;
  }
}
?>