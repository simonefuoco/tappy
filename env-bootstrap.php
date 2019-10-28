<?php

use Dotenv\Dotenv;

require_once "vendor/autoload.php";

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

//set constants for retro-compatibility until they were used somewhere
foreach($_ENV as $key => $value) {
    if(!defined($key)) {
        switch($value) {
            case "On":
            case "1":
            case "Yes":
                define($key, true);
                break;
            case "Off":
            case "0":
            case "No":
                define($key, false);
                break;
            default:
                define($key, $value);
                break;
        }
    }
}

unset($dotenv);
