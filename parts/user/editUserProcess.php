<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

//je to akcia, podmienka tu zostava
if (!CoreFunctions::isGranted(CoreFunctions::ROLE_ADMIN)) {
    CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
}
$userFunctions = new UserFunctions($connection->getConnection());

// Update Record
if(isset($_POST['update'])) {
    $userFunctions->updateRecordUser($_POST);
}

?>