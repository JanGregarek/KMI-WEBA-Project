<?php
    include_commons();
    include $_SESSION['logged'] ? BASE_PATH . "/views/administration.php" : BASE_PATH . "/views/common/not_logged.html";
?>
