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
                    header('Location: display.php');
                }
            }
?>
