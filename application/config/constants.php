<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// Common HTTP status codes and their respective description.
defined("HTTP_OK")                  OR define("HTTP_OK", 200);
defined("HTTP_CREATED")             OR define("HTTP_CREATED", 201);
defined("HTTP_NOT_MODIFIED")        OR define("HTTP_NOT_MODIFIED", 304);
defined("HTTP_BAD_REQUEST")         OR define("HTTP_BAD_REQUEST", 400);
defined("HTTP_UNAUTHORIZED")        OR define("HTTP_UNAUTHORIZED", 401);
defined("HTTP_FORBIDDEN")           OR define("HTTP_FORBIDDEN", 403);
defined("HTTP_NOT_FOUND")           OR define("HTTP_NOT_FOUND", 404);
defined("HTTP_METHOD_NOT_ALLOWED")  OR define("HTTP_METHOD_NOT_ALLOWED", 405);
defined("HTTP_NOT_ACCEPTABLE")      OR define("HTTP_NOT_ACCEPTABLE", 406);
defined("HTTP_INTERNAL_ERROR")      OR define("HTTP_INTERNAL_ERROR", 500);

// Constant for payload message, extjs not support status: true but support success: true
defined("SAVE_SUCCESS_MSG")      OR define("SAVE_SUCCESS_MSG", array('success' => true, 'message' => 'Data saved'));
defined("SAVE_FAILED_MSG")       OR define("SAVE_FAILED_MSG", array('success' => false, 'message' => 'Save data failed'));
defined("UPDATE_SUCCESS_MSG")    OR define("UPDATE_SUCCESS_MSG", array('success' => true, 'message' => 'Data updated'));
defined("UPDATE_FAILED_MSG")     OR define("UPDATE_FAILED_MSG", array('success' => false, 'message' => 'Update data failed'));
defined("DELETE_SUCCESS_MSG")    OR define("DELETE_SUCCESS_MSG", array('success' => true, 'message' => 'Data deleted'));
defined("DELETE_FAILED_MSG")     OR define("DELETE_FAILED_MSG", array('success' => false, 'message' => 'Delete data failed'));
defined("BAD_REQUEST_MSG")       OR define("BAD_REQUEST_MSG", array('success' => false, 'message' => 'Bad request'));
defined("NOT_FOUND_MSG")         OR define("NOT_FOUND_MSG", array('success' => false, 'message' => 'Not found'));

