<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Form</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/add.css">
</head>

<body>
<form action="../src/add.php" method="post" enctype= "multipart/form-data">
    <div class="container">
        <div class="row">   
                <div class="col-12 d-flex justify-content-center my-3">
                    <label for="titre"><input type="text" name="titre" placeholder="Titre"></label> 
                </div>
                <div class="col-12 d-flex justify-content-center my-3">
                    <label for="img"><input type="file" name="img" id="img" placeholder="Partition"></label>
                </div>
                <div class="col-12 d-flex justify-content-center my-3">
                    <label for="tonalite"><input type="text" name="tonalite" placeholder="Tonalité"></label> 
                </div>
                <div class="col-12 d-flex justify-content-center my-3">
                    <label for="tempo"><input type="number" name="tempo" placeholder="Tempo"></label> 
                </div>
                <div class="col-12 d-flex justify-content-center mt-5 ">
                    <input type="submit" value="Sub" id="sub-btn">
                </div>      
        </div>
    </div>
</form>
<script src="../js/add.js"></script>
</body>
</html>