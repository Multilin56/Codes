<?php
  $range = 4;
  $current_range = $range;
  $more = isset($more) ? $more: 0;
  $more2 = isset($more2) ? $more2: 0;
?>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="?page=1&more=<?php echo $more; ?>&more2=<?php echo $more2; ?>">First</a>
    </li>
    <?php for($page_num = $page - $range - 1; $page_num != $page + $range; $page_num++): ?>
      <?php if($current_range == 0): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $page - $current_range; ?>&more=<?php echo $more; ?>&more2=<?php echo $more2; ?>"><strong><?php echo $page - $current_range; ?></strong></a></li>
      <?php elseif($page_num >= 0 && $current_range > 0): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $page - $current_range; ?>&more=<?php echo $more; ?>&more2=<?php echo $more2; ?>"><?php echo $page - $current_range; ?></a></li>
      <?php elseif($page_num < $total_pages && $current_range < 0): ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $page - $current_range; ?>&more=<?php echo $more; ?>&more2=<?php echo $more2; ?>"><?php echo $page - $current_range; ?></a></li>
      <?php endif; ?>
      <?php $current_range--; ?> 
    <?php endfor; ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $total_pages ?>&more=<?php echo $more; ?>&more2=<?php echo $more2; ?>">Last</a>
    </li>
  </ul>
</nav>