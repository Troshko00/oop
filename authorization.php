<?php
 session_start();
?>
<!DODTYPE html>
<html>
    <head>       
        <meta charset="UTF-8">
        <title> Авторизация </title>  
        <link rel="stylesheet" href="assets/authorization.css"/>
        <meta name="description" content="портал">
        <meta name="keywords" content="own">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="conteiner">
            <div id="image">
                <a href="http://ourproj.by" title="На главную">
                    <img src="images/707366.jpg" title="work.by"
                         alt="work.by">                   
                </a>
            </div>
            <form class="form-signin" method="POST">
                <h2>Login</h2>
                <?php if(isset($smsg)){ ?><div class = "alert alert_success" role = "alert"> <?php echo $smsg; ?></div> <?php } ?>
                <?php if(isset($fmsg)){ ?><div class = "alert alert_danger" role = "alert"> <?php echo $fmsg; ?></div> <?php } ?>
                
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <br />
                <button class="btn" type="submit" title="Login">Login</button> 
                
                <div class="link">
                    <a href="registration.php" title="Registration">Registration</a>
                </div>
            </form>
        </div>        
        
         <?php
        require ('connect_reg.php');        
        if(isset($_POST['username']) and isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
             
            $query="SELECT * FROM users WHERE username='$username' and password='$password'";
            $result=mysqli_query($connection, $query) or die(mysqli_error($connection));
            $count=mysqli_num_rows($result);
            
            if ($count == 1)
            {
                $_SESSION['username']=$username;
                
            } else
            {
                $fmsg="Error";
            }
        }
        
        if(isset($_SESSION['username']))
        {
            $username=$_SESSION['username'];
            echo "Hello " ;
            echo $username;
            echo "<a href='logout.php' class='btn'>Logout</a>";
                
        }
        
        ?>
    </body>
</html>