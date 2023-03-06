<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'php_intermediaire_1');


    if(isset($_POST['submit'])) {

        $ville = $_POST['search'];

        if(empty($ville)) {
            $message = '<p class="error">Vous devez remplir le champ</p>';
            echo $message;
        } else {
            $result = $mysqli->query('SELECT ville_nom, ville_text FROM villes WHERE ville_nom = "'.$ville.'"');
            

            while($row = $result->fetch_array()) {
                if($ville === $row['ville_nom']) {
                    $ville_text = $row['ville_text'];
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
    <title>Rechercher une ville</title>
</head>
<body>
    <div class="container">
        <h1>Rechercher une ville</h1>
        <form action="search.php" method="post">
            <input type="text" name="search" id="search" placeholder="Entrez une ville">
            <input type="submit" name="submit" value="Rechercher">
        </form>
        <h2><?php if(isset($ville)) echo $ville?></h2>
        <p><?php if(isset($ville_text)) echo $ville_text ?></p>
    </div>
</body>
</html>