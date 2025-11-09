<!DOCTYPE html>

<html land="en">
    <head>
        <Title>My Trip to Italy</Title>
        <meta name="Daniel" content="Vacation">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="my_style.css">

        <style>
            #forza
            {
                float: right;
            }

            .main_text
            {
                float: right;
            }

            .main_section
            {
                width: 90%;
            }
        </style>
    </head>

    <body>
        <?php
         $current_page = 'vacation';
         error_reporting(E_ALL);
         ini_set("display_errors", 1);
         include('nav.php'); ?>

        <div class="body_wrapper" class="main_section">
            <h1>Italy 2025</h1>
            <p class="main_text">
                <img id="forza" src="vacationforza.jpeg" style="border: 5px solid black; border-radius: 2%;" Picture of Forza Napoli" width="500" height="500">
                On June 1st, 2025, I boarded my flight heading to Naples at the Montreal-Pierre Elliot Trudeau airport alongside my mother and sister.
                I would arrive at the Naples International Airport on June 2nd around noon, where I would then make my way down to San Giuseppe,
                grabbing some fresh pizza along the way to our appartement. Every day spent in Naples was a memoriable adventure. One of our more
                notable advanetures was our visit to the ancient ruins of Pompeii. After spending a total of five days in Naples, we took a ferry
                to the island of Sardinia, where we would remain for the majority of our vacation.
            </p>
        </div>

        <?php
            include('footer.php');
        ?>
    </body>
</html>
