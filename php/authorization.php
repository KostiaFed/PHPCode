<?php
$pdo = include "connector.php";

if(isset($_POST['register'])){
    $result = $pdo->prepare("SELECT count(*) FROM db_user WHERE login=? or email=?");
    $result->execute([$_POST['userLogin'],$_POST['userEmail']]);
    if($result->fetchColumn(0)){
        echo '<script>alert("User with such Login or Email already exists");location = "Sign.php";</script>';
    }
    else{
        $pass = $_POST['userPassword'];

        $date = date('yy-m-d');

        $message = 'Дякуємо за реєстрацію. Щоб підтвердити свій email вам необхідно перейти за цим посиланням http://kapital.pp.ua/php/authorization.php?login='.$_POST['userLogin'];

        mail($_POST['userEmail'], 'Confirm registration', $message);

        $query = "INSERT INTO `db_user`(`name`, `login`, `password`, `idRole`, `staff`, `dateBegin`, `email`, `email_confirm`)
        VALUES (:name, :login, '{$pass}', 1, :staff, '{$date}', :email, 0)";

        $result = $pdo->prepare($query);

        $result->bindParam(':name', $_POST['userName']);
        $result->bindParam(':login', $_POST['userLogin']);
        $result->bindParam(':staff', $_POST['userStaff']);
        $result->bindParam(':email', $_POST['userEmail']);

        $result->execute();

        echo '<script>alert("Confirm");location = "../index.php";</script>';
    }
}
if(isset($_GET['login']))
{
    $query = "UPDATE `db_user` SET email_confirm = 1 WHERE login = '{$_GET['login']}'";

    $result = $pdo->prepare($query);
    $result->execute();

    echo '<script>alert("Ваш email підтверджено!");</script>';
}
if(isset($_POST['auth']))
{
   $result = $pdo->prepare("SELECT count(*) FROM db_user WHERE login= ?");
   $result->execute([$_POST['userLogin']]);

    if($result->fetchColumn(0)){
        $result = $pdo->query("SELECT * from db_user where login = '{$_POST['userLogin']}'");
        $row = $result->fetchAll();
        if($_POST['userPassword'] == $row[0]['password'])
        {
            session_start();
            $_SESSION['login'] = $_POST['userLogin'];
            $_SESSION['role'] = $row[0]['staff'];
            if(isset($_SESSION['login'])) {
                echo '<script>location = "../index.php";</script>';
            }
        }
    }
    else
    {
        echo '<script>location = "Sign.php?mess=Incorrect login";</script>';
    }
}
echo '<script>location = "../index.php";</script>';