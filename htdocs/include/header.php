<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Dosis:600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../insta.css">
    <title>Document</title>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Instagram</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <?php if ( $_SESSION ){?>

                        <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                        <a class="nav-link active" href="../Users/profil.php">Profil</a>
                        <a class="nav-link active" href="../Users/decoUser.php">Deconnexion</a>

                    <?php } else {  ?>

                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                        <a class="nav-link active" href="../Users/createUser.php">Inscription</a>
                        <a class="nav-link active" href="../Users/coUser.php"> Connexion</a>
                        

                    <?php } ?>
                </div>
            </div>
            
                <form method="post" class="recherche" action="../Users/allProfil.php">
                    <input type="text" name="pseudo" Placeholder="Nom a rechercher">
                    <button> Rechercher </button>
                </form>
           

        </div>
    </nav>
    <?php if (isset($_GET["message"])) : ?>
        <div style="padding:10px;background:linear-gradient(#1eff2a , #012e08);color:#fff;">
            <?= $_GET["message"] ?>
        </div>
    <?php endif; ?>
</head>
</html>