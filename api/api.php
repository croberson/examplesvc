<?php
namespace Api;

use Api\Controllers as Controllers;
use Api\Vendor as Vendor;

require 'controllers/super_api_controller.php';
//require 'vendor/db.php';

//this file holds db connection info I use locally.  Like a "dev" version.  Not included in version control.
require 'Vendor/db_local.php';

//start session
session_start();

//add the database connection object to the session so models can access it.
$_SESSION['db'] = new Vendor\DB();

$api = new Controllers\SuperApiController();
$api->processApi();

//end session
session_destroy();
?>