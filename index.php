<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.

    $server = 'localhost';
    $db = 'exo_196';
    $user = 'root';
    $pass = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    /* 3. Récupérez l'age minimum des utilisateurs.*/

    $stmt = $bdd->prepare("SELECT MIN(age) as mini FROM user");

    if ($stmt->execute()){
      $min = $stmt->fetch();
      echo "Le mini est " . $min['mini'] . "ans ! <br>";
    }

    /* 4. Récupérez l'âge maximum des utilisateurs.*/

    $stmt = $bdd->prepare("SELECT MAX(age) as max FROM user");

    if ($stmt->execute()){
        $max = $stmt->fetch();
        echo "Le max est " .$max['max'] . "ans ! <br>";
    }

    /* 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().*/

    $stmt = $bdd->prepare("SELECT count(*) as number FROM user");

    if ($stmt->execute()){
        $count = $stmt->fetch();
        echo "Le total est " .$count['number']. " ! <br>";
    }

    /* 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.*/

    $stmt = $bdd->prepare("SELECT count(*) as num FROM user WHERE numero >= 5");

    if ($stmt->execute()){
        $count = $stmt->fetch();
        echo "Le nombre est " .$count['num']. " ! <br>";
    }

    /* 7. Récupérez la moyenne d'âge des utilisateurs. */

    $stmt = $bdd->prepare("SELECT AVG(age) as moyenne FROM user");

    if ($stmt->execute()){
        $avg = $stmt->fetch();
        echo "La moyenne d'age est " .$avg['moyenne']. "ans ! <br>";
    }

    /* 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).*/

    $stmt = $bdd->prepare("SELECT SUM(numero) as somme FROM user");

    if ($stmt->execute()){
        $sum = $stmt->fetch();
        echo "La somme est " .$sum['somme']. " ! <br>";
    }
    ?>
</body>
</html>

