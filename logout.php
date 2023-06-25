<?php
session_start();
session_unset();
session_destroy();
unset($_COOKIE['access_token']);
header('Location: index.php');
exit;
?>