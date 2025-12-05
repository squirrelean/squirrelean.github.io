<?php
        $current_page = 'blog';
        include('nav.php');

        // Kick user out if they are not logged in.
        $ok = session_start();
        if (empty($_SESSION['is_logged_in']))
        {
            header("Location: login.php");
            exit();
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add New Post</title>
        <meta name="Daniel" content="Blog Post">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
                    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                    crossorigin="anonymous">
        <link rel="stylesheet" href="my_style.css">
    </head>

<body>

    <div class="container mt-4">
        <h3>Create a blog post</h3>

        <form action="save_post.php" method="post">

            <div class="form-group">
                <label for="title">Blog Title</label>
                <input class="form-control" type="text" name="new_blog_title" required>
            </div>

            <div class="form-group">
                <label for="content">Text</label>
                <textarea class="form-control" name="new_blog_paragraphs" rows="10" required></textarea>
            </div>

            <button type="submit" class="btn btn-secondary">Save</button>
            <a href="blog.php" class="btn btn-danger">Cancel</a>

        </form>
    </div>

</body>
</html>
