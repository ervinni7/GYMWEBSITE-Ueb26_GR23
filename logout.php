<?php
session_start();
session_unset();
session_destroy();
setcookie('gym_last_user', '', time() - 3600, '/');
header('Location: /gym-php-v2/login.php');
exit;
