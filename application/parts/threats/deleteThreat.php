<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

// Delete record from table
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $threatFunctions = new ThreatFunctions($connection->getConnection());
    $threatFunctions->deleteRecordTh($id);
}