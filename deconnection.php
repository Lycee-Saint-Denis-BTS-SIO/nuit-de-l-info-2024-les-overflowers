<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
session_destroy();
header('Location: login.php');
exit();