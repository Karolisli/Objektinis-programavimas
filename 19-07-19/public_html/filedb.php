<?php
require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

class FileDB {

    private $file_name;
    private $data;

    public function __construct($file_name) {
        $this->file_name = $file_name;
    }

    public function load() {
        if (file_exists($this->file_name)) {
            $encoded_string = file_get_contents($this->file_name);

            if ($encoded_string !== false) {
                $this->data = json_decode($encoded_string, true);
            }
        }
    }

    public function getData() {
        if ($this->data == null) {
            $this->load();
            return $this->data;
        } else {
            $this->data;
        }
    }

    public function setData($data_array) {
        $this->data = $data_array;
    }

    public function createTable($table_name) {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    public function dropTable($table_name) {
        unset($this->data[$table_name]);
    }

    public function tableExists($table_name) {
        if (isset($this->data[$table_name])) {
            return true;
        } else {
            return false;
        }
    }

    public function insertRow($table_name, $row, $row_id = null) {
        if ($this->tableExists($table_name)) {
            if ($row_id) {
                $this->data[$table_name][$row_id] = $row;
            } else {
                $this->data[$table_name][] = $row;
            }
            return true;
        }
        return false;
    }

    public function rowExists($table_name, $row_id) {
        if (isset($this->data[$table_name][$row_id])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type string $table_name
     * @param type string $row
     * @param type string $row_id
     * @return false or true
     */
    public function rowInsertIfNotExists($table_name, $row, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            return false;
        } else {
            $this->insertRow($table_name, $row, $row_id);
        }
    }

    /**
     * 
     * @param type string $table_name
     * @param type string $row_id
     * @param type string $row
     * @return false or true
     */
    public function updateRow($table_name, $row_id, $row) {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id][$row] = $row;
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param type string $table_name
     * @param type string $row_id
     * @return delete row or false
     */
    public function deleteRow($table_name, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }
        return false;
    }

    /**
     * 
     * @param type string $table_name
     * @param type string $row_id
     * @return getrow or false
     */
    public function getRow($table_name, $row_id) {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }
        return false;
    }

    public function getRowsWhere($table_name, $conditions) {
        $rows = [];

        foreach ($this->data[$table_name] as $row_id => $row) {
            $conditions_met = true;
            foreach ($conditions as $cond_id => $cond_value) {
                $row_value = $row[$cond_id];
                if ($row_value != $cond_value) {
                    $conditions_met = false;
                    break;
                }
            }

            if ($conditions_met) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

}

$db = new FileDB(STORAGE_FILE);

$db->createTable('users');

var_dump($db);

var_dump($db->getRowsWhere('users', 'thing'));
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

