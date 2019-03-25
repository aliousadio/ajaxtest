<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>formUser</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="container">
        <h1>Enregister un utilisateur</h1>
        <form method="POST" action="saveUser.php" class="  col-md-6 offset-col-md-6">
            <div class="form-group ">
                <label for="lastName">Nom </label>
                <input type="text" class="form-control" id="lastName" name="lastName"  placeholder="Votre nom" required>
            </div>

            <div class="form-group ">
                <label for="firstName">Prénom </label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Votre prénom" required>
            </div>

            <div class="form-group">
                <label for="dateBirth">Date de naissance </label>
                <input type="date" class="form-control" id="dateBirth" name="dateBirth" placeholder="Votre date de naissance" required>
            </div>


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" required>
            </div>
            <div >
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form><br>

        <h1> Les utilisateurs enregistrés</h1>
        <table class="table ">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prémom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Email</th>
            </tr>
            </thead>

            <tbody>
           <?php
           try
           {
               $bdd = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', '',
                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
           }
           catch(Exception $e)
           {
               die('Erreur : '.$e->getMessage());
           }

            $req =$bdd->query('SELECT *, DATE_FORMAT(dateDeNaissance, \'%d/%m/%Y\') AS date FROM users');

            while($rep = $req->fetch())
           {
            ?>

            <tr >
                <td><?php echo $rep['id_user']?></td>
                <td><?php echo $rep['nom']?></td>
                <td><?php echo $rep['prenom']?></td>
                <td><?php echo $rep['date']?></td>
                <td><?php echo $rep['email']?></td>
            </tr>

            <?php
             }
            $req->closeCursor();
            ?>

            </tbody>
        </table>

</body>

</html>