<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}
$aspectFunctions = new AspectFunctions($connection->getConnection());


// Insert Record in customer table
if(isset($_POST['submit'])) {
    $aspectFunctions->insertDataAspects($_POST);
}

?>

