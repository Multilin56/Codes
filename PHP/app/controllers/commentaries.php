<?php

$commentsAdm = selectAll('comments');

if(isset($_GET['post'])){
    $page = $_GET['post'];
}
$email = '';
$comment = '';
$msg = [];
$status = 0;
$comment = [];

// Код для формы создания коментария
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){

    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    if($email === '' || $comment === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($comment, 'UTF8') < 10){
        array_push($msg, "Коментарий должен быть не менее 10-ти символов!");
    }else{
        $user = selectOne('users', ['email' => $email]);
        if($user['email'] == $email){
            $status = 1;
        }
        $comment = [
            'status' => $status,
            'page'=> $page,
            'email' => $email,
            'comment' => $comment
        ];

        $comment = insert('comments', $comment);
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    }
}else{
    $email = '';
    $comment = '';
    if(isset($_GET['post'])){
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    }
}

// Апдейт комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id =  $_GET['id'];
    $comment = selectOne('comments', ['id' => $id]);
    $id = $comment['id'];
    $email = $comment['email'];
    $content = $comment['comment'];
    $publish = $comment['status'];
    
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-comment'])){

    $id = $_POST['id'];
    $content = trim($_POST['content']);
    $email = $_POST['email'];

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($content === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($content, 'UTF8') < 10){
        array_push($msg, "Коментарий должен быть не менее 10-ти символов!");
    }else{
        $com = [
            'comment' => $content,
            'status' => $publish
        ];
        $comment = update('comments', $id, $com);

        header('location: ' . ADMIN_URL . 'comments/');
    }
}

// Обновление статуса (Publish) статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub-id'])){
    $id = $_GET['pub-id'];
    $publish = $_GET['publish'];

    $postId = update('comments', $id, ['status' => $publish]);

    header('location: ' . ADMIN_URL . 'comments/');
    exit();
}

// Удаление коментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del-id'])){
    $id = $_GET['del-id'];
    delete('comments', $id);
    header('location: ' . ADMIN_URL . 'comments/');
}