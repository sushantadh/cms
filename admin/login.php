<?php
require '../includes/core.php';
$conn=$GLOBALS["connect"];

if(!loggedin())
{
if(isset($_POST['username'])&&isset ($_POST['password']))
{
    if(!empty($_POST['username'])&& !empty($_POST['password']))
    {
        $username=$_POST['username'];
        $password= md5($_POST['password']);
        
        $query="SELECT id from users WHERE username='".mysqli_real_escape_string($conn,$username) ."' and password='" .mysqli_real_escape_string($conn,$password) ."'";
        
        if($query_run=mysqli_query($conn,$query))
        {
            $mysql_num_rows=mysqli_num_rows($query_run);
            
            if ($mysql_num_rows==0)
            {
                $error='Invalid ID/Password combination';
            }
            else if ($mysql_num_rows==1)
            {
                $row=mysqli_fetch_row($query_run);
                $user_id=$row['0'];
                $_SESSION['user_id']=$user_id; //setting session called userid with value $user id
                header('Location:index.php');
            }
                
        }
    }
    else $error='All fields are required!';
}
}

else 
{
    header('Location:index.php');
    
}
?>




<html>
    <head>
        <title>Log In</title>
        <link rel="stylesheet" href="../stylesheet/style.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
    </head>
    
 <body>
   <div class="container">
        <a href="../index.php" id="logo"><h1><?php echo getsettings('site_name');?></h1></a>
        <hr>

        <h3>Log-in</h3>


            <form action="login.php" method="POST">
                <div class="error">
                    <?php 
                        if (isset($error))
                            {
                                echo $error;
                            }
                    ?>
                </div>
                <label class="password">Username</label>
                    <input type="text" name="username">
                <label class="password">Password</label>
                    <input type="password" name="password">
                <input type="submit" value="Login" name="login" class="mybutton"> <br>
            </form>
        </div>
    </body>
</html>


