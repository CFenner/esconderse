<?php
define("MYSQL_HOST", "");
define("MYSQL_USER", "");
define("MYSQL_PASSWORD", "");
define("MYSQL_DB", "");


define('STATUS_ACTIVE', '1');
define('STATUS_INACTIVE', '0');

define ('AUTH_TYPE_SHA1', "sha1");
define ('AUTH_TYPE_TOKEN', "");
define ('USER', ""); // KAS-Logon
define ('PASS', ""); // KAS-Passwort
define ('URL', "");
// URIs zu den WSDL-Dateien
define ('WSDL_AUTH', '');
define ('WSDL_API', '');

//define("DOMAIN", 'cfenner.de');
define("DOMAIN", 'esconderse.de');
define('TITLE', "ESCONDERSE");
define('EMAIL', "hello@".DOMAIN);

define("CAN_REGISTER", TRUE);
define("IS_ACTIVE", FALSE);
define("NEW_AS_ACTIVE", TRUE);

define("SECURE", FALSE);

define("ATTEMPTS_COUNT", 5);
define("ATTEMPTS_RANGE", 2 * 60 * 60);

$lang_array = array("de","en");

define('LANG_STANDARD', "de");


define('QRY_USER', "");
define('QRY_USER_BY_EMAIL', "");
define('QRY_CHECK_USER_ID', "");
define('QRY_CHECK_EMAIL', "");
define('QRY_CREATE_USER', "");
define('QRY_CREATE_CONFIRM', "");
define('QRY_UPDATE_PASSWORD', "");

define('QRY_CHECK_FORWARD_ID', "");
define('QRY_FORWARD_LIST', "");
define('QRY_FORWARD', "");
define('QRY_CREATE_FORWARD', "");
define('QRY_UPDATE_FORWARD', "");
define('QRY_DELETE_FORWARD', "");

define('QRY_PERMISSION_LIST', '');
define('QRY_PERMISSION_COUNT', '');
define('QRY_PERMISSION_CURRENT_COUNT', '');
define('QRY_PERMISSION_CREATE', '');

define('QRY_RECOVERY_CREATE', '');
define('QRY_RECOVERY', '');


define('PERMISSION_REGISTER', '1');

define('JQUERY_VERSION', '2.1.3');
define('JQUERY_MOBILE_VERSION', '1.4.3');
?>