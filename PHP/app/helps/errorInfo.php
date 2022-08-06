<?php if(count($msg) > 0): ?>
    <ul>
    <?php foreach($msg as $error): ?>
        <li><strong><?=$error; ?></strong></li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>