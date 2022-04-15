<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$dreadFunctions = new DreadFunctions($connection->getConnection());

// Insert Record
if(isset($_POST['submit'])) {
    $dreadFunctions->insertDataDread($_POST);

}

?>