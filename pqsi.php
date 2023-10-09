<?php

// Ruta del archivo que deseas leer
$file_path = "C:\\wamp64\\www\\PHP-master\\4_subir_descarga_eliminar\\subidor.php";

// Verificar si el archivo existe
if (file_exists($file_path)) {
    // Mostrar el código fuente del archivo
    show_source($file_path);
} else {
    echo "El archivo no existe.";
}
