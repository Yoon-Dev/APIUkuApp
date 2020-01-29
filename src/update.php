<?php
require '../utils/init.php';
chargerclass('Manager', '../class/');
chargerclass('ImgWorker', '../class/');

$worker = new ImgWorker('depart', '/img/');
$manager = new Manager($conn);
$newimg;
$fine;

$img = $_FILES['img'];
$data = $_POST;
$id = (int)$_GET['id'];

if(!empty($img['tmp_name'])){
    // traitement des image
    // 1st, test si l'image existe déja
    if(file_exists($worker->ReturnServImgPath($img))){
        $newimg = false;
        echo "Attention vous envoyer la même partition, si se n'est pas la même alors modifier le nom du fichier";
    }else{
        $newimg = true;
        // Changement d'image
        if($worker->DelImgServ($id, $conn)){
            $worker->ThrowImgOnServer($img);
            // Nouveau champs bdd
            $data += ['lien' => $worker->ReturnImgPath($img), 'del_link' => $worker->ReturnServImgPath($img)];
            $manager->update($data, $id, boolval($newimg));
            $fine = true;
        }else{
            $fine = false;
        }
    }
}else{
    $newimg = false;
    $manager->update($data, $id, boolval($newimg));
    $fine = true;
}
if($fine){
?>
<script>
window.location = "../backoffice/index.php";
</script>
<?php
}else{
    echo 'Something gone wrong';
}