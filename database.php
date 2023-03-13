<?php
    $dsn = 'mysql:host=localhost;dbname=D00243449';
    $username = 'D00243449';
    $password = '8LmLXzH6';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>