<?php
    // Obtener el término de búsqueda ingresado por el usuario (si está presente)
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    // Verificar si se ha ingresado un término de búsqueda
    if ($searchQuery) {
        // Construir la URL de la API para buscar por término
        $apiUrl = "https://openlibrary.org/search.json?q=" . urlencode($searchQuery);

        // Realizar la solicitud a la API
        $response = file_get_contents($apiUrl);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Verificar si hay libros en el término de búsqueda
        if (isset($data['docs']) && count($data['docs']) > 0) {
            echo "<ul>";
            foreach ($data['docs'] as $book) {
                $title = isset($book['title_suggest']) ? $book['title_suggest'] : "Sin título";
                $author = isset($book['author_name']) ? implode(", ", $book['author_name']) : "Sin autor";
                $coverId = isset($book['cover_i']) ? $book['cover_i'] : null;
                $coverUrl = getBookCoverUrl($coverId);

                echo "<li>";
                echo "<img src=\"$coverUrl\" alt=\"$title\">";
                echo "<br>{$title} - {$author}";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se encontraron libros con el término '$searchQuery'.</p>";
        }
    } else {
        // Mostrar formulario para que el usuario ingrese un término de búsqueda
        echo "<form method=\"get\" action=\"\">
                <label for=\"q\">Ingresa un término de búsqueda:</label>
                <input type=\"text\" id=\"q\" name=\"q\" required>
                <button type=\"submit\">Buscar</button>
              </form>";
    }

    function getBookCoverUrl($coverId) {
        // Construir la URL de la portada utilizando el ID de Open Library
        return $coverId ? "https://covers.openlibrary.org/b/id/{$coverId}-L.jpg" : "Sin portada";
    }
    ?>