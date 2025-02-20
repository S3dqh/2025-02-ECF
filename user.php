<?php
    require_once "EcoRide/Views/_head.php";
?>

    <!-- Header (en-tête) -->
    <?php
        define("HEADER_CONTENT", "Espace utilisateur");
        require_once "ecoride/views/_header.php";
    ?>
    <!-- -->

    <!-- Main (section principale) -->
    <?php
        define("MAIN_CONTENT", "EcoRide/Forms/CarAddForm.php|EcoRide/Forms/PreferenceAddForm.php"); // doit être changé pour un Controller
        require_once "ecoride/views/_main.php";
    ?>
    <!-- -->

    <!-- Footer (pied-de-page) -->
    <?php
        require_once "ecoride/views/_footer.php";
    ?>
    <!-- -->

    </section>
</body>