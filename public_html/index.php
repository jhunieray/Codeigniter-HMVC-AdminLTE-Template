<?php

define( 'API_VER', 'v' ); //API Version
define( 'APP_FOLDER', 'PATH_TO_APPLICATIONS_FOLDER'); //You can rename the applications folder to something else for added security. This is different in application_path since it is define according to API version.
defined('WEB_ROOT')            OR define('WEB_ROOT',       'PATH_TO_WEB_ROOT'); // Web Root Directory Path - WITH TRAILING SLASH!
defined('PROTECTED_PATH')      OR define('PROTECTED_PATH', 'PATH_TO_PROTECTED_PATH'); // Protected Directory Path - WITH TRAILING SLASH!

array_key_exists( API_VER, $_REQUEST ) ? $v = $_REQUEST[ API_VER ] : $v = '1.0.0'; //If request is empty, use default version 1.0.0

if ( file_exists( APP_FOLDER."{$v}.php" ) ) {
    if ( is_dir( APP_FOLDER."{$v}" ) ) {
        require APP_FOLDER."{$v}.php";
    } else {
        $error  = new stdClass();
        $error->error        = true;
        $error->description  = 'INVALID_API_VERSION';
        echo json_encode( $error );
        exit;
    }
} else {
    $error  = new stdClass();
    $error->error        = true;
    $error->description  = 'INVALID_API_VERSION';
    echo json_encode( $error );
    exit;
}