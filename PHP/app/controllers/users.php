<?php
//include("/app/database/db.php");

$msg = [];
$_SESSION['count'] = 0;

$users = selectAll('users');

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    if($_SESSION['admin']){
        header('location: ' . BASE_URL );
    }else{
        header('location: ' . BASE_URL);
    }
}

// Код для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === '' || $passS === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($msg, "Логин должен быть не менее 2-х символов!");
    }elseif($passF !== $passS){
        array_push($msg, "Пароли в обоих полях должны соответвовать!");
    }else{
        $existance = selectOne('users', ['email' => $email]);
        if($existance['email'] === $email){
            array_push($msg, "Пользователь с такой почтой уже зарегестрирован!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            userAuth($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-login'])){
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === ''){
        array_push($msg, "Не все поля заполнены!");
    }else{
        $existance = selectOne('users', ['email' => $email]);
        if($existance && password_verify($pass, $existance['password'])){
            userAuth($existance);
        }else{
            array_push($msg, "Почта либо пароль введены не верно!");
        }
    }
}else{
    $email = '';
}

// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
    $admin = isset($_POST['admin']) ? 1 : 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === '' || $passS === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($msg, "Логин должен быть не менее 2-х символов!");
    }elseif($passF !== $passS){
        array_push($msg, "Пароли в обоих полях должны соответвовать!");
    }else{
        $existance = selectOne('users', ['email' => $email]);
        if($existance['email'] === $email){
            array_push($msg, "Пользователь с такой почтой уже зарегестрирован!");
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);

            header('location: ' . ADMIN_URL . 'users/');
        }
    }
}else{
    $login = '';
    $email = '';
}

// Апдейт пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id =  $_GET['id'];
    $user = selectOne('users', ['id' => $id]);
    $id = $user['id'];
    $admin = $user['admin'];
    $login = $user['username'];  
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    
    $admin = isset($_POST['admin']) ? 1 : 0;
    $login = trim($_POST['login']);  
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($login, 'UTF8') < 2){
        array_push($msg, "Логин должен быть не менее 2-х символов!");
    }elseif($passF !== $passS){
        array_push($msg, "Пароли в обоих полях должны соответвовать!");
    }else{
        if(trim($_POST['pass-first']) !== ''){
            $pass = $passF; //password_hash($passF, PASSWORD_DEFAULT);
            $user = [
                'admin' => $admin,
                'username' => $login,
                'password' => $pass
            ];
        }else{
            $user = [
                'admin' => $admin,
                'username' => $login
            ];
        }
        $id = $_POST['id'];
        $user = update('users', $id, $user);

        header('location: ' . ADMIN_URL . 'users/');
    }
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del-id'])){
    $id = $_GET['del-id'];
    delete('users', $id);
    header('location: ' . ADMIN_URL . 'users/');
}