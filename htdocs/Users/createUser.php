<?php include("../include/header.php"); ?>

<body>
    <form action="process/add_user.php" method="POST" class="create" enctype="multipart/form-data">
        <br>
        <div class="ContainerFormulaire"><br>
            <h1>Créer un compte</h1>
            <div class="labelIns">
                <label><b> Pseudo </b></label><br><br>
                <input type="text" class="inputPseudo" placeholder="Entrer votre Pseudo" name="pseudo" required>
            </div><br>
            <label>Mot de passe</label> <br><br>
            <input type="password" name="password" id="password" required Placeholder="Mot de passe"> <br><br>
            <label>Confirmation mot de passe</label> <br><br>
            <input type="password" name="password2" id="password2" required Placeholder="Confirmation mot de passe"> <br><br>

            <label for="checkbox">
                <input type="checkbox" id="checkbox">
                Afficher le mot de passe
            </label><br><br>
            <div class="labelIns">
                <label><b> Description </b></label><br><br>
                <textarea class="input-field" placeholder="Entrer une description, Max 255 caractères" name="description"></textarea>
            </div><br>
            <div class="labelIns">
                <label><b> Photo de profil </b></label><br><br>
                <input type="file" name="Avatar" id="photo">
            </div><br>
            <button id="bouton"> S'inscrire </button><br><br>
        </div>
        <?php
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1 || $err == 2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
        }
        ?>

    </form>
</body>

<script type="text/javascript" src="../viewPassword.js"></script>

</html>