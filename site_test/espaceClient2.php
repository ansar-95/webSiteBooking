<?php include("entete.php"); ?>

<div class="container">
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">

        <!-- Inscription -->
        <div class="col-lg-7">

            <div class="well">
                <h2>CREER MON ESPACE CLIENT</h2>
                <form method='post' action='inscription.php'>
                    <p>Il y a une erreur lors votre inscription. Veuillez réremplir le formulaire.</p>
                    <div class="form-group">

                        <input name="contact" type="text" placeholder="NOM" class="form-control">

                    </div>
                    <div class="form-group">
                        <input name="raisonSociale" type="text" placeholder="Nom de l'entreprise" class="form-control">
                    </div>
                    <div class="form-group">

                        <input name="adrMel" type="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="login" type="text" placeholder="Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="mdp" type="password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="mdp2" type="password" placeholder="Confirmation du mot de passe" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="adresse" type="text" placeholder="Adresse" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="ville" type="text" placeholder="Ville" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="cp" type="text" placeholder="Code postal" class="form-control">
                    </div>



                    <div class="form-group">
                        <input name="telephone" type="text" placeholder="Téléphone" class="form-control">
                    </div>
                    <div class="form-group">
                        <p>Pays:
                            <select name="codePays">
                                <?php
                                $listePays = listePays();
                                foreach ($listePays as $pays) :
                                    ?>
                                    <option value='<?php echo $pays["codePays"]; ?>'>
                                        <?php echo $pays["nomPays"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </p>
                    </div>

                    <div> <button type="submit" class="btn btn-primary btn-sm">Inscription</button> </div>
                </form>

            </div>

        </div>
        <!-- Fin Inscription -->

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Se connecter -->
            <div class="well">
                <h1>J'AI DEJA UN ESPACE CLIENT</h1>
                <form action="connexion.php" method="post">
                    <div class="form-group">
                        <input name="login" type="text" placeholder="Login" class="form-control">

                    </div>
                    <div class="form-group">
                        <input name="mdp" type="password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <div> <button type="submit" class="btn btn-primary btn-sm">Connexion</button> </div>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
