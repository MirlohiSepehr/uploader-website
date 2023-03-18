<?php

class Message{
    public static function AddMessage($name, $fname, $phone, $email, $message){
        $connection = new DB('messages', 'test');
        $connection->Connect();
        $status = $connection->AddToTable(
            array(
                "name" => $name,
                "family" => $fname,
                "phone" => $phone,
                "email" => $email,
                "message" => $message
            )
        );
        if($status == "Successed"){
            return True;
        }return False;
    }

    public static function SearchForData(){
        $connection = NEW DB('messages', 'test');
        $connection->Connect();
        $data = $connection->GiveAllData();
        return $data;
    }
}
