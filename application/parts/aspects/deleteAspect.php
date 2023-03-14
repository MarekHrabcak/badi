<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

// Delete record from table
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $aspectFunctions = new AspectFunctions($connection->getConnection());
    $aspectFunctions->deleteRecordAspect($id);
}