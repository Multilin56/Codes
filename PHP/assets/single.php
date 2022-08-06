<?php
  include("path.php");
  include("../app/database/db.php");
  include("../app/controllers/topics.php");
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
          <h2>
            Заголовок какой-то конкретной статьи, пока о чем не понятно но надо
            много текста что-бы посмотреть, как будет он в несколько строк...
          </h2>

          <!-- Блок-начало карточек -->

          <div class="single_post row">
            <div class="img col-12">
              <img src="images/Cat_4.jpg" alt="..." class="img-thumbnail" />
            </div>
            <div class="single_info">
              <i class="far fa-user"> Имя автора</i>
              <i class="far fa-calendar"> Mar 11, 2019</i>
            </div>
            <div class="single_post_text col-12">
              <h3>Заголовок</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil,
                facere inventore. Ipsum <a href="">rerum</a> at dolores.
              </p>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Pariatur veritatis itaque tenetur rem repudiandae odio suscipit
                laborum <a href="">maxime</a> consequuntur illum voluptatibus
                labore quos asperiores, quia, totam fugiat
                <a href="">officiis dolorum</a>
                amet?
              </p>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Adipisci tenetur fugiat autem placeat voluptatibus iure? Eius
                cumque vero repellendus id.
              </p>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>

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
              <li><a href="#">Пушистые</a></li>
              <li><a href="#">Игривые</a></li>
              <li><a href="#">Отдыхающие</a></li>
              <li><a href="#">Природа</a></li>
              <li><a href="#">Необычные</a></li>
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
