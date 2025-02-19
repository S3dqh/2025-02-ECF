<!-- Formulaire de recherche de covoiturage(s) -->

<div id="search_form">
    <p>Chercher un trajet</p>
    <form action="carpools.php" method="POST">
        <label for="departure_date">Date : </label>
        <input type="date" id="departure_date" name="departure_date" />
        &nbsp;-&nbsp;
        <label for="departure_place">Départ de : </label>
        <input type="text" id="departure_place" name="departure_place" />
        &nbsp;-&nbsp;
        <label for="arrival_place">Arrivée à : </label>
        <input type="text" id="arrival_place" name="arrival_place" />
        &nbsp;-&nbsp;
        <input type="submit" name="carpool_search_form_submit" value="Chercher" />
    </form>
</div>