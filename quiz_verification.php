<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Answers</title>
        <meta name="Daniel" content="Quiz answer">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="my_style.css">
    </head>

    <body>
        <?php
         $current_page = 'form';
         include('nav.php');
        ?>

        <?php
            $name = $_GET["name"];
            $email = $_GET["email"];

            if ($name === '' || $email === '')
            {
                echo "Please provide a name and/or email.";
            }

            $responses = array();
            array_push($responses, $_GET["quest1"]);
            array_push($responses, $_GET["quest2"]);
            array_push($responses, $_GET["quest3"]);
            array_push($responses, $_GET["quest4"]);
            array_push($responses, $_GET["quest5"]);

            foreach ($responses as $value)
            {
                if ($value === '')
                {
                    echo "Please answer all questions";
                    exit();
                }
            }

            /* --- Correct answers ---
                question 1: 1A
                question 2: 2C
                question 3: 3B
                question 4: C
                question 5: 5B
            */


            $correct_answers = array("1A", "2C", "3B", "C", "5B");

            $score = 0;
            $question_count = count($correct_answers);

            for ($i = 0; $i < $question_count; $i++)
            {
                if ($responses[$i] === $correct_answers[$i])
                {
                    $score++;
                }
            }

            $student_type = "";
            if ($score < 1)
            {
                $student_type = "Uninformed";
            }
            else if ($score < 3)
            {
                $student_type = "Basic";
            }
            else
            {
                $student_type = "Knowledgeable";
            }
        ?>

        <div>
            <h2 style="color: #957DAD">Quiz Results</h2>

            <table class="quiz_results">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Score Range</th>
                    </tr>
                </thead>
            <tbody>
                <tr class="<?= $student_type === 'Uninformed' ? 'highlight' : '' ?>">
                    <td>Uninformed student</td>
                    <td>You need to learn some history</td>
                    <td>0</td>
                </tr>
                <tr class="<?= $student_type === 'Basic' ? 'highlight' : '' ?>">
                    <td>Basic</td>
                    <td>You have a basic understanding of computer history</td>
                    <td>1 to 2</td>
                </tr>
                <tr class="<?= $student_type === 'Knowledgeable' ? 'highlight' : '' ?>">
                    <td>Knowledgeable</td>
                    <td>You are fairly knowledgeable in the history of computers</td>
                    <td>3 to 5</td>
                </tr>
            </tbody>
        </div>

        <?php
            include('footer.php');
        ?>
    </body>

</html>

