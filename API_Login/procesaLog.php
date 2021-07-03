<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = filter_var(strtolower(htmlspecialchars($_POST['usrname'])), FILTER_SANITIZE_STRING);
    $pass = htmlspecialchars($_POST['password']);
    $pass = hash('sha512', $pass);
    if(empty($user) || empty($pass)) {
        array_push($errors,li("Complete los campos por favor").br());
    } else {
        try {
            require_once '../API_Paginacion/pdo.php';
            $consulta = $pdo->prepare('SELECT * FROM users WHERE username = :usrname AND password = :pass');
            $consulta->execute([
                ':usrname' => $user,
                ':pass' => $pass
            ]);
            $resultado = $consulta->fetch();
            if($resultado != false) {
                $_SESSION['user'] = $user;
                header('Location: ../index.php');
            }else{
                array_push($errors,li("Invalid Data").br());
            }
        } catch (PDOException $ex) {
            array_push($errors,$ex->getMessage().br());
        }
    }
}