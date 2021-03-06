<?php include("include/header.php"); ?>
<?php require_once(__DIR__ . "/pdo.php");

    $randomPhoto = $pdo->prepare('SELECT photo.*, Users.pseudo , Users.Avatar FROM photo
                                JOIN Users
                                ON Users.id = photo.id_user
                                ORDER BY photo.DateTime DESC');
    $randomPhoto->execute();
    $AllPhoto = $randomPhoto->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($AllPhoto);

// include 'Users/process/';

?>


<img id="logo" src="images_Interne/White Basic Presentation Template.png">
<br><br>

<body>

    <div class="containerIndex " data-IdUser ='<?=$_SESSION['id']?>'>
        <div class="row">
            <?php foreach ($AllPhoto as $photo) { ?>
                <div class="col-sm-3 d-flex  flex-column justify-content-center align-items-center" id="BlocPhoto"><br>
                    <div class="topAvatar">
                        <img class="miniAvatar" width="70" height="70" src="<?= $photo['Avatar'] ?>">
                        <p class="PseudoIndex" ><?= $photo['pseudo'] ?></p>  
                    </div>
                    <h4><?= $photo['Comment'] ?></h4>
                    <img class="photosIndex" src="<?= $photo['Photos'] ?>"><br>
                    <div class="likeComment">
                        <a class="like-button launcher-like" data-idPhoto = "<?= $photo['id'] ?>">
                            <svg data-idPhoto = "<?= $photo['id'] ?>" width="30" height="30" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path data-idPhoto = "<?= $photo['id'] ?>"  d="M320 1344q0-26-19-45t-45-19q-27 0-45.5 19t-18.5 45q0 27 18.5 45.5t45.5 18.5q26 0 45-18.5t19-45.5zm160-512v640q0 26-19 45t-45 19h-288q-26 0-45-19t-19-45v-640q0-26 19-45t45-19h288q26 0 45 19t19 45zm1184 0q0 86-55 149 15 44 15 76 3 76-43 137 17 56 0 117-15 57-54 94 9 112-49 181-64 76-197 78h-129q-66 0-144-15.5t-121.5-29-120.5-39.5q-123-43-158-44-26-1-45-19.5t-19-44.5v-641q0-25 18-43.5t43-20.5q24-2 76-59t101-121q68-87 101-120 18-18 31-48t17.5-48.5 13.5-60.5q7-39 12.5-61t19.5-52 34-50q19-19 45-19 46 0 82.5 10.5t60 26 40 40.5 24 45 12 50 5 45 .5 39q0 38-9.5 76t-19 60-27.5 56q-3 6-10 18t-11 22-8 24h277q78 0 135 57t57 135z" />
                            </svg>
                        </a><br>
                        <textarea class="Comment" placeholder="Entrer un commentaire ????" name="Comment"></textarea><br>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            <?php } ?>
        </div>
    </div>
</body>

<?php include("../htdocs/include/footer.php"); ?>

<script src="js/like-animation.js"></script>
<script src="js/like-ajax.js"></script>
</html>