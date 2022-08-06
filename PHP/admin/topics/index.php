<?php
  include("../../assets/path.php");
  include("../../app/database/db.php");
  include("../../app/controllers/topics.php");
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
    <link rel="stylesheet" href="../../assets/css/admin.css" />

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
    <?php include("../../app/include/header-admin.php"); ?>

    <!-- Блок-main -->

    <div class="container">

      <!-- Блок-sidebar -->
      <?php include("../../app/include/sidebar-admin.php"); ?>

        <!-- Блок-управление -->
        <div class="posts col-9">
          <div class="button row">
            <a href="create.php" class="col-2 btn btn-success">Создать</a>
            <span class="col-1"></span>
            <a href="index.php" class="col-3 btn btn-warning">Управление</a>
          </div>
          <div class="row title-table">
            <h2>Управление категориями:</h2>
            <div class="col-1 mt-4">ID</div>
            <div class="col-5 mt-4">Название</div>
            <div class="col-4 mt-4">Управление</div>
          </div>
          <?php foreach($topics as $key => $topic): ?>
          <div class="row post">
            <div class="id col-1"><?=$key + 1; ?></div>
            <div class="title col-5"><?=$topic['name']; ?></div>
            <div class="red col-2"><a href="edit.php?id=<?=$topic['id']; ?>">edit</a></div>
            <div class="del col-2"><a href="edit.php?del-id=<?=$topic['id']; ?>">delete</a></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!-- Блок-конец -->
    <?php include("../../app/include/footer.php"); ?>

    <!-- Блок-скрипты -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
