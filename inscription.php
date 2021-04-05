<?php include_once 'publicHeader.php' ?>



         	<div id="booking" class="section imagefond">
		<div class="section-center">
			<div class="container">
				<div class="row">
				<div class="booking-form">                                          
						<form method="post" action="inscription.traitement.php">

                            <div class="form-group">
                                <span class="form-label">Nom</span>
                                <input class="form-control" type="text" name="contact" pattern="^[-'çéèùa-zA-Z\s]{1,45}$" required>
                            </div>

                             <div class="form-group">
				<span class="form-label">Raison Social</span>
				<input class="form-control" type="text" name="raisonSociale" placeholder="Nom de l'entreprise" pattern="^[-'çéèùa-zA-Z\s]{1,45}$"required>
			    </div>

                            <div class="form-group">
                                <span class="form-label">Adresse Email</span>
                                <input class="form-control" type="email" name="adrMel" pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})"  required>
                            </div>
                            <div class="form-group pd-telephone-input">   
                                <span class="form-label ml-5">N°Telephone</span>
                                <input  type="tel" name="telephone" class="form-control" >
                            </div>
                            <div class="form-group">
                                <span class="form-label">adresse</span>
                                <input type="search" class="form-control" id="form-address" name="adresse" placeholder="Adresse"  required>
                            </div>

                            <div class="row no-margin">
                                <div class="col-sm-6">
                                    <span class="form-label">Ville</span>
                                    <input type="text"  class="form-control" id="form-city" placeholder="Paris" name="ville" required >
                                    
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Code Postal</span>
                                        <input type="text" class="form-control" id="form-zip" placeholder="75000" name="cp" required>
                                        <input type="hidden" id="form-codeCountry" name="pays">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <span class="form-label">Login</span>
                                <input type="text" class="form-control"  placeholder="indentifiant" name="login" required>
                            </div>  
                                                    
                            <div class="form-group">
                                <span class="form-label">Mot de Passe</span>
                                <input type="password" class="form-control"  name="mdp" required>
                            </div>                          



                            <div class="form-btn">
                                    <button class="submit-btn">S'inscrire</button>
                            </div>


                                                        

                      <div class="form-group">
                           <a href="connexion.php" class="form-label">Se connecter ?</a>
                       </div>

						</form>
                                    
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="https://cdn.jsdelivr.net/npm/places.js@1.18.1"></script>
<script src="tel/pidie-0.0.8.js"></script>

<script>
    (function() {
        var placesAutocomplete = places({
            appId: 'plFPADAK9KJL',
            apiKey: 'd31dbb9153e4a953a844e512a66f7dc9',
            container: document.querySelector('#form-address'),
            templates: {
                value: function(suggestion) {
                    return suggestion.name;
                }
            }
        }).configure({
            type: 'address'
        });
        placesAutocomplete.on('change', function resultSelected(e) {
            document.querySelector('#form-city').value = e.suggestion.city || '';
            document.querySelector('#form-zip').value = e.suggestion.postcode || '';
            document.querySelector('#form-codeCountry').value = e.suggestion.countryCode || '';


        });
    })();

</script>

<script>
    var pidie = new Pidie();
</script>




    </body>
</html>