<?PHP 


class User{
    public static function countMembers(){
        $connection = new DB("info", "sepehr");
        $connection->Connect();
        $data = $connection->GiveAllData();
        return $data;
    }

    public static function AddUser($username, $password, $email){
        $connection = new DB("users", "user");
        $connection->Connect();
        $connection->AddToTable(array(
            "username" => $username,
            "password" => $password, 
            "email" => $email
        ));
    }
    public static function CheckUser($username, $password): string{
        $connection = new DB('users', "user");
        $connection->Connect();
        $pass = $connection->Check($username);
        if($password == $pass['password']){
            return "seccuess";
        }return "failed";

    }
    public static function AddAmountOfUploaded($username){
        $connection = new DB('users', "user");
        $connection->Connect();
        $currentCount = $connection->GiveDataUnique($username)['uploaded'];
        $currentCount ++;
        if($connection->ChangeData($username, "uploaded", $currentCount)){
            return "seccuess";
        }
    }
    
}