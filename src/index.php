<?php
//session start

session_start();


include 'core.php';
include 'src/WcsaFunctions.php';
include 'src/RelationFunctions.php';
include 'src/ModelFunctions.php';
include 'src/AspectFunctions.php';
include 'src/FactorFunctions.php';
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
    if ($action == 'deleteWcsa') {
        include_once "parts/wcsa/deleteWcsa.php";

    } elseif ($action == 'deleteAspect') {
        include_once "parts/aspects/deleteAspect.php";

    } elseif ($action == 'deleteRelation') {
        include_once "parts/relations/deleteRelation.php";

    } elseif ($action == 'deleteModel') {
        include_once "parts/models/deleteModel.php";

    } elseif ($action == 'deleteFactor') {
        include_once "parts/factors/deleteFactor.php";

    } elseif ($action == 'deleteUser') {
        include_once "parts/user/deleteUser.php";

        //    ADD actions
    } elseif ($action == 'addAspect') {
        include_once "parts/aspects/addAspectProcess.php";

    } elseif ($action == 'addModel') {
        include_once "parts/models/addModelProcess.php";

    } elseif ($action == 'addRelation') {
        include_once "parts/relations/addRelationProcess.php";

    } elseif ($action == 'addFactor') {
        include_once "parts/factors/addFactorProcess.php";

    } elseif ($action == 'addWcsa') {
        include_once "parts/wcsa/addWcsaProcess.php";

    } elseif ($action == 'addUser') {
        include_once "parts/user/addUserProcess.php";

        //    EDIT actions
    } elseif ($action == 'editAspect') {
        include_once "parts/aspects/editAspectProcess.php";

    } elseif ($action == 'editRelation') {
        include_once "parts/relations/editRelationProcess.php";

    } elseif ($action == 'editModel') {
        include_once "parts/models/editModelProcess.php";

    } elseif ($action == 'editFactor') {
        include_once "parts/factors/editFactorProcess.php";

    } elseif ($action == 'editWcsa') {
        include_once "parts/wcsa/editWcsaProcess.php";

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
    if (in_array($page, ['relations', 'models','addModel','editModel']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_OPERATOR)) {
//        die('validacia role operator');
        AlertFunctions::addAlert(AlertFunctions::ERROR, 'Nemate opravnenie');
        CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
    }

//
//Validacia role Analyst
    if (in_array($page, ['wcsas', 'editWcsa', 'addWcsa', 'aspects', 'addAspect', 'editAspect', 'addFactor', 'editFactor']) && !CoreFunctions::isGranted(CoreFunctions::ROLE_RISK_ANALYST)) {
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
                        //  wcsas
                     if ($page == 'wcsas' ) {
                         include_once "parts/wcsa/wcsa.php";
                     } elseif ($page == 'addWcsa' ) {
                         include_once "parts/wcsa/addWcsa.php";
                     } elseif ($page == 'editWcsa' ) {
                         include_once "parts/wcsa/editWcsa.php";
                        //  aspects
                     } elseif ($page == 'aspects' ) {
                         include_once "parts/aspects/aspects.php";
                     } elseif ($page == 'addAspect' ) {
                         include_once "parts/aspects/addAspect.php";
                     } elseif ($page == 'editAspect' ) {
                         include_once "parts/aspects/editAspect.php";
                        //  relations
                     } elseif ($page == 'relations' ) {
                        include_once "parts/relations/relations.php";
                    } elseif ($page == 'addrelation' ) {
                        include_once "parts/relations/addrelation.php";
                    } elseif ($page == 'editRelation' ) {
                        include_once "parts/relations/editRelation.php";
                        //  models
                     } elseif ($page == 'models' ) {
                         include_once "parts/models/models.php";
                     } elseif ($page == 'addModel' ) {
                         include_once "parts/models/addModel.php";
                     } elseif ($page == 'editModel' ) {
                         include_once "parts/models/editModel.php";
                        //  factors
                     } elseif ($page == 'factors' ) {
                        include_once "parts/factors/factors.php";
                     } elseif ($page == 'editFactor' ) {
                         include_once "parts/factors/editFactor.php";
                     } elseif ($page == 'addFactor' ) {
                         include_once "parts/factors/addFactor.php";
                        //  others
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

