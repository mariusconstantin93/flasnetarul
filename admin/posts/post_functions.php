<?php
// Post variables
$user_id = 0;
$post_id = 0;
$image_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$body_2 = "";
$featured_image = "";
$post_topic = "";

/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
// get the author/username of a post

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

function getPostImageById($id)
{
    global $conn;
    $sql = "SELECT image FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['image'];
    } else {
        return null;
    }
}

function getUploadedImageById($id)
{
    global $conn;
    $sql = "SELECT image FROM imagini WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['image'];
    } else {
        return null;
    }
}

// get all posts from DB
function getAllPosts()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['user']['role_id'] == 1) {
		$sql = "SELECT * FROM posts ORDER BY `posts`.`created_at` ASC";

	} elseif ($_SESSION['user']['role_id'] == 2) {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id=$user_id ORDER BY `posts`.`created_at` ASC";
	}

    elseif ($_SESSION['user']['role_id'] == 3) {
        $sql = "SELECT * FROM posts ORDER BY `posts`.`created_at` ASC";
    }

	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}

	return $final_posts;
}

function getAllUploadedImages()
{
	global $conn;
	
	// Admin can view all posts
	// Author can only view their posts
	if ($_SESSION['user']['role_id'] == 1) {
		$sql = "SELECT * FROM imagini ORDER BY `imagini`.`created_at` ASC";

	} elseif ($_SESSION['user']['role_id'] == 2) {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM imagini WHERE user_id=$user_id ORDER BY `imagini`.`created_at` ASC";
	}

    elseif ($_SESSION['user']['role_id'] == 3) {
        $sql = "SELECT * FROM imagini ORDER BY `imagini`.`created_at` ASC";
    }

	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}

	return $final_posts;
}

function getPublishedMemories() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE dayofmonth(created_at) = dayofmonth(CURRENT_DATE()) and month(created_at) = month(CURRENT_DATE()) and year(created_at) < year(CURRENT_DATE())";
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

/* - - - - - - - - - - 
-  Post actions
- - - - - - - - - - -*/
// if user clicks the create post button
if (isset($_POST['create_post'])) { createPost($_POST); }

// if user clicks the upload image button
if (isset($_POST['upload_image'])) { uploadImage($_POST); }

// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}

// if user clicks the Edit gallery button
if (isset($_GET['edit-image'])) {
    $isEditingPost = true;
    $image_id = $_GET['edit-image'];
    editImage($image_id);
}

// if user clicks the update post button
if (isset($_POST['update_post'])) {
    updatePost($_POST);
}

// if user clicks the update gallery button
if (isset($_POST['update_image'])) {
    updateImage($_POST);
}
// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

// if user clicks the Delete image button
if (isset($_GET['delete-image'])) {
    $image_id = $_GET['delete-image'];
    deleteImage($image_id);
}

/* - - - - - - - - - - 
-  Post functions
- - - - - - - - - - -*/
function createPost($request_values)
	{
		global $conn, $errors, $title, $featured_image, $topic_id, $body, $body_2, $published;
		if (isset($_SESSION['user'])) {
		    $user_id = $_SESSION['user']['id'];
		}
		$title = esc($request_values['title']);
		$body = htmlentities($request_values['body']);
		$body_2 = htmlentities($request_values['body_2']);
		if (isset($request_values['topic_id'])) {
			$topic_id = esc($request_values['topic_id']);
		}
		if (isset($request_values['publish'])) {
			$published = esc($request_values['publish']);
		}
		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);
		// validate form
		if (empty($title)) { array_push($errors, "Titlul este obligatoriu!"); }
