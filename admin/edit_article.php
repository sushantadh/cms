<?php
require '../includes/core.php';
$id=$_GET['id'];
if(loggedin())
{
$query="SELECT title,content FROM cms.articles where id=$id";
       $query_run=mysqli_query($GLOBALS["connect"],$query);
       $query_row=mysqli_fetch_array($query_run);
        if($query_run) {
           $title_old=$query_row['title'];
            $content_old=$query_row['content'];
        }

    if(isset($_POST['title'])&&isset ($_POST['content']))
    {
    if(!empty($_POST['title'])&& !empty($_POST['content']))
    {
        $title=$_POST['title'];
        $content=$_POST['content'];
        $user=$_SESSION['user_id'];
        
        $query="UPDATE cms.articles SET title='$title',content='$content' where id=$id";
       $query_run=mysqli_query($GLOBALS["connect"],$query);
        {
            echo 'Aticle updated successfully!';
        }
        
    }
        else 
        {
            $error='Could not edit article';
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
    <title> Add Article</title>
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

        <h3>Edit Your Article</h3>
            
            <?php 

            if(isset($error)){
                echo $error;
                die(); } 
            ?>
            <form action="edit_article.php?id=<?php echo $id;?>" method="post">
            <input type="text" name="title" size="50" autocomplete="off" value="<?php echo $title_old?>" > <br><br>
        <textarea cols="50" rows="10" name="content"><?php echo $content_old ?></textarea>
            <br>
            <input type="submit" value="Add Article" class="mybutton"><br>
            </form>
        
       
        
        
        
        </div>
    
    
    </body>
</html>