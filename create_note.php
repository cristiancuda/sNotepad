<?php
        session_start();
        if(!isset($_SESSION['username'])){
        header('Location: login.php');
        }
        $username = $_SESSION['username'];
        $save = $_POST['save'];
            if($save){
                $note = $_POST['note'];
                if($note == null){
                    echo "Please enter a note.";
                }
                else{

                    $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");
                    $insert = $dbh->prepare("INSERT INTO notes(username,note) VALUES(:username, :note)");
                    $insert->bindParam(':username', $username);
                    $insert->bindParam(':note', $note);
                    $insert->execute();

                    header('Location: logged_in.html');

/*
                    $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");
                    $stmt = $dbh->prepare("SELECT username FROM notes WHERE username = :username");
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();

                    if($stmt->rowCount() == 0 and $username != null and $note != null){
                        $insert = $dbh->prepare("INSERT INTO notes(username,note) VALUES(:username, :note)");
                        $insert->bindParam(':username', $username);
                        $insert->bindParam(':note', $note);
                        $insert->execute();
*/
                    }
                }
            //}
?>

<html>
    <head>
        <title> New Note</title>
    </head>
    <body>
        <h1> Create a new note. </h1>
        <form action="newnote.php" method="post">
            <textarea Name="note"  style="width:500px; height:400px;"></textarea>
            <br/>
            <input type="submit" value="Save Note" name="save">
        </form>
        <form action="logged_in.html" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>
