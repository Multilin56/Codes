<?php
  include("path.php");
  include("../app/database/db.php");
  include("../app/controllers/topics.php");

  $page = isset($_GET['page']) ? $_GET['page']: 1;
  $limit = 7;
  $offset = $limit * ($page - 1);
  // используй лучше скрытый input :(
  if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $topic = selectOne('topics', ['id' => $_GET['id']]);
    $more = $topic['id'];
    $more2 = $topic['name'];
    $total_pages = ceil(countRowCategory('posts', $more) / $limit);
    $posts = selectAllFromPostsWithUsersAndCategoryOnCategory('posts', 'users', $more, $limit, $offset);
  }else{
    $more = $_GET['more'];
    $more2 = $_GET['more2'];
    $total_pages = ceil(countRowCategory('posts', $more) / $limit);
    $posts = selectAllFromPostsWithUsersAndCategoryOnCategory('posts', 'users', $more, $limit, $offset);
  }
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

    <title>category.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../app/include/header.php"); ?>

    <!--  Блок-main  -->

    <div class="container">
      <div class="content row">
        <div class="main-content col-md-9 col-12">
          <?php if($posts): ?>
            <h2>Статьи с раздела: <strong><?=$more2; ?></strong></h2>
          <?php else: ?>
            <h2>Нет статей с данного раздела...</h2>
            <div class="search_text col-12">
              <h4><i class="fa-solid fa-magnifying-glass"></i> Советы по поиску:</h4>
              <ul>
                <li>Убебедитесь, что все слова написаны без ошибок.</li>
                <li>Попробуейте использовать более точные или просто другие ключевые слова.</li>
                <li>Попробуйте сократить поисковой запрос.</li>
              </ul>
              <p>Изучите <a href="about.php">другие советы</a> по поиску на нашем сайте.</p>
            </div>
          <?php endif; ?>

          <!-- Начало карточек -->

          <?php foreach ($posts as $post): ?>
          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="<?=BASE_URL . 'images/posts/' . $post['img'] ?>" alt="<?=$post['img']; ?>" class="img-thumbnail" />
            </div>
            <div class="post_text col-12 col-md-8">
              <h3>
                <?php if(strlen($post['title']) > 80): ?>
                  <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=mb_substr($post['title'], 0, 80, 'UTF-8') . '...'; ?></a>
                <?php else: ?>
                  <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=$post['title']; ?></a>
                <?php endif; ?>
              </h3>
              <i class="far fa-user"> <?=$post['username']; ?></i>
              <i class="far fa-calendar"> <?=$post['created_date']; ?></i>
              <p class="preview-text">
                <?php if(strlen($post['content']) > 150): ?>
                  <a href="#"><?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...'; ?></a>
                <?php else: ?>
                  <a href="#"><?=$post['content']; ?></a>
                <?php endif; ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>

          <!-- Конец карточек -->

          <!-- Блок-пагинация -->
          <?php if($posts): ?>
            <?php include("../app/include/pagination.php"); ?>
          <?php endif; ?>

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
