<?PHP 


class DB
{
    private $table;
    private $database;
    private $connection;

    public function __construct($table, $database){
        $this->table = $table;
        $this->database = $database;
    }

    public function Connect(): string{
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, $this->database);
        if ($this->connection -> connect_errno) {
            return "Failed to connect to MySQL: " . $this->connection -> connect_error;
        }
        return "Seccusfully connected!";
    }

    public function GiveAllData(): array{
        $resulte = $this->connection->query("SELECT * FROM {$this->table}  LIMIT 1");
        $row = $resulte->fetch_array();
        return $row;
    }

    public function ChangeData($username, $type, $put): string{
        $resulte = $this->connection->query("UPDATE {$this->table} SET {$type} = {$put} WHERE username = '{$username}'");
        if($resulte){
            return "Successed";
        }return "Error";
    }

    public function AddToTable($data): string{
        $keys = array_keys($data);
        $matching_keys = "";
        $counter = 1;
        foreach($keys as $key){
            if ($counter < count($keys)){
                $matching_keys = $matching_keys . $key . ", ";
                $counter ++ ;
            }else{
                $matching_keys = $matching_keys . $key;
            }
            
        }
        $values = array_values($data);
        $matching_val = "";
        $counter = 1;
        foreach($values as $val){
            if ($counter < count($values)){
                $matching_val = $matching_val ."'".$val."'". ", ";
                $counter ++ ;
            }else{
                $matching_val = $matching_val ."'".$val."'";
            }
            
        }
        $resulte = $this->connection->query("INSERT INTO {$this->table} ({$matching_keys}) VALUES ({$matching_val})");
        if($resulte){
            return "Successed";
        } return "Error";

        
    
    }

    public function DeleteFromTable($username): string{
        $resulte = $this->connection->query("DELETE FROM {$this->table} WHERE username = '{$username}'");
        if($resulte){
            return "Successed";
        } return "Error";
    }
    
    public function Check($username): array{
        $resulte = $this->connection->query("SELECT password FROM {$this->table} WHERE username = '{$username}'");
        if($resulte){
            return $resulte->fetch_array();
        }
    }
    public function GiveDataUnique($username){
        $resulte = $this->connection->query("SELECT * FROM {$this->table} WHERE username = '{$username}' LIMIT 1");
        if($resulte){
            return $resulte->fetch_array();
        }else{
            return "Error";
        }
    }

}