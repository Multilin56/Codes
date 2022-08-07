        <div class="sidebar col-md-3 col-12">
          <div class="section search">
            <h3>Поиск</h3>
            <form action="search.php" method="post">
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
              <li><a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?=$topic['name']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>