<?php
require '../utils/init.php';
chargerclass('Manager', '../class/');

$manager = new Manager($conn);
$manager->getAll();