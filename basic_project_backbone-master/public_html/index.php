<?php

require '../bootloader.php';

$nav = [
    'left' => [
        ['url' => '/', 'title' => 'Home']
    ]
];

// $modelDrinks = new App\Drinks\Model();

$thing = \App\App::$db->getData();
var_dump($thing);

$db = new \Core\FileDB(DB_FILE);

$modelDrinks = new App\Drinks\Model($db);

// $drinks = new App\Drinks\Drink([
//         'name' => '',
//         'abarot' => 0,
//         'amount_ml' => 0,
//         'image' => 'https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.mailleworks.com%2Fimages%2Fdrawing%2Ffull_jap4_transparent.gif&f=1'
//     ]);
    
// // var_dump($drinks);

// $modelDrinks->insert($drinks);

// $filedb = new Core\FileDB(DB_FILE);

// $filedb->load();

// $filedb->createTable('drink');

// $filedb->insertRow('drink', $drink->getData()); 

// $filebd->getRowsWhere('drink', ['abarot' => 45]);

// var_dump($modelDrinks->get());

$drinks = $modelDrinks->get();

// foreach($drinks as $drink){
//     // var_dump($drink);
//     // $drink->setImage('/...');
//     $modelDrinks->update($drink);
// };

$form = [
    'attr' => [
        'method' => 'POST'
    ],
    'fields' => [
        'name' => [
            'label' => 'Gerimas',
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ]
            ]
        ],
        'amount_ml' => [
            'label' => 'Kiekis ml',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ]
            ]
        ],
        'abarot' => [
            'label' => 'Stiprumas',
            'type' => 'number',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ]
            ]
        ],
        'image' => [
            'label' => 'Nuotrauka',
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty'
                ]
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Itraukti',
            'extra' => [
                'attr' => [
                    'class' => 'blue-btn'
                ]
            ]
        ],
        'delete' => [
            'title' => 'Isgert visus',
            'extra' => [
                'attr' => [
                    'class' => 'blue-btn'
                ]
            ]
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];

$filtered_input = get_form_input($form);

function form_success($filtered_input, &$form, $modelDrinks) {
    $modelDrinks->insert(new App\Drinks\Drink($filtered_input));
}

function form_fail() {
    print 'fail';
}

switch (get_form_action()) {
    case 'submit':
        validate_form($filtered_input, $form, $modelDrinks);
        break;
    case 'delete':
        foreach ($modelDrinks->get() as $drink) {
            $modelDrinks->delete($drink);
        }
}

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
        <?php foreach($drinks as $drink): ?>
        <div class='box'>
            <h4><?php print 'Pavadinimas:'.' '. $drink->getName(); ?></h4>
            <p><?php print 'Stiprumas:' .' '. $drink->getAbarot() .' '. '%'; ?></p>
            <p><?php print 'Kiekis:' .' '. $drink->getAmount() .' '. 'ml'; ?></p>
            <img src="<?php print $drink->getImage(); ?>">
        </div>    
        <?php endforeach; ?>
    </body>
</html>
