<?php

?>
<section class="mt-5">
    <h2>Recently logged users</h2>

    <ul class="list-group list-group-flush">

    <?php foreach ($logged as $user): ?>
    <li class="list-group-item"><?= htmlspecialchars($user['email']) ?></li>
    <?php endforeach; ?>
    </ul>
</section>