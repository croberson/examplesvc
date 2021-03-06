<?php
namespace Api;

use Api\Controllers as Controllers;
use Api\Vendor as Vendor;

// TODO: create a config file to store db configurations and other things

$_CONFIG['env'] = 'dev';
if($_CONFIG['env'] == 'local') {
    require_once 'Vendor/db_local.php';     //not in version control; it contains my local db connection info
} else {
    require 'vendor/db.php';
}

require_once 'controllers/super_api_controller.php';

$api = new Controllers\SuperApiController();
$api->processApi();

?>