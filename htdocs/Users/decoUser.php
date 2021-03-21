<?php
session_start();
session_destroy();
header('Location:../index.php?message=Vous êtes deconnecté, merci de votre visite!');
?>

