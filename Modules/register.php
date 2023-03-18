<?PHP 


function give_title(){
    echo "register";
}

function give_content(){
    ?>
        <section class="register-page">
            <form method="post">
                <div class="register-fields">
                    <div class="register-user-page">
                        <label for="register-user">Username:</label>
                        <input type="text" class="register-user" name="register-user" required>
                    </div>
                    <div class="register-pass-page">
                        <label for="pass-user">Password:</label>
                        <input type="password" class="register-pass" name="register-pass" required>
                    </div>
                    <div class="register-email-page">
                        <label for="pass-user">Email:</label>
                        <input type="text" class="register-email" name="register-email" required>
                    </div>
                    <div class="register-sub-page">
                        <input type="submit" id="register-submit" name="submit">
                    </div>
                </div>
            </form>
        </section>
    <?PHP
}

function start_process(){
    if(isset($_POST['submit'])){
        $username = $_POST['register-user'];
        $password = $_POST['register-pass'];
        $email = $_POST['register-email'];
        User::AddUser($username, $password, $email);
        $_SESSION['Account'] = array("username" => $username, "time" => time(), "upload" => array());
        
        // setcookie("session-timer", session_id($_SESSION['Account']), time()+60);
        header("Location: ".MAIN_DIR.'Home');

    }
}