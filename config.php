<?PHP 

session_start();

define('DB_NAME', "sepehr");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_HOST', "localhost");
define("MAIN_DIR", "/Site/");
define("UPLOAD_IMG", 'images/');
define("UPLOAD_FILE", 'Files/');
#------------------- importing files:


function LoadWeb(){
    require_once("Modules/keys.php");
    foreach (glob("Models/*.php") as $file){
        require_once($file);
    }
    if(function_exists("looking_for_pass")){
        if(looking_for_pass()){
            
            require_once('Modules/adminkey.php');
        }
    }
    
    foreach (glob("DATABASE/*.php") as $file){
        require_once($file);
    }

    if(function_exists("give_require_path")){
        require_once(give_require_path());
    }
    include_once("view/templates/header.php"); 
    if(function_exists("give_content")){
        echo give_content();
    }
    if(function_exists('start_process')){
        echo start_process();
    }
    include_once("view/templates/footer.php");
    
}
