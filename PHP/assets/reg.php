<?php
  include("path.php");
  include("../app/database/db.php");
  include("../app/controllers/users.php");
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

    <title>reg.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../app/include/header.php"); ?>

    <!-- Блок-форма -->

    <div class="container reg_form">
      <form class="row justify-content-center" method="post" action="reg.php">
        <h2>Форма регистрации:</h2>
        <div class="mb-12 col-12 col-md-12 err">
          <!-- Вывод массива с ошибками -->
          <?php include("../app/helps/errorInfo.php"); ?>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="formGroupExampleInput" class="form-label"
            >Ваш логин</label
          >
          <input
            type="text"
            class="form-control"
            id="formGroupExampleInput"
            placeholder="Введите ваш логин..."
            name="login"
            value="<?=$login?>"
          />
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            placeholder="Введите ваш email..."
            aria-describedby="emailHelp"
            name="mail"
            value="<?=$email?>"
          />
          <div id="emailHelp" class="form-text">
            Ваш email не будет использован для спама!
          </div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1" class="form-label">Пароль</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="pass-first"
          />
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <label for="exampleInputPassword2" class="form-label"
            >Повторите пароль</label
          >
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword2"
            name="pass-second"
          />
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
          <button type="submit" class="btn btn-secondary" name="button-reg">Регистрация</button>
          <a href="login.php">Войти</a>
        </div>
      </form>
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
