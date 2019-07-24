<div class='receivedForm'>
    <?php
        echo var_dump($_SESSION);
        // log out functionality on button
        if (isset($_GET['action']) && $_GET['action'] == 'logout') { 
            logOut();
        }
        if (isset($_SESSION['isLogged'])) {
            // safety - log out after 10mins session
            if ($_SESSION['isLogged']==1 && (time() - $_SESSION['time'] > 600)) { 
                logOut();             
            }
            // safety - if somebody send us the link with sessionID
            if ($_SESSION['isLogged']==1 && ($_SESSION['computerInfo']!= $_SERVER['HTTP_USER_AGENT'])) {
                logOut();
            }
        }
    
        // check if there is login/password OR isLogged == 1
        if ((isset($_POST['login']) && isset($_POST['password']) ) || (isset($_SESSION['isLogged']) && $_SESSION['isLogged']==1)) {
            
            // check if login/password is not empty OR isLogged == 1
            if ((!empty($_POST['login']) && !empty($_POST['password'])) || $_SESSION['isLogged']==1) {

                // if no session open
                if ($_SESSION['isLogged']==0) {
                    // don't trust the data from outside - sanitize
                    $login = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
                    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
                }

                //
                if (($login == "Admin" && $password == "1234") || $_SESSION['isLogged']==1) {
                    
                    // if typed login/password right, change $_SESSION data
                    if ($_SESSION['isLogged']==0) {
                        $_SESSION['login']=$login;
                    }
                    $_SESSION['isLogged']=1;
                    $_SESSION['time'] = time();
                    $_SESSION['computerInfo'] = $_SERVER['HTTP_USER_AGENT'];
                    
                    echo "<h1>Hello, ".$_SESSION['login']."</h1>";
                    echo "<p>You are logged in.</p>"; 
                    echo "<a href='index.php'> Refresh </a>";
                    echo "<a href='index.php?action=logout'> Log out </a>"; // action made with $_GET
                }
                else { typeMsg("wrongData"); }
            }
            else { typeMsg("lackOfData"); }
        }
     
        
        function typeMsg($msgType) {
            if ($msgType == "lackOfData") { 
                echo "<h1>You did not enter login and/or password</h1>"; 
                echo "<p>Try again <a href='/kurs_php/'>here</a></p>";
            }
            else if ($msgType == "wrongData") { 
                echo "<h1>You entered wrong login and/or password</h1>"; 
                echo "<p>Try again <a href='/kurs_php/'>here</a></p>";
            }
            else if ($msgType == "logOut") {
                echo "<h1>You are logged out.</h1>"; 
                echo "<p>If you want to log in again, click <a href='/kurs_php/'>here</a></p>";
            }
        }
        
        function logOut() {
            $_SESSION['isLogged'] = 0;
            session_destroy();
            typeMsg("logOut");
        }
    ?>
</div>