<?php 

namespace App\Drinks;

class Model{
    private $db;
    private $table_name = 'drinks';
    private $drink;

    public function __construct($fileDB){
        $this->db = $fileDB;
        $this->db->load();
        $this->db->createTable($this->table_name); 
    }

    public function insert(Drink $drink){
        return $this->db->insertRow($this->table_name, $drink->getData());
    }

    public function get($conditions = []){
        $drinks = [];
        $rows = $this->db->getRowsWhere($this->table_name, $conditions);
        foreach($rows as $row_id => $row_data){
            $row_data['id'] = $row_id;
            $drinks[] = new Drink($row_data);
        }
        return $drinks;
    }

    public function update(Drink $drink){
        $this->db->updateRow($this->table_name, $drink->getId(), $drink->getData());
    }

    public function delete(Drink $drink){
        $this->db->deleteRow($this->table_name, $drink->getId());
    }

    public function __destruct(){
        $this->db->save();
    }
  
}

?>