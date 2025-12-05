<?php
        // Kick out user if they are not logged in.
        $ok = session_start();
        if (empty($_SESSION['is_logged_in']))
        {
            header("Location: login.php");
            exit();
        }

        // Get data from the new post.
        $new_title = $_POST['new_blog_title'];
        $new_text = trim($_POST['new_blog_paragraphs']);

        // Load the blog json file as an array.
        $blog_path = __DIR__ . '/blogs.json';
        $json_file = file_get_contents($blog_path);
        $blogs = json_decode($json_file, true);

        // Split the new block of text into an array of paragraphs based on two consecutive new line chars.
        $new_paragraphs = array_filter(array_map('trim', explode("\r\n\r\n", $new_text)));

        $unique_id = uniqid();

        $current_date = date("Y/m/d");

        $new_blog = ["id"=> $unique_id, "title"=>$new_title, "date"=>$current_date, "paragraphs"=>$new_paragraphs];

        $blogs[] = $new_blog;

        file_put_contents($blog_path, json_encode($blogs, JSON_PRETTY_PRINT));

        header("Location: blog.php");
?>

