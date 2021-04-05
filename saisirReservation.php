<?php 
require 'autorisation.php';
require 'header.php';
 
?>        
<?php $listeVilles = listeVilles(); ?>
 	<div id="booking" class="section imagefond">
		<div class="section-center">
                    <h2 class="text-center text-uppercase pb-5">etape n°1 de la reservation </h2>
			<div class="container">
				<div class="row">
                                    
					<div class="booking-form">                                          
						<form method="post" action="saisirReservation.traitement.php">
							<div class="row no-margin">
                                                            <?php
                                                             $date = new DateTime('now');
                                                             $dateToday = date_modify($date,'+2 day');
                                                             $dateToday = date_format($dateToday, 'Y-m-d');
                                                            ?>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Début de reservation</span>
                                                                                <input id="dateDebut" class="form-control" min="<?php echo $dateToday ?>" v type="date" name="dateDebutReservation" required> 
                                                                                
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
                                                                           
										<span class="form-label">Fin de réservation</span>
										<input id="dateFin" class="form-control"  type="date" name="dateFinReservation" required>
									</div>
								</div>
							</div>
							<div class="row no-margin">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Ville de départ</span>
										<select class="form-control" name="codeVilleMiseDisposition">
                                                                                        <?php
                                                                                        foreach ($listeVilles as $ville){
                                                                                            ?>
                                                                                        <option value="<?php echo $ville["codeVille"] ; ?>">
                                                                                                <?php echo $ville["nomVille"] ; ?>
                                                                                            </option>                    
                                                                                        <?php } ?>                                                                              

										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Ville d'arrivée</span>
										<select class="form-control" name="codeVilleRendre">
                                                                                        <?php
                                                                                        foreach ($listeVilles as $ville){
                                                                                            ?>
                                                                                        <option value="<?php echo $ville["codeVille"] ; ?>">
                                                                                                <?php echo $ville["nomVille"] ; ?>
                                                                                            </option>                    
                                                                                        <?php } ?>   
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>

							<div class="form-group">
								<span class="form-label">Volume estime</span>
								<input class="form-control" type="number" name="volumeEstime" >
							</div>
							<div class="form-btn">
								<button class="submit-btn">Reserver</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

                <script>
                $('#dateDebut').blur(function(){

                    // Selecting the input element and get its value 
                   $("#dateFin").attr("min", $("#dateDebut").val());

        })
                </script>
                
    </body>
</html>
