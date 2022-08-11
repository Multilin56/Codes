<?php
  include("../../assets/path.php");
  include("../../app/database/db.php");
  include("../../app/controllers/commentaries.php");
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

    <title>edit.php</title>
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
          <div class="row title-table">
            <h2>Редактирование комментария:</h2>
          </div>
          <div class="row add-post">
            <div class="mb-12 col-12 col-md-12 err">
              <!-- Вывод массива с ошибками -->
              <?php include("../../app/helps/errorInfo.php"); ?>
            </div>
            <form action="edit.php" method="post">
              <input
                  type="hidden"
                  name="id"
                  value="<?=$id?>"
                />
              <div class="col mb-4 mt-4">
                <label for="email" class="form-label"
                  >Email пользователя</label
                >
                <input
                  type="text"
                  id="email"
                  class="form-control"
                  placeholder="Введите название записи..."
                  readonly
                  aria-label="Название статьи"
                  name="email"
                  value="<?=$email?>"
                />
              </div>
              <div class="col">
                <label for="editor" class="form-label"
                  >Содержимое комментария</label
                >
                <textarea id="editor" class="form-control " rows="6" name="content"><?=$content?></textarea>
              </div>
              <div class="form-check mt-2">
                <?php if(empty($publish) && $publish == 0): ?>
                  <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="publish">
                  <label class="form-check-label" for="flexCheckChecked">
                    Publish
                  </label>
                <?php else: ?>
                  <input class="form-check-input" type="checkbox" id="flexCheckChecked" checked name="publish">
                  <label class="form-check-label" for="flexCheckChecked">
                    Publish
                  </label>
                <?php endif; ?>
              </div>
              <div class="col col-6">
                <button class="btn btn-primary" type="submit" name="edit-comment">
                  Сохранить
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
