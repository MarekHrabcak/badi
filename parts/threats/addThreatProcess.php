<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$threatFunctions = new ThreatFunctions($connection->getConnection());

// Insert Record in threats table
if(isset($_POST['submit'])) {
    $threatFunctions->insertDataThreats($_POST);
}
?>