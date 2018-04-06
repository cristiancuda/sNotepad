<?php

    session_start();

    try {
      //connection to db
      $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");
      } catch (PDOEXception $e) {
      exit('Database connection failed: ' . $e->getMessage());
      }

        $stmt = $dbh->prepare("SELECT username FROM users");
        $stmt->bindParam(':username', $_GET['u']);
        $stmt->execute() or exit ("SELECT failed.");

?>

<h2>sNotepad Cloud</h2>

    <form action="login.php" method="post">
        Username: <input type="text"     value = "test" name="username" size="36" /> <br>
        Password: <input type="password" value = "1234"  name="password" size="36" /> <br>
              <input type="submit"       value = "Login" />
    </form>

<form action="create_user.php" method="post">
    <input type="submit" value="Create User" />
</form>
