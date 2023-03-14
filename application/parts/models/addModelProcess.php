<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$modelFunctions = new ModelFunctions($connection->getConnection());
// Insert Record in models table
    if(isset($_POST['save'])) {
    $modelFunctions->insertDataModels($_POST);
    }
?>
