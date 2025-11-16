<?php
    $current_page = 'home';
    include('nav.php');
?>

<?php
    require_once('includes/config.php');

    $ok = session_start();

    $logout = false;
    if (isset($_POST['logout']))
    {
        session_destroy();
        session_start();
        $logout = true;
    }

    if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true)
    {
        $BASE_URL = $_SERVER['HTTP_HOST'] . '/danastasio/';
        header('Location: http://' . $BASE_URL . 'to-do.php');
        exit();
    }

    $is_incorrect = false;

    // Mock database of passwords
    $password_database = array("b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff");

    $password_entered = '';
    $username = '';

    $attempt = null;
    $time_remaining = null;

    // Load existing attempts
    $file = 'login_attempts.json';
    if (file_exists($file))
    {
        $attempts = json_decode(file_get_contents($file), true);
    }
    else
    {
        $attempts = [];
    }

    //$hashed_password_entered = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$logout)
    {
        if (isset($_POST["username"]))
        {
            $username = $_POST["username"];
            setcookie("username", $username, time() + 3600*24);
        }

        $password_entered = hash("sha256", $_POST["password"]);

        if (!isset($attempts[$username]))
        {
            $attempts[$username] = ['attempts' => 0, 'locked_until' => 0];
        }

        if ($attempts[$username]['locked_until'] > time())
        {
            $time_remaining = $attempts[$username]['locked_until'] - time();
            file_put_contents($file, json_encode($attempts));
        }
        else
        {
            // This checks if the hashed entered password is in a database of hashed passwords.
            if (in_array($password_entered, $password_database) && !empty($username))
            {
                $BASE_URL = '';
                if ($_SERVER['SERVER_NAME'] === 'localhost')
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . '/';
                }
                else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca')
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . '/danastasio/';
                }
                else
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . '/';
                }

                $_SESSION['is_logged_in'] = true;

                header('Location: http://' . $BASE_URL . 'to-do.php');
                exit();
            }
            else
            {
                $is_incorrect = true;

                $attempts[$username]['attempts'] += 1;
                $attempt = $attempts[$username]['attempts'];

                // Lock after 3 attempts
                if ($attempts[$username]['attempts'] >= 3)
                {
                    $attempts[$username]['locked_until'] = time() + 30;
                    $time_remaining = 30;
                    $attempts[$username]['attempts'] = 0;
                }
            }
        }

        file_put_contents($file, json_encode($attempts));
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="my_style.css">
    </head>

    <body>
        <?php if ($logout): ?>
            <p>Sucessfully logged out</p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <fieldset>
                <legend>Login Required</legend>

                <div>
                    <label for="username">Enter the username:</label>
                    <input type="text" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                </div>
                <br>

                <div>
                    <label for="password">Enter the password:</label>
                    <input type="password" name="password">
                </div>

                <br>
                <div>
                    <input type="submit" value="Login">
                </div>

                <?php if ($is_incorrect || $time_remaining !== null): ?>
                    <p style="color: red; font-weight: bold;">
                        <?php if ($is_incorrect && $attempt !== null && $time_remaining === null): ?>
                            Wrong password. This is attempt # <?php echo $attempt; ?><br>
                        <?php endif; ?>

                        <?php if ($time_remaining !== null): ?>
                            Three wrong attempts. Locked out for <?php echo $time_remaining; ?> seconds
                        <?php endif; ?>
                    </p>
                <?php endif; ?>

            </fieldset>
        </form>

    <?php include('footer.php'); ?>

    </body>
</html>
