<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}


$modelFunctions = new ModelFunctions($connection->getConnection());
// Update Record in models table
if(isset($_POST['update'])) {
    $modelFunctions->updateRecordModels($_POST);
}
?>