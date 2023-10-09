<?php

// Rutas de origen y destino
$src = "C:\\wamp64\\www\\PHP-master\\4_subir_descarga_eliminar";
$dst = "C:\\wamp64\\www\\Cloned-site";

// Comando para copiar los archivos
$copyCommand = "xcopy $src $dst /E /I";

// Ejecutar comando para copiar los archivos y capturar el código de retorno
$copySuccess = system($copyCommand, $copyReturnCode);

// Verifica si el comando de copia se ejecutó correctamente
if ($copySuccess !== false && $copyReturnCode === 0) {
    echo "<br>El sitio web se clonó con éxito.";
} else {
    echo "Hubo un error al clonar el sitio web.";
    echo "<pre>Código de retorno de copia: $copyReturnCode</pre>";  // Output para diagnóstico
}
