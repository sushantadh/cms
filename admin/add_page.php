<?php
require '../includes/core.php';

if(loggedin())
{
    if(isset($_POST['title'])&&isset ($_POST['content']))
    {
    if(!empty($_POST['title'])&& !empty($_POST['content']))
    {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $user=$_SESSION['user_id'];
        $a_type='1';
        $time=time();
        
        $query="INSERT INTO articles (user_id, type, title, content,time_stamp) VALUES ('$user', '$a_type', '$title', '$content', '$time')";
        
            
       $query_run=mysqli_query($GLOBALS["connect"],$query);
        if($query_run)
        {
            echo 'Page added successfully!';
        }
        
        else echo mysqli_error();
    }
        else 
        {
            $error='All fields are required!';
            echo $error;
        }
    }
}

else 
{
    $error='Please log in to continue';
}
?>




<html>
<head> 
    <title> Add Page</title>
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">

    <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
</head>
    
    <body>
       <div class="container">
        <a href="../index.php" id="logo"><h1><?php echo getsettings('site_name');?></h1></a>
         <hr>
       <?php admin_nav() ?>
        <hr>

        <h3>Add Page</h3>
        <?php 

            if(isset($error)){
                echo $error;
                die(); } 
            ?>
            <form action="add_page.php" method="post">
            <input type="text" name="title" size="50" autocomplete="off" placeholder="Aticle Title..."> <br><br>
        <textarea cols="50" rows="10" name="content">Article Content....</textarea>
            <br>
            <input type="submit" value="Add Page" class="mybutton"><br>
            </form>
        </div>
    
    
    </body>