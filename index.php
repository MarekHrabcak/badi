<?php
//session start

session_start();


include 'core.php';
include 'src/ThreatFunctions.php';
include 'src/ModelFunctions.php';
include 'src/AspectFunctions.php';
include 'src/DreadFunctions.php';
include 'src/CalculationFunctions.php';
include 'src/UserFunctions.php';
include 'src/AlertFunctions.php';
include 'src/CoreFunctions.php';
//
AlertFunctions::startAlerts();

$connection = new Connection();

if (isset($_GET['action']) && $_GET['action'] != '') {
    $action = $_GET['action'];

    //    Delete actions
    if ($action == 'deleteThreat') {
        include_once "parts/threats/deleteThreat.php";

    } elseif ($action == 'deleteAspect') {
        include_once "parts/aspects/deleteAspect.php";

    } elseif ($action == 'deleteModel') {
        include_once "parts/models/deleteModel.php";

    } elseif ($action == 'deleteDread') {
        include_once "parts/aspects/deleteDread.php";

    } elseif ($action == 'deleteUser') {
        include_once "parts/user/deleteUser.php";

        //    ADD actions
    } elseif ($action == 'addAspect') {
        include_once "parts/aspects/addAspectProcess.php";

    } elseif ($action == 'addModel') {
        include_once "parts/models/addModelProcess.php";

    } elseif ($action == 'addDread') {
        include_once "parts/aspects/addDreadProcess.php";

    } elseif ($action == 'addThreat') {
        include_once "parts/threats/addThreatProcess.php";

    } elseif ($action == 'addUser') {
        include_once "parts/user/addUserProcess.php";

        //    EDIT actions
    } elseif ($action == 'editAspect') {
        include_once "parts/aspects/editAspectProcess.php";

    } elseif ($action == 'editModel') {
        include_once "parts/models/editModelProcess.php";

    } elseif ($action == 'editDread') {
        include_once "parts/aspects/editDreadProcess.php";

    } elseif ($action == 'editThreat') {
        include_once "parts/threats/editThreatProcess.php";

    } elseif ($action == 'editRole') {
        include_once "parts/user/editRoleProcess.php";

//        Others

    } elseif ($action == 'login') {
        include_once "parts/user/loginProcess.php";

    } elseif ($action == 'logout') {
        include_once "parts/user/logoutProcess.php";

    } elseif ($action == 'editUser') {
    include_once "parts/user/editUserProcess.php";
    }
}



//Validacia role ADMIN
if (isset($_GET['page']) && $_GET['page'] != '') {
    $page = $_GET['page'];



//    Validacia role ADMIN
    if (in_array($page, ['users', 'editUser', 'addUser','editRole']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_ADMIN)) {
        AlertFunctions::addAlert(AlertFunctions::ERROR, 'Nemate opravnenie');
        CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
    }

//    ////Validacia role operator
    if (in_array($page, ['models','addModel','editModel']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_OPERATOR)) {
//        die('validacia role operator');
        AlertFunctions::addAlert(AlertFunctions::ERROR, 'Nemate opravnenie');
        CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
    }

//
//Validacia role Analyst
    if (in_array($page, ['threats', 'editThreat', 'addThreat', 'aspects', 'addAspect', 'editAspect', 'addDread', 'editDread']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_RISK_ANALYST)) {
        AlertFunctions::addAlert(AlertFunctions::ERROR, 'Nemate opravnenie');
        CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
    }

//

////Validacia role USER
    if (in_array($page, ['homepage']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_USER)) {

//        AlertFunctions::addAlert(AlertFunctions::ERROR, 'Nemate opravnenie');
        CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);

    }

    //TODO doplnit dalsie stranky

    //TODO doplnit opravnenia pre NAV

}



//      Tento default redirect nefunguje
//    if (!isset($_GET['page']) || $_GET['page'] == '') {
//        CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
//    }

?>

<!doctype html>
<html lang="en">
<?php include_once "parts/template/head.php"; ?>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include_once "parts/template/nav.php"; ?>
<!--            zmena sirky ramu px (padding po x osi)-->
            <div class="col py-3 px-4 content-container">

                 <?php

                 $alerts = AlertFunctions::getAlerts();
                 if (count($alerts)>0) {
                     foreach ($alerts AS $alert ) {
                         ?> <div class="alert alert-<?php echo $alert['type'];?>"><?php echo $alert['message'];?></div>
                         <?php
                        }
                     AlertFunctions::clearAlerts();
                 }

                 if (isset($_GET['page']) && $_GET['page'] != '') {
                     $page = $_GET['page'];
                     if ($page == 'threats' ) {
                         include_once "parts/threats/threats.php";
                     } elseif ($page == 'addThreat' ) {
                         include_once "parts/threats/addThreat.php";
                     } elseif ($page == 'editThreat' ) {
                         include_once "parts/threats/editThreat.php";
                     } elseif ($page == 'aspects' ) {
                         include_once "parts/aspects/aspects.php";
                     } elseif ($page == 'addAspect' ) {
                         include_once "parts/aspects/addAspect.php";
                     } elseif ($page == 'editAspect' ) {
                         include_once "parts/aspects/editAspect.php";
                     } elseif ($page == 'models' ) {
                         include_once "parts/models/models.php";
                     } elseif ($page == 'addModel' ) {
                         include_once "parts/models/addModel.php";
//                     } elseif ($page == 'countModel' ) {
//                         include_once "parts/models/addModel.php";
                     } elseif ($page == 'editModel' ) {
                         include_once "parts/models/editModel.php";
                     } elseif ($page == 'editDread' ) {
                         include_once "parts/aspects/editDread.php";
                     } elseif ($page == 'addDread' ) {
                         include_once "parts/aspects/addDread.php";
                     }  elseif ($page == 'login' ) {
                         include_once "parts/user/login.php";
                     }  elseif ($page == 'homepage' ) {
                         include_once "parts/homepage.php";
                     }  elseif ($page == 'addUser' ) {
                         include_once "parts/user/addUser.php";
                     }  elseif ($page == 'editUser' ) {
                         include_once "parts/user/editUser.php";
                     }  elseif ($page == 'users' ) {
                         include_once "parts/user/users.php";
                     }  elseif ($page == 'editRole' ) {
                         include_once "parts/user/editRole.php";


//                         Vsetko ostatne na 404
                     } else {
                         include_once "parts/404.php";
                     }
                 }
                            ?>


                <!--FOOTER-->
                <?php include_once "parts/template/footer.php"; ?>

            </div>
        </div>
    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="/badi/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../assets/dist/js/dashboard.js"></script>
</body>
</html>

