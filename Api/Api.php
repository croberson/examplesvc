<?php
namespace Api;

use Api\Controllers as Controllers;
use Api\Vendor as Vendor;

require 'controllers/super_api_controller.php';

$api = new Controllers\SuperApiController();
$api->processApi();

?>