<?php
require '../utils/init.php';
chargerclass('Manager', '../class/');
chargerclass('ImgWorker', '../class/');

$id = (int)$_GET['id'];
$worker = new ImgWorker('depart', '/img/');
if($worker->DelImgServ($id, $conn)){
    $manager = new Manager($conn);
    $manager->del($id);
    echo '1';
}else{
    echo 'O';
}
