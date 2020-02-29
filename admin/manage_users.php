<?php
require '../includes/core.php';
function manage_users() {
$query= "SELECT users.id,users.first_name,users.last_name,users.username from users";
$query_run=mysqli_query($GLOBALS["connect"],$query);
    if (!$query_run)
        echo mysql_error();
while($query_row=mysqli_fetch_array($query_run))
{
    $id=$query_row['id'];
    $first_name=$query_row['first_name'];
    $last_name=$query_row['last_name'];
    $username=$query_row['username'];
?>

<div class = title>
    <?php
    echo $first_name .' ' .$last_name.'  [' .$username .']';
    ?>
</div>

<div class=link>
    <?php
    echo'<a href="del_user.php?id='.$id.'">Delete</a>';
    ?>
</div>
<hr>
<?php
}
}
?>