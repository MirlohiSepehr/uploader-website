<?PHP 


function register_key(){
    if(!isset($_SESSION['Account'])){
        ?>
        <a href="<?PHP echo MAIN_DIR;?>register">Register</a>
        <a href="<?PHP echo MAIN_DIR;?>login">Login</a>
        <?PHP
    }
}