<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

//je to akcia, podmienka tu zostava
if (!CoreFunctions::isGranted(CoreFunctions::ROLE_ADMIN)) {
    CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
}
// Delete record from table
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $userFunctions = new UserFunctions($connection->getConnection());
    $userFunctions->deleteRecordUser($id);
}