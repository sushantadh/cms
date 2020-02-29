<?php
    require '../includes/core.php';
    if(loggedin())
{
    $conn=$GLOBALS["connect"];
  if(isset($_POST["date"]))
    {
    $date=$_POST["date"];
    $query="UPDATE site_config SET value='$date' WHERE meta='date_format'";
    if(mysqli_query($conn,$query))
        $success="Settings Saved";

    }
    if(isset($_POST["site_name"]) and !empty($_POST["site_name"]) )
       {
           $site_name=mysqli_real_escape_string($conn,$_POST["site_name"]);
           $query="UPDATE site_config SET value='$site_name' WHERE meta='site_name'";
            if(mysqli_query($conn,$query))
              $success="Settings Saved";
    }
    
    
    if(isset($_POST["read_more"]) and !empty($_POST["read_more"]))
       {
           $read_more=$_POST["read_more"];
           $query="UPDATE site_config SET value='$read_more' WHERE meta='read_more'";
           if (mysqli_query($conn,$query))
        $success="Settings Saved";
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

    	<h3>Edit your settings</h3>

        <?php if (isset($success)) echo $success.'<br><br>';?>

        <form action="settings.php" method="post"> 
                <label>Site Name:</label><input type="text" name="site_name" placeholder="my site">

                <label>Read More Link:</label><input type="text" name="read_more" placeholder="read more"
                
                <label>Date Format:</label>
                       <div class="radio"> <input type="radio" name="date" value="l,M jS  Y">Sunday, Jan 1st, 2014</div>
                        <div class="radio"><input type="radio" name="date" value="M jS  Y">Jan 1st, 2014</div>
                        <div class="radio"><input type="radio" name="date" value="l,M jS">Sunday, Jan 1st</div>
                        
                <input type="submit"class="mybutton" value="Save">

    </form>

    </div>
</body>
<?php 
}
else echo 'Please login to continue'; 
?>