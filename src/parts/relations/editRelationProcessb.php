<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$relationFunctions = new relationFunctions($connection->getConnection());

// Update Record in relations table
if(isset($_POST['update'])) {
    $relationFunctions->updateRecordRelationb($_POST);
}

?>