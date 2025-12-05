<?php
         $current_page = 'blog';
         error_reporting(E_ALL);
         ini_set("display_errors", 1);
         include('nav.php');
?>

<?php
    require_once('includes/config.php');
    $ok = session_start();

    $_SESSION['login_redirect'] = $_SERVER['REQUEST_URI'];


    // Load blog posts into an array from blogs.json.
    //$blog_path = '/workspaces/211031247/squirrelean.github.io/blogs.json';
    $blog_path = __DIR__ . '/blogs.json'; // This may be more efficient for osiris.
    $blogs = [];
    $json_file = file_get_contents($blog_path);
    $blogs = json_decode($json_file, true);
?>



<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Blog Post</title>
        <meta name="Daniel" content="Blog Post">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
                integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                crossorigin="anonymous">
        <link rel="stylesheet" href="my_style.css">
    </head>

    <body>
        <canvas id="canvas_animation"></canvas>

        <div>
            <button id="change_theme" class="btn btn-secondary mt-2 ml-2 float-right">Change Theme</button>

            <!-- Check if the user is logged in -->
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
                <!-- Show the button to add a new post -->
                <a href="add_new_blog.php" class="btn btn-outline-success mt-2">Add Post</a>

                <!-- Show a logout button  -->
                <form action="login.php" method="post" style="background: transparent">
                    <button class="btn btn-outline-dark mt-2 ml-2 float-right" type="submit" name="logout">Logout</button>
                </form>

            <?php else: ?>
                <a href="login.php" class="btn btn-secondary mt-2 ml-2 float-right">Login</a>
            <?php endif; ?>
        </div>
        <!-- Hero section -->
        <div class="container mt-4">
            <header class="jumbotron p-4 text-dark rounded">
                <div class="container">
                    <h1 class="display-4">SqrlBlog</h1>
                    <p class="lead">Created to showcase some of my personal projects.</p>
                </div>
            </header>
        </div>

        <!-- Contains blog posts and aside section-->
        <div class="row">

            <!-- Blog Section -->
            <div class="col-md-8">

                <!-- Search bar -->
                <input id="search_bar" class="form-control mb-2" type="text" placeholder="Search for a post">

                <!-- Sorting option to sort through posts by their date -->
                <select id="sorting_option" class="form-control mb-2 col-md-2">
                    <option value="newest">Sort by newest</option>
                    <option value="oldest">Sort by oldest</option>
                </select>

                <?php
                    // Load each blog array
                    foreach ($blogs as $blog):
                        $blog_id = $blog['id'];
                        $title = $blog['title'];
                        $date = $blog['date'];
                        ?>

                        <article id="<?=$blog_id?>" class="post card mb-3">

                            <!-- Delete button above every blog only for logged in users -->
                            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
                                <form action="delete_post.php" method="post" style="background: transparent">
                                    <input type="hidden" name="id" value="<?=$blog_id?>">
                                    <button type="button" class="btn btn-danger btn-sm delete-btn float-right" data-id="<?=$blog_id?>">Delete</button>
                                </form>
                            <?php endif; ?>

                            <!-- Blog posts -->
                            <div class="card-body">
                                <h3 class="card-title"> <?=$title?></h3>
                                <p class="card-subtitle mb-2">Date: <?=$date?></p>
                                <div class="card-text">
                                    <?php
                                    foreach ($blog['paragraphs'] as $paragraph)
                                    {
                                        echo '<p>'.$paragraph.'</p>';
                                    }
                                    ?>
                                </div>
                                <span class="collapsible">......</span>
                            </div>
                        </article>
                    <?php endforeach;
                ?>
            </div>

        <!-- Aside section -->
        <aside class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Blog Posts</h5>
                    <hr>
                    <ul class="list-unstyled">
                        <?php
                            foreach ($blogs as $blog): ?>
                            <li>
                                <a href="#<?=$blog['id']?>">
                                    <?=$blog['title']?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </aside>


    </div>
</div>

        <script src="blog.js"></script>
        <script src="canvas.js"></script>
    </body>

</html>
