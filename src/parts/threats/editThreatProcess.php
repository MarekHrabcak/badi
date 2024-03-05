<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$threatFunctions = new ThreatFunctions($connection->getConnection());

// Update Record in threats table
if(isset($_POST['update'])) {
    $threatFunctions->updateRecordThreats($_POST);
}

?>