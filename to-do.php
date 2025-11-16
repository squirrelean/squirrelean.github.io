<?php

    require_once('includes/config.php');

    $ok = session_start();


    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true)
    {
        $BASE_URL = $_SERVER['HTTP_HOST'] . '/danastasio/';
        header('Location: http://' . $BASE_URL . 'login.php');
        exit();
    }

    if(isset($_COOKIE['username']))
    {
        $username = $_COOKIE['username'];
    }
    else
    {
        $username = '';
    }
?>

<?php
    $current_page = 'todo';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include('nav.php'); ?>

    <?php
        if ($username !== ''): ?>
            <h2>Welcome back, <?php echo htmlspecialchars($username); ?>!</h2>
        <?php endif; ?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Daniel</title>
        <meta name="Daniel" content="To-do list">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="my_style.css">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <script src="nav.js"></script>
    </head>

    <body>

        <form action="login.php" method="post" style="text-align: right; background-color: transparent">
            <button type="submit" name="logout">Log out</button>
        </form>

        <form onsubmit="addItem(event)">
            <fieldset>
                <legend>Add a to-do item!</legend>

                <div>
                    <label for="task">Enter a task to complete</label>
                    <input type="text" name="task" id="user_task">
                    <input type="submit" value="submit">
                </div>
            </fieldset>
        </form>

        <div>
            <h2>Tasks to complete:</h2>
            <ul id="todo_items">
            </ul>
        </div>

        <script src="todo.js"></script>

        <?php
            include('footer.php');
        ?>
    </body>
</html>
