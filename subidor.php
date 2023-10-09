<?php
// Verificar si se ha enviado un archivo
if (isset($_FILES["archivo"])) {

	$fileTmpLoc = $_FILES["archivo"]["tmp_name"]; // Folder temporal de archivo
	$fileType = mime_content_type($fileTmpLoc); // Tipo MIME del archivo
	$fileSize = $_FILES["archivo"]["size"]; // Tamaño del archivo
	$fileErrorMsg = $_FILES["archivo"]["error"]; // Tiene valor de cero si no hay error

	// Lista de tipos MIME permitidos (ejemplo para imágenes)
	$allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];

	// Validar tipo de archivo
	if (!in_array($fileType, $allowedMimes)) {
		echo "ERROR: Tipo de archivo no permitido.";
		exit();
	}

	// Validar tamaño del archivo (ejemplo: máximo 5 MB)
	$maxFileSize = 5 * 1024 * 1024;
	if ($fileSize > $maxFileSize) {
		echo "ERROR: El archivo es demasiado grande.";
		exit();
	}

	// Generar un nombre de archivo seguro
	$fileExtension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
	$newFileName = uniqid('', true) . '.' . $fileExtension;

	// Ruta de destino segura
	$destinationPath = 'archivos/' . $newFileName;

	// Mover el archivo subido a la ruta de destino
	if (move_uploaded_file($fileTmpLoc, $destinationPath)) {
		echo $newFileName . " subido completamente";
	} else {
		echo "ERROR: al subir el archivo";
	}
} else {
	echo "ERROR: Seleccione un archivo para subir.";
}
