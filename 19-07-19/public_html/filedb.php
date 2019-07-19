<?php

require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

class FileDB {
    private $file_name;
    private $data;
    
    public function __construct($file_name){
        $this->file_name = $file_name;
    }

    public function load(){
        if (file_exists($this->file_name)) {
            $encoded_string = file_get_contents($this->file_name);	

            if ($encoded_string !== false) {
                $this->data = json_decode($encoded_string, true);
            }
        }
    }

    public function getData(){
        if($this->data == null){
            $this->load();
            return $this->data;
        }else{
            $this->data;
        }
    }

    public function setData($data_array){
        $this->data = $data_array;
    }

    public function createTable($table_name){
        if(isset($this->data[$table_name])){
            return false;
        }else{
            $this->data[$table_name] = [];
            return true;
        }
    }

    public function dropTable($table_name){
        unset($this->data[$table_name]);
    }
}

$db = new FileDB(STORAGE_FILE);

$db->createTable('users');

$db->createTable('nothing');

$db->dropTable('nothing');

var_dump($db);



?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To PHP FightClub!</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="media/js/app.js"></script>    
    </head>
    <body>
        <!-- $nav Navigation generator -->
        <?php require '../templates/navigation.tpl.php'; ?>        


        <!-- $form HTML generator -->
        <?php require '../templates/form.tpl.php'; ?>
    </body>
</html>

