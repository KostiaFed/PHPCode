<?php

$pdo = include "connector.php";

if (isset($_POST['auth'])) {
    $result = $pdo->prepare("SELECT count(*) FROM db_user WHERE login=? and email=?");
    $result->execute([$_POST['userLogin'], $_POST['userEmail']]);
    if ($result->fetchColumn(0)) {
        $result = $pdo->query("SELECT * FROM db_user WHERE email='".$_POST['userEmail']."'");
        $row = $result->fetchAll();
        $message = "Your kapital.pp.ua `Professors data base` password: ".$row[0]['password'];

        mail($_POST['userEmail'], 'Remember', $message);
        echo '<script>alert("Password sent to your email");location = "../index.php";</script>';
    } else {
        echo '<script>alert("Wrong login or email");location = "forgot.php";</script>';
    }
}