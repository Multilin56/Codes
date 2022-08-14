<div class="cpl-md-12 col-12 comments">
  <h3>Коментарии</h3>
  <form action="<?=BASE_URL . "single.php?post=$page" ?>" method="post">
    <input type="hidden" name="page" value="<?=$page; ?>">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email адрес</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Введите ваш email..." name="email">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Напишите ваш отзыв</label>
      <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    <div class="col-12">
      <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
    </div>
  </form>
  <div class="row all-comments">
    <?php foreach($comments as $comment): ?>
      <div class="one-comment col-12">
        <span><i class="far fa-envelope"></i><?=$comment['email'] ?></span>
        <span><i class="far fa-calendar-check"></i><?=$comment['created_date'] ?></span>
        <div class="col-12 text">
          <?=$comment['comment'] ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>