<?php 
require __DIR__ . '/vendor/autoload.php';

setcookie('GG-JWT','LOGOUT');

header('Location: /login.php')
?>