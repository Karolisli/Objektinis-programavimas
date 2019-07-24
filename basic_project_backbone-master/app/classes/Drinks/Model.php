<?php 

namespace App\Drinks;

class Model{
    private $db;
    private $table_name = 'drinks';
    private $drink;
    // private $conditions;

    public function __construct(){
        $this->db = new \Core\FileDB(DB_FILE);    
        $this->db->load();
        $this->db->createTable($this->table_name); 
    }

    public function insert(Drink $drink){
        return $this->db->insertRow($this->table_name, $drink->getData());
    }

    public function get($conditions = []){
        $array = [];
        $rows = $this->db->getRowsWhere($this->table_name, $conditions);
        foreach($rows as $row){
            $drinks[] = new Drink($row);
        }
        return $drinks;
    }

    public function __destruct(){
        $this->db->save();
    }
}

var_dump();

?>