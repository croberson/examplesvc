<?php
namespace Api;

use Api\Controllers as Controllers;
use Api\Vendor as Vendor;

require 'controllers/super_api_controller.php';
//require 'vendor/db.php';
require_once 'Vendor/db_local.php';

$api = new Controllers\SuperApiController();
$api->processApi();

?>