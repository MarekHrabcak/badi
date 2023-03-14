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


// Insert Record in customer table
if(isset($_POST['submit'])) {
    $userFunctions->insertDataUser($_POST);
}

?>