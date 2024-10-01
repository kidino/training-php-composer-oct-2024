<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Library\HelloWorld;
use App\Library\MyTime;
use SampleNamespace\MyClass;

$obj = new HelloWorld();
$timeobj = new MyTime();

$mobj = new MyClass();

echo "<h1>";
$mobj->show();
echo "</h1>";

echo "<h1>";
$obj->show();
echo "</h1>";

echo "<h1>";
$obj->hello('Iszuddin');
echo "</h1>";

echo "<h1>";
$timeobj->show();
echo "</h1>";


echo "<h1>";
$timeobj->readable();
echo "</h1>";
