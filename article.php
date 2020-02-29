<?php
require 'includes/core.php';
$id=$_GET['id'];

$query= "SELECT a.user_id,a.title,a.content,a.time_stamp,u.first_name,u.last_name from articles a, users u where a.user_id=u.id AND a.id=$id";
if(!$query_run=mysqli_query($GLOBALS["connect"],$query))
    echo mysql_error();

$query_row=mysqli_fetch_array($query_run);

    $title=$query_row['title'];
    $content= $query_row['content'];
    $time_stamp=$query_row['time_stamp'];
    $date= date(getsettings('date_format'),$time_stamp);
    $first_name=$query_row['first_name'];
    $last_name=$query_row['last_name'];
?>

<html>
    <head>
        <title><?php echo getsettings('site_name');?></title>
        <link rel="stylesheet" href="stylesheet/style.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
    
    </head>    
    
 <body>
    <div class="container">
        <a href="index.php" id="logo"><h1><?php echo getsettings('site_name');?></h1></a>     
        <hr>
        <?php dynamic_nav(); ?>
        <hr>
        <br><br>
<div class = title>
    <?php
    echo strtoupper($title) .'<br>';
    ?>
</div>

<div class = content>
    <?php
    echo $content;
    ?>
</div>
<div class = date>
    <?php
    echo $date .'<br>';
    ?>
</div>
    <div class = author>
        <?php
    echo $first_name .'  ' .$last_name.'<br><br>';
   ?>
</div>
    </div>
</html>