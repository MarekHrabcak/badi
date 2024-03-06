<?php

class CoreFunctions

{
//  Konstanty pre ACTIONs
    public const ACTION_LOGOUT = 'index.php?action=logout';
    public const ACTION_LOGIN = 'index.php?action=login';
    public const ACTION_EDIT_ROLE = 'index.php?action=editRole';
    // ASPECTS
    public const ACTION_ADD_ASPECT = 'index.php?action=addAspect';
    public const ACTION_EDIT_ASPECT = 'index.php?action=editAspect';
    public const ACTION_DELETE_ASPECT = 'index.php?action=deleteAspect&id=';
    // FACTORS
    public const ACTION_ADD_FACTOR = 'index.php?action=addFactor';
    public const ACTION_EDIT_FACTOR = 'index.php?action=editFactor';
    public const ACTION_DELETE_FACTOR = 'index.php?action=deleteFactor&id=';
    // MODELS
    public const ACTION_ADD_MODEL = 'index.php?action=addModel';
    public const ACTION_EDIT_MODEL = 'index.php?action=editModel';
    public const ACTION_DELETE_MODEL = 'index.php?action=deleteModel&id=';
    // THREATS
    public const ACTION_ADD_THREAT = 'index.php?action=addThreat';
    public const ACTION_EDIT_THREAT = 'index.php?action=editThreat';
    public const ACTION_DELETE_THREAT = 'index.php?action=deleteThreat&id=';
    // USERS
    public const ACTION_ADD_USER = 'index.php?action=addUser';
    public const ACTION_EDIT_USER = 'index.php?action=editUser';
    public const ACTION_DELETE_USER = 'index.php?action=deleteUser&id=';
    
    


//  Konstanty pre PAGEs
    public const PAGE_LOGIN = 'index.php?page=login';
    public const PAGE_HOMEPAGE = 'index.php?page=homepage';
    public const PAGE_USER_ADMIN = 'index.php?page=users';
    public const PAGE_USER_EDIT = 'index.php?page=editUser&editId=%s';
    public const PAGE_ADD_USER = 'index.php?page=addUser';
    public const PAGE_EDIT_USER = 'index.php?page=editUser&editId=';
    public const PAGE_EDIT_ROLE = 'index.php?page=editRole&editId=';

    
    // Aspects
    public const PAGE_ASPECTS = 'index.php?page=aspects';
    public const PAGE_EDIT_ASPECT = 'index.php?page=editAspect&editId=';
    public const PAGE_ADD_ASPECT = 'index.php?page=addAspect';
    
    // Factors
    public const PAGE_FACTORS = 'index.php?page=factors';
    public const PAGE_EDIT_FACTOR = 'index.php?page=editFactor&editId=';
    public const PAGE_ADD_FACTOR = 'index.php?page=addFactor';

    // Models
    public const PAGE_MODELS = 'index.php?page=models';
    public const PAGE_ADD_MODEL = 'index.php?page=addModel';
    public const PAGE_EDIT_MODEL = 'index.php?page=editModel&editId=';

    // Threats
    public const PAGE_THREATS = 'index.php?page=threats';
    public const PAGE_ADD_THREAT = 'index.php?page=addThreat';
    public const PAGE_EDIT_THREAT = 'index.php?page=editThreat&editId=';
    
    
//  Konstanty pre ROLEs
    public const ROLE_ADMIN = 'ADMIN';
    public const ROLE_OPERATOR = 'OPERATOR';
    public const ROLE_RISK_ANALYST = 'RISK_ANALYST';
    public const ROLE_USER = 'USER';

    public static function redirect($path) {

            header('Location: ' . $path);
            exit();
        }

    public static function redirectWithId($path, $id) {
        $path = sprintf($path, $id);
        header('Location: ' . $path);
        exit();
    }


//    Verifikacia role
    public static function isGranted($requiredRole = self::ROLE_USER)
    {
//        var_dump($_SESSION);

        if (!isset($_SESSION['role'])) {
            return false;
        }

        if ($_SESSION['role'] == self::ROLE_ADMIN) {
            return true;
        }
        if ($requiredRole == self::ROLE_RISK_ANALYST && in_array($_SESSION['role'], [self::ROLE_RISK_ANALYST])) {
            return true;
        }


        if ($requiredRole == self::ROLE_OPERATOR && in_array($_SESSION['role'], [self::ROLE_RISK_ANALYST, self::ROLE_OPERATOR])) {
            return true;
        }
        if ($requiredRole == self::ROLE_USER && in_array($_SESSION['role'], [self::ROLE_RISK_ANALYST, self::ROLE_OPERATOR, self::ROLE_USER])) {
            return true;

        }
        return false;
    }
}