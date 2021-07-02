<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = filter_var(strtolower(htmlspecialchars($_POST['name'])), FILTER_SANITIZE_STRING);
    $user = filter_var(strtolower(htmlspecialchars($_POST['usrname'])), FILTER_SANITIZE_STRING);
    $pass = htmlspecialchars($_POST['password']);
    $cpass = htmlspecialchars($_POST['cpassword']);
    
    if(empty($fullName) || empty($user) || empty($pass) || empty($cpass)) {
        array_push($errors,li("Complete los campos por favor").br());
    } else {
        try {
            require_once '../API_Paginacion/pdo.php';
            $consulta = $pdo->prepare('SELECT * FROM users WHERE username = :usrname LIMIT 1');
            $consulta->execute([
                ':usrname' => $user
            ]);
            $resultado = $consulta->fetch();
            if($resultado != false) {
                array_push($errors,li("El Usuario ya Existe !").br());
            }
            $pass = hash('sha512', $pass);
            $cpass = hash('sha512', $cpass);
            if($pass != $cpass) {
                array_push($errors,li("PassWords Diferentes !").br());
            }
            if(empty($errors)) {
                $consulta = $pdo->prepare('INSERT INTO users (fullname,username,password) VALUES(:fullname,:username,:password)');
                $consulta->execute([
                    ':fullname' => $fullName,
                    ':username' => $user,
                    ':password' => $pass
                ]);
                header('Location: ./logIn.php');
            }
        } catch (PDOException $ex) {
            array_push($errors,$ex->getMessage().br());
        }
    }
}