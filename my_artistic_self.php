<!DOCTYPE html>

<html lang="en">

<head>
    <title>Artistic Page</title>
    <link rel="stylesheet" href="my_style.css">
    <style>
        .centered_box
        {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .centered_box img
        {
            width: 50%;
            height: auto;
        }

        .heading
        {
            background-color: rgb(235, 200, 155);
            margin: 1%;
        }

        .keywords
        {
            font-family: monospace;
        }

        #ingenuity
        {
            position: absolute;
            top: 25%;
            left: 10%;
            color: brown;
            font-size: 20px;
        }

        #solver
        {
            position: absolute;
            top: 35%;
            right: 20%;
            color:orangered;
            font-size: 25px;
        }

        #smart
        {
            position: absolute;
            top: 50%;
            right: 20%;
            color: chocolate;
            font-size: 15px;
        }

        #creative
        {
            position: absolute;
            top: 60%;
            left: 16%;
            color: coral;
            font-size: 30px;
        }

        #programming
        {
            position: absolute;
            top: 30%;
            left: 17%;
            color: darkslategrey;
            font-size: 30px;
        }

        p
        {
            font-size: 20px;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <?php
         $current_page = 'artistic';
         error_reporting(E_ALL);
         ini_set("display_errors", 1);
         include('nav.php'); ?>

    <div class="centered_box heading">
        <h2>The Starry Night</h2>
    </div>

    <div class="centered_box">
        <img src="artisticimageL.jpg">
        <p id="ingenuity" class="keywords">Ingenuity</p>
        <p id="solver" class="keywords"> Problem Solver</p>
        <p id="smart" class="keywords">Smart</p>
        <p id="creative" class="keywords">Creative</p>
        <p id="programming" class="keywords">Programming</p>
    </div>

    <div class="body_wrapper">
        <h3>About this page</h3>
        <p>Vincent van Gogh's paining The Starry Night has stood out to me every since I was a child.
            There is something about the colors, painting streaks, and atmosphere that makes the painting feel
            dreamlike, while also having grounds in reality. It makes me wonder about the origins of existence.
        </p>
        <p>
            The keywords I have listed above are how I think of my current self compared to my previous self.
            I feel that I have come a long way and have grown considerably.
        </p>
    </div>

    <?php
        include('footer.php');
    ?>
</body>

</html>
