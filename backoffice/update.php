<?php require './data/getSingle.php';$sheet=$manager->getSingle($_GET['id']);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#B3574D">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#B3574D">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/add.css">
    <title>Update Form</title>
</head>

<body>
<form action="../src/update.php?id=<?php echo$sheet['id']?>" method="post" enctype= "multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-start back-btn">
                <a href="./index.php"><img src="../icon/back-btn-uku.png" alt="Back Btn"></a> 
            </div>  
            <div class="col-12 d-flex justify-content-center my-3">
                <label for="titre"><input type="text" name="titre" placeholder="Titre" value="<?php echo$sheet['titre']?>"></label> 
            </div>
            <div class="col-12 d-flex justify-content-center my-3">
                <label for="img"><input type="file" name="img" id="img" placeholder="Partition"></label>
            </div>
            <div class="col-12 d-flex justify-content-center my-3">
                <label for="tonalite"><input type="text" name="tonalite" placeholder="Tonalité" value="<?php echo$sheet['tonalite']?>"></label> 
            </div>
            <div class="col-12 d-flex justify-content-center my-3">
                <label for="tempo"><input type="number" name="tempo" placeholder="Tempo" value="<?php echo$sheet['tempo']?>"></label> 
            </div>
            <div class="col-12 d-flex justify-content-center mt-5 ">
                <input type="submit" value="Sub" id="sub-btn">
            </div>      
        </div>
    </div>
</form>
</body>
</html>