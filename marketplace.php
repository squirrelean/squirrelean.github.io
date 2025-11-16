<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Marketplace</title>
        <link rel="stylesheet" href="my_style.css">
    </head>

    <body>
        <?php
         $current_page = 'marketplace';
         error_reporting(E_ALL);
         ini_set("display_errors", 1);
         include('nav.php'); ?>

        <p>
            <script src="Lab5_files/1-marketplace.js"></script>
        </p>
        <?php
            include('footer.php');
        ?>
    </body>
</html>
