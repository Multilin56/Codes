<?php
  include("../../assets/path.php");
  include("../../app/database/db.php");
  include("../../app/controllers/posts.php");
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

    <title>create.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../../app/include/header-admin.php"); ?>

    <!-- Блок-main -->

    <div class="container">

      <!-- Блок-sidebar -->
      <?php include("../../app/include/sidebar-admin.php"); ?>

        <!-- Блок-добавление -->
        <div class="posts col-9">
          <div class="button row">
            <a href="create.php" class="col-2 btn btn-success">Создать</a>
            <span class="col-1"></span>
            <a href="index.php" class="col-3 btn btn-warning">редактировать</a>
          </div>
          <div class="row title-table">
            <h2>Добавление записи:</h2>
          </div>
          <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
              <!-- Вывод массива с ошибками -->
              <?php include("../../app/helps/errorInfo.php"); ?>
            </div>
            <form action="create.php" method="post" enctype="multipart/form-data">
              <div class="col mb-4 mt-4">
                <label for="title" class="form-label"
                  >Название записи</label
                >
                <input
                  type="text"
                  id="title"
                  class="form-control"
                  placeholder="Введите название записи..."
                  aria-label="Название записи"
                  name="title"
                  value="<?=$title; ?>"
                />
              </div>
              <div class="col">
                <label for="editor" class="form-label"
                  >Содержимое записи</label
                >
                <textarea id="editor" class="form-control " rows="6" name="content"><?=$content; ?></textarea>
              </div>
              <div class="input-group col mb-4 mt-4">
                <input type="file" class="form-control" id="inputGroupFile02" name="img"/>
                <label class="input-group-text" for="inputGroupFile02"
                  >Upload</label
                >
              </div>
              <select class="form-select mb-2" aria-label="Default select example" name="topic">
                <option selected>Категория поста:</option>
                <?php foreach($topics as $key => $topic): ?>
                  <option value="<?=$topic['id']; ?>"><?=$topic['name']; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name="publish">
                <label class="form-check-label" for="flexCheckChecked">
                  Publish
                </label>
              </div>
              <div class="col col-6">
                <button class="btn btn-primary" type="submit" name="add-post">
                  Добавить запись
                </button>
              </div>
            </form>
          </div>
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
    <!-- Добавление визуального редактора к текстовому полю админки -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


    <script src="../../assets/js/scripts.js"></script>
  </body>
</html>
