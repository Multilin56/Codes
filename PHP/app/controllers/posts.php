<?php
//include("/app/database/db.php");

if(!$_SESSION){
    header('location: ' . BASE_URL . 'login.php');
}

$msg = [];
$id = '';
$title = '';
$content = '';
$topic = '';
$img = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

// Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])){

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\images\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false){
            array_push($msg, "Подгружаемый файл не является изображением!");
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($msg, "Ошибка загрузки изображения на сервер!");
            }
        }
    }else{
        array_push($msg, "Ошибка получения картинки!");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($title, 'UTF8') < 7){
        array_push($msg, "Название статьи должно быть не менее 7-ми символов!");
    }elseif($topic === "Категория поста:"){
        array_push($msg, "Выбирете категорию поста!");
    }else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title'=> $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . ADMIN_URL . 'posts/');
    }
}else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}

// Апдейт статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id =  $_GET['id'];
    $post = selectOne('posts', ['id' => $id]);
    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $publish = $post['status'];
    $topic = $post['id_topic'];
    
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\images\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false){
            array_push($msg, "Подгружаемый файл не является изображением!");
        }else{
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result){
                $_POST['img'] = $imgName;
            }else{
                array_push($msg, "Ошибка загрузки изображения на сервер!");
            }
        }
    }else{
        array_push($msg, "Ошибка получения картинки!");
    }

    if($title === '' || $content === '' || $topic === ''){
        array_push($msg, "Не все поля заполнены!");
    }elseif(mb_strlen($title, 'UTF8') < 7){
        array_push($msg, "Название статьи должно быть не менее 7-ми символов!");
    }elseif($topic === "Категория поста:"){
        array_push($msg, "Выбирете категорию поста!");
    }else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title'=> $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];
        $id = $_POST['id'];
        $post = update('posts', $id, $post);

        header('location: ' . ADMIN_URL . 'posts/');
    }
}

// Обновление статуса (Publish) статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub-id'])){
    $id = $_GET['pub-id'];
    $publish = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $publish]);

    header('location: ' . ADMIN_URL . 'posts/');
    exit();
}

// Удаление статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del-id'])){
    $id = $_GET['del-id'];
    delete('posts', $id);
    header('location: ' . ADMIN_URL . 'posts/');
}