<?php
session_start();
session_unset();
session_destroy();
setcookie('gym_last_user', '', time() - 3600, '/');
header('Location: /GYMWEBSITE-UEB26_GR23/login.php');
exit;
