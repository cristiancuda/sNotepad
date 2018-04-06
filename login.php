<?php

    session_start();

    $username           = $_POST['username'];
    $submitted_password = $_POST['password'];

    if(!isset($username)or !isset($submitted_password)){
        header('Location ./');
        exit();
    }

    try {
        $dbh = new PDO("mysql:host=cristiancdb.cristiancuda.com;dbname=cristiancuda_snotepad", "cricud", "Tropicalisima1,");

        $stmt = $dbh->prepare("SELECT password FROM users WHERE username =  :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute() or exit ("SELECT failed.");

        if ($stmt->rowCount() == 0){
            header('Location: ./');
        }

        $row = $stmt->fetch() or exit ("fetch failed.");
        $actual_password = $row["password"];

        if($submitted_password != $actual_password){
            header("Location: ./");
            exit();
        }
    } catch (PDOException $e) {
        exit($e->getMessage());
    }

    //session_start();
    $_SESSION['username'] = $username;
    header('Location: ./display.php');
?>
