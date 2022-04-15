<?php
//je to akcia, podmienka tu zostava
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

    $userFunctions = new UserFunctions($connection->getConnection());

    $userFunctions->logout();

    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
