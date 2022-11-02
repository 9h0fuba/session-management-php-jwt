<?php 
   require __DIR__ . '/vendor/autoload.php';
    require_once __DIR__.'/src/session.php';

    $message = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(SessionManager::login($_POST['username'],$_POST['password'])){
            header('Location: /index.php');
            exit(0);
        } else {
            $message = 'gagal login';
        }
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
    
    <?php if ($message) {?>
<h1><?= $message ;?></h1>

        <?php } ;?>

        <h1>Form Login</h1>

            <form action="/login.php" method="post">
                
                <label for="username"> Username: 
                    <input type="text" name="username" id="username">
                </label>
                <br>
                <label for="password"> Password: 
                    <input type="text" name="password" id="password">
                </label>
                <br>
               <input type="submit" value="submit">

            </form>



</body>
</html>