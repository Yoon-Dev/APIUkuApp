<?php
require '../utils/init.php';
chargerclass('Manager', '../class/');
chargerclass('ImgWorker', '../class/');

$data = $_POST;
$img = $_FILES['img'];

$worker = new ImgWorker('depart', '/img/');
$fine = $worker->ThrowImgOnServer($img);

if($fine){
    $data += ['lien' => $worker->ReturnImgPath($img), 'del_link' => $worker->ReturnServImgPath($img)];
    $manager = new Manager($conn);
    $manager->add($data);
    echo '1';
}else{
    echo '0';
}
