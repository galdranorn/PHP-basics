<?php
    session_start();
?>

<html>
    <head>
        <title>PHP basics</title>
    </head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./style.scss" />

    <body>
        <?php
            include "./Form/form.php";
            include "./Form/formReceived.php";
        ?>
    </body>

</html>