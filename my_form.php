<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Quiz</title>
        <meta name="Daniel" content="Quiz form">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="my_style.css">

        <script src="form.js"></script>
    </head>

    <body>
        <?php
         $current_page = 'form';
         error_reporting(E_ALL);
         ini_set("display_errors", 1);
         include('nav.php'); ?>

        <form onsubmit="return validate(event)" action="quiz_verification.php" method="get">
            <fieldset>
                <legend>Quiz Form</legend>

                <div>
                    <label for="name">Enter your name:</label>
                    <input type="text" name="name" id="user_name">
                </div>
                <div>
                    <label for="email" name="email">Enter your email:</label>
                    <input type="email" name="email" id="user_email">
                </div>

                <div>
                    <h4>Who created the C programming language?</h4>
                    <input type="radio" id="q1a" value="1A" name="quest1">
                    <label for="q1a">Dennis Ritchie</label>

                    <input type="radio" id="q1b" value="1B" name="quest1">
                    <label for="q1b">Dennis Raynolds</label>

                    <input type="radio" id="q1c" value="1C" name="quest1">
                    <label for="q1c">Linus Torvalds</label>
                </div>

                <div>
                    <h4>What language was developed by James Gosling at Sun Microsystems?</h4>
                    <input type="radio" id="q1a" value="2A" name="quest2">
                    <label for="q2a">C</label>

                    <input type="radio" id="q1b" value="2B" name="quest2">
                    <label for="q2b">Python</label>

                    <input type="radio" id="q1c" value="2C" name="quest2">
                    <label for="q2c">Java</label>
                </div>

                <div>
                    <h4>What does the recursive acronum GNU stand for?</h4>
                    <input type="checkbox" id="q3a" value="3A" name="quest3">
                    <label for="q3a">Generic Number Compiler</label>

                    <input type="checkbox" id="q3a" value="3B" name="quest3">
                    <label for="q3a">GNU's Not Unix</label>

                    <input type="checkbox" id="q3a" value="3C" name="quest3">
                    <label for="q3a">Great Number Compiler</label>
                </div>

                <div>
                    <h4>Languages</h4>
                    <label for="quest4">Which of the following programming languages was created first?</label>
                    <select name="quest4">
                        <option value="">Select one</option>
                        <option value="C">C</option>
                        <option value="Java">Java</option>
                        <option value="Python">Python</option>
                        <option value="Javascript">Javascript</option>
                    </select>
                </div>

                <div>
                    <h4>What does BIOS stand for?</h4>
                    <input type="checkbox" id="q4a" value="5A" name="quest5">
                    <label for="q4a">Binary Input Output System</label>

                    <input type="checkbox" id="q4b" value="5B" name="quest5">
                    <label for="q4b">Basic Input Output System</label>

                    <input type="checkbox" id="q4c" value="5C" name="quest5">
                    <label for="q4c">Boosted Input Output System</label>
                </div>
                <br>
                <div>
                    <h1>Submit your answer!</h1>
                    <input type="submit" value="submit">
                </div>

            </fieldset>
        </form>

        <?php
            include('footer.php');
        ?>

    </body>
</html>
