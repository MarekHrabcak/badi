<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$dreadFunctions = new DreadFunctions($connection->getConnection());

// Update Record in customer table
if(isset($_POST['update'])) {
    $dreadFunctions->updateRecordDread($_POST);
}

?>