<?php
require '../utils/init.php';
chargerclass('Manager', '../class/');
chargerclass('ImgWorker', '../class/');


$img = $_FILES['img'];
$data = $_POST;

$worker = new ImgWorker('depart', '/img/');
$data += ['lien' => $worker->ReturnImgPath($img)];

$manager = new Manager($conn);
$manager->add($data);