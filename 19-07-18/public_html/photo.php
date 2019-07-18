<?php

require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

class ThailandSurprise {
    public $clothes;
    private $balls;
    
    public function __construct($clothes){
        $this->clothes = $clothes;
        $this->balls = rand(true,false);
    }

    public function attachBalls(){
        $this->balls = true;
    }

    public function detachBalls(){
        $this->balls = false;
    }

    public function getPhoto(){
         if($this->balls){
            return 'https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.tts-group.co.uk%2Fon%2Fdemandware.static%2F-%2FSites-TTSGroupE-commerceMaster%2Fdefault%2Fdwdd6f3189%2Fimages%2Fhi-res%2F1003171_01_KPLAY.jpg&f=1';
         }else{
            return 'https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.pdsigns.ie%2FcontentFiles%2FproductImages%2FLarge%2FCSSB15.jpg&f=1';
        }
    }
}

$photo_plz = new ThailandSurprise ('smile');

$photo_plz->getPhoto();

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
            <img src="<?php print $photo_plz->getPhoto(); ?>" alt="photo">
        <!-- $form HTML generator -->
        <?php require '../templates/form.tpl.php'; ?>
    </body>
</html>
