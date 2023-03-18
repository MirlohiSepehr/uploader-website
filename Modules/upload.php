<?PHP 


function give_title(){
    echo "Upload";
}

function give_content(){
    ?>
        <section class="upload-page">
            <?php 
            if(!isset($_SESSION['Account'])){
                ?>
                    <div class="upload-notice">
                        <p> You have limitaion becuase you didn't login to your account</p>
                        <p> You can't upload file more than 2mb!</p>
                        <p> Register or Login to your account now!</p>
                    </div>
                <?php
            }?>
            <div class="upload-inputs">
                <form method="post" enctype="multipart/form-data">
                    <label for="file" >File..</label>
                    <input type="file" class="upload-file" name="file" id="file">
                    <input type="submit" name="submit" class="upload-submit" value="Upload">
                </form>
            </div>
        </section>
    <?php
}

function start_process(){
    if(isset($_POST['submit'])){
        $file_size = $_FILES['file']['size'];
        $name = basename($_FILES['file']['name']);
        $tmp = $_FILES['file']['tmp_name'];
        $type = UPLOAD::CheckType($name);
        if(!isset($_SESSION['Account'])){
        
            if($file_size > 2097152){
                return "<div class='upload-error'><p style='color: red;'>You cannot upload file above 2mb becuase you didn't login to your account!</p></div>";
            }else{
                $status = UPLOAD::UploadFile($tmp, $type, False, $name);
                switch($status){
                    case "file_exists":
                        return "<div class='upload-error'><p style='color: red;'>This file is already uploaded before!</p></div>";
                    case "seccuess":
                        ?>
                        <script>
                            setTimeout(function(){
                                window.location.href = <?PHP echo MAIN_DIR; ?>+"linkmaker";
                            }, 3000);
                        </script>
                        <?PHP  
                        return "<div class='upload-error'><p style='color:green;' >Your file has been uploaded successfully!</p><br><p style='font-size: 20px;'>Making your link...</p></div>";
                    case "failed":
                        return "<div class='upload-error'><p style='color:red'>Something went wrong!</p></div>";
                    case "Type-Error":
                        return "<div class='upload-error'><p style='color:red'>Your file type is not suitable!(pdf, zip, png, jpg, gif)</p></div>";
                }
                
                
            }
        }else{
            $status = UPLOAD::UploadFile($tmp, $type, True, $name);
            switch($status){
                case "file_exists":
                    return "<div class='upload-error'><p style='color: red;'>This file is already uploaded before!</p></div>";
                case "seccuess":
                    ?>
                    <script>
                        setTimeout(function(){
                            window.location.href = <?PHP echo MAIN_DIR; ?>+"linkmaker";
                        }, 3000);
                    </script>
                    <?PHP
                    return "<div class='upload-error'><p style='color:green;' >Your file has been uploaded successfully!</p><br><p style='font-size: 20px;'>Making your link...</p></div>";    
                case "failed":
                    return "<div class='upload-error'><p style='color:red'>Something went wrong!</p></div>";
                case "Type-Error":
                    return "<div class='upload-error'><p style='color:red'>Your file type is not suitable!(pdf, zip, png, jpg, gif)</p></div>";
            }
        }
        
    }
}