<?php
    //$host = 'localhost';
    //$db = 'attendance_romaine';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    //Remote Database connection
    $host = 'applied-web.mysql.database.azure.com';
    $db = 'springfield_romaine';
    $user = 'appliedweb_user@applied-web';
    $pass = 'P@ssword1';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    try{
        $pdo = new PDO ($dsn, $user, $pass);
        //echo "<h6 style='background-color:MediumSeaGreen;'> Database Active</h6>";
       // echo "<h6 class= 'text-success'>Database Active</h6>";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOException $e) {
        throw new PDOException($e->getMessage());
       //echo "<h1 class= 'text-danger'> No Database Found</h1>";
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo); 
    $user = new user($pdo); 

    //$user->insertUser("admin", "password");
?>