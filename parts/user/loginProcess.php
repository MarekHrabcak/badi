<?php
//je to akcia, podmienka tu zostava
//if (CoreFunctions::isGranted()) {
//    CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
//}

$userFunctions = new UserFunctions($connection->getConnection());

// Insert Record in threats table
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userFunctions->login($email,$password);
} else {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}