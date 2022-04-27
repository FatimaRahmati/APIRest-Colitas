<!DOCTYPE html>
<html lang="es">

<head>
    <title>Colitas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>

<body>
    <main class="container">
        <h2 class="">Búsqueda de fotos por nombre</h2>
        <div class="">
            <form name="buscarNombre" action="../fotos/nombre" method="GET">
                <p>Debes ingresar un nombre de animal</p>
                <label>Nombre del animal</label>
                <input type="text" name="nombreAnimal">
                <button type="submit">Ver</button>
            </form>
        </div>
    </main>
</body>

</html>