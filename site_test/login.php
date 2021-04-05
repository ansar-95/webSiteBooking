<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/business-casual.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">Business Casual</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Accueil</a>
                        </li>
                        <li>
                            <a href="Nos produits.html">Nos produits</a>
                        </li>
                        <li>
                            <a href="Contact.html">Contact</a>
                        </li>
                        <li>
                            <form  method="post" class="navbar-form navbar-right" role="form" 
                                   action="index.php">

                                <div class="form-group">

                                    <input name="user" type="text" placeholder="Email" class="form-control">

                                </div>
                                <div class="form-group">
                                    <input name="mdp" type="password" placeholder="Password" class="form-control">
                                </div>
                                <button type="button" class="btn btn-primary">S'authentifier</button>
                            </form>
                        </li>						
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">
            <!-- /.row -->

            <!-- Content Row -->
            <div class="row">

                <!-- Inscription -->
                <div class="col-lg-8">

                    <div class="well">
                        <h2>CREER MON ESPACE CLIENT</h2>
                        <div class="form-group">
                            <input name="user" type="text" placeholder="Prénom" class="form-control">

                        </div>
                        <div class="form-group">
                            <input name="mdp" type="password" placeholder="Nom de famille" class="form-control">
                        </div>
                        <div class="form-group">

                            <input name="user" type="text" placeholder="Email" class="form-control">

                        </div>
                        <div class="form-group">
                            <input name="mdp" type="password" placeholder="Mot de passe" class="form-control">
                        </div> 
                        <div> <button type="button" class="btn btn-primary btn-sm">Inscription</button> </div>
                    </div>
                </div>
                <!-- Fin Inscription -->

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Se connecter -->
                    <div class="well">
                        <h1>J'AI DEJA UN ESPACE CLIENT</h1>
                        <div class="form-group">
                            <input name="user" type="text" placeholder="Adresse email" class="form-control">

                        </div>
                        <div class="form-group">
                            <input name="mdp" type="password" placeholder="Mot de passe" class="form-control">
                        </div>
                        <div> <button type="button" class="btn btn-primary btn-sm">S'identifier</button> </div>
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
