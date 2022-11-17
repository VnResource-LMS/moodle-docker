<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'sqlsrv';
$CFG->dblibrary = 'native';
$CFG->dbhost    = getenv('MOODLE_DOCKER_DBHOSTNAME');
$CFG->dbname    = getenv('MOODLE_DOCKER_DBNAME'); // Chỉnh sửa lại dbname
$CFG->dbuser    = getenv('MOODLE_DOCKER_DBUSER'); // Chỉnh sửa lại dbuser
$CFG->dbpass    = getenv('MOODLE_DOCKER_DBPASS'); // Chỉnh sửa lại dbpass
$CFG->prefix    = 'mdl_';
$CFG->dboptions = [
	'dbpersist' => 0,
	'dbport' => '',
	'dbsocket' => '',
];

$CFG->wwwroot   = getenv('MOODLE_DOCKER_WEB_HOST'); // Nếu dùng SSL thì sửa http thành https
$port = getenv('MOODLE_DOCKER_WEB_PORT'); // Chỉnh sửa lại port
if (!empty($port)) {
    // Extract port in case the format is bind_ip:port.
    $parts = explode(':', $port);
    $port = end($parts);
    if ((string)(int)$port === (string)$port) { // Only if it's int value.
        $CFG->wwwroot .= ":{$port}";
    }
}

$CFG->dataroot  = '/var/www/moodledata';
$CFG->admin     = 'admin';
$CFG->directorypermissions = 0777;

$CFG->sitetype = getenv('MOODLE_DOCKER_WEB_SITETYPE'); // Chỉnh lại education nếu là mô hình đào tạo
$CFG->theme = 'moove';

// $CFG->smtphosts = 'mailhog:1025';
// $CFG->noreplyaddress = 'noreply@example.com';

// Debug options - possible to be controlled by flag in future..
// $CFG->debug = (E_ALL | E_STRICT); // DEBUG_DEVELOPER
// $CFG->debugdisplay = 1;
// $CFG->debugstringids = 1; // Add strings=1 to url to get string ids.
// $CFG->perfdebug = 15;
// $CFG->debugpageinfo = 1;

// $CFG->cachejs = false;

$CFG->allowthemechangeonurl = 1;
$CFG->passwordpolicy = 0;
$CFG->cronclionly = 0;
// $CFG->pathtophp = '/usr/local/bin/php';

require_once(__DIR__ . '/lib/setup.php');

// Setup1
// Setup2