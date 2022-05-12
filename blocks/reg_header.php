<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Professors</title>
    <link rel="stylesheet" type="text/css" href="../js/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../css/stylecss.css"/>
    <script src="../js/jquery.js"></script>
    <script href="../js/bootstrap.js" ></script>
</head>
<body>

<?php
include 'head.php';
$pdo = include 'php/connector.php';