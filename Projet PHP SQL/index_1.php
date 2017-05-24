<?php
include_once ('inc/start.inc.php');
include_once ('inc/haut.inc.php');
?>
        <section>
            <aside>
                <div>
                    <h4>Catégorie</h4>
                    <button>Reunion</button>
                    <button>Bureau</button>
                    <button>Formation</button>
                </div>
                <div>
                    <h4>Ville</h4>
                    <button>Paris</button>
                    <button>Lyon</button>
                    <button>Marseille</button>
                </div>
                <div>
                    <h4>Capacité</h4>
                    <select name="capacite" id="capatite">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    <h4>Prix</h4>
                </div>
                <div>
                    <h4>Période</h4>
                    <label for="arrivee">Date d'arrivée</label>
                    <input id="arrivee" type="date" name="arrivee">
                    <label for="depart">Date d'arrivée</label>
                    <input id="depart" type="date" name="depart">
                </div>                   
            </aside>
        </section>
        <section id="corp"></section>
<?php
include_once('inc/bas.inc.php');
?>