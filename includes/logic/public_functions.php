<?php 
/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12";
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

function getPublishedPostsPg1() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 2";
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

function getPublishedPostsPg2() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 14";
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

function getPublishedPostsPg3() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 26";
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

function getPublishedPostsPg4() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 38";
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

function getPublishedPostsPg5() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 50";
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

function getPublishedPostsPg6() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 62";
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

function getPublishedPostsPg7() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 74";
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

function getPublishedPostsPg8() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 86";
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

function getPublishedPostsPg9() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 98";
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

function getPublishedPostsPg10() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 110";
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

function getPublishedPostsPg11() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 122";
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

function getPublishedPostsPg12() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 134";
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

function getPublishedPostsPg13() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 146";
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

function getPublishedPostsPg14() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 158";
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

function getPublishedPostsPg15() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 170";
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

function getPublishedPostsPg16() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 182";
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

function getPublishedPostsPg17() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 12 OFFSET 194";
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

function getLastPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 1";
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

function getLastButOnePublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 1 OFFSET 1";
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


function getLastTwoButTwoPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 2 OFFSET 2";
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


function getLastTwoButFourPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 2 OFFSET 4";
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

function getLastThreeButSixPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 3 OFFSET 6";
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

function getLastTwoButNinePublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 2 OFFSET 9";
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

function getLastOneButElevnPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 1 OFFSET 11";
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

function getBeforeLastPublishedPost() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY `posts`.`created_at` DESC LIMIT 1 OFFSET 2";
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

function getPublishedImages() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM imagini WHERE published=true ORDER BY `imagini`.`created_at` DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getImageTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getRandomPublishedImages() {
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM imagini WHERE published=true ORDER BY RAND() DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getImageTopic($post['id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}

/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

function getImageTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE image_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

function getImageByPostId($post_id){
    global $conn;
    $sql = "SELECT * FROM posts WHERE image=
			(SELECT image FROM posts WHERE id=$post_id)";
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic;
}

function getImageByImageId($post_id){
    global $conn;
    $sql = "SELECT * FROM imagini WHERE image=
			(SELECT image FROM imagini WHERE id=$post_id)";
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result);
    return $topic;
}


/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC";
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

function getPublishedPostsByTopicPage1($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 0";
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

function getPublishedPostsByTopicPage2($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 12";
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

function getPublishedPostsByTopicPage3($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 24";
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

function getPublishedPostsByTopicPage4($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 36";
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

function getPublishedPostsByTopicPage5($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 48";
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

function getPublishedPostsByTopicPage6($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 60";
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

function getPublishedPostsByTopicPage7($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 72";
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

function getPublishedPostsByTopicPage8($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12 OFFSET 84";
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

function getPublishedImageByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM imagini ps 
			WHERE ps.id IN 
			(SELECT pt.image_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.image_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getImageTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getPublishedImagPage1($topic_id) {
	global $conn;
	$sql = "SELECT * FROM imagini ps 
			WHERE ps.id IN 
			(SELECT pt.image_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.image_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 0, 12";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getImageTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getPublishedImagPage2($topic_id) {
	global $conn;
	$sql = "SELECT * FROM imagini ps 
			WHERE ps.id IN 
			(SELECT pt.image_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.image_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 12, 24";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getImageTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getPublishedImagPage3($topic_id) {
	global $conn;
	$sql = "SELECT * FROM imagini ps 
			WHERE ps.id IN 
			(SELECT pt.image_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.image_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY `created_at` DESC LIMIT 24, 48";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getImageTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

function getLastPublishedPostsByTopic($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY RAND() DESC LIMIT 1";
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
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

function getImage($slug){
    global $conn;
    // Get single image slug
    $post_slug = $_GET['post-slug'];
    $sql = "SELECT * FROM imagini WHERE slug='$post_slug' AND published=true";
    $result = mysqli_query($conn, $sql);

    // fetch query results as associative array.
    $post = mysqli_fetch_assoc($result);
    if ($post) {
        // get the topic to which this post belongs
        $post['topic'] = getImageTopic($post['id']);
    }
    return $post;
}
/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
?>