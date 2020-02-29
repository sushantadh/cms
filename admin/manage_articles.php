<?php
require '../includes/core.php';

function manage_articles() {
$query= "SELECT a.id,a.title,a.time_stamp,u.first_name,u.last_name from articles a, users u where a.user_id=u.id AND a.type=0 order by a.time_stamp desc";
$query_run=mysqli_query($GLOBALS["connect"],$query);
    if (!$query_run)
        echo 'error';
while($query_row=mysqli_fetch_array($query_run))
{
    
    $article_id=$query_row['id'];
    $title=$query_row['title'];
    $time_stamp=$query_row['time_stamp'];
    $date= date(getsettings('date_format'),$time_stamp);
    $first_name=$query_row['first_name'];
    $last_name=$query_row['last_name'];
?>

<div class = title>
    <?php
    echo strtoupper($title) .'<br>';
    ?>
</div>

<div class = author>
        <?php
    echo $first_name .' ' .$last_name .' | '.$date;
   ?>
</div>

<div class=link>
    <?php
    echo '<a href="edit_article.php?id='.$article_id.'">Edit</a> | ';
    echo '<a href="del_article.php?id='.$article_id.'">Delete</a> <br>';
    ?>
</div>
<hr>
<?php
}
}
?>