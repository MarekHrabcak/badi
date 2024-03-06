<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$factorFunctions = new FactorFunctions($connection->getConnection());

// Insert Record
if(isset($_POST['submit'])) {
    $factorFunctions->insertDataFactor($_POST);

}

?>