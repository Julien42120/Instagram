<?php require_once(__DIR__ ."/../../pdo.php"); 
session_start();
$insertPhotos = $pdo->prepare("INSERT INTO photo
(id_user , Photos , Comment)
VALUES
(?, ? , ?);
");
    
$insertPhotos-> execute([
$_SESSION['id'],
"/photos/".$_FILES['Photos']['name'],
$_POST['Comment']

]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["Photos"]) && $_FILES["Photos"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["Photos"]["name"];
        $filetype = $_FILES["Photos"]["type"];
        $filesize = $_FILES["Photos"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("../../photos/" . $_FILES["Photos"]["name"])){
                echo $_FILES["Photos"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["Photos"]["tmp_name"], "../../photos/" . $_FILES["Photos"]["name"]);
                header('Location: ../../index.php?message=Votre fichier a bien été crée.');
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["Photos"]["error"];
    }
}

