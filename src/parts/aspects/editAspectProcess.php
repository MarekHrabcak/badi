<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$aspectFunctions = new AspectFunctions($connection->getConnection());

// Update Record
if(isset($_POST['update'])) {
    $aspectFunctions->updateRecordAspects($_POST);
}

?>