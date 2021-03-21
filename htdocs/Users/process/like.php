<?php session_start();
 require_once(__DIR__ . "/../../pdo.php");

 if (isset($_POST['id_photo']) && isset($_POST['id_user'])) {
   echo "ppl";
    
    $verifLikeStatement = $pdo->prepare('SELECT * FROM LikePhotos WHERE idPhoto = ? AND IdUser = ? ');
    $verifLikeStatement->execute([
         $_POST['id_photo'],
         $_POST['id_user']
    ]);
    $is_like = $verifLikeStatement->fetch(PDO::FETCH_ASSOC);

     if ($is_like) {
      echo "PHOTO SUPPRIMER";
        
        $deleteLikeStatement = $pdo->prepare('DELETE FROM LikePhotos WHERE idPhoto = ? AND IdUser = ? ');
        $deleteLikeStatement->execute([
            $_POST['id_photo'],
            $_POST['id_user']
        ]);
     }else{

        $likeStatement = $pdo->prepare('INSERT INTO LikePhotos (idPhoto, idUser) VALUE (?,?)');
        $likeStatement->execute([
            $_POST['id_photo'],
            $_POST['id_user']
        ]);
        echo "PhotoAjouté";
     }

}