<?PHP 


function check_rout(): string{
    $path = $_SERVER['REQUEST_URI'];
    $File_name = str_replace(MAIN_DIR,'', $path);
    return $File_name;
}
function give_require_path() : string{
    if(!empty(check_rout())){
        
        if(file_exists('./Modules/'.check_rout().'.php')){
            return 'Modules/'.check_rout().'.php';
        }else{
            return 'Modules/Home.php';
        }
    }else{
        return 'Modules/Home.php';
    }
}
function looking_for_pass(){
    if(isset($_COOKIE['admin'])){
        return True;
    }else{
        if (check_rout() == "MyPassword"){
            setcookie('admin', 'nothing', time()+60*2);
            return True;
        }else{
            return False;
        }
    }
    
}
