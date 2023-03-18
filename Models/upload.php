<?PHP

class UPLOAD
{

    public static function CheckType($file): string{
        $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return $fileType;
    }
    public static function UploadFile($file, $type, $account, $filename): string{
        $type_list = array("jpg", "png", "gif", "pdf", "zip");
        $type_status = 0;
        $counter = 0;
        $where = UPLOAD_IMG;
        foreach($type_list as $check){
            if($check == $type){
                $type_status = 1;
                if($counter > 2){
                    $where = UPLOAD_FILE;
                }
            }else{
                $counter ++;
            }
        }
        if($type_status == 1){
            if($account){
                User::AddAmountOfUploaded($_SESSION['Account']['username']);
                if(!file_exists($where.$filename)){
                    if(move_uploaded_file($file, $where.$filename)){
                        array_push($_SESSION['Account']['upload'], $where.$filename);
                        return "seccuess";

                    }return "failed";
                }return "file_exists";
            }else{
                if(!file_exists($where.$filename)){
                    if(move_uploaded_file($file, $where.$filename)){
                        array_push($_SESSION['Account']['upload'], $where.$filename);
                        return "seccuess";
                    }return "failed";
                }return "file_exists";
            }
        }else{
            return "Type-Error";
        }
    }
}