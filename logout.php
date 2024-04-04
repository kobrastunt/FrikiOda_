<?php
    session_start();

    session_unset();

    session_destroy();

    header('Location: /wiki.php');
    exit;
?>