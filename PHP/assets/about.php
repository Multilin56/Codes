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

    <title>about.php</title>
  </head>
  <body>
    <!--  Блок-начало  -->
    <?php include("../app/include/header.php"); ?>

    <!--  Блок-main  -->

    <div class="container">
      <div class="content row">
        <div class="main-content col-md-9 col-12">
          <h2>Запись о нас и нашем сайте...</h2>

          <!-- Блок-начало карточек -->

          <div class="about row">
            <div about_info>
              <i class="far fa-calendar"> Mar 11, 2019</i>
            </div>
            <div class="about_text col-12 col-md-8">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil,
                facere inventore. Ipsum rerum at dolores.
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Repellat dicta <a href="#">ullam</a> quia voluptatem vel
                blanditiis commodi alias quos obcaecati! Itaque, ut vitae.
                Excepturi laboriosam tempora eum quisquam consequuntur ipsa
                laborum?
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                officia exercitationem tempora voluptate sequi qui!
              </p>
              <p>
                Lorem ipsum, <a href="#">dolor</a> sit amet consectetur
                adipisicing elit. Temporibus, libero aliquam?
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Voluptas sequi delectus culpa, enim fugiat ipsum, omnis a
                perferendis corporis odit, vero cupiditate? Beatae
                <a href="#">error labore</a>
                consequatur? Quas exercitationem voluptate deleniti at. Maiores
                laboriosam odit quaerat delectus placeat suscipit.
              </p>
              <h4>Условия и правила пользования...</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Aliquid, aliquam incidunt enim eos praesentium quod vero!
                Voluptas animi illum necessitatibus tempora mollitia ab!
              </p>
              <p>
                Lorem ipsum dolor <a href="#">sit amet</a> consectetur
                adipisicing elit. Quibusdam facilis veritatis sapiente voluptas
                officiis optio, minus at. Cum, vero. Modi aliquid enim excepturi
                facere dolorum amet placeat laboriosam quas sunt!
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. In,
                atque at. Ea?
              </p>
              <p>
                Lorem <a href="#">ipsum</a> dolor sit amet, consectetur
                adipisicing.
              </p>
              <h4>Заключительная часть...</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Reiciendis in laboriosam esse amet! Reiciendis beatae,
                laboriosam autem labore quod harum?
              </p>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam
                quia expedita voluptas adipisci nostrum assumenda omnis.
              </p>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
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
