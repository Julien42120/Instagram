<?php include("../include/header.php"); ?>

<body>
    <div class="containerlogin">
        
        <div class="formlogin">
            <form action="../requetes/login.php" method="POST" class="login">
                <br><h1>Connexion</h1>
                <div class="labelLogin">
                    <label><b> Pseudo </b></label><br><br>
                    <input type="text" class="input-field" placeholder="Entrer votre Pseudo" name="pseudo" required>
                </div><br>
                                   
                <div class="labelLogin">
                    <label><b> Mot de Passe </b></label><br><br>
                    
                    <input type="password" class="input-field" placeholder="Votre mot de passe" name="password" id="password" required>
                </div><br>
                <label for="checkbox">
                    <input type="checkbox" id="checkbox">
                        Afficher le mot de passe
                </label><br><br>
        

                <button id="bouton"> Se connecter </button><br><br>

                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

            </form>
        </div>
    </div><br><br>
</body>


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/viewPassword.js"></script>
</html>