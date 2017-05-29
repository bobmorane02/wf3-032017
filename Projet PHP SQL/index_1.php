<?php
include_once ('inc/haut.inc.php');
?>
        <div class="col-md-3">
            <div class="btn-group-vertical" role="group">
                <h5 class="text-left"><strong>Catégorie</strong></h5>
                <button type="button" class="btn btn-default">Réunion</button>
                <button type="button" class="btn btn-default">Bureau</button>
                <button type="button" class="btn btn-default">Formation</button>
            </div>
            <div class="btn-group-vertical" role="group">
                <h5 class="text-left"><strong>Ville</strong></h5>
                <button type="button" class="btn btn-default">Paris</button>
                <button type="button" class="btn btn-default">Lyon</button>
                <button type="button" class="btn btn-default">Marseille</button>
            </div>
            <div class="form-group">
                <label for="capacite"><strong>Capacité</strong></label>
                <select class="form-control" name="capacite" id="capacite">
                    <option value="3">3</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prix"><strong>Prix</strong></label>                
                <input type="range" min="0" max="3000" step="50" name="prix" id="prix">
                <p class="text-left"><em>maximum <span id="max"></span>1000</em> €</p>
            </div>
            <div class="form-group">
                <p class="text-left"><strong>Période</strong></p>                
                <div class="text-left"><em>Date d'arrivée</em></div>
                <div class="input-group">                        
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    <input type="text" class="form-control" name="date_arrivee">
                </div>
            </div>
            <div class="form-group">
                <div class="text-left"><em>Date de départ</em></div>
                <div class="input-group">                        
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    <input type="text" class="form-control" name="date_arrivee">
                </div>
            </div>
            <p class="text-center" id="nb_resultat"></p>
            
        </div>        
    </div> <!-- Fin du container-->


<?php
include_once('inc/bas.inc.php');
?>