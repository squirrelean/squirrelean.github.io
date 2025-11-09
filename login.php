<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Login</title>
        <meta name="Daniel" content="login page">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="my_style.css">
    </head>

    <body>
         <?php
         $current_page = 'home';
         include('nav.php');
         ?>

         <?php
            $is_incorrect = false;

            // Mock database of passwords
            $password_database = array("b14e9015dae06b5e206c2b37178eac45e193792c5ccf1d48974552614c61f2ff");

            $password_entered = '';
            //$hashed_password_entered = '';
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $password_entered = $_POST["password"];
                $password_entered = hash("sha256", $password_entered);
            }

            // This checks if the hashed entered password is in a database of hashed passwords.
            if (in_array($password_entered, $password_database))
            {
                $BASE_URL = '';
                if ($_SERVER['SERVER_NAME'] === 'localhost')
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . '/';
                }
                else if ($_SERVER['SERVER_NAME'] === 'osiris.ubishops.ca')
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . 'danastasio';
                }
                else
                {
                    $BASE_URL = $_SERVER['HTTP_HOST'] . '/';
                }

                header('Location: http://' . $BASE_URL . 'to-do.php');
                exit();
            }
            else
            {
                $is_incorrect = true;
            }
         ?>

        <form action="login.php" method="post">
            <fieldset>
                <legend>Login Required</legend>

                <div>
                    <label for="password">Enter the password:</label>
                    <input type="password" name="password">
                </div>
                <br>
                <div>
                    <input type="submit" value="Login">
                </div>

                <?php if ($is_incorrect && $password_entered !== ''): ?>
                    <p style="color: red; font-weight: bold;">
                        Incorrect Password!
                    </p>
                <?php endif; ?>
            </fieldset>
        </form>

        <?php
            include('footer.php');
        ?>
    </body>

</html>
