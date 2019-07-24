<div class='receivedForm'>
    <?php
        // safety - if somebody got the link
        if (isset($_POST['login']) && isset($_POST['password'])) {
            
            // safety - if somebody did not enter the data
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                echo '<h1>Hello, '.$_POST["login"].'</h1>';
                echo "<p>You are logged in.</p>";  
            }
            else typeError();
        }
        else typeError();
        
        function typeError() {
            echo "<h1>You did not enter login and/or password</h1>";
            echo "<p>Try again <a href='/'>here</a></p>";
        }
    ?>
</div>