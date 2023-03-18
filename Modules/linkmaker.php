<?PHP 

function give_title(){
    return "Making your link";
}

function give_content(){
    if(!empty($_SESSION["Account"]['upload'])){
        $file = $_SESSION['Account']['upload'][0];
        ?>
            <section class="linkmaker">
                <div class="linkmaker-img-box">
                    <img src="<?PHP echo $file;?>" alt="Test">
                </div>
                <div class="linkmaker-links">
                    <p>Your file is ready to use!</p>
                    <a href="<?PHP echo $file; ?>" download>
                        Click here for download
                    </a>
                    <p>Your link URL: <?PHP echo 'localhost'.MAIN_DIR.$file; ?></p>
                </div>
            </section>
            
        <?PHP 
        unset($_SESSION['Account']['upload'][0]);
        
    }else{
        return "Somthing went wrong!";
    }
}