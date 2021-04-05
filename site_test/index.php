<?php include("entete.php"); ?>

    <div class="container">
	
	<div class="container">
	
	<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Bienvenue</strong>
                    </h2>
                    <hr>
                    <p>La société THOLDI est spécialisée dans la gestion des containeurs destinés au transport de marchandises. Elle intervient en qualité de prestataire de services pour le compte d’entreprises de transports mais développe également depuis 2010 une activité de fret au travers de sa filiale « Eole ».
					</p>
				<p><a class="btn btn-primary" href="laSociete.php" role="button">Lire la suite</a> </p>            
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/Logo Sathish.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/slide3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.container -->

    <footer>
	
    </footer>

       
        

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

</body>

</html>
