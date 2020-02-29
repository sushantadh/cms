<?php require 'view_articles.php';
 ?>

<html>
    <head>
        <title><?php echo getsettings('site_name');?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/style.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
    
    </head>    
    
 <body>
    <div class="container">
        <a href="index.php" id="logo"><h1><?php echo getsettings('site_name');?></h1></a>
        
        <hr>
        <?php dynamic_nav(); ?>
        <hr>
        <br><br>
        <?php
        view_articles();
?>
            <div> 
            <hr>
        </div>
        </div>

</body>
</html>