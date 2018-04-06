<html>
    <head>
        <title> Create User</title>
    </head>
    <body>
        <?php
            $username = $_POST['username'];
            $password = $_POST['password'];
            //$display = $_POST['display'];

            $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");
            $stmt = $dbh->prepare("SELECT username FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if($stmt->rowCount() == 0 and $username != null and $password != null){
                $insert = $dbh->prepare("INSERT INTO users(username,password) VALUES(:username, :password)");
                $insert->bindParam(':username', $username);
                $insert->bindParam(':password', $password);
                $insert->execute();
                echo ("The user ".$username. " has been created.");

            }
            elseif ($username != null and $password != null) {
                echo "This username already exists";
            }
            else {
                if($username == null and $display){
                    echo " Please enter a username.";
                }
                if($password == null and $display){
                    echo " Please enter a password";
                }
            }

        ?>
        <form action="<?php $PHP_SELF; ?>" method="post">
            Username: <input type="text" name="username"/>
            <br/>
            Password: <input type="password" name="password"/>
            <br/>
            <input type="submit" value="Create User" name="display">
        </form>
        <input type="button" value="Go back" class="homebutton" id="btnHome"
        onClick="document.location.href='./'" />
    </body>
</html>
