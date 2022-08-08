<?php
  include("path.php");
  include("../app/database/db.php");
  include("../app/controllers/topics.php");
  $post = selectPostFromPostsWithUsersOnSingle('posts', 'users', $_GET['post']);
  $topic = selectOne('topics', ['id' => $post['id_topic']]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="'utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Font Awesome-->
    <script
      src="https://kit.fontawesome.com/1f0652acdb.js"
      crossorigin="anonymous"
    ></script>

    <!-- Cusstom Styling -->
    <link rel="stylesheet" href="css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <title>single.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../app/include/header.php"); ?>

    <!--  Блок-main  -->

    <div class="container">
      <div class="content row">
        <div class="main-content col-md-9 col-12">
          <h2 id="title"><?= $post['title']; ?></h2>
          <label for="title">Категория: <strong><?= $topic['name']; ?></strong></label>
          <!-- Блок-начало карточек -->

          <div class="single_post row">
            <div class="img col-12">
              <img src="<?=BASE_URL . 'images/posts/' . $post['img'] ?>" alt="<?=$post['img']; ?>" class="img-thumbnail" />
            </div>
            <div class="single_info">
              <i class="far fa-user"> <?=$post['username']; ?></i>
              <i class="far fa-calendar"> <?=$post['created_date']; ?></i>
            </div>
            <div class="single_post_text col-12">
              <?=$post['content']; ?>
            </div>
          </div>

          <!-- Блок-конец карточек -->
          
        </div>
        <!-- Блок-поиск -->
        <?php include("../app/include/sidebar.php"); ?>

      </div>
    </div>

    <!-- Блок-конец -->
    <?php include("../app/include/footer.php"); ?>

    <!-- Блок-скрипты -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
