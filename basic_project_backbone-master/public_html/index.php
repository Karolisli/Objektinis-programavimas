<?php

require '../bootloader.php';

$nav = [
    'left' => [
        ['url' => '/', 'title' => 'Home']
    ]
];

// $drink = new App\Drinks\Drink([
//     'name' => 'Vodka',
//     'abarot' => 60,
//     'amount_ml' => 700,
//     'image' => '.jpg'
// ]);
// var_dump($drink);

// $filedb = new Core\FileDB(DB_FILE);

// $filedb->load();

// $filedb->createTable('drink');

// $filedb->insertRow('drink', $drink->getData()); 

// $filebd->getRowsWhere('drink', ['abarot' => 45]);

$modelDrinks = new App\Drinks\Model();

$drinks = $modelDrinks->get(['abarot' => 60]);

foreach($drinks as $drink){
    var_dump($drink);
    // $drink->setImage('/...');
    $modelDrinks->update($drink);
};



?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OOP</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script defer src="media/js/app.js"></script>
    </head>
    <body>
        <?php require ROOT . '/app/templates/navigation.tpl.php'; ?>
        
        <div class="content">
            <?php require ROOT . '/core/templates/form/form.tpl.php'; ?>
        </div>
    </body>
</html>
