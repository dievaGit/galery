<?php //fichero para subir las fotos
require 'funciones.php';

//lo primero es crear conexion con la base de datos
$conexion = conexion('galeria', 'root' , '');

if (!$conexion) {
	$die();
}

//comprobando que se paso informacion por el metodo POST en la pagina HTML, la pag se manda a ella misma la inf
//$_FILES es parecida a $_GET o $_POST
if ($_SERVER['REQUEST_METHOD']== 'POST' && !empty($_FILES)) {
	//esta funcion retorna un arreglo con las propiedades de la imagen
	$check = @getimagesize($_FILES['foto']['tmp_name']);
	if ($check !== false) {
		//aqui es donde voy a guardar las fotos que suba
		$carpeta_destino = 'fotos/';
		//el archivo va a tener esta ruta
		$archivo_subido = $carpeta_destino . $_FILES['foto']['name'];

		//con esta funcion ya guardo la foto en el destino fotos
		move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);

		//guardando los datos de la foto en la BD
		//preparando la consulta
		$statement = $conexion->prepare('INSERT INTO fotos (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)');

        //ejecutando la consulta
        $statement->execute(array(':titulo' => $_POST['titulo'], ':imagen' => $_FILES['foto']['name'], ':texto' => $_POST['texto']));

        //se manda a ver las fotos
        header('Location: index.php');
	}else {
		$error = "El archivo no es una imagen o el archivo es muy pesado";
	}
}

require 'views/subir.view.php';

?>