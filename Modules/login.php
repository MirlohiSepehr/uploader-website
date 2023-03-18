<?PHP 


function give_title(){
    echo "login";
}

function give_content(){
    ?>
        <section class="login-page">
            <form method="post">
                <div class="login-fields">
                    <div class="login-user-page">
                        <label for="login-user">Username:</label>
                        <input type="text" class="login-user" name="login-user" required>
                    </div>
                    <div class="login-pass-page">
                        <label for="pass-user">Password:</label>
                        <input type="password" class="login-pass" name="login-pass" required>
                    </div>
                    <div class="login-sub-page">
                        <input type="submit" id="login-submit" name="submit">
                    </div>
                </div>
            </form>
        </section>
    <?PHP
}

function start_process(){
    if(isset($_POST['submit'])){
        $user = $_POST['login-user'];
        $pass = $_POST['login-pass'];
        $status = User::CheckUser($user, $pass);
        if($status == "seccuess"){
            $_SESSION['Account'] = array("username" => $user, "time" => time(), "upload" => array());
            
            header("Location:".MAIN_DIR."Home");
        }
    }
}