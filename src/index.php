<?php

require "../vendor/autoload.php";

use Acme\App\Type_A;
use Acme\App\Type_B;
use Acme\App\Type_C;
use Acme\App\Factory;

$resultA = Factory::process("../Type_A.xlsx", new Type_A());
$resultB = Factory::process("../Type_B.xlsx", new Type_B());
$resultC = Factory::process("../test.xls", new Type_C());

echo "<h3>Type A</h3>";
echo "<table border='1' cellpadding='5'><th>Row</th><th>Error</th><tbody>";
foreach ($resultA as $key => $value) {
    if ($value != "")
        echo "<tr><td>" . $key . "</td><td> " . $value . "</td><tr>";
};
echo "</tbody></table><br/>";
echo "<h3>Type B</h3>";
echo "<table border='1' cellpadding='5'><th>Row</th><th>Error</th><tbody>";
foreach ($resultB as $key => $value) {
    if ($value != "")
        echo "<tr><td>" . $key . "</td><td> " . $value . "</td><tr>";
};
echo "</tbody></table>";
echo "<h3>Type C</h3>";

echo "<table border='1' cellpadding='5'><th>Row</th><th>Error</th><tbody>";
foreach ($resultC as $key => $value) {
    if ($value != "")
        echo "<tr><td>" . $key . "</td><td> " . $value . "</td><tr>";
};
echo "</tbody></table>";