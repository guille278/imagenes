<?php
//var_dump($_FILES['image']);


$isHiddenData = false;
$hidden = '';
if (isset($_FILES['image'])) {
    if ($_FILES['image']['type'] == 'image/jpeg') {
        $hexed = bin2hex(file_get_contents($_FILES['image']['tmp_name']));
        preg_match_all('/ffd8ff/', $hexed, $magicNumbers);
        if (sizeof($magicNumbers[0]) > 1) {
            $hidden = preg_split('/(?=ffd8ff)/', $hexed);
            $isHiddenData = true;
        }
    } else {
        header('Location: /?error=1');
    }
} else {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/05dc764b99.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="container">
        <h1 class="display-1">Resultado</h1>
        <hr>
        <div class="">
            <div class="mb-3">
                <h2 class="mb-3">Original</h2>
                <div class="card flex-row">
                    <img width="200px" src="data:image/png;base64,<?php echo base64_encode(file_get_contents($_FILES['image']['tmp_name'])) ?>" alt="">
                    <div class="card-body p-3">
                        <h3>Información del archivo</h3>
                        <hr>
                        <ul>
                            <li>
                                <p class="mb-2"><strong>Nombre del archivo:</strong> <?php echo $_FILES['image']['name'] ?></p>
                            </li>
                            <li>
                                <p class="mb-2"><strong>Tipo:</strong> <?php echo $_FILES['image']['type'] ?></p>
                            </li>
                            <li>
                                <p class="mb-2"><strong>Tamaño:</strong> <?php echo number_format($_FILES['image']['size'], 0, '', ',') ?> bytes</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <h2>Oculto</h2>
                <div class="d-flex row row-cols-3">
                    <?php
                    if ($isHiddenData) {
                        for ($i = 2; $i < sizeof($hidden); $i++) { ?>
                            <img width="400px" class="col mb-4" src="data:image/png;base64,<?php echo base64_encode(hex2bin($hidden[$i])) ?>" alt="" width="">
                        <?php
                        }
                    } else { ?>
                        <strong>No hay datos ocultos.</strong>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>