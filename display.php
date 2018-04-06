<?php
    session_start();
  /*    if(!isset($_SESSION['username'])){
            header('Location: ./');
        }*/

       try {
        $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");
       } catch (PDOException $e) {
           exit ('Database connection failed: ' . $e->getMessage());
       }
        $stmt = $dbh->prepare("SELECT note FROM notes WHERE username = :username");
        $stmt->bindParam(':username', $_SESSION['username']);
        //$stmt->bindParam(':note', $_GET['note']);
        $stmt->execute() or exit ("SELECT failed.");
         $notes = $stmt->fetchAll();
            #iterates through array and displays notes in an unordered list format
            foreach ($notes as $value => $note) {
                echo '<ul>'.'<li>'.$note[0].'</li>'.'</ul>';
            }

?>
<input type="button" value="Go back" class="homebutton" id="btnHome"
onClick="document.location.href='./'" />

<form action="create_note.php" method="post">
    <input type="submit" value="New Note" />
</form>
