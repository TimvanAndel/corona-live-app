<?php
    setcookie("username", "", time() - 3600);
    setcookie("username_id", "", time() - 3600);
    setcookie("logged_in", "", time() - 3600);

    header('Location: index.html');
?>