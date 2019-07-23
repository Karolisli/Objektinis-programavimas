<?php
declare (strict_types = 1);
require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

class Drink {
    private $data;
    
    public function __construct($data) {
        $this->data = [
        'name' => null,
        'amount_ml' => null,
        'abarot' => null,
        'image' => null
        ];

    }

    public function getData(){
        return [
            'name' => $this->getName(),
            'amount_ml' => $this->getAmount(),
            'abarot' => $this->getAbarot(),
            'image' => $this->getImage(),
        ];
    }

    public function setName($name){
        $this->data['name'] = $name;
    }

    public function getName(){  
        return $this->data['name'];
    }

    public function setAmount($amount_ml){
        $this->data['amount_ml'] = $amount_ml;
    }

    public function getAmount(){
        return $this->data['amount_ml'];
    }

    public function setAbarot($abarot){
        $this->data['abarot'] = $abarot;
    }

    public function getAbarot(){
        return $this->data['abarot'];
    }

    public function setImage($image){
        $this->data['image'] = $image;
    }

    public function getImage(){
        return $this->data['image'];
    }
}

$db = new Drink(STORAGE_FILE);

$db->getName('one');

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

