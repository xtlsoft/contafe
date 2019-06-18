<?php

namespace Contafe;

require_once "vendor/autoload.php";

$sls = new \Contafe\Storage\SimpleLocalStorage("./data/contact.json");

// $sls->setEntry("@", [
//     "Person1" => [
//         "name" => "Person1",
//         "information" => [
//             "gender" => "male",
//             "birthday" => "2004-01-01",
//         ],
//         "contact" => [
//             "telephone" => "+8610000000000"
//         ]
//     ]
// ]);

var_export($sls->getEntry("@"));