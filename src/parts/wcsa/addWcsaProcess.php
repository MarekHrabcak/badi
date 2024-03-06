<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$wcsaFunctions = new WcsaFunctions($connection->getConnection());

// Insert Record in wcsas table
if(isset($_POST['submit'])) {
    $wcsaFunctions->insertDataWcsas($_POST);
}
?>