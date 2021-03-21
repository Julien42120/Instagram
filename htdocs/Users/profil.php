<?php include("../include/header.php"); ?>
<?php require_once(__DIR__ . "../../pdo.php");


$selectPhotos = $pdo->prepare(
    'SELECT*FROM photo WHERE id_user=?'
);
$selectPhotos->execute([
    $_SESSION['id']
]);
$AllPhotos = $selectPhotos->fetchAll(PDO::FETCH_ASSOC);
// var_dump($_SESSION)
?>

<body>
<div class="ProfilAll">
    <div class="row upload">
        <div class="col-sm-1"></div>
        <div class="col-10">
                <div class="containerProfil">
                    <img class="AvatarAll" width="200" height="200" src="<?= $_SESSION['Avatar'] ?>"><br>
                    <div class="presentation">
                        <h1><?=$_SESSION['pseudo']?> </h1>
                        <h3><?= $_SESSION['description'] = $_SESSION['description']; ?></h3>
                    </div>
                </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

<div class="AjoutPhoto">
    <div class="row_ajout">
        <div class="col-1"></div>
            <div class="upload col-10">
                <form action="process/add_photo.php?id=<?= $_SESSION['id'] ?>" method="post" class="create" enctype="multipart/form-data">
                    <div class="AddPhoto">
                        <label class="labelProfil"><b> Poster une photo </b></label>
                        <input class="insertPhoto" type="file">

                        <label class="labelProfil"><b> Commentaire </b></label>
                        <textarea class="insertPhoto" name='Comment' placeholder="Entrer une description"></textarea><br>

                        <button id="bouton"> </button><br><br>
                    </div>

                    <?php
                    if (isset($_GET['erreur'])) {
                        $err = $_GET['erreur'];
                        if ($err == 1 || $err == 2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    ?>
                </form>
            </div>
        <div class="col-1"></div>      
    </div>
</div>

                    <?php
                    if (isset($_GET['erreur'])) {
                        $err = $_GET['erreur'];
                        if ($err == 1 || $err == 2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <div class="containerPhotos">
        <div class="row">
            <?php foreach ($AllPhotos as $photo) { ?>
                
                <div class="col-sm-3"><br>
                    <h4><?= $photo['Comment'] ?></h4>
                    <img class="photos" src="<?= $photo['Photos']?>"><br><br>
                    <textarea class="Comment" placeholder="Entrer un commentaire 📝" name="Comment"></textarea><br>
                    
                </div>
                <div class="col-sm-1"></div>
            <?php } ?>
        </div>
    </div>
</body>

<?php include("../include/footer.php"); ?>
</html>
