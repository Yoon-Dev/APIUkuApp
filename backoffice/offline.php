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
    <title>Offline</title>
    <script>
		// if ('serviceWorker' in navigator) {
		// window.addEventListener('load', () => {
		// 	navigator.serviceWorker.register('./service-worker.js')
		// });
		// }
	</script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex pr-0 primaire-action my-md-5">
                <img style="min-height: 100vh;min-width: 100vw;" src="../icon/offline.gif" alt="Offline">   
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>