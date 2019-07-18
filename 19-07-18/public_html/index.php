<?php

require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

class ThailandSurprise {
    public $clothes;

    public function __construct($clothes){
        $this->clothes = $clothes;
    }
}

$new_clothes = new ThailandSurprise('miniskirt');
print $new_clothes->clothes;

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
