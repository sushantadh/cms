<?php 
require 'manage_pages.php';
if(loggedin())
{
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
        <hr><br>
         <a href='add_page.php'> <button class="mybutton"><strong>Add New</strong></button></a><br>
<h2>Your Pages</h2>

<?php manage_pages();?> 
</html>
<?php 
}
else echo 'Please login to continue'; 
?>