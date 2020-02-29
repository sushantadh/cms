<?php require 'includes/core.php';?>

<?php
function view_articles()
{
$query= "SELECT a.id,a.user_id,a.title,a.content,a.time_stamp,u.first_name,u.last_name from articles a, users u where a.user_id=u.id AND a.type=0 order by a.time_stamp desc";

$query_run=mysqli_query($GLOBALS["connect"],$query);
    if (!$query_run)
        echo mysqli_error($GLOBALS["connect"]);

$read_more=getsettings('read_more');
while($query_row=mysqli_fetch_array($query_run))
{
    $content= $query_row['content'];
    $user=$query_row['user_id'];
    $article_id=$query_row['id'];
    $title=$query_row['title'];
    $time_stamp=$query_row['time_stamp'];
    $date= date(getsettings('date_format'),$time_stamp);
    $first_name=$query_row['first_name'];
    $last_name=$query_row['last_name'];

    ?>
<div class = title>
    <?php
    echo '<a href="article.php?id='.$article_id.'">' .strtoupper($title) .'</a> <br>';
    ?>
</div>

<div class = author>
        <?php
    echo $first_name .' ' .$last_name .' | '.$date;
   ?>
</div>

<div class = content>
    <?php
    echo substr($content,0,200) . '....<a href="article.php?id=' . $article_id . '">'. $read_more . '</a><br><br>';
    ?>
</div>

<?php
}
}
?>
