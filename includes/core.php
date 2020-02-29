<?php
ob_start();
ini_set('display_errors',0);
session_start();

$conn_error='could not connect';
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass="";
$mysql_db='cms';
$connect=mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);

if(!$connect)
    die($conn_error);
?>

<?php
function loggedin(){
    if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
    {
        return true;
        $logged=1;
    }
    else
    {
        return false;
        $logged=0;
    }
}

function getfield($field){
    $query="SELECT $field FROM users WHERE id=".$_SESSION['user_id'];
    
    if($query_run=mysqli_query($GLOBALS["connect"],$query))
    {
        $result=mysqli_fetch_array($query_run);
        return ($result[$field]);
    }
    else echo mysqli_error($GLOBALS["connect"]);
}

function getsettings($field){
    $query="select * from site_config";
    $query_run=mysqli_query($GLOBALS["connect"],$query);
    while($query_row=mysqli_fetch_array($query_run)) {
    
        $setting[$query_row['meta']]=$query_row['value'];
    }

    return $setting[$field];
}

function dynamic_nav(){
    $query="select id,title from articles where type=1";
    $query_run=mysqli_query($GLOBALS["connect"],$query);
    while($query_row=mysqli_fetch_array($query_run)){
        $id=$query_row['id'];
        $page=$query_row['title'];
        
        echo '<a class="nav" href="article.php?id='.$id.'">'.$page.'</a>';
        
    }
echo '<a href="admin/login.php" style="float:right;">Admin</a>';
}

function admin_nav(){
    echo '<a class="nav" href="manage_users_view.php">Manage Users</a>
        <a class="nav" href="manage_articles_view.php">Manage Articles</a>
        <a class="nav" href="manage_pages_view.php">Manage Pages</a>
        <a class="nav" href="settings.php">Settings</a>
        <a class="nav" href="logout.php">[Log Out]</a>';
}

function _count()
{
    $query="SELECT COUNT(id) from articles WHERE type=0";
    $query_run=mysqli_query($GLOBALS["connect"],$query);
    $result=mysqli_fetch_row($query_run);
    $num['0']=$result[0]; 

    $query="SELECT COUNT(id) from articles WHERE type=1";
    $query_run=mysqli_query($GLOBALS["connect"],$query);
    $result=mysqli_fetch_row($query_run);
    $num['1']=$result[0];

    $query="SELECT COUNT(id) from users";
    $query_run=mysqli_query($GLOBALS["connect"],$query);
    $result=mysqli_fetch_row($query_run);
    $num['2']=$result[0];

    return($num);
}
?>
