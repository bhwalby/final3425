<html>
    <body>
        <p>Welcome to our website. Please select account type, then login:</p>
        <form method=post action=login.php >
        <input type="radio" name="type" value="student">Student </input><br>
        <input type="radio" name="type" value="instructor">Instructor </input><br>

            username:<input type="text" name="username"/><br>
            password:<input type="text" name="password"/><br>
            <button type="submit" name="login">Login</button>
            <?php
                require "functions.php"

                session_start();
                echo '<pre>';
                print_r($_SESSION);
                print_r($_POST);
                echo '</pre>';
                if(isset($_POST["login"]) && isset($_POST["type"])) {
                    if($_POST["type" == "student"]) {
                        if(authenticateStudent($_POST["username"], $_POST["password"]) == 1) { 
                            $_SESSION["username"]=$_POST["username"];
                            header("LOCATION:?????");
                            return;
                        } else {
                            echo '<p style="color:red">incorrect username and password'
                        }
                    } elseif($_POST["type") == "instructor") {
                        if(authenticateInstructor($_POST["username"], $_POST["password"]) == 1) { 
                            $_SESSION["username"]=$_POST["username"];
                            header("LOCATION:?????");
                            return;
                        } else {
                            echo '<p style="color:red">incorrect username and password'
                        }
                    }
                    
                }
                ?>
        </form>
    </body>
</html>