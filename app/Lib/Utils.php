<?php 
namespace  App\Lib; 

class Utils {

    static function is_role( $role ) {
        return (
            isset($_SESSION['user']['role'])
            && ($_SESSION['user']['role'] == $role)
        );
    }

    static function check_login() {
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
    
        if(!isset($_SESSION['is_loggedin'])) {
            header('Location: /login');
            exit();
        }
    }

}