// 		if (empty($body)) { array_push($errors, "Textul articolului este obligatoriu!"); }
// 		if (empty($body_2)) { array_push($errors, "Textul articolului este obligatoriu!"); }
		if (empty($topic_id)) { array_push($errors, "Selectarea topicului este obligatorie!"); }
		// Get image name
	  	$featured_image = $_FILES['featured_image']['name'];
	  	if (empty($featured_image)) { array_push($errors, "Imaginea este obligatorie!"); }
	  	// image file directory
	  	$target = "../../assets/images/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Nu s-a putut încărca imaginea. Verificați setările serverului dumneavoastră!");
	  	}
		// Ensure that no post is saved twice. 
		$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
		$result = mysqli_query($conn, $post_check_query);

		if (mysqli_num_rows($result) > 0) { // if post exists
			array_push($errors, "A post already exists with that title.");
		}
		// create post if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO posts (user_id, title, slug, image, body, body_2, published, created_at, updated_at) VALUES($user_id, '$title', '$post_slug', '$featured_image', '$body', '$body_2', $published, now(), now())";
			if(mysqli_query($conn, $query)){ // if post created successfully
				$inserted_post_id = mysqli_insert_id($conn);
				// create relationship between post and topic
				$sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id)";
				mysqli_query($conn, $sql);

				$_SESSION['success_msg'] = "Articolul a fost creat cu succes!";
				header('location: postList.php');
				exit(0);
			}
		}
	}

function uploadImage($request_values)
{
    global $conn, $errors, $featured_image, $published;

    if (isset($request_values['publish_image'])) {
        $published = esc($request_values['publish_image']);
    }

    // Get image name
    $featured_image = $_FILES['featured_image']['name'];
    if (empty($featured_image)) { array_push($errors, "Imaginea este obligatorie!"); }
    // image file directory
    $target = "../../assets/images/" . basename($featured_image);
    if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
        array_push($errors, "Nu s-a putut încărca imaginea. Verificați setările serverului dumneavoastră!");
    }

    // create post if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO imagini (user_id, image, published, created_at, updated_at) VALUES(1, '$featured_image', $published, now(), now())";
        if(mysqli_query($conn, $query)){ // if post created successfully
            $inserted_image_id = mysqli_insert_id($conn);
            // create relationship between image and topic
            $sql = "INSERT INTO post_topic (post_id, image_id, topic_id) VALUES(0, $inserted_image_id, 4)";
            mysqli_query($conn, $sql);

            // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
            $post_slug = makeSlug($inserted_image_id);
            $sql = "UPDATE imagini SET slug='imagini-$post_slug' WHERE id=$inserted_image_id";
            mysqli_query($conn, $sql);

            $_SESSION['success_msg'] = "Imaginea a fost încărcată cu succes!";
            header('location: image_list.php');
            exit(0);
        }
    }
}

	/* * * * * * * * * * * * * * * * * * * * *
	* - Takes post id as parameter
	* - Fetches the post from database
	* - sets post fields on form for editing
	* * * * * * * * * * * * * * * * * * * * * */
	function editPost($role_id)
	{
		global $conn, $title, $post_slug, $body, $body_2, $published, $isEditingPost, $post_id;
		$sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$post = mysqli_fetch_assoc($result);
		// set form values on the form to be updated
		$title = $post['title'];
		$body = $post['body'];
		$body_2 = $post['body_2'];
		$published = $post['published'];
	}

function editImage($role_id)
{
    global $conn, $published, $isEditingPost, $image_id;
    $sql = "SELECT * FROM imagini WHERE id=$role_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);
    // set form values on the form to be updated
    $published = $post['published'];
}

	function updatePost($request_values)
	{
		global $conn, $errors, $post_id, $title, $featured_image, $topic_id, $body, $body_2, $published;

		$title = esc($request_values['title']);
		$body = esc($request_values['body']);
		$body_2 = esc($request_values['body_2']);
		$post_id = esc($request_values['post_id']);
        if (isset($request_values['topic_id'])) {
			$topic_id = esc($request_values['topic_id']);
		}
        if (isset($request_values['publish'])) {
            $published = esc($request_values['publish']);
        }

		// create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
		$post_slug = makeSlug($title);

		if (empty($title)) { array_push($errors, "Post title is required"); }
// 		if (empty($body)) { array_push($errors, "Post body is required"); }
// 		if (empty($body_2)) { array_push($errors, "Post body is required"); }
		if (empty($topic_id)) { array_push($errors, "Selectarea topicului este obligatorie!"); }
		// if new featured image has been provided
		if (!isset($_POST['featured_image'])) {
			// Get image name
		  	$featured_image = $_FILES['featured_image']['name'];
		  	// image file directory
		  	$target = "../../assets/images/" . basename($featured_image);

            if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
                array_push($errors, "Nu s-a putut încărca imaginea. Verificați setările serverului dumneavoastră!");
            }
		}

		// register topic if there are no errors in the form
		if (count($errors) == 0) {
			$query = "UPDATE posts SET title='$title', slug='$post_slug', image='$featured_image', body='$body', body_2='$body_2', published=$published, updated_at=now() WHERE id=$post_id";
			// attach topic to post on post_topic table
            if(mysqli_query($conn, $query)){ // if post created successfully
            if (isset($topic_id)) {
				// create relationship between post and topic
				$sql = "UPDATE post_topic SET topic_id=$topic_id WHERE post_id=$post_id";
				mysqli_query($conn, $sql);

				$_SESSION['success_msg'] = "Articolul a fost modificat cu succes!";
				header('location: postList.php');
				exit(0);
			}
            }
    
		}
	}

