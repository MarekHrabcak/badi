<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$wcsaFunctions = new WcsaFunctions($connection->getConnection());

// Update Record in wcsas table
if(isset($_POST['update'])) {
    $wcsaFunctions->updateRecordWcsas($_POST);
}

?>