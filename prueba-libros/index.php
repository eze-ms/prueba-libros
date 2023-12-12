<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/> 
    <title>Listado de Libros de Open Library por Género</title>
</head>
<body>
    <h1>Listado de Libros de Open Library por Género</h1>

    <!-- Agrega un elemento donde se mostrará la respuesta de la función -->
    <div id="result"></div>

    <!-- Agrega un script para hacer la solicitud a la función -->
    <script>
        // Hacer una solicitud a la función de Netlify
        fetch('https://tusitio.netlify.app/.netlify/functions/php-handler')
            .then(response => response.json())
            .then(data => {
                // Mostrar la respuesta de la función en el elemento 'result'
                document.getElementById('result').innerHTML = data.body;
            })
            .catch(error => {
                console.error('Error al obtener la respuesta de la función:', error);
            });
    </script>

</body>
</html>
