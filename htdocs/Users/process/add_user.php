<?php require_once(__DIR__ ."/../../pdo.php"); 

if (empty($_POST["pseudo"])) {
    die("Paramètres manquants");
}

$pseudo = $_POST["pseudo"];
$description = $_POST["description"];
$password = $_POST["password"];
$pass2 = $_POST["password2"];

if ($password != $pass2){
    header('Location:../inscription.php?message=Les mots de passe sont différents.');
} else {


    $insertStatement = $pdo->prepare("INSERT INTO Users
    (pseudo , password , description , Avatar)
    VALUES
    (?, ?, ?, ?);
    ");

    $insertStatement->execute([
    $pseudo,
    $password,
    $description,
    "/images/".$_FILES['Avatar']['name']

]);

header('Location: ../../index.php?message=Votre utilisateur a bien été crée.');
}
   


if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["Avatar"]) && $_FILES["Avatar"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["Avatar"]["name"];
        $filetype = $_FILES["Avatar"]["type"];
        $filesize = $_FILES["Avatar"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("../../images/" . $_FILES["Avatar"]["name"])){
                echo $_FILES["Avatar"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["Avatar"]["tmp_name"], "../../images/" . $_FILES["Avatar"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["Avatar"]["error"];
    }
}

