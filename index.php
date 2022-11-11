<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizar imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/05dc764b99.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-1 mb-3">Analizar imagenes JPG</h1>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <strong><i class="fa-solid fa-xmark"></i> Formato de archivo incorrecto</strong>
            </div>
        <?php } ?>
        <form class="d-flex" action="analizar.php" method="post" enctype="multipart/form-data">
            <input class="form-control me-2" type="file" name="image" id="" required>
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-file-arrow-up"></i></button>
        </form>
    </div>

</body>

</html>