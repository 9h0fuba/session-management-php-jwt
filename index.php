<?php 

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__.'/src/session.php';

try{
    $session = SessionManager::getCurrentSession();

} catch (Exception $e){
    header('Location: login.php');
    exit(0);
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?= $session->username ;?></h1>
</body>
</html>

