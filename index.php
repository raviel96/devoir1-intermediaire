<?php 

$mdp = 'FR@3m:We8!';
$mdpcrypt = crypt($mdp, PASSWORD_BCRYPT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <a href="login.php">Log in</a>
    </div>
</body>
</html>