<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$factorFunctions = new FactorFunctions($connection->getConnection());

// Update Record in customer table
if(isset($_POST['update'])) {
    $factorFunctions->updateRecordFactor($_POST);
}

?>