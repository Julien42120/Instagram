<?php

require_once(__DIR__ . "../../pdo.php");
session_start();

if (empty($_POST["pseudo"])) {
    die("Paramètres manquants");
}

if (isset($_POST['pseudo'])) {
    $req = $pdo->prepare('SELECT * FROM Users WHERE pseudo = ?');
    $nickname = $_POST['pseudo'];
    
    $req->execute(array(
        $nickname
    ));
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        if ($resultat['pseudo'] === $nickname && $resultat['password'] === $_POST['password']){
            $_SESSION['id']= $resultat['id'];
            $_SESSION['pseudo']= $resultat['pseudo'];
            $_SESSION['password']= $_POST['password'];
            $_SESSION['description']= $resultat['description'];
            $_SESSION['Avatar']= $resultat['Avatar'];
            header('Location:../../index.php?message=Salut '.$nickname.' tu es connecté a ton compte !');
            
        }
        
        else {
            header('Location:../../index.php?message=pseudo ou mot de passe faux !');
        }
}

