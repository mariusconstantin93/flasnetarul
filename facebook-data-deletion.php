<?php include('config.php'); ?>
<?php require_once( INCLUDE_PATH . "/logic/public_functions.php"); ?>
<?php require_once( INCLUDE_PATH . "/layouts/head_section.php"); ?>
<?php include(INCLUDE_PATH . '/logic/userSignup.php'); ?>


<title>Flașnetarul | Favebook data deletion instructions</title>
</head>
<body>
<!-- Navbar -->
<?php include( INCLUDE_PATH . "/layouts/navbar.php"); ?>
<!-- // Navbar -->
<div class="container-fluid shadow mb-3 mt-4" style="max-width: 1599.98px;">

    <!-- content -->
    <div class="row">
        <div class="col-sm p-4 mt-5">
            <h3 class="text-dark text-center">
                <b>Facebook data deletion instructions</b>
            </h3>
            <br>
            <div class="row mt-2">
                <div class="card">
                    <div class="card-body"><p class="card-text">Flashnetarul Login is a facebook login app and we do not save your personal data in our server. <br> According to Facebook policy, we have to provide User Data Deletion Callback URL or Data Deletion Instructions URL. <br>
If you want to delete your activities for Flashnetarul Login App, you can remove your information by following these steps: <br>
1. Go to your Facebook Account’s Setting & Privacy. Click “Settings” <br>
2. Look for “Apps and Websites” and you will see all of the apps and websites you linked with your Facebook. <br>
3. Search and Click “Flashnetarul Login” in the search bar. <br> 
4. Scroll and click “Remove”. <br>
5. Congratulations, you have succesfully removed your app activities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include( INCLUDE_PATH . "/layouts/footer.php") ?>
<!-- // Footer -->