function updateImage($request_values)
{
    global $conn, $errors, $image_id, $featured_image, $published;
    $image_id = esc($request_values['image_id']);

    if (isset($request_values['publish_image'])) {
        $published = esc($request_values['publish_image']);
    }


    // if new featured image has been provided
    if (!isset($_POST['featured_image'])) {
        // Get image name
        $featured_image = $_FILES['featured_image']['name'];
        // image file directory
        $target = "../../assets/images/" . basename($featured_image);

        if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
            array_push($errors, "Nu s-a putut încărca imaginea. Verificați setările serverului dumneavoastră!");
        }
    }

    $post_slug = makeSlug($image_id);

    // register topic if there are no errors in the form
    if (count($errors) == 0) {
        $query = "UPDATE imagini SET image='$featured_image', slug='$post_slug', published=$published, updated_at=now() WHERE id=$image_id";
        // attach topic to post on post_topic table
        if(mysqli_query($conn, $query)){ // if post created successfully
            $_SESSION['success_msg'] = "Articolul a fost modificat cu succes!";
            header('location: image_list.php');
            exit(0);
        }

    }
}

	// delete blog post
function deletePost($post_id)
{
    global $conn;
    if (count($errors) == 0) {
			$query = "DELETE FROM posts WHERE id=$post_id";
			// attach topic to post on post_topic table
            if(mysqli_query($conn, $query)){ // if post created successfully
                // create relationship between post and topic
				$sql = "DELETE FROM post_topic WHERE post_id=$post_id";
				mysqli_query($conn, $sql);

				$_SESSION['success_msg'] = "Articolul a fost șters cu succes!";
				header('location: postList.php');
				exit(0);
            }
		}
}

function deleteImage($image_id)
{
    global $conn;
    if (count($errors) == 0) {
			$query = "DELETE FROM imagini WHERE id=$image_id";
			// attach topic to post on post_topic table
            if(mysqli_query($conn, $query)){ // if post created successfully
                // create relationship between post and topic
				$sql = "DELETE FROM post_topic WHERE image_id=$image_id";
				mysqli_query($conn, $sql);

				$_SESSION['success_msg'] = "Imaginea a fost ștearsă cu succes!";
				header('location: image_list.php');
				exit(0);
            }
    
		}
}

	// if user clicks the publish post button
	if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
		$message = "";
		if (isset($_GET['publish'])) {
			$message = "Post published successfully";
			$post_id = $_GET['publish'];
		} else if (isset($_GET['unpublish'])) {
			$message = "Post successfully unpublished";
			$post_id = $_GET['unpublish'];
		}
		togglePublishPost($post_id, $message);
	}

// if user clicks the publish image button
if (isset($_GET['publish_image']) || isset($_GET['unpublish_image'])) {
    $message = "";
    if (isset($_GET['publish_image'])) {
        $message = "Post published successfully";
        $image_id = $_GET['publish_image'];
    } else if (isset($_GET['unpublish_image'])) {
        $message = "Post successfully unpublished";
        $image_id = $_GET['unpublish_image'];
    }
    togglePublishImage($image_id, $message);
}

	// delete blog post
	function togglePublishPost($post_id, $message)
{
    global $conn;
    $sql = "UPDATE posts SET published=!published WHERE id=$post_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        header("location: postList.php");
        exit(0);
    }
}

function togglePublishImage($image_id, $message)
{
    global $conn;
    $sql = "UPDATE imagini SET published=!published WHERE id=$image_id";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = $message;
        header("location: image_list.php");
        exit(0);
    }
}
?>