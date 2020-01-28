<?php require '../backoffice/data/getBdd.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Backoffice</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="./add.php">
                    <span>
                        Add
                    </span>
                </a>
            </div>
        <?php foreach($bdd as $row){?>
            <div class="col-12 my-3">
                <div class="row align-items-center">
                    <div class="col-12 col-md-2 d-flex justify-content-center my-4 mt-md-0">
                        <h3><?php echo$row->titre();?></h3>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around my-4 mt-md-0">
                        <h5><?php echo$row->tonalite();?></h5>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around">
                        <h5><?php echo$row->tempo();?> Bpm</h5>
                    </div>
                    <div class="col-12 col-md-2 d-flex justify-content-center">
                        <img class="mw-100" src="<?php echo$row->lien_partition();?>" alt="">
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around my-4 mt-md-0">
                        <a href="#" data-id="<?php echo$row->id();?>"><span>Update</span></a>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around my-4 mt-md-0">
                        <a href="#" data-id="<?php echo$row->id();?>" data-link="<?php echo$row->del_link();?>"><span>Delete</span></a>
                    </div>
                </div>
            </div>
        <?php }?> 
        </div>
    </div>

</body>
</html>