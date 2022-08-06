<?php
  include("path.php");
  include("../app/database/db.php");
  include("../app/controllers/topics.php");
  $posts = selectAllFromPostsWithUsersOnIndex('posts', 'users');
  $topTopic = selectTopTopicsFromPostsOnIndex('posts');
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

    <title>index.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../app/include/header.php"); ?>

    <!--  Блок-карусель  -->

    <div class="container">
      <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
      </div>
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <?php foreach ($topTopic as $key => $post): ?>
            <?php if($key == 0): ?>
              <div class="carousel-item active">
            <?php else: ?>
              <div class="carousel-item">
            <?php endif; ?>
              <img src="<?=BASE_URL . 'images/posts/' . $post['img'] ?>" alt="<?=$post['img']; ?>" class="d-block w-100" />
              <div
                class="carousel-caption-hack carousel-caption d-none d-md-block"
              >
                <h5>
                  <?php if(strlen($post['title']) > 40): ?>
                    <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=mb_substr($post['title'], 0, 40, 'UTF-8') . '...'; ?></a>
                  <?php else: ?>
                    <a href="<?=BASE_URL . 'single.php?post=' . $post['id']; ?>"><?=$post['title']; ?></a>
                  <?php endif; ?>
                </h5>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!--  Блок-main  -->

    <div class="container">
      <div class="content row">
        <div class="main-content col-md-9 col-12">
          <h2>Последние публикации</h2>

          <!-- Блок-начало карточек -->

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

          <!-- Блок-конец карточек -->

        </div>

        <!-- Блок-поиск -->
        <div class="sidebar col-md-3 col-12">
          <div class="section search">
            <h3>Поиск</h3>
            <form action="index.php" method="post">
              <input
                type="text"
                name="search-ferm"
                class="text-input"
                placeholder="Введите искомое слово..."
              />
            </form>
          </div>

          <div class="section topics">
            <h3>Категории</h3>
            <ul>
              <?php foreach($topics as $key => $topic): ?>
              <li><a href="#"><?=$topic['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
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
