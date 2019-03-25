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

        $req = $bdd->prepare('INSERT INTO users(nom, prenom, dateDeNaissance , email)
                                          VALUES( :nom, :prenom, :dateDeNaissance, :email)'
        );
        $req->execute(array(
            'nom' => $_POST['lastName'],
            'prenom' => $_POST['firstName'],
            'dateDeNaissance' => $_POST['dateBirth'],
            'email' => $_POST['email'],
        ));

        $rep =$bdd->query('SELECT * FROM users');
        $res = $rep->fetchAll();
        //print_r($res);

        $rep->closeCursor();


header('Location: index.php');
?>