<!DODTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Регистрация </title>  
        <link rel="stylesheet" href="assets/registration.css"/>
        <meta name="description" content="портал">
        <meta name="keywords" content="own">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php
        require ('connect_reg.php');       
        if(isset($_POST['username']) and isset($_POST['password']))
        {            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            $result =  mysqli_query($connection, $query);   
            
            if($result)
            {
                
                echo "Успешно";
                        
            } else {
                echo "Ошибка";
            }               
        }
        ?>
        <div class="conteiner">
            <div id="image">
                <a href="http://ourproj.by/" title="На главную">
                    <img src="images/707366.jpg" title="work.by"
                         alt="work.by">                   
                </a>
            </div>
            <form class="form-signin" method="POST">
                <h2>Registaration</h2>
               
                
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <br />               
                <button class="btn" type="submit" title="registration">Register</button> 
                
                <div class="link">
                    <a href="authorization.php" title="Login">Login</a>
                </div>
                
            </form>
        </div>
             
    </body>
</html>