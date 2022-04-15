<?php
class AlertFunctions {
    public const ERROR = 'danger';
    public const SUCCESS = 'success';

    public static function addAlert($type, $message) {

        $_SESSION['alerts'][] = ['type' => $type, 'message'  => $message ];
    }

    public static function getAlerts()
    {
        return $_SESSION['alerts'];

}

    public static function clearAlerts()
    {
        unset($_SESSION['alerts']);
}

    public static function startAlerts()
    {
        if (!isset($_SESSION['alerts'])) {
            $_SESSION['alerts'] = [];
        }
    }


}
