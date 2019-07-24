<div class='receivedForm'>
    <?php
        // safety - if somebody got the link
        if (isset($_POST['login']) && isset($_POST['password'])) {
            
            // safety - if somebody did not enter the data
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                
                // safety - sanitize the data from outside
                $login = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
                $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
                
                // check if login and password are proper
                if ($login == "Admin" && $password == "1234") {
                    echo "<h1>Hello, $login</h1>";
                    echo "<p>You are logged in.</p>";  
                }
                else { typeError("wrong"); }
                
            }
            else { typeError("lack"); }
        }
        
        function typeError($errorType) {
            if ($errorType == "lack") { echo "<h1>You did not enter login and/or password</h1>"; }
            else if ($errorType == "wrong") { echo "<h1>You entered wrong login and/or password</h1>"; }
            echo "<p>Try again <a href='/kurs_php/'>here</a></p>";
        }
    ?>
</div>