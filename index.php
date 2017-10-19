<?php
    include('config.php');
    include('php/classes/question.class.php');
    $pdo=new PDO('mysql:host=' . $bdd['host'] . ';dbname=' . $bdd['dbname'], $bdd['user'], $bdd['pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // Connexion à la BDD
    //$connexion = mysqli_connect($bdd['host'], $bdd['user'], $bdd['pwd'], $bdd['dbname']);

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="<?php echo $metaDescription ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        

        <?php
            include($themePath . 'header.php');
            include($themePath . 'question.php');
        ?>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="<?php echo $themePath . 'css/style.css' ?>">

        
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <div class='question-wrapper'>
        <?php
            print ($intro);
            print ('<div><button id="btn-start">' . $introBtnLabel . '</button></div>');
            //$questionActive = new Question('1');
            //print ($questionActive->render());
        ?>
    </div>
    <div class='points-wrapper'>
        <span id="points-counter">0</span> Point(s)
    </div>

       <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <?php
            include($themePath . 'body.php');
            include('php/ajax.php');
        ?>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','<?php echo $googleAnalyticsId ?>','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>

 
        

        <?php
            include($themePath . 'script.php');
        ?>

    </body>
</html>
