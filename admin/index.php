<?php require '../includes/core.php';
if(loggedin())
{
    $name=getfield('first_name');
    $number=_count();
?>
<html>
    <head>
        <title><?php echo getsettings('site_name');?></title>
        <link rel="stylesheet" href="../stylesheet/style.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
    
    </head>    
    
 <body>
    <div class="container">
        <a href="../index.php" id="logo"><h1><?php echo getsettings('site_name');?></h1></a>
        
        <hr>
       <?php admin_nav() ?>
        <hr>
        <br>
<h2> Welcome, <?php echo $name; ?> </h2>
Number of Articles:<strong><?php echo $number['0'];?></strong><br><br>
Number of Pages:<strong><?php echo $number['1'];?></strong><br><br>
Number of Users:<strong><?php echo $number['2'];?><br></strong><br>
 </body>
 </html>
 <?php
}
else echo 'please login to continue'; 
?>
