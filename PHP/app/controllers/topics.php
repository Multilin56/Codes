<?php
//include("/app/database/db.php");

$msg = [];
$id = '';
$name = '';
$description = '';

$topics = selectAll('topics');

// Код для формы создания категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($name, 'UTF8') < 2){
        array_push($msg, "Категория должна быть не менее 2-х символов!");
    }else{
        $existance = selectOne('topics', ['name' => $name]);
        if($existance['name'] === $name){
            array_push($msg, "Такая категория уже есть в базе!");
        }else{
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id]);

            header('location: ' . ADMIN_URL . 'topics/');
        }
    }
}else{
    $name = '';
    $description = '';
}

// Апдейт категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($name, 'UTF8') < 2){
        array_push($msg, "Категория должна быть не менее 2-х символов!");
    }else{
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);

        header('location: ' . ADMIN_URL . 'topics/');   
    }
}

// Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del-id'])){
    $id = $_GET['del-id'];
    delete('topics', $id);
    header('location: ' . ADMIN_URL . 'topics/');
}