<?php

require_once 'inc/connection.php';
require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/Validation.php';


use Week13\To_Do_List\Classes\Request;
use Week13\To_Do_List\Classes\Session;
use Week13\To_Do_List\Classes\Validation;

$request = new Request;
$session = new Session;
$validation = new Validation;