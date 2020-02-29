<?php
require '../includes/core.php';
$conn=$GLOBALS["connect"];


if (loggedin())
{

    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['f_name'])&&isset($_POST['l_name']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $pass_again=$_POST['pass_again'];
        $f_name=$_POST['f_name'];
        $l_name=$_POST['l_name'];  
    
                if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($f_name)&&!empty($l_name))
                {
                    if($password!=$pass_again)
                    {
                        $error='passwords do not mathch';
                    }
                    else
                    {
                        $query= "SELECT username FROM users WHERE username='$username'";
                        $query_run=mysqli_query($conn,$query);
                        
                        if(mysql_num_rows($query_run)==1)
                           {
                               $error='The username ' .$username .' already exists';
                           }
                        else
                           {
                             $password_hash=md5($password);
                            
                            $query="INSERT INTO users VALUES ('','$username','$password_hash','$f_name','$l_name')";
                            
                            $query_run=mysqli_query($conn,$query);
                            header('Location:index.php');
                
                           }
                    }
                }
                else 
                {
                    $error='All fields are required';
                }
    }   

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
    
        <h3>Register</h3>

        <form action="add_user.php" method="POST">
            
            <div class="error">
                    <?php 
                        if (isset($error))
                            {
                                echo $error;
                            }

                    ?>
            </div>
            <label class="password">Username</label><input type="text" name="username" value="<?php echo @$username; ?>" maxlength="30">

            <label class="password">Password</label><input type="password" name="password">

            <label class="password">Password (again)</label><input type="password" name="pass_again">

            <label class="password">First Name</label><input type="text" name="f_name" value="<?php echo @$f_name; ?>" maxlength="20">

            <label class="password">Last Name</label><input type="text" name="l_name" value="<?php echo @$l_name;?>" maxlength="20">

            <input type="submit" value="Register" class="mybutton"><br>
        </form>
        </div>
    </body>
</html>
 
<?php
}
else 
{
echo 'You are  not logged in as administrator';
}
?>

