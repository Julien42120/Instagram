<?php 

$likedPhotos = $pdo->prepare('SELECT * FROM LikePhotos WHERE LikePhotos.idUser = ?');
$likedPhotos->execute([
    $_SESSION['id']
]);
$AllPhotoLiked = $likedPhotos->fetchAll(PDO::FETCH_ASSOC);
// var_dump($AllPhotoLiked);
