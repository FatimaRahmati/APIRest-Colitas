<!DOCTYPE html>
<html lang="es">

<head>
    <title>Colitas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>

<body>
    <h3> <?= esc($title) ?> </h3>

    <?php if (!empty($fotos) && is_array($fotos)): ?>

    <?php foreach ($fotos as $fotos_row): ?>

    <div class="main">
        <?php $imagen = $fotos_row['imagen']; echo '<img src="data:image/jpeg;base64,'.$imagen.'"/>'; ?>
        <p>Nombre: <?= esc($fotos_row['nombre']) ?></p>
        <p>Protectora: <?= esc ($fotos_row['protectora']) ?></p>
        <p>Teléfono de contacto: <?= esc ($fotos_row['telefono']) ?></p>
        <br>
    </div>

    <?php endforeach ?>

    <?php else: ?>
    <h3> No existe esa nombre en nuestra base de datos </h3>

    <?php endif ?>

</body>

</html>