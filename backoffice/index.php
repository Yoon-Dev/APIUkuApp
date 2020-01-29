<?php require '../backoffice/data/getBdd.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#B3574D">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#B3574D">
    <title>Backoffice</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script>
		if ('serviceWorker' in navigator) {
		window.addEventListener('load', () => {
			navigator.serviceWorker.register('./service-worker.js')
		});
		}
	</script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex pr-0 primaire-action my-md-5">
                <a  href="./add.php">
                    <img src="../icon/add-btn-uku.png" alt="Add Btn">
                </a>
            </div>
        <?php foreach($bdd as $row){?>
            <div class="uku-sheet col-12" id="<?php echo$row->id();?>">
                <div class="row align-items-center row-sheet">
                    <div class="col-12 col-md-2 d-flex justify-content-center my-4 my-md-0">
                        <h3><?php echo$row->titre();?></h3>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around my-4 my-md-0">
                        <h5><?php echo$row->tonalite();?></h5>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around">
                        <h5><?php echo$row->tempo();?> Bpm</h5>
                    </div>
                    <div class="col-12 col-md-2 d-flex justify-content-center">
                        <a class="btn btn-view zelda" href="<?php echo$row->lien_partition();?>" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a>
                    </div>
                    <div class="col-6 col-md-2 d-flex justify-content-around my-4 my-md-0">
                        <a class="btn btn-edit zelda" href="./update.php?id=<?php echo$row->id();?>" data-id="<?php echo$row->id();?>"><i class="far fa-edit"></i></a>
                    </div>
                    <div class="zelda-del col-6 col-md-2 d-flex justify-content-around my-4 my-md-0">
                        <a class="btn btn-danger zelda" href="#" data-id="<?php echo$row->id();?>" onclick="del(event, this, callback)"><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
            </div>
        <?php }?> 
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>