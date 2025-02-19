<div class="content">

<?php

if (!defined("MAIN_CONTENT")) {
    define("MAIN_CONTENT", "EcoRide/Views/_home.php");
    require_once MAIN_CONTENT;
}
else {
     $main_content = explode("|", MAIN_CONTENT);
    if (is_array($main_content)) {
        foreach ($main_content AS $item) {
            require_once $item;
        }
    } else {
        require_once MAIN_CONTENT;
    }
}


?>

</div>