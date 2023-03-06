<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'php_intermediaire_1');


    if(isset($_POST['submit'])) {
        $user_input_login = $_POST['user_input_login'];
        $user_input_password = $_POST['user_input_password'];
        if(empty($user_input_login) || empty($user_input_password)) {
            $message = '<p class="error">Vous devez saisir les informations demandées</p>';
        } else {
            $result = $mysqli->query('SELECT user_login, user_password FROM users WHERE user_login = "'.$user_input_login.'"');

            $row = $result->fetch_array();

            if(!isset($row['user_login'])) {
                $message = '<p class="error">Erreur d\'identification.<br>Vous n\'avez pas accès à cette page</p>';
            } else {
                $user_login = $row['user_login'];
                $user_password = $row['user_password'];
                if(crypt($user_input_password, PASSWORD_BCRYPT) != $user_password) {
                    $message = '<p class="error">Erreur d\'identification.<br>Vous n\'avez pas accès à cette page</p>';
                } else {
                    session_start();
                    $_SESSION['user_login'] = $user_login;
                    header('location:search.php');
                }
            }
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <h1>Identification</h1>
            <div>
                <input type="text" name="user_input_login" id="user_input_login">
                <label for="">Votre login</label>
            </div>
            <div>
                <input type="password" name="user_input_password" id="user_input_password">
                <label for="">Votre mot de passe</label>
            </div>
            <input type="submit" value="Valider" name="submit">
        </form>
        <?php if(isset($message)) echo $message?>
    </div>
</body>
</html>