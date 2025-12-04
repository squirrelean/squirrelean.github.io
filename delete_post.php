<?php
    $blog_path = __DIR__ . '/blogs.json';
    $json_file = file_get_contents($blog_path);
    $blogs = json_decode($json_file, true);

    $post_to_remove = $_POST['id'];

    //Remove blog in array with matching id
    $new_blog_list = [];
    for ($i = 0; $i < count($blogs); $i++)
    {
        $blog = $blogs[$i];
        if ($blog['id'] != $post_to_remove)
        {
            $new_blog_list[] = $blog;
        }
    }

    // Save the new list of blogs back to the json file.
    file_put_contents($blog_path, json_encode($new_blog_list, JSON_PRETTY_PRINT));

    header("Location: blog.php");
    exit();
?>
